<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            try
            {
                $valor = $_POST['valor'];

                // FUNÇÕES DE STRING
                // Contando quantos caracteres tem numa variável
                $quantidade_caracteres = strlen($valor);

                echo "<p>Quantidade de caracteres: $quantidade_caracteres</p>";

                // Transformando o texto em MAIUSCULO ou minusculo
                $maiusculo = strtoupper($valor);
                $minusculo = strtolower($valor);

                echo "<p>Tudo em maiúsculo: $maiusculo</p>";
                echo "<p>Tudo em minúsculo: $minusculo</p>";

                $dia = 30;
                $mes = 2;
                $ano = 2024;

                // FUNÇÕES DE DATA
                // checkdate(MM, dd, AA) -> retorna V ou F
                if (checkdate($mes, $dia, $ano))
                {
                    echo "<p>A data existe</p>";
                }
                else
                {
                    echo "<p>A data não existe</p>";
                }

                // FUNÇÕES NUMÉRICAS
                // min() -> retorna o menor valor
                $menor = min(2, 4, 7, 9);

                echo "<p>O menor valor é: $menor</p>";

                // max() -> retorna o maior valor
                $maior = max(2, 4, 7, 9);

                echo "<p>O maior valor é: $maior</p>";

                // rand() -> aleatorização de números
                $aleatorio = rand(1, 100);

                echo "<p>O número sorteado é: $aleatorio</p>";

                // number_format(valor que quero formatar, casas decimais, separador de decimais, separador de milhares)formatação de números
                $numero = 1567.98;
                $moeda = number_format($numero, 2, ",", ".");

                echo "<p>Número formatado: $moeda</p>";

                
            }
            catch (Exception $e)
            {
                echo "Erro!";
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>