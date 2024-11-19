<?php

require_once '../config/bancodedados.php';

function buscarEstacoesSaida() {
    global $pdo;
    try {
        $sql = "SELECT * FROM estacao_saida";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar estações de saída: " . $e->getMessage();
        return [];
    }
}

function novaEstacaoSaida($nome, $cidade, $rua, $numero, $cep) {
    global $pdo;
    try {
        $sql = "INSERT INTO estacao_saida (nome, cidade, rua, numero, cep) VALUES (:nome, :cidade, :rua, :numero, :cep)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':cep', $cep);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao adicionar a estação de saída: " . $e->getMessage();
        return false;
    }
}

function buscarEstacaoSaidaPorId($id) {
    global $pdo;
    try {
        $sql = "SELECT * FROM estacao_saida WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar estação de saída: " . $e->getMessage();
        return false;
    }
}

function atualizarEstacaoSaida($id, $nome, $cidade, $rua, $numero, $cep) {
    global $pdo;
    try {
        $sql = "UPDATE estacao_saida SET nome = :nome, cidade = :cidade, rua = :rua, numero = :numero, cep = :cep WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':cep', $cep);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao atualizar estação de saída: " . $e->getMessage();
        return false;
    }
}

function excluirEstacaoSaida($id) {
    global $pdo;
    try {
        $sql = "DELETE FROM estacao_saida WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao excluir estação de saída: " . $e->getMessage();
        return false;
    }
}

function todasEstacoesSaida() {
    global $pdo;
    try {
        // Consulta SQL para selecionar todas as estações de saída
        $sql = "SELECT * FROM estacao_saida";
        $stmt = $pdo->query($sql);
        
        // Retorna todas as estações de saída como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Se ocorrer um erro, exibe a mensagem de erro
        echo "Erro ao buscar as estações de saída: " . $e->getMessage();
        return [];
    }
}
?>