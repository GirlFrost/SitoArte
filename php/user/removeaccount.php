<?php
#Diana Malaimare

#Cancella account utente
require_once("../db.php");
$username = $_SESSION["username"];
delete_account_db($username);
include("logout.php");
?>