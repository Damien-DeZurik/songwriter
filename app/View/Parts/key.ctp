<?php

print <<<HTML
    <h2>Song Sensay</h2>

    <table>
        <tr><td width="60"><b> Key: </b></td><td> <em>$key $maj_min ($mode)</em></td></tr>
        <tr><td><b> Arrangement: </b></td><td> <em>$arrangement</em></td></tr>
        <tr><td><b> Tempo: </b></td><td> <em>$tempo</em></td></tr>
        <tr><td><b> Song concepts: </b></td><td> <em>$concepts</em></td></tr>
    </table>
    <br>
    <h4>{$this->Html->link('Try another...', array('controller' => 'parts', 'action' => 'key'))}</h4>
    <br>
    <pre>$debug</pre>
HTML;
?>


