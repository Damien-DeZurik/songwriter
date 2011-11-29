<?php

class Arrangement extends AppModel {
    public $name = 'Arrangement';
    public $hasOne = array('Arrangements_week');
}
