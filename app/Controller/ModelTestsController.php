<?php

class ModelTestsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }
    public function index() {
        $this->loadModel('Part');
        $key = $this->Part->getKey();
        pr(print_r($this->Part,true));

        $this->set('out', print_r($this->Part,true));
    }


}