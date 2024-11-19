CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE linha (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    horario_saida TIME NOT NULL,
    horario_chegada TIME NOT NULL,
    cidade_destino VARCHAR(100) NOT NULL, 
    cidade_chegada VARCHAR(100) NOT NULL
);

CREATE TABLE passageiro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    CPF VARCHAR(100) NOT NULL
);

CREATE TABLE estacao_saida (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    numero VARCHAR(100) NOT NULL,
    cep VARCHAR(100) NOT NULL
);

CREATE TABLE viagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_linha INT NOT NULL,
    id_passageiro INT NOT NULL,
    id_estacao_saida INT NOT NULL,
    FOREIGN KEY (id_linha) REFERENCES linha(id),
    FOREIGN KEY (id_passageiro) REFERENCES passageiro(id),
    FOREIGN KEY (id_estacao_saida) REFERENCES estacao_saida(id)
);