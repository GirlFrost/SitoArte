<?php
#Diana Malaimare

#nome utente e bottone logout
include_once("db.php");
?>
<div class= "user">
    <?= $_SESSION["username"]?>
    <form action="user/logout.php" method="post">
        <input type="submit" id="logout" value="LogOut">
        <input type="hidden" name="logout" value="true">
    </form>
</div>