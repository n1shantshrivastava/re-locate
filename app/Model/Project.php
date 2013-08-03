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
        return $this->read(null, $id);
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
