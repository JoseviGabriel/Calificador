window.onload = init;

function init(){
    $( "#crearEventos" ).click(function() {
        $("#formCrearEvento").toggle( "slow" );
    });
    
    $( "#crearProyectos" ).click(function() {
        $("#formCrearProyecto").toggle( "slow" );
    });
    
    $("#gestionUsuarios").click(function() {
        $("#formGestionUsuarios").toggle( "slow" );
    });
    
    $("#gestionEventos").click(function() {
        $("#formGestionEventos").toggle( "slow" );
    });
    
    $("#gestionProyectos").click(function() {
        $("#formGestionProyectos").toggle( "slow" );
    });
}
