    <h2>Song Sensay</h2>

    <?php 
    print <<<HTML
    {$this->element('showsong')}
    <br>
    <h4>{$this->Html->link('Try another...', array('controller' => 'songs', 'action' => 'sensay'))}</h4>
HTML;
    ?>

