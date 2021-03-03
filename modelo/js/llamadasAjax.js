
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

var borrar = new ajax();
function borrarEjercicio(id) {

    if(confirm("¿Seguro que deseas eliminar el manga de la BD?")) {
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