CREATE TABLE `agrow`.`usuario` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `sobrenome` VARCHAR(255) NOT NULL , `cpf_cnpj` VARCHAR(14) NOT NULL , `idade` INT(2) NOT NULL , `sexo` VARCHAR(30) NOT NULL , `email` VARCHAR(80) NOT NULL , `cep` VARCHAR(15) NOT NULL , `logradouro` VARCHAR(150) NOT NULL , `numero` VARCHAR(10) NOT NULL , `complemento` VARCHAR(50) NULL , `bairro` VARCHAR(80) NOT NULL , `cidade` VARCHAR(50) NOT NULL , `estado` VARCHAR(2) NOT NULL , `senha` VARCHAR(40) NOT NULL , PRIMARY KEY (`id`), UNIQUE `login` (`email`)) ENGINE = InnoDB;


INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `cpf_cnpj`, `idade`, `sexo`, `email`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `senha`) VALUES (NULL, 'Ana Carolina', 'Augusto', '123456789-12', '21', 'FEMININO', 'rm87820@fiap.com.br', '01538-001', 'Avenida Lins de Vasconcelos', '1222', 'Faculdade', 'Aclimação', 'São Paulo', 'SP', 'fiap123')