<h2>Song of the Week</h2>

<table border="0">
<tbody>
    <tr>
        <td><strong>Key</strong></td>
        <td width="100%"><?php echo "$key $affinity"; ?></td>
    </tr>
    <tr>
        <td><strong>Chords</strong></td>
        <td width="100%"><?php echo $chords; ?></td>
    </tr>
    <tr>
        <td><strong>Lyrical Concepts</strong></td>
        <td width="100%"><?php echo $concepts; ?></td>
    </tr>
	<tr id="morelink">
		<td></td>
		<td width="100%"><a href="javascript: document.getElementById('morelink').style.display='none'; document.getElementById('more').style.display='block';">[+]</a></td>
	</tr>
    <tbody id="more" style="display:none">
        <tr>
            <td><strong>Arrangement</strong></td>
            <td width="100%"><?php echo $arrangement; ?></td>
        </tr>
        <tr id="moremorelink">
            <td></td>
            <td width="100%"><a href="javascript: document.getElementById('moremorelink').style.display='none'; document.getElementById('moremoremore').style.display='block';">[++]</a></td>
        </tr>
    </tbody>
    <tbody id="moremoremore" style="display:none">
        <tr >
            <td><strong>Lyrics</strong></td>
            <td width="100%">Think about what "<?= $concepts ?>" mean to you. What other meanings can they have? Can you fit it into a song?</td>
        </tr>
        <tr>
            <td><strong>What to do</strong></td>
            <td width="100%">Write a song using these ideas. Don't feel like you must stick stick to the arrangement exactly. Explore your creativity letting your rhythm lead.</td>
        </tr>
    </tbody>
</tbody>
</table>

<div align="right">The next song will be available in <strong><em style="color:green;"><?php print $timeleft; ?></em></strong></div>


<?
    if ($loggedin && $admin) {
        print "<h3>Todo list</h3>
                $todo";
    }
?>
