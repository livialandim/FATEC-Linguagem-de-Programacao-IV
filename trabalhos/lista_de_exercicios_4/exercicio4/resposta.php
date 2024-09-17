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
        function validar_data($dia, $mes, $ano)
        {
            return checkdate($mes, $dia, $ano);
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $dia = $_POST['dia'];
                $mes = $_POST['mes'];
                $ano = $_POST['ano'];
        
                if (validar_data($dia, $mes, $ano)) {
                    echo "<p>A data $dia/$mes/$ano é válida</p>";
                } else {
                    echo "<p>A data informada não é válida</p>";
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