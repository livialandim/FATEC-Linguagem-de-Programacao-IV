<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';

    require_once '../funcoes/passageiros.php';
    $erro = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            if (excluirPassageiro($id)) {
                header('Location: passageiros.php');
                exit();
            } else {
                $erro = "Erro ao excluir o passageiro!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $passageiro = retornaPassageiroPorId($id);
            if ($passageiro == null) {
                header('Location: passageiros.php');
                exit();
            }
        } else {
            header('Location: passageiros.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Passageiro</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir o passageiro abaixo?</p>

    <ul>
        <li><strong>Nome: </strong><?= $passageiro['nome']?></li>
        <li><strong>CPF: </strong><?= $passageiro['cpf'] ?></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($passageiro['id']) ?>" />
        <button type="submit" class="btn btn-danger">Excluir</button>
        <a href="passageiros.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
