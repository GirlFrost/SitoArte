/*login permette di inviare i dati con Ajax in formato JSON per effettuare quindi il login*/
window.onload = login;

function login(){
    $("#err").hide();
    $("#submitlogin").click(function(e){
        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/user/login.php",
            data: { info: JSON.stringify({
                        username: $("input[name=username]").val(),
                        password: $("input[name=password]").val(),
                    })
            },
            datatype: "json",
            success: function(data){
                var arr = JSON.parse(data);
                var htmlerr = $("#err").find("span");
                if(htmlerr.length){
                    htmlerr.remove();
                }
                if(arr["errUserOrPass"]=="true"){
                    $("#err").show();
                    $("#err").append("<span>Incorrect user name and/or password.</span>")
                }else if(arr["empty"] == "true"){
                    $("#err").show();
                    $("#err").append("<span>Please fill all fields correctly</span>")
                }else if(arr["ok"] == "true"){
                    location.replace("php/home.php")
                }
            }
        })
    })
}