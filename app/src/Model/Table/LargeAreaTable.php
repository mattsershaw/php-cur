<?php
namespace App\Model\Table;

use App\Model\Entity\Person;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
 
class LargeAreaTable extends Table
{ 
    public function initialize(array $config)
    {
        parent::initialize($config); // 親クラスの処理を呼び出す
 
        $this->table('large_area');
        $this->displayField('name');
        // タイトルのようなものとして使われるフィールド、検索したレコードを表すのに利用される
        $this->primaryKey('prefecture_id');
        // データベースのテーブル側で設定してないとダメ
    }

    // バリデーションの作成
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
     
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
     
        $validator
            ->add('age', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('age');
     
        $validator
            ->allowEmpty('mail');
     
        return $validator;
    }
}