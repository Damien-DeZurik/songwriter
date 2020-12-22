<!-- File: templates/songs/view.php -->

<h1>Arrangement</h1>
<br/>
<p><?= h($song->body) ?></p>
<p><small>Created: <?= $song->created->format(DATE_RFC850) ?></small></p>
<p><big><code><?= $song->arrangement ?></code></big></p>
<br/>
<br/>
<br/>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $song->id]) ?></p>
