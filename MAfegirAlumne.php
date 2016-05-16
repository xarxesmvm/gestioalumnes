<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/
include_once "Model.php";

class MAfegirAlumne extends Model{
	
	/**
		Afegeix un nou alumne a l'arxiu alumnes.dat.
		@param: alumne és un objecte de la classe Alumne.
		
	*/
	public function insertNouAlumne($alumne){
		
		$file = fopen($this->getNomArxiu(), "a");
		$nouAlumne = $alumne->nom.";".$alumne->cognoms.";".$alumne->dni.";".$alumne->telefon.";".$alumne->email. PHP_EOL;	
		fwrite($file, $nouAlumne);
		fclose($file);
		
	}
	

}