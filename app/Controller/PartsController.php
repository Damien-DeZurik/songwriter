<?php

class PartsController extends AppController {

	function key() {
		// pick note in 12-note scale relative to A
		$notes = array(
            'A','A',
            'A#','Bb',
            'B','Cb',
            'C','C',
            'C#','Db',
            'D','D',
            'D#','Eb',
            'E','E',
            'F','F',
            'F#','Gb',
            'G','G',
            'G#','Ab',
        );
        $note = $notes[ mt_rand(0,sizeof($notes)-1) ];
        $this->set('key', $note);

        // Pick mode
        $modes = array(
            'Major (mixolydian)',
            'Minor (aeolian)',
            'Minor (locrian)',
            'Major (ionian)',
            'Minor (dorian)',
            'Minor (phrygian)',
            'Major (lydian)',
        );
        $mode = $modes[ mt_rand(0,sizeof($modes)-1) ];
        $this->set('mode', $mode);

        // Arrangement
        // Get series of chords
        $chords = mt_rand(2,12);
        $characters = '1234567';
        $string = '';
        for ($p = 0; $p < $chords; $p++) {
            $string .= $characters[mt_rand(0, strlen($characters)-1)]." ";
        }
        $arrangement = $string;
        $this->set('arrangement', $arrangement);
	}
}

