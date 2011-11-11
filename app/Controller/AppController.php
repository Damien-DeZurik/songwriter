<?php
//App::uses('Controller', 'Controller');
class AppController extends Controller {
    //...

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'parts', 'action' => 'key'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authorize' => array('Controller') // Added this line
        )
    );

    function beforeFilter() {
        $this->Auth->allow('index', 'view');

        // Set admin variable
        $this->set('admin', $this->isAdmin());

        // Set logged in
        $this->set('loggedin', $this->isLoggedIn());

	// Mode
	$this->loadModel('Part');
	list($maj_min, $mode) = $this->Part->getMode();
	$key = $this->Part->getKey();
	$this->set('key', "$key $maj_min ($mode)");

	// Set the daily arrangements
	$this->loadModel('Arrangement');
	$this->set('arrangements', $this->Arrangement->find('all'));
    }

    private function isAdmin() {
        if ($this->Auth->user('role') == 'admin') {
            return true;
        }
        return false;
    }

    private function isLoggedIn() {
        return $this->Auth->user();
    }

    function isAuthorized($user) {
        if (isset($this->request->params['admin'])) {
            return (bool)($user['role'] == 'admin');
        }
        return true;
    }
}