#!/usr/bin/php
<?php
    if($argc == 4)
    {
        $tab = [];
        foreach ($argv as $i => $value) 
            $tab[$i] = trim($value);
        if ($tab[2] == "+")
            echo $tab[1] + $tab[3];
        else if ($tab[2] == "-")
            echo $tab[1] - $tab[3];
        else if ($tab[2] == "*")
            echo $tab[1] * $tab[3];
        else if ($tab[2] == "/")
            echo $tab[1] / $tab[3];
        else if ($tab[2] == "%")
            echo $tab[1] % $tab[3];
        echo "\n";
    }
    else
        echo "Incorrect Parameters\n";
?>