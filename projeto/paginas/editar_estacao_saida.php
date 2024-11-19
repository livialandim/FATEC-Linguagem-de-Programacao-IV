<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/estacoes_saida.php';

    $erro = "";
    $estacao = null;

    // Obtém o ID da estação da URL
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

    // Processa o formulário quando enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            $nome = $_POST['nome'];
            $cidade = $_POST['cidade'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];

            if (empty($nome) || empty($cidade) || empty($rua) || empty($numero) || empty($cep)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                // Chama a função para atualizar a estação de saída
                if (atualizarEstacaoSaida($id, $nome, $cidade, $rua, $numero, $cep)) {
                    header('Location: estacoes_saida.php');
                    exit();
                } else {
                    $erro = "Erro ao atualizar a estação de saída!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Estação de Saída</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $estacao['id'] ?>" />
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $estacao['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $estacao['cidade'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" value="<?= $estacao['rua'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" value="<?= $estacao['numero'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="<?= $estacao['cep'] ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Atualizar Estação</button>
        <a href="estacoes_saida.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
