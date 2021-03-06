CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL UNIQUE,
  `senha` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
);