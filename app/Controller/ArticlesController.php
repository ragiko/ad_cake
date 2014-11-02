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
	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->Paginator->paginate());

        $title = "bbb";
        $video_number = 10008; 
        $date = "2014-11-02 17:38:00";
        $tags = "teco, teshi, tema";

        $xvideo_id = 1008;
        $vote = 10;
        $view = 100;
        $time = "16:15:00";

        pr($this->_addArticle(
            $title,
            $video_number,
            $date,
            $tags,
            $xvideo_id,
            $vote,
            $view,
            $time
        ));
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
 * 記事を追加するメソッド
 *
 * @throws 
 * @param string $title : 記事のタイトル
 * @param int    $video_number : 記事のid
 * @param string $date : 記事の更新時刻 (ex-> 2014-11-02 17:38:00)
 * @param string $tags : 記事のtag : (ex-> a,b,c)
 * @param int    $xvideo_id : xvideosのid
 * @param int    $vote : xvideoの投票数
 * @param int    $view : xvideoの視聴数
 * @param string $time : xvideoの再生時間 (ex-> 16:15:00)
 * @return void
 */
    private function _addArticle(
        $title,
        $video_number,
        $date,
        $tags,
        $xvideo_id,
        $vote,
        $view,
        $time
    )
    { 

        // Xvideoのデータ挿入
        $this->_addXvideo($xvideo_id, $vote, $view, $time);

        // Articleのデータ挿入
        $options = array('conditions' => array('Article.video_nummber' => $video_number));
        $article = $this->Article->find('first', $options);

        if (!empty($article)) {
            $this->log("article : exist");
            return;
        }

        $param = array
            (
                'Article' => array
                (
                    'title' => $title,
                    'video_nummber' => $video_number,
                    'date' => $date,
                    'xvideo_id' => $xvideo_id,
                    'tags' => $tags
                )
            );

        $this->Article->create();
        $this->Article->save($param);

        $this->log("article : save");
        return;
    }

/**
 * XVIDEOを追加するメソッド
 *
 * @throws 
 * @param int    $id : xvideosのid
 * @param int    $vote : xvideoの投票数
 * @param int    $view : xvideoの視聴数
 * @param string $time : xvideoの再生時間 (ex-> 16:15:00)
 * @return void
 */
	private function _addXvideo($id, $vote, $view, $time) {
        $options = array('conditions' => array('Xvideo.' . $this->Xvideo->primaryKey => $id));
        $xvideo = $this->Xvideo->find('first', $options);

        if (!empty($xvideo)) {
            $this->log("xvideo : exist");
            return;
        }

        $param = array
        (
            'Xvideo' => array
            (
                'id' => $id,
                'vote' => $vote,
                'view' => $view,
                'time' => $time
            )
        );

        $this->Xvideo->create();
        $this->Xvideo->save($param);

        $this->log("xvideo : save");
        return;
    }
}
