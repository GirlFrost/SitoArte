<?php
#Diana Malaimare

$dbconnstring = 'mysql:dbname=art;host=localhost:3306';
$dbuser = 'root';
$dbpasswd = '';

if (!isset($_SESSION)) { session_start(); }

#Verifica se la password inserita dal utente è la stessa del database
function is_password_correct($name, $password) {
  $db = open_db();
  $name = $db->quote($name);
  $rows = $db->query("SELECT password FROM users WHERE username=$name");
  $secure = md5($password);
  if ($rows) {
    foreach ($rows as $row) {
      $correct_password = $row["password"];
      return $secure === $correct_password; #user found return true
    }
  } else {
    return FALSE;   # user not found
  }
}

#Reindirizza a login.php se l'utente non è loggato
function ensure_logged_in() {
  if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
  }
}

#Verifica se lo username è già stato preso da un altro utente
function is_username_taken($username){
  $db = open_db();
  $username = $db->quote($username);
  $rows = $db->query("SELECT username FROM users WHERE username=$username");
  $value = $rows->rowCount(); #restituisce il nr di righe
  if($value){
    return TRUE;
  }else{
    return FALSE;
  }
}

#aggiunta del nuovo utente nel database
function new_user($firstname, $lastname,$gender,$email,$username,$password){
  $db = open_db();
  $password = md5($password);
  $firstname = $db->quote($firstname);
  $lastname = $db->quote($lastname);
  $email = $db->quote($email);
  $username = $db->quote($username);
  $db -> query("INSERT INTO users (id, firstname, lastname, gender, email, username, password) VALUES (NULL, $firstname, $lastname, '$gender', $email, $username, '$password')");
}

#Prende le info dell'utente nel database
function get_user_info($username){
  $db = open_db();
  $username = $db->quote($username);
  $rows = $db->query("SELECT id, firstname, lastname, gender, email, username, password FROM users WHERE username=$username");
  
  foreach ($rows as $row) {
    $_SESSION["firstname"] = $row["firstname"];
    $_SESSION["lastname"] = $row["lastname"];
    $_SESSION["gender"] = $row["gender"];   
    $_SESSION["email"] = $row["email"];
    $_SESSION["password"] = $row["password"];
  }
}

#Interazione con database
function open_db(){
  global $dbconnstring, $dbuser, $dbpasswd;
  $db = new PDO($dbconnstring, $dbuser, $dbpasswd);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}

#Cancella tupla dal database
function delete_account_db($username){
  $db = open_db();
  $db->query("DELETE FROM users WHERE users.username = '$username'");
}
?>