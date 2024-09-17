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
        function contar_caracteres($palavra) 
        {
            return strlen($palavra);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $palavra = $_POST['palavra'];

                $numero_de_caracteres = contar_caracteres($palavra);

                echo "<p>A palavra '$palavra' possui $numero_de_caracteres caracteres</p>";
            }
            catch (Exception $e) 
            {
                echo "Erro!";
            }
        }
    ?>
</body>
</html>