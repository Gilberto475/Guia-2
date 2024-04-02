<!DOCTYPE html>
<html>
<head>
    <title>Resultados Estación Climática</title>
</head>
<body> 
     
    <h2 > <center>Resultados Estación Climática</center></h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num_dias = $_POST['num_dias'];
        $suma_maxima = 0;
        $suma_minima = 0;
        $errores = 0;
        echo "<div style='text-align: center;'>";
        echo "Número de días: $num_dias<br>";
        echo "</div>";

        for ($i = 1; $i <= $num_dias; $i++) {
            $temperatura_maxima = $_POST["temperatura_maxima_$i"];
            $temperatura_minima = $_POST["temperatura_minima_$i"];
            echo "<div style='text-align: center;'>";
            echo "Día $i - Temperatura Máxima: $temperatura_maxima, Temperatura Mínima: $temperatura_minima<br>";
            echo "</div>";
            if ($temperatura_maxima == 9 || $temperatura_minima == 9) {
                $errores++;
            } else {
                $suma_maxima += $temperatura_maxima;
                $suma_minima += $temperatura_minima;
            }
        }

        if ($num_dias > 0) {
            $media_maxima = $suma_maxima / $num_dias;
            $media_minima = $suma_minima / $num_dias;
            $porcentaje_errores = ($errores / $num_dias) * 100;
            echo "<div style='text-align: center;'>";
            echo "<h3>Resultados:</h3>";
            echo "Media Máxima: $media_maxima<br>";
            echo "Media Mínima: $media_minima<br>";
            echo "Número de Errores: $errores<br>";
            echo "Porcentaje de Errores por Dia: $porcentaje_errores%";
            echo "</div>";
        } else {
            echo "<p>No se han proporcionado datos.</p>";
        }


          echo"<br>"; 
          echo "<div style='text-align: center;'>";
          echo "<h2>¿Desea repetir el proceso?</h2>";
          echo '<form action="../Menu.html">
                  <input type="submit" value="Volver al menú">
                </form>';
          echo '<form action="../Programa5.html">
                  <input type="submit" value="Repetir el proceso">
                </form>';
         echo "</div>";
    }
    ?>
</body>
</html>
