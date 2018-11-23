'use strict'
let templateComentarios;
let orden = 0;

fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
    templateComentarios = Handlebars.compile(template);
    verificar();
});

function actualizar() {
   setTimeout(function(){
        verificar();
    }, 2000);
}

function verificar() {
    fetch("api/verificar")
    .then(response => response.json())
    .then(jsonVerificar => {
        if(orden == 1) {
            getComentariosDESC(jsonVerificar);
        }else{
            getComentarios(jsonVerificar);
        }
    })
}

function dynamicSort(property) {
  var sortOrder = 1;
  if(property[0] === "-") {
    sortOrder = -1;
    property = property.substr(1);
  }

  return function (a,b) {
    if(sortOrder == -1){
      return b[property].localeCompare(a[property]);
    }else{
      return a[property].localeCompare(b[property]);
    }
  }
}

function cambiarOrden(event) {
    event.preventDefault();
    if(orden == 1){
        orden = 0;
    }else{
        orden = 1;
    }
}

let pathArray = window.location.pathname.split('/');
let idpj = pathArray[3];

function getComentarios(verificar) {
    fetch("api/comentario/"+idpj).then(response => {
        return response.json();
      }).then(data => {
        data.sort(dynamicSort("puntaje"));
        mostrarComentarios(data, verificar);
      }).catch(err => {
        console.log(err)
      });
    actualizar();
}

function getComentariosDESC(verificar) {
    fetch("api/comentario/"+idpj).then(response => {
        return response.json();
      }).then(data => {
        data.sort(dynamicSort("-puntaje"));
        mostrarComentarios(data, verificar);
      }).catch(err => {
        console.log(err)
      });
    actualizar();
}

function mostrarComentarios(jsonComentarios, verificar) {
    let context = {
        comentarios: jsonComentarios,
        verificar: verificar
    }
    let html = templateComentarios(context);
    document.querySelector("#comentarios-container").innerHTML = html;
    let publicar = document.getElementById("publicar-comentario");
    publicar.addEventListener("click", publicarComentario);
    let reordenar = document.getElementById("reordenar");
    reordenar.addEventListener("click", cambiarOrden);
}

function eliminarComentario(param) {
    fetch('api/comentario/'+param, {
      method: 'DELETE'
    })
}

function submitUserForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Debes completar el campo.</span>';
        return false;
    }
    return true;
}

function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}

function publicarComentario(event) {
    event.preventDefault();
    let captcha = submitUserForm();
    if(captcha == true) {
        let contenido = document.getElementById("contenido").value;
        let puntaje = parseInt(document.getElementById("puntaje").value);

        let data = {id_pj: idpj, autor: '', puntaje: puntaje, contenido: contenido};

        fetch('api/comentario', {
            method: 'POST',
            body: JSON.stringify(data),
            headers:{
            'Content-Type': 'application/json'
            }
        }).then(res => res.json())
        .catch(error =>
          console.error('Error:', error));
    }else {

    }
}
