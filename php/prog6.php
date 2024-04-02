<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST["numeros"];
    
    // Separar los números ingresados
    $numeros_array = explode(",", $numeros);

    // Inicializar contadores
    $positivos = 0;
    $negativos = 0;
    $neutros = 0;
    $suma_positivos = 0;
    $suma_negativos = 0;
    $sumadetodos=0;

    // Calcular la cantidad de positivos, negativos y neutros, así como la sumatoria de positivos y negativos
    foreach ($numeros_array as $numero) {
        if ($numero > 0) {
            $positivos++;
            $suma_positivos += $numero;
        } elseif ($numero < 0) {
            $negativos++;
            $suma_negativos += $numero;
        } else {
            $neutros++;
        }
    }

  $sumadetodos=$suma_negativos+$suma_positivos;

  echo "<div style='text-align: center;'>";
    echo "<h2>Resultados:</h2>";
    echo "Cantidad de números positivos: $positivos <br>";
    echo "Cantidad de números negativos: $negativos <br>";
    echo "Cantidad de números neutros: $neutros <br>";
    echo "Suma de números positivos: $suma_positivos <br>";
    echo "Suma de números negativos: $suma_negativos <br>";
    echo "Suma Total de todos los numeros: $sumadetodos <br>";

   
    echo "<h2>¿Desea repetir el proceso?</h2>";
    echo '<form action="../Menu.html">
            <input type="submit" value="Volver al menú">
          </form>';
    echo '<form action="../Programa6.html">
            <input type="submit" value="Repetir el proceso">
          </form>';
        

          echo "</div>";

} else {
    echo "Acceso denegado";
}
?>
