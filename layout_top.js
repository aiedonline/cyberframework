$( document ).ready(function() {
    $('a[href$="'+ window.location.pathname +'"]').parent().addClass("active");
});

function abrir_perfil(){
    AbrirPopup("/cyber/private/perfil.php");
}
