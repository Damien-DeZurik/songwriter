<?php
// src/Model/Entity/Sots.php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Sotx extends Entity
{
    protected $_accessible = [
        '*' => true,
        'year' => true,
    ];
}
