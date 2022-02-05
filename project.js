//require tab/AddTab layout v1


function load_tab_team(){
    var default_imiage = "anonymous.png";
    execute("team", {}, function(saida, status, erro){
        if(saida.result == undefined){
            alert("A equipe não foi carregada.");
            return;
        }
        saida = saida.result;
        AddTable("span_team", [{"field" : "name", "text" : "Nome"},{"field" : "image", "text" : ""}], saida, "table_team",
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

function load(){
    execute("load", {}, function(saida, status, erro){
        if(saida.result == undefined){
            alert("Projeto não foi carregado.");
            return;
        }
        saida = saida.result;
        if(saida.edit) AddSpan("raiz", "span_editar", "<a href = '/cyber/project_edit.php?id="+ saida._id +"'>Edtiar este projeto</a>");

        $("#project_header").html(saida.short_name + " - " + saida.name);
        AddSpan("raiz", "span_image", "<img style='width: 60%; display: block; margin-left: auto; margin-right: auto;' src='/cyber/upload/"+ saida.image +"' /><br/><br/>");
        AddSpan("raiz", "span_descricao", saida.description.replaceAll("\n","<br/>") + "<br/><br/>");
        AddHeader("raiz", 4, "Version Control System GIT", "header_git");
        AddSpan("raiz", "span_git", "Acesse o código do projeto bem como arquivos utilizando o link GIT:  <b><a href='"+ saida.git +"' target='_blank'>"+ saida.git +"</a></b>");

        //
        
        AddSpan("raiz", "span_git_finish", "<br/><br/>");
        AddHeader("raiz", 4, "Equipe do projeto", "header_team");

        
        AddSpan("raiz", "span_team", "");
        load_tab_team();
        AddSpan("raiz", "span_fundo", "<br/><br/><br/><br/>");
    });
}


function main(){
    load();
    
} main();

