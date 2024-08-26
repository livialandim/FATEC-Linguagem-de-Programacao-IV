<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercício 12</title>
</head>

<body class="container p-3">
    <h1 class="m-3">Calculadora de expoente</h1>

    <form action="resposta.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="base" class="form-label">Informe a base:</label>
                    <input type="number" class="form-control" name="base" id="base" placeholder="1, 2, 3...">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="expoente" class="form-label">Informe o expoente:</label>
                    <input type="number" class="form-control" name="expoente" id="expoente" placeholder="1, 2, 3...">
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