/*Gestione dello slider in home.php */
function myslide(){
    var a = $(".punti").children();
    
    for (let p = 0; p < a.length; p++) {
        var temp = $(a).eq(p);
        temp.click(function () {
            currentSlide(p+1);
        })

    }

    $(".prev").click(function(){
        plusSlide(-1);

        
    })
    $(".next").click(function(){
        plusSlide(1);
    })

    var slideIndex = 1;
    showSlides(slideIndex);

    /*Bottoni next e previous*/
    function plusSlide(n) {
        showSlides(slideIndex += n);
    }

    /*Controlli miniatura immagini*/
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

   function showSlides(n) {
    
    var i;
    var slides = $(".slide").find(".quadri");

    if(slides.length > 0){
        var dots = $(".punti").children();
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            
            slides.eq(i).css("display","none");
        }
        for (i = 0; i < dots.length; i++) {
            dots.eq(i).toggleClass("active", false);
        }
        
        slides.eq(slideIndex-1).css("display","block");
        dots.eq(slideIndex-1).toggleClass("active");
    }else{
        
    }
  }
}