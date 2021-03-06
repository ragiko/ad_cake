<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $uses = array('Article', 'Xvideo');

    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'scriping', 'api_t');
    }

    public $paginate = array(
        'limit' => 29
    );

	public function index() {
		$this->set('articles', $this->paginate('Article'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
		$this->set('article', $this->Article->find('first', $options));
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->set('articles', $this->Paginator->paginate());
    }



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
		$this->set('article', $this->Article->find('first', $options));

        $options = array('conditions' => array('Tagged.foreign_key' => $id));
        $this->set('tags', $this->Article->Tagged->find('all', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		}
		$xvideos = $this->Article->Xvideo->find('list');
		$this->set(compact('xvideos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		$xvideos = $this->Article->Xvideo->find('list');
		$this->set(compact('xvideos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('The article has been deleted.'));
		} else {
			$this->Session->setFlash(__('The article could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * スクレイピングした記事を保存する(POST)
 * @throws 
 * @post title : 記事のタイトル
 * @post video_number : 記事のid
 * @post date : 記事の更新時刻 (ex-> 2014-11-02 17:38:00)
 * @post tags : 記事のtag : (ex-> a,b,c)
 * @post xvideo_id : xvideosのid
 * @post vote : xvideoの投票数
 * @post view : xvideoの視聴数
 * @post time : xvideoの再生時間 (ex-> 16:15:00)
 * @return void
 */
	public function scriping()
    {
        $this->autoRender = false;

		if ($this->request->is('post')) {

            $r = $this->request->data;

            $article_param = $this->getArticleParamArray(
                $r['title'], 
                $r['video_number'], 
                $r['date'], 
                $r['xvideo_id'], 
                $r['tags'], 
                $r['target_domain'],
                $_FILES['photo']
            );
            $xvideo_param = $this->getXvideoParamArray(
                $r['xvideo_id'],
                $r['vote'],
                $r['view'],
                $r['time']
            );

            $this->_addArticle($article_param, $xvideo_param);
        }
    }


/**
 * 記事を追加するメソッド
 *
 * @throws 
 * @return saveが完了したか? (existしているときもtrue)
 */
    private function _addArticle($article_param, $xvideo_param)
    { 
        $this->log($xvideo_param);
        // Xvideoのデータ挿入
        $saved = $this->_addXvideo($xvideo_param);
        if (!$saved) { 
            return false; 
        }

        // Articleのデータ挿入
        $options = array('conditions' => 
            array(
                'Article.video_nummber' => $article_param['Article']['video_nummber'],
                'Article.xvideo_id' => $article_param['Article']['xvideo_id']
            )
        );
        $article = $this->Article->find('first', $options);

        if (!empty($article)) {
            $this->log("article : exist");
            return true;
        }

        $this->Article->create();

            $this->log($article_param);
		if ($this->Article->save($article_param)) {
            $this->log("article : save");
            return true;
		} else {
            $this->log("articles: save error");
            $this->log($this->Article->validationErrors);
            return false;
		}

    }

/**
 * XVIDEOを追加するメソッド
 *
 * @throws 
 * @return addできた => true, addできない => false
 */
	private function _addXvideo($xvideo_param) {
        $this->log($xvideo_param);
        // 空白チェック
        if (empty($xvideo_param['Xvideo']['id'])) {
            $this->log("xvideos: save error");
            $this->log($this->Xvideo->validationErrors);

            return false;
        }

        $options = array('conditions' => array('Xvideo.' . $this->Xvideo->primaryKey => $xvideo_param['Xvideo']['id']));
        $xvideo = $this->Xvideo->find('first', $options);

        if (!empty($xvideo)) {
            $this->log("xvideos: exist");

            return true;
        }

        $this->Xvideo->create();
		if ($this->Xvideo->save($xvideo_param)) {
            $this->log("xvideos: save");

            return true;
		} else {
            $this->log("xvideos: save error");
            $this->log($this->Xvideo->validationErrors);

            return false;
		}
    }


/**
 * Xvideoモデルのsave用parameter作成
 *
 * @throws 
 * @return void
 */
	public function getXvideoParamArray($id, $vote, $view, $time) {
        return array (
            'Xvideo' => array
            (
                'id' => $id,
                'vote' => $vote,
                'view' => $view,
                'time' => $time
            )
        );
    }

/**
 * 記事モデルのsave用parameter作成
 *
 * @throws 
 * @return void
 */
    public function getArticleParamArray($title, $video_number, $date, $xvideo_id, $tags, $target_domain, $photo) {
        return array (
                'Article' => array
                (
                    'title' => $title,
                    'video_nummber' => $video_number,
                    'date' => $date,
                    'xvideo_id' => $xvideo_id,
                    'tags' => $tags,
                    'target_domain' => $target_domain,
                    'photo' => $photo,
                    'photo_dir' => '' // 簡単のために
                )
            );
    }

    // public function api_t() {

    //     $this->autoRender = false;
    //     $xvideo_param = $this->getXvideoParamArray(1, 2, 3, "01:12:12");

    //     $this->log("xvideo : save");
    //     $this->_addXvideo($xvideo_param);
    // }

    public function api_t() {
        $this->autoRender = false;
        $r = $this->request->data;
        $this->log($_FILES['photo']);
        $this->log($r);
    }
}


