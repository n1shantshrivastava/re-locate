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
//        $this->ProjectResourceRequirement->unbindModel(array('belongsTo'=>array('Project','Technology')));
//        $this->ProjectResourceRequirement->Technology->bindModel(array('hasMany'=>array('User')));
        $this->ProjectTechnology->unbindModel(array('belongsTo'=>array('Project')));
        $this->ProjectsUser->unbindModel(array('belongsTo'=>array('Project')));
        $projectData =  $this->read(null, $id);
        if(!empty($projectData)){
            $technologyIds = array();
            if(!empty($projectData['ProjectResourceRequirement'])){
                foreach($projectData['ProjectResourceRequirement'] as $projectTechnology){
                    $technologyIds[] = $projectTechnology['technology_id'];
                }
            }
            foreach($projectData['ProjectResourceRequirement'] as $key => $projectTechnology){
                if(!empty($technologyIds)){
                    $conditions = array('User.technology_id'=>$technologyIds);
                    $this->ProjectsUser->User->recursive = -1;
                    $projectData['ProjectResourceRequirement'][$key]['ProjectsUser'] = $this->ProjectsUser->User->find('all',array('conditions'=>array('User.technology_id'=>$technologyIds)));
                }else{
                    $conditions = '';
                }
                $this->ProjectsUser->User->recursive = -1;
                $resourceData = $this->ProjectsUser->User->find('all', array('conditions'=>$conditions,'fields'=>array('id','first_name','last_name','technology_id')));
                $projectData['ProjectResourceRequirement'][$key]['User'] = $resourceData;
            }
        }
        return $projectData;
    }

    public function saveProjectUser($data){

        $this->ProjectsUser->recursive = -1;
        $getExistUser = $this->ProjectsUser->find('first',array('conditions'=>array('ProjectsUser.project_id'=>$data['project_id'],'ProjectsUser.user_id'=>$data['user_id'])));
        $this->log($getExistUser);
        if(empty($getExistUser)){
            $this->ProjectsUser->create();
            return $this->ProjectsUser->save($data);
        }else{
            return false;
        }

    }
    public function getActiveProjects(){
        $this->recursive = 2;
        $projects =  $this->find('all',array(
            'conditions' => array(
                'Project.start_date <= '=>date("Y-m-d H:i:s"),
                'Project.end_date >= '=>date("Y-m-d H:i:s")
            )
        ));
        return $projects;
    }
}
