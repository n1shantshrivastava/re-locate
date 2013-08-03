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
        $this->Auth->allow('index');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
    }

    public function login() {
        $loggedInUserData = $this->Auth->login();

        if($this->loggedInUserId()==''){
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
        }

        if ($this->request->is('post') && !empty($this->request->data)) {
            if ($loggedInUserData) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function dashboard(){
        $this->User->recursive = 0;
        $users = $this->paginate('User',array('User.role_id != '=>1));
        $this->set('users', $users);
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
        $this->set('user', $this->User->read(null, $id));
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
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'dashboard'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->User->Role->getList();
        $technologies = $this->User->Technology->getList();
        $this->set(compact('technologies','roles'));
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
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'dashboard'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $technologies = $this->User->Technology->getList();
            $this->set(compact('technologies'));
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
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'dashboard'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'dashboard'));
    }
}