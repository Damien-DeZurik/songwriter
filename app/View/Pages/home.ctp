<?php
// $this->redirect(array('controller' => 'songs', 'action' => 'songoftheweek'));
?>

<table>
 <tr>
  <td colspan="2">
	<h3 align="center">Pick a Song Product</h3>
  </td>
 </tr>
 <tr>
  <td>
   <h2>Song of the Week</h2>
   <small><em>
	<? echo $this->Html->link('enter', array('controller' => 'songs', 'action' => 'songoftheweek')); ?>
   </em></small>
  </td>
  <td>
   <h2>All Songs</h2>
   <small><em>
	<? echo $this->Html->link('enter', array('controller' => 'songs', 'action' => 'allsongs')); ?>
   </em></small>
  </td>
 </tr>
</table>
