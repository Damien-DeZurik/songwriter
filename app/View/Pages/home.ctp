<h3>Song for the week</h3>
<? print $key; ?>
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
