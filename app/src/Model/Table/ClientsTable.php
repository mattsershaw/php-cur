<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientsTable extends Table
{ 
    public function initialize(array $config)
    {
        // 親クラスの処理を呼び出す
        parent::initialize($config);
 
        $this->setTable('clients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
     
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');
     
        $validator
            ->scalar('password')
            ->maxLength('password', 20)
            ->requirePresence('password', 'create')
            ->notEmpty('password');
     
        $validator
            ->scalar('level')
            ->maxLength('level', 1)
            ->requirePresence('level', 'create')
            ->notEmpty('level');
     
        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        // nameが重複しないよう設定
        $rules->add($rules->isUnique(['name']));
        return $rules;
    }
}