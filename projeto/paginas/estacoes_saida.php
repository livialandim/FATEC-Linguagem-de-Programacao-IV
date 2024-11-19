<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/estacoes_saida.php';
    
    // Função que busca as estações de saída no banco de dados
    $estacoes_saida = buscarEstacoesSaida();
?>

<div class="container mt-5">
    <h2>Gerenciamento de estações de saída</h2>
    <a href="nova_estacao_saida.php" class="btn btn-success mb-3">Nova estação de saída</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Rua</th>
                <th>Número</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($estacoes_saida as $estacao) : ?>
            <tr>
                <td><?= $estacao['id'] ?></td>
                <td><?= $estacao['nome'] ?></td>
                <td><?= $estacao['cidade'] ?></td>
                <td><?= $estacao['rua'] ?></td>
                <td><?= $estacao['numero'] ?></td>
                <td><?= $estacao['cep'] ?></td>
                <td>
                    <a href="editar_estacao_saida.php?id=<?= $estacao['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_estacao_saida.php?id=<?= $estacao['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
