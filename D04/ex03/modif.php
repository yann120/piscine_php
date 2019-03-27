<?php

    function error()
    {
        echo "ERROR\n";
        exit();
    }

    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK")
    {
        $new_credentials['login'] = $_POST['login'];
        $new_credentials['passwd'] = hash("whirlpool", $_POST['newpw']);
        $oldpw = hash("whirlpool", $_POST['oldpw']);
    }
	else
        error();
    if(!file_exists("../private") || !file_exists("../private/passwd"))
        error();
    else
    {
        $cred_array = unserialize(file_get_contents("../private/passwd"));
        foreach ($cred_array as &$cred)
        {
            if ($cred['login'] === $new_credentials['login'])
            {
                if ($oldpw === $cred['passwd'])
                {
                    $cred['login'] = $new_credentials['login'];
                    $cred['passwd'] = $new_credentials['passwd'];
                    $str = serialize($cred_array);
                    file_put_contents("../private/passwd", $str);
                    echo "OK\n";
                    exit();
                }
                else
                error();
            }
        }
        error();
    }
?>
