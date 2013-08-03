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

    public function getTechnologyData(){
        return $this->ProjectTechnology->Technology->find('list',array('fields'=>array('id','stream_name')));
    }

    public function getProjectDataById($id){
        $this->recursive=2;
        $this->ProjectResourceRequirement->unbindModel(array('belongsTo'=>array('Project','Technology')));
        $this->ProjectTechnology->unbindModel(array('belongsTo'=>array('Project')));
        $projectData =  $this->read(null, $id);
        if(!empty($projectData)){
            $userIds = array();
            if(!empty($projectData['ProjectsUser'])){
                foreach($projectData['ProjectsUser'] as $projectUser){
                    $userIds[] = $projectUser['user_id'];
                }
            }
            foreach($projectData['ProjectTechnology'] as $key => $projectTechnology){
                if(!empty($userIds)){
                    $conditions = array('User.technology_id'=>$projectTechnology['technology_id'],array('NOT'=>array('User.id'=>$userIds)));
                }else{
                    $conditions = array('User.technology_id'=>$projectTechnology['technology_id']);
                }
                $this->ProjectsUser->User->recursive = -1;
                $resourceData = $this->ProjectsUser->User->find('all', array('conditions'=>$conditions,'fields'=>array('id','first_name','last_name')));
                $projectData['ProjectTechnology'][$key]['User'] = $resourceData;
            }
        }
        return $projectData;
    }

    public function getActiveProjects(){
        $this->recursive = 2;
        $projects =  $this->find('all',array(
            'conditions' => array(
                'Project.start_date >= '=>date("Y-m-d H:i:s"),
                'Project.end_date >= '=>date("Y-m-d H:i:s")
            )
        ));
        return $projects;
    }
}
