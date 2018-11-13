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
    let publicar = document.getElementById("publicar-comentario");
    publicar.addEventListener("click", publicarComentario);
    
}

function publicarComentario(event) {
    event.preventDefault();
    let contenido = parseInt(document.getElementById("contenido").value);
    let puntaje = parseInt(document.getElementById("puntaje").value);

    // id_pj generaba un error referencial en la base de datos y por eso no enviaba
    // hay que hacer que la api envie un error de sql cuando no puede insertar
    let data = {id_pj: '15', autor: 'prueba', puntaje: puntaje, contenido: "contenido"};
    
    fetch('api/comentario', {
        method: 'POST', 
        body: JSON.stringify(data), // data can be `string` or {object}!
        headers:{
          'Content-Type': 'application/json'
        }
      }).then(res => res.json())
      .catch(error => console.error('Error:', error))
      .then(response => console.log('Success:', response));
}




