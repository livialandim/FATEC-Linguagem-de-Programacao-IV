<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resultado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Resposta do cálculo</h1>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    try {
      $capital = (float) $_POST['capital'];
      $taxa = (float) $_POST['taxa'];
      $periodo = (float) $_POST['periodo'];

      $resultado = $capital * (1 + $taxa) ** $periodo;

      echo "<p>Resultado: $resultado </p>";
    } catch (Exception $e) {
      echo "Erro! " . $e->getMessage();
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>