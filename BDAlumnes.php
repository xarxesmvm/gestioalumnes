<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/

class BDAlumnes{
	private $arrayAlumnes;
	
	function __construct(){
		$this->arrayAlumnes = array(
			array(
        		"nom" => "Joan",
				"cognoms" => "Puig Martínez",
        		"email" => "joanpuig@mail.com",
        		"DNI" => "7899807R",        		
			),
    		array(
        		"nom" => "Jordi",
				"cognoms" => "Martí Dalmau",
        		"email" => "jordimarti@mail.com",
        		"DNI" => "2376528R",        		
			),
			array(
        		"nom" => "Muhammad",
				"cognoms" => "Ali",
        		"email" => "muhammadali@mail.com",
        		"DNI" => "7653745K",        		
			)
		);
		
	}
	
	/**
		Aquesta funció retorna tots els alumnes a la vista, però 
		en aquest cas, només retorna el nom i el cognom.
	*/
	public function selectNomCognomAlumnes(){
		$resultat = array();
		$i=0;

		foreach($this->arrayAlumnes as $ar){
			$nomICognoms = 	array(
									"nom" 		=> $ar["nom"],
									"cognoms" 	=> $ar["cognoms"],
								);
			$resultat[$i] = $nomICognoms;
			$i++;
		}
		
		return $resultat;
	
	}
}
?>