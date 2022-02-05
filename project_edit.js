//require tab/AddTab layout v1

function load_tab_description(){
    AddText(    "div_project_description", "text", "Apelido", "Apelido do Proejto com no máximo 20 caracters", "txt_short");
    AddText(    "div_project_description", "text", "Nome", "Nome do projeto", "txt_name");
    AddTextArea("div_project_description", "txt_description", 50 );
}

function load_tab_image(){
    AddImage($("#div_project_image"), "txt_image", {"min_with" : 800, "min_height" : 625, "style" : {  "width" : "800px", "height" : "625px"}});
}

function load_tab_git(){
    AddText("div_project_github", "text", "URL GIT", "URL do projeto GIT", "txt_git");
}

function load_tab_team(){
    var default_imiage = "anonymous.png";
    execute("team", {}, function(saida, status, erro){
        if(saida.result == undefined){
            alert("A equipe não foi carregada.");
            return;
        }
        saida = saida.result;
        AddTable("div_project_team", [{"field" : "name", "text" : "Nome"},{"field" : "image", "text" : ""}], saida, "table_team",
        function(row, key, value, data, j , i){
            if(key == 'image'){
                if(value != null && value != ""){
                    return "<img src='/cyber/upload/" + value + "' width='100px' />";
                }
                return "<img src='/cyber/upload/" + default_imiage + "' width='100px' />";
            }
            if(key == "name"){
                if(data['bio'] == null) data['bio'] = "";
                return "<b>"+ value +"</b><br/>" + data['bio'];
            }
        });
    });
}

function btn_salvar_click(){
    if(!txt_name.has()) {
        alert("Informe um nome para o projeto");
        return;
    }
    if(!txt_short.has()) {
        alert("Informe um apelido para o projeto");
        return;
    } else {
        if(txt_short.val().length > 20){
            alert("O apelido pode ter no máximo 20 caracteres.");
            return;
        }

    }
    if(!txt_description.has()){
        alert("Informe uma descrição.")
        return;
    }
    if(txt_image.val() == null){
        alert("Adicione uma imagem.");
        return;
    }

    execute("save", {"name" : txt_name.val(), "description" : txt_description.val(), 
                "git" : txt_git.val(), "image" : txt_image.val(), "short_name" : txt_short.val() }, function(saida, status, erro){
        console.log(saida);
        if(saida == undefined || saida == null){
            alert('Não foi possível salvar');
            return;
        }
        
        if(Parameter("id") == undefined) { 
            window.location.href = '/cyber/project_edit.php?id=' + saida.result; 
        } else {
            alert("Salvo com sucesso.");
        }
    });
}

function load(){
    execute("load", {}, function(saida, status, erro){
        if(saida.result == undefined){
            alert("Projeto não foi carregado.");
            return;
        }
        saida = saida.result;
        console.log(saida, status, erro);
        txt_name.val(saida.name);
        txt_description.val(saida.description);
        txt_git.val(saida.git);
        txt_image.val(saida.image);
        txt_short.val(saida.short_name);
    });
}


function main(){
    AddTab("raiz", [{"div": "div_project_description" , "text" :  "Descrição"}, 
                    {"div" : "div_project_image" , "text" : "Imagem" },{"div" : "div_project_github" , "text" : "Github" }, 
                    {"div" : "div_project_team" , "text" :  "Equipe"}] , "tbl_new_project");
    AddButton("raiz", "Salvar projeto", "btn_salvar_click", "btn_salvar")
    load_tab_description();
    load_tab_image();
    load_tab_git();
    load_tab_team();
    load();
} main();

