<?php
session_name("SSID4ROOTS");
session_set_cookie_params(900, "/", $_SERVER['SERVER_ADDR']);
session_start();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Dashboard - Hacker's Network</title>
		<style type="text/css">
			@import "../Include/style.css";
		</style>
		
	</head>

	<body>
		<?php
		include("../Include/header.html")
		?>
		<br />
		<h1>Dashboard</h1>
		
		<?php
		if ($_GET['from'] == "4dm1n-rootauth.php" || $_SESSION['getdest'] == TRUE) {
			if (isset($_SESSION['auth'])) {
				if ($_SESSION['auth'] == TRUE) {
					if (!isset($_SESSION['getdest'])) {
						$_SESSION['getdest'] = TRUE;
					}

					echo "<h2>Welcome to Hacker's Network Dashboard page!</h2>";
					echo "<h3><a href=\"root-phpinfo.php\">View PHPInfo</a></h3>";
					echo "<h3><a href=\"rootlogout.php\">Logout your current session</a></h3>";
				} else {
					echo "<h2>An error occured when verifying you. We will cancel your session</h2>";
					$_SESSION = array();
					session_destroy();
					header("Location: ../index.php");
					exit;
				}
			} else {
				echo "<h2>Authentication failed!</h2>";
				header("Location: ../index.php");
				exit;
			}
		} else {
			echo "<h2>Authentication failed because we don't know where are you come from!!</h2>";
			header("Location: ../index.php");
			exit;
		}
		?>
		
		<?php
		include("../Include/footer.html")
		?>
	</body>

</html>
