<?php
class Router {
	
    private $table = array();
	
    public function __construct() {
		
      /* 
			Creació de l'array associatiu que relaciona un nom de funcionalitat amb el nom
			de la vista, del controlador i del model de cadascuna de les funcioanlitats.
		*/
			$this->table['mostraralumnes'] 		= new Route('VMostrarAlumnes', 		'CMostrarAlumnes');
			$this->table['mostraralumnescvs'] 	= new Route('VMostrarAlumnesCVS', 	'CMostrarAlumnes');  
			$this->table['afegiralumne'] 			= new Route('VAfegirAlumne', 			'CAfegirAlumne');  
		
    }
	
	/**
		Si la ruta no existeix es produeix un error que caldria controlar.
	*/
    public function getRoute($route) {
        $route = strtolower($route);
		
        return $this->table[$route];
    }

}

/**
	Classe que encapsula en un únic objecte el nom de la vista, del controlador
	i del model.
*/
class Route {
	
	private $vista;
	private $controlador;
	
	/**
		Constructora
	*/	
	public function __construct($vista, $controlador) {
		$this->vista = $vista;
		$this->controlador = $controlador;        
   }
	
	/**
		Retorna el nom de la classe que representa el model.
		Per convenció, ha de tenir el mateix nom que el Controlador
		però la primera lletra ha de ser una M majúscula en comptes
		d'una C.
	*/	
	public function getModel(){
		return "M".substr($this->controlador, 1, strlen($this->controlador));
	}
	
	public function getVista(){
		return $this->vista;
	}
	
	public function getControlador(){
		return $this->controlador;
	}
	
}
?>
