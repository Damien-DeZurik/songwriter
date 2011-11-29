
<h3>Song of the Week</h3>
<table>
    <?php foreach ($songparts as $label => $part): ?>
    <?php if (substr($label,0,1) != '_'): ?>
    <tr>
        <th><?php echo $label; ?></th>
        <td><?php echo $part; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
</table>

<h3>Full</h3>
<? print $debug; ?>
<br >
<br >
<br>

<h3>Todo list</h3>
<? print $todo; ?>
<br >
<br >
<br>



<h3>Archive</h3>
<table>
    <tr>
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
			foreach ($parts as $k=>$v) {
				print "<strong>$k</strong> <em>$v</em><br/>";
			}
			?>
		</td>
	</tr>
	<? endforeach; ?>
</table>
