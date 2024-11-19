<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/passageiros.php';

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];

            // Validação dos campos
            if (empty($nome) || empty($cpf)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                // Chama a função para adicionar o novo passageiro
                if (novoPassageiro($nome, $cpf)) {
                    header('Location: passageiros.php');
                    exit();
                } else {
                    $erro = "Erro ao criar o passageiro!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Novo Passageiro</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required pattern="\d{11}" title="Digite 11 dígitos para o CPF">
        </div>
        <button type="submit" class="btn btn-primary">Criar Passageiro</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
