<!DOCTYPE html>
<html>
<head>
    <title>Resultados Estación Climática</title>
</head>
<body>
    <h2><center> Resultados Estación Climática</center></h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num_dias = $_POST['num_dias'];
        $suma_maxima = 0;
        $suma_minima = 0;
        $errores = 0;

        echo "<form method='post' action='clima2.php'>";

        for ($i = 1; $i <= $num_dias; $i++) {
            echo "<div style='text-align: center;'>";
            echo "<h3>Día $i: </h3>";
            echo "<label for='temperatura_maxima_$i'>Temperatura Máxima: </label>";
            echo "<input type='number' name='temperatura_maxima_$i' required><br>";
            echo "<label for='temperatura_minima_$i'>Temperatura Mínima: </label>";
            echo "<input type='number' name='temperatura_minima_$i' required><br><br>";
            echo "</div>";
        }
        echo "<div style='text-align: center;'>";
        echo "<input type='hidden' name='num_dias' value='$num_dias'>";
        echo "<input type='submit' name='submit' value='Calcular'>";
        echo "</form>";
        echo "</div>";

    }
    ?>
</body>
</html>
