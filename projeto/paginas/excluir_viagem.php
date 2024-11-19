<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/viagens.php';
    require_once '../funcoes/linhas.php';
    require_once '../funcoes/passageiros.php';
    require_once '../funcoes/estacoes_saida.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        try {
            $id = intval($_POST['id']);
            if (excluirViagem($id)) {
                header('Location: viagens.php');
                exit();
            } else {
                $erro = "Erro ao excluir a viagem!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $viagem = retornaViagemPorId($id);
            if ($viagem == null) {
                header('Location: viagens.php');
                exit();
            }
        } else {
            header('Location: viagens.php'); 
            exit(); 
        }
    }

    $linha = retornaLinhaPorId($viagem['id_linha']);
    $passageiro = buscarPassageiroPorId($viagem['id_passageiro']);
    $estacao_saida = buscarEstacaoSaidaPorId($viagem['id_estacao_saida']);
?>

<div class="container mt-5">
    <h2>Excluir Viagem</h2>
    
    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir esta viagem?</p>
    
    <ul>
        <li><strong>Linha: </strong><?= $linha['nome'] ?></li>
        <li><strong>Passageiro: </strong><?= $passageiro['nome'] ?></li>
        <li><strong>Estação de saída: </strong><?= $estacao_saida['nome'] ?></li>
    </ul>  

    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($viagem['id']) ?>" />
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="viagens.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
