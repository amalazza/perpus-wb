<?php
session_start();
?>
<!--endtop-->
{{H1:PHP: Reload count}}

<nowiki>
<?php
if (empty($_SESSION['counter']))
	$_SESSION['counter'] = 1;
else
	$_SESSION['counter']++;
?>
</nowiki>

You've (re-)loaded this page 
<?php echo $_SESSION['counter']; ?> times. 
Press F5 to reload it again.