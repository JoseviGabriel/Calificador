window.onload = init;

function init(){
    var form = document.getElementById("formCrearEvento");
    form.style.display = "none";
    var boton = document.getElementById("crearEventos");
    boton.addEventListener("click", mostrarFormulario);
}

function mostrarFormulario(){
    var form = document.getElementById("formCrearEvento");
    form.style.display = "block";
}
