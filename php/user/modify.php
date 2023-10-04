<?php
#Diana Malaimare

include_once("../db.php");
if(isset($_POST)){
    $newData = json_decode($_POST["info"], true);
    if(isset($newData["firstname"])){
        $firstname = $newData["firstname"];
        
        if($firstname != ""){
            $fnameletter = preg_match('/^[a-zA-Z]+$/', $firstname);
            if(!$fnameletter){
                die(json_encode(array("errorname"=>"pattern")));
            }
            $db = open_db();
            $username = $db->quote($_SESSION["username"]);
            $firstname = $db->quote($firstname);
            $db->query("UPDATE users SET firstname = $firstname WHERE users.username = $username");
            echo json_encode(array('err'=>'false'));
        }else{
            die(json_encode(array("err"=>"empty")));
        }

    }else if(isset($newData["lastname"])){
        $lastname = $newData["lastname"];

        if($lastname != ""){
            $lnameletter = preg_match('/^[a-zA-Z]+$/', $lastname);
            if(!$lnameletter){
                die(json_encode(array("errorlastn"=>"pattern")));
            }
            $db = open_db();
            $username = $db->quote($_SESSION["username"]);
            $lastname = $db->quote($lastname);
            $db->query("UPDATE users SET lastname = $lastname WHERE users.username = $username");
            echo json_encode(array('err'=>'false'));
        }else{
            die(json_encode(array("err"=>"empty")));
        }
        
    }else if(isset($newData["email"])){
        $email = $newData["email"];

        if($email != ""){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die(json_encode(array("errmail"=>"true")));
            }
            $db = open_db();
            $username = $db->quote($_SESSION["username"]);
            $email = $db->quote($email);
            $db->query("UPDATE users SET email = $email WHERE users.username = $username");
            echo json_encode(array('err'=>'false'));
        }else{
            die(json_encode(array("err"=>"empty")));
        }

    }else if(isset($newData["password"])){
        
        $password = $newData["password"];
        if($password != ""){
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
                die(json_encode(array("err"=>"pattern")));

            }
            $db = open_db();
            $username = $db->quote($_SESSION["username"]);
            $password = md5($password);
            $password = $db->quote($password);
            $db->query("UPDATE users SET password = $password WHERE users.username = $username");
            echo json_encode(array('err'=>'false'));
        }else{
            die(json_encode(array("err"=>"empty")));
        }
    }
}
?>
