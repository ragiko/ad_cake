<?php
App::uses('Xvideo', 'Model');

/**
 * Xvideo Test Case
 *
 */
class XvideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.xvideo',
		'app.article'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Xvideo = ClassRegistry::init('Xvideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Xvideo);

		parent::tearDown();
	}

}
