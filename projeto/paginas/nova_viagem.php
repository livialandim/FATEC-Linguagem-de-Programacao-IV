<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/viagens.php';
    require_once '../funcoes/linhas.php';
    require_once '../funcoes/passageiros.php';
    require_once '../funcoes/estacoes_saida.php';

    // Recupera todas as linhas, passageiros e estações de saída
    $linhas = todasLinhas();
    $passageiros = todosPassageiros();
    $estacoes_saida = todasEstacoesSaida();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Recebe os dados do formulário
            $id_linha = $_POST['id_linha'];
            $id_passageiro = $_POST['id_passageiro'];
            $id_estacao_saida = $_POST['id_estacao_saida'];

            // Insere a nova viagem no banco de dados
            if (adicionarViagem($id_linha, $id_passageiro, $id_estacao_saida)) {
                header('Location: viagens.php');
                exit();
            } else {
                $erro = "Erro ao adicionar a viagem!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Nova Viagem</h2>

    <?php if (isset($erro)): ?>
        <div class="alert alert-danger">
            <?= $erro ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="id_linha" class="form-label">Linha</label>
            <select name="id_linha" id="id_linha" class="form-control" required>
                <option value="">Selecione uma Linha</option>
                <?php foreach ($linhas as $linha): ?>
                    <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_passageiro" class="form-label">Passageiro</label>
            <select name="id_passageiro" id="id_passageiro" class="form-control" required>
                <option value="">Selecione um Passageiro</option>
                <?php foreach ($passageiros as $passageiro): ?>
                    <option value="<?= $passageiro['id'] ?>"><?= $passageiro['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_estacao_saida" class="form-label">Estação de Saída</label>
            <select name="id_estacao_saida" id="id_estacao_saida" class="form-control" required>
                <option value="">Selecione uma Estação de Saída</option>
                <?php foreach ($estacoes_saida as $estacao_saida): ?>
                    <option value="<?= $estacao_saida['id'] ?>"><?= $estacao_saida['nome'] ?> - <?= $estacao_saida['cidade'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Viagem</button>
        <a href="viagens.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
