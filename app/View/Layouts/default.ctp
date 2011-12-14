<?php

$title = "Songwriter";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
                <?
                //echo $this->Html->link('Home', array('controller' => '/'));
                echo $this->Html->link('Song of the Week', array('controller' => 'songs', 'action' => 'songoftheweek'));

                if ($loggedin) {
                    echo ' | ' . $this->Html->link('Sensay', array('controller' => 'songs', 'action' => 'sensay'));
                    echo ' | ' . $this->Html->link('All Songs', array('controller' => 'songs', 'action' => 'allsongs'));
                    if ($admin) {
                        echo ' | ' . $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'));
                        echo ' | ' . $this->Html->link('Register', array('controller' => 'users', 'action' => 'add'));
                    }
                    echo
                        '<div style="float:right;">'
                        . $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))
                        . '</div>';
                } else {
                    echo
                        '<div style="float:right;">'
                        . $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'))
                        . '</div>';
                }

                ?>
                </div>
            </h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> 'Cake', 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>