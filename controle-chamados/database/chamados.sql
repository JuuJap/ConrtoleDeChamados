CREATE DATABASE controle_chamados;

USE controle_chamados;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    departamento VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    equipamento VARCHAR(100) NOT NULL,
    numero_equipamento VARCHAR(50) NOT NULL,
    descricao_problema TEXT NOT NULL,
    status ENUM('Aberto', 'Em Andamento', 'Concluído') DEFAULT 'Aberto',
    data_abertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha)
VALUES (
    'Administrador',
    'admin@empresa.com',
    SHA2('123456',256)
);