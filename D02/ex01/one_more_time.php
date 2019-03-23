#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        if (preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) [0-9]{1,2} ([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $argv[1]))
        {
            $mois = array(1 => "janvier", 2 => "fevrier", 3 => "mars", 4 => "avril", 5 => "mai", 6 => "juin", 7 => "juillet", 8 => "aout", 9 => "septembre", 10 => "octobre", 11 => "novembre", 12 => "decembre");
            $date = explode(" ", $argv[1]);
            $hour = explode(":", $date[4]);
            echo mktime($hour[0], $hour[1], $hour[2], array_search(strtolower($date[2]), $mois), $date[1], $date[3])."\n";
        }
        else 
            echo "Wrong Format\n";
    }
?>