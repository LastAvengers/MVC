<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<?php
			$host = "yallara.cs.rmit.edu.au";
			$user = "root";
			$pass = "sqlworld";

			$username = $_POST[user];
			$password = trim($_POST[pw]);


			
			$now = time();

			$salt = hash("sha256", "{$username}{$now}");
			$pw_hash = hash("sha256", "{$salt}{$password}");
			print $pw_hash;
			try
			{
				$dbh = new PDO("mysql:host=$host;port=55603;dbname=travelsmart",$user,$pass);  
				$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 
				if(isset($_POST[user]) && isset($_POST[pw]))
  				{
					$g1 = "INSERT INTO account VALUE ('$_POST[email]','$pw_hash','$salt',1,'$username')";
					$result = $dbh->query($g1);
					<a href = "front.php"> Login</a>
				}
			}
  			catch(PDOException $e)
 			{
				echo $e->getMessage();
  			}
		?>
	</body>
</html>