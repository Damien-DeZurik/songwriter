<?php
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'songs', 'action' => 'allsongs'),
            'logoutRedirect' => array('controller' => 'songs', 'action' => 'songoftheweek'),
            'authorize' => array('Controller')
        ),
    );

    function beforeFilter() {
        $this->Auth->allow('songoftheweek');

        // Set admin variable
        $this->set('admin', $this->isAdmin());

        // Set logged in
        $this->set('loggedin', $this->isLoggedIn());
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
