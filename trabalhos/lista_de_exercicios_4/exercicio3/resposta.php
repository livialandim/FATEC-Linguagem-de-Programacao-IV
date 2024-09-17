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
        function verificar_palavra_contida($palavra1, $palavra2) 
        {
            return strpos($palavra1, $palavra2) !== false; // Função interna strpos()
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $palavra1 = $_POST['palavra1'];
                $palavra2 = $_POST['palavra2'];

                if (verificar_palavra_contida($palavra1, $palavra2))
                {
                    echo "<p>A palavra '$palavra2' está contida na palavra '$palavra1'.</p>";
                } 
                else 
                {
                    echo "<p>A palavra '$palavra2' NÃO está contida na palavra '$palavra1'.</p>";
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