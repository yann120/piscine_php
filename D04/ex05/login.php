<?php
    include 'auth.php';
    session_start();
    if (auth($_GET['login'], $_GET['passwd']))
    {
        $_SESSION['loggued_on_user'] = $_GET['login'];
?>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
<?php
    // echo "";
    }
    else
    {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR\n";
    }

?>
