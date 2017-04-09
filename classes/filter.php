<?php

/**
 * Created by PhpStorm.
 * User: McCouman
 * Date: 08.04.17
 * Time: 21:23
 */
class filter
{
    public $mdData;
    
    function readMD($language){
        $file = file_get_contents("../generator/md/INSTALL-" . $language . ".md");
        return $file; 
    }
    
    function saveNewHTML($language){
        $html = $this->mdData;
        $path = "../generator/html/INSTALL-" . $language . ".htm";
        //delete old files
        unlink($path);

        //create new files
        $file = fopen($path, "w") or die("Kann htm nicht schreiben!");
        fwrite($file, $html);
        fclose($file);
        return '-> Datei "INSTALL-' . $language . '.htm" erfolgreich erstellt! <br>';
    }
}