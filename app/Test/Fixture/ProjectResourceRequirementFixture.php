<?php
/**
 * ProjectResourceRequirementFixture
 *
 */
class ProjectResourceRequirementFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'project_resource_requirement';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'technology_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'no_of_resources' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'required_percentage' => array('type' => 'integer', 'null' => false, 'default' => NULL),
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
			'technology_id' => 1,
			'no_of_resources' => 1,
			'required_percentage' => 1,
			'created' => '2013-08-03 09:20:51',
			'modified' => '2013-08-03 09:20:51'
		),
	);
}
