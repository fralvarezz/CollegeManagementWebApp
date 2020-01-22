//Fichero que contiene todas las funciones JavaScript utilizadas
//Hecho por: xa8678
//23/10/19

/*
//muestra el error
function modificarError(error){
    var div = document.getElementById('error'); //el div del error
    var text = document.getElementById('mensajeError'); //el texto del error
    text.innerHTML=error; //se introduce el texto del error
    div.style.display="block"; //se muestra el error
    document.getElementById("cerrar").focus(); //hacer focus en el boton de cerrar
    var translator = $('body').translate({lang: localStorage['lang'], t: dict}); //traducir el texto
}

//muestra el error
function modificarErrorNumero(error,num){
    var div2 = document.getElementById('error'); //el div del error
    var text2 = document.getElementById('mensajeError'); //el texto del error
    var numer2 = document.getElementById('numero'); //numero a añadir
    text2.innerText=error; //se introduce el texto del error
    numer2.innerText=num; //se introduce el numero
    div2.style.display="block"; //se muestra el error
    document.getElementById("cerrar").focus(); //hacer focus en el boton de cerrar
    $('body').translate({lang: localStorage['lang'], t: dict}); //traducir el texto
}

//cierra el error
function cerrarError(){
    var div = document.getElementById('error'); //div del error
    div.style.display="none"; //se esconde la ventana
}
*/

//Comprueba que un campo no está vacio
function comprobarVacio(campo) {
    comprobar = document.getElementById(campo).value; //valor de la id recibida
    if (comprobar.length == 0) { //si la longitud es 0, mostramos una ventana de alerta
        //modificarError("El campo no debe estar vacio")
        alert(dict["El campo no debe estar vacio"][localStorage['lang']]);
    }
}

//Comprueba la validez del texto
function comprobarTexto(campo, size) {
    comprobar = document.getElementById(campo).value; //valor de la id recibida
    if (comprobar.length > size) { //si es mayor que la longitud recibida, mostramos una ventana de alerta
        alert(dict["La longitud del campo debe ser menor que "][localStorage['lang']] + size);
    }
    if (comprobar.length < 3){ //si es menor que 3, mostramos una ventana de alerta
        alert(dict["La longitud del campo debe ser mayor que "][localStorage['lang']] + 3);
    }
}

//Comprueba que un campo coincide con una expresion regular
function comprobarExpresionRegular(campo, exprreg ,size){
	comprobar = document.getElementById(campo).value; //valor de la id recibida
    if (comprobar.length > size) { //si es mayor que la longitud recibida, mostramos una ventana de alerta
        alert(dict["La longitud del campo debe ser menor que "][localStorage['lang']] + size);
    }
    else if(!exprreg.test(comprobar)){ //si el campo recibido no concuerda con la expresion, montamos una ventana de alerta
    	alert(dict["El campo no tiene el formato correcto"][localStorage['lang']]);
    }
}


//Comprueba que un campo solo tenga valores alfabeticos
function comprobarAlfabetico(campo, size){
	comprobar = document.getElementById(campo).value; //valor de la id recibida
    if (comprobar.length > size) { //si es mayor que la longitud recibida, mostramos una ventana de alerta
        alert(dict["La longitud del campo debe ser menor que "][localStorage['lang']] + size);
    }
    else if(!/^[A-Za-z]+$/.text(comprobar)){ //si el campo no tiene unicamente caracteres alfabeticos, montamos una ventana de alerta
    	alert(dict["Solo se permiten caracteres alfabeticos"][localStorage['lang']]);
    }
}

