<?php

App::uses('AuthComponent', 'Controller/Component');

class ModelTest extends AppModel {
    public $name = 'ModelTest';

    public function beforeSave() {
    }

}