#!/usr/bin/php
<?php
    if ($argc > 2)
    {
        foreach ($argv as $i =>$arg) 
        {
            if($i > 1)
            {
                $tab = explode(":", $arg);
                if ($tab[0] == $argv[1])
                    $result = $tab[1];
            }
        }
        if (isset($result))
            echo $result."\n";
    }
?>