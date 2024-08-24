<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercício 5</title>
</head>

<body class="container p-3">
    <h1 class="m-3">Calculadora de média de notas</h1>

    <form action="resposta.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="nota1" class="form-label">Informe a primeira nota:</label>
                    <input type="number" class="form-control" name="nota1" id="nota1" placeholder="1, 2, 3...">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="nota2" class="form-label">Informe a segunda nota:</label>
                    <input type="number" class="form-control" name="nota2" id="nota2" placeholder="1, 2, 3..">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="nota3" class="form-label">Informe a terceira nota:</label>
                    <input type="number" class="form-control" name="nota3" id="nota3" placeholder="1, 2, 3..">
                </div>
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