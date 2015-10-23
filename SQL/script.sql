-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cedsa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cedsa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cedsa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `cedsa` ;

-- -----------------------------------------------------
-- Table `cedsa`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`articulos` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `clave` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  `no_serie` VARCHAR(45) NOT NULL COMMENT '',
  `marca` VARCHAR(45) NOT NULL COMMENT '',
  `precio` DECIMAL(2) NOT NULL COMMENT '',
  `fotografia` VARCHAR(200) NULL COMMENT '',
  PRIMARY KEY (`id_articulo`)  COMMENT '',
  UNIQUE INDEX `clave_UNIQUE` (`clave` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`tecnicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`tecnicos` (
  `id_tecnico` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `paterno` VARCHAR(45) NOT NULL COMMENT '',
  `materno` VARCHAR(45) NOT NULL COMMENT '',
  `fecha_nacimiento` DATE NOT NULL COMMENT '',
  `fecha_ingreso` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id_tecnico`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`clientes` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `razonSocial` VARCHAR(100) NOT NULL COMMENT '',
  `rfc` VARCHAR(20) NOT NULL COMMENT '',
  `calle` VARCHAR(45) NOT NULL COMMENT '',
  `no_exterior` VARCHAR(45) NOT NULL COMMENT '',
  `colonia` VARCHAR(45) NOT NULL COMMENT '',
  `ciudad` VARCHAR(45) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NOT NULL COMMENT '',
  `tel_oficina` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `user` VARCHAR(45) NOT NULL COMMENT '',
  `pass` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_cliente`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`administradores` (
  `id_administrador` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `paterno` VARCHAR(45) NOT NULL COMMENT '',
  `materno` VARCHAR(45) NOT NULL COMMENT '',
  `fecha_nacimiento` DATE NOT NULL COMMENT '',
  `correo` VARCHAR(45) NOT NULL COMMENT '',
  `user` VARCHAR(45) NOT NULL COMMENT '',
  `pass` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_administrador`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`ordenesMaestro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`ordenesMaestro` (
  `id_orden` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha_orden` VARCHAR(45) NULL COMMENT '',
  `total` VARCHAR(45) NULL COMMENT '',
  `id_clitec` INT NULL COMMENT '',
  `status` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_orden`)  COMMENT '',
  INDEX `id_cliente_idx` (`id_clitec` ASC)  COMMENT '',
  CONSTRAINT `id_cliente`
    FOREIGN KEY (`id_clitec`)
    REFERENCES `cedsa`.`clientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_tecnico`
    FOREIGN KEY (`id_clitec`)
    REFERENCES `cedsa`.`tecnicos` (`id_tecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`almacenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`almacenes` (
  `id_almacen` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `clave` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  `no_consecutivo` INT NOT NULL COMMENT '',
  `fecha_alta` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id_almacen`)  COMMENT '',
  UNIQUE INDEX `clave_UNIQUE` (`clave` ASC)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`articulosAlmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`articulosAlmacen` (
  `id_artalm` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_almacen` INT NOT NULL COMMENT '',
  `id_articulo` INT NOT NULL COMMENT '',
  `existencia` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id_artalm`)  COMMENT '',
  INDEX `id_articulo_idx` (`id_articulo` ASC)  COMMENT '',
  INDEX `id_almacen_idx` (`id_almacen` ASC)  COMMENT '',
  CONSTRAINT `id_articulo`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `cedsa`.`articulos` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_almacen`
    FOREIGN KEY (`id_almacen`)
    REFERENCES `cedsa`.`almacenes` (`id_almacen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`ordenesDetalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`ordenesDetalle` (
  `id_detalle` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_orden` INT NULL COMMENT '',
  `id_artalm` INT NULL COMMENT '',
  `cantidad` INT NULL COMMENT '',
  PRIMARY KEY (`id_detalle`)  COMMENT '',
  INDEX `id_artalm_idx` (`id_artalm` ASC)  COMMENT '',
  INDEX `id_orden_idx` (`id_orden` ASC)  COMMENT '',
  CONSTRAINT `id_artalm`
    FOREIGN KEY (`id_artalm`)
    REFERENCES `cedsa`.`articulosAlmacen` (`id_artalm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_orden`
    FOREIGN KEY (`id_orden`)
    REFERENCES `cedsa`.`ordenesMaestro` (`id_orden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`garantias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`garantias` (
  `id_garantia` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_cliente` INT NOT NULL COMMENT '',
  `id_tecnico` INT NOT NULL COMMENT '',
  `fecha_instalacion` VARCHAR(45) NOT NULL COMMENT '',
  `observaciones` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_garantia`)  COMMENT '',
  INDEX `id_cliente_idx` (`id_cliente` ASC)  COMMENT '',
  INDEX `id_tecnico_idx` (`id_tecnico` ASC)  COMMENT '',
  CONSTRAINT `id_cliente2`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cedsa`.`clientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_tecnico2`
    FOREIGN KEY (`id_tecnico`)
    REFERENCES `cedsa`.`tecnicos` (`id_tecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`celulas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`celulas` (
  `id_celula` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_articulo` INT NOT NULL COMMENT '',
  `calle` VARCHAR(45) NOT NULL COMMENT '',
  `no_exterior` VARCHAR(45) NOT NULL COMMENT '',
  `colonia` VARCHAR(45) NOT NULL COMMENT '',
  `ciudad` VARCHAR(45) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NOT NULL COMMENT '',
  `status` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_celula`)  COMMENT '',
  INDEX `id_articulo_idx` (`id_articulo` ASC)  COMMENT '',
  CONSTRAINT `id_articulo3`
    FOREIGN KEY (`id_articulo`)
    REFERENCES `cedsa`.`articulos` (`id_articulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedsa`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedsa`.`empresas` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `razon_social` VARCHAR(45) NOT NULL COMMENT '',
  `rfc` VARCHAR(45) NOT NULL COMMENT '',
  `calle` VARCHAR(45) NOT NULL COMMENT '',
  `no_exterior` VARCHAR(45) NOT NULL COMMENT '',
  `colonia` VARCHAR(45) NOT NULL COMMENT '',
  `ciudad` VARCHAR(45) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NOT NULL COMMENT '',
  `tel_oficina` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `consecutivo_maestro` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id_empresa`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
