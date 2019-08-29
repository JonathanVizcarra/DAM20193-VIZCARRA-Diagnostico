<?php

	function validar_dato($dato){

		if(!empty($dato)){

			$dato = probar_dato($dato);

			if(empty($dato)){
				return null;
			}
			else{
				return $dato;
			}
			
		}
		else{
			return null;
		}	
	}

	function probar_dato($dato){

		$dato = trim($dato);
		$dato = stripslashes($dato);
		$dato = htmlspecialchars($dato);

		return $dato;
	}
?>