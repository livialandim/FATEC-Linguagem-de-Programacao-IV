<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/passageiros.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Passageiros</h2>
    <a href="novo_passageiro.php" class="btn btn-success mb-3">Novo Passageiro</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $passageiros = todosPassageiros();
                foreach ($passageiros as $p):
            ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nome'] ?></td>
                <td><?= $p['cpf'] ?></td>
                <td>
                    <a href="editar_passageiro.php?id=<?= $p['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_passageiro.php?id=<?= $p['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
