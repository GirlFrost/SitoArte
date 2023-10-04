/*signin permette di inviare i dati con Ajax in formato JSON per effettuare la registrazione al sito*/
function signin(){
    $("#err").hide();
    $("#submitsign").click(function(e){
        var form = {
            'firstname': $('input[name=firstname]').val(),
            'lastname': $('input[name=lastname]').val(),
            'gender': $('input[name=gender]').val(),
            'email': $('input[name=email]').val(),
            'username': $('input[name=username]').val(),
            'password': $('input[name=password]').val(),
            'repeat': $("input[name=repeat]").val(),
        };
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../php/user/signup.php",
            data: {info:JSON.stringify(form)},
            datatype: 'json',
            success: function(data){
                var arr = JSON.parse(data);
                var htmlerr = $("#err").find("span");
                if(htmlerr.length){
                    htmlerr.remove();
                }
                if(arr["errorpassword"]=="true"){
                    $("#err").show();
                    $("#err").append("<span>Password are not the same</span>");
                }else if(arr["errorpassword"]=="pattern"){
                    $("#err").show();
                    $("#err").append("<span>The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>");
                }else if(arr["errorpassword"]=="false"){
                    location.replace("../php/home.php");
                }else if(arr["errorname"]=="pattern"){
                    $("#err").show();
                    $("#err").append("<span>Please enter a valid name</span>");
                }else if(arr["error"] =="empty"){
                    $("#err").show();
                    $("#err").append("<span>Empty field.</span>");
                }else if(arr["errmail"] == "true"){
                    $("#err").show();
                    $("#err").append("<span>Invalid email format</span>");
                }
            }

        })
    })
}