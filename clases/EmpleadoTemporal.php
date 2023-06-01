<?php

require_once('traits/GuardarFichero.php');
require_once('clases/Empleado.php');

final class EmpleadoTemporal extends Empleado {

    const SALARIO_FIJO = 1349.27;

    private $fechaAlta; // atributo de tipo DateTime
    private $fechaBaja; // atributo de tipo DateTime

    use GuardarFichero;

    public function __construct(string $nif, string $nombre, int $edad, string $departamento, DateTime $fechaAlta, DateTime $fechaBaja) {
        parent::__construct($nif, $nombre, $edad, $departamento);
        $this->setFechaAlta($fechaAlta);
        $this->setFechaBaja($fechaBaja);
        $this->altaEmpleado(); // Llamar a altaEmpleado() después de asignar los atributos
    }   

    public function getFechaAlta(): DateTime {
        if (!isset($this->fechaAlta)) {
            throw new Exception('La fecha de alta no está definida');
        }
        return $this->fechaAlta;
    }

    public function getFechaBaja(): DateTime {
        if (!isset($this->fechaBaja)) {
            throw new Exception('La fecha de baja no está definida');
        }
        return $this->fechaBaja;
    }

    public function setFechaAlta(DateTime $fechaAlta): void {
        $this->fechaAlta = $fechaAlta;
    }

    public function setFechaBaja(DateTime $fechaBaja): void {
        $this->fechaBaja = $fechaBaja;
    }

    public function calcularAntiguedad(): int {
        $fechaActual = new DateTime();
        $antiguedad = $fechaActual->diff($this->fechaAlta);
        return $antiguedad->y;
    }

    public function calcularSueldo(): float {
        $sueldo = self::SALARIO_FIJO;
        return $sueldo;
    }
    
    // Sobreescribir el método datosEmpleadosCsv() de la clase padre para añadir los datos específicos de los empleados temporales
    public function datosEmpleadosCsv(): string {
        return parent::datosEmpleadosCsv() . ';' . $this->getFechaAlta()->format('Y-m-d') . ';' . $this->getFechaBaja()->format('Y-m-d');
    }


    private function altaEmpleado(): void {
        // Obtener los datos comunes en formato csv
        $datosComunes = parent::datosEmpleadosCsv(); // Obtener los datos comunes en formato csv desde la clase padre
        // Obtener los datos específicos en formato csv
        $datosEspecificos = $this->fechaAlta->format('d/m/Y') . ';' . $this->fechaBaja->format('d/m/Y');
        // Guardar los datos en el fichero
        $this->guardar($datosComunes . ';' . $datosEspecificos);
    }


}



?>