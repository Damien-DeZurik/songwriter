<?php

class SongsController extends AppController {

    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function allsongs() {
        $this->Song->recursive = 0;
        $this->set('songs', $this->paginate());
    }

    function sensay() {
        $song = json_decode($this->Song->createSong(),true);
        $this->set('key', $song['_key']);
        $this->set('mode', $song['_mode']);
        $this->set('maj_min', $song['_affinity']);
        $this->set('arrangement', $song['_debug']['Arrangement']);
        $this->set('chords', $song['_chords']);
        $this->set('tempo', $song['_tempo']);
        $this->set('concepts', $song['_concepts']);
        $this->set('debug', print_r($song['_debug'],true));
    }

    public function songoftheweek() {
        // Song of the week
        list($year,$week) = explode('.', date("Y.W",time()));

        //$this->loadModel('Part');
        $this->loadModel('Song');
        $mSong = $this->Song->find('first', array('conditions'=>array('year' => $year, 'week' => $week)));
        // 1. Determine if we have a song for this week yet
        if ($mSong) {
            // We have an song to display
            $song = $mSong['Song']['arrangement'];
        } else {
            // Create a new one
            $song = $this->Song->createSong();

            // Save it to db as this week's song
            $savedata = array(
                'Song' => array(
                    'created'=>date("Y-m-d H:i:s", time()),
                    'arrangement'=>$song
                ),
                'Songs_week' => array(
                    'year'=>$year,
                    'week'=>$week,
                ),
            );
            $this->Song->saveAll($savedata);
        }

        // Shows song of the week
        $songoftheweek = $this->Song->makeSongDisplayParts($song);
        $this->set('songoftheweek', $songoftheweek);

        // Calculate how much time to next song
        $nextweek = (date("W",time())) + 1;
        $curyear = date("Y",time());
        $dt = new DateTime('now');
        $dt->setISODate($curyear,$nextweek);
        $newsongtime = strtotime($dt->format('Y-m-d') . ' 00:00:00');
        // Calculate times
        $seconds = ($newsongtime - time());
        $minutes = ($seconds / 60);
        $hours = ($minutes / 60);
        $days = ($hours / 24);
        //Decide whether to show days, hours, minutes, or seconds
        $timevalue = (float)$days;
        $units = 'days';
        // Switch to hours
        if ($timevalue < 1.0) {
            $timevalue = (float)$hours;
            $units = 'hours';
        }
        // Switch to minutes
        if ($timevalue < 1.0) {
            $timevalue = (float)$minutes;
            $units = 'minutes';
        }
        // Switch to seconds
        if ($timevalue < 1.0) {
            $timevalue = (float)$seconds;
            $units = 'seconds';
        }
        // Round timeval
        $timevalue = floor((float)$timevalue);

        $this->set('timeleft', "$timevalue $units");

        // Show existing songs
        $this->set('songs', $this->Song->find('all'));

        // Show my todo list
        $list = <<<qq
            <li>Song of the week has to recover and fill in missing weeks if not gen'd
            <li>Concepts came up with same word twice.
            <li>Move uncommon code out of AppController cuz runs always
            <li>Unique constraint on week+year on arr_weeks
qq;
        $this->set('todo', $list);
    }
}