//Comprueba que un campo se encuentra entre los valores dados
function comprobarEntero(campo, valormenor, valormayor){
	comprobar = parseInt(document.getElementById(campo).value); //valor de la id recibida
    valormenor = parseInt(document.getElementById(valormenor).value); // valor del valormenor
    valormayor = parseInt(document.getElementById(valormayor).value); // valor del valormayor
    if(!Number.isInteger(comprobar)){
        alert(dict["Introduce un numero"][localStorage['lang']]);
    }
    else if(comprobar < valormenor){ //si el campo recibido es menor que el valor minimo, montamos una ventana de alerta
    	alert(dict["El valor debe ser mayor que "][localStorage['lang']] + valormenor);
    }
    else if(comprobar > valormayor){ //si el campo recibido es menor que el valor minimo, montamos una ventana de alerta
    	alert(dict["El valor debe ser menor que "][localStorage['lang']] + valormayor);
    }
}

//Comprueba que un campo de tipo real con un numero de decimales dado se encuentra entre los dos valores dados
function comprobarReal(campo, numero_decimales, valormenor, valormayor){
	comprobar = document.getElementById(campo).value.toFixed(numero_decimales); //valor de la id recibida, estableciendo el numero de decimales
    valormenor = parseInt(document.getElementById(valormenor).value); // valor del valormenor
    valormayor = parseInt(document.getElementById(valormayor).value); // valor del valormayor

    if(comprobar.length < valormenor){ //si el campo recibido es menor que el valor minimo, montamos una ventana de alerta
    	alert(dict["El valor debe ser mayor que "][localStorage['lang']] + valormenor);
    }
    else if(comprobar.length > valormayor){ //si el campo recibido es menor que el valor minimo, montamos una ventana de alerta
    	alert(dict["El valor debe ser menor que "][localStorage['lang']] + valormayor);
    }
}

//Comprueba la validez de formato de un campo DNI
function comprobarDNI(campo) {
    comprobar = document.getElementById(campo).value; //valor de la id recibida

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/; //expresion regular que tiene que coincidir

    if(expresion_regular_dni.test(comprobar) == true){ //si coincide con la expresion regular se selecciona la letra y el numero y se comprueba que son correctos mediante el algoritmo
        numeroDNI = comprobar.substr(0,comprobar.length-1); //los 8 numeros que conforman el dni
        letraDNI = comprobar.substr(comprobar.length-1,1); //la letra del dni
        numero = numeroDNI % 23; //el numero del dni modulo 23 para seleccionar la letra correspondiente
        letra='TRWAGMYFPDXBNJZSQVHLCKET'; //todas las letras que puede tener un DNI en el orden de seleccion apropiado
        letra=letra.substring(numero,numero+1); //se escoge la letra apropiada

        if (letra!=letraDNI.toUpperCase()) { //si la letra no es correcta se muestra un mensaje de error
           alert(dict['DNI erroneo, la letra del NIF no se corresponde'][localStorage['lang']]);
        }
    }
    else //si no coincidio con la expresion regular, se muestra una ventana de error 
    {
        alert(dict['DNI erroneo, formato no válido'][localStorage['lang']]);
    }
}

//Comprueba la validez de formato de un campo DNI
function comprobarDNISearch(campo) {
    comprobar = document.getElementById(campo).value; //valor de la id recibida

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/; //expresion regular que tiene que coincidir

    if(expresion_regular_dni.test(comprobar) == true){ //si coincide con la expresion regular se selecciona la letra y el numero y se comprueba que son correctos mediante el algoritmo
        numeroDNI = comprobar.substr(0,comprobar.length-1); //los 8 numeros que conforman el dni
        letraDNI = comprobar.substr(comprobar.length-1,1); //la letra del dni
        numero = numeroDNI % 23; //el numero del dni modulo 23 para seleccionar la letra correspondiente
        letra='TRWAGMYFPDXBNJZSQVHLCKET'; //todas las letras que puede tener un DNI en el orden de seleccion apropiado
        letra=letra.substring(numero,numero+1); //se escoge la letra apropiada

        if (letra!=letraDNI.toUpperCase()) { //si la letra no es correcta se muestra un mensaje de error
           alert(dict['DNI erroneo, la letra del NIF no se corresponde'][localStorage['lang']]);
        }
    }
    else if(dni!="")//si no coincidio con la expresion regular, se muestra una ventana de error 
    {
        alert(dict['DNI erroneo, formato no válido'][localStorage['lang']]);
    }
}

