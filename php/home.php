<?php
#Diana Malaimare

include("../html/top.html");
include("db.php");
include("user/userlog.php");

ensure_logged_in();
if(!isset($_SESSION)){
    session_start();
}
$quadri = array("../img/quadri/quadro16.jpg", "../img/quadri/quadro7.jpg","../img/quadri/quadro4.jpg", "../img/quadri/quadro6.jpg", "../img/quadri/quadro10.jpg");

?>

<p class="intestazion">Atelier Dana</p>
<hr>

<div class="slide">

  <?php
    for ($i=0; $i < count($quadri); $i++) { 
      ?>
      <div class = "quadri">
        <img src="<?=$quadri[$i] ?>" alt = "quadro">
      </div>
      <?php
    }
  ?>
  <a class="prev">&#10094;</a>
  <a class="next">&#10095;</a>
</div>

<div class="punti">
<?php
for ($j=0; $j < count($quadri); $j++) { 
    ?>
   <span class="dot"></span>
   <?php
}
?>
</div>


<hr>
<p id = "aboutme">About</p>
<div id="about">
  <img src="../img/window.jpg" alt="">
  <p>
      
<span id= "title">Atelier Dana</span>  <br><br>
My name is Daniela De Banana, founder of Atelier Dana*, and illustrator based in Italy.
<br> <br>
My work is defined by sensitive brush or charcoal strokes, while the female body is a fundamental inspiration.
<br> <br>
My goal is to capture feminine strength, sensuality, vulnerability, and aesthetics.
  </p>
</div>
<p class = "intestazion">Memory Game</p>
<div id="game">
<?php
include("memorygame.php");
?>
</div>
<br><br>
<?php
include("../html/footer.html");
?>