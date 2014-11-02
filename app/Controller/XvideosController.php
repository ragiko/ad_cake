<?php
App::uses('AppController', 'Controller');
/**
 * Xvideos Controller
 *
 * @property Xvideo $Xvideo
 * @property PaginatorComponent $Paginator
 */
class XvideosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Xvideo->recursive = 0;
		$this->set('xvideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Xvideo->exists($id)) {
			throw new NotFoundException(__('Invalid xvideo'));
		}
		$options = array('conditions' => array('Xvideo.' . $this->Xvideo->primaryKey => $id));
		$this->set('xvideo', $this->Xvideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Xvideo->create();
			if ($this->Xvideo->save($this->request->data)) {
				$this->Session->setFlash(__('The xvideo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The xvideo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Xvideo->exists($id)) {
			throw new NotFoundException(__('Invalid xvideo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Xvideo->save($this->request->data)) {
				$this->Session->setFlash(__('The xvideo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The xvideo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Xvideo.' . $this->Xvideo->primaryKey => $id));
			$this->request->data = $this->Xvideo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Xvideo->id = $id;
		if (!$this->Xvideo->exists()) {
			throw new NotFoundException(__('Invalid xvideo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Xvideo->delete()) {
			$this->Session->setFlash(__('The xvideo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The xvideo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
