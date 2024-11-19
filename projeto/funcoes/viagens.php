<?php

require_once('../config/bancodedados.php');

function todasViagens() {
    global $pdo;
    try {
        $sql = "SELECT * FROM viagem";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar viagens: " . $e->getMessage();
        return [];
    }
}

function adicionarViagem($id_linha, $id_passageiro, $id_estacao_saida) {
    global $pdo;
    try {
        $sql = "INSERT INTO viagem (id_linha, id_passageiro, id_estacao_saida) 
                VALUES (:id_linha, :id_passageiro, :id_estacao_saida)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_linha', $id_linha, PDO::PARAM_INT);
        $stmt->bindParam(':id_passageiro', $id_passageiro, PDO::PARAM_INT);
        $stmt->bindParam(':id_estacao_saida', $id_estacao_saida, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao adicionar viagem: " . $e->getMessage();
        return false;
    }
}

function excluirViagem($id) {
    global $pdo;

    try {
        // Prepara a consulta SQL para excluir a viagem
        $sql = "DELETE FROM viagem WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); // Retorna true se a exclusão for bem-sucedida
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false; // Retorna false em caso de erro
    }
}

function retornaViagemPorId($id) {
    global $pdo;
    $sql = "SELECT * FROM viagem WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}
?>