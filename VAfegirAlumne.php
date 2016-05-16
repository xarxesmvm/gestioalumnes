<?php
/**
	Institut Manuel Vàzquez Montalbán
	Mòdul: IAW (Implantació d'Alicacions Web)
	Tema: Patrons: el Model Vista Controlador
	Exercici: Gestió de l'alumnat
*/

include_once 'Vista.php';

class VAfegirAlumne extends Vista{
	
	/*
		Mètode que cal sobreescriure obligatòriament ja que és abstracte
		a la classe Vista de la que hereta aquest classe.
		Cal que mostri (echo) el contingut html específic d'aquesta 
		funcionalitat.
	*/
	public function mostraContingutPagina(){
		if($this->getModel()->accioCompletada()) {
			echo "Alumne afegit correctament.";
			return;
		}
		if($this->model->modelAmbErrors()) {
			?>
			<h3> Existeixen errors en les dades que ha introduït.</h3><br>
			<table border="1">
			<?php
			$errors = $this->model->getMissatges();
			$i=1;
			foreach($errors as $err){
				?>
				<tr><td>Error <?php echo $i++?></td><td><?php echo $err?></td></tr>
				<?php
			}	
			?>
			</table>

			<form action="CPrincipal.php?ruta=<?php echo $_REQUEST["ruta"] ?>&accio=<?php echo $_REQUEST["accio"]?>" method="POST">
				Nom: <br>
				<input type="text" name="nom" value="<?php echo $_POST["nom"]?>"><br>
				Cognoms: <br>
				<input type="text" name="cognoms" value="<?php echo $_POST["cognoms"]?>"><br>
				Correu electrònic: <br>
				<input type="text" name="email" value="<?php echo $_POST["email"]?>"><br>
				Telèfon: <br>
				<input type="text" name="telefon" value="<?php echo $_POST["telefon"]?>"><br>
				DNI: <br>
				<input type="text" name="dni" value="<?php echo $_POST["dni"]?>"><br>
				<input type="submit" value="Acceptar"  name="acceptar">
				<input type="reset" value="Esborrar dades">
				<input type="submit" value="Submit">
			</form>
			
			
			<?php
			
		}else {
			?>
			<form action="CPrincipal.php?ruta=<?php echo $_REQUEST["ruta"] ?>&accio=<?php echo $_REQUEST["accio"]?>" method="POST">
				Nom: <br>
				<input type="text" name="nom"><br>
				Cognoms: <br>
				<input type="text" name="cognoms"><br>
				Correu electrònic: <br>
				<input type="text" name="email"><br>
				Telèfon: <br>
				<input type="text" name="telefon"><br>
				DNI: <br>
				<input type="text" name="dni"><br>
				<input type="submit" value="Acceptar"  name="acceptar">
				<input type="reset" value="Esborrar dades">
				
			</form>
			
			<?php

		}
	}

	/*
		Mètode que cal sobreescriure obligatòriament ja que és abstracte
		a la classe Vista de la que hereta aquest classe.
		Cal que retorni (return) un string que representarà el títol de la
		pàgina web.
	*/
	public function getTitolPaginaWeb(){
		return "Afegir un nou alumne al centre";
	}	
	
}
?>

