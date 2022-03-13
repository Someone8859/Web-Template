<?php
session_name("SSID4ROOTS");
session_set_cookie_params(900, "/", $_SERVER['SERVER_ADDR']);
session_start();


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
		if (isset($_SESSION['auth'])) {
			if ($_SESSION['auth'] == TRUE) {
				echo "<h2>Logging out... you will be redirect to home page</h2>";
				$_SESSION = array();
				session_destroy();
				header("Location: ../index.php");
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
		?>
		
		<?php
		include("../Include/footer.html")
		?>
	</body>

</html>
