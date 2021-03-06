
function ajax() {
    try {
        req = new XMLHttpRequest();
    } catch(err1) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                req = false;
            }
        }
    }
    return req;
}
/*--------Borrar ajax--------------*/
var borrar = new ajax();
function borrarEjercicio(id) {

    if(confirm("¿Seguro que deseas eliminar el ejercicio de la BD?")) {
        var myurl = 'llamadas/eliminarEjercicio.php';
        myRand = parseInt(Math.random() * 999999999999999);
        modurl = myurl + '?rand=' + myRand + '&id=' + id;
        borrar.open("GET", modurl, true);
        borrar.onreadystatechange = borrarEjercicioResponse;
        borrar.send(null);

    }

}

function borrarEjercicioResponse() {

    if (borrar.readyState == 4) {
        if(borrar.status == 200) {
            var listaEjercicio = borrar.responseText;

            document.getElementById('lista').innerHTML =  listaEjercicio;

        }
    }
}
/*-----------------Buscar ajax----------------------*/
var buscar = new ajax();
function buscarEjercicio() {
    var formulario = document.getElementById('busqueda');
    var datos = formulario.getElementsByTagName('input');
        var myurl = 'llamadas/buscador.php';
        myRand = parseInt(Math.random() * 999999999999999);
        modurl = myurl + '?rand=' + myRand + '&busqueda=' + datos[0].value;
        buscar.open("GET", modurl, true);
        buscar.onreadystatechange = buscarResponse;
        buscar.send(null);



}

function buscarResponse() {

    if (buscar.readyState == 4) {
        if(buscar.status == 200) {
            var listaEjercicio = buscar.responseText;

            document.getElementById('lista').innerHTML =  listaEjercicio;

        }
    }
}