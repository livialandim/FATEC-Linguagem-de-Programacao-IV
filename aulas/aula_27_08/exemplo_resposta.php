<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            try 
            {
                $valor = (int) $_POST['valor'] ?? 0; 

                // Quero verificar se o número é positivo, negativo ou igual a zero
                if ($valor > 0)
                {
                    echo "Valor positivo";
                }
                elseif ($valor < 0)
                {
                    echo "Valor negativo";
                }
                else
                {
                    echo "Valor igual a zero";
                }
            } 
            catch(Exception $e)
            {
                echo "Erro $e";
            }
        }
    ?>
</body>
</html>