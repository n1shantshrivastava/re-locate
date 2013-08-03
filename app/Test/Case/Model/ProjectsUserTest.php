<?php
App::uses('ProjectsUser', 'Model');

/**
 * ProjectsUser Test Case
 *
 */
class ProjectsUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.projects_user', 'app.project', 'app.project_resource_requirement', 'app.technology', 'app.project_technology', 'app.user', 'app.role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjectsUser = ClassRegistry::init('ProjectsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectsUser);

		parent::tearDown();
	}

}
