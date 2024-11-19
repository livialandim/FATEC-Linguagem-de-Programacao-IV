<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/passageiros.php';

    $erro = "";
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        // Busca o passageiro pelo ID
        $passageiro = retornaPassageiroPorId($id);
        if (!$passageiro) {
            header('Location: passageiros.php');
            exit();
        }
    } else {
        header('Location: passageiros.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];

            if (empty($nome) || empty($cpf)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                // Atualiza o passageiro no banco
                if (atualizarPassageiro($id, $nome, $cpf)) {
                    header('Location: passageiros.php');
                    exit();
                } else {
                    $erro = "Erro ao atualizar o passageiro!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Passageiro</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($passageiro['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= htmlspecialchars($passageiro['cpf']) ?>" required pattern="\d{11}" title="Digite 11 dígitos para o CPF">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Passageiro</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
