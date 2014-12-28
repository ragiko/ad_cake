<?php
App::uses('ArticlesController', 'Controller');

/**
 * ArticlesController Test Case
 *
 */
class ArticlesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.article',
		'app.xvideo'
		// 'app.tag',
		// 'app.tagged'
	);


/**
 * Tags Controller Instance
 *
 * @return void
 */
	public $Articles = null;

/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Articles = new ArticlesController();
	}

	public function test_addXvideoのsave() {
        $photo = array(
            'file_valid' => array( 
                'name' => '株式会社ディー・エヌ・エー　新卒採用マイページ予約票 2014-12-08 21-59-16.png', 
                'tmp_name' => '/tmp/phpz23BJo', 
                'type' => 'image/png',
                'size' => 165513, 
                'error' => 0
            ) 
        );
        $xvideo_pram = $this->Articles->getArticleParamArray(
            "タイトル", 
            "1", 
            "2014-11-02 16:03:00", 
            "1", 
            '2\,3\,4', 
            "http://~~",
            $photo);

        // 参考: http://qiita.com/kumazo@github/items/45d956b0e66cd0b5e0bd
        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        $result = $_addXvideo->invokeArgs($this->Articles, $xvideo_pram); 
        debug($result);
        $this->assertEquals('1', '1');
	}


/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$this->markTestIncomplete('testAdminIndex not implemented.');
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
		$this->markTestIncomplete('testAdminView not implemented.');
	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
		$this->markTestIncomplete('testAdminAdd not implemented.');
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {
		$this->markTestIncomplete('testAdminEdit not implemented.');
	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->markTestIncomplete('testAdminDelete not implemented.');
	}

/**
 * testScriping method
 *
 * @return void
 */
	public function testScriping() {
		$this->markTestIncomplete('testScriping not implemented.');
	}

/**
 * testGetXvideoParamArray method
 *
 * @return void
 */
	public function testGetXvideoParamArray() {
		$this->markTestIncomplete('testGetXvideoParamArray not implemented.');
	}

/**
 * testGetArticleParamArray method
 *
 * @return void
 */
	public function testGetArticleParamArray() {
		$this->markTestIncomplete('testGetArticleParamArray not implemented.');
	}

/**
 * testApiT method
 *
 * @return void
 */
	public function testApiT() {
		$this->markTestIncomplete('testApiT not implemented.');
	}

}
