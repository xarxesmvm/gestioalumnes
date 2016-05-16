<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/

include_once 'Vista.php';

class VMostrarAlumnesCVS extends Vista{
	
	/*
		Mètode que cal sobreescriure obligatòriament ja que és abstracte
		a la classe Vista de la que hereta aquest classe.
		Cal que mostri (echo) el contingut html específic d'aquesta 
		funcionalitat.
	*/
	public function mostraContingutPagina(){
		/*
			Invoquem, del model, la funció que ens retorna la llista dels 
			alumnes amb nom i cognoms ho mostrem tot en una taula html.
		*/
		$arrayLlistat = $this->model->selectNomCognomAlumnes();
		if(count($arrayLlistat)==0) echo "<h2> No hi ha alumnes a la base de dades </h2>";
		else{
			echo 'Nom;Cognoms</br>';
					
			foreach($arrayLlistat as $ar)
				echo $ar["nom"] . ";".$ar["cognoms"]."</br>";
	
			
		}

	}

	/*
		Mètode que cal sobreescriure obligatòriament ja que és abstracte
		a la classe Vista de la que hereta aquest classe.
		Cal que retorni (return) un string que representarà el títol de la
		pàgina web.
	*/
	public function getTitolPaginaWeb(){
		return "Llistat d'alumnes en format CVS";
	}	
	
}
?>

