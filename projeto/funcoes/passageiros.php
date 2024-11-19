<?php

require_once '../config/bancodedados.php';

function novoPassageiro($nome, $cpf) {
    global $pdo;
    try {
        $sql = "INSERT INTO passageiro (nome, cpf) VALUES (:nome, :cpf)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao criar passageiro: " . $e->getMessage();
        return false;
    }
}

function retornaPassageiroPorId($id) {
    global $pdo;
    try {
        $sql = "SELECT * FROM passageiro WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar passageiro: " . $e->getMessage();
        return null;
    }
}

function atualizarPassageiro($id, $nome, $cpf) {
    global $pdo;
    try {
        $sql = "UPDATE passageiro SET nome = :nome, cpf = :cpf WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao atualizar passageiro: " . $e->getMessage();
        return false;
    }
}

function todosPassageiros() {
    global $pdo;
    try {
        $sql = "SELECT * FROM passageiro";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar passageiros: " . $e->getMessage();
        return [];
    }
}

function excluirPassageiro($id) {
    global $pdo;
    try {
        $sql = "DELETE FROM passageiro WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao excluir passageiro: " . $e->getMessage();
        return false;
    }
}

function buscarPassageiroPorId($id_passageiro) {
    global $pdo;
    try {
        $sql = "SELECT * FROM passageiro WHERE id = :id_passageiro";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_passageiro', $id_passageiro, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar passageiro: " . $e->getMessage();
        return null;
    }
}
?>
