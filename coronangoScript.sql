-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.34-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para coronango
DROP DATABASE IF EXISTS `coronango`;
CREATE DATABASE IF NOT EXISTS `coronango` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `coronango`;

-- Volcando estructura para tabla coronango.cabildo
DROP TABLE IF EXISTS `cabildo`;
CREATE TABLE IF NOT EXISTS `cabildo` (
  `Id_Integrante` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(600) DEFAULT NULL,
  `Cargo` varchar(350) DEFAULT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`Id_Integrante`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coronango.cabildo: ~10 rows (aproximadamente)
DELETE FROM `cabildo`;
/*!40000 ALTER TABLE `cabildo` DISABLE KEYS */;
INSERT INTO `cabildo` (`Id_Integrante`, `Nombre`, `Cargo`, `Descripcion`, `Imagen`) VALUES
	(1, 'C. MARIA DE LOS ANGELES PORTILLO SANDOVAL', 'SINDICO MUNICIPAL', NULL, '1.jpg'),
	(2, 'C. IRIS MABEL AMASTAL ALONSO', 'SECRETARIA GENERAL', NULL, '2.jpg'),
	(3, 'C. NAZARIA GARCIA GALINDO', 'REGIDORA DE PATRIMONIO Y HACIENDA PÚBLICA', NULL, '3.jpg'),
	(4, 'C. HUGO CHAPULI OJEDA', 'REGIDOR DE GOBERNACIÓN, JUSTICIA, SEGURIDAD PÚBLICA Y PROTECCIÓN CIVIL', NULL, '4.jpg'),
	(5, 'C. MIGUEL GUTIERREZ RAMOS', 'REGIDOR DE INSDUSTRIA, COMERCIO, AGRICULTURA Y GANADERIA', NULL, '5.jpg'),
	(6, 'C. JOSÉ MANUEL CUATE ROMERO', 'REGIDOR DE SALUBRIDAD Y ASISTENCIA PÚBLICA', NULL, '6.jpg'),
	(7, 'C. CATALINA LÓPEZ RODRIGUEZ', 'REGIDORA DE GRUPOS VULNERABLES, PERSONAS CON DISCAPACIDAD', NULL, '7.jpg'),
	(8, 'C. CLAUDIA PILAR HERNÁNDEZ TITLA', 'REGIDORA DE IGUALDAD DE GENERO', NULL, '8.jpg'),
	(9, 'C. ANGELINA TOXQUI AMASTAL', 'REGIDORA DE EDUCACIÓN PÚBLICA', NULL, '9.jpg'),
	(10, 'C. ROSALBA MACUIL JUAREZ', 'REGIDORA DE DESARROLLO URBANO, ECOLOGÍA, MEDIO AMBIENTE, OBRAS SERVICIOS PÚBLICOS Y TURISMO', NULL, '10.jpg');
/*!40000 ALTER TABLE `cabildo` ENABLE KEYS */;

-- Volcando estructura para tabla coronango.catalogo_areas_ts
DROP TABLE IF EXISTS `catalogo_areas_ts`;
CREATE TABLE IF NOT EXISTS `catalogo_areas_ts` (
  `Id_Area` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Area_TS` varchar(500) NOT NULL,
  PRIMARY KEY (`Id_Area`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coronango.catalogo_areas_ts: ~8 rows (aproximadamente)
DELETE FROM `catalogo_areas_ts`;
/*!40000 ALTER TABLE `catalogo_areas_ts` DISABLE KEYS */;
INSERT INTO `catalogo_areas_ts` (`Id_Area`, `Area_TS`) VALUES
	(2, 'Dirección de Agua Potable y Alcantarillado Sanitario'),
	(3, 'Dirección de Bienestar y Agricultura'),
	(4, 'Dirección de Catastro'),
	(5, 'Dirección de Desarrollo Económico'),
	(6, 'Dirección de Educación, Cultura, Turismo y Tradiciones'),
	(7, 'Dirección de Gobernación Municipal'),
	(8, 'Dirección de Obra Publica y Desarrollo Urbano');
/*!40000 ALTER TABLE `catalogo_areas_ts` ENABLE KEYS */;

-- Volcando estructura para tabla coronango.tramites_servicios
DROP TABLE IF EXISTS `tramites_servicios`;
CREATE TABLE IF NOT EXISTS `tramites_servicios` (
  `Id_TS` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Id_Area` int(11) unsigned DEFAULT NULL,
  `Tipo` bit(1) NOT NULL DEFAULT b'0' COMMENT '0 tramite 1 servicio',
  `Nombre_TS` varchar(500) NOT NULL,
  PRIMARY KEY (`Id_TS`),
  KEY `Id_TS_FK_Tramites` (`Id_Area`),
  CONSTRAINT `Id_TS_FK_Tramites` FOREIGN KEY (`Id_Area`) REFERENCES `catalogo_areas_ts` (`Id_Area`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COMMENT='Se trata de todos los valores que tiene cada apartado de los trámites y servicios';

-- Volcando datos para la tabla coronango.tramites_servicios: ~76 rows (aproximadamente)
DELETE FROM `tramites_servicios`;
/*!40000 ALTER TABLE `tramites_servicios` DISABLE KEYS */;
INSERT INTO `tramites_servicios` (`Id_TS`, `Id_Area`, `Tipo`, `Nombre_TS`) VALUES
	(1, 2, b'1', 'Conexión a la red de drenaje PDF'),
	(2, 2, b'1', 'Servicio desazolve PDF'),
	(3, 2, b'1', 'Suministro aguapotable drenaje y saneamiento PDF'),
	(4, 2, b'0', 'CAMBIO DE PROPIETARIO PDF'),
	(5, 2, b'0', 'CONSTANCIA DE NO ADEUDO DE LOS SERVICIOS DE AGUA POTABLE PDF'),
	(6, 2, b'0', 'CONSTANCIA DE NO SERVICIO DE AGUA POTABLE PDF'),
	(7, 2, b'0', 'CONTRATO DE PRESTACIÓN DE SERVICIO DE SUMINISTRO DE AGUA POTABLE Y DRENAJE SANITARIO PDF'),
	(8, 2, b'0', 'FACTIBILIDAD USO COMERCIAL E INDUSTRIAL. PDF'),
	(9, 3, b'1', 'Programa de maquinaria agricola barbecho PDF'),
	(10, 3, b'1', 'Programa de maquinaria agricola surcado PDF'),
	(11, 3, b'1', 'Programa de maquinaria agricola PDF'),
	(12, 3, b'1', 'Programa de maquinaria rastra PDF'),
	(13, 3, b'0', 'Cancelación de Fierro quemador o marcador de ganado PDF'),
	(14, 3, b'0', 'Refrendo de Fierro quemador o marcador de ganado PDF'),
	(15, 3, b'0', 'Registro de Fierro quemador o marcador de ganado PDF'),
	(16, 4, b'1', 'Asignación de cuenta predial PDF'),
	(17, 4, b'1', 'Cuantificación impuesto sobre la adquisición de bienes inmuebles ISABIo PDF'),
	(18, 4, b'1', 'Estado de cuenta para pago de predial y limpia PDF'),
	(19, 4, b'1', 'Inspección ocular PDF'),
	(20, 4, b'1', 'Reimpresión de avaluo PDF'),
	(21, 4, b'0', 'Avalúo Catastral para Actualización Catastral PDF'),
	(22, 4, b'0', 'Avalúo Catastral para Alta o Empadronamiento PDF'),
	(23, 4, b'0', 'Baja del padrón municipal PDF'),
	(24, 4, b'0', 'Constancia de no Adeudo Predial - Limpia PDF'),
	(25, 4, b'0', 'Declaración de Lotificación o relotificación de terrenos PDFsd'),
	(26, 4, b'0', 'Elaboración y expedición de avalúo catastral PDF'),
	(27, 4, b'0', 'Expedición de clave catastral PDF'),
	(28, 4, b'0', 'Fusión de predios PDF'),
	(29, 4, b'0', 'Inscripción de predios destinados para fraccionamientos, conjunto habitacional, comercial o industrial PDF'),
	(30, 4, b'0', 'Presentación de declaración de erección PDF'),
	(31, 4, b'0', 'Rectificación de medidas y colindancias PDF'),
	(32, 4, b'0', 'Registro de cada local comercial o departamento encondominio, horizontal o vertical PDF'),
	(33, 4, b'0', 'Registro del régimen de propiedad en condominio, por cada edificio PDF'),
	(34, 4, b'0', 'Solicitud de inscripción al padrón municipal PDF'),
	(35, 4, b'0', 'Tramitación de operaciones notariales en formato V.P.F.001 o V.P.F. 002 PDF'),
	(36, 5, b'1', 'Capacitaciones gratuitas PDF'),
	(37, 5, b'1', 'Feria del Empleo Virtual PDF'),
	(38, 5, b'1', 'Juntos Otra Vez. PDF'),
	(39, 5, b'1', 'Migrante Emprende PDF'),
	(40, 5, b'1', 'Programa Start-Up Migrante PDF'),
	(41, 5, b'1', 'Programa Sustento Temporal PDF'),
	(42, 5, b'1', 'SARE PDF'),
	(43, 5, b'1', 'Ventanilla Únicae PDF'),
	(44, 5, b'0', 'Convenio para regularizar a las empresas PDF'),
	(45, 6, b'1', 'Credencialización de biblioteca PDF'),
	(46, 6, b'1', 'Feria del Prestamo de libros PDF'),
	(47, 6, b'0', 'TRAMITE credencializacion de biblioteca PDF'),
	(48, 6, b'0', 'TRAMITE prestamo libro PDF'),
	(49, 7, b'1', 'PERMISO PARA CIERRE DE CALLE PDF'),
	(50, 7, b'1', 'PETICION CIUDADANA PDF'),
	(51, 7, b'1', 'REPORTE CIUDADANO PDF'),
	(52, 8, b'1', 'SERVICIOS PUBLICOS Instalación de luminarias nuevas PDF'),
	(53, 8, b'1', 'SERVICIOS PUBLICOS Parques y Jardines PDF'),
	(54, 8, b'1', 'SERVICIOS PUBLICOS Quejas sobre el servicio de recolección de residuos PDF'),
	(55, 8, b'1', 'SERVICIOS PUBLICOS Recolección de residuos Solidos 2020 PDF'),
	(56, 8, b'1', 'SERVICIOS PUBLICOS Reparación de luminarias PDF'),
	(57, 8, b'0', 'Alineamiento y Numero Oficial PDF'),
	(58, 8, b'0', 'Constancia de Preexistencia de Construccion PDF'),
	(59, 8, b'0', 'Constancia de Terminacion de Obra PDF'),
	(60, 8, b'0', 'Dictamen de Espectacular PDF'),
	(61, 8, b'0', 'Licencia de Ampliación y-o Remodelación mayor a 50 metros PDF'),
	(62, 8, b'0', 'Licencia de Construccion de Barda Perimetral PDF'),
	(63, 8, b'0', 'Licencia de Construccion de Cisterna PDF'),
	(64, 8, b'0', 'Licencia de Construccion de Obra Menor PDF'),
	(65, 8, b'0', 'Licencia de Construccion PDF'),
	(66, 8, b'0', 'Licencia de Lotificacion PDF'),
	(67, 8, b'0', 'Licencia de Segregacion,subdivision o fusion de predios PDF'),
	(68, 8, b'0', 'Municipalizacion de Fraccionamientos PDF'),
	(69, 8, b'0', 'Permiso de Demolicion PDF'),
	(70, 8, b'0', 'Permiso de Ruptura de Banquetas y-o Pavimento PDF'),
	(71, 8, b'0', 'Prefactibilidad PDF'),
	(72, 8, b'0', 'Prorroga de Licencia de Construccion PDF'),
	(73, 8, b'0', 'Registro de DRO PDF'),
	(74, 8, b'0', 'Terminacion de Obra de Urbanizacion para fraccionamientos PDF'),
	(75, 8, b'0', 'Uso de Suelo Especifico PDF'),
	(76, 8, b'0', 'Uso de Suelo Habitacional PDF');
/*!40000 ALTER TABLE `tramites_servicios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
