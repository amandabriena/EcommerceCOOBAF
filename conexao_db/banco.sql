CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` smallint(10) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL UNIQUE,
  `senha` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL
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
	status tinyint(1) NOT NULL
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
  status tinyint(1) NOT NULL
);
	
ALTER TABLE pedido ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_produto) REFERENCES produto(id_produto);

/*INSERT USUÁRIO ADMIN COOBAF*/
INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `senha`, `email`, `telefone`, `status`, `tipo_usuario`) 
VALUES (NULL, 'COOBAF', '000.000.000-00', 'admin', 'coobaf.fsa@gmail.com', '(75)3625-9394', '1', '0');

INSERT INTO `noticia` (`id_noticia`, `titulo`, `corpo`, `imagem`, `data`, `status`) 
VALUES (NULL, 'oi', 'teste', '161542106860495e8c234b6.jpg', '2021-03-11', '1');
