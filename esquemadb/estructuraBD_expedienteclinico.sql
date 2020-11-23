-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2020 a las 23:47:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expedienteclinico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedente_familiar`
--

CREATE TABLE `antecedente_familiar` (
  `af_id` int(11) NOT NULL,
  `p_id` int(10) DEFAULT NULL,
  `af_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `af_familiar` varchar(20) DEFAULT NULL,
  `af_padecimiento` varchar(50) DEFAULT NULL,
  `af_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `antecedente_familiar`
--

INSERT INTO `antecedente_familiar` (`af_id`, `p_id`, `af_fecha_registro`, `af_familiar`, `af_padecimiento`, `af_estado`) VALUES
(1, 1, '2017-04-29 23:34:30', 'SOBRINO', 'Problemas en los riñones y en los pies', 'ACTIVO'),
(2, 1, '2017-04-30 02:21:57', 'ABUELO', 'Problemas Lumbares', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_movimiento`
--

CREATE TABLE `catalogo_movimiento` (
  `cmv_id` int(11) NOT NULL,
  `cmv_tipo` varchar(20) NOT NULL,
  `cmv_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmv_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_medicas`
--

CREATE TABLE `citas_medicas` (
  `cm_id` int(11) NOT NULL,
  `tp_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `cm_descripcion` varchar(100) NOT NULL,
  `cm_fecha_cita_reserva` timestamp NULL DEFAULT current_timestamp(),
  `cm_fecha_cita_medica` timestamp NOT NULL DEFAULT current_timestamp(),
  `cm_hora` time NOT NULL,
  `cm_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`cm_id`, `tp_id`, `p_id`, `cm_descripcion`, `cm_fecha_cita_reserva`, `cm_fecha_cita_medica`, `cm_hora`, `cm_estado`) VALUES
(1, 9, 2, 'Cita con el pediatra', '2017-05-01 18:15:45', '2017-05-01 06:00:00', '12:15:00', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `dm_id` int(11) NOT NULL,
  `datos_medicoscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `df_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `tpc_id` int(11) DEFAULT NULL,
  `df_fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `df_precio` float DEFAULT NULL,
  `dtf_contado` float DEFAULT NULL,
  `df_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`df_id`, `p_id`, `tpc_id`, `df_fecha_registro`, `df_precio`, `dtf_contado`, `df_estado`) VALUES
(27, 2, 1, '2017-05-02 10:25:44', 100, 345, 'ACTIVO'),
(28, 1, 1, '2017-05-02 11:15:52', 150, 300, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proveedor_medicamento`
--

CREATE TABLE `detalle_proveedor_medicamento` (
  `dpm_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `dpm_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embarazo`
--

CREATE TABLE `embarazo` (
  `emb_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `emb_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `emb_problema_embarazo` varchar(50) NOT NULL,
  `emb_descripcion` varchar(100) NOT NULL,
  `emb_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `embarazo`
--

INSERT INTO `embarazo` (`emb_id`, `p_id`, `emb_fecha_registro`, `emb_problema_embarazo`, `emb_descripcion`, `emb_estado`) VALUES
(1, 1, '2017-04-27 13:57:43', 'Achaques', 'El bebe mucho se mueve', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epicrisis`
--

CREATE TABLE `epicrisis` (
  `epc_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `epc_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `epc_clinica` varchar(45) DEFAULT NULL,
  `epc_sala` varchar(45) DEFAULT NULL,
  `epc_no_cama` varchar(20) DEFAULT NULL,
  `epc_enfermedad` varchar(50) NOT NULL,
  `epc_complicaciones` varchar(100) DEFAULT NULL,
  `epc_examenes_realizados` varchar(50) NOT NULL,
  `epc_tratamientos_recibidos` varchar(100) NOT NULL,
  `epc_diagnostico_ingreso` varchar(50) NOT NULL,
  `epc_diagnostico_egreso` varchar(100) DEFAULT NULL,
  `epc_resultado_examen` varchar(45) DEFAULT NULL,
  `epc_cirugia` varchar(50) DEFAULT NULL,
  `epc_motivo_cirugia` varchar(100) DEFAULT NULL,
  `epc_cantidad_cirugias` char(10) DEFAULT NULL,
  `epc_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `epicrisis`
--

INSERT INTO `epicrisis` (`epc_id`, `p_id`, `epc_fecha_registro`, `epc_clinica`, `epc_sala`, `epc_no_cama`, `epc_enfermedad`, `epc_complicaciones`, `epc_examenes_realizados`, `epc_tratamientos_recibidos`, `epc_diagnostico_ingreso`, `epc_diagnostico_egreso`, `epc_resultado_examen`, `epc_cirugia`, `epc_motivo_cirugia`, `epc_cantidad_cirugias`, `epc_estado`) VALUES
(1, 1, '2017-04-27 17:28:31', 'Cuidados Intensivos', '001', '05', 'SARAMPION', 'Muy mal', '- Examen de la Vista', 'ESPALDA', 'va mejorando', 'Ya esta mejor', 'Salio Bien', 'en la cara', 'Problemas al respirar', NULL, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `exp_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `tpc_id` int(11) DEFAULT NULL,
  `exp_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exp_pulso` varchar(20) DEFAULT NULL,
  `exp_tension_arterial` varchar(20) DEFAULT NULL,
  `exp_frecuencia_cardiaca` varchar(20) DEFAULT NULL,
  `exp_frecuencia_reumatoide` varchar(20) DEFAULT NULL,
  `exp_estatura` float DEFAULT NULL,
  `exp_peso` float DEFAULT NULL,
  `exp_indice_masa_corporal` float DEFAULT NULL,
  `exp_evolucion` varchar(1000) DEFAULT NULL,
  `exp_sintomas` varchar(80) DEFAULT NULL,
  `exp_enfermedad` varchar(50) DEFAULT NULL,
  `exp_detalle_enfermedad` varchar(50) DEFAULT NULL,
  `exp_orden_examen` char(15) DEFAULT NULL,
  `exp_detalle_orden` varchar(1000) DEFAULT NULL,
  `exp_tratamiento` varchar(1000) DEFAULT NULL,
  `exp_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`exp_id`, `p_id`, `tpc_id`, `exp_fecha_registro`, `exp_pulso`, `exp_tension_arterial`, `exp_frecuencia_cardiaca`, `exp_frecuencia_reumatoide`, `exp_estatura`, `exp_peso`, `exp_indice_masa_corporal`, `exp_evolucion`, `exp_sintomas`, `exp_enfermedad`, `exp_detalle_enfermedad`, `exp_orden_examen`, `exp_detalle_orden`, `exp_tratamiento`, `exp_estado`) VALUES
(1, 1, NULL, '2017-04-27 17:20:24', 'Sobre 30', 'sobre 50', '40', 'sobre 45', 1.65, 120, 100, 'Sigue empeorando', 'Malestar estomacal', 'Parasitos', 'Muy mal', 'SI', 'Urgente', 'Reposo Absoluto', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `f_id` int(11) NOT NULL,
  `f_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `f_nombre` varchar(25) NOT NULL,
  `f_estado` varchar(45) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`f_id`, `f_fecha_registro`, `f_nombre`, `f_estado`) VALUES
(1, '2017-04-25 05:19:09', 'RATENSA', 'ACTIVO'),
(2, '2017-04-27 21:14:54', 'TORREN', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `frm_id` int(11) NOT NULL,
  `men_id` int(11) NOT NULL,
  `frm_nombre` varchar(50) NOT NULL,
  `frm_descripcion` varchar(100) DEFAULT NULL,
  `frm_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `frm_controlador` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`frm_id`, `men_id`, `frm_nombre`, `frm_descripcion`, `frm_estado`, `frm_controlador`) VALUES
(1, 1, 'Menus', 'Gestion de los Menus', 'ACTIVO', 'Menu'),
(2, 1, 'Formularios', 'Gestion de los Formularios', 'ACTIVO', 'Formulario'),
(3, 1, 'Usuarios', 'Gestion de los Usuarios', 'ACTIVO', 'Usuario'),
(4, 1, 'Perfiles', 'Gestion de los Perfiles de los usuarios', 'ACTIVO', 'Perfil'),
(5, 3, 'Pacientes', 'Datos del paciente', 'ACTIVO', 'Paciente'),
(6, 6, 'Citas Medicas', 'Control de las citas', 'ACTIVO', 'CitaMedica'),
(9, 3, 'Embarazo', 'Casos de Embarazos', 'ACTIVO', 'Embarazo'),
(10, 3, 'Epicrisis', 'Historial del paciente', 'ACTIVO', 'Epicrisis'),
(11, 5, 'Medicamentos', 'Control de los medicamentos', 'ACTIVO', 'Medicamento'),
(12, 4, 'Personal  del Dispensario', 'Control sobre el personal de cada empleado', 'ACTIVO', 'PersonalDispensario'),
(13, 5, 'Proveedor de Medicamentos', 'Control de Proveedores de los medicamentos', 'ACTIVO', 'ProveedorMedicamento'),
(14, 6, 'Tipos de Consultas', 'Tipos de consulta, por especialidad', 'ACTIVO', 'TipoConsulta'),
(15, 4, 'Tipo de Personal', 'Descripción del personal interno de la clínica', 'INACTIVO', 'TipoPersonal'),
(16, 3, 'Vacunas', 'Control de vacunas', 'ACTIVO', 'Vacuna'),
(17, 6, 'Consultas', 'Consultas de los pacientes', 'ACTIVO', 'Expediente'),
(18, 7, 'Reportes de Expediente', 'Reportes del expediente de cada paciente', 'ACTIVO', 'ReporteExpediente'),
(20, 7, 'Reporte Factura', 'Creación de Factura', 'INACTIVO', 'ReporteFactura'),
(21, 7, 'Reporte Cita Médica', 'Creación de cita medíca', 'ACTIVO', 'ReporteCitaMedica'),
(22, 7, 'Reporte de Embarazo', '', 'ACTIVO', 'ReporteEmbarazo'),
(23, 7, 'Reporte de Epicrísis', '', 'ACTIVO', 'ReporteEpicrisis'),
(25, 3, 'Antecedentes Familiares', 'Antecendentes de los familiares de los pacientes', 'ACTIVO', 'AntecedenteFamiliar'),
(26, 8, 'Facturas', 'Detalle de las facturas', 'ACTIVO', 'DetalleFactura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_medicamento`
--

CREATE TABLE `inventario_medicamento` (
  `ivm_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `ivm_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ivm_fecha_emision` timestamp NULL DEFAULT NULL,
  `ivm_fecha_caducidad` timestamp NULL DEFAULT NULL,
  `ivm_descripcion` varchar(50) DEFAULT NULL,
  `ivm_existencia` int(11) NOT NULL,
  `ivm_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `lb_id` int(11) NOT NULL,
  `lb_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `lb_nombre` varchar(25) NOT NULL,
  `lb_estado` varchar(45) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`lb_id`, `lb_fecha_registro`, `lb_nombre`, `lb_estado`) VALUES
(1, '2017-04-27 19:35:37', 'RAMO', 'ACTIVO'),
(2, '2017-04-30 00:13:53', 'PEREZ', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `m_id` int(11) NOT NULL,
  `m_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `m_nombre` varchar(25) NOT NULL,
  `m_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`m_id`, `m_fecha_registro`, `m_nombre`, `m_estado`) VALUES
(1, '2017-04-27 19:36:02', 'TRISH', 'ACTIVO'),
(2, '2017-04-30 00:14:04', 'ZELSA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `mct_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `ps_id` int(11) DEFAULT NULL,
  `um_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `lb_id` int(11) DEFAULT NULL,
  `mct_fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `mct_lote` varchar(20) DEFAULT NULL,
  `mct_nombre` varchar(20) DEFAULT NULL,
  `mct_gramo` varchar(15) DEFAULT NULL,
  `mct_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`mct_id`, `m_id`, `ps_id`, `um_id`, `f_id`, `lb_id`, `mct_fecha_registro`, `mct_lote`, `mct_nombre`, `mct_gramo`, `mct_estado`) VALUES
(1, 1, 2, 1, 2, 1, '2017-04-27 19:39:02', '00234H', 'YUMIX', '1500 grm', 'ACTIVO'),
(2, 2, 1, 2, 1, 2, '2017-04-28 02:24:17', '00328', 'ULTIMO', '30', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `men_id` int(11) NOT NULL,
  `men_nombre` varchar(50) NOT NULL,
  `men_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `men_pos` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`men_id`, `men_nombre`, `men_estado`, `men_pos`) VALUES
(1, 'Administracion Interna', 'ACTIVO', NULL),
(3, 'Expediente Paciente', 'ACTIVO', NULL),
(4, 'Personal  Interno', 'ACTIVO', NULL),
(5, 'Medicamento', 'ACTIVO', NULL),
(6, 'Gestión de Consultas', 'ACTIVO', NULL),
(7, 'Reportes', 'ACTIVO', NULL),
(8, 'Facturación', 'ACTIVO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_form`
--

CREATE TABLE `menu_form` (
  `mxf_id` int(11) NOT NULL,
  `men_id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `mxf_pos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `mv_id` int(11) NOT NULL,
  `cmv_id` int(10) DEFAULT NULL,
  `ivm_id` int(11) DEFAULT NULL,
  `mv_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `mv_cantidad` char(10) NOT NULL,
  `cmv_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `p_id` int(11) NOT NULL,
  `p_num_expediente` varchar(15) NOT NULL,
  `p_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_nombre_paciente` varchar(20) NOT NULL,
  `p_apellido_paciente` varchar(30) NOT NULL,
  `p_fecha_nacimiento` timestamp NULL DEFAULT NULL,
  `p_cedula` varchar(15) DEFAULT NULL,
  `p_celular` varchar(20) DEFAULT NULL,
  `p_telefono` varchar(20) DEFAULT NULL,
  `p_correo` varchar(20) DEFAULT NULL,
  `p_direccion` varchar(60) NOT NULL,
  `p_estado_civil` varchar(10) NOT NULL,
  `p_tipo_sangre` varchar(10) NOT NULL,
  `p_sexo` char(10) NOT NULL,
  `p_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`p_id`, `p_num_expediente`, `p_fecha_registro`, `p_nombre_paciente`, `p_apellido_paciente`, `p_fecha_nacimiento`, `p_cedula`, `p_celular`, `p_telefono`, `p_correo`, `p_direccion`, `p_estado_civil`, `p_tipo_sangre`, `p_sexo`, `p_estado`) VALUES
(1, '2012-001', '2017-04-26 01:08:13', 'Marta', 'Martinez', '1990-07-12 06:00:00', '001-210982-009U', '86680546', '223456678', 'kari89@gmail.com', 'Villa Venezuela', 'Soltera', 'O -', 'FEMENINO', 'ACTIVO'),
(2, '009-23', '2017-05-01 01:35:50', 'MARTHA', 'URTADO', '1989-06-12 06:00:00', '002-0834390-DFL', '8853648', '22646595', 'mar@gmail.com', 'Bo. Linda Vista', 'SOLTERA', 'O +', 'FEMENINO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `ps_id` int(11) NOT NULL,
  `ps_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ps_nombre` varchar(45) NOT NULL,
  `ps_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`ps_id`, `ps_fecha_registro`, `ps_nombre`, `ps_estado`) VALUES
(1, '2017-04-27 19:36:53', 'SALVADOR', 'ACTIVO'),
(2, '2017-04-27 23:10:28', 'PANAMA', 'ACTIVO'),
(3, '2020-11-20 15:26:34', 'COSTARICA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `prf_id` int(11) NOT NULL,
  `prf_nombre` varchar(50) NOT NULL,
  `prf_descripcion` varchar(100) NOT NULL,
  `prf_fecha_habilitar` timestamp NOT NULL DEFAULT current_timestamp(),
  `prf_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`prf_id`, `prf_nombre`, `prf_descripcion`, `prf_fecha_habilitar`, `prf_estado`) VALUES
(1, 'Administrador', 'Super admin', '2017-04-20 17:40:25', 'ACTIVO'),
(2, 'Comun', 'Usuario Comun', '2017-04-29 13:14:01', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usu`
--

CREATE TABLE `perfil_usu` (
  `pxu_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `prf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_dispensario`
--

CREATE TABLE `personal_dispensario` (
  `pd_id` int(11) NOT NULL,
  `tp_id` int(11) DEFAULT NULL,
  `pd_cod_minsa` varchar(15) NOT NULL,
  `pd_nombres` varchar(50) NOT NULL,
  `pd_apellidos` varchar(50) NOT NULL,
  `pd_sexo` char(10) NOT NULL,
  `pd_fecha_registro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pd_fecha_nac` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pd_cedula` varchar(50) NOT NULL,
  `pd_est_civil` varchar(15) NOT NULL,
  `pd_email` varchar(50) NOT NULL,
  `pd_celular` varchar(50) NOT NULL,
  `pd_telf_convencional` varchar(50) NOT NULL,
  `pd_nacionalidad` varchar(20) DEFAULT NULL,
  `pd_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prf_form`
--

CREATE TABLE `prf_form` (
  `prfm_id` int(11) NOT NULL,
  `prf_id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `prfm_lectura` char(1) DEFAULT NULL,
  `prfm_inserta` char(1) DEFAULT NULL,
  `prfm_actualiza` char(1) DEFAULT NULL,
  `prfm_elimina` char(1) DEFAULT NULL,
  `prfm_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prf_form`
--

INSERT INTO `prf_form` (`prfm_id`, `prf_id`, `frm_id`, `prfm_lectura`, `prfm_inserta`, `prfm_actualiza`, `prfm_elimina`, `prfm_estado`) VALUES
(29, 1, 1, '1', '1', '1', '0', 'ACTIVO'),
(30, 1, 2, '1', '1', '1', '0', 'ACTIVO'),
(31, 1, 3, '1', '1', '1', '1', 'ACTIVO'),
(32, 1, 4, '1', '1', '1', '1', 'ACTIVO'),
(33, 1, 5, '1', '1', '1', '1', 'ACTIVO'),
(34, 1, 6, '1', '1', '1', '1', 'ACTIVO'),
(37, 1, 9, '1', '1', '1', '1', 'ACTIVO'),
(38, 1, 10, '1', '1', '1', '1', 'ACTIVO'),
(39, 1, 11, '1', '1', '1', '1', 'ACTIVO'),
(40, 1, 12, '1', '1', '1', '1', 'ACTIVO'),
(41, 1, 13, '1', '1', '1', '1', 'ACTIVO'),
(42, 1, 15, '1', '1', '1', '1', 'ACTIVO'),
(43, 1, 14, '1', '1', '1', '1', 'ACTIVO'),
(44, 1, 16, '1', '1', '1', '1', 'ACTIVO'),
(45, 1, 17, '1', '1', '1', '1', 'ACTIVO'),
(46, 1, 18, '1', '1', '1', '1', 'ACTIVO'),
(48, 1, 21, '1', '1', '1', '0', 'ACTIVO'),
(49, 1, 22, '1', '1', '1', '0', 'ACTIVO'),
(50, 1, 23, '1', '1', '1', '0', 'ACTIVO'),
(51, 1, 20, '1', '1', '1', '0', 'ACTIVO'),
(52, 2, 6, '1', '1', '1', '0', 'ACTIVO'),
(54, 1, 25, '1', '1', '1', '1', 'ACTIVO'),
(55, 1, 26, '1', '1', '1', '1', 'ACTIVO'),
(56, 2, 17, '1', '1', '1', '0', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_medicamento`
--

CREATE TABLE `proveedor_medicamento` (
  `pm_id` int(11) NOT NULL,
  `pm_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `pm_nombre` varchar(20) DEFAULT NULL,
  `pm_apellido` varchar(30) NOT NULL,
  `pm_cedula` varchar(15) DEFAULT NULL,
  `pm_celular` varchar(20) DEFAULT NULL,
  `pm_telefono` varchar(20) DEFAULT NULL,
  `pm_correo` varchar(20) DEFAULT NULL,
  `pm_direccion` varchar(40) DEFAULT NULL,
  `pm_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_medicamento`
--

INSERT INTO `proveedor_medicamento` (`pm_id`, `pm_fecha_registro`, `pm_nombre`, `pm_apellido`, `pm_cedula`, `pm_celular`, `pm_telefono`, `pm_correo`, `pm_direccion`, `pm_estado`) VALUES
(1, '2017-04-27 19:13:05', 'Manuel', 'Fariña', '001-290197-003U', '863440263', '238364547', 'aguirretellez96@gmai', 'Villa Flor Norte', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_consulta`
--

CREATE TABLE `tipo_consulta` (
  `tpc_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `exp_id` int(10) DEFAULT NULL,
  `tpc_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tpc_tipo_especialidad_consulta` varchar(20) DEFAULT NULL,
  `tcp_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_consulta`
--

INSERT INTO `tipo_consulta` (`tpc_id`, `p_id`, `exp_id`, `tpc_fecha_registro`, `tpc_tipo_especialidad_consulta`, `tcp_estado`) VALUES
(1, 1, NULL, '2017-05-01 01:51:48', 'CARDIOLOGÍA', 'ACTIVO'),
(2, 2, NULL, '2017-05-01 01:51:48', 'PEDIATRÍA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_personal`
--

CREATE TABLE `tipo_personal` (
  `tp_id` int(11) NOT NULL,
  `tp_fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `tp_tipo_personal` varchar(50) NOT NULL,
  `tp_especialidad` varchar(25) DEFAULT NULL,
  `tp_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_personal`
--

INSERT INTO `tipo_personal` (`tp_id`, `tp_fecha_registro`, `tp_tipo_personal`, `tp_especialidad`, `tp_estado`) VALUES
(9, '2017-04-29 22:06:24', 'Doctor', 'PEDIATRA', 'ACTIVO'),
(11, '2017-04-29 22:51:13', 'SECRETARIA', 'NINGUNA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `um_id` int(11) NOT NULL,
  `um_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `um_nombre` varchar(25) NOT NULL,
  `um_estado` varchar(10) DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`um_id`, `um_fecha_registro`, `um_nombre`, `um_estado`) VALUES
(1, '2017-04-27 19:36:28', 'PASTILLAS', 'ACTIVO'),
(2, '2017-04-30 00:14:15', 'FRASCO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `prf_id` int(11) NOT NULL,
  `pd_id` int(11) DEFAULT NULL,
  `usu_username` varchar(50) NOT NULL,
  `usu_contrasena` varchar(50) NOT NULL,
  `usu_fecha_inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `usu_fecha_caducidad` timestamp NULL DEFAULT NULL,
  `usu_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `emp_id`, `prf_id`, `pd_id`, `usu_username`, `usu_contrasena`, `usu_fecha_inicio`, `usu_fecha_caducidad`, `usu_estado`) VALUES
(1, NULL, 1, NULL, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2017-03-23 16:22:15', NULL, 'ACTIVO'),
(2, NULL, 2, NULL, 'usu_comun', '81dc9bdb52d04dc20036dbd8313ed055', '2020-11-20 19:51:13', NULL, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `v_id` int(11) NOT NULL,
  `p_id` int(10) DEFAULT NULL,
  `v_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `v_fecha_vacuna` timestamp NULL DEFAULT NULL,
  `v_nombre_vacuna` varchar(50) NOT NULL,
  `v_notas` varchar(100) NOT NULL,
  `v_estado` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`v_id`, `p_id`, `v_fecha_registro`, `v_fecha_vacuna`, `v_nombre_vacuna`, `v_notas`, `v_estado`) VALUES
(1, 1, '2017-04-27 17:22:40', '2017-04-27 06:00:00', 'Sarampion', 'Sarampión segunda fase', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  ADD PRIMARY KEY (`af_id`),
  ADD KEY `fk_antecedente_familiar` (`p_id`);

--
-- Indices de la tabla `catalogo_movimiento`
--
ALTER TABLE `catalogo_movimiento`
  ADD PRIMARY KEY (`cmv_id`);

--
-- Indices de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `fk_citas_medicas_tipo_personal` (`tp_id`),
  ADD KEY `fk_citas_medicas_expediente_Paciente` (`p_id`);

--
-- Indices de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`df_id`),
  ADD KEY `fk_detalle_factura_paciente1_idx` (`p_id`),
  ADD KEY `fk_detalle_factura_tipo_consulta1_idx` (`tpc_id`);

--
-- Indices de la tabla `detalle_proveedor_medicamento`
--
ALTER TABLE `detalle_proveedor_medicamento`
  ADD PRIMARY KEY (`dpm_id`),
  ADD KEY `fk_detalle_proveedor_medicamento_PM` (`pm_id`),
  ADD KEY `fk_detalle_proveedor_medicamento_tipo_medicamento1_idx` (`m_id`);

--
-- Indices de la tabla `embarazo`
--
ALTER TABLE `embarazo`
  ADD PRIMARY KEY (`emb_id`),
  ADD KEY `fk_embarazos` (`p_id`);

--
-- Indices de la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  ADD PRIMARY KEY (`epc_id`),
  ADD KEY `fk_Epicrisis_expediente_Paciente` (`p_id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `fk_Expediente_paciente1_idx` (`p_id`),
  ADD KEY `fk_expediente_tipo_consulta1_idx` (`tpc_id`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`f_id`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`frm_id`),
  ADD UNIQUE KEY `frm_controlador_UNIQUE` (`frm_controlador`),
  ADD KEY `fk_formulario_menu1_idx` (`men_id`);

--
-- Indices de la tabla `inventario_medicamento`
--
ALTER TABLE `inventario_medicamento`
  ADD PRIMARY KEY (`ivm_id`),
  ADD KEY `fk_inventario_medicamento_medicamento1_idx` (`m_id`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`m_id`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`mct_id`),
  ADD KEY `fk_tipo_medicamento_pais1_idx` (`ps_id`),
  ADD KEY `fk_tipo_medicamento_Unidad_Medida1_idx` (`um_id`),
  ADD KEY `fk_tipo_medicamento_Fabricante1_idx` (`f_id`),
  ADD KEY `fk_tipo_medicamento_Laboratorio1_idx` (`lb_id`),
  ADD KEY `fk_medicamento_marca1_idx` (`m_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`men_id`);

--
-- Indices de la tabla `menu_form`
--
ALTER TABLE `menu_form`
  ADD PRIMARY KEY (`mxf_id`),
  ADD KEY `menu_form_menu_fk` (`men_id`),
  ADD KEY `menu_form_formulario_fk` (`frm_id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`mv_id`),
  ADD KEY `fk_movimiento` (`cmv_id`),
  ADD KEY `fk_movimiento_inventario_medicamento1_idx` (`ivm_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`p_id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`prf_id`);

--
-- Indices de la tabla `perfil_usu`
--
ALTER TABLE `perfil_usu`
  ADD PRIMARY KEY (`pxu_id`),
  ADD KEY `perfil_usu_usuario_fk` (`usu_id`),
  ADD KEY `perfil_usu_perfil_fk` (`prf_id`);

--
-- Indices de la tabla `personal_dispensario`
--
ALTER TABLE `personal_dispensario`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `fk_personal_dispensario_tipo_personal` (`tp_id`);

--
-- Indices de la tabla `prf_form`
--
ALTER TABLE `prf_form`
  ADD PRIMARY KEY (`prfm_id`),
  ADD KEY `prf_form_formulario_fk` (`frm_id`),
  ADD KEY `prf_form_perfil_fk` (`prf_id`);

--
-- Indices de la tabla `proveedor_medicamento`
--
ALTER TABLE `proveedor_medicamento`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indices de la tabla `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  ADD PRIMARY KEY (`tpc_id`),
  ADD KEY `fk_tipo_consulta` (`exp_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indices de la tabla `tipo_personal`
--
ALTER TABLE `tipo_personal`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`um_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `fk_usuario_perfil1_idx` (`prf_id`),
  ADD KEY `fk_usuario_personal_dispensario1_idx` (`pd_id`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `fk_vacuna` (`p_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  MODIFY `af_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `catalogo_movimiento`
--
ALTER TABLE `catalogo_movimiento`
  MODIFY `cmv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `df_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `detalle_proveedor_medicamento`
--
ALTER TABLE `detalle_proveedor_medicamento`
  MODIFY `dpm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `embarazo`
--
ALTER TABLE `embarazo`
  MODIFY `emb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  MODIFY `epc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `frm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `inventario_medicamento`
--
ALTER TABLE `inventario_medicamento`
  MODIFY `ivm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `mct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `men_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `menu_form`
--
ALTER TABLE `menu_form`
  MODIFY `mxf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `mv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `prf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil_usu`
--
ALTER TABLE `perfil_usu`
  MODIFY `pxu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_dispensario`
--
ALTER TABLE `personal_dispensario`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prf_form`
--
ALTER TABLE `prf_form`
  MODIFY `prfm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `proveedor_medicamento`
--
ALTER TABLE `proveedor_medicamento`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_personal`
--
ALTER TABLE `tipo_personal`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `um_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  ADD CONSTRAINT `fk_antecedente_familiar` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD CONSTRAINT `fk_citas_medicas_expediente_Paciente` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_medicas_tipo_personal` FOREIGN KEY (`tp_id`) REFERENCES `tipo_personal` (`tp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_detalle_factura_paciente` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_factura_tipo_consulta` FOREIGN KEY (`tpc_id`) REFERENCES `tipo_consulta` (`tpc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_proveedor_medicamento`
--
ALTER TABLE `detalle_proveedor_medicamento`
  ADD CONSTRAINT `fk_detalle_proveedor_medicamento_PM` FOREIGN KEY (`pm_id`) REFERENCES `proveedor_medicamento` (`pm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_proveedor_medicamento_tipo_medicamento1` FOREIGN KEY (`m_id`) REFERENCES `medicamento` (`mct_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `embarazo`
--
ALTER TABLE `embarazo`
  ADD CONSTRAINT `fk_embarazos` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  ADD CONSTRAINT `fk_Epicrisis_expediente_Paciente` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `fk_Expediente_paciente1` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_expediente_tipo_consulta1` FOREIGN KEY (`tpc_id`) REFERENCES `tipo_consulta` (`tpc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `fk_formulario_menu1` FOREIGN KEY (`men_id`) REFERENCES `menu` (`men_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_medicamento`
--
ALTER TABLE `inventario_medicamento`
  ADD CONSTRAINT `fk_inventario_medicamento_medicamento1` FOREIGN KEY (`m_id`) REFERENCES `medicamento` (`mct_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `fk_medicamento_marca1` FOREIGN KEY (`m_id`) REFERENCES `marca` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_medicamento_Fabricante1` FOREIGN KEY (`f_id`) REFERENCES `fabricante` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_medicamento_Laboratorio1` FOREIGN KEY (`lb_id`) REFERENCES `laboratorio` (`lb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_medicamento_Unidad_Medida1` FOREIGN KEY (`um_id`) REFERENCES `unidad_medida` (`um_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_medicamento_pais1` FOREIGN KEY (`ps_id`) REFERENCES `pais` (`ps_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_form`
--
ALTER TABLE `menu_form`
  ADD CONSTRAINT `menu_form_formulario_fk` FOREIGN KEY (`frm_id`) REFERENCES `formulario` (`frm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_form_menu_fk` FOREIGN KEY (`men_id`) REFERENCES `menu` (`men_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento` FOREIGN KEY (`cmv_id`) REFERENCES `catalogo_movimiento` (`cmv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_inventario_medicamento1` FOREIGN KEY (`ivm_id`) REFERENCES `inventario_medicamento` (`ivm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_usu`
--
ALTER TABLE `perfil_usu`
  ADD CONSTRAINT `perfil_usu_perfil_fk` FOREIGN KEY (`prf_id`) REFERENCES `perfil` (`prf_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_usu_usuario_fk` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_dispensario`
--
ALTER TABLE `personal_dispensario`
  ADD CONSTRAINT `fk_personal_dispensario_tipo_personal` FOREIGN KEY (`tp_id`) REFERENCES `tipo_personal` (`tp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prf_form`
--
ALTER TABLE `prf_form`
  ADD CONSTRAINT `prf_form_formulario_fk` FOREIGN KEY (`frm_id`) REFERENCES `formulario` (`frm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prf_form_perfil_fk` FOREIGN KEY (`prf_id`) REFERENCES `perfil` (`prf_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  ADD CONSTRAINT `p_id` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`prf_id`) REFERENCES `perfil` (`prf_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_personal_dispensario1` FOREIGN KEY (`pd_id`) REFERENCES `personal_dispensario` (`pd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD CONSTRAINT `fk_vacuna` FOREIGN KEY (`p_id`) REFERENCES `paciente` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
