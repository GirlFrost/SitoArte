<?php
#Diana Malaimare

include("../html/top.html");
include("db.php");
include("user/userlog.php");

ensure_logged_in();
if(!isset($_SESSION)){
    session_start();
}
get_user_info($_SESSION["username"]);
if($_SESSION["gender"] == 'F'){
    $gender = "Female";
}else{
    $gender = "Male";
}
?>
<p class="intestazion">Summary information</p>
<span class ="yourinfo">Your Information</span>
<div class= "container">
    <div class="info">


      <p>First name: <?=$_SESSION["firstname"]?></p>
      <button class = "log" id = "modfirstname">L</button>
      <span class = "hiddenmodify">
        <input type="text" name='firstname' id='firstname' placeholder = "New First name">
        <button id = "addfirstname">Add</button>
      </span>
      <br>

      <p>Last name: <?=$_SESSION["lastname"]?></p>
      <button class = "log" id = "modlastname">L</button>
      <span class = "hiddenmodify">
        <input type="text" name='lastname' id='lastname' placeholder = "New Last name">
        <button id = "addlastname">Add</button>
      </span>
      <br>

      <p>Email: <?=$_SESSION["email"]?></p>
      <button class = "log" id = "modemail">L</button>
      <span class = "hiddenmodify">
        <input type="text" name='email' id='email' placeholder = "New Email">
        <button id = "addemail">Add</button>
      </span>
      <br>

      <p>Gender: <?=$gender?></p>
      <br>
      <p>Username: <?=$_SESSION["username"]?></p>
      <br>

      <p>Password: ********</p>
      <button class = "log" id = "modpassword">L</button>
      <span class = "hiddenmodify">
        <input type="password" name="password" id="password" title="The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder = "New Password"> 
      <p>Repeat Password:</p> 
      <input type="password" name="repeat" placeholder = "Repeat New Password">
      <button id = "addpassword">Add</button>
        
      </span>
    </div>

</div>



<br> 
<button class = "log" id = "remove">Delete account</button>

<?php
  #unset user elem
  unset ($_SESSION["firstname"]);
  unset ($_SESSION["lastname"]);
  unset ($_SESSION["gender"]);
  unset ($_SESSION["email"]);
  unset ($_SESSION["password"]);
?>

</div>

<!-- The Modal -->
<div id="modifyok" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>The information were successful updated.</p>
  </div>
</div>

<div id="modifypass" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Password are not the same</p>
  </div>
</div>

<div id="modifynofield" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
    <p>All field are empty!</p>
  </div>
</div>

<div id="modifypattern" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</p>
  </div>

</div>

<div id="mailinvalid" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Invalid email format</p>
    </div>
</div>

<div id="rem-account" class="modal" >
        <div class="modal-content">
            <p>Are you sure to delete this Account?</p>
        </div>
        <form action="user/removeaccount.php" method="post">
            <button type="submit" id="removeok">OK</button>
        </form>
        <button type="submit" id="remannull">Cancel</button>
</div>

<div id="nameinvalid" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Please enter a valid name</p>
    </div>
</div>


<?php
include("../html/footer.html");
?>