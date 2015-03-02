<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property ProjectResourceRequirement $ProjectResourceRequirement
 * @property ProjectTechnology $ProjectTechnology
 */
class Project extends AppModel {

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ProjectResourceRequirement' => array(
            'className' => 'ProjectResourceRequirement',
            'foreignKey' => 'project_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'ProjectTechnology' => array(
            'className' => 'ProjectTechnology',
            'foreignKey' => 'project_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'ProjectsUser' => array(
            'className' => 'ProjectsUser',
            'foreignKey' => 'project_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function getTechnologyData() {
        return $this->ProjectTechnology->Technology->find('list', array('fields' => array('id', 'stream_name')));
    }

    public function getProjectUserCount() {
        $this->virtualFields['employee_count'] = 'count(User.id)';

        $result = $this->find('all', array(
            'fields' => array(
                'Project.id', 'Project.project_name', 'Project.employee_count'
            ),
            'joins' => array(
                array(
                    'table' => 'projects_users',
                    'alias' => 'ProjectsUser',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Project.id = ProjectsUser.project_id'
                    )
                ),
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'ProjectsUser.user_id = User.id'
                    )
                )
            ),
            'group' => array(
                'Project.id'
            ),
            'recursive' => -1
        ));
        return $result;
    }



    public function getProjectDataById($id){
        $this->recursive=3;
//        $this->ProjectResourceRequirement->unbindModel(array('belongsTo'=>array('Project','Technology')));
//        $this->ProjectResourceRequirement->Technology->bindModel(array('hasMany'=>array('User')));
        $this->ProjectTechnology->unbindModel(array('belongsTo'=>array('Project')));
        $this->ProjectsUser->unbindModel(array('belongsTo'=>array('Project')));
        //$this->ProjectTechnology->belongsTo['Technology']['conditions'] = array('');
        $projectData =  $this->read(null, $id);
        if(!empty($projectData)){
            $userIds = array();
            if(!empty($projectData['ProjectsUser'])){
                foreach($projectData['ProjectsUser'] as $projectUserKey =>  $projectUser){
                    $userIds[] = $projectUser['user_id'];

                }
            }
            foreach($projectData['ProjectTechnology'] as $key => $projectTechnology){
                if(!empty($userIds)){
                    $conditions = array('User.technology_id'=>$projectTechnology['technology_id'],array('NOT'=>array('User.id'=>$userIds)));
                    $this->ProjectsUser->User->recursive = -1;
                    $projectData['ProjectTechnology'][$key]['ProjectsUser'] = $this->ProjectsUser->User->find('all',array('conditions'=>array('User.technology_id'=>$projectTechnology['technology_id'],'User.id'=>$userIds)));
                }else{
                    $conditions = array('User.technology_id'=>$projectTechnology['technology_id']);
                }
                $this->ProjectsUser->User->recursive = -1;
                $resourceData = $this->ProjectsUser->User->find('all', array('conditions'=>$conditions,'fields'=>array('id','first_name','last_name','technology_id')));
                $projectData['ProjectTechnology'][$key]['User'] = $resourceData;

            }
        }
        return $projectData;
    }

    public function saveProjectUser($data) {

        $this->ProjectsUser->recursive = -1;
        $getExistUser = $this->ProjectsUser->find('first', array('conditions' => array('ProjectsUser.project_id' => $data['project_id'], 'ProjectsUser.user_id' => $data['user_id'])));
        $this->log($getExistUser);
        if (empty($getExistUser)) {
            $this->ProjectsUser->create();
            return $this->ProjectsUser->save($data);
        } else {
            return false;
        }

    }

    public function getActiveProjects() {
        $this->recursive = -1;
        /*$projects = $this->find('all', array(
            'conditions' => array(
                'Project.start_date <= ' => date("Y-m-d H:i:s"),
                'Project.end_date >= ' => date("Y-m-d H:i:s")
            )
        ));*/
         $projects = $this->find('all');
        return $projects;
    }
}
