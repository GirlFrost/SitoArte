<?php
#Diana Malaimare

# Users must be logged in.
#Galleria di quadri
include("../html/top.html");
include("db.php");
ensure_logged_in();
include("user/userlog.php");
include("shop/cart.php");

$text = ["Africa", "Tramonto", "Gioventù", "Maternità", "Frutta", "Bambina", "Merenda", "Fiori", "DeAndré", "Nostalgia","Cesto","Ansia","Alice","PrimeNote","Tea","Oriente","Lago","Soldati","Primavera","Autunno",
];
$price = [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100, 110];

$img = 0;
?>
<p class="intestazion">Gallery</p>
<hr>
<div class="row">
    <?php
    for ($i=0; $i < 4; $i++) { 
        ?>
        <div class = "column">
        <?php
        for ($j=0; $j < 5; $j++) { 
            if($img<20){
                ?>
                <div class="galleria">
                    <img src="../img/quadri/quadro<?=$img?>.jpg" alt="Quadro<?=$img?>">
                    
                    <div class="overlay">
                        <div class="text" ><?=$text[$img] ?></div>
                        <div class = "price">
                        Price: <?=$price[$img]."€"?>
                        </div>
                        <button type="button" class="shop" id= "<?=$text[$img] ?>">ù</button>
                    </div>
                </div>
                <?php
                $img++;
            }else{
                break;
            }
        }
        ?>
        </div>
        <?php
    }
    ?>
</div>
<hr>
<?php
include("../html/footer.html");
?>
