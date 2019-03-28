<?php
    session_start();
    if ($_SESSION['loggued_on_user'])
    {
?>

<?php
    }
    else
        echo "ERROR\n";
    if ($_SESSION['loggued_on_user'] && $_POST['submit'] === "OK")
    {
        if (file_exists("../private/chat"))
        {
            $filetolock = fopen("../private/chat", "r+");
            // if (flock($filetolock, LOCK_EX | LOCK_NB))
            // {
                // echo "BON\n";
                flock($filetolock, LOCK_EX | LOCK_SH);
                $content = unserialize(file_get_contents("../private/chat"));
                $content[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
                file_put_contents("../private/chat", serialize($content));
                flock($filetolock, LOCK_UN);
            // }
            // else
            //     echo "PAS BON\n";
        }
        else
        {
            echo "ICI\n";
            $new = array(array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']));
            file_put_contents("../private/chat", serialize($new));
        }
        echo "<script langage=\"javascript\">top.frames['chat'].location ='chat.php' ;</script>";
    }
?>
<html>
    <body>
        <form action="speak.php" method="POST">
            <input type="text" name="msg">
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
</html>
<?php
?>
