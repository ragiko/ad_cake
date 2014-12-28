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
		'app.xvideo',
        'plugin.tags.tagged',
        'plugin.tags.tag'
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

	public function test_addXvideoのsaveが上手く行く時() {
        $xvideo_param = $this->Articles->getXvideoParamArray("2","1","1","16:15:00");

        // 参考: http://qiita.com/kumazo@github/items/45d956b0e66cd0b5e0bd
        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        // invokeのparamはarrayで囲む
        // 参考: http://phpspot.net/php/man/php/reflectionmethod.invokeargs.html
        $result = $_addXvideo->invokeArgs($this->Articles, array($xvideo_param)); 
        $this->assertEquals(true, $result);
	}

	public function test_addXvideoのsaveでxvideoのidがない() {
        $xvideo_param = $this->Articles->getXvideoParamArray("","1","1","16:15:00");

        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        $result = $_addXvideo->invokeArgs($this->Articles, array($xvideo_param)); 
        $this->assertEquals(false, $result);
	}

    public function test_addXvideoのsaveでviewのフォーマットが悪い() {
        $xvideo_param = $this->Articles->getXvideoParamArray("2","aa","1","16:15:00");

        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        $result = $_addXvideo->invokeArgs($this->Articles, array($xvideo_param)); 
        $this->assertEquals(false, $result);
    }

	public function test_addXvideoのsaveでtimeのフォーマットが悪い() {
        $xvideo_param = $this->Articles->getXvideoParamArray("2","1","1","aaa");

        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        $result = $_addXvideo->invokeArgs($this->Articles, array($xvideo_param)); 
        $this->assertEquals(false, $result);
	}

	public function test_addXvideoのsaveでparamの情報が何もない() {
        $xvideo_param = $this->Articles->getXvideoParamArray("","","","");

        $_addXvideo = new ReflectionMethod($this->Articles, '_addXvideo');
        $_addXvideo->setAccessible(true);
        $result = $_addXvideo->invokeArgs($this->Articles, array($xvideo_param)); 
        $this->assertEquals(false, $result);
	}

    public function test_addArticleでsaveが上手く行く() {
        // テストのアップロード用の画像
        copy( '/tmp/hym634t','/tmp/hym634'); 

        $photo = array(
            "name" => "test.png",
            "type" => "image/jpg",
            "tmp_name" => "/tmp/hym634" ,
            "error" => 0,
            "size" => 165513
        );

        $xvideo_param = $this->Articles->getXvideoParamArray("2","1","1","16:15:00");
        $article_param = $this->Articles->getArticleParamArray(
            "test", // title
            "1", // video number 
            "2014-11-02 16:03:00", // date
            "1",// xvideo_id, 
            "a,b,c", // tags, 
            "http://example.com", // target_domain
            $photo
        );

        $_addArticle = new ReflectionMethod($this->Articles, '_addArticle');
        $_addArticle->setAccessible(true);
        $result = $_addArticle->invokeArgs($this->Articles, array($article_param, $xvideo_param)); 
        $this->assertEquals(true, $result);
    }

    public function test_addArticleでxvideoのsaveが上手く行かないとsaveしない() {
        // テストのアップロード用の画像
        copy( '/tmp/hym634t','/tmp/hym634'); 

        $photo = array(
            "name" => "test.png",
            "type" => "image/jpg",
            "tmp_name" => "/tmp/hym634" ,
            "error" => 0,
            "size" => 165513
        );

        $xvideo_param = $this->Articles->getXvideoParamArray("","1","1","16:15:00");
        $article_param = $this->Articles->getArticleParamArray(
            "test", // title
            "1", // video number 
            "2014-11-02 16:03:00", // date
            "1",// xvideo_id, 
            "a,b,c", // tags, 
            "http://example.com", // target_domain
            $photo
        );

        $_addArticle = new ReflectionMethod($this->Articles, '_addArticle');
        $_addArticle->setAccessible(true);
        $result = $_addArticle->invokeArgs($this->Articles, array($article_param, $xvideo_param)); 
        $this->assertEquals(false, $result);
    }

    public function test_addArticleでariticleのtitleがないと保存しない() {
        // テストのアップロード用の画像
        copy( '/tmp/hym634t','/tmp/hym634'); 

        $photo = array(
            "name" => "test.png",
            "type" => "image/jpg",
            "tmp_name" => "/tmp/hym634" ,
            "error" => 0,
            "size" => 165513
        );

        $xvideo_param = $this->Articles->getXvideoParamArray("2","1","1","16:15:00");
        $article_param = $this->Articles->getArticleParamArray(
            "", // title
            "2", // video number 
            "2014-11-02 16:03:00", // date
            "2",// xvideo_id, 
            "a,b,c", // tags, 
            "http://example.com", // target_domain
            $photo
        );

        $_addArticle = new ReflectionMethod($this->Articles, '_addArticle');
        $_addArticle->setAccessible(true);
        $result = $_addArticle->invokeArgs($this->Articles, array($article_param, $xvideo_param)); 
        $this->assertEquals(false, $result);
    }

    public function test_addArticleでariticleのphotoがないと保存しない() {
        // テストのアップロード用の画像
        copy( '/tmp/hym634t','/tmp/hym634'); 

        $photo = array(
            "name" => "test.png",
            "type" => "image/jpg",
            "tmp_name" => "/tmp/hym634" ,
            "error" => 0,
            "size" => 165513
        );

        $xvideo_param = $this->Articles->getXvideoParamArray("2","1","1","16:15:00");
        $article_param = $this->Articles->getArticleParamArray(
            "a", // title
            "2", // video number 
            "2014-11-02 16:03:00", // date
            "2",// xvideo_id, 
            "a,b,c", // tags, 
            "http://example.com", // target_domain
            ""
        );

        $_addArticle = new ReflectionMethod($this->Articles, '_addArticle');
        $_addArticle->setAccessible(true);
        $result = $_addArticle->invokeArgs($this->Articles, array($article_param, $xvideo_param)); 
        $this->assertEquals(false, $result);
    }




