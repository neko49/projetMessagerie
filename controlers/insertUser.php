<?php

$user = new user();
$user->setUserFromPost();
$user->addUserToDb();


var_dump($_POST);

echo 'insertion utilisateurs ok';

include_once 'layouts/layoutAjax.php';





?>