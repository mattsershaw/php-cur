<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{ 
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->setTable('products');
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
            ->scalar('amount')
            ->maxLength('amount', 10)
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');
     
        $validator
            ->scalar('price')
            ->maxLength('price', 10)
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->requirePresence('status', 'create')
            ->notEmpty('status');
     
        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        // nameが重複しないよう設定
        $rules->add($rules->isUnique(['name']));
        return $rules;
    }
}