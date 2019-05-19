/* Aparece logon usuario */
function aparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'0'
	}, 500);
}
function desaparecelogin (){
	event.preventDefault();
	$("#login").animate({
		'top':'-100'
	}, 500);
}

/* Aparece logon admin */
function apareceloginAdmin (){
	event.preventDefault();
	$("#loginAdmin").fadeIn(1);
	$("#loginAdmin").animate({
		'bottom':'0'
	}, 500);
}
function desapareceloginAdmin (){
	event.preventDefault();
	$("#loginAdmin").animate({
		'bottom':'-80'
	}, 500);
	$("#loginAdmin").fadeOut(1);
}



/* Formulario de Registro Usuario*/

function desapareceRegistro (){
	$("#oscurecer").fadeOut();
}

function desapareceFormulario (){
	$("#registrar").fadeOut(300,desapareceRegistro);
}

function mostrarFormulario (){
	$("#registrar").fadeIn();
	$("#oscurecer").click(desapareceFormulario);
	$("#cerrarRegistro").click(desapareceFormulario);
}

function apareceRegistro (e){
	e.preventDefault();
	$("#oscurecer").fadeIn(400, mostrarFormulario);
}


function mostrarLoginYRegistro(){
	$("#activarLogin").click(aparecelogin);
	$("#cerrar").click(desaparecelogin);

	$("#activarRegistro").click(apareceRegistro);
}

/* mostrar eliminar */

function desapareceEliminar (){

	$("#eliminar").fadeOut(300,desapareceRegistro);

}
function desapareceFormularioEliminar(){
	$("#eliminar").fadeOut(300,desapareceRegistro);

}

function formularioEliminar(){
	$("#eliminar").fadeIn();
	$("#oscurecer").click(desapareceEliminar);
	$("#cerrarRegistro").click(desapareceEliminar);

}

function mostrarEliminar(){

	$("#oscurecer").fadeIn(400, formularioEliminar);
	$("#cerrarEliminar").click(desapareceFormularioEliminar);

}

/* Ubicaciones */
function guaycuras(){
	$("#informacionGuaycuras").fadeIn(700);
	$(".instrucciones").fadeOut(0);
	$("#informacionCochimies").fadeOut(0);
	$("#informacionPericues").fadeOut(0);
}

function cochimies(){
	$("#informacionCochimies").fadeIn(700);
	$(".instrucciones").fadeOut(0);
	$("#informacionGuaycuras").fadeOut(0);
	$("#informacionPericues").fadeOut(0);
}

function pericues(){
	$("#informacionPericues").fadeIn(700);
	$(".instrucciones").fadeOut(0);
	$("#informacionCochimies").fadeOut(0);
	$("#informacionGuaycuras").fadeOut(0);
}


$(document).ready (mostrarLoginYRegistro);
