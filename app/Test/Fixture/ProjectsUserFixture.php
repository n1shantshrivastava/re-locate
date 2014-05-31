<?php
/**
 * ProjectsUserFixture
 *
 */
class ProjectsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'percentage_of_allocation' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'salary_cost' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'cost_a' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'cost_b' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'start' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'end' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'project_id' => 1,
			'user_id' => 1,
			'percentage_of_allocation' => 1,
			'salary_cost' => 1,
			'cost_a' => 1,
			'cost_b' => 1,
			'start' => '2013-08-03 09:22:18',
			'end' => '2013-08-03 09:22:18',
			'created' => '2013-08-03 09:22:18',
			'modified' => '2013-08-03 09:22:18'
		),
	);
}
