function mayus(e) {

    e.value = e.value.toUpperCase();
}


function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    letras = " 1,2,3,4,5,6,7,8,9,0,.";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}



function curp2date() {
    var miCurp = document.getElementById('curp').value;
    var m = miCurp.match(/^\w{4}(\w{2})(\w{2})(\w{2})/
    );
    if (m) {
        var anyo = parseInt(m[1], 10) + 1900;
        if (anyo < 1950) anyo += 100;
        var mes = parseInt(m[2], 10) - 1;
        var dia = parseInt(m[3], 10);
        var fech = new Date(anyo, mes, dia);
        document.getElementById("fechaNacimiento").value = fech;
    } else {
        document.getElementById('submit').disabled = true;
        document.getElementById("errorCURP").innerHTML = "CURP INVALIDA";
    }
}

