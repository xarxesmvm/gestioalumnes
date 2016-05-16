<?php
class Model{
	private $bd;
	private $arrayMissatgesError;
	private $accioOK;
	
	/***
		Per paràmetre passem la base de dades ja que 
		no podem crear-la cada vegada que accedim a un Model.
		Si féssim un programa real, això no passaria, simplement 
		faríem una connexió a una base de dades.
		
		En el nostre cas es tracta del nom de l'arxiu.
	*/
	function __construct($bd){
		$this->bd = $bd;
	}
	
	/**
		Retorna cert si la funcionalitat s'ha completat correctaemnt.
		El controlador, quan la funcionalitat s'ha completat, 
		posa a cert l'atribut accioOK.
	*/
	public function accioCompletada(){
		return $this->accioOK;
	}
	
	/**
		Posa a cert o fals l'atribut accioOK.
		Funció utilitzada pel controlador per posar a cert
		l'atribut accioOK quan la funcionalitat s'ha completat.
		
	*/
	public function setAccioCompletada($accioCompletada){
		$this->accioOK = $accioCompletada;
	}	
	
	/**
		Funció protegida perquè només l'han d'utilitzar els
		models que hereten la classe Model.
	*/
	protected function getNomArxiu(){
		return $this->bd;
	}	
	
	/***
		Funció pública ja que el Controlador
		l'haurà d'invocar en cas que hi hagi errors.
	*/
	public function setMissatges($missatges){
		$this->arrayMissatgesError = $missatges;
	}
	
	/**
		Com que cada element del vector arrayMissatges és un missatge
		d'error, si aquest vector té 0 elements és que no hi ha
		errors en el model de dades i retornarà fals.
		
		Si el vector arrayMissatges té algun element, aleshores ha de
		retornar true perquè hi ha errors.
	*/
	public function modelAmbErrors(){
		return count($this->arrayMissatgesError)>0;
	}
	
	public function getMissatges(){
		return $this->arrayMissatgesError;
	}
}
?>