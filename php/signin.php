<?php
#Diana Malaimare

include("../html/top.html");
if (!isset($_SESSION)) { session_start(); }
if(isset($_SESSION["username"])){
    header("Location: home.php");
}

?>
    <div id="warning">"You must log in before you can visit site."</div>
    <div id="err"></div>

<div class="box">
    <form action="user/signup.php" method="post">
        <fieldset>
            <legend>Registration</legend>
            Please fill in this form to create an account.
            <br><br>
            First name*: <br> 
            <input type="text" name="firstname" id="firstname" pattern="[a-zA-Z]*" required><br> <br>
            Last name*: <br>
            <input type="text" name="lastname" id="lastname" required><br> <br>
            Gender: <input type="radio" name="gender" id="male" value="M"> Male 
            <input type="radio" name="gender" id="female" value="F"> Female
            <br> <br>
            Email*: <br> 
            <input type="email" id="email" name="email" placeholder="example@example.com" required><br> <br>
            Username*: <br>
            <input type="text" name="username" id="username" required> <br> <br>
            Password*: <br>
            <input type="password" name="password" id="password" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required> <br> <br>
            Repeat Password*: <br>
            <input type="password" name="repeat" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> <br> <br>

            <button type="submit" class = "log" id = "submitsign">Submit</button>
            <button type="reset" class = "log">Reset</button>
        </fieldset>
        <br> Already have an account? <a href="../index.php">Log in.</a> 
    </form>
</div>