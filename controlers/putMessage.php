<?php
//var_dump($_POST);
$messenger = new message();
$messenger->setMessageFromPost();
$messenger->addMessageToDb();





//include_once 'layouts/layoutAjax.php';

?>