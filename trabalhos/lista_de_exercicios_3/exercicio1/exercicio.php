<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-3">
    <form action="resposta.php" method="POST" >
        <div class="row">
            <?php 
                for ($i = 1; $i <= 7; $i++)
                {
            ?>
            <div class="col">
                <input type = 'number' class="form-control m-3" name = 'numero<?=$i?>' id = 'numero<?=$i?>'>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</body>
</html>