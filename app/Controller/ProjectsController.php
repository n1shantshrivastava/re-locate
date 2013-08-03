<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array('Html', 'Form');


    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function beforeRender() {
        parent::beforeRender();
        if ($this->loggedInUserId() != '') {
            $tab = 'projects';
        } else {
            $tab = '';
        }
        $this->set(compact('tab'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->loggedInUserId() != '' && $this->loggedInUserRole() == 1) {
            $this->redirect(array('action' => 'all_projects'));
        } else {
            $this->redirect(array('action' => 'login'));
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function all_projects() {
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        //        $this->Project->recursive=2;
        //        $project = $this->Project->read(null, $id);
        $project = $this->Project->getProjectDataById($id);
        //        pr($project);
        //        die;
        $this->set(compact('project'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->request->data['Project']['start_date'] = date('Y-m-d H:i:s', strtotime($this->request->data['Project']['start_date']));
            $this->request->data['Project']['end_date'] = date('Y-m-d H:i:s', strtotime($this->request->data['Project']['end_date']));

            $projectResourceRequirement = $this->request->data['ProjectResourceRequirements'];
            $this->Project->create();
            if ($this->Project->save($this->request->data)) {
                $this->log('>>>> SUCCESS : Saved Project Data');
                $projectId = $this->Project->id;

                foreach ($projectResourceRequirement as $key => $value) {
                    $projectResourceRequirement[$key]['project_id'] = $projectId;
                }

                if ($this->Project->ProjectResourceRequirement->saveAll($projectResourceRequirement)) {
                    $this->log('>>>> SUCCESS : Saved ProjectResourceRequirement Data');
                    $this->Session->setFlash(__('The project has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->log('>>>> FAILED : Unable to save ProjectResourceRequirement Data');
                }
            } else {
                $this->log('>>>> FAILED : Unable to save Project Data');
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        }
        $technologies = $this->Project->getTechnologyData();
        $this->set(compact('technologies'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Project']['start_date'] = date('Y-m-d H:i:s', strtotime($this->request->data['Project']['start_date']));
            $this->request->data['Project']['end_date'] = date('Y-m-d H:i:s', strtotime($this->request->data['Project']['end_date']));

            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Project->read(null, $id);
            $technologies = $this->Project->getTechnologyData();
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
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('Project deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Project was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function getAllTechnologies() {
        $this->autoRender = false;
        if ($this->request->is('get') && empty($this->request->data)) {
            $technologies = array();
            $technologies = $this->Project->getTechnologyData();
            if (!empty($technologies)) {
                return json_encode($technologies);

            } else {
                return json_encode(array());
            }
        }
    }
}
