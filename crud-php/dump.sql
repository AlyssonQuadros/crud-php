CREATE DATABASE crudphp;
USE crudphp;

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`,`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8


INSERT INTO `clientes` (`id_cliente`,`nome`,`endereco`,`cpf`, `telefone`, `data_cadastro`) VALUES (1,'Carlos Carlos Carlos Carlos','João Boneti do Santos', '999.999.999-99', '(42)999999999', '2023-05-25 19:42:12');
INSERT INTO `clientes` (`id_cliente`,`nome`,`endereco`,`cpf`, `telefone`, `data_cadastro`) VALUES (2,'Jorge Jorge Jorge Jorge','Jorge Boneti do Santos', '888.888.888-88', '(42)999999999', '2023-05-25 19:43:12');
INSERT INTO `clientes` (`id_cliente`,`nome`,`endereco`,`cpf`, `telefone`, `data_cadastro`) VALUES (3,'Paulo Paulo Paulo Paulo','Paulo Boneti do Santos', '777.777.777-77', '(42)999999999', '2023-05-25 19:44:12');