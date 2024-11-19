<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/viagens.php';
    require_once '../funcoes/linhas.php';
    require_once '../funcoes/passageiros.php';
    require_once '../funcoes/estacoes_saida.php';

    // Busca todas as viagens
    $viagens = todasViagens();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Viagens</h2>
    <a href="nova_viagem.php" class="btn btn-success mb-3">Nova Viagem</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Linha</th>
                <th>Passageiro</th>
                <th>Estação de Saída</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viagens as $v): 
                $linha = retornaLinhaPorId($v['id_linha']);
                $passageiro = buscarPassageiroPorId($v['id_passageiro']);
                $estacao_saida = buscarEstacaoSaidaPorId($v['id_estacao_saida']);
            ?>
            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $passageiro['nome'] ?></td>
                <td><?= $estacao_saida['nome'] ?>, <?= $estacao_saida['cidade'] ?></td>
                <td>
                    <a href="editar_viagem.php?id=<?= $v['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_viagem.php?id=<?= $v['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
