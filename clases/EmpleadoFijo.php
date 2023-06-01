<?php

require_once ('traits/GuardarFichero.php');
require_once ('clases/Empleado.php');

final class EmpleadoFijo extends Empleado {

    //trait GuardarFichero
    use GuardarFichero;
    const SUELDO_BASE = 1091.13;
    const COMPLEMENTO = 192.85;

    private $anyoAlta;

    private $anyoActual;
    
    public function __construct(string $nif, string $nombre, int $edad, string $departamento, int $anyoAlta) {
        parent::__construct($nif, $nombre, $edad, $departamento);
        $this->anyoAlta = $anyoAlta;
        $this->altaEmpleado(); // Llamar a altaEmpleado() después de asignar los atributos

    }

    public function getAnyoAlta(): int {
        return $this->anyoAlta;
    }

    public function getAnyoActual(): int {
        return $this->anyoActual;
    }

    public function setAnyoActual(int $anyoActual):void {
        $this->anyoActual = $anyoActual;
    }

    public function setAnyoAlta(int $anyoAlta):void {
        if (!is_numeric($anyoAlta)) {
            throw new Exception('El año de alta debe ser un número');
        }
        if (!is_numeric($anyoAlta) || $anyoAlta < 0) {
            throw new Exception('El año de alta debe ser un número positivo');
        }
        $this->anyoAlta = $anyoAlta;
    }

    public function calcularAntiguedad(): int {
        $anyoActual = (int)date('Y');
        return $anyoActual - $this->anyoAlta;
    }

    public function calcularSueldo(): float {
        $sueldo = self::SUELDO_BASE + self::COMPLEMENTO * ($this->calcularAntiguedad());
        return $sueldo;
        
    }

    private function altaEmpleado(): void
    {
        // Obtener los datos comunes en formato csv
        $datosComunes = parent::datosEmpleadosCsv(); // Obtener los datos comunes en formato csv desde la clase padre

        // Añadir los datos específicos
        $datosEmpleadoFijo = $datosComunes . ";" . $this->getAnyoAlta(); // Añadir el año de alta concatenado con ;

        // Añadir un texto indicando el tipo de empleado
        $datos = "Empleado fijo;" . $datosEmpleadoFijo;

        // Guardar los datos en el archivo
        $this->guardar($datosEmpleadoFijo);
    }
}

?>