<?php
namespace App\Controller;

use App\Controller\AppController;


use Cake\Auth\DefaultPasswordHasher; // added.
use Cake\Event\Event; // added.

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $pProducts
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

	public function initialize()
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'],
			'authenticate' => [
				'Form' => [
					'fields' => [
						'name' => 'name',
						'password' => 'password'
					]
				]
			],
			'logoutRedirect' => [
				'controller' => 'Clients',
				'action' => 'login',
			],
			'authError' => 'ログインしてください。',
		]);
	}
	
	public function logout() {
		$this->request->session()->destroy();
		return $this->redirect($this->Auth->logout());
	}

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['login']);
	}
	
    public function isAuthorized($client) {
        return true;
    }

		/**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
			$product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('在庫が登録されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('在庫を登録できませんでした。'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('在庫が編集されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('在庫を登録できませんでした。'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);

        $level = $this->Auth->user('level');
        $this->set(compact('level'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Products->get($id);
        if ($this->Products->delete($user)) {
            $this->Flash->success(__('指定の在庫が削除されました。'));
        } else {
            $this->Flash->error(__('指定の在庫の削除ができませんでした。'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function export($id = null)
    {
        $table = $this->Products->find('all');
        $_serialize = 'table';
        $_header = ['id','name','amount', 'price', 'status'];
        $_extract = ['id','name','amount', 'price', 'status'];

        // 文字コード変換の関数指定
        $_extension = 'mbstring';

        // 変換前の文字エンコーディング
        $_dataEncoding = 'UTF-8';

        // 出力文字エンコーディング
        $_csvEncoding = 'sjis-win';

        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('table', '_serialize', '_header', '_extract', '_extension', '_dataEncoding', '_csvEncoding'));
    }
}
