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