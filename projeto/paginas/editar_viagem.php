<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/viagens.php';
    require_once '../funcoes/linhas.php';
    require_once '../funcoes/passageiros.php';
    require_once '../funcoes/estacoes_saida.php';

    // Verifica se o ID da viagem foi passado
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        // Busca os dados da viagem com base no ID
        $viagem = buscarViagemPorId($id);
        if (!$viagem) {
            // Se a viagem não for encontrada, redireciona para a página de viagens
            header('Location: viagens.php');
            exit();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Caso o formulário tenha sido enviado, atualiza a viagem
        $id = intval($_POST['id']);
        $id_linha = intval($_POST['id_linha']);
        $id_passageiro = intval($_POST['id_passageiro']);
        $id_estacao_saida = intval($_POST['id_estacao_saida']);

        if (atualizarViagem($id, $id_linha, $id_passageiro, $id_estacao_saida)) {
            // Redireciona para a página de viagens após a atualização
            header('Location: viagens.php');
            exit();
        } else {
            $erro = "Erro ao atualizar a viagem!";
        }
    }

    // Função para buscar a viagem pelo ID
    function buscarViagemPorId($id) {
        global $pdo;
        $sql = "SELECT * FROM viagem WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para atualizar a viagem
    function atualizarViagem($id, $id_linha, $id_passageiro, $id_estacao_saida) {
        global $pdo;
        $sql = "UPDATE viagem SET id_linha = :id_linha, id_passageiro = :id_passageiro, id_estacao_saida = :id_estacao_saida WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_linha', $id_linha, PDO::PARAM_INT);
        $stmt->bindParam(':id_passageiro', $id_passageiro, PDO::PARAM_INT);
        $stmt->bindParam(':id_estacao_saida', $id_estacao_saida, PDO::PARAM_INT);
        return $stmt->execute();
    }
?>

<div class="container mt-5">
    <h2>Editar Viagem</h2>

    <?php if (isset($erro)): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $viagem['id'] ?>" />

        <div class="mb-3">
            <label for="id_linha" class="form-label">Linha</label>
            <select name="id_linha" id="id_linha" class="form-control" required>
                <option value="">Selecione a Linha</option>
                <?php
                    $linhas = todasLinhas();
                    foreach ($linhas as $linha) :
                ?>
                    <option value="<?= $linha['id'] ?>" <?= $viagem['id_linha'] == $linha['id'] ? 'selected' : '' ?>>
                        <?= $linha['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_passageiro" class="form-label">Passageiro</label>
            <select name="id_passageiro" id="id_passageiro" class="form-control" required>
                <option value="">Selecione o Passageiro</option>
                <?php
                    $passageiros = todosPassageiros();
                    foreach ($passageiros as $passageiro) :
                ?>
                    <option value="<?= $passageiro['id'] ?>" <?= $viagem['id_passageiro'] == $passageiro['id'] ? 'selected' : '' ?>>
                        <?= $passageiro['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_estacao_saida" class="form-label">Estação de Saída</label>
            <select name="id_estacao_saida" id="id_estacao_saida" class="form-control" required>
                <option value="">Selecione a Estação de Saída</option>
                <?php
                    $estacoes_saida = todasEstacoesSaida();
                    foreach ($estacoes_saida as $estacao_saida) :
                ?>
                    <option value="<?= $estacao_saida['id'] ?>" <?= $viagem['id_estacao_saida'] == $estacao_saida['id'] ? 'selected' : '' ?>>
                        <?= $estacao_saida['nome'] ?> - <?= $estacao_saida['cidade'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Viagem</button>
        <a href="viagens.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
