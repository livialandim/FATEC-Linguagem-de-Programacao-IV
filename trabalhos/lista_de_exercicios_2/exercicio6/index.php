<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercício 6</title>
</head>

<body class="container p-3">
    <h1 class="m-3">Calculadora de conversão de temperaturas</h1>

    <form action="resposta.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="celsius" class="form-label">Informe a temperatura em ºC:</label>
                    <input type="number" class="form-control" name="celsius" id="celsius" placeholder="1, 2, 3...">
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