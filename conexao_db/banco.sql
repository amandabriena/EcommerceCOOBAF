CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` smallint(10) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL UNIQUE,
  `senha` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
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
	descricao varchar(20),
	tipo varchar(15) not null,
	valor float(15),
	status tinyint(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS item_pedido (
	id_item_pedido smallint(10) not null primary key AUTO_INCREMENT,
	id_pedido smallint(10) not null,
	id_produto smallint(10) not null,
	quantidade int(10) not null
);

CREATE TABLE IF NOT EXISTS noticia (
  id_noticia smallint(10) not null primary key,
  titulo varchar(45) NOT NULL,
  descricao varchar(1000) NOT NULL,
  imagem varchar(100) not null,
  data date not null,
  status tinyint(1) NOT NULL
);
	
ALTER TABLE pedido ADD FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido);
ALTER TABLE item_pedido ADD FOREIGN KEY (id_produto) REFERENCES produto(id_produto);

