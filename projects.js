


function main(){
    
    execute("list_projects", {}, function(saida, status, erro){
        if(saida.result == undefined){
            alert("Erro de carregamento.");
            return;
        }

        for(var i = 0; i < saida.result.length; i++){
            $("#thumbs").append('<li class="item-thumbs span3 design" data-id="id-0" data-type="web"> <div class="item">  <a href="project.php?id='+ saida.result[i]._id +'"><h4>'+ saida.result[i].short_name +'</h4></a>     <figure> <div><img src="/cyber/upload/'+ saida.result[i].image +'" alt="" /></div> <figcaption> <div> <span> </span> <span> <a href="project.php?id='+ saida.result[i]._id +'"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a></span></div></figcaption></figure></div></li>');
        }
    });


} main();




