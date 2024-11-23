<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/linhas.php'; 

    // Obtém as linhas
    $linhas = todasLinhas();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Linhas</h2>
    <a href="nova_linha.php" class="btn btn-success mb-3">Nova Linha</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Linha</th>
                <th>Cidade Saída</th>
                <th>Cidade Chegada</th>
                <th>Horário de Saída</th>
                <th>Horário de Chegada</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($linhas as $linha): ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['cidade_saida'] ?></td>
                <td><?= $linha['cidade_chegada'] ?></td>
                <td><?= $linha['horario_saida'] ?></td>
                <td><?= $linha['horario_chegada'] ?></td>
                <td>
                    <a href="editar_linha.php?id=<?= $linha['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_linha.php?id=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
