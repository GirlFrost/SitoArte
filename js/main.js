window.onload = main;

function main(){
    $(".hamburger").click(function(){
        $(".hamburger").toggleClass("open");
        
        if($(".hamburger").hasClass("open")){
            $("#navbar ul").css("display","flex");
        }else{
            $("#navbar ul").css("display","none");
        }
    });

    signin();

    /*Se il media query fa il matches, controlla se l'elemento (tre trattini) è stato selezionato
    così da mostrarlo oppure nasconderlo*/
    function myFunction(x) {
        if (!x.matches) { 
            $("#navbar ul").css("display","flex");
        }else{
            $("#navbar ul").css("display","none");
        }
    }
    var x = window.matchMedia("(max-width: 720px)")
    myFunction(x); /*Chiama la funzione listener a run time*/
    x.addEventListener("change", myFunction);/*Attacca un listener ad ogni cambiamento di stato */
    $("#logout").click(function(){
        localStorage.clear(); /*Al logout del utente cancello tutto nella localStorage (cart) */
    });

    myslide();
    modifyInfo();
    deleteAccount();
    shopCart();
    game();
}