'use strict'
let templateComentarios;

fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
    templateComentarios = Handlebars.compile(template); // compila y prepara el template
    getComentarios();
});

let pathArray = window.location.pathname.split('/');
let idpj = pathArray[3];

function getComentarios() {
    fetch("api/comentario")
    .then(response => response.json())
    .then(jsonComentarios => {
        let result = jsonComentarios.filter(obj => {
            return obj.id_pj === idpj
        })
        mostrarComentarios(result);
    })
}

function mostrarComentarios(jsonComentarios) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios
    }
    let html = templateComentarios(context);
    document.querySelector("#comentarios-container").innerHTML = html;
    
}

function publicarComentario() {
    let contenido = parseInt(document.getElementById("contenido").value);
    let puntaje = parseInt(document.getElementById("puntaje").value);
    
    fetch('api/comentario', {
        method: 'POST',
        headers : new Headers(),
        body:JSON.stringify({idpj:id_pj, puntaje:puntaje, contenido:contenido})
    }).then((res) => res.json())
    .then((data) =>  console.log(data))
    .catch((err)=>console.log(err))
}

let publicar = document.querySelector("#publicar-comentario");
publicar.addEventListener("click", publicarComentario);


