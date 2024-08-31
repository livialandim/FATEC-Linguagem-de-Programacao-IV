<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-3">
    <form action="resposta.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="numero1" class="form-label">Informe o primeiro número: </label>
                    <input type="number" class="form-control" name="numero1" id="numero1" placeholder="1, 2, 3...">
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="numero2" class="form-label">Informe o segundo número: </label>
                    <input type="number" class="form-control" name="numero2" id="numero2" placeholder="1, 2, 3...">
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
    </form>
</body>
</html>