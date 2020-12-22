<?php

?>

<h2>Song of the Week</h2>

<? print $this->element('showsong'); ?>

<div align="right">Next song <strong><em style="color:green;"><?php print $timeleft; ?></em></strong></div>

<?
    if ($loggedin && $admin) {
        print "<h3>Todo list</h3>
                $todo";
    }
?>
