	/* Memoraba */

	var contMemorama=0;
	var primeraPalabra='';
	var segundaPalabra='';
	var activadaPalabraUno = true;
	var activadaPalabraDos = true;
	var activadaPalabraTres = true;
	var activadaPalabraCuatro = true;
	var yaSelecUno = false;
	var yaSelecDos = false;
	var yaSelecTres = false;
	var yaSelecCuatro = false;
	var yaSelecCinco = false;
	var yaSelecSeis = false;
	var yaSelecSiete = false;
	var yaSelecOcho = false;

	var progresoMemorama=0;
	var puntuacionMemorama=0;
	var estrellasMemorama=0;

	function muestraPalabra(palabra){


		if(activadaPalabraUno == true && yaSelecUno==false){

			yaSelecUno=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}
			

			$(".noMostrada").fadeOut(0);
			$(".mostrada").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){

				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraUno = false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{

					if(puntuacionMemorama>=0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

					

				}
			}

		}
			


	}

	function muestraPalabraDos(palabra){


		if(activadaPalabraDos == true && yaSelecDos==false){

			yaSelecDos=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}
			

			$(".noMostradaDos").fadeOut(0);
			$(".mostradaDos").fadeIn(300);

			contMemorama+=1;
			

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraDos = false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{

					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			

		

	}


	function muestraPalabraTres(palabra){

		if(activadaPalabraTres == true && yaSelecTres==false){

			yaSelecTres=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$(".noMostradaTres").fadeOut(0);
			$(".mostradaTres").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraTres = false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{

					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			



	}

	function muestraPalabraCuatro(palabra){

		if(activadaPalabraCuatro==true && yaSelecCuatro==false){

			yaSelecCuatro=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$(".noMostradaCuatro").fadeOut(0);
			$(".mostradaCuatro").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraCuatro=false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			


	}

	function muestraPalabraCinco(palabra){

		if(activadaPalabraUno == true && yaSelecCinco==false){

			yaSelecCinco=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$(".noMostradaCinco").fadeOut(0);
			$(".mostradaCinco").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraUno = false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);

					

				}else{
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			



	}

	function muestraPalabraSeis(palabra){

		if(activadaPalabraDos == true && yaSelecSeis==false){

			yaSelecSeis=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$(".noMostradaSeis").fadeOut(0);
			$(".mostradaSeis").fadeIn(300);

			contMemorama+=1;
			

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraDos = false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			

		


	}



	function muestraPalabraSiete(palabra){

		
		if(activadaPalabraTres== true && yaSelecSiete==false){

			yaSelecSiete=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}
			

			$(".noMostradaSiete").fadeOut(0);
			$(".mostradaSiete").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraTres=false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);

				}
			}

		}
			



	}

	function muestraPalabraOcho(palabra){

		if(activadaPalabraCuatro== true && yaSelecOcho==false){

			yaSelecOcho=true;

			if(primeraPalabra == ''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$(".noMostradaOcho").fadeOut(0);
			$(".mostradaOcho").fadeIn(300);

			contMemorama+=1;

			if(contMemorama==2){
				
				if (primeraPalabra==segundaPalabra) {
					contMemorama=0;
					primeraPalabra='';
					segundaPalabra='';
					activadaPalabraCuatro=false;
					progresoMemorama+=25;
					puntuacionMemorama+=100;
					document.getElementById("progreso").innerHTML = progresoMemorama;
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					//ganoMemorama(progresoMemorama);
					setTimeout('ganoMemorama(progresoMemorama)',500);


				}else{
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
					document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
					setTimeout('noEsPar()',1000);


				}
			}

		}
			


	} 

	function cargaMemorama(){

		
		// inicializa el tiempo
		contador_m=10;
		contador_s=10;

	
		
		var pierde='<img src="img/juego/pierde.png">'

		s = document.getElementById("segundos");
		m = document.getElementById("minutos");

		cronometro = setInterval(
			function(){
				
				if(contador_s==0){
					contador_s=60;
					contador_m--;
					m.innerHTML = contador_m;
					if(contador_m<0){
						
						$(".contenedorImgPalabra").fadeOut(0);
						$(".repetir").fadeIn(1000);
						$("#pierde").fadeIn(1000);
						document.getElementById("pierde").innerHTML = pierde;

						m.innerHTML = 0;
						s.innerHTML = 0;
						clearInterval(cronometro);


						
					}
				}else{
					contador_s--;
					s.innerHTML = contador_s;
					m.innerHTML = contador_m;

				}


				

			}
			,1000);
	}


	function iniciarMemorama(){
		$(".memorama").fadeIn(300);
		$(".tiempo-memorama").fadeIn(300);
		$("#iniciarMemorama").fadeOut(0);


		cargaMemorama();
		
		
	}
	

	function ganoMemorama(progresoMemorama,puntuacionMemorama){

		var ganaste='<img src="img/juego/ganaste.png">';
	

		if(progresoMemorama==100){

			$(".contenedorImgPalabra").fadeOut(0);
			$("#ganaste").fadeIn(1000);
			$("#sigNivel").fadeIn(1000);
			clearInterval(cronometro);

			document.getElementById("ganaste").innerHTML = ganaste;
			$("#estrellas").fadeIn(1000);
			document.getElementById("estrellas").innerHTML = muestra_estrellas;	
		}

		
		
	}

	function sigNivelMemorama(){
		// actrualiza el nivel del usuario en la base de datos
		nivelBD= nivelBD+1;
		actualizarNivel(nivelBD);
		document.getElementById("nivel").innerHTML = nivelBD; 

		// actrualiza la puntuacion del usuario en la base de datos
		puntuacionBD = puntuacionBD+puntuacionMemorama;
		actualizarPuntuacion(puntuacionBD);

		GetUserName();
	}

	function repNivelMemorama(){
		location.reload();
	}






	function noEsPar(){
		contMemorama=0;
		primeraPalabra='';
		segundaPalabra='';
		yaSelecUno = false;
		yaSelecDos = false;
		yaSelecTres = false;
		yaSelecCuatro = false;
		yaSelecCinco = false;
		yaSelecSeis = false;
		yaSelecSiete = false;
		yaSelecOcho = false;

		if(activadaPalabraUno==true){
			$(".mostrada").fadeOut(0);
			$(".noMostrada").fadeIn(300);
			$(".mostradaCinco").fadeOut(0);
			$(".noMostradaCinco").fadeIn(300);
		}

		if(activadaPalabraDos==true){

			$(".mostradaDos").fadeOut(0);
			$(".noMostradaDos").fadeIn(300);
			$(".mostradaSeis").fadeOut(0);
			$(".noMostradaSeis").fadeIn(300);

		}

		if(activadaPalabraTres==true){

			$(".mostradaTres").fadeOut(0);
			$(".noMostradaTres").fadeIn(300);
			$(".mostradaSiete").fadeOut(0);
			$(".noMostradaSiete").fadeIn(300);

		}

		if(activadaPalabraCuatro==true){

			$(".mostradaCuatro").fadeOut(0);
			$(".noMostradaCuatro").fadeIn(300);
			$(".mostradaOcho").fadeOut(0);
			$(".noMostradaOcho").fadeIn(300);

		}
	} 

