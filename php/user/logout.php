<?php
#Diana Malaimare
#Questa pagina effettua il logout
require_once("../db.php");
session_unset();
session_destroy();
session_start();
header("Location: ../../index.php");
?>