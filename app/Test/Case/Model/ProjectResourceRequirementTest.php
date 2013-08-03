<?php
App::uses('ProjectResourceRequirement', 'Model');

/**
 * ProjectResourceRequirement Test Case
 *
 */
class ProjectResourceRequirementTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.project_resource_requirement', 'app.project', 'app.project_technology', 'app.technology');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProjectResourceRequirement = ClassRegistry::init('ProjectResourceRequirement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProjectResourceRequirement);

		parent::tearDown();
	}

}
