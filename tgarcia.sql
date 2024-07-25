-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2024 a las 08:25:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tgarcia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `id_especifico` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `tarifario` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `precio` float(11,2) NOT NULL,
  `num_bultos` int(11) NOT NULL,
  `km_adicionales` float(11,2) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comentarios` varchar(255) DEFAULT NULL,
  `ultimaModificacion` varchar(255) DEFAULT NULL,
  `status` bit(11) NOT NULL DEFAULT b'1',
  `usuario_registro` varchar(255) NOT NULL,
  `contador_modificaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `id_especifico`, `cliente`, `tarifario`, `origen`, `codigo_postal`, `peso`, `dimension`, `precio`, `num_bultos`, `km_adicionales`, `fecha_creacion`, `comentarios`, `ultimaModificacion`, `status`, `usuario_registro`, `contador_modificaciones`) VALUES
(1, 'C-1', 'pedritoas', '1', 'CDMX - VENUSTIANO CARRANZA - BAJA CALIFORNIA - LOS CABOS', '57850', '50', 'Nissan16', 113203.29, 0, 0.00, '2024-07-17 05:24:52', NULL, '', b'00000000001', '', 1),
(2, 'C-2', 'Michell', '3', 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', '57850', '10', '1.5 Ton Refrigerada', 4500.00, 0, 100.00, '2024-07-17 06:14:38', NULL, '', b'00000000001', '', 2),
(3, 'C-3', 'Michell', '2', 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', '57850', '50', 'Rabon', 11006.00, 15, 500.00, '2024-07-17 05:24:54', NULL, '', b'00000000000', '', 1),
(4, 'C-4', 'Fernando', '2', 'ADUANA AICM - MONTERREY', '57850', '10', '3.5 Ton', 32050.00, 15, 350.00, '2024-07-17 05:24:55', NULL, NULL, b'00000000000', '', 1),
(5, 'C-5', 'pedritoas', '2', 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', '57850', '50', '3.5 Ton', 4500.00, 15, 0.00, '2024-07-17 05:25:00', NULL, NULL, b'00000000000', '', 1),
(6, 'C-6', 'Fernando', '2', 'ADUANA AICM - QUERETARO', '57850', '10', '3.5 Ton', 9300.00, 15, 0.00, '2024-07-17 05:29:37', NULL, NULL, b'00000000000', 'Michell Palestina Barrios', 3),
(7, 'C-7', 'Dalia', '2', 'ADUANA AICM - AGUASCALIENTES', '57850', '10', 'Rabon', 25800.00, 15, 0.00, '2024-07-17 05:57:08', NULL, NULL, b'00000000000', 'Michell Palestina Barrios', 3),
(8, 'C-8', 'Cliente prueba', '1', 'CDMX - VENUSTIANO CARRANZA - AGUASCALIENTES - AGUASCALIENTES', '57850', '10', '3.517', 20805.00, 15, 0.00, '2024-07-25 06:14:27', NULL, NULL, b'00000000001', 'Michell Palestina Barrios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `Id` int(11) NOT NULL,
  `Nombre_completo` varchar(255) NOT NULL,
  `Nacionalidad` varchar(255) NOT NULL,
  `Edad` varchar(25) NOT NULL,
  `Sexo` varchar(25) NOT NULL,
  `EstadoCivil` varchar(255) NOT NULL,
  `Licencia` varchar(255) NOT NULL,
  `Vigencia` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Celular` varchar(255) NOT NULL,
  `Curp` varchar(255) NOT NULL,
  `Rfc` varchar(255) NOT NULL,
  `Domicilio_actual` varchar(255) NOT NULL,
  `Domicilio_constancia` varchar(255) NOT NULL,
  `Delegacion` varchar(255) NOT NULL,
  `CP` varchar(25) NOT NULL,
  `TipoTrabajador` varchar(255) NOT NULL,
  `Fecha_ingreso` varchar(255) NOT NULL,
  `Puesto` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `LugardeTrabajo` varchar(255) NOT NULL,
  `DuraciondelaJornada` varchar(255) NOT NULL,
  `Forma_pago` varchar(255) NOT NULL,
  `DiasPago` varchar(255) NOT NULL,
  `DiasDescanso` varchar(255) NOT NULL,
  `Beneficiarios` varchar(255) NOT NULL,
  `NSS` varchar(255) NOT NULL,
  `FechaNacimiento` varchar(255) NOT NULL,
  `Activo` bit(11) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`Id`, `Nombre_completo`, `Nacionalidad`, `Edad`, `Sexo`, `EstadoCivil`, `Licencia`, `Vigencia`, `Tipo`, `Celular`, `Curp`, `Rfc`, `Domicilio_actual`, `Domicilio_constancia`, `Delegacion`, `CP`, `TipoTrabajador`, `Fecha_ingreso`, `Puesto`, `Descripcion`, `LugardeTrabajo`, `DuraciondelaJornada`, `Forma_pago`, `DiasPago`, `DiasDescanso`, `Beneficiarios`, `NSS`, `FechaNacimiento`, `Activo`) VALUES
(1, 'RODRIGUEZ CEDILLO YASARETH DEL CARMEN', 'MEXICANA', '26', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '5543255116', 'ROCY980402MDFDDS01', 'ROCY980402BE2', 'C. PUEBLA 18 COL. PEÑON DE LOS BAÑOS', 'C. PUEBLA 18 COL. PEÑON DE LOS BAÑOS', 'VENUSTIANO CARRANZA, CDMX', '15520', 'DE PLANTA', '', 'JEFATURA OPERACIONES', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '20139804445', '02/04/1998', b'00000000001'),
(2, 'MEJIA ZUÑIGA LUCIA GUADALUPE', 'MEXICANA', '42', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '5614195158', 'MEZL821213MDFJXC02', 'MEZL8212134P6', 'RIO SANTA MARIA EDIF 99 DPTO 404, UNIDAD ARBOLILLO 1', 'RIO SANTA MARIA NO 99, INT 404, EL ARBOLILLO 1', 'GUSTAVO A. MADERO, CDMX', '07269', 'DE PLANTA', '', 'ANALISTA DE FACTURACION', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '01038209860', '13/12/1982', b'00000000001'),
(3, 'GONZALEZ VELAZQUEZ LEONEL', 'MEXICANO', '43', 'M', 'UNION LIBRE', 'DF001162913', '24/05/2027', 'B', '5548965305', 'GOVL810625HDFNLN09', 'GOVL810625A67', 'C GUADALUPE BORJA MZA 2 LT 4 COL. LOMAS DE ZARAGOZA', 'C. RINCONADA SN. IGNACIO, S/N MZ. 108, LT.14, C.P.09620', 'IZTAPALAPA, CDMX', '09620', 'DE PLANTA', '', 'OPERADOR TRAILER', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'ANDREA SUJEIDI CORONADO RAMOS/SARA NAHOMI GONZALEZ LUCAS', '45988120023', '25/06/1981', b'00000000001'),
(4, 'PALESTINA CORDOVA JUAN CARLOS', 'MEXICANO', '42', 'M', 'CASADO', 'DF001162914', '23/05/2027', 'B', '5622027642', 'PACJ821104HDFLRN05', 'PACJ821104CH1', 'C CANELOS 185, COL. LA PERLA', 'AV. CENTENARIO 1960 INT. 6, ATZACOALCO, CP 07349', 'NEZAHUACOYOTL, EDOMEX', '57820', 'DE PLANTA', '', 'COORDINADOR', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'VANESA MARICRUZ GARCIA CORTES/CARLOS YAEL PALESTINA GARCIA', '96978222683', '04/11/1982', b'00000000001'),
(5, 'BAUTISTA QUINTANA ALVARO', 'MEXICANO', '51', 'M', 'UNION LIBRE', 'DF001144006', '02/06/2026', 'B', '5562272636', 'BAQA730608HMCTNL08', 'BAQA730608T91', 'C PALACIO DE ITURBIDE 431, COL. EVOLUCIÓN', 'MZ. 47,  INT 18, LT. 489 A, IZTAPALAPA, CP: 09310', 'NEZAHUALCOYOTL, EDOMEX', '57700', 'DE PLANTA', '', 'OPERADOR TORTON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'VERONICA RODRIGUEZ CASTELLANOS/ALVARO ISAAC BAUTISTA RODRIGUEZ', '20907306318', '08/06/1973', b'00000000001'),
(6, 'MARTINEZ BARRERA ALEJANDRO', 'MEXICANO', '54', 'M', 'CASADO', 'DF00164816', '10/08/2025', 'B', '5568006830', 'MABA700411HDFRRL05', 'MABA700411L22', 'C RIO GRANDE MZA 4, LT 13 D 9, U HAB LAS FUENTES ', 'AV TIJUANA 8, COL. OTAY FOVISSSTE, BAJA CALIFORNIA,  CP: 22510', 'ECATEPEC MORELOS. EDOMEX', '55400', 'DE PLANTA', '', 'OPERADOR RABON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'LETICIA GONZALEZ RIVAS', '94877005309', '11/04/1970', b'00000000001'),
(7, 'MARQUEZ YAÑEZ LEONARDO', 'MEXICANO', '27', 'M', 'CASADO', 'DF001167258', '05/09/2027', 'B', '5611960664', 'MAYL971030HMCRXN03', 'MAYL971030AK2', 'C ORIENTE 42 MZ 53 LT 16, COL. PROVIDENCIA', 'C ORIENTE 42 MZ 53 LT 16, COL. PROVIDENCIA', 'VALLE CHAL. SOLD. EDOMEX', '56616', 'DE PLANTA', '', 'OPERADOR TRAILER', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'FABIOLA FLORES ROMERO', '8189704466', '30/10/1997', b'00000000001'),
(8, 'ALVAREZ MEJIA OMAR JOVANI', 'MEXICANO', '20', 'M', 'UNION LIBRE', 'LFD00981365', '13/06/2026', 'B', '5539796373', 'AAMO040420HDFLJMA3', 'AAMO040420MY2', 'SAN ALFONSO MZA 65 LT 7, NUEVA SAN ISIDRO', 'SAN ALFONSO MZA 65 LT 7, NUEVA SAN ISIDRO', 'CHALCO, EDOMEX', '56605', 'DE PLANTA', '', 'OPERADOR 3 1/2', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'DANIELA ZARETH MENDEZ REYES', '17220492478', '20/04/2004', b'00000000001'),
(9, 'ZARAGOZA APARICIO CESAR', 'MEXICANO', '25', 'M', 'UNION LIBRE', 'LFD00991872', '13/07/2026', 'B', '5580036515', 'ZAAC990613HOCRPS02', 'ZAAC9906134X7', '1RA CDA DE SAN CRISTOBAL MZA 54 LT 5,  EMILIANO ZAPATA', '1RA CDA DE SAN CRISTOBAL MZA 54 LT 5,  EMILIANO ZAPATA', 'CHALCO, EDOMEX', '56608', 'DE PLANTA', '', 'OPERADOR RABON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '55169929761', '13/06/1999', b'00000000001'),
(10, 'VAZQUEZ VERA DAVID ETREUS', 'MEXICANO', '44', 'M', 'CASADO', 'LFD00014010', '23/07/2025', 'B', '5532021947', 'VAVD800818HDFZRV00', 'VAVD800818QM9', 'WENCESLAO V SOTO MZ 1 LT 15, MARIEL HUERTA ZAMACONA', 'AHORRO POSTAL 79, COL. BENITO JUAREZ, CP: 03410', 'IZTAPALAPA, CDMX', '09230', 'DE PLANTA', '', 'OPERADOR NISSAN', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '37978005090', '18/08/1980', b'00000000001'),
(11, 'LOPEZ GAYTAN ELIAS', 'MEXICANO', '38', 'M', 'CASADO', 'LFD00992659', '13/06/2026', 'B', '5580933177', 'LOGE860113HOCPYL07', 'LOGE860113134', 'PT 13 MZA 50 LTE 18, COL. SAN MIGUEL XICO 3RA SECCIÓN', 'PT 13 MZA 50 LTE 18, COL. SAN MIGUEL XICO 3RA SECCIÓN', 'VALLE DE CHALCO, EDOMEX', '56613', 'DE PLANTA', '', 'GERENTE ADMINISTRATIVO', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '07078603367', '13/01/1986', b'00000000001'),
(12, 'MARTINEZ CRUZ ABRAHAM', 'MEXICANO', '21', 'M', 'SOLTERO', 'LFD01071576', '21/04/2027', 'B', '5620370903', 'MACA030319HDFRRBA7', 'MACA0303192A1', 'CANARIAS 2A, MZ 14 LT 15, BOSQUES DE IBIZA, TIZAYUCA', 'CANARIAS 2A, MZ 14 LT 15, TIZAYUCA, HIDALGO, C.P: 43815', 'TIZAYUCA, HIDALGO', '43815', 'DE PLANTA', '', 'OPERADOR 3 1/2', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'MONICA CRUZ HERNANDEZ', '18180336036', '19/03/2003', b'00000000001'),
(13, 'GONZALEZ CRUZ CRISTOBAL', 'MEXICANO', '49', 'M', 'CASADO', 'TLAX009755', '', '', '5527520049', 'GOCC750305HPLNRR09', 'GOCC750305QF2', 'PRIVADA 5 MZ 12 LT 24, COL: ALCANFORES', 'PRIVADA 5 MZ 12 LT 24, COL: ALCANFORES', 'CHALCO, EDOMEX', '56606', 'DE PLANTA', '', 'OPERADOR TORTON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '20957512344', '05/03/1975', b'00000000001'),
(14, 'GARCIA NIETO MARTIN', 'MEXICANO', '43', 'M', 'SOLTERO', 'DF001165311', '24/06/2023', 'B', '52731073275', 'GANM810328HVZRTR04', 'GANM810328854', 'SIN NOMBRE S/N, COL LA CANDELARIA, TLAPALA', 'MELCHOR OCAMPO 2, CENTRO, COSCOMATEPEC, CP: 94140', 'CHALCO, EDOMEX', '56641', 'DE PLANTA', '', 'OPERADOR TORTON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '39988125223', '28/03/1981', b'00000000001'),
(15, 'ALVA IBARRA VICTOR MANUEL', 'MEXICANO', '59', 'M', 'CASADO', 'LFD01112480', '11/12/2027', 'B', '5549951314', 'AAIV650616HDFLBC01', 'AAIV650616Q12', 'AV. JARDIN 26, ALTOS, COL: TLATILCO ', 'CZDA TLATILCO 112 Y 116, AZCAPOTZALCO, CP: 02860', 'AZCAPOTZALCO, CDMX', '02860', 'DE PLANTA', '', 'OPERADOR TORTON', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '1856501927', '16/06/1965', b'00000000001'),
(16, 'GARCIA LOPEZ FABIAN GAEL', 'MEXICANO', '13', 'M', 'SOLTERO', '530000154288', '31/08/2027', 'E', '5571579982', 'GALF050709HMCRPBA9', 'GALF0507099K8', 'CDA. De Atenco y Revolucion Maza 472 Col: Miravalles ', 'ATENCO CN, MZ 472 LT 16, MIRAVALLES, IZTAPALAPA, 09696', 'IZTAPALAPA, CDMX', '09696', '', '', 'OPERADOR ', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '10240536382', '09/07/2005', b'00000000001'),
(17, 'AVILA CASTILLO DANIEL ', 'MEXICANO', '36', 'M', 'SOLTERO', 'DF001139130', '07/02/2027', 'B', '', 'AICD880205HDFVSN02', 'AICD880205MA7', 'C. EJE 4 MZ 12 LT 2, AMPLIACIÓN CD LAGO', 'AV DE LA INDUSTRIA 64, MOCTEZUMA 2DA SECC, VENUSTIANO CARRANZA, 15530', 'NEZAHUALCOYOTL, EDOMEX', '57185', '', '', 'OPERADOR ', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '20068809993', '05/02/1988', b'00000000001'),
(18, 'RAMÍREZ CRUZ OMAR', 'MEXICANO', '34', 'M', 'CASADO', 'DF001164132', '07/06/2027', 'B', '', 'RACO901023HMCMRM04', 'RACO901023PG3', 'CDA 5 DE MAYO MZA 146 LT 13, SAN MIGUEL TEOTONGO ', 'REPUBLICA PTE 2855, RECURSOS HIDRAULICOS, CULIACAN, CP: 80105', 'IZTAPALAPA, CDMX', '09630', '', '', 'OPERADOR ', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '45089054642', '23/10/1990', b'00000000001'),
(19, 'SANCHEZ PEREZ MARIA MONTSERRAT', 'MEXICANA', '34', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '', 'SAPM900515MDFNRN03', 'SAPM900515GD8', 'C NORTE 182, NO 666, INT 6, COL: PENSADOR MEXICANO', 'PT 146 NO 730, COL: INDUSTRIAL VALLEJO, AZCAPOTZALCO, CP: 02300', 'VENUSTIANO CARRANZA, CDMX', '15520', '', '', 'EJECUTIVO DE OPERACIONES', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '20079003529', '15/05/1990', b'00000000001'),
(20, 'CIFUENTES LEGORRETA MARIA DE LOURDES', 'MEXICANA', '51', 'F', 'UNION LIBRE', 'N/A', 'N/A', 'N/A', '', 'CILL730809MDFFGR01', 'CILL7308092L2', 'CDA VIOLETA LT 28, COL LA PALMA', 'TLATENCO NO 7, COL. SANTA CATARINA, AZCAPOTZALCO, CP: 02250', 'CHIMALHUACAN, EDOMEX', '56338', '', '', 'MONITORISTA', '', 'HOME OFFICE', '', 'TRANSFERENCIA', 'SABADO', '', '', '90907135900', '09/08/1973', b'00000000001'),
(21, 'RAMÍREZ PATIÑO VERONICA', 'MEXICANA', '24', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '', 'RAPV000531MVZMTRA6', 'RAPV000531J10', 'CD ZARAGOZA, S/N MZ 1, LT 44, SANTA ROSA', 'CD ZARAGOZA, S/N MZ 1, LT 44, SANTA ROSA', 'CHICOLOAPAN, EDOMEX', '56376', 'DE PLANTA', '', 'EJECUTIVA DE OPERACIÓN ', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '12160064940', '31/05/2000', b'00000000001'),
(22, 'SOTO QUINTANAR ANGEL EDUARDO', 'MEXICANO', '19', 'M', 'SOLTERO', 'LFD01140116', '08/05/2028', 'B', '', 'SOQA051106HDFTNNA1', 'SOQA051106GP3', 'SAN AGUSTIN BUENAVISTA S/N, 54284', 'SAN AGUSTIN BUENAVISTA S/N, 54284', 'SOYANIQUILPAN DE JUAREZ, EDOMEX', '54284', '', '', 'OPERADOR', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '06/11/2005', b'00000000001'),
(23, 'ANGELES ALARCON SHAYDA ESTHER', 'MEXICANA', '27', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '', 'AEAS970812MMCNLH02', 'AEAS970812227', 'AV.595 104, SAN JUAN DE ARAGÓN, G.A. M', 'AV.595 104, SAN JUAN DE ARAGÓN, G.A. M', 'GUSTAVO A. MADERO, CDMX', '07970', '', '', 'AUX. ADMINISTRATIVO', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'SABADO', '', '', '60159793664', '12/08/1997', b'00000000001'),
(24, 'SCHIAFFINO GOMEZ HECTOR AGUSTIN', 'MEXICANO', '29', 'M', 'CASADO', '60000604247', '18/10/2024', 'E', '5576458848', 'SIGH700805HD8', 'SIGH700805HD8', 'C. MIGUEL M. ARRIOJA  #10, CONST. DE LA REPUBLICA ', '', 'gustavo a madero, cdmx', '07469', 'DE PLANTA', '', 'OPERADOR', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '20047001084', '05/08/1970', b'00000000000'),
(25, 'CAMARENA OTERO ALFREDO', 'MEXICANO', '124', 'M', 'UNION LIBRE', 'DF001142976', '26/05/2026', 'B', '5632935347', 'CAOA950930HDFMTL04', 'CAOA950930CC1', 'IZCALLI MZ41 LT2, Col. Mexico nuevo', '', 'Ecatepec morelos.mex ', '55066', 'DE PLANTA', '', 'OPERADOR ', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '94139542081', '30/09/1995', b'00000000000'),
(26, 'GARCIA NIETO JOSE ANTONIO', '', '124', '', '', 'DF00128942', '10/08/2020', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(27, 'LOPEZ RAFAEL JOEL ARTURO', '', '29', '', '', '70000392707', '18/02/2024', 'E', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(28, 'CASAS MARISCAL ALAN FRANCISCO', '', '40', '', '', 'LFD00072599', '09/02/2026', 'B', '', 'CAMA950910HDFSRL05', 'CAMA950910FR3', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '44149503060', '10/09/1995', b'00000000000'),
(29, 'CABRERA VAZQUEZ ARTURO', '', '50', '', '', 'DF00153966', '19/11/2025', 'B', '', 'CAVA840311HDFBZR06', 'CAVA840311LR1', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '94048421963', '11/03/1984', b'00000000000'),
(30, 'HERNANDEZ TRUJILLO JUAN MANUEL', '', '124', '', '', 'DF001155185', '28/02/2027', 'B', '', 'HETJ741018HOCRRN11', 'HETJ741018TUA', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '20047400336', '18/10/1974', b'00000000000'),
(31, 'AVILA CASTILLO DANIEL', '', '124', '', '', 'DF001139130', '07/02/2027', 'B', '5519301219', 'AICD880205HDFVSN02', 'AICD880205MA7', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '20068809993', '', b'00000000000'),
(32, 'AYALA NAMBO ANGEL', '', '29', '', '', 'LFD00107422', '23/05/2026', 'B', '5621302873', 'AANA001114HMCYMNA9', 'AANA001114PS8', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '0.07160027434', '', b'00000000000'),
(33, 'MELCHOR MENDOZA NERY JOSUE', '', '50', '', '', 'LFD01038115', '03/07/2025', 'C', '', 'MEMN951125HDFLNR02', 'MEMN951125N82', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '19149571556', '25/11/1995', b'00000000000'),
(34, 'REYES ESPINOSA FELIPE', '', '26', '', '', 'DF00181106', '28/03/2023', 'B', '', 'REEF740824HDFYSL04', 'REEF740824CC2', 'cto real de catorce mza 12 lte 16 unidad habitacional real de costitlan 1', '', 'chicoloapan, Mex', '56386', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '45907441765', '24/08/1974', b'00000000000'),
(35, 'SANDOVAL LOPEZ EMILIO DAVID', '', '29', '', '', '70000475287', '04/04/2025', 'E', '5541020356', 'SALE980605HMCNPM04', 'SALE980605BI6', 'felipe angeles mza 44 lte 5 col. Emiliano zapata', '', 'chalco, Mex', '56608', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '98139800555', '05/06/1998', b'00000000000'),
(36, 'MONROY GONZALEZ ANGEL ABRAHAM', '', '30', '', '', 'LFD00089248', '28/03/2026', 'B', '', 'MOGA950411HDFNNN06', 'MOGA9504118B5', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '44149518548', '11/04/1995', b'00000000000'),
(37, 'PEREZ RAMIREZ RAYMUNDO', '', '26', '', '', 'DF001165688', '', 'B', '', 'PERR940615HDFRMY07', 'PERR940615V6A', 'calle 3 # 13 int 4 col. Estado de mexico', '', 'nezahuacoyolt .Mex', '57210', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '96129401509', '15/06/1994', b'00000000000'),
(38, 'HERNANDEZ HERNANDEZ BRUNO GONZALO', '', '25', '', '', 'LFD00105278', '16/05/2026', 'B', '', 'HEHB980713HPLRRR05', 'HEHB980713K15', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '84159801418', '13/07/1998', b'00000000000'),
(39, 'FRANCISCO ISRAEL ESPINOZA HURTADO', '', '24', '', '', '70000459668', '23/09/2023', 'E', '', 'EIHF990119HDFSRR02', 'EIHF990119D99', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '19/01/1999', b'00000000000'),
(40, 'SALINAS CASTILLO MICHEL', '', '43', '', '', '40000508750', '01/06/2023', 'E', '', 'SACM000615HDFLSCA1', 'SACM000615UV0', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '15/06/2000', b'00000000000'),
(41, 'BATAZ GUIJOSA IVAN', '', '124', '', '', '20000603534', '26/02/2023', 'E', '', 'BAGI810326HMCTJV00', 'BAGI810326Q63', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '26/03/1981', b'00000000000'),
(42, 'RAMIREZ VIZUET OMAR', '', '34', '', '', 'DF001104240', '14/01/2026', 'B', '', 'RAVO820730HDFMZM15', 'RAVO820730C17', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '11008225325', '', b'00000000000'),
(43, 'RAMIREZ CRUZ OMAR', '', '31', '', '', 'DF001164132', '07/06/2027', 'B', '', 'RACO901023HMCMRM04', 'RACO901023PG3', 'cda 5 de mayo mza 146 lte 13 col. San miguel teotongo ', '', 'iztapalapa. CDMX', '09630', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '45089054642', '23/10/1990', b'00000000000'),
(44, 'ARZATE MORALES MARCO ANTONIO', '', '124', '', '', 'VER0410817', '10/08/2025', 'B', '5539545492', 'AAMM931008HMCRRR01', 'AAMM931008NC8', 'AV.adolfo lopez mateos 13 A col. Marina nacional', '', 'Tlalne. de baz.MEX', '54190', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '30089108218', '08/10/1993', b'00000000000'),
(45, 'GARCIA GONZALEZ ANTONIO EMMANUEL', '', '26', '', '', '0700002931S5', '05/12/2019', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(46, 'TRUJILLO CISNEROS CRISTIAN URIEL', '', '124', '', '', 'LFD00014027', '23/07/2025', 'B', '5522145664', 'TUCC981210HMCRSR05', 'TUCC9812108P6', 'C.morelos MZ 9 LT 12', '', 'Valle chal.solid.MEX ', '56617', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '6169835888', '10/12/1998', b'00000000000'),
(47, 'EZEQUIEL ADAN AGUILAR GARCIA', '', '124', '', '', '40000197832', '11/08/2020', 'A', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(48, 'SIERRA HUERTA JUAN CARLOS', '', '124', '', '', 'DF001110484', '30/05/2020', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(49, 'RAMIREZ JACINTO JOSE MIGUEL', '', '124', '', '', 'DF00148249', '10/01/2021', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(50, 'ROMERO PEREZ VICENTE', '', '124', '', '', 'DF00179242', '16/11/2025', 'B', '5515759682', 'ROPV881122HMCMRC08', 'ROPV8811228P5', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(51, 'OMAR YASAR SANABRIA BERNAL', '', '124', '', '', 'N06541959', 'PERMANENTE', 'A', '5616627026', 'SABO870812HDFNRM08', 'SABO870812G30', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(52, 'JESUS DANIEL LOPEZ VARGAS', '', '124', '', '', '530000124141', '07/12/2022', 'E', '2217441287', 'LOVJ950307HDFPRS07', 'LOVJ950307MR4', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(53, 'EDGAR ANTONIO LABASTIDA MORALES', '', '53', '', '', '7000039832', '18/09/2024', 'E', '', 'LAME830416HDFBRD08', 'LAME8304168R8', 'C.ignacio zaragosa MZA 12LT 18 cs 40', '', 'ixtapaluca .MEX ', '56585', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '96138302201', '', b'00000000000'),
(54, 'JORGE ZUÑIGA ANGELES', '', '124', '', '', '618443', 'PERMANENTE', 'A', '', 'ZUAJ710423HDFXNR05', 'ZUAJ710423B16', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '39907126310', '23/04/1971', b'00000000000'),
(55, 'RENE ALDAIR VALLEJANO LARA', '', '124', '', '', 'DF001158393', '22/02/2023', 'B', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(56, 'CESAR FELIPE VERA CORTES', '', '124', '', '', 'VER0138330', '', 'B', '', 'VECC750514HDFRRS04', 'VECC750514TQA', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '', b'00000000000'),
(57, 'OLVERA BRIONES NESTOR RODRIGO', 'MEXICANO', '33', 'M', '', 'R9420901', 'PERMANENTE', 'A', '', 'OEBN890704HDFLRS08', 'OEBN890704QQ7', 'ORIENTE 259 108, ED JADE 5, DEP 305, AGRICOLA ORIENTAL', 'ORIENTE 259 108, ED JADE 5, DEP 305, AGRICOLA ORIENTAL', 'IZTACALCO, EDOMEX', '8500', '', '', 'OPERADOR', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '02168978175', '04/07/1989', b'00000000000'),
(58, 'GONZALEZ GARCIA HECTOR', '', '23', '', '', '530000128442', '13/04/2023', 'E', '', 'GOGH791118HDFNRC06', 'GOCH791118448', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '68957918797', '18/11/1991', b'00000000000'),
(59, 'VARGAS GARCIA CRISTIAN AXEL', '', '124', '', '', '040000502621', '25/07/2025', 'E', '', 'VAGC010906HDFRRRA9', 'VAGC0109069L3', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '', '06/09/2001', b'00000000000'),
(60, 'GALINDO CRUZ ISRAEL', '', '27', '', '', 'HGO0015923', '23/04/2025', 'B', '', 'GACI740703HDFLRS05', 'GACI740703IH3', '', '', '', '', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '34907313566', '', b'00000000000'),
(61, 'MARTINEZ SANCHEZ LAURA', '', '27', '', '', '', '', '', '', 'MASL971016MPLRNR02', 'MASL971016S12', 'oriente 166 144 col. moctezuma 2da seccion', '', 'venustiano carranza, cdmx', '15530', '', '', '', '', '', '', 'TRANSFERENCIA', 'SABADO', '', '', '72169779815', '16/10/1997', b'00000000000'),
(62, 'CESAR JAVIER GARCIA LUNA  ', 'MEXICANO', '24', 'M', 'SOLTERO', '0 40000570887', '04/04/2025', 'E', '2222923525', 'GALC970610HDFRNS07', 'GALC9706106W5', 'IZTAPALAPA 430 COL. EVOLUCIÓN, NEZAHUALCOYOTL', 'IZTAPALAPA 430 COL. EVOLUCIÓN, NEZAHUALCOYOTL', 'NEZAHUALCOYOTL, EDOMEX', '57700', '', '', 'OPERADOR ', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '96129770911', '10/06/1997', b'00000000000'),
(63, 'BUENDIA GARAY MICHELLE', 'MEXICANA', '41', 'F', 'SOLTERA', 'N/A', 'N/A', 'N/A', '5554970276', 'BUGM001110MMCNRCA1', 'BUGM0011104C3', 'CDA CENTENARIO 51 COL: SAN MIGUEL COATLINCHAN', 'CDA CENTENARIO 51 COL: SAN MIGUEL COATLINCHAN', 'TEXCOCO, EDOMEX', '56250', '', '', 'AUXILIAR ADMINISTRATIVO', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '07160066531', '10/11/2000', b'00000000000'),
(64, 'LABASTINA MORALES EDGAR ANTONIO', 'MEXICANO', '24', 'M', '', 'LFD00083330 ', '10/03/2026', 'B', '5575519395', 'LAME830416HDFBRD08', 'LAME8304168R8', 'Ignacio Zaragoza MZ12 LT18 No.40 Fracc. Lo heroes Ixtapaluca', 'Calle casuarinas MZ 7 LT 5 Ayotla Centro No. 46B Ixtapaluca Cp. 56560', 'Iztapalapa. CDMX', '56560', '', '', 'MONITORISTA', '', 'HOME OFFICE', '', 'TRANSFERENCIA', 'SABADO', '', '', '96138302201', '16/04/1983', b'00000000000'),
(65, 'MONTERO FLORES CARLOS EDUARDO', 'MEXICANO', '38', 'M', 'UNION LIBRE', '60000590946', '04/07/2024', 'E', '', 'MOFC000903HDFNLRA3', 'MOFC000903742', 'Avenida Eje 5 norte san juan de aragon 217 Col: Granjas Modernas', 'Nueva atzacoalco, #313, gustavo a. madero, c.p. 07420', 'gustavo a madero, cdmx', '07460', '', '', 'OPERADOR NISSAN', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', 'KIMBERLY ROMERO MONTERRUBIO', '54160049448', '03/09/2000', b'00000000000'),
(66, 'VALDIVIA AGUILAR DANIEL', 'MEXICANO', '40', 'M', '', '680000074635', '02/03/2024', 'E', '', 'VAAD860301HDFLGN02', 'VAAD860301GF5', 'Calle 26 Mza 14 lte 3 Col: Olivar del Conde 2 A Seccion', '', 'alvaro obregon, cdmx', '01408', '', '', 'OPERADOR NISSAN', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '94058602437', '01/03/1986', b'00000000000'),
(67, 'RAMIREZ CANTO WENDY', 'MEXICANA', '', 'F', 'UNION LIBRE', 'N/A', 'N/A', 'N/A', '5539137122', 'RACW840305MDFMNN09', 'RACW840305KE1', 'C NOGAL 6 MZ 153, SECC A, COL. POTRERO DEL REY ', 'FRAY JUAN DE TORQUEMADA 157, COL. OBRERA, CUAUHTEMOC, C.P 06800', 'ECATEPEC MORELOS, EDOMEX', '55029', 'DE PLANTA', '', 'AUXILIAR CONTABLE', '', 'OFICINA', 'LUNES A VIERNES 09:00 A 18:00 HRS', 'TRANSFERENCIA', 'VIERNES', '', '', '94048430030', '05/03/1984', b'00000000000'),
(68, 'JIMENEZ NICOLAS LUIS GERARDO', 'MEXICANO', '', 'M', 'UNION LIBRE', 'DF001168641', '06/10/2023', 'B', '5636997473', 'JINL990613HDFMCS01', 'JINL990613NT4', 'SAN JUAN DE LOS LAGOS 126, TAMAULIPAS SECC VIRGENCITAS', 'SAN JUAN DE LOS LAGOS 126, TAMAULIPAS SECC VIRGENCITAS', 'NEZAHUALCOYOTL, EDOMEX', '57300', '', '', 'OPERADOR TRAILER', '', 'PATIO', '', 'TRANSFERENCIA', 'SABADO', '', '', '96149945519', '13/06/1999', b'00000000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `Puesto_id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`Puesto_id`, `Nombre`, `Activo`) VALUES
(1, 'Operación', b'1'),
(2, 'Facturación', b'1'),
(3, 'Administrador', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_cotizaciones`
--

CREATE TABLE `registro_cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `id_especifico` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `tarifario` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `precio` float(11,2) NOT NULL,
  `num_bultos` int(11) NOT NULL,
  `km_adicionales` float(11,2) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comentarios` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `registro_cotizaciones`
--

INSERT INTO `registro_cotizaciones` (`id_cotizacion`, `id_especifico`, `cliente`, `tarifario`, `origen`, `codigo_postal`, `peso`, `dimension`, `precio`, `num_bultos`, `km_adicionales`, `fecha_creacion`, `comentarios`) VALUES
(6, '', '', '', '', '', '', '', 9100.00, 0, 0.00, '2024-07-17 05:27:58', NULL),
(6, '', '', '', '', '', '', '', 9300.00, 0, 200.00, '2024-07-17 05:28:09', NULL),
(7, '', '', '', '', '', '', '', 25300.00, 0, 0.00, '2024-07-17 05:56:13', NULL),
(7, '', '', '', '', '', '', '', 25800.00, 0, 500.00, '2024-07-17 05:56:22', NULL),
(2, 'C-2', 'Michell', '3', 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', '57850', '10', '1.5 Ton Refrigerada', 4400.00, 0, 0.00, '2024-07-17 05:24:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `id_especifico` varchar(255) NOT NULL,
  `lista` varchar(255) NOT NULL,
  `fecha_recoleccion` date NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `unidad` int(11) NOT NULL,
  `placas` varchar(255) DEFAULT NULL,
  `econ` varchar(255) DEFAULT NULL,
  `oriDestino` varchar(255) NOT NULL,
  `unid_factura` varchar(255) NOT NULL,
  `local_foranea` varchar(255) NOT NULL,
  `sello` varchar(255) NOT NULL,
  `operador` varchar(255) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `cliente_solicita` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `bultos` int(11) NOT NULL,
  `doc_fiscal` varchar(255) NOT NULL,
  `costo` float(11,2) NOT NULL,
  `factura` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cotizacion` int(11) NOT NULL,
  `num_candados` int(11) NOT NULL,
  `factura_status` bit(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_especifico`, `lista`, `fecha_recoleccion`, `cliente`, `unidad`, `placas`, `econ`, `oriDestino`, `unid_factura`, `local_foranea`, `sello`, `operador`, `id_operador`, `cliente_solicita`, `referencia`, `bultos`, `doc_fiscal`, `costo`, `factura`, `observaciones`, `fecha_creacion`, `id_cotizacion`, `num_candados`, `factura_status`) VALUES
(1, 'S-1', 'Lista Nippon', '2024-07-12', 'Michell', 12, 'test', 'test', 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', 'test', 'Foranea', 'test', 'MEJIA ZUÑIGA LUCIA GUADALUPE', 2, 'test', 'test', 15, 'test', 11006.00, 'test', 'testtesttesttesttest', '2024-07-10 04:57:17', 3, 2, b'00000000000'),
(2, 'S-2', 'Lista general', '2024-08-10', 'Fernando', 2, NULL, NULL, 'ADUANA AICM - MONTERREY', 'uni factura', 'Local', 'sello', 'GARCIA NIETO MARTIN', 14, 'cliente solicita', 'referencia', 15, 'doc fiscal', 32050.00, 'factura', 'Obs ejemplo', '2024-07-10 06:31:23', 4, 10, b'00000000000'),
(3, 'S-3', 'Lista general', '2024-08-08', 'pedritoas', 3, NULL, NULL, 'ADUANA AICM - ESTADO DE MEXICO (AREA CONURVADA)', 'uni factura', 'Foranea', 'sello', 'MARTINEZ BARRERA ALEJANDRO', 6, 'test', 'ada', 15, 'asda', 4500.00, 'test', 'awdsa', '2024-07-17 01:49:10', 5, 2, b'00000000000'),
(4, 'S-4', 'Lista general', '2024-07-31', 'Fernando', 17, NULL, NULL, 'ADUANA AICM - QUERETARO', 'uni factura', 'Local', 'sello', 'ZARAGOZA APARICIO CESAR', 9, 'cliente solicita', 'referencia', 15, 'doc fiscal', 9300.00, 'factura', 'asdasd', '2024-07-17 05:30:28', 6, 1, b'00000000000'),
(5, 'S-5', 'Lista Nippon', '2024-07-25', 'Dalia', 11, NULL, NULL, 'ADUANA AICM - AGUASCALIENTES', 'uni factura', 'Foranea', 'sello', 'LOPEZ GAYTAN ELIAS', 11, 'cliente solicita', 'referencia', 15, 'doc fiscal', 25800.00, 'factura', 'observaciones Dalia', '2024-07-17 05:59:07', 7, 6, b'00000000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifario_comunes`
--

CREATE TABLE `tarifario_comunes` (
  `Id_tarifacom` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `1_5ton` float(11,2) NOT NULL,
  `3_5ton` float(11,2) NOT NULL,
  `rabon` float(11,2) NOT NULL,
  `torton` float(11,2) NOT NULL,
  `trailer` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tarifario_comunes`
--

INSERT INTO `tarifario_comunes` (`Id_tarifacom`, `origen`, `destino`, `1_5ton`, `3_5ton`, `rabon`, `torton`, `trailer`) VALUES
(1, 'ADUANA AICM', 'INGRESO ADUANA', 1200.00, 2100.00, 3300.00, 4000.00, 6000.00),
(2, 'ADUANA AICM', 'ENTREGA LOCAL (CDMX)', 2100.00, 3200.00, 4400.00, 5000.00, 8100.00),
(3, 'ADUANA AICM', 'ESTADO DE MEXICO (AREA CONURVADA)', 2900.00, 4500.00, 5500.00, 6500.00, 10300.00),
(4, 'ADUANA AICM', 'PUEBLA ', 5200.00, 6900.00, 9100.00, 12000.00, 16200.00),
(5, 'ADUANA AICM', 'TLAXCALA', 5500.00, 7500.00, 9700.00, 12500.00, 18000.00),
(6, 'ADUANA AICM', 'TOLUCA', 3300.00, 5500.00, 6600.00, 9000.00, 10800.00),
(7, 'ADUANA AICM', 'QUERETARO', 6900.00, 9100.00, 11000.00, 14000.00, 18400.00),
(8, 'ADUANA AICM', 'CUERNAVACA', 4600.00, 6500.00, 8300.00, 10000.00, 14600.00),
(9, 'ADUANA AICM', 'AGUASCALIENTES', 15600.00, 21500.00, 25300.00, 28500.00, 33000.00),
(10, 'ADUANA AICM', 'IRAPUATO', 9200.00, 14700.00, 17600.00, 19800.00, 23800.00),
(11, 'ADUANA AICM', 'GUADALAJARA', 18400.00, 25500.00, 29700.00, 33000.00, 37300.00),
(12, 'ADUANA AICM', 'MONTERREY', 24200.00, 31700.00, 37400.00, 42000.00, 49700.00),
(13, 'ADUANA AICM', 'LEON', 11000.00, 16400.00, 19800.00, 22500.00, 26000.00),
(14, 'ADUANA AICM', 'SAN LUIS POTOSI', 11000.00, 15900.00, 18700.00, 21800.00, 26000.00),
(15, 'ADUANA AICM', 'SALAMANCA', 8700.00, 10800.00, 12700.00, 15500.00, 21600.00),
(16, 'ADUANA AICM', 'APASEO', 7500.00, 10200.00, 12100.00, 15200.00, 20000.00),
(17, 'ADUANA AICM', 'GUANAJUATO', 9800.00, 14700.00, 16500.00, 19500.00, 23800.00),
(18, 'ADUANA AICM', 'TAMPICO', 14400.00, 21000.00, 23100.00, 27000.00, 33500.00),
(19, 'ADUANA AICM', 'MANZANILLO', 27600.00, 38500.00, 46200.00, 50500.00, 57300.00),
(20, 'ADUANA AICM', 'TORREON', 26500.00, 38500.00, 46200.00, 51000.00, 58400.00),
(21, 'ADUANA AICM', 'HERMOSILLO', 59800.00, 83700.00, 95700.00, 104500.00, 119900.00),
(22, 'ADUANA AICM', 'VILLAHERMOSA', 24800.00, 34500.00, 39600.00, 46500.00, 51900.00),
(23, 'ADUANA AICM', 'VERACRUZ', 12500.00, 16000.00, 19000.00, 23000.00, 28000.00),
(24, 'ADUANA AICM', 'PACHUCA', 4500.00, 6100.00, 8200.00, 10500.00, 15000.00),
(25, 'ADUANA AICM', 'CEDIS VALLEJO', 1900.00, 3000.00, 3900.00, 5300.00, 7600.00),
(26, 'ADUANA AIFA (NLU)', 'ENTREGA LOCAL (CDMX)', 4000.00, 6000.00, 7000.00, 8000.00, 10500.00),
(27, 'ADUANA AIFA (NLU)', 'ESTADO DE MEXICO (AREA CONURVADA)', 5500.00, 8500.00, 10500.00, 12000.00, 17000.00),
(28, 'ADUANA AIFA (NLU)', 'PUEBLA ', 8500.00, 12100.00, 15200.00, 18000.00, 25000.00),
(29, 'ADUANA AIFA (NLU)', 'TOLUCA', 6500.00, 10500.00, 12500.00, 15000.00, 19000.00),
(30, 'ADUANA AIFA (NLU)', 'QUERETARO', 7800.00, 10500.00, 13500.00, 16500.00, 23000.00),
(31, 'ADUANA AIFA (NLU)', 'CUERNAVACA', 7800.00, 11500.00, 14000.00, 17000.00, 23000.00),
(32, 'ADUANA AIFA (NLU)', 'TLAXCALA', 9200.00, 13000.00, 16500.00, 19500.00, 27000.00),
(33, 'ADUANA AIFA (NLU)', 'PACHUCA', 5800.00, 8800.00, 11000.00, 13000.00, 17500.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifario_comunes_refrig`
--

CREATE TABLE `tarifario_comunes_refrig` (
  `Id_tarifacomref` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `1_5ton_refri` float(11,2) NOT NULL,
  `3_5ton_refri` float(11,2) NOT NULL,
  `rabon_refri` float(11,2) NOT NULL,
  `trailer_refri` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tarifario_comunes_refrig`
--

INSERT INTO `tarifario_comunes_refrig` (`Id_tarifacomref`, `origen`, `destino`, `1_5ton_refri`, `3_5ton_refri`, `rabon_refri`, `trailer_refri`) VALUES
(1, 'ADUANA AICM', 'INGRESO ADUANA', 1800.00, 3200.00, 4800.00, 8700.00),
(2, 'ADUANA AICM', 'ENTREGA LOCAL (CDMX)', 3200.00, 4800.00, 6400.00, 11800.00),
(3, 'ADUANA AICM', 'ESTADO DE MEXICO (AREA CONURVADA)', 4400.00, 6800.00, 8000.00, 15000.00),
(4, 'ADUANA AICM', 'PUEBLA ', 7800.00, 10400.00, 13200.00, 23500.00),
(5, 'ADUANA AICM', 'TLAXCALA', 8300.00, 11300.00, 14100.00, 26100.00),
(6, 'ADUANA AICM', 'TOLUCA', 5000.00, 8300.00, 9600.00, 15700.00),
(7, 'ADUANA AICM', 'QUERETARO', 10400.00, 13700.00, 16000.00, 26700.00),
(8, 'ADUANA AICM', 'CUERNAVACA', 6900.00, 9800.00, 12100.00, 21200.00),
(9, 'ADUANA AICM', 'AGUASCALIENTES', 23400.00, 32300.00, 36700.00, 47900.00),
(10, 'ADUANA AICM', 'IRAPUATO', 13800.00, 22100.00, 25600.00, 34600.00),
(11, 'ADUANA AICM', 'GUADALAJARA', 27600.00, 38300.00, 43100.00, 54100.00),
(12, 'ADUANA AICM', 'MONTERREY', 36300.00, 47600.00, 54300.00, 72100.00),
(13, 'ADUANA AICM', 'LEON', 16500.00, 24600.00, 28800.00, 37700.00),
(14, 'ADUANA AICM', 'SAN LUIS POTOSI', 16500.00, 23900.00, 27200.00, 37700.00),
(15, 'ADUANA AICM', 'SALAMANCA', 13100.00, 16200.00, 18500.00, 31400.00),
(16, 'ADUANA AICM', 'APASEO', 11300.00, 15300.00, 17600.00, 29000.00),
(17, 'ADUANA AICM', 'GUANAJUATO', 14700.00, 22100.00, 24000.00, 34600.00),
(18, 'ADUANA AICM', 'TAMPICO', 21600.00, 31500.00, 33500.00, 48600.00),
(19, 'ADUANA AICM', 'MANZANILLO', 41400.00, 57800.00, 67000.00, 83100.00),
(20, 'ADUANA AICM', 'TORREON', 39800.00, 57800.00, 67000.00, 84700.00),
(21, 'ADUANA AICM', 'HERMOSILLO', 89700.00, 125600.00, 138800.00, 173900.00),
(22, 'ADUANA AICM', 'VILLAHERMOSA', 37200.00, 51800.00, 57500.00, 75300.00),
(23, 'ADUANA AICM', 'VERACRUZ', 18800.00, 24000.00, 27600.00, 40600.00),
(24, 'ADUANA AICM', 'PACHUCA', 6800.00, 9200.00, 11900.00, 21800.00),
(25, 'ADUANA AICM', 'CEDIS VALLEJO', 2900.00, 4500.00, 5700.00, 11100.00),
(26, 'ADUANA AIFA (NLU)', 'ENTREGA LOCAL (CDMX)', 6000.00, 9000.00, 10200.00, 15300.00),
(27, 'ADUANA AIFA (NLU)', 'ESTADO DE MEXICO (AREA CONURVADA)', 8300.00, 12800.00, 15300.00, 24700.00),
(28, 'ADUANA AIFA (NLU)', 'PUEBLA ', 12800.00, 18200.00, 22100.00, 36300.00),
(29, 'ADUANA AIFA (NLU)', 'TOLUCA', 9800.00, 15800.00, 18200.00, 27600.00),
(30, 'ADUANA AIFA (NLU)', 'QUERETARO', 11700.00, 15800.00, 19600.00, 33400.00),
(31, 'ADUANA AIFA (NLU)', 'CUERNAVACA', 11700.00, 17300.00, 20300.00, 33400.00),
(32, 'ADUANA AIFA (NLU)', 'TLAXCALA', 13800.00, 19500.00, 24000.00, 39200.00),
(33, 'ADUANA AIFA (NLU)', 'PACHUCA', 8700.00, 13200.00, 16000.00, 25400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifario_general`
--

CREATE TABLE `tarifario_general` (
  `Id_tarifagen` int(11) NOT NULL,
  `estado_origen` varchar(255) NOT NULL,
  `municipio_origen` varchar(255) NOT NULL,
  `estado_destino` varchar(255) NOT NULL,
  `municipio_destino` varchar(255) NOT NULL,
  `Nissan_16` float(11,2) NOT NULL,
  `3_517` float(11,2) NOT NULL,
  `Rabon18` float(11,2) NOT NULL,
  `Thorton6` float(11,2) NOT NULL,
  `Trailer19` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tarifario_general`
--

INSERT INTO `tarifario_general` (`Id_tarifagen`, `estado_origen`, `municipio_origen`, `estado_destino`, `municipio_destino`, `Nissan_16`, `3_517`, `Rabon18`, `Thorton6`, `Trailer19`) VALUES
(1, 'CDMX', 'VENUSTIANO CARRANZA', 'AGUASCALIENTES', 'AGUASCALIENTES', 15177.86, 20805.00, 27289.29, 30657.72, 37775.20),
(2, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA', 'ENSENADA', 82130.14, 109355.00, 145590.72, 165679.98, 195987.59),
(3, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA', 'LOS CABOS', 113203.29, 148115.00, 203676.42, 235664.73, 272899.59),
(4, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA NORTE', 'TECATE', 79323.30, 105612.50, 140767.50, 160009.17, 189244.00),
(5, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA NORTE', 'MEXICALI', 75470.02, 100018.50, 133546.08, 151972.11, 179331.00),
(6, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA NORTE', 'TIJUANA', 81099.52, 107931.00, 143683.58, 163511.77, 193540.41),
(7, 'CDMX', 'VENUSTIANO CARRANZA', 'BAJA CALIFORNIA SUR', 'LA PAZ', 99142.46, 128773.00, 178689.28, 215221.81, 238376.59),
(8, 'CDMX', 'VENUSTIANO CARRANZA', 'CAMPECHE', 'CD DEL CARMEN', 26838.00, 35552.00, 47300.00, 53988.16, 65807.60),
(9, 'CDMX', 'VENUSTIANO CARRANZA', 'CAMPECHE', 'ESCARCEGA', 29133.00, 38155.00, 51505.00, 59228.32, 71479.40),
(10, 'CDMX', 'VENUSTIANO CARRANZA', 'CAMPECHE', 'CAMPECHE', 31908.99, 42404.50, 56758.93, 65276.09, 79005.00),
(11, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIAPAS', 'TUXTLA GUTIERREZ', 25390.41, 33495.50, 44061.07, 49996.00, 61492.80),
(12, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIAPAS', 'PALENQUE', 25732.54, 33855.00, 45170.71, 51659.11, 62955.60),
(13, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIAPAS', 'COMITAN', 27390.34, 35717.00, 48100.71, 56580.09, 66520.60),
(14, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIAPAS', 'TAPACHULA', 32123.06, 41860.00, 56354.29, 65980.36, 77919.40),
(15, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIAPAS ', 'CD HIDALGO', 33966.39, 44432.50, 59498.93, 68052.27, 82404.40),
(16, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIHUAHUA', 'CAMARGO', 32462.87, 42224.50, 58740.36, 69312.93, 81171.60),
(17, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIHUAHUA', 'DELICIAS', 34750.54, 45173.00, 62540.71, 74081.38, 87358.60),
(18, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIHUAHUA', 'CHIHUAHUA', 36508.63, 47366.00, 65827.14, 78041.05, 91710.20),
(19, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIHUAHUA', 'SAMALAYUCA', 44725.89, 57920.00, 80551.43, 96013.41, 113334.80),
(20, 'CDMX', 'VENUSTIANO CARRANZA', 'CHIHUAHUA', 'CD JUAREZ', 45523.16, 58914.50, 82041.79, 97809.08, 115308.20),
(21, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'SALTILLO', 19542.99, 25757.50, 36373.93, 42553.36, 49417.80),
(22, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'TORREON', 23974.84, 31624.50, 44453.21, 52556.57, 60853.40),
(23, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'PIEDRAS NEGRAS ', 28260.13, 36314.50, 52194.64, 61615.00, 70366.20),
(24, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'CD ACUÑA', 29548.03, 37921.00, 54602.14, 64515.68, 73554.00),
(25, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'RAMOS ARIZPE', 17355.99, 21649.50, 32443.93, 43197.96, 50126.20),
(26, 'CDMX', 'VENUSTIANO CARRANZA', 'COAHUILA', 'MONCLOVA', 23517.38, 30398.50, 43328.93, 50933.12, 58627.00),
(27, 'CDMX', 'VENUSTIANO CARRANZA', 'COLIMA', 'COLIMA', 23016.73, 31775.50, 41069.64, 45741.34, 55752.00),
(28, 'CDMX', 'VENUSTIANO CARRANZA', 'COLIMA', 'MANZANILLO', 25061.01, 36130.50, 46696.07, 52397.20, 63627.20),
(29, 'CDMX', 'VENUSTIANO CARRANZA', 'DURANGO', 'DURANGO', 20466.77, 26677.00, 38297.86, 44723.33, 51676.40),
(30, 'CDMX', 'VENUSTIANO CARRANZA', 'DURANGO', 'GOMEZ PALACIO', 23525.10, 31063.50, 43612.50, 51543.64, 59740.20),
(31, 'CDMX', 'VENUSTIANO CARRANZA', 'DURANGO ', 'ZACATECAS', 20171.31, 26184.00, 37728.57, 41806.68, 50857.60),
(32, 'CDMX', 'VENUSTIANO CARRANZA', 'ESTADO DE MEXICO', 'MEXICO', 2970.00, 4000.00, 5500.00, 0.00, 7820.00),
(33, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'APASEO EL GRANDE', 6477.69, 9095.00, 12146.43, 13787.22, 17608.80),
(34, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'SAN JOSE ITURBIDE', 6508.16, 8945.50, 12136.79, 13898.09, 16997.00),
(35, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'CELAYA', 6866.10, 9579.50, 12872.50, 14662.03, 18570.20),
(36, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'SAN MIGUEL DE ALLENDE', 6753.47, 9251.50, 12595.36, 14450.60, 17604.20),
(37, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'SALAMANCA', 8092.29, 11343.00, 15106.43, 17120.01, 21896.00),
(38, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'SALAMANCA', 8112.73, 11368.50, 15144.64, 17166.05, 21946.60),
(39, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'IRAPUATO', 8615.31, 12100.00, 16168.57, 18358.43, 23299.00),
(40, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'GUANAJUATO', 9453.47, 13145.50, 17735.36, 20246.18, 25373.60),
(41, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'PENJAMO', 9535.24, 13247.50, 17888.21, 20430.35, 25576.00),
(42, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO', 'SAN FRANCISCO DEL RINCON', 10629.51, 14652.00, 19788.57, 22603.21, 28119.80),
(43, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO ', 'SILAO', 9126.39, 12737.50, 17123.93, 19509.49, 24564.00),
(44, 'CDMX', 'VENUSTIANO CARRANZA', 'GUANAJUATO ', 'LEON', 9821.44, 13604.50, 18423.21, 21074.94, 26284.40),
(45, 'CDMX', 'VENUSTIANO CARRANZA', 'GUERRERO', 'CHILPANCINGO', 8743.76, 12050.50, 16131.79, 18335.47, 21321.00),
(46, 'CDMX', 'VENUSTIANO CARRANZA', 'GUERRERO', 'ACAPULCO', 12309.30, 17307.50, 22202.50, 24617.20, 28547.60),
(47, 'CDMX', 'VENUSTIANO CARRANZA', 'GUERRERO', 'TECPAN DE GALEANA', 13705.97, 18230.00, 24332.86, 27611.24, 31974.60),
(48, 'CDMX', 'VENUSTIANO CARRANZA', 'GUERRERO', 'MARQUELIA', 14813.74, 19996.00, 26505.71, 29958.61, 34467.80),
(49, 'CDMX', 'VENUSTIANO CARRANZA', 'GUERRERO ', 'IGUALA', 6797.83, 9304.00, 12457.14, 14160.16, 17033.80),
(50, 'CDMX', 'VENUSTIANO CARRANZA', 'HIDALGO', 'TULANCINGO', 3044.83, 4081.00, 5632.14, 6923.60, 8358.20),
(51, 'CDMX', 'VENUSTIANO CARRANZA', 'HIDALGO', 'PACHUCA', 2384.49, 3175.00, 4446.43, 5179.26, 6223.80),
(52, 'CDMX', 'VENUSTIANO CARRANZA', 'HIDALGO', 'TIZAYUCA', 1298.12, 1619.25, 2426.61, 2923.70, 3213.10),
(53, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'OCOTLAN', 14900.53, 21154.50, 27244.64, 30279.20, 36657.40),
(54, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'TEPATITLAN', 14889.73, 20455.50, 27079.64, 30584.59, 37789.00),
(55, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'GUADALAJARA', 17259.56, 24352.50, 31281.79, 34711.81, 42274.00),
(56, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'ATOTONILCO', 16216.20, 22660.00, 29780.00, 33493.45, 40107.40),
(57, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'ACATLAN', 18015.94, 25296.00, 32695.71, 36415.39, 44146.20),
(58, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'LA TIJERA', 18588.34, 26010.00, 33765.71, 28085.98, 45563.00),
(59, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'LAGOS DE MORENO', 11477.31, 15670.00, 21518.57, 24804.39, 30383.00),
(60, 'CDMX', 'VENUSTIANO CARRANZA', 'JALISCO', 'PUERTO VALLARTA', 26397.51, 35660.00, 46848.57, 52679.88, 63167.20),
(61, 'CDMX', 'VENUSTIANO CARRANZA', 'LOCAL', 'CDMX', 1890.00, 3000.00, 4250.00, 0.00, 5060.00),
(62, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN', 'MORELIA', 11683.67, 17146.50, 22270.36, 24875.56, 31289.20),
(63, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN', 'ZAMORA', 12908.31, 17455.00, 24193.57, 28027.38, 33925.00),
(64, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN', 'LAZARO CARDENAS', 20798.87, 30245.50, 39285.36, 43882.08, 54174.20),
(65, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN', 'APATZINGAN', 16947.51, 24475.00, 32103.57, 36066.55, 44514.20),
(66, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN', 'LOS REYES', 16048.41, 22017.50, 29201.07, 32904.86, 39311.60),
(67, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN ', 'URUAPAN', 14405.66, 20995.00, 27479.29, 30832.52, 38267.40),
(68, 'CDMX', 'VENUSTIANO CARRANZA', 'MICHOACAN ', 'PARACHO', 14296.89, 20510.00, 27121.43, 30612.15, 37798.20),
(69, 'CDMX', 'VENUSTIANO CARRANZA', 'NAYARIT', 'TEPIC', 23579.49, 32017.00, 41476.43, 46257.09, 55867.00),
(70, 'CDMX', 'VENUSTIANO CARRANZA', 'NAYARIT', 'ACAPONETA', 29788.71, 40550.00, 51738.57, 57178.68, 70720.40),
(71, 'CDMX', 'VENUSTIANO CARRANZA', 'NUEVO LEON', 'ALLENDE', 20089.16, 26105.50, 37306.79, 43912.32, 50567.80),
(72, 'CDMX', 'VENUSTIANO CARRANZA', 'NUEVO LEON', 'MONTERREY', 21166.46, 27466.00, 38934.29, 45638.22, 52808.00),
(73, 'CDMX', 'VENUSTIANO CARRANZA', 'NUEVO LEON', 'APODACA', 21595.76, 28001.50, 39736.79, 46605.11, 53870.60),
(74, 'CDMX', 'VENUSTIANO CARRANZA', 'NUEVO LEON', 'SABINAS HIDALGO', 23839.46, 30790.00, 43504.29, 50909.39, 58709.80),
(75, 'CDMX', 'VENUSTIANO CARRANZA', 'NUEVO LEON', 'LINARES', 18637.71, 24295.00, 34593.57, 40643.30, 46975.20),
(76, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'TEOTITLAN ', 12696.56, 17184.50, 23401.79, 27266.63, 32637.00),
(77, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'OAXACA', 15326.36, 21304.50, 28411.79, 32637.81, 38796.40),
(78, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'PINOTEPA NACIONAL', 17471.31, 23311.00, 31473.57, 35944.14, 41045.80),
(79, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'MATIAS ROMERO', 19848.09, 26415.00, 34806.43, 39620.31, 48631.20),
(80, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'HUATULCO', 21198.86, 28451.00, 37249.29, 42216.07, 51883.40),
(81, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'PUERTO ESCONDIDO', 18943.20, 25147.00, 34225.00, 39259.21, 44689.00),
(82, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'JUCHITAN', 21135.99, 28021.50, 37213.93, 42521.00, 51819.00),
(83, 'CDMX', 'VENUSTIANO CARRANZA', 'OAXACA', 'SALINA CRUZ', 22421.96, 29703.50, 39836.79, 47050.55, 54988.40),
(84, 'CDMX', 'VENUSTIANO CARRANZA', 'PUEBLA', 'PUEBLA', 5059.03, 7185.00, 9092.14, 10411.59, 13445.80),
(85, 'CDMX', 'VENUSTIANO CARRANZA', 'PUEBLA', 'TEHUACAN', 7851.60, 11141.00, 14345.00, 16354.53, 20644.80),
(86, 'CDMX', 'VENUSTIANO CARRANZA', 'QUERETARO', 'SAN JUAN DEL RIO', 4319.61, 6134.50, 8156.07, 9234.37, 11877.20),
(87, 'CDMX', 'VENUSTIANO CARRANZA', 'QUERETARO', 'QUERETARO', 5382.64, 7460.50, 10143.21, 11628.59, 14508.40),
(88, 'CDMX', 'VENUSTIANO CARRANZA', 'QUINTANA ROO', 'CHETUMAL', 34522.97, 44820.00, 61602.86, 71457.42, 84713.60),
(89, 'CDMX', 'VENUSTIANO CARRANZA', 'QUINTANA ROO', 'PLAYA DEL CARMEN', 44393.40, 59433.00, 79725.00, 93521.58, 113031.20),
(90, 'CDMX', 'VENUSTIANO CARRANZA', 'QUINTANA ROO', 'CANCUN', 44902.54, 60207.00, 80600.71, 94639.72, 114622.80),
(91, 'CDMX', 'VENUSTIANO CARRANZA', 'QUINTANA ROO', 'TULUM', 31890.86, 39780.00, 59614.29, 87912.64, 95077.40),
(92, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'TAMAZUNCHALE', 7853.14, 10204.00, 14755.71, 17472.25, 20092.80),
(93, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'SAN LUIS POTOSI', 9758.57, 13000.00, 18212.86, 21218.86, 25042.40),
(94, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'RIO VERDE ', 12927.21, 16952.50, 24136.07, 28355.46, 32885.40),
(95, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'TAMUIN', 18676.29, 24885.00, 34166.43, 39627.89, 45954.00),
(96, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'TAMAZUNCHALE', 6684.81, 8338.50, 13571.07, 16044.93, 18524.20),
(97, 'CDMX', 'VENUSTIANO CARRANZA', 'SINALOA', 'MAZATLAN', 35431.71, 48280.00, 61248.57, 67451.84, 83885.60),
(98, 'CDMX', 'VENUSTIANO CARRANZA', 'SINALOA', 'CULIACAN', 42018.94, 57358.00, 72945.71, 80455.62, 98256.00),
(99, 'CDMX', 'VENUSTIANO CARRANZA', 'SINALOA', 'LOS MOCHIS', 47420.48, 64052.00, 82411.43, 91877.50, 111191.20),
(100, 'CDMX', 'VENUSTIANO CARRANZA', 'SINALOA', 'GUAMUCHIL', 45292.11, 61473.00, 51818.57, 62433.75, 68613.60),
(101, 'CDMX', 'VENUSTIANO CARRANZA', 'SINALOA', 'GUASAVE', 46091.70, 62394.50, 52697.50, 63492.73, 69777.40),
(102, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'NAVOJOA', 51095.57, 68891.00, 88877.86, 99284.36, 119880.60),
(103, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'CD OBREGON', 53127.90, 71552.50, 92467.50, 103381.46, 124673.80),
(104, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'HERMOSILLO', 59884.46, 80269.00, 104909.29, 118017.34, 141197.00),
(105, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'CANANEA', 52641.52, 68823.00, 94963.57, 111830.77, 132052.20),
(106, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'NACOZARI', 53357.02, 69715.50, 96301.07, 113442.26, 133823.20),
(107, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'AGUA PRIETA', 50556.34, 66222.00, 91065.71, 107134.43, 126891.00),
(108, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'SAN LUIS RIO COLORADO', 73493.23, 97512.00, 129857.14, 147565.95, 174335.41),
(109, 'CDMX', 'VENUSTIANO CARRANZA', 'SONORA', 'NOGALES', 65769.30, 87785.50, 115642.50, 130645.92, 155470.80),
(110, 'CDMX', 'VENUSTIANO CARRANZA', 'TABASCO', 'VILLAHERMOSA', 22700.06, 30014.00, 39524.29, 44918.66, 55342.60),
(111, 'CDMX', 'VENUSTIANO CARRANZA', 'TABASCO', 'TENOSIQUE', 28263.99, 36739.50, 50203.93, 59440.30, 71525.40),
(112, 'CDMX', 'VENUSTIANO CARRANZA', 'TABASCO', 'FRONTERA', 24355.93, 32079.50, 31679.64, 38169.31, 41947.40),
(113, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'TAMPICO', 12436.20, 17785.00, 24015.00, 27841.67, 34260.80),
(114, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'CD VICTORIA', 17126.87, 22782.50, 32000.36, 37410.48, 43267.60),
(115, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'MATAMOROS', 21317.66, 28010.00, 39834.29, 46849.21, 53640.60),
(116, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'REYNOSA', 25877.96, 33169.50, 46506.79, 54205.08, 62937.20),
(117, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'REYNOSA', 26184.60, 33552.00, 47080.00, 54895.72, 63696.20),
(118, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'NUEVO LAREDO', 27080.62, 34810.50, 48936.07, 57114.92, 65913.40),
(119, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'LAREDO TX', 27182.83, 34938.00, 49127.14, 57345.13, 66166.40),
(120, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS', 'CD MANTE', 14837.27, 19926.50, 23425.36, 28224.11, 31017.80),
(121, 'CDMX', 'VENUSTIANO CARRANZA', 'TAMAULIPAS ', 'ALTAMIRA', 12144.21, 17493.50, 23431.07, 27054.09, 33589.20),
(122, 'CDMX', 'VENUSTIANO CARRANZA', 'TEZONTEPEC, HGO', 'MEOQUI, CHIHUAHUA', 33934.76, 44060.50, 61491.79, 63124.39, 84814.80),
(123, 'CDMX', 'VENUSTIANO CARRANZA', 'TLAXCALA', 'TLAXCALA', 4667.14, 6730.00, 8255.71, 9462.71, 12351.00),
(124, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'ORIZABA', 8628.43, 12436.00, 15767.14, 17771.76, 23358.80),
(125, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'POZA RICA', 6405.56, 8292.50, 11661.79, 14027.49, 16215.00),
(126, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'CORDOBA', 9318.86, 13433.00, 17069.29, 19230.98, 25263.20),
(127, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'XALAPA', 9629.74, 13014.00, 16675.71, 18899.87, 23754.40),
(128, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'MISANTLA', 8286.30, 10638.50, 15177.50, 18263.41, 20870.20),
(129, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'VERACRUZ', 12819.60, 17881.00, 22865.00, 25716.90, 32793.40),
(130, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'BOCA DEL RIO', 12921.81, 18008.50, 23056.07, 25947.11, 33046.40),
(131, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'ACAYUCAN', 17231.40, 23151.00, 29915.00, 33726.86, 42154.40),
(132, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'MINATITLAN', 18517.76, 24631.50, 31916.79, 36014.80, 45089.20),
(133, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'COATZACOALCOS', 18987.94, 25218.00, 32795.71, 37073.79, 46253.00),
(134, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'TUXPAN', 8158.63, 12305.00, 11082.14, 13352.35, 14674.00),
(135, 'CDMX', 'VENUSTIANO CARRANZA', 'YUCATAN', 'MERIDA', 35547.81, 46943.50, 63561.07, 73471.67, 88011.80),
(136, 'CDMX', 'VENUSTIANO CARRANZA', 'YUCATAN', 'ACANCECH', 35997.56, 47504.50, 64401.79, 74484.61, 89125.00),
(137, 'CDMX', 'VENUSTIANO CARRANZA', 'YUCATAN', 'TIZIMIN', 38859.56, 51074.50, 56136.79, 67636.57, 74331.40),
(138, 'CDMX', 'VENUSTIANO CARRANZA', 'ZACATECAS', 'ZACATECAS', 16822.54, 22897.00, 30830.71, 35156.78, 42660.40),
(139, 'CDMX', 'VENUSTIANO CARRANZA', 'ZACATECAS', 'FRESNILLO', 18118.54, 24660.00, 33305.71, 38043.36, 46018.40),
(140, 'CDMX', 'VENUSTIANO CARRANZA', 'ZACATECAS', 'MAZAPIL', 17820.00, 23275.00, 33065.00, 35452.80, 44951.20),
(141, 'CDMX', 'VENUSTIANO CARRANZA', 'ZACATECAS', 'MAZAPIL', 17820.00, 23275.00, 33065.00, 35452.80, 44951.20),
(142, 'CDMX', 'VENUSTIANO CARRANZA', 'PUEBLA', 'SAN JOSE CHIAPA', 4129.46, 7551.00, 10119.29, 9300.60, 10221.20),
(143, 'CDMX', 'VENUSTIANO CARRANZA', 'VERACRUZ', 'TIHUATLAN', 5724.00, 7140.00, 10700.00, 12891.93, 22011.00),
(144, 'CDMX', 'VENUSTIANO CARRANZA', 'NAYARIT', 'NUEVO BALLARTA', 26004.86, 21930.00, 32864.29, 39596.63, 43516.00),
(145, 'CDMX', 'VENUSTIANO CARRANZA', 'TABASCO', 'PARAISO', 22099.12, 19227.00, 28813.57, 34716.11, 38152.40),
(146, 'CDMX', 'VENUSTIANO CARRANZA', '', '', 0.00, 0.00, 0.00, 0.00, 0.00),
(147, 'CDMX', 'VENUSTIANO CARRANZA', '', '', 0.00, 0.00, 0.00, 0.00, 0.00),
(148, 'CDMX', 'VENUSTIANO CARRANZA', '', '', 0.00, 0.00, 0.00, 0.00, 0.00),
(149, 'CDMX', 'VENUSTIANO CARRANZA', 'SAN LUIS POTOSI', 'VENADOS ', 13257.77, 17280.00, 24272.86, 28318.03, 32857.80),
(150, 'CDMX', 'AICM', '', 'tijuana', 121885.71, 51000.00, 76428.57, 92085.19, 101200.00),
(151, 'SAN LUIS', 'SAN LUIS', 'COLIMA', 'MANZANILLO', 13083.43, 27820.00, 35957.14, 29467.26, 32384.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifario_proexi`
--

CREATE TABLE `tarifario_proexi` (
  `Id_tarifa_proexi` int(11) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `nissan` float(11,2) NOT NULL,
  `3_5` float(11,2) NOT NULL,
  `rabon` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tarifario_proexi`
--

INSERT INTO `tarifario_proexi` (`Id_tarifa_proexi`, `origen`, `destino`, `nissan`, `3_5`, `rabon`) VALUES
(1, 'AICM', 'LOCAL ARRASTRE CDMX', 1000.00, 1800.00, 3000.00),
(2, 'AICM', 'LOCAL CDMX', 1800.00, 2800.00, 4000.00),
(3, 'AICM', 'TOLUCA EDO DE MEXICO', 2800.00, 5100.00, 6100.00),
(4, 'AICM', 'AREA METROPOLITANA', 2500.00, 3900.00, 5000.00),
(5, 'AICM', 'AGUASCALIENTES', 15100.00, 21000.00, 24300.00),
(6, 'AICM', 'APASEO', 7000.00, 9700.00, 11100.00),
(7, 'AICM', 'CELAYA', 8000.00, 10000.00, 12000.00),
(8, 'AICM', 'SAN JOSE ITURBIDE', 8000.00, 10000.00, 12100.00),
(9, 'AICM', 'IRAPUATO', 8700.00, 14200.00, 16600.00),
(10, 'AICM', 'LEON', 10500.00, 15900.00, 18800.00),
(11, 'AICM', 'SALAMANCA', 8200.00, 10300.00, 12100.00),
(12, 'AICM', 'SILAO', 8700.00, 14200.00, 16600.00),
(13, 'AICM', 'SAN LUIS POTOSI', 10500.00, 15400.00, 17700.00),
(14, 'AICM', 'QUERETARO', 6200.00, 8600.00, 10000.00),
(15, 'AICM', 'SALTILLO', 19000.00, 25000.00, 33000.00),
(16, 'AICM', 'RAMOS', 19000.00, 25000.00, 33000.00),
(17, 'AICM', 'ARTEAGA', 19000.00, 25000.00, 33000.00),
(18, 'AICM', 'MONTERREY', 23000.00, 30500.00, 36000.00),
(19, 'AICM', 'TIZAYUCA', 3500.00, 5000.00, 6000.00),
(20, 'AICM', 'PUEBLA', 4800.00, 6700.00, 8500.00),
(21, 'AICM', 'TLAXCALA', 5000.00, 7100.00, 8900.00),
(22, 'AICM', 'CIUDAD SAHAGUN', 4000.00, 6000.00, 7200.00),
(23, 'AICM', 'TEZONTEPEC', 4000.00, 6000.00, 7200.00),
(24, 'AICM', 'GUADALAJARA', 17900.00, 24000.00, 28700.00),
(25, 'AICM', 'LAGOS DE MORENO', 11000.00, 16300.00, 19800.00),
(26, 'AICM', 'NUEVO LAREDO', 25000.00, 32000.00, 45000.00),
(27, 'AICM', 'SAN JUAN DEL RIO', 6200.00, 8600.00, 10000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `Uni_id` int(11) NOT NULL,
  `eco` varchar(25) NOT NULL,
  `Placas` varchar(255) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Unidad` varchar(255) NOT NULL,
  `Largo` varchar(255) NOT NULL,
  `Ancho` varchar(255) NOT NULL,
  `Alto` varchar(255) NOT NULL,
  `Peso` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `No_Serie` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Placas_anteriores` varchar(255) NOT NULL,
  `Poliza` varchar(255) NOT NULL,
  `Vigencia_Poliza` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Verificacion` varchar(255) NOT NULL,
  `Columna` varchar(255) NOT NULL,
  `candados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`Uni_id`, `eco`, `Placas`, `Marca`, `Unidad`, `Largo`, `Ancho`, `Alto`, `Peso`, `Tipo`, `Modelo`, `No_Serie`, `Color`, `Placas_anteriores`, `Poliza`, `Vigencia_Poliza`, `Verificacion`, `Columna`, `candados`) VALUES
(1, '1', '16-06-ZR', 'VOLKSWAGEN', 'ROBUST', '1.68 / 1.63', '1.02', '1.54 / 1.61', '700 KG', 'AUTOMOVIL', '2021', '9BWKB45UXMP040210', 'BLANCA', 'NAU-83-71', '1000124970', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(2, '2', 'LF-46-644', 'NISSAN', 'NP 300', '2.74', '1.76 / 1.82', '1.71 / 1.78', '700 KG', 'AUTOMOVIL', '2016', '3N6AD35C2GK856669', 'BLANCA', 'NJM-17-64', '7060013046', '0000-00-00 00:00:00', 'SEPT / OCT', '', 0),
(3, '3', '31-AT-9E', 'CHRYSLER DODGE', 'RAM BLANCA PLATAFORMA', '5.94', '2.6', 'PLATAFORMA', '3.5 TON', '2 EJES', '2007', '3D6WN56D67G744933', 'BLANCA', '61-AJ-9F', '1000125010', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(4, '4', 'LE-13-225', 'NISSAN', 'NP 300', '2.62', '1.66 / 1.72', '1.69 / 1.76', '700 KG', 'AUTOMOVIL', '2012', '3N6DD25T0CK025138', 'BLANCA', '', '1000123285', '0000-00-00 00:00:00', 'JUL / AGOS', '', 0),
(5, '5', '27-AT-9E', 'FORD', 'SUPER DUTY F350', '5.85', '2.6', 'PLATAFORMA', '3.5  TON', '2 EJES', '2007', '3FEKF36L57MA22035', 'ROJA', '64-AH-4K', '7060014837', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(6, '6', '30-AT-9E', 'CHEVROLET', 'SILVERADOR THERMO', '3.96', '2.10 / 2.13', '1.74 / 1.80', '2.8 TON', '2 EJES', '2006', '3GBJC34R36M102828', 'ROJA', '17-AK-1A', '1000125011', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(7, '7', '58-98-ZR', 'FORD', 'FORD F-450', '3.68/3.65', '2.47/2.51', '2.21/2.30', '3.5 TON', '2 EJES', '2016', '1FDGF4GY5GEA77147', 'BLANCA', '', '7060014363', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(8, '8', '57-BB-9H', 'KENWORTH', 'THORTON', '8.71 / 8.67', '2.44 / 2.50', '2.78 / 2.82', '12 TON', '3 EJES', '2011', '3BKHLN9X4BF376427', 'BLANCA', '', '1000124968', '0000-00-00 00:00:00', 'FEDERAL', 'SI', 0),
(9, '9', '97-77-ZP', 'NISSAN', 'NP 300', '2.76', '1.75 / 1.81', '1.70 / 1.77', '700 KG', 'AUTOMOVIL', '2019', '3N6AD35A2KK843329', 'GRIS  ', 'LE-04-895', '7060013106', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(10, '10', '68-44-ZR', 'VOLKSWAGEN', 'ROBUST', '1.68/ 1.63', '1.02', '1.54 / 1.61', '700 KG', 'AUTOMOVIL', '', '', '', '', '', '0000-00-00 00:00:00', '', '', 0),
(11, '11', 'LF-59-097', 'VOLKSWAGEN', 'ROBUST', '1.60 / 1.65', '1.03', '1.07 / 1.30', '700 KG', 'AUTOMOVIL', '2020', '9BWKB45U5LP028531', 'BLANCA', 'NSV-38-84', '7060013091', '0000-00-00 00:00:00', 'AGOS / SEPT', '', 0),
(12, '12', '57-BA-9U', 'DODGE', 'RAM BLANCA CAJA SECA', '3.51', '2.35 / 2.42', '2.10 / 2.21', '3 TON', '2 EJES', '2012', '3C7WDAKT5CG178145', 'BLANCA', '29-AT-6W', '310023717', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(13, '14', 'LF-59-075', 'VOLKSWAGEN', 'ROBUST', '1.68 / 1.63', '1.02', '1.54 / 1.61', '700 KG', 'AUTOMOVIL', '2020', '9BWKB45U5LP005525', 'BLANCA', 'NKK-46-06', '7060011749', '0000-00-00 00:00:00', 'JUL / AGOS', '', 0),
(14, '15', '59-10-ZR', 'CHEVROLET', 'S 10', '2.23/2.26', '1.66/1.63', '1.56/1.48', '700 KG', 'AUTOMOVIL', '2023', 'LSFAM2AB1PA078918', 'GRIS', '', '0310023715', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(15, '16', '67-AT-7W', 'FORD', 'SUPER DUTY / CAMION', '5.02', '2.22 / 2.30', '2.15/2.25', '3 TON', '2 EJES', '2008', '3FEKF36L88MA02315', 'BLANCA', '091-DG-4', '310023907', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(16, '17', 'LG-19-321', 'VOLKSWAGEN', 'ROBUST', '1.68 / 1.63', '1.02', '1.30 / 1.07', '700 KG', 'AUTOMOVIL', '', '', '', '', '', '0000-00-00 00:00:00', '', '', 0),
(17, '18', '50-63-ZR', 'NISSAN', 'NP 300 THERMO', '2.35', '1.65', '1.26/1.39', '700 KG', 'AUTOMOVIL', '2021', '3N6AD35A2MK822564', 'GRIS', '', '1000124971', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(18, '19', '67-53-ZR', 'PEUGEOT PARTNER', 'PARTNER', '1.85', '1.23', '1.1', '700 KG', 'AUTOMOVIL', '', '', '', '', '', '0000-00-00 00:00:00', '', '', 0),
(19, '20', '54-AS-5M', 'INTERNATIONAL', '4900 / RABON REFRIGERADO', '16', '2.23 / 2.38', '2.83', '6 TON', '2 EJES', '1999', '3HTSCAAR6XN120294', 'BLANCA', '92-AH-8M', '7060012439', '0000-00-00 00:00:00', 'FEDERAL', 'SI', 0),
(20, '21', '44-AV-4E', 'FREIGHTLINER', 'M2 / RABON REFRIGERADO', '6.7', '2.42', '2.4', '6 TON', '2 EJES', '2012', '3ALACWDG3CDBK6278', 'BLANCA', '', '7060012557', '0000-00-00 00:00:00', 'FEDERAL', 'SI', 0),
(21, '101', '21-UM-1D', 'STRICK', 'CAJA SECA', '16', '3.6', '2.83', '18 TON', '', '1999', '1S12E9535XE445469', 'BLANCA', '406-XB-1', '1000123459', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(22, '102', '463-WM-7', 'GRANT DANE', 'CAJA REFRIGERADA', '15.8', '2.47', '2.6', '18 TON', '', '2005', '1GRAA06285W706184', 'BLANCA', '', '1000123462', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(23, '103', '821-WN-3', 'GRANT DANE', 'CAJA REFRIGERADA', '15.8', '2.47', '2.6', '18 TON', '', '2005', '1GRAA06295W706212', 'BLANCA', '', '1000123460', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(24, '104', '04-UT-8J', 'PINES', 'CAJA SECA', '15.8', '2.5', '2.75', '18 TON', '', '1996', '1PNV532B3TH203260', 'BLANCA', '37-4U-L8', '1000124228', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(25, '140', '85-BB-6Y', 'VOLVO', 'TRAILER', '8.0', '2.5', '3.6', '18 TON', '5 EJES', '2014', '4V4NC9THXEN156399', 'BLANCA', '', '7060014895', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(26, '141', '06-AY-1C', 'KENWORTH', 'TRAILER', '7.5', '2.6', '3.8', '18 TON', '5 EJES', '2003', '3WKADB0X53F608895', 'ROJO', 'NW-68-629', '7060013855', '0000-00-00 00:00:00', 'FEDERAL', 'SI', 0),
(27, '147', '77-BA-7B', 'VOLVO', 'TRAILER', '8.5', '2.5', '4.1', '18 TON', '5 EJES', '2008', '4VANC9TG28N494732', 'AZUL', '79-AH-5G', '1000115995', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(28, '150', '78-BA-7B', 'VOLVO', 'TRAILER', '9.0', '2.6', '3.9', '18 TON', '5 EJES', '2009', '4V4NC9TH49N280061', 'NEGRO', '', '7060012201', '0000-00-00 00:00:00', 'FEDERAL', '', 0),
(29, '151', '41-BA-3B', 'VOLVO', 'TRAILER', '9.0', '2.6', '3.9', '18 TON', '5 EJES', '2009', '4V4NC9TH59N280067', 'NEGRO', '', '7060012958', '0000-00-00 00:00:00', 'FEDERAL', 'SI', 0),
(30, 'R004', '261-WN-1', 'GRANT DANE', 'CAJA SECA', '15.8', '2.47', '2.6', '18 TON', '', '2005', '1GRAA062X5W706204', 'BLANCA', '', '', '0000-00-00 00:00:00', 'FEDERAL', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usu_id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `ApellidoP` varchar(255) NOT NULL,
  `ApellidoM` varchar(255) NOT NULL,
  `Puesto_id` int(11) NOT NULL,
  `Status` bit(1) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usu_id`, `Nombre`, `ApellidoP`, `ApellidoM`, `Puesto_id`, `Status`, `Usuario`, `psw`) VALUES
(1, 'Michell', 'Palestina', 'Barrios', 1, b'1', 'MichP', '123456789'),
(2, 'Fernando ', 'Aldana', 'Ramos', 2, b'1', 'FernandoA', '123456789'),
(3, 'Administrador', 'Perez', 'Perez', 3, b'1', 'AdminP', '987654321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`Puesto_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_cotizacion` (`id_cotizacion`);

--
-- Indices de la tabla `tarifario_comunes`
--
ALTER TABLE `tarifario_comunes`
  ADD PRIMARY KEY (`Id_tarifacom`);

--
-- Indices de la tabla `tarifario_comunes_refrig`
--
ALTER TABLE `tarifario_comunes_refrig`
  ADD PRIMARY KEY (`Id_tarifacomref`);

--
-- Indices de la tabla `tarifario_general`
--
ALTER TABLE `tarifario_general`
  ADD PRIMARY KEY (`Id_tarifagen`);

--
-- Indices de la tabla `tarifario_proexi`
--
ALTER TABLE `tarifario_proexi`
  ADD PRIMARY KEY (`Id_tarifa_proexi`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`Uni_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usu_id`),
  ADD KEY `Puesto_id` (`Puesto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `Puesto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tarifario_comunes`
--
ALTER TABLE `tarifario_comunes`
  MODIFY `Id_tarifacom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tarifario_comunes_refrig`
--
ALTER TABLE `tarifario_comunes_refrig`
  MODIFY `Id_tarifacomref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tarifario_general`
--
ALTER TABLE `tarifario_general`
  MODIFY `Id_tarifagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `tarifario_proexi`
--
ALTER TABLE `tarifario_proexi`
  MODIFY `Id_tarifa_proexi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `Uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_cotizacion`) REFERENCES `cotizaciones` (`id_cotizacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Puesto_id`) REFERENCES `puestos` (`Puesto_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
