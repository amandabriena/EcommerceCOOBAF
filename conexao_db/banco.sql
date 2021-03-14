CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` smallint(10) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL UNIQUE,
  `senha` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
  `id_endereco` smallint(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` smallint(10) NOT NULL PRIMARY KEY auto_increment,
  `cep` varchar(30) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` smallint(10) NOT NULL PRIMARY KEY auto_increment,
  `id_usuario` smallint(10) NOT NULL,
  `valor_total` float(20),
  `status` tinyint(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS produto (
	id_produto smallint(10) not null primary key AUTO_INCREMENT,
	nome varchar(15) not null,
  imagem varchar(100) not null,
	descricao varchar(20),
	categoria varchar(15) not null,
	preco float(15),
	status tinyint(1) NOT NULL,
  visibilidade tinyint(1)
);

CREATE TABLE IF NOT EXISTS item_pedido (
	id_item_pedido smallint(10) not null primary key AUTO_INCREMENT,
	id_pedido smallint(10) not null,
	id_produto smallint(10) not null,
	quantidade int(10) not null
);

CREATE TABLE IF NOT EXISTS noticia (
  id_noticia smallint(10) not null primary key AUTO_INCREMENT,
  titulo varchar(45) NOT NULL,
  corpo varchar(1500) NOT NULL,
  imagem varchar(100) not null,
  data date not null,
  status tinyint(1) NOT NULL,
  visibilidade tinyint(1)
);
	
ALTER TABLE pedido ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_produto) REFERENCES produto(id_produto);
ALTER TABLE usuarios ADD FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco);


/*INSERT USUÁRIO ADMIN COOBAF*/
INSERT INTO `endereco` (`id_endereco`, `cep`, `rua`, `bairro`, `numero`, `cidade`, `uf`, `logradouro`) 
VALUES (NULL, '44110000', 'Fazenda Lagoa Grande', '-', '250', 'Feira de Santana', 'BA', 'Maria Quitéria');

INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `senha`, `email`, `telefone`, `status`, `tipo_usuario`, `id_endereco`) 
VALUES (NULL, 'COOBAF-FS', '000.000.000-00', 'admin', 'coobaf.fsa@gmail.com', '(75)3625-9394', '1', '0', '1');


INSERT INTO `noticia` (`id_noticia`, `titulo`, `corpo`, `imagem`, `data`, `status`) 
VALUES (NULL, 'oi', 'teste', '161542106860495e8c234b6.jpg', '2021-03-11', '1');