// /**
//  * testIndex method
//  *
//  * @return void
//  */
// 	public function testIndex() {
// 		$this->markTestIncomplete('testIndex not implemented.');
// 	}
// 
// /**
//  * testView method
//  *
//  * @return void
//  */
// 	public function testView() {
// 		$this->markTestIncomplete('testView not implemented.');
// 	}
// 
// /**
//  * testAdminIndex method
//  *
//  * @return void
//  */
// 	public function testAdminIndex() {
// 		$this->markTestIncomplete('testAdminIndex not implemented.');
// 	}
// 
// /**
//  * testAdminView method
//  *
//  * @return void
//  */
// 	public function testAdminView() {
// 		$this->markTestIncomplete('testAdminView not implemented.');
// 	}
// 
// /**
//  * testAdminAdd method
//  *
//  * @return void
//  */
// 	public function testAdminAdd() {
// 		$this->markTestIncomplete('testAdminAdd not implemented.');
// 	}
// 
// /**
//  * testAdminEdit method
//  *
//  * @return void
//  */
// 	public function testAdminEdit() {
// 		$this->markTestIncomplete('testAdminEdit not implemented.');
// 	}
// 
// /**
//  * testAdminDelete method
//  *
//  * @return void
//  */
// 	public function testAdminDelete() {
// 		$this->markTestIncomplete('testAdminDelete not implemented.');
// 	}
// 
// /**
//  * testScriping method
//  *
//  * @return void
//  */
// 	public function testScriping() {
// 		$this->markTestIncomplete('testScriping not implemented.');
// 	}
// 
// /**
//  * testGetXvideoParamArray method
//  *
//  * @return void
//  */
// 	public function testGetXvideoParamArray() {
// 		$this->markTestIncomplete('testGetXvideoParamArray not implemented.');
// 	}
// 
// /**
//  * testGetArticleParamArray method
//  *
//  * @return void
//  */
// 	public function testGetArticleParamArray() {
// 		$this->markTestIncomplete('testGetArticleParamArray not implemented.');
// 	}
// 
// /**
//  * testApiT method
//  *
//  * @return void
//  */
// 	public function testApiT() {
// 		$this->markTestIncomplete('testApiT not implemented.');
// 	}
// 
}
