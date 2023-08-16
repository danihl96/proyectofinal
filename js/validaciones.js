
function ValidarEstudiantes() {
    let identificacion  = document.getElementById('identificacion').value
    let nombres         = document.getElementById('nombres').value
    let apellidos       = document.getElementById('apellidos').value
    let email           = document.getElementById('email').value
    let telefono        = document.getElementById('telefono').value
    let sexo            = document.getElementById('sexo').value
    let edad            = document.getElementById('edad').value
    let raza            = document.getElementById('raza').value

    let mensajes=''
    
    if(telefono=='')    mensajes +='<li>Debes agregar un numero de telefono</li>'
    if(email=='')       mensajes +='<li>Debes agregar un correo electronico</li>'
    if(nombres=='')     mensajes +='<li>Debes agregar tus nombres</li>'
    if(apellidos=='')   mensajes +='<li>Debes agregar tus apellidos</li>'
    if(identificacion=='')      mensajes +='<li>Debes agregar una identificacion</li>'
    if(sexo=='')   mensajes +='<li>Debes agregar tu sexo</li>'
    if(edad=='')   mensajes +='<li>Debes agregar tu edad</li>'
    if(raza=='')   mensajes +='<li>Debes agregar tu raza</li>'

    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.forestudiantes.submit()
    }
    
}

function ValidarMaterias() {
    let nombre    = document.getElementById('nombre').value
    let intensidad_horaria   = document.getElementById('intensidad_horaria').value
    let tipo    = document.getElementById('tipo').value
    let creditos    = document.getElementById('creditos').value
    let mensajes=''
    
    if(nombre=='')   mensajes +='<li>Debes ingresar nombre de la materia</li>'
    if( intensidad_horaria=='')   mensajes +='<li>Debes ingresar la intensidad horaria</li>'
    if(tipo=='')   mensajes +='<li>Debes ingresar el tipo de materia</li>'
    if(creditos=='')   mensajes +='<li>Debes ingresar el numero de creditos</li>'

    if(mensajes!=''){
        document.getElementById('mensaje').innerHTML = `<div class='alert alert-danger' role='alert'> ${mensajes} </div>`
    }else{
        document.formateria.submit()
    }
    
}