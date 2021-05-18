<?php
namespace App\Model\Table;
 
use App\Model\Entity\Member;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
 
class MembersTable extends Table
{
 
    public function initialize(array $config)
    {
        parent::initialize($config);
 
        $this->table('members');
        $this->displayField('name');
        $this->primaryKey('id');
 
        $this->hasMany('Messages', [
            'foreignKey' => 'members_id'
        ]);
    }
 
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
 
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
 
        $validator
            ->allowEmpty('mail');
 
        return $validator;
    }
    public function index()
    {
        $this->set('members', $this->paginate($this->Members));
        $this->set('_serialize', ['members']);
    }
    public function view($id = null)
{
    $member = $this->Members->get($id, [
        'contain' => ['Messages']
    ]);
    $this->set('member', $member);
    $this->set('_serialize', ['member']);
}
public function add()
{
    $member = $this->Members->newEntity();
    if ($this->request->is('post')) {
        $member = $this->Members->patchEntity($member, $this->request->data);
        if ($this->Members->save($member)) {
            $this->Flash->success(__('The member has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
    }
    $this->set(compact('member'));
    $this->set('_serialize', ['member']);
}
public function edit($id = null)
{
    $member = $this->Members->get($id, [
        'contain' => []
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
        $member = $this->Members->patchEntity($member, 
            $this->request->data);
        if ($this->Members->save($member)) {
            $this->Flash->success(__('The member has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(
                __('The member could not be saved. Please, try again.'));
        }
    }
    $this->set(compact('member'));
    $this->set('_serialize', ['member']);
}
public function delete($id = null)
{
    $this->request->allowMethod(['post', 'delete']);
    $member = $this->Members->get($id);
    if ($this->Members->delete($member)) {
        $this->Flash->success(__('The member has been deleted.'));
    } else {
        $this->Flash->error(__('The member could not be deleted. Please, try again.'));
    }
    return $this->redirect(['action' => 'index']);
}
}