<?php

require_once('traits/GuardarFichero.php');

class EmpleadoHoras extends Empleado {

    use GuardarFichero;
    const PRECIO_HORA = 9.39;

    private $horasTrabajadas;

    public function __construct(string $nif, string $nombre, int $edad, string $departamento, int $horasTrabajadas) {
        parent::__construct($nif, $nombre, $edad, $departamento);
        $this->horasTrabajadas = $horasTrabajadas;
    }

    // atributo específico de la clase el nº de horas trabajadas con los metodos get y set

    public function getHorasTrabajadas(): int {
        return $this->horasTrabajadas;
    }

    public function setHorasTrabajadas(int $horasTrabajadas): void {
        if (!is_numeric($horasTrabajadas)) {
            throw new Exception('El nº de horas trabajadas debe ser un número');
        }
        if (!is_numeric($horasTrabajadas) || $horasTrabajadas < 0) {
            throw new Exception('El nº de horas trabajadas debe ser un número positivo');
        }
        $this->horasTrabajadas = $horasTrabajadas;
    }


    // método para calcular el sueldo en función de las horas trabajadas y el precio de la hora
    public function calcularSueldo(): float {
        $sueldo = self::PRECIO_HORA * $this->horasTrabajadas;
        return $sueldo;
    }

    private function altaEmpleado(): void {
        // Obtener los datos comunes en formato csv
        $datosComunes = parent::datosEmpleadosCsv(); // Obtener los datos comunes en formato csv desde la clase padre

        // Añadir los datos específicos
        $datosEmpleadoHoras = $datosComunes . ";" . $this->getHorasTrabajadas(); // Añadir el nº de horas trabajadas concatenado con ;

        // Guardar los datos en el fichero
        $this->guardar($datosEmpleadoHoras);
    }


}


?>