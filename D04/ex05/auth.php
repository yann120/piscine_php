<?php
    function auth($login, $passwd)
    {
        $cred_array = unserialize(file_get_contents("../private/passwd"));
        $hash_pwd = hash("whirlpool", $passwd);
        foreach ($cred_array as $cred)
        {
            if ($cred['login'] === $login)
            {
                if ($cred['passwd'] === $hash_pwd)
                    return(TRUE);
                else
                    return (FALSE);
            }
        }
        return (FALSE);
    }
?>
