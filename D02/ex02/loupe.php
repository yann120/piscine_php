#!/usr/bin/php
<?php

    function testit($arr, $beginning, $end)
    {
        $value = $beginning.strtoupper($arr[1]).$end;
        return($value);
    }

    function upper_inside($keyword, $str, $beginning, $end)
    {
        // echo $str."\n";
        // print_r(preg_split($keyword, $str));
        $str = preg_replace_callback($keyword, function ($match) use ($beginning, $end) { return testit($match, $beginning, $end); }, $str);
        // echo $str;
        // if (preg_match($keyword, $str, $match))
        // {
        //     print_r($match);
        //     $strup = strtoupper($match[1]);
        //     $str = preg_replace($keyword, $beginning.$strup.$end, $str, 1);
        //     // je remplace la string par que le contenu qui match et du coup je perd de l'info...
        // }
        return ($str);
    }

    if ($argc > 1)
    {
        $html = file_get_contents($argv[1]);
        // echo $html;
        $tab = preg_split("/\<a/", $html);
        foreach ($tab as &$line) 
        {
           if (preg_match("/(.*?)<\/a>/", $line, $match))
            {
                // echo $match[0]."\n";
                $line = upper_inside("/title=\"(.*?)\"/", $line, "title=\"", "\"");
                $line = upper_inside("/>(.*?)</", $line, ">", "<");
            }
            // echo $line."\n";            
        }
        // echo $tab[0];
        $final = implode("<a", $tab);
        echo $final."\n";
    }
?>