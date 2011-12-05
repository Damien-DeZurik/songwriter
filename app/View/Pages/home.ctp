
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

<h3>Archive</h3>
<table>
    <tr>
        <th>oOo</th>
        <th>oOo</th>
        <th>oOo</th>
    </tr>
	<?php foreach ($arrangements as $arrangement): ?>
	<tr>
		<td><? 
			// Fixme - format in mysql
			echo date("F Y", strtotime($arrangement['Arrangement']['created'])); 
		?></td>
		<td>
			<?
			$parts = json_decode($arrangement['Arrangement']['arrangement'], true);
            $debug = $parts['_debug'];
            unset($parts['_debug']);

            foreach ($parts as $k=>$v) {
				print "<strong>$k</strong> <em>$v</em><br/>";
			}
			?>
		</td>
        <td>
            <?
            foreach ($debug as $k=>$v) {
                print "&nbsp;&nbsp;&nbsp;&nbsp;<small>$k: '<em>$v</em>'</small><br />";
            }
            ?>
        </td>
	</tr>
	<? endforeach; ?>
</table>


<h3>Todo list</h3>
<? print $todo; ?>
<br >
<br >
<br>
