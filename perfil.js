
function load(){
    execute("load", {}, function(saida, status, erro){
        
        if(saida.result == undefined){
            alert("Dados do usuário nào foi carregado.");
            return;
        }
        saida = saida.result;
        txt_name.val(saida.name);
        txt_contact.val(saida.contact);
        txt_bio.val(saida.bio);
        $("#label_username").html("<b>Usuário: "+ saida.username +"</b><br/>");
        if(saida.image != null && saida.image != ""){
            txt_image.val(saida.image);
        }
    });
}

function btn_salvar_click(){
    if(!txt_name.has()) {
        alert("Informe um nome para o projeto");
        return;
    }

    execute("save", {"name" : txt_name.val(), "image" : ( txt_image.val() ? txt_image.val() : null), "bio" : txt_bio.val(), "contact" : txt_contact.val() }, function(saida, status, erro){
        if(saida == undefined || saida == null){
            alert('Não foi possível salvar');
            return;
        }
        //window.location.href = window.location.href;
        alert("Perfil salvo");
    });
}

function btn_trocar_senha_click(){
    if(txt_password_1.val().trim() == ""){
        alert("Informe um password.");
        return;
    }
    if(txt_password_1.val() != txt_password_2.val()){
        alert("A confirmação da nova senha não é igual a nova senha.");
        return;
    }

    execute("increase", {}, function(saida, status, erro){
        increase = saida.result;
        var password = txt_password_1.val();
        execute("change", {"password" : md5(password + increase) }, function(saida, status, erro){
            
            if(saida.result){
                alert("Senha alterada.");
                txt_password_1.val("")
                txt_password_2.val("")
            } else {
                alert(saida.error);
            }
        });
    });
}

function main(){
    AddTab("raiz", [{"div": "div_perfil" , "text" :  "Perfil"}, 
                    {"div" : "div_bio" , "text" : "Bio" },
                    {"div" : "div_password" , "text" : "Password" }] , "tbl_perfil");

    AddButton("raiz", "Salvar dados", "btn_salvar_click", "btn_salvar")

    AddImage($("#div_perfil"), "txt_image", {"min_with" : 200, "min_height" : 200, "style" : {  "width" : "200px", "height" : "200px"}});

    AddSpan("div_perfil", "label_username", "");
    AddText("div_perfil", "text", "Nome"  ,   "Como quer ser chamado(a)", "txt_name");
    AddText("div_perfil", "text", "Contato"  ,"Como falar com você?", "txt_contact");
    AddTextArea("div_bio", "txt_bio", 25 );

    AddText("div_password", "password", "Password"  ,   "Nova senha",         "txt_password_1");
    AddText("div_password", "password", "Password"  ,   "Repetir nova senha", "txt_password_2");
    AddButton("div_password", "Trocar senha", "btn_trocar_senha_click", "btn_trocar_senha")
    AddSpan("div_password", '<br/>Recomendações:<font color=\'red\'><br/>  - <b>Não existe mecanismo de recuperação de senha este site!!!</b>;<br/>  - Usar no mínimo 8 a 12 caracteres;<br/>  - Nunca use um password que já usa em outro site;<br/>  - Não usar palavras;<br/>  - Não use: &, <, >, " e \' como senha;<br/>  - Sua senha, sua responsabilidade.</font>')

    load();
} main();




