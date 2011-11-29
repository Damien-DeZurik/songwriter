<?php

class ModelTestsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }
    public function index() {
        // =========================================================
        // Arrangement
        //

        //$this->loadModel('Arrangements_week');
        //$out  = "<h1>Data</h1> "     . print_r($this->Arrangements_week->find('all'),true);
        $this->loadModel('Arrangement');

        $out  = "<h1>Data</h1> "     . print_r($this->Arrangement->find('first', array(
            'conditions' => array(
                'week' => '50',
        ))),true);

        /*
        $out  = "<h1>Data</h1> "     . print_r(
            $this->Arrangement->find('first', array(
                'contain' => array('Arrangement_weeks'),
             ))
        ,true);
        */

        /*
        // =========================================================
        // Part
        //

        $this->loadModel('Part');
        $out = print_r($this->Part,true);
        */

        // =========================================================
        // Dump out $out
        pr($out);
        $this->set('out', $out);
    }


}