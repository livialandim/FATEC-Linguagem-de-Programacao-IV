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
                        <label for="nomes" class="form-label">Informe o nome: </label>
                        <input type="string" class="form-control" name="nomes[]">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="telefones" class="form-label">Informe o número de telefone: </label>
                        <input type="string" class="form-control" name="telefones[]">
                    </div>
                </div>
            </div>
        <?php endfor; ?>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $nomes = $_POST['nomes'];
                $telefones = $_POST['telefones'];
                $contatos = [];

                $erro = false;

                foreach ($nomes as $chave => $valor) {
                    $telefone = $telefones[$chave];

                    if (array_key_exists($valor, $contatos)) {
                        echo "<p>O nome $valor já existe!</p>";
                        $erro = true;
                    } elseif (in_array($telefone, $contatos)) {
                        echo "<p>O telefone $telefone já existe</p>";
                        $erro = true;
                    } else {
                        $contatos[$valor] = $telefone;
                    }
                }

                ksort($contatos);

                if (!$erro) {
                    echo "<p>Lista de contatos</p>";
                    foreach ($contatos as $nome => $telefone) {
                        echo "<p>Nome: $nome - Telefone: $telefone</p>";
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>