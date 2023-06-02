<?php
//inicializar variables
$empleados = array();

//incorporar los ficheros con las clases
require_once('clases/Administracion.php');
require_once('clases/Empleado.php');
require_once('clases/EmpleadoFijo.php');
require_once('clases/EmpleadoHoras.php');
require_once('clases/EmpleadoTemporal.php');

//consulta de todos los empleados

$empleados = Administracion::consultaEmpleados();

// //incorporar los namespaces con use
// use clases\EmpleadoFijo;
// use clases\EmpleadoHoras;
// use clases\EmpleadoTemporal;
// Obtén todos los empleados
$empleados = Administracion::consultaEmpleados();

// Instanciar un EmpleadoFijo
try {
	$nifEmpleadoFijo = '38721459H';
	if (!isset($empleados[$nifEmpleadoFijo])) {
		$empleadoFijo = new EmpleadoFijo($nifEmpleadoFijo, 'Juan', 35, 'Administración', 2019);
	}
} catch (Exception $e) {
	echo 'Excepción capturada al instanciar EmpleadoFijo: ', $e->getMessage(), "\n";
}

// Instanciar un EmpleadoHoras
try {
	$nifEmpleadoHoras = '46775821B';
	if (!isset($empleados[$nifEmpleadoHoras])) {
		$empleadoHoras = new EmpleadoHoras($nifEmpleadoHoras, 'Marisa', 35, 'Producción', 300);
	}
} catch (Exception $e) {
	echo 'Excepción capturada al instanciar EmpleadoHoras: ', $e->getMessage(), "\n";
}

// Instanciar un EmpleadoTemporal
try {
	// Crear objetos DateTime
	$fechaInicio = DateTime::createFromFormat('d/m/Y', '10/05/2015');
	$fechaFin = DateTime::createFromFormat('d/m/Y', '07/03/2022');

	$nifEmpleadoTemporal = '39857436J';
	if (!isset($empleados[$nifEmpleadoTemporal])) {
		$empleadoTemporal = new EmpleadoTemporal($nifEmpleadoTemporal, 'Sara', 35, 'Oficina Técnica', $fechaInicio, $fechaFin);
	}
} catch (Exception $e) {
	echo 'Excepción capturada al instanciar EmpleadoTemporal: ', $e->getMessage(), "\n";
}



?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>POO</title>
	<style type="text/css">
		.empleados {
			width: 600px;
			padding: 10px;
			border: 2px solid grey;
			margin: auto;
			margin-bottom: 10px;
			background-color: lightblue;
		}

		table,
		td {
			border: 1px solid grey;
			margin: auto;
			padding: 5px;
		}
	</style>
</head>

<body>
	<div class='empleados'>
		<h3>Empleado Fijo</h3>
		<?php
		echo $empleadoFijo->mostrarDatos();

		//ejecutar el método de calculo de salario
		echo '<p>El salario del empleado fijo es: ' . $empleadoFijo->calcularSueldo() . '€</p>';
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Horas</h3>
		<?php
		//mostrar todos los datos del empleado horas
		echo $empleadoHoras->mostrarDatos();


		//ejecutar el método de calculo de salario
		echo '<p>El salario del empleado por horas es: ' . $empleadoHoras->calcularSueldo() . '€</p>';
		?>
	</div>
	<div class='empleados'>
		<h3>Empleado Temporal</h3>
		<?php
		//mostrar todos los datos del empleado temporal
		echo $empleadoTemporal->mostrarDatos();

		//ejecutar el método de calculo de salario
		echo '<p>El salario mensual del empleado temporal es: ' . $empleadoTemporal->calcularSueldo() . '€</p>';
		?>
	</div>
	<table>

	</table>
</body>

</html>