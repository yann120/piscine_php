#!/usr/bin/php
<?php
    $fd = fopen("/var/run/utmpx", "r");
    $line = fread($fd, 1256);
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_ALL, 'fr_FR');
    // a256 pour avoir une string de longueur max 255 charactere (taille d'un user) +  \0
    while($line = fread($fd, 628))
    {
        $val = (unpack("a256username/a4id/a32devicename/ipid/itypeentry/itime", $line));
        echo $val['username']." ".$val['devicename']."  ".strftime("%a %d %H:%M", $val['time'])."\n";

    }
?>
