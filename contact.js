
function btn_send_message_click(){
    var name    = $("#name").val();
    var email   = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    execute("send", {"name" : name, "email" : email, "subject" : subject, "message" : message }, function(saida, status, erro){
        if(saida.result){
            alert("Sucesso, mensagem enviada.");
            $("#name").val("");
            $("#email").val("");
            $("#subject").val("");
            $("#message").val("");
        } else {
            alert(saida.error);
        }
    });


}

