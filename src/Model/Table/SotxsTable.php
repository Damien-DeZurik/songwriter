<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class SotxsTable extends Table {
    public function initialize(array $config): void {
        $this->setTable('songs_weeks');
    }
}
