<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index'));
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->set(compact('tab'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->loggedInUserId() != '' && $this->loggedInUserRole() == 1) {
            $this->redirect(array('action' => 'all_users'));
        } else {
            $this->redirect(array('action' => 'login'));
        }
    }

    public function login() {
        $loggedInUserData = $this->Auth->login();

        if ($this->loggedInUserId() == '') {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
        }

        if ($this->request->is('post') && !empty($this->request->data)) {
            if ($loggedInUserData) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'set_flash');
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('You are successfully logged out from the system'), 'set_flash');
        $this->redirect($this->Auth->logout());
    }

    public function all_users() {
        $this->User->recursive = 0;
        $users = $this->paginate('User', array('User.role_id != ' => 1));
        $tab = 'users';
        $this->set(compact('users','tab'));
    }

    public function dashboard() {
        $this->User->recursive = 0;
        $projects = $this->User->ProjectsUser->Project->getActiveProjects();

        $teams= $this->User->Technology->getTechnologyUserCount();
        $projects = $this->User->ProjectsUser->Project->getProjectUserCount();
        $projects = array_values($projects);
        foreach($projects as $key => $project){
            unset($project['id']);
            $projects[$key]= $project['Project'];
        }
        $projects = json_encode($projects);
        foreach($teams as $key => $team) {
            unset($team['id']);
            $teams[$key] = $team['Technology'];
        }
        $teams = json_encode($teams);
        $this->set(compact('projects','teams'));
    }


    public function user_dashboard() {
        $this->autoRender = false;
        $tab = 'dashboard';
        $this->set(compact('projects','tab'));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $user = $this->User->read(null, $id);
        $tab = 'users';
        $this->set(compact('user','tab'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'set_flash');
                $this->redirect('/');
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'set_flash');
            }
        }
        $roles = $this->User->Role->getList();
        $technologies = $this->User->Technology->getList();
        $tab = 'users';
        $this->set(compact('technologies', 'roles','tab'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'set_flash');
                $this->redirect('/');
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'set_flash');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $technologies = $this->User->Technology->getList();
            $tab = 'users';
            $this->set(compact('technologies','tab'));
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'set_flash');
            $this->redirect('/');
        }
        $this->Session->setFlash(__('User was not deleted'), 'set_flash');
        $this->redirect('/');
    }

    public function change_password() {
        $role = $this->loggedInUserRole();
        $loggedInUserId = $this->loggedInUserId();
        if ($role == 1) {
            if (!empty($this->request->data)) {

                if ($this->User->checkUserCurrentPassword($loggedInUserId, $this->request->data['User']['password'])) {
                    if ($this->request->data['User']['new_password'] == $this->request->data['User']['confirm_password']) {

                        $this->request->data['User']['password'] = $this->request->data['User']['new_password'];

                        if ($this->User->save($this->request->data)) {
                            $this->Session->setFlash(__('Password has been updated'), 'set_flash');
                        } else {
                            $this->Session->setFlash(__('Password can not be updated, please try again'), 'set_flash');
                        }
                    }
                    $this->redirect(array('action' => 'dashboard'));
                } else {
                    $this->Session->setFlash(__('Invalid old password. Please enter valid old password'), 'set_flash');
                    $this->redirect($this->referer());
                }
            }
        } else {
            $this->Session->setFlash('You are not authorized user.','set_flash');
            $this->redirect($this->Auth->logout());
        }

    }

    public function check_availability() {
        $this->layout = 'ajax';
        $this->autoRender = false;

        $username = null;
        $password = null;

        //checking for unique username
        if (isset($this->request->data['username'])) {
            $result = $this->User->checkUserByCount($this->request->data);
            return $result;
        } //checking for old password and new password matching at the time of changing password
        elseif (isset($this->request->data['password'])) {
            $old_user = $this->User->findById($this->loggedInUserId());
            $old = $old_user['User']['password'];
            if ($old == AuthComponent::password($this->request->data['password'])) {
                return true;
            } else {
                return false;
            }
        }  else {
            return false;
        }
    }
}