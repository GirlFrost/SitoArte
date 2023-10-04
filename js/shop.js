var totalprice;
var cart = {};
$(document).ready(function(){
    if(localStorage.getItem('cart')){
        cart = JSON.parse(localStorage.getItem('cart'));
        for(key in cart){
            printText(key, cart[key]);
            $(".overlay").find("#"+key).prop("disabled", true);
        }
    }else{
        localStorage.setItem('cart', JSON.stringify(cart));
    }
});

/*Apre la finestrina del carrello, contiene aggiunta e reset*/
function shopCart(){
   $("#shop").click(function(){
        $(".cartList").toggle("slow");
   })
   addToCart();
   resetCart();
}

/*Aggiunge un elemento al carrello*/
function addToCart(){
  $(".overlay").find(".shop").click(function(){
    /*salva i titoli dei quadri e il prezzo in una variabile*/
    var title = $(this).siblings(".text").text();
    var price = $(this).siblings(".price").text().trim().match(/\d+/)[0];
    
    /*aggiunge un articolo alla cosa in cart.php, stampa articolo nel cart e disabilita bottone*/
    printText(title, price);
    $(this).prop("disabled", true);
   
    /*aggiunge titolo quadro e prezzo nel oggetto*/
    cart[title] = price;
    localStorage.removeItem('cart');
    localStorage.setItem('cart', JSON.stringify(cart));
   
    printTotal();
    deleteFromCart();
    resetCart();
  })
}

/*Cancella dal carrello il quadro indesiderato*/
function deleteFromCart(){
    $(".cartList").find(".delete").click(function(){
        var paintingtitle = $(this).siblings().first().text().trim();
        var divparent = $(this).parent();
        divparent.remove();

        $("#"+paintingtitle).prop("disabled", false);
        
        delete cart[paintingtitle];

        var totalnew = $(".cartList").find(".total");
        totalnew.remove();

        var totalnew = $(".cartList").find(".total");
        totalnew.remove();
        printTotal();

        localStorage.removeItem('cart');
        localStorage.setItem('cart', JSON.stringify(cart));
    })
}

/*Cancella tutti gli elementi dal carrello e dal localStorage*/
function resetCart(){
    $(".cartList").find(".log").click(function(){
        for (var key in cart) {
            delete cart[key];

            $(".cartList").find("div").remove();

            $("#"+key).prop("disabled", false);
        }
        localStorage.clear();
    })
}

/*Calcola la somma totale dei prezzi dei quadri nel carrello*/
function totalsum(){
    var total = 0;
    for (var key in cart) {
        price = parseInt(cart[key]);
        total += price;
    }
    return total;
}

/*Stampa il totale nel carrello*/
function printTotal(){
    var totalnew = $(".cartList").find(".total");
    totalnew.remove();
    
    totalprice = totalsum();
    
    var totaltext= "<div class=\"total\">Total: "+totalprice+"</div>";
    $(".cartList").append(totaltext);
}

/*Stampa il titolo e il prezzo del quadro nel carrello*/
function printText(title, price){
    var text="<div><span>"+ title +" </span><span>"+ price + "€" +" </span>"+"<button type="+"button"+" class="+"delete"+">X</button> <br> <hr> </div>";

    $(".cartList").append(text);

    printTotal();
}