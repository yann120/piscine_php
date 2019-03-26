<?php
    if ($_GET['action'] == "set" && $_GET['name'] && $_GET['value'])
		setcookie($_GET['name'], $_GET['value']);
	else if ($_GET['action'] == "get" && $_GET['name'])
	{
		$cookiename = $_GET['name'];
		if ($_COOKIE[$cookiename])
			echo $_COOKIE[$cookiename]."\n";
	}
	else if ($_GET['action'] == "del" && $_GET['name'])
		setcookie($_GET['name'], "", time() - 3600);
?>
