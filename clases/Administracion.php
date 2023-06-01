<?php
// Vamos a crear una clase genérica llamada administración con la finalidad de consultar el 
// contenido del fichero personas.csv y obtener un array que utilizaremos para construir una
// tabla html con todas las personas que hemos instanciado

final class Administracion {
    
    public static function consultaEmpleados():array {
        // Ruta al fichero
        $ruta = 'ficheros/personas.csv';

        // Array para guardar los datos de personas
        $empleados = [];

        // Intentar abrir el fichero y leer su contenido
        try {
            // Abrir el fichero en modo lectura
            $fichero = fopen($ruta, 'r');

            // Si el fichero no se pudo abrir, lanzar una excepción
            if (!$fichero) {
                throw new Exception('No se pudo abrir el fichero ' . $ruta);
            }

            // Leer el fichero línea por línea
            while (!feof($fichero)) {
                // Leer la línea actual y convertirla en un array
                $empleado = fgetcsv($fichero, 0, ';');

                // Si la línea leída es válida, agregarla al array de empleados
                if ($empleado) {
                    array_push($empleados, $empleado);
                }
            }

        } catch (Exception $e) {
            // Si ocurre un error, imprimir el mensaje de error y salir
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            exit();

        } finally {
            // cerrar el fichero
            if (isset($fichero) && $fichero) {
                fclose($fichero);
            }
        }

        // Retornar el array de empleados
        return $empleados;
    }
}


    
?>