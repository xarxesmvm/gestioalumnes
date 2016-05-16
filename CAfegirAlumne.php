<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/


/***************************************
  Per a fer un llistat, el controlador
    té cap funció específica

***************************************/
include_once "Controlador.php";
include_once "Alumne.php";

class CAfegirAlumne extends Controlador{
	
	
	public function mostrar(){
		//Com que es tracta d'un llistat, el controlador no fa res.
		;
	}
	
	public function desar(){
		if(!isset($_REQUEST['nom'])){
			$this->getModel()->setAccioCompletada(false);
			return;
		} 
		 
		if($this->dadesCorrectes()) {
			$a = new Alumne($_REQUEST['nom'], $_REQUEST['cognoms'], $_REQUEST['dni'], $_REQUEST['telefon'], $_REQUEST['email']);
			$this->model->insertNouAlumne($a);
			if($this->getModel()->setAccioCompletada(true));
		}else{
			$this->model->setMissatges($this->getMissatges());
		}
	}	
	
	public function dadesCorrectes(){
		$error = false;
		
		
		if(!isset($_REQUEST['nom'])){
			$this->addMissatge("Has d'introduir un nom.");
			$error = true;
		}
		if(!isset($_REQUEST['cognoms'])){
			$this->addMissatge("Has d'introduir un cognom.");
			$error = true;
		}
		if(!isset($_REQUEST['dni'])){
			$this->addMissatge("Has d'introduir un dni.");
			$error = true;
		}
		if(!isset($_REQUEST['telefon'])){
			$this->addMissatge("Has d'introduir un telèfon.");
			$error = true;
		}
		if(!isset($_REQUEST['email'])){
			$this->addMissatge("Has d'introduir un correu electrònic.");
			$error = true;
		}
		if(!$error) {
			if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
    			$this->addMissatge("El correu electrònic no té el format correcte.");
    			$error = true;
			}
			if (!filter_var($_REQUEST['nom'], FILTER_SANITIZE_STRING)) {
    			$this->addMissatge("El nom no és vàlid.");
    			$error = true;
			}
			if (!filter_var($_REQUEST['cognoms'], FILTER_SANITIZE_STRING)) {
    			$this->addMissatge("Els cognoms no són vàlids.");
    			$error = true;
			}
			if(!$this->dniOk($_REQUEST['dni'])){
    			$this->addMissatge("El DNI no és vàlid.");
    			$error = true;
			}
			if(!$this->telefonOk($_REQUEST['telefon'])){
    			$this->addMissatge("El telèfon no és vàlid.");
    			$error = true;
			}
		}
		
		return !$error;
	}
	
	/**
		Cal programar-la
	*/
	private function dniOK($dni){
		return true;
	}
	
	/**
		Cal programar-la
	*/
	private function telefonOK($telefon){
		return true;
	}

	
}
