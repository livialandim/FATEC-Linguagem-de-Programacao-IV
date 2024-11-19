<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/estacoes_saida.php';

    $erro = "";
    $estacao = null;

    // Verifica se o ID da estação foi passado na URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $estacao = buscarEstacaoSaidaPorId($id);

        if (!$estacao) {
            header('Location: estacoes_saida.php');
            exit();
        }
    } else {
        header('Location: estacoes_saida.php');
        exit();
    }

    // Processa o formulário quando o botão de exclusão é pressionado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            
            // Chama a função para excluir a estação de saída
            if (excluirEstacaoSaida($id)) {
                header('Location: estacoes_saida.php');
                exit();
            } else {
                $erro = "Erro ao excluir a estação de saída!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Estação de Saída</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir a estação de saída abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $estacao['nome'] ?></strong></li>
        <li><strong>Cidade: <?= $estacao['cidade'] ?></strong></li>
        <li><strong>Rua: <?= $estacao['rua'] ?></strong></li>
        <li><strong>Número: <?= $estacao['numero'] ?></strong></li>
        <li><strong>CEP: <?= $estacao['cep'] ?></strong></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $estacao['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="estacoes_saida.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
