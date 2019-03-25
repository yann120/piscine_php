#!/usr/bin/php
<?php
    function download_image($img_url, $file_dest)
    {
        $c = curl_init($img_url);
        curl_setopt($c, CURLOPT_TIMEOUT, 1000);
        curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($c);
        curl_close($c);
        $folder = dirname($file_dest);
        if (!is_dir($folder))
            mkdir($folder, 0755, true);
        if (file_exists($file_dest))
            unlink($file_dest);
        $file = fopen($file_dest, 'x');
        fwrite($file, $content);
        fclose($file);
    }
    if ($argc > 1)
    {
        $c = curl_init($argv[1]);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($c, CURLOPT_TIMEOUT, 1000);
        $content = curl_exec($c);
        curl_close($c);
        preg_match_all("/<img(.*?)>/", $content, $matches);
        preg_match("/\/?(.*?)\//", strrev($argv[1]), $folder);
        $folder = strrev($folder[1]);
        foreach ($matches[1] as $line)
        {
            if (preg_match("/src=\"http/", $line))
            {
                preg_match("/src=\"(.*?)\"/", $line, $url);
                if (strpos($url[1], "?"))
                    preg_match("/[^\?]*\??(.*?)\//", strrev($url[1]), $img_name);
                else
                    preg_match("/(.*?)\//", strrev($url[1]), $img_name);
                // echo "downloading ".strrev($img_name[1])."\n";
                download_image($url[1], $folder."/".strrev($img_name[1]));
            }
        }
    }
?>
