<?php

print <<<HTML
    <h2>Song Sensay</h2>

    <table>
        <tr><td width="60"><b> Key: </b></td><td> <em>$key $mode</em></td></tr>
        <tr><td><b> Arrangement: </b></td><td> <em>$arrangement</em></td></tr>
        <tr><td><b> Tempo: </b></td><td> <em>$speed</em></td></tr>
        <tr><td><b> Feel: </b></td><td> <em>$feel and $feel_2</em></td></tr>
    </table>
    <br>
HTML;
?>

<h4><? print $this->Html->link('Try another...', array('controller' => 'parts', 'action' => 'key')); ?>