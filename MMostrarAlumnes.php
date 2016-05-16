<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/
include_once "Model.php";

class MMostrarAlumnes extends Model{
	
	public function selectNomCognomAlumnes(){

		$linies = file($this->getNomArxiu());
		$resultat = array();
		$i=0;

		foreach ($linies as $linia) {
			$arrayDadesAlumne = explode(";", $linia);
			$nomICognoms = 	array(
				"nom" 		=> $arrayDadesAlumne[0],
				"cognoms" 	=> $arrayDadesAlumne[1],
								);
			$resultat[$i] = $nomICognoms;
			$i++;
		}
		return $resultat;
	}
}
?>
	