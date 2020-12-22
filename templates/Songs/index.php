<h1>Songs</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Created</th>
    </tr>

    <?php foreach ($songs as $song): ?>
    <tr>
        <td>
            <?= $this->Html->link($song->id, ['action' => 'view', $song->id]) ?>
        </td>
        <td>
            <?= $song->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
