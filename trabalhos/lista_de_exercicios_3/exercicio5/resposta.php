<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta do exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container p-3">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $mes = (string) $_POST['mes'];

            switch ($mes) {
                case 'Janeiro':
                    echo 'Janeiro, 1';
                    break;

                case 'Fevereiro':
                    echo 'Fevereiro, 2';
                    break;

                case 'Março':
                    echo 'Março, 3';
                    break;

                case 'Abril':
                    echo 'Abril, 4';
                    break;

                case 'Maio':
                    echo 'Maio, 5';
                    break;

                case 'Junho':
                    echo 'Junho, 6';
                    break;

                case 'Julho':
                    echo 'Julho, 7';
                    break;

                case 'Agosto':
                    echo 'Agosto, 8';
                    break;

                case 'Setembro':
                    echo 'Setembro, 9';
                    break;

                case 'Outubro':
                    echo 'Outubro, 10';
                    break;

                case 'Novembro':
                    echo 'Novembro, 11';
                    break;

                case 'Dezembro':
                    echo 'Dezembro, 12';
                    break;
            }
        } catch (Exception $e) {
            echo "Erro!";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>