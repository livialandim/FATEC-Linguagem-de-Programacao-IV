<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/linhas.php'; 
    
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        $linha = buscarLinhaPorId($id);  // Supondo que a função de busca esteja no arquivo de funções
    }
    
    // Função que retorna a linha pelo id
    function buscarLinhaPorId($id) {
        global $pdo;
        try {
            $sql = "SELECT id, nome, horario_saida, horario_chegada, cidade_saida, cidade_chegada FROM linha WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Recupera os dados do formulário
            $nome = $_POST['nome'];
            $horario_saida = $_POST['horario_saida'];
            $horario_chegada = $_POST['horario_chegada'];
            $cidade_saida = $_POST['cidade_saida'];
            $cidade_chegada = $_POST['cidade_chegada'];
            // $id = $_POST['id'];

            if (atualizarLinha($id, $nome, $cidade_saida, $cidade_chegada, $horario_saida, $horario_chegada)) {
                header('Location: linhas.php');
                exit();
            }
            else {
                $erro = "Erro ao alterar o produto";
            }

        } catch (PDOException $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Linha</h2>

    <form method="post" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Linha</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $linha['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="horario_saida" class="form-label">Horário de Saída</label>
            <input type="time" name="horario_saida" id="horario_saida" class="form-control" value="<?= $linha['horario_saida'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="horario_chegada" class="form-label">Horário de Chegada</label>
            <input type="time" name="horario_chegada" id="horario_chegada" class="form-control" value="<?= $linha['horario_chegada'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="cidade_destino" class="form-label">Cidade Saída</label>
            <input type="text" name="cidade_saida" id="cidade_saida" class="form-control" value="<?= $linha['cidade_saida'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="cidade_chegada" class="form-label">Cidade Chegada</label>
            <input type="text" name="cidade_chegada" id="cidade_chegada" class="form-control" value="<?= $linha['cidade_chegada'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Linha</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
