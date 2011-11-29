<?php

class PartsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

	function key() {

        $song = $this->Part->createSong();
        $this->set('key', $song['key']);
        $this->set('mode', $song['mode']);
        $this->set('maj_min', $song['affinity']);
        $this->set('arrangement', $song['chords']);
        $this->set('tempo', $song['tempo']);
        $this->set('concepts', $song['concepts']);
        $this->set('debug', $song['debug']);
    }
}

