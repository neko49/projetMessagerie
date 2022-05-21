<?php
//Demarrage d'une nouvelle session
session_start();

//recuperation du fichier de configuration du site.
require_once 'config/conf.inc.php';
require_once 'config/autoload.php';

// Connexion à la BdD
$Db = new DbTools();

//var_dump($Db);//montrer le pdo

//Recupération de l'URI du site pour le parsser et récupérer la page à afficher et les variables
$url = $_SERVER['REQUEST_URI'];

//parse_str($url, $output);
//var_dump($output);
$pageInfos = explode('/',$url);

//$pageTest = $_GET['page'];
//Recuperation de la variable page de l'url


$page = $pageInfos[1];
$urlId = (isset($pageInfos[2]))? $pageInfos[2] : null;

$pageName = ($page != '')? $page.'.php' : 'accueil.php';
//echo $pageName;


if(file_exists('controlers/'.$pageName)){
   
include_once 'controlers/'.$pageName;
}
else{
    include_once 'controlers/accueil.php';
}