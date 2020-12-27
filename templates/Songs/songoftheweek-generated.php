<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 */
?>


<h2>Song of the Week</h2>

<div align="right">Next song <strong><em style="color:green;"><?php print $timeleft; ?></em></strong></div>

<?
    if ($loggedin && $admin) {
        print "<h3>Todo list</h3>
                $todo";
    }
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Song'), ['action' => 'edit', $song->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Song'), ['action' => 'delete', $song->id], ['confirm' => __('Are you sure you want to delete # {0}?', $song->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="songs view content">
            <h3><?= h($song->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Arrangement') ?></th>
                    <td><?= h($song->arrangement) ?></td>
                </tr>
                <tr>
                    <th><?= __('Song Of The Week') ?></th>
                    <td><?= $song->has('song_of_the_week') ? $this->Html->link($song->song_of_the_week->id, ['controller' => 'Sotxs', 'action' => 'view', $song->song_of_the_week->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($song->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($song->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
