<?php  

	function conectar(){

		$base=new PDO('mysql:host=localhost; dbname=vocablos','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");

		return $base;
	}
	


?>