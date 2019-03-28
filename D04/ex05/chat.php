<?php
    date_default_timezone_set('Europe/Paris');
    if (file_exists("../private/chat"))
    {
        $messages = unserialize(file_get_contents("../private/chat"));
        foreach ($messages as $message)
            echo "[".date("H:i", $message['time'])."] <b>".$message['login']."</b>: ".$message['msg']."<br />";
    }
?>
