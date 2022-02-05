

var increase = undefined;

function btn_login_click(){
    
    var login = $("#txt_login").val().trim();
    if(login == ""){
        alert("Informe um login.");
        return;
    }

    if(increase == undefined) {
        execute("increase", {"login" : login }, function(saida, status, erro){
            increase = saida.result;
            $("#singlebutton").html("Login");
            document.getElementById("div_captcha").style.visibility = "visible";
            if( $("#txt_password").length == 0) {
                $("#field_set_login").append('<div class="control-group"> <label class="control-label" for="txt_password">Password</label> <div class="controls"> <input id="txt_password" name="txt_password" type="password" placeholder="placeholder" class="input-xlarge" autocomplete="off"> <p class="help-block">Password do usuário</p> </div></div>');
                $("#field_set_login").append('<div class="control-group"> <label class="control-label" for="txt_captcha">Captcha</label> <div class="controls"> <input id="txt_captcha" name="txt_captcha" type="text" placeholder="Captcha" class="input-xlarge" autocomplete="off"> <p class="help-block">Catpcha na imagem abaixo</p> </div></div>');
            }
        });
    } else {
        var password = $("#txt_password").val();
        var catpcha = $("#txt_captcha").val().trim();
        if(password.trim() == ""){
            alert("Informe um password.");
            return;
        }

        if(catpcha == ""){
            alert("Informe o Captcha.");
            return;
        }
        
        execute("login", {"login" : login, "password" : calcMD5(password + increase), "captcha" : catpcha }, function(saida, status, erro){
            if(saida.result){
                window.location.href = "/cyber/index.php";
            } else {
                alert(saida.error);
            }
        });


    }
}
