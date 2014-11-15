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


/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->Paginator->paginate());
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

        $options = array('conditions' => array('Tagged.foreign_key' => $id));
        $this->set('tags', $this->Article->Tagged->find('all', $options));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
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
	public function edit($id = null) {
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
	public function delete($id = null) {
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
                $r['target_domain']
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
 * @return void
 */
    private function _addArticle($article_param, $xvideo_param)
    { 
        // Xvideoのデータ挿入
        $this->_addXvideo($xvideo_param);

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
            return;
        }

        $this->Article->create();
        $this->Article->save($article_param);

        $this->log("article : save");
        return;
    }

/**
 * XVIDEOを追加するメソッド
 *
 * @throws 
 * @return void
 */
	private function _addXvideo($xvideo_param) {
        $options = array('conditions' => array('Xvideo.' . $this->Xvideo->primaryKey => $xvideo_param['Xvideo']['id']));
        $xvideo = $this->Xvideo->find('first', $options);

        if (!empty($xvideo)) {
            $this->log("xvideo : exist");
            return;
        }

        $this->Xvideo->create();
        $this->Xvideo->save($xvideo_param);

        $this->log("xvideo : save");
        return;
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
    public function getArticleParamArray($title, $video_number, $date, $xvideo_id, $tags, $target_domain) {
        return array (
                'Article' => array
                (
                    'title' => $title,
                    'video_nummber' => $video_number,
                    'date' => $date,
                    'xvideo_id' => $xvideo_id,
                    'tags' => $tags,
                    'target_domain' => $target_domain
                )
            );
    }

    // public function api_t() {

    //     $this->autoRender = false;
    //     $xvideo_param = $this->getXvideoParamArray(1, 2, 3, "01:12:12");

    //     $this->log("xvideo : save");
    //     $this->_addXvideo($xvideo_param);
    // }
}


