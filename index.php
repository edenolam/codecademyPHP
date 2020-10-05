<?php

function search_file($dir,$file_to_search){

    $files = scandir($dir);

    foreach($files as $key => $value){

        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);

        if(!is_dir($path)) {

            if($file_to_search == $value){
                echo "file found<br>";
                echo $path;
                break;
            }

        } else if($value != "." && $value != "..") {

            search_file($path, $file_to_search);

        }
    }
}

search_file('/var/www/html/codecademyPHP', 'index.php');

$note1 = 10;
$note2 = 15;
$nom = "julien basquin";
$moyenne = ($note1 + $note2) / 2;
echo $nom . " a " . $moyenne . " de moyenne";


