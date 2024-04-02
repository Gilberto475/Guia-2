<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correctas = $_POST["correctas"];
    $incorrectas = $_POST["incorrectas"];
    $blanco = $_POST["blanco"];

    $total_respuestas = $correctas + $incorrectas + $blanco;
    
    if ($total_respuestas != 10) {
        echo "<h2>Error: El total de respuestas debe ser 10.</h2>";
    } else {
        $puntaje = ($correctas * 4) + ($incorrectas * -1) + ($blanco * 0);
        echo "<div style='text-align: center;'>";
        echo "<h2>El puntaje final del postulante es: $puntaje/40</h2>";
        echo "</div>";
    }
    echo "<div style='text-align: center;'>";
    echo "<h2>¿Desea repetir el proceso?</h2>";
    echo '<form action="../Menu.html">
            <input type="submit" value="Volver al menú">
          </form>';
    echo '<form action="../Programa4.html">
            <input type="submit" value="Repetir el proceso">
          </form>';
          echo "</div>";


}
?>
