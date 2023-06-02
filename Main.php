<?php
	//inicializar variables
	$empleados = array();
	
	//incorporar los ficheros con las clases
	require_once('clases/Administracion.php');
	require_once('clases/Empleado.php');
	require_once('clases/EmpleadoFijo.php');
	require_once('clases/EmpleadoHoras.php');
	require_once('clases/EmpleadoTemporal.php');
	
	//incorporar los namespaces con use
	use clases\EmpleadoFijo;
	use clases\EmpleadoHoras;
	use clases\EmpleadoTemporal;

	
	//instanciar un emleado de cada clase
	$empleados[] = new EmpleadoFijo('38721459H', 'Juan', 35, 'Administración', 2019);
	$empleados[] = new EmpleadoHoras('46775821B', 'Marisa', 35, 'Producción', 300);
	$empleados[] = new EmpleadoTemporal('39857436J', 'Sara', 35, 'Oficina Técnica', 10/05/2015, 07/03/2022);


	//consulta de todos los empleados
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POO</title>
	<style type="text/css">
		.empleados {width: 500px; padding: 10px; border: 2px solid grey; margin: auto; margin-bottom: 10px; background-color: lightblue;}
		table, td {border: 1px solid grey;margin: auto;padding:5px;}
	</style>
</head>
<body>
	<div class='empleados'>
		<h3>Empleado Fijo</h3>
		<?php
			//mostrar todos los datos del empleado fijo
			
			//ejecutar el método de calculo de salario
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Horas</h3>
		<?php
			//mostrar todos los datos del empleado horas
			
			//ejecutar el método de calculo de salario
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Temporal</h3>
		<?php
			//mostrar todos los datos del empleado temporal
			
			//ejecutar el método de calculo de salario
		?>
	</div>
	<table>
		
	</table>
</body>
</html>