//Comprueba la validez de formato de un numero de telefono
function comprobarTelf(campo){ 
	comprobar = document.getElementById(campo).value; //valor de la id recibida
	expresion_regular_tlf_nacional = /^[0-9]{9}$/; //expresion 1 con la que debe coincidir
	expresion_regular_tlf_internacional = /^(34)?[0-9]{9}/; //expresion 2 con la que debe coincidir

	if(!expresion_regular_tlf_nacional.test(comprobar) && !expresion_regular_tlf_internacional.test(comprobar)){ //si no coincide con ninguna de las expresiones, se muestra una ventana de alerta
		alert(dict["El formato del telefono no es valido"][localStorage['lang']]);
	}
}

//Comprueba la validez de formato de mail
function comprobarEmail(campo){
    comprobar = document.getElementById(campo).value; //valor de la id recibida
    expresion_regular_email = /^[a-zA-Z0-9_.-]+@[a-zA-Z]+.[a-zA-Z]+(.[a-zA-Z]+)/;


    if(comprobar = '' || comprobar.length<3 || comprobar.length>60 || !expresion_regular_email.test(comprobar)){ //si no coincide con ninguna de las expresiones, se muestra una ventana de alerta
        alert(dict["El formato del email no es valido"][localStorage['lang']]);
    }
}

//Comprueba que el campo recibido sean solo letras
function comprobarSoloLetras(campo){ 
    comprobar = document.getElementById(campo).value; //valor de la id recibida
    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(!regexp_letras.test(comprobar)){ //si no coincide con ninguna de las expresiones, se muestra una ventana de alerta
        alert(dict["Solo se admiten letras en este campo"][localStorage['lang']]);
    }
}



