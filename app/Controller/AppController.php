<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array('Auth', 'Session');

    public $applicationName = '';
    public $loggedInUserId = '';
    public $loggedInUserName = '';
    public $loggedInUserFirstName = '';
    public $loggedInUserLastName = '';
    public $loggedInUserRole = '';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->applicationName = Configure::read('APPLICATION_NAME');

        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->authError = 'You are not authorized user, please enter username and password.';
        $this->Auth->authenticate = array(
            'Form' => array(
                'scope' => array('User.is_active' => 1, 'User.is_verified' => 1, 'User.role_id' => 1,)
            )
        );
    }

    public function beforeRender() {
        parent::beforeRender();
        $appName = Configure::read('APPLICATION_NAME');

        $loggedInUserId = $this->loggedInUserId = $this->loggedInUserId();
        $loggedInUserRole = $this->loggedInUserRole = $this->loggedInUserRole();
        $loggedInUserName = $this->loggedInUserName = $this->loggedInUserName();
        $loggedInUserFirstName = $this->loggedInUserFirstName = $this->loggedInUserFirstName();
        $loggedInUserLastName = $this->loggedInUserLastName = $this->loggedInUserLastName();

        $this->set(compact(
            'appName', 'loggedInUserId', 'loggedInUserRole',
            'loggedInUserLastName','loggedInUserFirstName','loggedInUserName'
        ));
    }

    public function loggedInUserId() {
        return $this->Auth->user('id') != '' ? $this->Auth->user('id') : false;
    }

    public function loggedInUserRole() {
        return $this->Auth->user('role_id') != '' ? $this->Auth->user('role_id') : false;
    }

    public function loggedInUserName() {
        return $this->Auth->user('username') != '' ? $this->Auth->user('username') : false;
    }

    public function loggedInUserFirstName() {
        return $this->Auth->user('first_name') != '' ? $this->Auth->user('first_name') : false;
    }

    public function loggedInUserLastName() {
        return $this->Auth->user('last_name') != '' ? $this->Auth->user('last_name') : false;
    }
}