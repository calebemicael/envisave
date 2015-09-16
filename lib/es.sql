SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `es` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `es` ;

-- -----------------------------------------------------
-- Table `es`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(20) NULL,
  `endereco` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(2) NULL,
  `pais` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`projeto` (
  `idProjeto` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `integrantes` VARCHAR(45) NULL,
  `nome` VARCHAR(45) NULL,
  `descricao` VARCHAR(500) NULL,
  `problema` VARCHAR(300) NULL,
  `justificativa` VARCHAR(500) NULL,
  `objetivo` VARCHAR(500) NULL,
  `prazoIni` DATETIME NULL,
  `prazoFim` DATETIME NULL,
  `status` INT NULL,
  PRIMARY KEY (`idProjeto`),
  INDEX `fk_projeto_Pessoa1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_projeto_Pessoa1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`vitrine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`vitrine` (
  `idVitrine` INT NOT NULL AUTO_INCREMENT,
  `idProjeto` INT NOT NULL,
  PRIMARY KEY (`idVitrine`),
  INDEX `fk_vitrine_projeto_idx` (`idProjeto` ASC),
  CONSTRAINT `fk_vitrine_projeto`
    FOREIGN KEY (`idProjeto`)
    REFERENCES `es`.`projeto` (`idProjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`amizade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`amizade` (
  `idAmizade` INT NOT NULL AUTO_INCREMENT,
  `idUsuario1` INT NOT NULL,
  `idUsuario2` INT NOT NULL,
  PRIMARY KEY (`idAmizade`),
  INDEX `fk_amizade_Pessoa1_idx` (`idUsuario1` ASC),
  INDEX `fk_amizade_Pessoa2_idx` (`idUsuario2` ASC),
  CONSTRAINT `fk_amizade_Pessoa1`
    FOREIGN KEY (`idUsuario1`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_amizade_Pessoa2`
    FOREIGN KEY (`idUsuario2`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`post` (
  `idPost` INT NOT NULL AUTO_INCREMENT,
  `post` VARCHAR(705) NULL,
  `data` DATETIME NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idPost`),
  INDEX `fk_post_Pessoa1_idx` (`idUsuario` ASC),
  CONSTRAINT `fk_post_Pessoa1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `descricao` VARCHAR(500) NULL,
  `valor` FLOAT NULL,
  `status` BINARY NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`adm` (
  `idAdm` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(25) NULL,
  PRIMARY KEY (`idAdm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`estoque` (
  `idEstoque` INT NOT NULL,
  `data` DATETIME NULL,
  `idProjeto` INT NOT NULL,
  PRIMARY KEY (`idEstoque`),
  UNIQUE INDEX `idEstoque_UNIQUE` (`idEstoque` ASC),
  INDEX `fk_Estoque_projeto1_idx` (`idProjeto` ASC),
  CONSTRAINT `fk_Estoque_projeto1`
    FOREIGN KEY (`idProjeto`)
    REFERENCES `es`.`projeto` (`idProjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`mensagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`mensagens` (
  `idMensagens` INT NOT NULL,
  `mensagens` VARCHAR(500) NULL,
  `idUsuario1` INT NOT NULL,
  `idUsuario2` INT NOT NULL,
  PRIMARY KEY (`idMensagens`),
  UNIQUE INDEX `idMensagens_UNIQUE` (`idMensagens` ASC),
  INDEX `fk_Mensagens_Usuario1_idx` (`idUsuario1` ASC),
  INDEX `fk_Mensagens_Usuario2_idx` (`idUsuario2` ASC),
  CONSTRAINT `fk_Mensagens_Usuario1`
    FOREIGN KEY (`idUsuario1`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Mensagens_Usuario2`
    FOREIGN KEY (`idUsuario2`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `es`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `es`.`tipo` (
  `idtipo` INT NOT NULL AUTO_INCREMENT,
  `idealista` INT(1) NULL,
  `financeiro` INT(1) NULL,
  `papelada` INT(1) NULL,
  `desenvolve` INT(1) NULL,
  `idUsu` INT NOT NULL,
  PRIMARY KEY (`idtipo`),
  INDEX `fk_tipo_Usuario1_idx` (`idUsu` ASC),
  CONSTRAINT `fk_tipo_Usuario1`
    FOREIGN KEY (`idUsu`)
    REFERENCES `es`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
