<?php 
$arrangement_disp = is_array($arrangement) ? implode(' ', $arrangement) : $arrangement;
$concepts_disp = '"<em>' . str_replace(', ', '"</em> and <em>"', $concepts) . '</em>"';
$scale_disp = implode(' ', array_slice(explode(' ', $scale),0,7));

?>

<table border="0">
<tbody>
    <tr>
        <td><strong>Key:</strong></td>
        <td width="100%"><?php echo "$key $affinity"; ?></td>
    </tr>
    <tr>
        <td><strong>Chords:</strong></td>
        <td width="100%"><?php echo $chords; ?></td>
    </tr>
    <tr>
        <td><strong>Lyrical Concepts:</strong></td>
        <td width="100%"><?php echo $concepts; ?></td>
    </tr>
    <tr id="morelink">
        <td></td>
        <td width="100%"><a href="javascript: document.getElementById('morelink').style.display='none'; document.getElementById('more').style.display='';">more..</a></td>
    </tr>
    <tbody id="more" style="display:none">
        <tr>
            <td><strong>Arrangement:</strong></td>
            <td width="100%"><?php echo $arrangement_disp; ?></td>
        </tr>
        <tr>
            <td><strong>Mode:</strong></td>
            <td width="100%"><?php echo $mode; ?></td>
        </tr>
        <tr>
            <td><strong>Chords Scale:</strong></td>
            <td width="100%"><?php echo $scale_disp; ?></td>
        </tr>
        <tr id="moremorelink">
            <td></td>
            <td width="100%"><a href="javascript: document.getElementById('moremorelink').style.display='none'; document.getElementById('moremoremore').style.display='';">more...</a></td>
        </tr>
    </tbody>
    <tbody id="moremoremore" style="display:none">
        <tr >
            <td><strong>Lyrics:</strong></td>
            <td width="100%">What do the words <?= $concepts_disp ?> mean to you? What other meanings can they have? Let these words drive or contribute to the lyrical story of the song.</td>
        </tr>
        <tr>
            <td><strong>What to do:</strong></td>
            <td width="100%">Write a song using these ideas. These are guidelines, use them as a statring point.</td>
        </tr>
    </tbody>
</tbody>
</table>