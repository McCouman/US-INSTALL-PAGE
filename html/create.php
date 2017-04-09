<?php
//md download                               !!!! erst einmal zum entwickeln ausgeschaltet !!!!
#include_once ("../classes/install.php");
#$install = new install();
#$install->install_md("3.0.3");


//read md files an create html
include_once("../classes/filter.php");
include_once("../classes/mdparser.php");

$Parsedown = new Parsedown();
$filter = new filter();

//de
$filter->mdData = $Parsedown->text($filter->readMD("DE"));
echo $filter->saveNewHTML("DE");

//en
$filter->mdData = $Parsedown->text($filter->readMD("EN"));
echo $filter->saveNewHTML("EN");
