<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container p-3">
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="titulo-<?= $i ?>" class="form-label">Informe o título:</label>
                        <input type="text" class="form-control" name="titulos[]" id="titulo-<?= $i ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="estoque-<?= $i ?>" class="form-label">Informe a quantidade em estoque:</label>
                        <input type="number" class="form-control" name="estoques[]" id="estoque-<?= $i ?>" required min="0">
                    </div>
                </div>
            </div>
        <?php endfor; ?>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $titulos = $_POST['titulos'];
            $estoques = $_POST['estoques'];
            $livros = [];

            foreach ($titulos as $chave => $titulo) {
                $estoque = $estoques[$chave];
                $livros[$titulo] = $estoque;

                if ($estoque < 5) {
                    echo "<h3>Alerta!</h3>";
                    echo "<p>O livro '$titulo' está com baixa quantidade em estoque!</p>";
                }
            }

            ksort($livros);

            echo "<h3>Lista de Livros</h3>";
            foreach ($livros as $titulo => $estoque) {
                echo "<p>Título: $titulo - Estoque: $estoque</p>";
            }
        } catch (Exception $e) {
            echo "<p>Erro: " . $e->getMessage() . "</p>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
