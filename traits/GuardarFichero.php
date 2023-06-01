<?php
trait GuardarFichero {
    private function Guardar(string $csv): void {
        $file = fopen('ficheros/personas.csv', 'a'); // Abrir el archivo en modo de añadir
        fwrite($file, $csv . PHP_EOL); // Escribir los datos en el archivo y añadir un salto de línea al final
        fclose($file); // Cerrar el archivo
        
    }
}


?>