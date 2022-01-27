<?php
session_name("SSID4ROOTS");
session_set_cookie_params(900, "/", $_SERVER['SERVER_ADDR']);
session_start();

function encode_data($data) {
	$data = stripslashes($data);
	
	return addslashes(htmlspecialchars(trim($data)));
}
if (isset($_SESSION['auth'])) {
	if ($_SESSION['auth'] == TRUE) {
		header("Location: ./rootdash.php");
		exit;
	} else {
		echo "<h2>An error has occured. We are resetting your session....</h2>";
		$_SESSION = array();
		session_destroy();
	}
} else {
	if (isset($_POST['goooo'])) {
		if (!empty($_POST['uname4root'])) {
			$u = hash("sha256", encode_data($_POST['uname4root']));
			unset($_POST['uname4root']);
		}
	
		if (!empty($_POST['passwd4root'])) {
			$p = hash("sha384", encode_data($_POST['passwd4root']));
			unset($_POST['passwd4root']);
		}
	
		if ($u == "4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2") {
			$u = TRUE;
		} else {
			$u = FALSE;
		}

		if ($p == "a4f37384a08960b815d63acecfd8a0241d67cbe32db4d4f2d5c94760c107cdb9bb70ce81cdab41955c0f428af830e9c1") {
			$p = TRUE;
		} else {
			$p = FALSE;
		}
	
		if ($u == TRUE && $p == TRUE) {
			$_SESSION['auth'] = TRUE;
			echo "<h2>Valid username and password</h2>";
			echo "<br />";
			header("Location: ./rootdash.php?from=4dm1n-rootauth.php");
			exit;
		} else {
			echo "<h2>Invalid username or password. Please try again</h2>";
			echo "<br />";
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Hacker's Network Root login page</title>
		<style type="text/css">
			@import "../Include/style.css";
		</style>
		
		<script type="text/javascript" name="JavaScript">
		function checkForm() {
			let username = document.forms["rootlogin"]["uname4root"].value;
			if (username == "") {
				document.getElementById("uname").innerHTML = "Username is required.";
				return false;
			}
			
			let password = document.forms["rootlogin"]["passwd4root"].value;
			if (password == "") {
				document.getElementById("passwd").innerHTML = "Password is required.";
				return false;
			}
		} 
		</script>
	</head>

	<body>
		<?php
		include("../Include/header.html")
		?>
		<br />
		<br />
		<form name="rootlogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return checkForm();">
		<div align="center"><h2>L0G1N - R00T</h2></div>
		<div align="center"><pre>Note: Your browser must support and enabled cookie and JavaScript to be able to login, because the login form use cookie and JS technology</pre></div>
		<br />
		<div align="center"><input type="text" name="uname4root" class="lg-form" placeholder="Enter your username" /></div>
		<br />
		<div align="center"><pre id="uname"></pre></div>
		<br />
		<div align="center"><input type="password" name="passwd4root" class="lg-form" placeholder="Enter your password" /></div>
		<br />
		<div align="center"><pre id="passwd"></pre></div>
		<br />
		<br />
		<div align="center"><input type="submit" class="button" name="goooo" value="HACK THE PLANET!"></div>
		
		<?php
		include("../Include/footer.html")
		?>
	</body>

</html>
