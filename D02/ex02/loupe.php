#!/usr/bin/php
<?php
    function upperbetween($arr, $beginning, $end)
    {
        $value = $beginning.strtoupper($arr[1]).$end;
        return($value);
    }
    function upper_inside($keyword, $str, $beginning, $end)
    {
        $str = preg_replace_callback($keyword, function ($match) use ($beginning, $end) { return upperbetween($match, $beginning, $end); }, $str);
        return ($str);
    }
    if ($argc > 1)
    {
        $html = file_get_contents($argv[1]);
        $tab = preg_split("/\<a/", $html);
        foreach ($tab as &$line) 
        {
           if (preg_match("/(.*?)<\/a>/", $line, $match))
            {
                $line = upper_inside("/title=\"(.*?)\"/", $line, "title=\"", "\"");
                $line = upper_inside("/>(.*?)</", $line, ">", "<");
            }    
        }
        $final = implode("<a", $tab);
        echo $final."\n";
    }
?>