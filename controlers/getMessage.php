<?php
//var_dump($_POST);
$messenger = new message();
$messages = $messenger->getAllMessagesDb();


include_once 'layouts/layoutAjax.php';



//include_once 'layouts/layoutAjax.php';

?>