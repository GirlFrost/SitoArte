/*Gestione dei dati da modificare*/
function modifyAjax(inputId){
    var input = { [inputId] : $('input[name='+inputId+']').val()};
    
    $.ajax({
        type: "POST",
        url: "../php/user/modify.php",
        data: {info:JSON.stringify(input)},
        datatype: 'json',

        success: function(data){
            var risp = JSON.parse(data);
            if(risp["err"] == "false"){
                submitmessage("modifyok");
            }else if(risp["err"] == "empty"){
                submitmessage("modifynofield");
            }else if(risp["err"]=="pattern"){
                submitmessage("modifypattern");
            }else if(risp["errmail"] == "true"){
                submitmessage("mailinvalid");
            }else if(risp["errorname"] == "pattern"){
                submitmessage("nameinvalid");
            }else if(risp["errorlastn"] == "pattern"){
                submitmessage("nameinvalid");
            }
        }
    })
}



/*Cattura clic di modifica dei dati dell'utente all'interno di myprofile.php*/
function modifyInfo(){
    $(".info").find("button").click(function(){
        
        $(this).next().toggle("slow");
     
    });
    $(".hiddenmodify").find("button").click(function(){
        var id = $(this).attr("id");
        var inputId = id.replace("add","");
        
        if(inputId == "password"){
            var pass = $('input[name='+inputId+']').val();
            var repeat = $("input[name=repeat]").val();

            if(pass != repeat){
                submitmessage("modifypass");
            }else{
                modifyAjax(inputId);
            }
        }else{
            modifyAjax(inputId);
        }
        
    })
}

function submitmessage(id){
    /*prende modal*/
    var modal = $("#"+id);

    /*Prende l'elemento <span> che chiude il modale*/
    var span = $(".close");

    modal.css("display","block");
    
    if(id == "modifyok"){
        span.click(function() {
            location.reload();
        });

        window.onclick = function(event) {
            var idEvent = $(event.target).eq(0).attr("id");
            var idModal = modal.eq(0).attr("id");
    
            if (idEvent == idModal) {
                location.reload();
            }
        }

    }else{
        /*Quando l'utente clicca su <span> (x), chiude il modale*/
        span.click(function() { 
            modal.css("display","none");
        })
        /*Quando l'utente clicca fuori dal modale, lo chiude*/
        window.onclick = function(event) {
            var idEvent = $(event.target).eq(0).attr("id");
            var idModal = modal.eq(0).attr("id");

            if (idEvent == idModal) {
                modal.css("display","none");
            }
        }
    }
}

/*Gestione del modale che cancella l'utente*/
function deleteAccount(){
    $("#remove").click(function(){
        var modal = $("#rem-account");
  
        modal.css("display","block");

        $("#remannull").click(function(){
            modal.css("display","none");
        })
    })
}