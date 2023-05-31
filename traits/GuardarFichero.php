<?php
trait GuardarFichero {
    public function guardarFichero(string $datos): void {
        $file = fopen('ficheros/personas.csv', 'a'); // Abrir el archivo en modo de añadir
        fputcsv($file, explode(";", $datos)); // Añadir los datos al archivo separados por ;
        fclose($file); // Cerrar el archivo
        
    }
}


?>