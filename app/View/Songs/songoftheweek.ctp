<h2>Song of the Week</h2>

<table>
    <?php foreach ($songoftheweek as $label => $part): ?>
    <?php if (substr($label,0,1) != '_'): ?>
    <tr>
        <td><strong><?php echo $label; ?></strong></td>
        <td width="100%"><?php echo $part; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
</table>
<div align="right">The next song will be available in <strong><em style="color:green;"><?php print $timeleft; ?></em></strong></div>


<?
    if ($loggedin && $admin) {
        print "<h3>Todo list</h3>
                $todo";
    }
?>
