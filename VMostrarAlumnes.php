<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/

include_once 'Vista.php';

class VMostrarAlumnes implements Vista{
	private $model;
	
	function __construct($model) {
		$this->model = $model;
	}

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
				<h2>Llistat d'alumnes</h2>
			<?php
				/*
					Invoquem del model la funció que ens retorna la llista dels 
					alumnes amb nom i cognoms.
				*/
				$arrayLlistat = $this->model->selectNomCognomAlumnes();
				if(count($arrayLlistat)==0) echo "<h2> No hi ha alumnes a la base de dades </h2>";
				else{
					echo '<table border="1"> <th>Nom</th><th>Cognoms</th>';
					
					foreach($arrayLlistat as $ar)
						echo "<tr><td>" . $ar["nom"] . "</td><td>". $ar["cognoms"] ."</td></tr>";
						
					
					echo "</table>";
				}

			?>
				<a href="./index.php"><--Inici</a>
			</body>
		</html>
		<?php
	}
}
?>

