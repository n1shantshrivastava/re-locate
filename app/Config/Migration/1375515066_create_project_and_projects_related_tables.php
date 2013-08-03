<?php
class CreateProjectAndProjectsRelatedTables extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'projects' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'project_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500),
					'account_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'project_type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'description' => array('type' => 'text', 'null' => false, 'default' => NULL,  'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'start_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'end_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
                'project_technologies' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'project_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 50),
                    'technology_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 50),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
                'project_resource_requirement' => array(
                    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                    'project_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11),
                    'technology_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11),
                    'no_of_resources' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11),
                    'required_percentage' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11),
                    'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                    'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
                    'indexes' => array(
                        'PRIMARY' => array('column' => 'id', 'unique' => 1),
                    ),
                    'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
                ),
			),
		),
		'down' => array(
			'drop_table' => array(
				'projects','project_technologies','project_resource_requirement'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
