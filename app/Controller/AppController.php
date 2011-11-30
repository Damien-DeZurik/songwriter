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
        ),
    );

    function beforeFilter() {
        $this->Auth->allow('index', 'view');

        // Set admin variable
        $this->set('admin', $this->isAdmin());

        // Set logged in
        $this->set('loggedin', $this->isLoggedIn());

        // Song of the week
        list($year,$week) = explode('.', date("Y.W",time()));

        $this->loadModel('Part');
        $this->loadModel('Arrangement');
        $mArrangement = $this->Arrangement->find('first', array('conditions'=>array('year' => $year, 'week' => $week)));
        // 1. Determine if we have a song for this week yet
        if ($mArrangement) {
            // We have an arrangement to display
            $song = $mArrangement['Arrangement']['arrangement'];
        } else {
            // Create a new one
            $song = $this->Part->createSong();

            // Save it to db as this week's song
            $savedata = array(
                'Arrangement' => array(
                    'created'=>date("Y-m-d H:i:s", time()),
                    'arrangement'=>$song
                ),
                'Arrangements_week' => array(
                    'year'=>$year,
                    'week'=>$week,
                ),
            );
            $this->Arrangement->saveAll($savedata);
        }

        // Shows song of the week
        $songoftheweek = $this->Part->makeSongDisplayParts($song);
        $this->set('songoftheweek', $songoftheweek);

        // Calculate how much time to next song
        $nextweek = (date("W",time())) + 1;
        $curyear = date("Y",time());
        $dt = new DateTime();
        $dt->setISODate($curyear,$nextweek);
        $nexttime = $dt->format('U');
        $seconds = ($nexttime - time());
        $minutes = ($seconds / 60);
        $hours = ($minutes / 60);
        $days = ($hours / 24);
        $this->set('timeleft', "The next song will be available in $hours hours ($days days)");

        // Show existing arrangements
        $this->set('arrangements', $this->Arrangement->find('all'));

        // Show my todo list
        $list = <<<qq
            <li>Song of the week has to recover and fill in missing weeks if not gen'd
            <li>Concepts came up with same word twice.
            <li>Move uncommon code out of AppController cuz runs always
            <li>Unique constraint on week+year on arr_weeks
qq;
        $this->set('todo', $list);
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
