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
        function converter_maiuscula_minuscula($palavra)
        {
            return [
                'maiuscula' => strtoupper($palavra), 
                'minuscula' => strtolower($palavra)  
            ];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $palavra = $_POST['palavra'];

                $resultado = converter_maiuscula_minuscula($palavra);
        
                echo "<p>Palavra em maiúsculo: {$resultado['maiuscula']}</p>";
                echo "<p>Palavra em minúsculo: {$resultado['minuscula']}</p>";
            }
            catch (Exception $e) 
            {
                echo "Erro!";
            }
        }
    ?>
</body>
</html>