<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
    require_once '../funcoes/linhas.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Obtém os dados do formulário
            $nome = $_POST['nome'];
            $horario_saida = $_POST['horario_saida'];
            $horario_chegada = $_POST['horario_chegada'];
            $cidade_destino = $_POST['cidade_destino'];
            $cidade_chegada = $_POST['cidade_chegada'];

            // Insere a nova linha no banco de dados
            $sql = "INSERT INTO linha (nome, horario_saida, horario_chegada, cidade_destino, cidade_chegada) 
                    VALUES (:nome, :horario_saida, :horario_chegada, :cidade_destino, :cidade_chegada)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':horario_saida', $horario_saida);
            $stmt->bindParam(':horario_chegada', $horario_chegada);
            $stmt->bindParam(':cidade_destino', $cidade_destino);
            $stmt->bindParam(':cidade_chegada', $cidade_chegada);
            $stmt->execute();

            header('Location: linhas.php');
            exit();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Linha</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Linha</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="horario_saida" class="form-label">Horário de Saída</label>
            <input type="time" name="horario_saida" id="horario_saida" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="horario_chegada" class="form-label">Horário de Chegada</label>
            <input type="time" name="horario_chegada" id="horario_chegada" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade_destino" class="form-label">Cidade Destino</label>
            <input type="text" name="cidade_destino" id="cidade_destino" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cidade_chegada" class="form-label">Cidade Chegada</label>
            <input type="text" name="cidade_chegada" id="cidade_chegada" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Criar Linha</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
