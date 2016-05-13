<?php
class Router {
	
    private $table = array();
	
    public function __construct() {
		
        /* 	Exampleroute" is the name of the route, e.g. /exampleroute
			Here, class names are used rather than instances so instances are only ever created when needed, otherwise every model, view and 
			controller in the system would be instantiated on every request, which obviously isn't good!
		*/
        $this->table['mostrar'] = new Route('VMostrarAlumnes', 'CMostrarAlumnes');

        //$this->table['someotherroute'] = new Route('OtherModel', 'OtherView', 'OtherController');  
		
    }
	
	/**
		Si la ruta no existeix es produeix un error que caldria controlar.
	*/
    public function getRoute($route) {
        $route = strtolower($route);
		
        return $this->table[$route];
    }

}

class Route {
	
    private $vista;
    private $controlador;
		
	public function __construct($vista, $controlador) {
		$this->vista = $vista;
		$this->controlador = $controlador;        
    }
	
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
