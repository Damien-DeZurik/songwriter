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
        $mode = $this->Part->getMode();
        $this->set('mode', $mode);

        // Get series of chords
        $this->set('arrangement', $this->Part->getChords($key, $mode));

        // Pick a speed
        $this->set('tempo', $this->Part->getTempo());

        // Grab an adverb or two
        $this->set('concepts', $this->Part->getConcepts());
	}
}

