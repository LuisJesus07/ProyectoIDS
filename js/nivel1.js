		/* Lengua cochimie */

		var imagenes=[], preguntas = [], respuestas = [];
		//Variable para guardar progreso
		//var respuest= [];

		function obtenerInformacion(){
			
		    $.ajax({
		        url:'infoNiveles.php',
		        type:'POST',
		        data: 'boton=obtenerInformacion'
		    }).done(function(resp){
		        var r = eval(resp);
		        var i;
		        for(i=0; i<r.length; i++){
		            var arreglo = r[i].toString().split(','); 
		            imagenes[i]= arreglo[1];
		            preguntas[i]= arreglo[2];
		            var preResp= arreglo[3].toString().split('*'); 
		            respuestas[i]= preResp; 
		        }
		        jugar();
		    });
		}

		function mostrarNivel(){
			var html="";
			var id =[], img=[], word=[], answer=[], bloqueo=[];
		    $.ajax({
		        url:'infoNiveles.php',
		        type:'POST',
		        data: 'boton=mostrar'
		    }).done(function(resp){
		        var r = eval(resp);
		        var id =[];
		        var i;
		        for(i=0; i<r.length; i++){
		            var arreglo = r[i].toString().split(',');
		            id[i]= arreglo[0];
		            img[i]= arreglo[1];
		            word[i]= arreglo[2];
		            var preResp= arreglo[3].toString().split('*'); 
		            answer[i]= preResp;
		            bloqueo[i]= arreglo[4];
		            if(bloqueo[i]==0){
		            	html+= "<div class='contenedorImgPregunta color1'><div class='imgPalabra'><img src="+img[i]+"></div><div class='pregunta'>"+word[i]+"</div><div class='palabra'>"+answer[i][0]+"</div><input type='button' class='btn' value='Bloquear' onclick=bloquear("+id[i]+")><input type='button' class='btn2' value='Desbloquear' onclick=desbloquear("+id[i]+")></div>";
		            	}
		            else{
		            	html+= "<div class='contenedorImgPregunta color2'><div class='imgPalabra'><img src="+img[i]+"></div><div class='pregunta'>"+word[i]+"</div><div class='palabra'>"+answer[i][0]+"</div><input type='button' class='btn' value='Bloquear' onclick=bloquear("+id[i]+")><input type='button' class='btn2' value='Desbloquear' onclick=desbloquear("+id[i]+")></div>";		
		            }
		            
		        }
		        document.getElementById("niveles").innerHTML = html;
		    });
		}

		function bloquear(valor){
			var id= valor;
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+id+'&boton=bloquear'
			}).done(function(resp){
				alert(resp);

			});
		}
		function desbloquear(valor){
			var id= valor;
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+id+'&boton=desbloquear'
			}).done(function(resp){
				alert(resp);
			});
		}

		//Metodo para obtener la informacion y poder trabajar con la base de datos de forma dinamica y que esta se actualice
		var nUsuario="", nivelBD="", puntuacionBD="", estrellasBD="", nombreUser="", idBD="";
		function GetUserName()
		{
			nUsuario = $("#nuser").text();
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+nUsuario+'&boton=getPuntuacion'
			}).done(function(resp){
				var html="";
				var r = eval(resp);
		        var arreglo = r.toString().split(',');
		        nivelBD = parseInt(arreglo[0]);
		        puntuacionBD = parseInt(arreglo[1]);
		        estrellasBD= parseInt(arreglo[2]);
		        idBD = arreglo[3];
		        nombreUser= arreglo[4];
		        html = "<h6 id='nomUsuario'>"+nUsuario+"</h6><hr><h4>Nivel</h4><hr><h5 id='nivel'>"+nivelBD+"</h5><hr>";
				html+="<h4>Progreso</h4><hr><h5 id='progreso'>"+progreso+"%</h5><hr><h4>Puntuación</h4><hr><h5 id='puntuacion'>"+puntuacion+"</h5>"
				$("#progress").html(html);	       
			});
		    //alert("Usuario: "+nUsuario+" Nivel: "+nivelBD+" ");
		}

		//Para actualizar el nivel del usuario 
		function actualizarNivel(nivel){
			var niv = nivel;
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+idBD+'&nivel='+niv+'&boton=setNivel'
			}).done(function(resp){	       
			});
		}

		//Metodo para que la puntuacion del usuario se vaya actualizando
		function actualizarPuntuacion(puntuacion){
			var punt = puntuacion;
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+idBD+'&puntuacion='+punt+'&boton=setPuntuacion'
			}).done(function(resp){		       
			});
		}

		//Metodo para actualizar las estrellas que ha acumulado el usuario 
		function actualizarEstrellas(estrellas){
			var est = estrellas;
			$.ajax({
				url:'infoNiveles.php',
				type:'POST',
				data:'id='+idBD+'&estrellas='+est+'&boton=setEstrellas'
			}).done(function(resp){	       
			});
		}



	//variables para saber que juego esta activado
	var preguntasActivado=false;
	var bloquearPreguntas=false;

	/* funcion que inicializa el cronometro dependiendo el nivel*/
	function cronometroNivel(nivelBD){

		if (nivelBD<5) {
			contador_s=30;
			contador_m=2;
		}

		if(nivelBD==5 || nivelBD==6 || nivelBD==7 || nivelBD==8 || nivelBD==9){
			contador_s=15;
			contador_m=2;
		}else{
			if(nivelBD==10 || nivelBD==11 || nivelBD==12 || nivelBD==13 || nivelBD==14){
				contador_s=30;
				contador_m=0;
			}else{
				if(nivelBD==15 || nivelBD==16 || nivelBD==17 || nivelBD==18 || nivelBD==19){
					contador_s=45;
					contador_m=1;
				}else{
					if (nivelBD==20 || nivelBD==21 || nivelBD==22 || nivelBD==23 || nivelBD==24) {
						contador_s=30;
						contador_m=1;
					}else{
						if (nivelBD>=25) {
							contador_s=15;
							contador_m=1;
						}
					}
				}
			}
		}



	}




	/* tiempo limite */

	var cronometro;


	function carga(){

		if(preguntasActivado==true){
			/* valua el tiempo que te da para responder dependiendo en que nivel vas */
			cronometroNivel(nivelBD);
		}else{
			// inicializa el tiempo para el memorama
			contador_m=0;
			contador_s=45;
		}

		
	
		
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

						if(preguntasActivado==true){
							$("#imagenJuego").fadeOut(0);
							$("#pregunta").fadeOut(0);
							$("#respuestas").fadeOut(0);
							$("#contestar").fadeOut(0);
							$("#repNivel").fadeIn(1000);
							$("#pierde").fadeIn(1000);
							bloquearPreguntas=true;
							document.getElementById("pierde").innerHTML = pierde;

						}else{
							$(".contenedorImgPalabra").fadeOut(0);
							$(".repetir").fadeIn(1000);
							$("#pierde").fadeIn(1000);
							document.getElementById("pierde").innerHTML = pierde;
						}
						
							

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



	/* Juego funcionamiento */
		obtenerInformacion();
		var indice_respuesta_correcta;

		var progreso=0;
		var puntuacion=0;
		var nivel=1;
		
		var calificacion=0;
		var estrellas=0;

		/* variables para obtener la calificacion */
		var acierto=0;
		var intentos=0;

		
		function jugar(){

		if(bloquearPreguntas==false){
			GetUserName();

			var indice_pregunta= Math.floor(Math.random()*40);
			console.log(indice_pregunta);
			var indice_imgPregunta = indice_pregunta;
			var respuestas_posibles = respuestas[indice_pregunta];


			var posiciones = [0,1,2,3];
			var respuestas_reordenadas = [];

			var primera_vuelta = false;
			
				for(i in respuestas_posibles){
					var posicion_aleatoria = Math.floor(Math.random()*posiciones.length);
					if(posicion_aleatoria == 0 && primera_vuelta == false){
						indice_respuesta_correcta = i;
						primera_vuelta = true;

					}


					respuestas_reordenadas[i] = respuestas_posibles[posiciones[posicion_aleatoria]];
					posiciones.splice(posicion_aleatoria, 1,);



				}


				
				
				
				var txt_respuestas="";
				for(i in respuestas_reordenadas){
					txt_respuestas += '<input type="radio" name="pp" value="'+i+'"><label>'+respuestas_reordenadas[i]+'</label>';

				}
				var muestra_img= '<img src="'+imagenes[indice_imgPregunta]+'">';
				
				


				document.getElementById("respuestas").innerHTML = txt_respuestas;
				document.getElementById("pregunta").innerHTML = preguntas[indice_pregunta];
				document.getElementById("imagenJuego").innerHTML = muestra_img;

			}
		
			
		}




			function comprobar(){

				if(bloquearPreguntas==false){

					var respuesta = $("input[type=radio]:checked").val();

				if (respuesta == null) {
					//alert("Seleccione una opcion");
					var alerta='<img src="img/juego/alerta.png">';

					$("#alerta").fadeIn(100);

					document.getElementById("alerta").innerHTML = alerta;
					

				}else{
						intentos=intentos+1;
						var correcta='<img src="img/juego/correcto.png">';
						var incorrecta='<img src="img/juego/incorrecto.png">';

						if(respuesta == indice_respuesta_correcta){
							//alert("Respuesta correcta");
							$("#alerta").fadeOut(0);
							$("#correcta").fadeIn(100);
							$("#correcta").fadeOut(1000);
							acierto=acierto+1;
							progreso=progreso+10;
							puntuacion+=100;
							GetUserName();
							document.getElementById("correcta").innerHTML = correcta;
							


						}else{
							//alert("Respuesta incorrecta");
							$("#alerta").fadeOut(0);
							$("#incorrecta").fadeIn(100);
							$("#incorrecta").fadeOut(1000);
							document.getElementById("incorrecta").innerHTML = incorrecta;
							if(puntuacion>0){
								puntuacion-=50;
								GetUserName();
							}
							
							
						}


						
						

						/* muestra la imagen de ganador*/
						var ganaste='<img src="img/juego/ganaste.png">';
						if (progreso == 100) {
							$("#imagenJuego").fadeOut(0);
							$("#pregunta").fadeOut(0);
							$("#respuestas").fadeOut(0);
							$("#contestar").fadeOut(0);
							$("#ganaste").fadeIn(1000);
							$("#sigNivel").fadeIn(1000);
							
							document.getElementById("ganaste").innerHTML = ganaste;

							clearInterval(cronometro);



							// puntuacion que determina cuantos estrellas ganas
							if (puntuacion>=1000) {
								estrellas+=3;
							}else{
								if (puntuacion>=850) {
									estrellas+=2;
								}else{
									estrellas+=1;
								}
							}
							var muestra_estrellas= '<img src="img/juego/estrella'+estrellas+'.png">';
							$("#estrellas").fadeIn(1000);

							/* formula para sacar la calificacion*/
							calificacion=acierto/intentos*100;
							var muestra_calificacion='<p>'+calificacion.toFixed()+'</p>';

							

							
							}



					document.getElementById("progreso").innerHTML = progreso;
					document.getElementById("puntuacion").innerHTML = puntuacion;
					document.getElementById("nivel").innerHTML = nivel;
					document.getElementById("estrellas").innerHTML = muestra_estrellas;
					document.getElementById("calificacion").innerHTML = muestra_calificacion;
					


						

					jugar();	

				}

				}
				
				
			}

	/* iniciar */

	function iniciar(){
		$("#muestra_pregunta").fadeIn(300);
		$("#iniciar").fadeOut(0);
		preguntasActivado=true;

		carga();
		
		

	}

	function sigNivel(){
		carga();
		$("#ganaste").fadeOut(0);
		$(".calificacion").fadeOut(0);
		$("#estrellas").fadeOut(0);
		$("#sigNivel").fadeOut(0);
		$("#imagenJuego").fadeIn(300);
		$("#pregunta").fadeIn(300);
		$("#respuestas").fadeIn(300);
		$("#contestar").fadeIn(300);
		$("#muestra_pregunta").fadeIn(300);
		/*puntuacion=0;
		estrellas=0;*/
		
		// actrualiza el nivel del usuario en la base de datos
		nivelBD= nivelBD+1;
		actualizarNivel(nivelBD);
		document.getElementById("nivel").innerHTML = nivelBD; 

		// actrualiza la puntuacion del usuario en la base de datos
		puntuacionBD = puntuacionBD+puntuacion;
		actualizarPuntuacion(puntuacionBD);

		// actrualiza las estrellas del usuario en la base de datos
		estrellasBD = estrellasBD+estrellas;
		actualizarEstrellas(estrellasBD);

		GetUserName();


		progreso=0; 
		puntuacion=0;
		estrellas=0;

		// valua el tiempo dependiendo en que nivel vas
		cronometroNivel(nivelBD);

		s = document.getElementById("segundos");
		m = document.getElementById("minutos");
		m.innerHTML = contador_m;
		s.innerHTML = contador_s;


		document.getElementById("progreso").innerHTML = progreso;
		document.getElementById("puntuacion").innerHTML = puntuacion;
		

		
	}

	function repNivel(){
		carga();
		$("#pierde").fadeOut(0);
		$("#repNivel").fadeOut(0);
		$("#imagenJuego").fadeIn(300);
		$("#pregunta").fadeIn(300);
		$("#respuestas").fadeIn(300);
		$("#contestar").fadeIn(300);
		$("#muestra_pregunta").fadeIn(300);
		

		progreso=0; 
		puntuacion=0;
		estrellas=0;

		// valua el tiempo dependiendo en que nivel vas
		cronometroNivel(nivelBD); 

		

		s = document.getElementById("segundos");
		m = document.getElementById("minutos");
		m.innerHTML = contador_m;
		s.innerHTML = contador_s;


		document.getElementById("progreso").innerHTML = progreso;
		document.getElementById("puntuacion").innerHTML = puntuacion;
	}



 /************MEMORAMA************************************************************************************/

	var primeraPalabra='';
	var segundaPalabra='';
	var contMemorama=0;
	var progresoMemorama=0;
	var puntuacionMemorama=0;
	var ganaste='<img src="img/juego/ganaste.png">';
	
	// variables para guardar que cartaas ya fueran seleccionadas
	var yaSelectUno=false;
	var yaSelectUno1='';
	var yaSelectUno2='';
	var yaSelectDos=false;
	var yaSelectDos1='';
	var yaSelectDos2='';
	var yaSelectTres=false;
	var yaSelectTres1='';
	var yaSelectTres2='';
	var yaSelectCuatro=false;
	var yaSelectCuatro1='';
	var yaSelectCuatro2='';
	
	


	function muestraPalabra(palabra, estado){

		
		// evalua que la carta que seleccionaste este disponible
		if(palabra!=yaSelectUno1 && palabra!=yaSelectUno2 && palabra!=yaSelectDos1 && palabra!=yaSelectDos2
			&& palabra!=yaSelectTres1 && palabra!=yaSelectTres2 && palabra!=yaSelectCuatro1 && palabra!=yaSelectCuatro2){



			if(primeraPalabra==''){
				primeraPalabra=palabra;
			}else{
				segundaPalabra=palabra;
			}

			$("."+palabra+"No").fadeOut(0);
			$("."+palabra+"").fadeIn(300);


			contMemorama+=1;

			// cuando el contador llega a 2 evalua si es par o no
			if(contMemorama==2){


				if(primeraPalabra+"2"==segundaPalabra || primeraPalabra==segundaPalabra+"2"){
					progresoMemorama+=20;
					puntuacionMemorama+=100;

					desabilitaCarta();
					
							
				}else{

					// si es incorrecto pierde 50 puntos
					if(puntuacionMemorama>0){
						puntuacionMemorama-=50;
					}
											
					evaluaError();
					//setTimeout('evaluaError();',1000);

				}

				// cuando el progreso llega a 100 muestra mensaje ganador
				if(progresoMemorama==100){

					$(".contenedorImgPalabra").fadeOut(0);
					$("#ganaste").fadeIn(1000);
					$("#sigNivel").fadeIn(1000);
					clearInterval(cronometro);

				}

				document.getElementById("progreso").innerHTML = progresoMemorama;
				document.getElementById("puntuacion").innerHTML = puntuacionMemorama;
				document.getElementById("ganaste").innerHTML = ganaste;



				contMemorama=0;
				primeraPalabra='';
				segundaPalabra=''; 
			}

		}else{
			alert("Ya seleccionada");
		}
	}



	function evaluaError(){
		$("."+segundaPalabra+"No").fadeIn(300);
		$("."+segundaPalabra+"").fadeOut(0);

		$("."+primeraPalabra+"No").fadeIn(300);
		$("."+primeraPalabra+"").fadeOut(0);
	}

	

	function desabilitaCarta(){
		// guardar la carta en una variable para que ya no se pueda seleccionar
		if(yaSelectUno1=='' && yaSelectUno2=='' && yaSelectUno==false){
			yaSelectUno1=primeraPalabra;
			yaSelectUno2=segundaPalabra;
			yaSelectUno=true;

		}else{
			if(yaSelectDos1=='' && yaSelectDos2=='' && yaSelectDos==false){
				yaSelectDos1=primeraPalabra;
				yaSelectDos2=segundaPalabra;
				yaSelectDos=true;

			}else{
				if(yaSelectTres1=='' && yaSelectTres2=='' && yaSelectTres==false){
					yaSelectTres1=primeraPalabra;
					yaSelectTres2=segundaPalabra;
					yaSelectTres=true;

				}else{
					if(yaSelectCuatro1=='' && yaSelectCuatro2=='' && yaSelectCuatro==false){
						yaSelectCuatro1=primeraPalabra;
						yaSelectCuatro2=segundaPalabra;
						yaSelectCuatro=true;

					}

				}
			}
		}
	}
	


	function iniciarMemorama(){
		$(".memorama").fadeIn(300);
		$(".tiempo-memorama").fadeIn(300);
		$("#iniciarMemorama").fadeOut(0);
		memoramaActivado=true;


		carga();
		
		
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

		location.reload();
	}

	function repNivelMemorama(){
		location.reload();
	}


	// Mostrar cartas de manera aleatoria  
	var cartas = $(".carta");
	for(var i = 0; i < cartas.length; i++){
	    var target = Math.floor(Math.random() * cartas.length -1) + 1;
	    var target2 = Math.floor(Math.random() * cartas.length -1) +1;
	    cartas.eq(target).before(cartas.eq(target2));
	}
	




