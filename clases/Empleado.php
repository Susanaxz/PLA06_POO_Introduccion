<?php

// creacion de la superclase Empleado con los atributos y metodos que tienen en comun los empleados

class Empleado {

    private string $nif;
    private string $nombre;
    private int $edad;
    private string $departamento;

    // Al constructor le llegarán como parámetros los valores de los cuatro atributos comunes
    public function __construct(string $nif, string $nombre, int $edad, string $departamento) {
        $this->nif = $nif;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->departamento = $departamento;
    }

    // Al constructor le llegarán como parámetros los valores de los cuatro atributos comunes y utilizará los métodos SETTER para informarlos
    public function setNif(string $nif):void {
        if (!preg_match('/^[0-9]{8}[A-Z]$/', $nif)) {
            throw new Exception('El NIF no tiene el formato correcto, revisa que tenga un formato como este 12345678A');
        } 
        $this->nif = $nif;
    }
    public function setNombre(string $nombre):void {
                $this->nombre = $nombre;
    }
    // edad
    public function setEdad(int $edad):void {
        if ($edad < 18 || $edad > 70) {
            throw new Exception('La edad debe estar entre 18 y 70');
        }
        $this->edad = $edad;
    }

    // departamento
    public function setDepartamento(string $departamento):void {
        $this->departamento = $departamento;
    }

    //  Cremos los 4 métodos GETTER para recuperar los valores de los atributos
    public function getNif():string {
        return $this->nif;
    }
    public function getNombre():string {
        return $this->nombre;
    }

    public function getEdad():int {
        return $this->edad;
    }

    public function getDepartamento():string {
        return $this->departamento;
    }

    // creamos el metodo calcularSueldo sin implementar (se obliga a las clases hijas a implementarlo)
    public function calcularSueldo (): float {
        return 0;
    }

    // Método que retorna los valores de los 4 atributos de la clase con el metodo getter. Este metodo utiliza la tecnica de delegacion
    public function mostrarDatos():string {
        return "NIF: " . $this->getNif() . ", Nombre: " . $this->getNombre() . ", Edad: " . $this->getEdad() . ", Departamento: " . $this->getDepartamento();
    }

    // Método que retorna los valores de los 4 atributos pero en CSV
    protected function datosEmpleadosCsv():string {
        return $this->getNif() . ";" . $this->getNombre() . ";" . $this->getEdad() . ";" . $this->getDepartamento();
    }

}


?>