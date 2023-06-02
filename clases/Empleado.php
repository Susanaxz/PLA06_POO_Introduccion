<?php

// creacion de la superclase Empleado con los atributos y metodos que tienen en comun los empleados

abstract class Empleado { // la clase es abstracta porque no se puede instanciar, solo se puede heredar

    private string $nif;
    private string $nombre;
    private int $edad;
    private string $departamento;

    // Al constructor le llegarán como parámetros los valores de los cuatro atributos comunes
    public function __construct(string $nif, string $nombre, int $edad, string $departamento) {
        
        // asignacion por delegacion de los valores de los atributos comunes
        $this->setNif($nif);
        $this->setNombre($nombre);
        $this->setEdad($edad);
        $this->setDepartamento($departamento);
    }

    // Al constructor le llegarán como parámetros los valores de los cuatro atributos comunes y utilizará los métodos SETTER para informarlos
    public function setNif(string $nif) {
        if (!preg_match('/^[0-9]{8}[A-Z]$/', $nif)) {
            throw new Exception('El NIF no tiene el formato correcto, revisa que tenga un formato como este 12345678A');
        } 
        $this->nif = $nif;
    }
    public function setNombre($nombre) {
            //validar nombre obligatorio
            if (empty($nombre)) {
                throw new Exception("Nombre obligatorio");
    }
        $this->nombre = $nombre;
    }   

    // edad
    public function setEdad(int $edad) {
        if (empty($edad)) {
            throw new Exception('La edad es obligatoria');
        }

        if ($edad < 18 || $edad > 70) {
            throw new Exception('La edad debe estar entre 18 y 70');
        }
        
        $this->edad = $edad;
    }

    // departamento
    public function setDepartamento(string $departamento) {
        if (empty($departamento)) {
            throw new Exception('El departamento es obligatorio');
        }
        $this->departamento = $departamento;
    }

    //  Creamos los 4 métodos GETTER para recuperar los valores de los atributos
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
    public abstract function calcularSueldo (): float; // metodo abstracto que obliga a las clases hijas a implementarlo

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