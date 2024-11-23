<?php
require_once 'cabecalho.php';
require_once 'navbar.php';
require_once '../funcoes/linhas.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id = intval($_POST['id']);
        if (excluirLinha($id)) {
            header('Location: linhas.php');
            exit();
        } else {
            $erro = "Erro ao excluir a linha!";
        }
    } catch (Exception $e) {
        $erro = "Erro: " . $e->getMessage();
    }
} else {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $linha = retornaLinhaPorId($id);
        if ($linha == null) {
            header('Location: linhas.php');
            exit();
        }
    } else {
        header('Location: linhas.php');
        exit();
    }
}
?>

<div class="container mt-5">
    <h2>Excluir Linha</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir a linha abaixo?</p>

    <ul>
        <li><strong>Nome da Linha:</strong> <?= $linha['nome'] ?></li>
        <li><strong>Horário de Saída:</strong> <?= $linha['horario_saida'] ?></li>
        <li><strong>Horário de Chegada:</strong> <?= $linha['horario_chegada'] ?></li>
        <li><strong>Cidade de Destino:</strong> <?= $linha['cidade_saida'] ?></li>
        <li><strong>Cidade de Chegada:</strong> <?= $linha['cidade_chegada'] ?></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $linha['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="linhas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>