#!/usr/bin/php
<?php
    function upper_inside($keyword, $str, $beginning, $end)
    {
        if (preg_match($keyword, $str, $match))
        {
            $strup = strtoupper($match[1]);
            $str = preg_replace($keyword, $beginning.$strup.$end, $str, 1);
            // je remplace la string par que le contenu qui match et du coup je perd de l'info...
        }
        return ($str);
    }

    if ($argc > 1)
    {
        $html = file_get_contents($argv[1]);
        echo $html;
        $tab = preg_split("/\<a/", $html);
        foreach ($tab as &$line) 
        {
           if (preg_match("/(.*?)<\/a>/", $line, $match))
            {
                // echo $match[0]."\n";
                $line = upper_inside("/title=\"(.*?)\"/", $match[0], "title=\"", "\"");
                $line = upper_inside("/>(.*?)</", $line, ">", "<");
            }
            // echo $line."\n";            
        }
        $final = implode("<a", $tab);
        echo "\n".$final;
        // foreach ($tab as $line) {
        //     echo $line;
        // }
    }
?>