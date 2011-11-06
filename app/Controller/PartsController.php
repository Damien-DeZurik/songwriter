<?php

class PartsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

	function key() {
		// Pick a Key
        $key = $this->Part->getKey();
        $this->set('key', $key);

        // Pick mode
        list($maj_min, $mode) = $this->Part->getMode();
        $this->set('mode', $mode);
        $this->set('maj_min', $maj_min);

        // Get series of chords
        list($chords, $debug) = $this->Part->getChords($key, $mode);
        $this->set('arrangement', $chords);

        // Pick a speed
        $this->set('tempo', $this->Part->getTempo());

        // Grab an adverb or two
        $this->set('concepts', $this->Part->getConcepts());

        // Show debugging
        $this->set('debug', print_r($debug,true));
    }
}

