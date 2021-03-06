<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'articles', 'action' => 'add'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'view'),
            'authorize' => array('Controller') // この行を追加しました
        )
    );

    public function beforeRender()
    {
        /**
         * 管理者用レイアウトを呼び出す
         * 
         */
        // 参考: http://wataame.sumomo.ne.jp/archives/3782
        if ( Configure::read('Routing.prefixes') && !empty($this->params['admin']) ) {
            $this->layout = 'admin';
        }
    }

    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }


    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // デフォルトは拒否
        return false;
    }

}
