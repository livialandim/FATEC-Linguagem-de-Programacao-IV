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
        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nomes-<?= $i ?>" class="form-label">Informe o nome: </label>
                        <input type="text" class="form-control" name="nomes[]" id="nomes-<?= $i ?>">
                    </div>
                </div>
                <?php for ($e = 0; $e < 3; $e++): ?>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="notas-<?= $i ?>-<?= $e ?>" class="form-label">Informe a nota: </label>
                            <input type="number" class="form-control" name="notas[<?= $i ?>][]" id="notas-<?= $i ?>-<?= $e ?>" step="0.1">
                        </div>
                    </div>
                <?php endfor; ?>
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
            $nomes = $_POST['nomes'];
            $notas = $_POST['notas'];
            $alunos = [];

            foreach ($nomes as $chave => $nome) {
                $soma_nota = array_sum($notas[$chave]);

                $media = $soma_nota / 3;

                $alunos[$nome] = $media;
            }

            arsort($alunos);

            echo "<p>Lista de alunos por média</p>";
            foreach ($alunos as $nome => $media) {
                echo "<p>Nome: $nome - Média: " . number_format($media, 2) . "</p>";
            }
        } catch (Exception $e) {
            echo "<p class='text-danger'>Erro: " . $e->getMessage() . "</p>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>