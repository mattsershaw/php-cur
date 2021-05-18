<?php
namespace App\Controller;

use App\Controller\AppController;


use Cake\Auth\DefaultPasswordHasher; // added.
use Cake\Event\Event; // added.

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Clients[] paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{

	public function initialize()
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
        $this->loadComponent('Security');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'],
			'authenticate' => [
				'Form' => [
                    'userModel' => 'clients',
					'fields' => [
						'username' => 'name',
						'password' => 'password'
					]
				]
			],
			'loginRedirect' => [
				'controller' => 'Clients',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'controller' => 'Clients',
				'action' => 'login',
			],
            'loginAction' => '/clients/login',
			'authError' => 'ログインしてください。',
		]);
	}

	function login(){ 
		if($this->request->isPost()) {
            $client = $this->Auth->identify();
			if(!empty($client)){
				$this->Auth->setUser($client);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('ユーザー名かパスワードが間違っています。');
		}
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
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
		$clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
        $this->set('_serialize', ['clients']);
    }

    public function list()
    {
		$clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
        $this->set('_serialize', ['clients']);
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
			$client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('クライアントが登録されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('クライアントを登録できませんでした。'));
        }
        $this->set(compact('client'));
        $this->set('_serialize', ['client']);
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Auth->user('level');
        $this->set(compact('level'));
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('クライアントが編集されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('クライアントを登録できませんでした。'));
        }
        $this->set(compact('client'));
        
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('指定のクライアントが削除されました。'));
        } else {
            $this->Flash->error(__('指定のクライアントの削除ができませんでした。'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
