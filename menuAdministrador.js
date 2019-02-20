window.onload = init;

function init(){
    $( "#crearEventos" ).click(function() {
        $("#formCrearEvento").toggle( "slow" );
    });
    
    $( "#crearProyectos" ).click(function() {
        $("#formCrearProyecto").toggle( "slow" );
    });
    
    
}
