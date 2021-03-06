/*----------Validaciones formulario--------*/

//Esta funcion valida el formulario de insercion funcion creada por Alvaro Herencias Juan
function validar() {

    var formulario = document.getElementById('formularioInsercion');
    var datos = formulario.getElementsByTagName('input');
    var todoOK = true;//Esta variable tiene que estar true para enviarse al formulario


    resetnegros(datos);//Establece todos los campos a su color original

    if (datos[0].value == "" || datos[0].value.length > 20) {//Nombre del ejercicio
        datos[0].style.borderColor = 'red';
        todoOK = false;
        alert("1");

    }
    if (datos[1].value == "") {//Repeticiones
        datos[1].style.borderColor = 'red';
        todoOK = false;
        alert(2);
    }
    if (datos[2].value == "") {//Series
        datos[2].style.borderColor = 'red';
        todoOK = false;
        alert(3);


    }
    if (datos[3].value == "") {//Descanso
        datos[3].style.borderColor = 'red';
        todoOK = false;
        alert(4);


    }

    //El video no esta incluido por que es opcional

    function resetnegros(datos) {//Pone todos los inputs en su color original para ello necesita

        for (var i = 0; i < datos.length; i++) {

            datos[i].style.borderColor = 'initial';
        }

    }

    if (todoOK) {
        formulario.submit();

    }

}

