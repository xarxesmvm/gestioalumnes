<?php
include_once "CPrincipal.php";

$cp = new CPrincipal(new Router(), null, isset($_GET['accio'])?$_GET['accio']:null);
$cp->output();

?>
