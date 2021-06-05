use sti;

CREATE TABLE `cadastroveiculos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(35) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `porte` varchar(20) NOT NULL,
  `tipo_de_carga` varchar(20) NOT NULL,
  `chassis` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 COMMENT='Tabela de cadastros de veiculos';

