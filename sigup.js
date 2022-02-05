
function btn_register_click(){
    var password = $("#txt_password").val();
    var captcha = $("#txt_captcha").val().trim();
    var login = $("#txt_login").val().trim();
    var name = $("#txt_name").val().trim();
    var increase = guid();

    if(password.trim().length == 0){
        alert("Informe um password.");
        return;
    }

    if(login.trim().length == 0){
        alert("Informe um login.");
        return;
    }

    if(password != $("#txt_password_2").val().trim()){
        alert("Seu password não corresponde a verificação de password.");
        return;
    }

    execute("exists", {"login" : login}, function(saida, status, erro){
        if(saida.result){
            alert("Este usuário já existe.");
            return;
        }
        execute("register", {"login" : login, "name" : name, "password" : calcMD5(password + increase), "increase" : increase, "captcha" : captcha }, function(saida, status, erro){
            if(saida.result != undefined){
                alert("Sucesso, utilize a interface de login.");
                setTimeout(function(){
                    window.location.href = "/cyber/sigini.php";
                }, 2000);
                
            } else {
                alert(saida.error);
            }
        });
    });
}


