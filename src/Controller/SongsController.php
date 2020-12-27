<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\SongsTable;

/**
 * Songs Controller
 *
 * @property \App\Model\Table\SongsTable $Songs
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SongsController extends AppController {

    public function index() {
        $this->loadComponent('Paginator');
        $songs = $this->Paginator->paginate($this->Songs->find());
        $this->set(compact('songs'));
    }

    public function view($id = null)
    {
        $song = $this->Songs->findById((int)$id)->firstOrFail();
        $this->set(compact('song'));
    }

#    public $components = array('RequestHandler');
#    public function beforeFilter(EventInterface $event) {
#        parent::beforeFilter($event);
#        #$this->Auth->allow('songoftheweek','allsongs');
#    }

    public function allsongs() {
        $this->Songs->recursive = 0;
        $this->Songs->order = 'Song.created DESC';
        $this->set('songs', $this->paginate());
    }

    function sensay() {
        $song = json_decode($this->Song->createSong(),true);
        $this->set('key', $song['key']);
        $this->set('mode', $song['mode']);
        $this->set('affinity', $song['affinity']);
        $this->set('arrangement', $song['arrangement']);
        $this->set('chords', $song['chords']);
        $this->set('scale', $song['scale']);
        $this->set('tempo', $song['tempo']);
        $this->set('concepts', $song['concepts']);
        $this->set('debug', print_r($song['debug'],true));
    }

    public function songoftheweek() {
        // Song of the week
        list($year,$week) = explode('.', date("Y.W",time()));

        //$this->loadModel('Part');
        $this->loadModel('Sotxs');
        $mSong = $this->Sotxs
            ->find()
            ->where(['year' => $year, 'week' => $week])
            ->first();

        // 1. Determine if we have a song for this week yet
        if ($mSong && false) {
            // We have an song to display
            $song = SongsTable::normalizeArrayKeys($mSong['Song']['arrangement']);
        } else {
            // Create a new one
            $song = $this->Songs->createSong();

            $songentity = $this->Songs->newEmptyEntity();
            $songentity->created = date("Y-m-d H:i:s", time());
            $songentity->arrangement = $song;
            $songentity->year = $year;
            $songentity->week = $week;
            $newsong = $this->Songs->save($songentity);
            // debug($newsong->get('id'));

            $sotxtbl = $this->getTableLocator()->get('Sotxs');
            $sotxent = $sotxtbl->newEmptyEntity();
            $sotxent->song_id = $newsong->get('id');
            $sotxent->year = (int)$year;
            $sotxent->week = (int)$week;
            $sotxtbl->save($sotxent);

            // debug($songentity);
            // debug($sotxent);
        }

        // Shows song of the week
        $songoftheweek = $this->Songs->makeSongDisplayParts($song);
        $this->set('key', $songoftheweek['key']);
        $this->set('affinity', $songoftheweek['affinity']);
        $this->set('chords', $songoftheweek['chords']);
        $this->set('concepts', $songoftheweek['concepts']);
        $this->set('arrangement', $songoftheweek['arrangement']);
        $this->set('mode', $songoftheweek['mode']);
        $this->set('scale', SongsTable::getKeyValue($songoftheweek,'scale'));

        // Calculate how much time to next song
        $nextweek = (date("W",time())) + 1;
        $curyear = date("Y",time());
        $dt = new \DateTime('now');
        $dt->setISODate((int)$curyear,(int)$nextweek);
        $newsongtime = strtotime($dt->format('Y-m-d') . ' 00:00:00');

        // Calculate times
        $seconds = ($newsongtime - time());
        $minutes = ($seconds / 60);
        $hours = ($minutes / 60);
        $days = ($hours / 24);
        //Decide whether to show days, hours, minutes, or seconds
        $timevalue = ceil((float)$days);
        $units = (int)$timevalue == 1 ? 'day' : 'days';
        // Switch to hours
        if ($timevalue < 1.0) {
            $timevalue = (float)$hours;
            $units = (int)$timevalue == 1 ? 'hour' : 'hours';
        }
        // Switch to minutes
        if ($timevalue < 1.0) {
            $timevalue = (float)$minutes;
            $units = (int)$timevalue ? 'minute' : 'minutes';
        }
        // Switch to seconds
        if ($timevalue < 1.0) {
            $timevalue = (float)$seconds;
            $units = (int)$timevalue ? 'second' : 'seconds';
        }
        // Round timeval
        $timevalue = floor((float)$timevalue);

        $this->set('timeleft', "$timevalue $units");

        // Show existing songs
 //       $this->set('songs', $this->Songs->find('all'));

        // Show my todo list
        $list = <<<qq
	<h1>Current Release</h1>
            <ol>
            <li>Unique constraint on week+year on arr_weeks
            ideas and they save in a pagn'td list.
            <li>Unit tests, deploy
            <li>on 1/1/2012 at 5 pm it said there are 364 more days until the next song</li>
	<li>hit /songs/ and get error that the page doesn't exist. Happens prolly with any undefined page. Need custom 404
		</ol>
<br />
	<h1>Future Release</h1>
	<ol>
            <li>Concepts came up with same word twice.
            <li>have a debug controller, so I can just, when logged in, type in my
		<li>Song of the week has to recover and fill in missing weeks if not gen'd

	</ol>
qq;
        $this->set('todo', $list);
    }
}