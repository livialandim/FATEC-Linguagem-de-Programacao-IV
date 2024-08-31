<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta do exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-3">
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $numero1 = (int) $_POST['numero1'];
                $numero2 = (int) $_POST['numero2'];

                if ($numero1 == $numero2)
                {
                    $soma = ($numero1 + $numero2) * 3;
                    echo "<p>Os números são iguais. Resultado do triplo da soma: $soma</p>";
                }
                else
                {
                    $soma = $numero1 + $numero2;
                    echo "<p>Resultado da soma: $soma</p>";
                }       
            }
            catch (Exception $e)
            {
                echo "<p>Erro!</p>";
            }
        }
    ?>
</body>
</html>