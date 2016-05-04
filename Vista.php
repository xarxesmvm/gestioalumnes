<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/

abstract class Vista{
	
	/*
		Funció que caldrà que es redefineixi a cada vista
		i que contindrà el contingut específic de cada vista.
		Exemple: la vista de "llistat d'usuaris" contindrà una
		taula html amb les dades, però no contindrà tota la 
		informació referent als fulls d'estil css, al head etc.
	*/
	abstract protected function mostraContingutPagina();
	
	/*
		Funció que caldrà que es redefineixi a cada vista
		i que contindrà el contingut específic de cada vista
		ja que cada pàgina web tindrà un títol diferent.
		
		El desenvolupador només ha de retornar el títol de la 
		web.
		Exemple: return "Enviar correu electrónic als alumnes";
	*/
	abstract protected function getTitolPaginaWeb();

	/*
		Mètode comú a totes les Vistes.
		D'aquesta manera ens assegurem que sempre tingui la mateixa 
		estructura i només varïi el contingut i el títol que l'haurà
		d'implementar cada desenvolupador a partir dels mètodes:
		mostraContingutPagina() i  getTitolPaginaWeb().
	*/	
	public function mostraPagina(){
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<meta charset="UTF-8" />
				<title>Llistat alumnes</title>
			</head>
			<body>
				<h1>Gestió de l'alumnat</h1>
				<h2><?php echo $this->getTitolPaginaWeb();?></h2>
				<?php $this->mostraContingutPagina();?>
				<a href="./index.php"><--Inici</a>
			</body>
		</html>
		<?php
	}

	
}
?>