<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/estacoes_saida.php';

    $erro = "";

    // Processa o formulário quando enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Obtém os dados do formulário
            $nome = $_POST['nome'];
            $cidade = $_POST['cidade'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];

            // Verifica se os campos estão preenchidos
            if (empty($nome) || empty($cidade) || empty($rua) || empty($numero) || empty($cep)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                // Chama a função para adicionar a nova estação de saída
                if (novaEstacaoSaida($nome, $cidade, $rua, $numero, $cep)) {
                    header('Location: estacoes_saida.php');
                    exit();
                } else {
                    $erro = "Erro ao adicionar a estação de saída!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Nova Estação de Saída</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Estação</button>
        <a href="estacoes_saida.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
