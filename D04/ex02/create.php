<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
    {
        $new_credentials['login'] = $_POST['login'];
        $new_credentials['passwd'] = hash("whirlpool", $_POST['passwd']);
    }
	else
	{
		echo "ERROR\n";
		exit();
	}
    if(!file_exists("../private"))
        mkdir("../private", 0777);
    if(!file_exists("../private/passwd"))
	{
		$str = serialize(array($new_credentials));
        file_put_contents("../private/passwd", $str);
        echo "OK\n";
    }
    else
    {
        $cred_array = unserialize(file_get_contents("../private/passwd"));
        // print_r($cred_array);
        foreach ($cred_array as $cred)
        {
            if ($cred['login'] === $new_credentials['login'])
            {
                echo "ERROR\n";
                exit();
            }
        }
        $cred_array[] = $new_credentials;
        $str = serialize($cred_array);
        // echo $str;
        file_put_contents("../private/passwd", $str);
        echo "OK\n";
    }
?>
