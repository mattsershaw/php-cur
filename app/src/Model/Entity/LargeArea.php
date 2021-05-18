<?php
namespace App\Model\Entity;

// orm内のentityをuseしている
use Cake\ORM\Entity;
 
class LargeArea extends Entity
{
 
    protected $_accessible = [
        '*' => true,
        'id' => false, // 保護される(アクセスされない)
    ];
}