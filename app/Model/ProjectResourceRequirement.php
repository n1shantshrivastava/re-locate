<?php
App::uses('AppModel', 'Model');
/**
 * ProjectResourceRequirement Model
 *
 * @property Project $Project
 * @property Technology $Technology
 */
class ProjectResourceRequirement extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'project_resource_requirement';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Technology' => array(
			'className' => 'Technology',
			'foreignKey' => 'technology_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
