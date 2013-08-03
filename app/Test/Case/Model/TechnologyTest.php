<?php
App::uses('Technology', 'Model');

/**
 * Technology Test Case
 *
 */
class TechnologyTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.technology', 'app.project_resource_requirement', 'app.project', 'app.project_technology', 'app.user', 'app.role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Technology = ClassRegistry::init('Technology');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Technology);

		parent::tearDown();
	}

}
