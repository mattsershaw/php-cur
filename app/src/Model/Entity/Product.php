<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Auth\DefaultPasswordHasher;

class Product extends Entity
{
    protected $_accessible = [
        'name' => true,
        'amount' => true,
        'price' => true,
        'status' => true,
        'clients' => true,
    ];
}