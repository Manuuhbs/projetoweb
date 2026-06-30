CREATE TABLE colar (
idcolar SERIAL,
cdbarras CHAR(13) NOT NULL,
descricao VARCHAR(255) NOT NULL,
preco DECIMAL NOT NULL,
CONSTRAINT PK_idcolar PRIMARY KEY(idcolar)
);

CREATE TABLE bracelete (
idbracelete SERIAL,
cdbarras CHAR(13) NOT NULL,
descricao VARCHAR(255) NOT NULL,
preco DECIMAL NOT NULL,
CONSTRAINT PK_idbracelete PRIMARY KEY(idbracelete)
);

CREATE TABLE cliente (
idcliente SERIAL PRIMARY KEY,
nome VARCHAR (200) NOT NULL, 
dt_nascimento DATE NOT NULL, 
cep CHAR(9), 
bairro VARCHAR(200),
rua VARCHAR (200), 
cidade VARCHAR (200) NOT NULL, 
numero VARCHAR(8), 
estado VARCHAR (2) NOT NULL, 
pais CHAR (50) NOT NULL, 
complemento VARCHAR (50) NOT NULL
);