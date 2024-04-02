<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la producción semanal ingresada por el usuario
    $produccion = (int)$_POST["produccion"];

    // Calcular el ingreso total y el incentivo según la tabla proporcionada
    if ($produccion >= 0 && $produccion < 100) {
        $incentivo = 0;
        $ingreso = $produccion * 2;
    } elseif ($produccion >= 100 && $produccion < 200) {
        $incentivo = $produccion * 0.10;
        $ingreso = $produccion * 2;
    } elseif ($produccion >= 200 && $produccion < 300) {
        $incentivo = $produccion * 0.12;
        $ingreso = $produccion * 2.5;
    } elseif ($produccion >= 300 && $produccion < 400) {
        $incentivo = $produccion * 0.14;
        $ingreso = $produccion * 3;
    } elseif ($produccion >= 400) {
        $incentivo = $produccion * 0.16;
        $ingreso = $produccion * 3.5;
    }

    $ingreso_total = $ingreso + $incentivo;
    
    echo "<div style='text-align: center;'>";
    echo "<h2>Resultados</h2>";
    echo "<p>Ingreso total: $" . number_format($ingreso_total, 2) . "</p>";
    echo "<p>Incentivo: $" . number_format($incentivo, 2) . "</p>";
    echo "<br>";
    echo "<h2>¿Desea repetir el proceso?</h2>";
    echo '<form action="../Menu.html">
            <input type="submit" value="No,Ir al Menu">
          </form>   ';
    echo '<form action="../Programa4.html">
            <input type="submit" value="Si">
          </form>';
        
    echo "</div>";
    
}
?>
