<?php

class Empleado {

    private string $nif;
    private string $nombre;
    private int $edad;
    private string $departamento;

    public function __construct($nif, $nombre, $edad, $departamento) {
        $this->nif = $nif;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->departamento = $departamento;
    }

    public function calcularSueldo () {
        return 1000;
    }
}


?>