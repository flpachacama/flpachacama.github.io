<?php
$continentes = ["America", "Europa", "Africa", "Asia", "Oceania"];

// Obtención del índice del continente desde la URL
$index = intval($_GET['continente']) - 1;
// Obtención del nombre del continente usando el índice.
$nombreContinente = $continentes[$index];
// Construcción del nombre del archivo JSON basado en el nombre del continente.
$archivoJSON = "./Continentes/{$nombreContinente}.json";

// Verificación de la existencia del archivo JSON.
if (file_exists($archivoJSON)) {
    // Lectura y decodificación del contenido del archivo JSON.
    $datos = json_decode(file_get_contents($archivoJSON), true);
    // json_decode es una función en PHP que se utiliza para decodificar una cadena JSON y convertirla en una estructura de datos de PHP, generalmente un array asociativo.

    // file_get_contents es una función en PHP que se utiliza para leer el contenido de un archivo y devolverlo como una cadena de texto.

    // Inicialización de la cadena HTML con el título del continente en mayúsculas.
    $html = '<h1>' . strtoupper($nombreContinente) . '</h1>';

    // Iteración a través de los datos de cada país en el continente.
    foreach ($datos[$nombreContinente] as $pais => $info) {
        // Determinación del número máximo de filas en la tabla.
        $maxRows = 0;
        foreach ($info as $region => $ciudades) {
            $tam = count($ciudades);
            $maxRows = max($maxRows, $tam);
        }

        // Construcción de la tabla HTML.
        $html .= '<table border=1>';
        $html .= '<tr><th colspan="' . count($info) . '" bgcolor="#EC7063">' . $pais . '</th></tr>';
        $html .= '<tr>';

        // Adición de las celdas de encabezado.
        foreach ($info as $region => $ciudades) {
            $html .= "<th> $region </th>";
        }

        $html .= "</tr>";

        // Adición de las filas de datos.
        for ($f = 0; $f < $maxRows; $f++) {
            $html .= '<tr>';
            foreach ($info as $region => $ciudades) {
                $html .= (isset($ciudades[$f])) ? '<td bgcolor="#D6FAF2">' . $ciudades[$f] . '</td>' : '<td bgcolor="#D6DEFA"> </td>';
            }
            $html .= '</tr>';
        }

        $html .= "</table><br><br>";
    }

    // Impresión de la cadena HTML generada.
    echo $html;

    // Adición de un botón para regresar a la página de inicio.
    echo '<div style="padding-left:250px;">
            <button><a href="./Continentes/index.html">Regresar</a></button>
          </div>';
} else {
    // Mensaje de error si el archivo JSON no existe.
    echo "El archivo JSON para el continente '{$nombreContinente}' no existe.";
}

?>