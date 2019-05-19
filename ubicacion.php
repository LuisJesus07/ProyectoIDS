<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['usuario']) && !isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: login.php");

		}
	 ?>

	<div class="fondoDiccionario">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Grupos Autóctonos</h2>

		<div class="instrucciones">

			<h1>Mapa Interactivo</h1>
			<hr>

			<p>Haz clic sobre cualquier región del mapa para saber más información acerca del grupo indígena que habitaba ahí.</p>

			
		</div>

		<div class="informacion" id="informacionGuaycuras" style="height: 650px;">

			<h1>Guaycuras</h1>

			<p>Los guaycuras fueron los primeros pobladores en ocupar las tierras que actualmente abarcan desde el sur de Loreto hasta Todos Santos. Esta etnia estaba dividida en cuatro grupos que comprende a los Pericúes que se ubicaban hacia San Juan de la Costa; Aripes, asentados en la actual ciudad de La Paz; Huchities, abarcando la zona que da a Todos Santos; y los Coras, ubicados desde Pichilingue hasta Los Planes y San Antonio.Rodeados por dos mares y por tribus humanas al norte,los guaycuras no tuvieron contacto con otras cultura mas desarrolladas.</p>

			<img src="img/mapaInteractivo/guaycuras1.jpg">
			<img src="img/mapaInteractivo/guaycuras2.jpg">
			<img src="img/mapaInteractivo/guaycuras3.jpg">
			
		</div>

		<div class="informacion" id="informacionCochimies" style="height: 650px;">

			<h1>Cochimies</h1>

			<p>Los cochimíes ocuparon la parte central de la Península de California, abarcando los actuales estados de Baja California y Baja California Sur, no existían grandes asentamientos ya que eran básicamente nómadas que vivían de la recolección y la pesca, pues igual que sus vecinos del sur los guaycuras y pericúes, no conocían la agricultura ni ganadería.Para los Cochimíes el año estaba dividido en 6 partes, la primera de estas 6 temporadas y la más importante la llamaban mejibó,era la temporada de pitahayas (julio y agosto).</p>

			<img src="img/mapaInteractivo/cochimies1.jpg">
			<img src="img/mapaInteractivo/cochimies2.jpg">
			<img src="img/mapaInteractivo/cochimies3.jpg">
			
		</div>

		<div class="informacion" id="informacionPericues" style="height: 650px;">

			<h1>Pericues</h1>

			<p>Los pericúes fueron unos de los primeros pobladores que vivieron en la zona sur de la península de Baja California, donde actualmente se ubica Los Cabos abarcando desde Cabo San Lucas hasta Cabo Pulmo, vivían con grandes carencias, en un estado de austeridad por el medio que distingue a tierras sudcalifornias donde hay escasez de agua y predomina el calor.Los pericúes (también conocidos como edúes y coras) desconocían las actividades agrícolas, por lo que su sobrevivencia estaba basada en la caza y recolección de frutos.</p>

			<img src="img/mapaInteractivo/pericues1.jpg">
			<img src="img/mapaInteractivo/pericues2.jpg">
			<img src="img/mapaInteractivo/pericues3.png">
			
		</div>

		<div class="mapa">
			<div class="cochimies">
				<img onclick="cochimies()" src="img/mapaInteractivo/cochimies.png">
			</div>

			<div class="guaycuras">
				<img onclick="guaycuras()" src="img/mapaInteractivo/guaycuras.png">
			</div>

			<div class="otra">
				<img src="img/mapaInteractivo/terreno.png">
			</div>

			<div class="pericues">
				<img onclick="pericues()" src="img/mapaInteractivo/pericues.png">
			</div>
			
		</div>

		

		



		

	</div>

	


<?php include("estructura/footer.php"); ?>