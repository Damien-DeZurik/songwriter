<?php

class ArrangementsController extends AppController {

    public $components = array('RequestHandler');
    function beforeFilter() {
        $this->RequestHandler->setContent('json', 'text/x-json');
    }

    public function index() {
        $this->Arrangement->recursive = 0;
        $this->set('arrangements', $this->paginate());
    }
}