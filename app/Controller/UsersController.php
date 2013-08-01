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

        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        }

        if ($this->request->is('post') && !empty($this->request->data)) {
            pr($this->request->data);exit;
            if ($loggedInUserData) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }

    }

}
