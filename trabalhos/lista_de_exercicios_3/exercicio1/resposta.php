<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta do exercício 1</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $menor_numero = PHP_INT_MAX;
                $posicao_menor_numero = 0;

                for ($i = 1; $i <= 7; $i++)
                {
                    $valor = $_POST["numero$i"];

                    if ($valor < $menor_numero)
                    {
                        $menor_numero = $valor;
                        $posicao_menor_numero = $i;
                    }
                }
                echo "<p>Menor valor: $menor_numero</p>";
                echo "<p>Posição: $posicao_menor_numero </p>";
            }
            catch (Exception $e) 
            {
                echo "Erro!";
            }
        }
    ?>
</body>
</html>