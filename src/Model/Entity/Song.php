<?php
// src/Model/Entity/Song.php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Song extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'created' => false,
    ];
}
