<?php
require_once 'cabecalho.php';
require_once 'navbar.php';
require_once '../funcoes/viagens.php';
require_once '../funcoes/linhas.php';

$dados = gerarDadosGraficoViagensPorLinha();
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard</h2>

        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Linha', 'Quantidade de Viagens', { role: 'style' }],
                <?php foreach ($dados as $dado): ?>
                    ['<?= $dado['nome_linha'] ?>', <?= $dado['quantidade'] ?>, '#F0C808'],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Quantidade de Viagens por Linha',
                hAxis: {
                    title: 'Linhas',
                    titleTextStyle: { color: '#333' }
                },
                vAxis: { minValue: 0 },
                chartArea: { width: '70%', height: '70%' },
                colors: ['#F0C808']
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