//Comprueba la validez de todos los datos del formulario de centro
function comprobarCentro(){
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var nombrecentro = document.forms["Form"]["nombrecentro"].value; //valor de nombrecentro recibido por el formulario
    var direccioncentro = document.forms["Form"]["direccioncentro"].value; //valor de direccioncentro recibido por el formulario
    var responsablecentro = document.forms["Form"]["responsablecentro"].value; //valor de responsablecentro recibido por el formulario
    if(codcentro.length<3 || codcentro.length > 10){ //si el codcentro esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    if(codedificio.length<3 || codedificio.length > 10){ //si el codedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }

    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombrecentro.length<3 || nombrecentro.length > 50 || !regexp_letras.test(nombrecentro)){ //si el nombrecentro esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre centro invalido"][localStorage['lang']]);
        return false;
    }

    if(direccioncentro.length<3 || direccioncentro.length > 150){ //si el direccioncentro esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Direccion centro invalida"][localStorage['lang']]);
        return false;
    }
    if(responsablecentro.length<3 || responsablecentro.length > 60 || !regexp_letras.test(responsablecentro)){ //si el responsablecentro esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Responsable centro invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de centro
function comprobarCentroSearch(){
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var nombrecentro = document.forms["Form"]["nombrecentro"].value; //valor de nombrecentro recibido por el formulario
    var direccioncentro = document.forms["Form"]["direccioncentro"].value; //valor de direccioncentro recibido por el formulario
    var responsablecentro = document.forms["Form"]["responsablecentro"].value; //valor de responsablecentro recibido por el formulario
    if(codcentro.length > 10){ //si el codcentro tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    if(codedificio.length > 10){ //si el codedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }

    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombrecentro.length > 50 || !regexp_letras.test(nombrecentro)){ //si el nombrecentro tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }

    if(direccioncentro.length > 150){ //si el direccioncentro tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(responsablecentro.length > 60 || !regexp_letras.test(responsablecentro)){ //si el responsablecentro tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de edificio
function comprobarEdificio(){
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var nombreedificio = document.forms["Form"]["nombreedificio"].value; //valor de nombreedificio recibido por el formulario
    var direccionedificio = document.forms["Form"]["direccionedificio"].value; //valor de direccionedificio recibido por el formulario
    var campusedificio = document.forms["Form"]["campusedificio"].value; //valor de campusedificio recibido por el formulario
    if(codedificio.length < 3 || codedificio.length > 10){ //si el codedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(nombreedificio.length < 3 || nombreedificio.length > 50){ //si el nombreedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Nombre edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(direccionedificio.length < 3 || direccionedificio.length > 150){ //si el direccionedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Direccion edificio invalida"][localStorage['lang']]);
        return false;
    }
    if(campusedificio.length < 3 || campusedificio.length > 10){ //si el campusedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Campus edificio invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de edificio`search`
function comprobarEdificioSearch(){
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var nombreedificio = document.forms["Form"]["nombreedificio"].value; //valor de nombreedificio recibido por el formulario
    var direccionedificio = document.forms["Form"]["direccionedificio"].value; //valor de direccionedificio recibido por el formulario
    var campusedificio = document.forms["Form"]["campusedificio"].value; //valor de campusedificio recibido por el formulario
    if(codedificio.length > 10){ //si el codedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(nombreedificio.length > 50){ //si el nombreedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Nombre edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(direccionedificio.length > 150){ //si el direccionedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Direccion edificio invalida"][localStorage['lang']]);
        return false;
    }
    if(campusedificio.length > 10){ //si el campusedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Campus edificio invalido"][localStorage['lang']]);
        return false;
    }
}


//Comprueba la validez de todos los datos del formulario de espacio
function comprobarEspacio(){
    var codespacio = document.forms["Form"]["codespacio"].value; //valor de codespacio recibido por el formulario
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var tipo = document.forms["Form"]["tipo"].value; //valor de tipo recibido por el formulario
    var superficieespacio = parseInt(document.forms["Form"]["superficieespacio"].value); //valor de superficieespacio recibido por el formulario
    var numinventarioespacio = parseInt(document.forms["Form"]["numinventarioespacio"].value); //valor de numinventarioespacio recibido por el formulario
    if(codespacio.length < 3 || codespacio.length > 10){ //si el codespacio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo espacio invalido"][localStorage['lang']]);
        return false;
    }
    if(codedificio.length < 3 || codedificio.length > 10){ //si el codedificio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(codcentro.length < 3 || codcentro.length > 10){ //si el codcentro esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    if(tipo == ""){ //si el tipo esta vacio se muestra una ventana y se devuelve false
        alert(dict["Escoge un tipo"][localStorage['lang']]);
        return false;
    }
    if(!Number.isInteger(superficieespacio) || superficieespacio == "" || superficieespacio.length > 9999){ //si el superficieespacio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Superficie espacio invalida"][localStorage['lang']]);
        return false;
    }
    if(!Number.isInteger(numinventarioespacio) || numinventarioespacio == "" || numinventarioespacio.length > 99999999){ //si el numinventarioespacio esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Numero inventario invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de espacio
function comprobarEspacioSearch(){
    var codespacio = document.forms["Form"]["codespacio"].value; //valor de codespacio recibido por el formulario
    var codedificio = document.forms["Form"]["codedificio"].value; //valor de codedificio recibido por el formulario
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var tipo = document.forms["Form"]["tipo"].value; //valor de tipo recibido por el formulario
    var superficieespacio = parseInt(document.forms["Form"]["superficieespacio"].value); //valor de superficieespacio recibido por el formulario
    var numinventarioespacio = parseInt(document.forms["Form"]["numinventarioespacio"].value); //valor de numinventarioespacio recibido por el formulario
    if(codespacio.length > 10){ //si el codespacio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo espacio invalido"][localStorage['lang']]);
        return false;
    }
    if(codedificio.length > 10){ //si el codedificio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo edificio invalido"][localStorage['lang']]);
        return false;
    }
    if(codcentro.length > 10){ //si el codcentro tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    if(!Number.isInteger(superficieespacio) || superficieespacio.length > 9999){ //si el superficieespacio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Superficie espacio invalida"][localStorage['lang']]);
        return false;
    }
    if(!Number.isInteger(numinventarioespacio) || numinventarioespacio.length > 99999999){ //si el numinventarioespacio tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Numero inventario invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de profespacio
function comprobarProfEspacio(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var codespacio = document.forms["Form"]["codespacio"].value; //valor de codespacio recibido por el formulario
    if(dni == ""){ //si el dni esta vacio se muestra una ventana y se devuelve false
        alert(dict["Dni invalido"][localStorage['lang']]);
        return false;
    }
    if(codespacio == ""){ //si el codespacio esta vacio se muestra una ventana y se devuelve false
        alert(dict["Codigo espacio invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de profespacio
function comprobarProfEspacioSearch(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var codespacio = document.forms["Form"]["codespacio"].value; //valor de codespacio recibido por el formulario
    if(dni.length>9){ //si el dni longitud es mayor de 9 se devuelve false
        alert(dict["Dni demasiado largo"][localStorage['lang']]);
        return false;
    }
    if(codespacio.length>10){ //si el codespacio es mayor de 10 se devuelve false
        alert(dict["Codigo espacio demasiado largo"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de proftitulacion
function comprobarProfTitulacion(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var codtitulacion = document.forms["Form"]["codtitulacion"].value; //valor de codtitulacion recibido por el formulario
    var anhoacademico = document.forms["Form"]["anhoacademico"].value; //valor de anhoacademico recibido por el formulario

    if(dni == "" || dni.length > 9){ //si el dni esta vacio se muestra una ventana y se devuelve false
        alert(dict["Dni invalido"][localStorage['lang']]);
        return false;
    }
    if(codtitulacion == "" || codtitulacion.length>10){ //si el codtitulacion esta vacio o es demasiado grande se muestra una ventana y se devuelve false
        alert("Codigo titulacion invalido");
        return false;
    }

    regexp = /^\d{4}-\d{4}$/; //expresion con la que debe coincidir

    if(!regexp.test(anhoacademico)){ //si el anhoacademico no coincide con la expresion regular
        alert("Año academico invalido");
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de proftitulacion
function comprobarProfTitulacionSearch(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var codtitulacion = document.forms["Form"]["codtitulacion"].value; //valor de codtitulacion recibido por el formulario
    var anhoacademico = document.forms["Form"]["anhoacademico"].value; //valor de anhoacademico recibido por el formulario

    if(dni.length > 9){ //si el dni es demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Dni demasiado largo"][localStorage['lang']]);
        return false;
    }
    if(codtitulacion.length>10){ //si el codtitulacion es demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo titulacion invalido"][localStorage['lang']]);
        return false;
    }
    regexp = /^\d{4}-\d{4}$/; //expresion con la que debe coincidir
    if(!regexp.test(anhoacademico)){ //si el anhoacademico es demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Año academico invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de profesor
function comprobarProfesor(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var nombreprofesor = document.forms["Form"]["nombreprofesor"].value; //valor de nombreprofesor recibido por el formulario
    var apellidosprofesor = document.forms["Form"]["apellidosprofesor"].value; //valor de apellidosprofesor recibido por el formulario
    var areaprofesor = document.forms["Form"]["areaprofesor"].value; //valor de areaprofesor recibido por el formulario
    var departamentoprofesor = document.forms["Form"]["departamentoprofesor"].value; //valor de departamentoprofesor recibido por el formulario


    expresion_regular_dni = /^\d{8}[a-zA-Z]$/; //expresion regular que tiene que coincidir

    if(expresion_regular_dni.test(dni) == true){ //si coincide con la expresion regular se selecciona la letra y el numero y se comprueba que son correctos mediante el algoritmo
        numeroDNI = dni.substr(0,dni.length-1); //los 8 numeros que conforman el dni
        letraDNI = dni.substr(dni.length-1,1); //la letra del dni
        numero = numeroDNI % 23; //el numero del dni modulo 23 para seleccionar la letra correspondiente
        letra='TRWAGMYFPDXBNJZSQVHLCKET'; //todas las letras que puede tener un DNI en el orden de seleccion apropiado
        letra=letra.substring(numero,numero+1); //se escoge la letra apropiada

        if (letra!=letraDNI.toUpperCase()) { //si la letra no es correcta se muestra un mensaje de error
           alert(dict['DNI erroneo, la letra del NIF no se corresponde'][localStorage['lang']]);
           return false;
        }
    }
    else //si no coincidio con la expresion regular, se muestra una ventana de error 
    {
        alert(dict['DNI erroneo, formato no válido'][localStorage['lang']]);
        return false;
    }
    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombre.length < 3 || nombre.length > 15 || !regexp_letras.test(nombre)){ //si el nombre esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre invalido"][localStorage['lang']]);
        return false;
    }

    if(apellidos.length < 3 || apellidos.length > 30 || !regexp_letras.test(apellidos)){ //si apellidos esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Apellidos invalidos"][localStorage['lang']]);
        return false;
    }
    if(areaprofesor.length < 3 || areaprofesor.length > 60){ //si el areaprofesor esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Area profesor invalida"][localStorage['lang']]);
        return false;
    }
    if(departamentoprofesor.length < 3 || departamentoprofesor.length > 60){ //si el departamentoprofesor esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Departamento profesor invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de profesor
function comprobarProfesorSearch(){
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var nombreprofesor = document.forms["Form"]["nombreprofesor"].value; //valor de nombreprofesor recibido por el formulario
    var apellidosprofesor = document.forms["Form"]["apellidosprofesor"].value; //valor de apellidosprofesor recibido por el formulario
    var areaprofesor = document.forms["Form"]["areaprofesor"].value; //valor de areaprofesor recibido por el formulario
    var departamentoprofesor = document.forms["Form"]["departamentoprofesor"].value; //valor de departamentoprofesor recibido por el formulario

    if(dni.length>9){
        alert(dict["Dni demasiado largo"][localStorage['lang']]);
        return false;
    }

    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombre.length > 15 || !regexp_letras.test(nombre)){ //si el nombre o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre invalido"][localStorage['lang']]);
        return false;
    }

    if(apellidos.length > 30 || !regexp_letras.test(apellidos)){ //si apellidos o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Apellidos invalidos"][localStorage['lang']]);
        return false;
    }
    if(areaprofesor.length > 60){ //si el areaprofesor o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Area profesor invalida"][localStorage['lang']]);
        return false;
    }
    if(departamentoprofesor.length > 60){ //si el departamentoprofesor o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Departamento profesor invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de titulacion
function comprobarTitulacion(){
    var codtitulacion = document.forms["Form"]["codtitulacion"].value; //valor de codtitulacion recibido por el formulario
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var nombretitulacion = document.forms["Form"]["nombretitulacion"].value; //valor de nombretitulacion recibido por el formulario
    var responsabletitulacion = document.forms["Form"]["responsabletitulacion"].value; //valor de responsabletitulacion recibido por el formulario
    if(codtitulacion.length < 3 || codtitulacion.length > 10){ //si el codtitulacion esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo titulacion invalido"][localStorage['lang']]);
        return false;
    }
    if(codcentro.length < 3 || codcentro.length > 10){ //si el codcentro esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombretitulacion.length < 3 || nombretitulacion.length > 15 || !regexp_letras.test(nombretitulacion)){ //si el nombretitulacion esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre titulacion invalido"][localStorage['lang']]);
        return false;
    }

    if(responsabletitulacion.length < 3 || responsabletitulacion.length > 30 || !regexp_letras.test(responsabletitulacion)){ //si responsabletitulacion esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Responsable titulacion invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de titulacion
function comprobarTitulacionSearch(){
    var codtitulacion = document.forms["Form"]["codtitulacion"].value; //valor de codtitulacion recibido por el formulario
    var codcentro = document.forms["Form"]["codcentro"].value; //valor de codcentro recibido por el formulario
    var nombretitulacion = document.forms["Form"]["nombretitulacion"].value; //valor de nombretitulacion recibido por el formulario
    var responsabletitulacion = document.forms["Form"]["responsabletitulacion"].value; //valor de responsabletitulacion recibido por el formulario
    if(codtitulacion.length > 10){ //si el codtitulacion tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo titulacion invalido"][localStorage['lang']]);
        return false;
    }
    if(codcentro.length > 10){ //si el codcentro tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Codigo centro invalido"][localStorage['lang']]);
        return false;
    }
    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombretitulacion.length > 15 || !regexp_letras.test(nombretitulacion)){ //si el nombretitulacion tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre titulacion invalido"][localStorage['lang']]);
        return false;
    }

    if(responsabletitulacion.length > 30 || !regexp_letras.test(responsabletitulacion)){ //si responsabletitulacion tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Responsable titulacion invalido"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de espacio
function comprobarRegistro(){
    var login = document.forms["Form"]["login"].value; //valor de login recibido por el formulario
    var password = document.forms["Form"]["password"].value; //valor de password recibido por el formulario
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var nombre = document.forms["Form"]["nombre"].value; //valor de nombre recibido por el formulario
    var apellidos = document.forms["Form"]["apellidos"].value; //valor de apellidos recibido por el formulario
    var telefono = document.forms["Form"]["telefono"].value; //valor de telefono recibido por el formulario
    var email = document.forms["Form"]["email"].value; //valor de email recibido por el formulario
    var fechanacimiento = document.forms["Form"]["fechanacimiento"].value; //valor de fechanacimiento recibido por el formulario
    var fotopersonal = document.forms["Form"]["fotopersonal"].value; //valor de fotopersonal recibido por el formulario
    var sexo = document.forms["Form"]["sexo"].value; //valor de sexo recibido por el formulario
    if(login.length < 3 || login.length > 15){ //si el login esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Login invalido"][localStorage['lang']]);
        return false;
    }
    if(password.length < 3 || password.length > 128){ //si el password esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Password invalida"][localStorage['lang']]);
        return false;
    }

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/; //expresion regular que tiene que coincidir
    if(expresion_regular_dni.test(dni) == true){ //si coincide con la expresion regular se selecciona la letra y el numero y se comprueba que son correctos mediante el algoritmo
        numeroDNI = dni.substr(0,dni.length-1); //los 8 numeros que conforman el dni
        letraDNI = dni.substr(dni.length-1,1); //la letra del dni
        numero = numeroDNI % 23; //el numero del dni modulo 23 para seleccionar la letra correspondiente
        letra='TRWAGMYFPDXBNJZSQVHLCKET'; //todas las letras que puede tener un DNI en el orden de seleccion apropiado
        letra=letra.substring(numero,numero+1); //se escoge la letra apropiada

        if (letra!=letraDNI.toUpperCase()) { //si la letra no es correcta se muestra un mensaje de error
           alert(dict['DNI erroneo, la letra del NIF no se corresponde'][localStorage['lang']]);
           return false;
        }
    }
    else //si no coincidio con la expresion regular, se muestra una ventana de error 
    {
        alert(dict['DNI erroneo, formato no válido'][localStorage['lang']]);
        return false;
    }

    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombre.length < 3 || nombre.length > 30 || !regexp_letras.test(nombre)){ //si el nombre esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre invalido"][localStorage['lang']]);
        return false;
    }

    if(apellidos.length < 3 || apellidos.length > 50 || !regexp_letras.test(apellidos)){ //si el apellidos esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Apellidos invalidos"][localStorage['lang']]);
        return false;
    }

    expresion_regular_tlf_nacional = /^[0-9]{9}$/; //expresion 1 con la que debe coincidir
    expresion_regular_tlf_internacional = /^(34)?[0-9]{11}/; //expresion 2 con la que debe coincidir

    if(!expresion_regular_tlf_nacional.test(telefono) && !expresion_regular_tlf_internacional.test(telefono)){ //si no coincide con ninguna de las expresiones, se muestra una ventana de alerta
        alert(dict["El formato del telefono no es valido"][localStorage['lang']]);
        return false;
    }

    expresion_regular_email = /^[a-zA-Z0-9_.-]+@[a-zA-Z]+.[a-zA-Z]+(.[a-zA-Z]+)/;

    if(email.length < 3 || email.length > 60|| !expresion_regular_email.test(email)){ //si el email esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Email invalido"][localStorage['lang']]);
        return false;
    }
    if(fechanacimiento == ""){ //si el fechanacimiento esta vacio se muestra una ventana y se devuelve false
        alert(dict["Introduce una fecha de nacimiento"][localStorage['lang']]);
        return false;
    }
    if(fotopersonal == ""){ //si el fotopersonal esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Ruta de foto personal invalida"][localStorage['lang']]);
        return false;
    }
    if(sexo == ""){ //si el sexo esta vacio se muestra una ventana y se devuelve false
        alert(dict["Selecciona un sexo"][localStorage['lang']]);
        return false;
    }
}

//Comprueba la validez de todos los datos del formulario de espacio
function comprobarRegistroSearch(){
    var login = document.forms["Form"]["login"].value; //valor de login recibido por el formulario
    var password = document.forms["Form"]["password"].value; //valor de password recibido por el formulario
    var dni = document.forms["Form"]["dni"].value; //valor de dni recibido por el formulario
    var nombre = document.forms["Form"]["nombre"].value; //valor de nombre recibido por el formulario
    var apellidos = document.forms["Form"]["apellidos"].value; //valor de apellidos recibido por el formulario
    var telefono = document.forms["Form"]["telefono"].value; //valor de telefono recibido por el formulario
    var email = document.forms["Form"]["email"].value; //valor de email recibido por el formulario
    var fechanacimiento = document.forms["Form"]["fechanacimiento"].value; //valor de fechanacimiento recibido por el formulario
    var fotopersonal = document.forms["Form"]["fotopersonal"].value; //valor de fotopersonal recibido por el formulario
    var sexo = document.forms["Form"]["sexo"].value; //valor de sexo recibido por el formulario
    if(login.length > 15){ //si el login esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Login invalido"][localStorage['lang']]);
        return false;
    }
    if(password.length > 20){ //si el password esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Password invalida"][localStorage['lang']]);
        return false;
    }
    if(dni.length>9){ //si el dni es demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Dni demasiado largo"][localStorage['lang']]);
        return false;
    }

    regexp_letras = /^[a-zA-Z]*$/; //expresion con la que debe coincidir

    if(nombre.length > 30 || !regexp_letras.test(nombre)){ //si el nombre esta vacio o tiene una longitud demasiado grande o no son solo letras se muestra una ventana y se devuelve false
        alert(dict["Nombre invalido"][localStorage['lang']]);
        return false;
    }

    if(apellidos.length > 50 || !regexp_letras.test(apellidos)){ //si el apellidos esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Apellidos invalidos"][localStorage['lang']]);
        return false;
    }

    expresion_regular_tlf = /^(34)?[0-9]{0,9}$/; //expresion 1 con la que debe coincidir

    if(!expresion_regular_tlf.test(telefono)){ //si no coincide con ninguna de las expresiones, se muestra una ventana de alerta
        alert(dict["El formato del telefono no es valido"][localStorage['lang']]);
        return false;
    }

    if(email.length > 60){ //si el email esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Email invalido"][localStorage['lang']]);
        return false;
    }
    if(fotopersonal.length > 50){ //si el fotopersonal esta vacio o tiene una longitud demasiado grande se muestra una ventana y se devuelve false
        alert(dict["Ruta de foto personal invalida"][localStorage['lang']]);
        return false;
    }
}

//Comprueba que un campo solo tenga valores alfabeticos
function comprobarLogin(){
    var login = document.forms["Form"]["login"].value; //valor de login recibido por el formulario
    if (login.length > 15 || login.length<3) { //si la longitud del login es mayor de 15 o 0 es invalido
        alert(dict["Login invalido"][localStorage['lang']]);
        return false;
    }
}
