<?php

/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/
ini_set('display_errors', 'on');

/* 
	Incloem la Base de dades simulada amb una classe php
	(En una situació real no ho tindríem mai així...)
*/
include_once 'BDAlumnes.php';


class CPrincipal{
	/***********************************************************/
	/********** ATRIBUTS****************************************/
	/***********************************************************/
	/*
		Array on posem els noms de les diferents funcionalitats 
		que té la nostra aplicació.
		El nom de les funcionalitats ha de coincidir amb el nom
		dels arxius que implementen la nova funcionalitat.
		Llegir els comentaris que hi ha avall.
	*/
	private $funcionalitats; 
	
	/* Afegim un atribut que representi al model, la vista
		i el controlador. 
		També un altre que representarà la base de dades
	*/
	private $model;
	private $vista;
	private $controlador;
	private $baseDeDades;
	
	/***********************************************************/
	/********** MÈTODES ****************************************/
	/***********************************************************/
	// Contstructora
	function __construct(Router $enrutador, $ruta){

		$this->funcionalitats = array();
		$this->afegirFuncionalitats();
		$this->BDA = new BDAlumnes();
		
				/*
			Agafem el paràmetre accio de la url que contindrà 
			el nom de la funcionalitat com a valor.
		*/
		if (isset($_GET['accio']) && !empty($_GET['accio'])) {
			/*
				A l'array funcionalitats tenim el nom principal 
				dels arxius que utilitzem guardats a partir de
				la clau que es troba en el paràmetre accio de la url.
				
				Si la funcionalitat és mostrarAlumnes, aleshores
				el model serà: MMostrarAlumnes, el controlador serà
				CMostrarAlumnes i la vista VMostrarAlumnes.
			*/
			$m = 'M'.$this->funcionalitats[$_GET['accio']];	
			$v = 'V'.$this->funcionalitats[$_GET['accio']];
			$c = 'C'.$this->funcionalitats[$_GET['accio']];


			
			if(isset($m)){
				// incloem arxiu php depenent del paràmetre $m. $v o $c
				include_once $m.'.php'; 
				$this->model 			= new $m($this->BDA); 
				
				include_once $v.'.php';
				$this->vista 			= new $v($this->model);
				
				include_once $c.'.php';
				$this->controlador = new $c($this->model, $this->vista);

				/* 
					Finalment, si tot es correcte, invoquem la funció
					main del controlador.
				*/
				$this->controlador->main();
			}
		}

	}
	
	/**
		Mètode que crea un vector amb el nom de les noves funcionalitats
		Cada vegada que el desenvolupador de l'aplicació crea una nova 
		funcionalitat, cal que afegeixi el nom de l'arxiu en aquest 
		vector tenint en compte que:
		
		Cada nova funcionalitat ha d'estar composta per tres arxius:
			VNovaFuncinalitat.php
			MNovaFuncionalitat.php
			CNovaFuncionalitat.php
			El desenvolupador de l'aplicació ha d'afegir al vector el 
			nom:
			NovaFuncionalitat.
		
		Exemple: El desevolupador ha creat una funcionalitat per enviar 
		un correu a tots els alumnes.
		Crea els arxius MEnviarCorreus.php, VEnviarCorreus.php, 
		* CEnviarCorreus.php.
		
		En l'arxiu index.php ha afegit el següent enllaç: 
		<a href="./CPrincipal.php?accio=correu">Enviar correu</a>
		i afegeix al vector $funcionalitats la paraula "EnviarCorreus" 
		* amb la clau 'correu' (que ha de correspondre al paràmetre 
		* http que activa el procediment)
		d'aquesta manera:
			$this->funcionalitats('correu'=>'EnviarCorreus');
	*/
	private function afegirFuncionalitats(){
		$this->funcionalitats['mostrar']='MostrarAlumnes';
	}
	
	/*
		Funció principal... la que primer s'executa...
		s'invoca al final d'aquest arxiu.
	*/
	public function output(){
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<meta charset="UTF-8" />
				<title>Gestió de l'alumnat</title>
			</head>
			<body>
				<h1>Gestió de l'alumnat</h1>
				<h2><?php echo $this->vista->getTitolPaginaWeb();?></h2>
				<?php $this->vista->mostraContingutPagina();?>
				<a href="./index.php"><--Inici</a>
			</body>
		</html>
		<?php
	}	
}	

// Script
$cp = new CPrincipal();
$cp->output();

?>
