<h3>Song of the Week</h3>
<table>
    <?php foreach ($songoftheweek as $label => $part): ?>
    <?php if (substr($label,0,1) != '_'): ?>
    <tr>
        <th><?php echo $label; ?></th>
        <td width="100%"><?php echo $part; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
</table>
<div align="right">The next song will be available in <strong><em style="color:green;"><?php print $timeleft; ?></em></strong></div>


<h3>Todo list</h3>
<? print $todo; ?>
<br >
<br >
<br>
