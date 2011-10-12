<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		Checking if session is maintained <br />
		<?php if (isset($template->user)): ?>
		 <h2>This is the show page for the user "<?php echo $template->user->username; ?>" and the id "<?php echo $template->user->id; ?>"</h2>
    			<ul>
      				<li>Name: <?php echo $template->user->email; ?></li>
      				<li>Status: <?php if(($template->user->password) == 1){ echo "Member"; } else { echo "Agent"; } ?></li>
    			</ul>
  		<?php else: ?>
    		<h2>The user with id "<?php echo $template->id; ?>" does not exist</h2>
  		<?php endif; ?>
	<?php if (isset($_SESSION['user'])){ print "<br />session is still set<br />"; }?>
       <a href="end">logout</a>
	</body>
</html>