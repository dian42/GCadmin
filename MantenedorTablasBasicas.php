<?php
require_once 'lib/twigLoad.php';
include_once 'lib/conexion_bd.php';

session_start(); //Iniciamos una posible sesión


// Se prepara la consulta y luego se ejecuta.
$consulta_bd = $conexion_bd->prepare("SELECT * FROM tipo_gasto");
$consulta_bd -> execute();

/* Se obtiene el primer registro del conjunto de resultados
 * como un arreglo asociativo */
$tGasto = $consulta_bd->fetchAll(PDO::FETCH_ASSOC);

// Se cierra la conexión con la BD.
$conexion_bd = NULL;


if (count($_SESSION) != 0) {
	render('basicos/index.html.twig', array('tGasto' => $tGasto, 'valido' => $_SESSION['valido']));
} else {
	render('default/index.html.twig', array());
}

?>
