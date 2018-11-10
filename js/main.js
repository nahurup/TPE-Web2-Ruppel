'use strict'
let templateComentarios;

fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
    templateComentarios = Handlebars.compile(template); // compila y prepara el template

    getComentarios();
});


function getComentarios() {
    fetch("api/comentario")
    .then(response => response.json())
    .then(jsonComentarios => {
        mostrarComentarios(jsonComentarios);
    })
}

function mostrarComentarios(jsonComentarios) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios
    }
    let html = templateComentarios(context);
    document.querySelector("#comentarios-container").innerHTML = html;
}
