<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container p-3">
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="codigo-<?= $i ?>" class="form-label">Informe o código: </label>
                        <input type="text" class="form-control" name="codigos[]" id="codigo-<?= $i ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="nomes-<?= $i ?>" class="form-label">Informe o nome: </label>
                        <input type="text" class="form-control" name="nomes[]" id="nomes-<?= $i ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="precos-<?= $i ?>" class="form-label">Informe o preço: </label>
                        <input type="text" class="form-control" name="precos[]" id="precos-<?= $i ?>" required>
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
            $codigos = $_POST['codigos'];
            $nomes = $_POST['nomes'];
            $precos = $_POST['precos'];
            $produtos = [];

            foreach ($codigos as $chave => $codigo) {
                $nome = $nomes[$chave];
                $preco = $precos[$chave];

                if ($preco > 100) {
                    $preco -= ($preco * 0.1);
                }

                $produtos[$codigo] = [
                    'nome' => $nome,
                    'preco' => $preco
                ];
            }

            $ordenar_nomes = array_column($produtos, 'nome');

            array_multisort($ordenar_nomes, SORT_ASC, $produtos);

            echo "<p>Lista de Produtos</p>";
            foreach ($produtos as $codigo => $dados) {
                echo "<p>Código: $codigo - Nome: {$dados['nome']} - Preço: R$ " . number_format($dados['preco'], 2, ',', '.') . "</p>";
            }
        } catch (Exception $e) {
            echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>