<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-3">
    <?php
        function calcular_raiz_quadrada($numero) 
        {
            return sqrt($numero);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $numero = $_POST['numero'];

                if ($numero >= 0) 
                {
                    $raizQuadrada = calcular_raiz_quadrada($numero);
                    echo "<p>A raiz quadrada de $numero é $raizQuadrada</p>";
                }
                else
                {
                    echo "<p>Insira um número que não seja negativo</p>";
                }
            }
            catch (Exception $e) 
            {
                echo "Erro!";
            }
        }
    ?>
</body>
</html>