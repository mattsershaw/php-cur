<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;

class Client extends Entity
{
    protected $_accessible = [
        'name' => true,
        'password' => true,
        'level' => true,
        'products' => true
    ];

    protected $_hidden = [
        'password'
    ];

    // パスワードのハッシュ化
    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
}