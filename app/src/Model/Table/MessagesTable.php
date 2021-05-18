<?php
namespace App\Model\Table;
 
use App\Model\Entity\Message;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
 
class MessagesTable extends Table
{
 
    public function initialize(array $config)
    {
        parent::initialize($config);
 
        $this->table('messages');
        $this->displayField('title');
        $this->primaryKey('id');
 
        $this->belongsTo('Members', [
            'foreignKey' => 'members_id',
            'joinType' => 'INNER'
        ]);
    }
 
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
 
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
 
        $validator
            ->allowEmpty('comment');
 
        return $validator;
    }
 
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['members_id'], 'Members'));
        return $rules;
    }
    public function index()
{
    $this->paginate = [
        'contain' => ['Members']
    ];
    $this->set('messages', $this->paginate($this->Messages));
    $this->set('_serialize', ['messages']);
}
public function view($id = null)
{
    $message = $this->Messages->get($id, [
        'contain' => ['Members']
    ]);
    $this->set('message', $message);
    $this->set('_serialize', ['message']);
}
public function add()
{
    $message = $this->Messages->newEntity();
    if ($this->request->is('post')) {
        $message = $this->Messages->patchEntity($message, $this->request->data);
        if ($this->Messages->save($message)) {
            $this->Flash->success(__('The message has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
    }
    $members = $this->Messages->Members->find('list', ['limit' => 200]);
    $this->set(compact('message', 'members'));
    $this->set('_serialize', ['message']);
}
public function edit($id = null)
{
    $message = $this->Messages->get($id, [
        'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $message = $this->Messages->patchEntity($message, $this->request->data);
        if ($this->Messages->save($message)) {
            $this->Flash->success(__('The message has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
    }
    $members = $this->Messages->Members->find('list', ['limit' => 200]);
    $this->set(compact('message', 'members'));
    $this->set('_serialize', ['message']);
}
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $message = $this->Messages->get($id);
    if ($this->Messages->delete($message)) {
        $this->Flash->success(__('The message has been deleted.'));
    } else {
        $this->Flash->error(__('The message could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
}


}