<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Technology $Technology
 * @property Role $Role
 */
class User extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Technology' => array(
			'className' => 'Technology',
			'foreignKey' => 'technology_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public $hasMany = array(
        'ProjectsUser' => array(
            'className' => 'ProjectsUser',
            'foreignKey' => 'user_id',
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
}
