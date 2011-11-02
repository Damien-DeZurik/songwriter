<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please use a username'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please use a password'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('songwriter')),
                'message' => 'Please use a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave() {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}