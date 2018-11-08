'use strict'
let templateTareas;

fetch('js/templates/tareas.handlebars')
.then(response => response.text())
.then(template => {
    templateTareas = Handlebars.compile(template); // compila y prepara el template

    getTareas();
});


function getTareas() {
    fetch("api/tarea")
    .then(response => response.json())
    .then(jsonTareas => {
        mostrarTareas(jsonTareas);
    })
}

function mostrarTareas(jsonTareas) {
    let context = { // como el assign de smarty
        tareas: jsonTareas, 
        otra: "hola"
    }
    let html = templateTareas(context);
    document.querySelector("#tareas-container").innerHTML = html;
}
