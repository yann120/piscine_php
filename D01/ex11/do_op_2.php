#!/usr/bin/php
<?php
    if($argc == 2)
    {
        $str = str_replace(' ', '', $argv[1]);
        $str = str_replace('\t', '', $str);
        if (strpos($str, "*"))
        {
            $tab = explode("*", $str);
			array_push($tab, "*");
        }
        else if (strpos($str, "/"))
        {
            $tab = explode("/", $str);
			array_push($tab, "/");
        }
        else if (strpos($str, "-"))
        {
            $tab = explode("-", $str);
			array_push($tab, "-");
        }
        else if (strpos($str, "+"))
        {
            $tab = explode("+", $str);
            array_push($tab, "+");
        }
        else if (strpos($str, "%"))
        {
            $tab = explode("%", $str);
            array_push($tab, "%");
        }
        else
        {
            echo "Syntax Error\n";
            exit();
        }
        if (count($tab) != 3 || !ctype_digit($tab[0]) || !ctype_digit($tab[1]))
        {
            echo "Syntax Error\n";
            exit();
        }
        if ($tab[2] == "+")
            echo $tab[0] + $tab[1];
        else if ($tab[2] == "-")
            echo $tab[0] - $tab[1];
        else if ($tab[2] == "/")
            echo $tab[0] / $tab[1];
        else if ($tab[2] == "*")
            echo $tab[0] * $tab[1];
        else if ($tab[2] == "%")
            echo $tab[0] % $tab[1];
        echo "\n";
    }
    else
        echo "Incorrect Parameters\n";
?>