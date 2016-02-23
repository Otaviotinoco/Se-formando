CREATE DATABASE usuarios;
USE usuarios;    
	
	CREATE TABLE usuarios(
        id INTEGER NOT NULL AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL,
        sobrenome VARCHAR(100),
        apelido VARCHAR(100),
        email VARCHAR(100),
        cep VARCHAR(100),
        rua VARCHAR(100),
		bairro VARCHAR(100),
		cidade VARCHAR(100),
		uf VARCHAR(100),
		senha VARCHAR(100),
		telefone VARCHAR(100),
		imagem BLOB,
		PRIMARY KEY(id)
    );