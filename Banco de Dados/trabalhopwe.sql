create database if not exists Loja;

use Loja;

CREATE TABLE IF NOT EXISTS TB_CLIENTE (
ID_CLIENTE INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
NOME_CLIENTE VARCHAR (60) NOT NULL,
END_CLIENTE CHAR (120) NOT NULL,
EMAIL_CLIENTE VARCHAR (35) NOT NULL UNIQUE,
SENHA_CLIENTE VARCHAR (20) NOT NULL
)engine=InnoDB;
 
CREATE TABLE IF NOT EXISTS TB_PROD (
ID_PROD INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
NOME_PROD VARCHAR (40) NOT NULL UNIQUE,
VALOR_PROD NUMERIC (6,2) NOT NULL,
DESC_PROD TEXT NOT NULL 
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS TB_PEDIDO (
ID_PEDIDO INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
DTA_PEDIDO DATETIME NOT NULL,
VALOR_PEDIDO NUMERIC (7,2) NOT NULL,
STATUS_PEDIDO VARCHAR (40) NOT NULL,
ID_CLIENTE INT NOT NULL,
ID_PROD INT NOT NULL,
FOREIGN KEY (ID_CLIENTE) REFERENCES TB_CLIENTE(ID_CLIENTE),
FOREIGN KEY (ID_PROD) REFERENCES TB_PROD(ID_PROD)
)engine=InnoDB;