<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta do exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-3">
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $valorA = (int) $_POST['valorA'];
                $valorB = (int) $_POST['valorB'];

                if ($valorA == $valorB)
                {
                    echo "<p>Números iguais: $valorA</p>";
                }
                elseif ($valorA < $valorB)
                {
                    echo "<p>$valorA $valorB</p>";
                }
                else 
                {
                    echo "<p>$valorB $valorA</p>";
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