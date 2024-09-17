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
        function calcular_diferenca_dias($data1, $data2) 
        {
            $data1_convertida = DateTime::createFromFormat('d/m/Y', $data1);
            $data2_convertida = DateTime::createFromFormat('d/m/Y', $data2);
    
            if ($data1_convertida && $data2_convertida) 
            {
                $diferenca = $data1_convertida->diff($data2_convertida);
                return $diferenca->days;
            } 
            else 
            {
                return false;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            try
            {
                $data1 = $_POST['data1'];
                $data2 = $_POST['data2'];

                $dias_diferenca = calcular_diferenca_dias($data1, $data2);
        
                if ($dias_diferenca !== false) 
                {
                    echo "<p>A diferença entre $data1 e $data2 é de $dias_diferenca dias</p>";
                } 
                else 
                {
                    echo "<p>Insira datas válidas no formato dd/mm/yyyy</p>";
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