<?php
#Diana Malaimare

require_once("../db.php");
$newUser = json_decode($_POST["info"], true);

$firstname = $newUser["firstname"];
$lastname = $newUser["lastname"];
$gender = $newUser["gender"];
$email = $newUser["email"];
$username = $newUser["username"];
$password = $newUser["password"];
$repeat = $newUser["repeat"];

if( !empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email) && !empty($username) && !empty($repeat) ){
    if($password != $repeat){
        die(json_encode(array("errorpassword"=>"true")));
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(json_encode(array("errmail"=>"true")));
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    $fnameletter = preg_match('/^[a-zA-Z]+$/', $firstname);
    $lnameletter = preg_match('/^[a-zA-Z]+$/', $lastname);

    if(!$fnameletter || !$lnameletter){
        die(json_encode(array("errorname"=>"pattern")));
    }

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
        die(json_encode(array("errorpassword"=>"pattern")));
    }
    if(!is_username_taken($username)){
        new_user($firstname,$lastname,$gender,$email,$username,$password);
        $_SESSION["username"] = $username;
        echo json_encode(array("errorpassword"=>"false"));
        
    }
}else{
    die(json_encode(array("error"=>"empty")));
}
#errore generico
?>