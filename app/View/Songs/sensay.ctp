<?php

print <<<HTML
    <h2>Song Sensay</h2>

    <table>
        <tr><td width="60"><b> Key: </b></td><td> <em>$key $maj_min</em></td></tr>
        <tr><td><b> Mode: </b></td><td> <em>$mode</em></td></tr>
        <tr><td><b> Arrangement: </b></td><td> <em>$arrangement</em></td></tr>
        <tr><td><b> Chords: </b></td><td> <em>$chords</em></td></tr>
        <tr><td><b> Tempo: </b></td><td> <em>$tempo</em></td></tr>
        <tr><td><b> Lyrical Concepts: </b></td><td> <em>$concepts</em></td></tr>
    </table>
    <br>
    <h4>{$this->Html->link('Try another...', array('controller' => 'songs', 'action' => 'sensay'))}</h4>
HTML;
?>


