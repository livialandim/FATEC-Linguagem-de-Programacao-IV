<?php

require_once '../config/bancodedados.php';

function gerarDadosGraficoViagensPorLinha(): array {
    global $pdo;
    $stmt = $pdo->query("
        SELECT 
            l.id,
            l.nome AS nome_linha,
            COUNT(v.id) AS quantidade
        FROM viagem v
        INNER JOIN linha l ON l.id = v.id_linha
        GROUP BY l.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function novaLinha($nome, $horario_saida, $horario_chegada, $cidade_destino, $cidade_chegada) {
    global $pdo;
    try {
        $sql = "INSERT INTO linha (nome, horario_saida, horario_chegada, cidade_destino, cidade_chegada) 
                VALUES (:nome, :horario_saida, :horario_chegada, :cidade_destino, :cidade_chegada)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':horario_saida', $horario_saida);
        $stmt->bindParam(':horario_chegada', $horario_chegada);
        $stmt->bindParam(':cidade_destino', $cidade_destino);
        $stmt->bindParam(':cidade_chegada', $cidade_chegada);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao criar linha: " . $e->getMessage();
        return false;
    }
}

function buscarLinhas() {
    global $pdo;
    try {
        $sql = "SELECT * FROM linha";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar linhas: " . $e->getMessage();
        return [];
    }
}

function todasLinhas() {
    global $pdo;
    try {
        $sql = "SELECT * FROM linha";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar linhas: " . $e->getMessage();
        return [];
    }
}

function retornaLinhaPorId($id) {
    global $pdo;
    try {
        $sql = "SELECT * FROM linha WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar linha: " . $e->getMessage();
        return null;
    }
}

function excluirLinha($id) {
    global $pdo;
    try {
        $sql = "DELETE FROM linha WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao excluir linha: " . $e->getMessage();
        return false;
    }
}

function atualizarLinha($id, $nome, $cidade_destino, $cidade_chegada, $horario_saida, $horario_chegada) {
    global $pdo;
    try {
        $sql = "UPDATE linha SET nome = :nome, cidade_destino = :cidade_destino, cidade_chegada = :cidade_chegada, 
                horario_saida = :horario_saida, horario_chegada = :horario_chegada WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cidade_destino', $cidade_destino);
        $stmt->bindParam(':cidade_chegada', $cidade_chegada);
        $stmt->bindParam(':horario_saida', $horario_saida);
        $stmt->bindParam(':horario_chegada', $horario_chegada);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao atualizar linha: " . $e->getMessage();
        return false;
    }
}

?>
