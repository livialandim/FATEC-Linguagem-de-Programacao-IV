<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exercício 17</title>
</head>

<body class="container p-3">
    <h1 class="m-3">Calculadora de juros simples</h1>

    <form action="resposta.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="capital" class="form-label">Informe o capital:</label>
                    <input type="number" class="form-control" name="capital" id="capital" placeholder="R$ XX.XX">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="taxa" class="form-label">Informe a taxa:</label>
                    <input type="number" class="form-control" name="taxa" id="taxa" placeholder="R$ XX.XX">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="periodo" class="form-label">Informe a periodo:</label>
                    <input type="number" class="form-control" name="periodo" id="periodo" placeholder="Dia, mês, ano...">
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