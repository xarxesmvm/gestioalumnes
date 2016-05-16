<?php
class Alumne{
	public $nom;
	public $cognoms;
	public $email;
	public $telefon;
	public $dni;

	public function __construct($nom, $cognoms, $dni, $telefon, $email){
		$this->nom = $nom;
		$this->cognoms = $cognoms;
		$this->dni = $dni;
		$this->telefon = $telefon;
		$this->email = $email;
	}
	
}
?>