-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2021 a las 23:36:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_clinicadental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `foto`, `rol`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin', '', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_consultorio` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nyaP` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `colorCita` text COLLATE utf8_spanish_ci NOT NULL DEFAULT '#123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `diagnostico` text NOT NULL,
  `cie` text NOT NULL,
  `pre_def` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `id_consultorio` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `cedula_doctor` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `sexo` text COLLATE utf8_spanish_ci NOT NULL,
  `horarioE` time NOT NULL,
  `horarioS` time NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL,
  `colorCita` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nombre_especialidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinicatest`
--

CREATE TABLE `historiaclinicatest` (
  `id` int(11) NOT NULL,
  `establecimiento` text COLLATE utf8_spanish_ci NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `sexo` text COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `numero` text COLLATE utf8_spanish_ci NOT NULL,
  `menor_1_anio` int(1) NOT NULL DEFAULT 0,
  `1_4_anios` int(1) NOT NULL DEFAULT 0,
  `5_9_anios_prog` int(1) NOT NULL DEFAULT 0,
  `5_14_anios_prog` int(1) NOT NULL DEFAULT 0,
  `10_14_anios_prog` int(1) NOT NULL DEFAULT 0,
  `5_a_19_anios` int(1) NOT NULL DEFAULT 0,
  `mayor_20_anios` int(1) NOT NULL DEFAULT 0,
  `embarazada` int(1) NOT NULL DEFAULT 0,
  `motivo_consulta` text COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad_problema_actual` text COLLATE utf8_spanish_ci NOT NULL,
  `alergia_antibiotico` int(11) NOT NULL,
  `alergia_anestesia` int(11) NOT NULL,
  `hemorragias` int(11) NOT NULL,
  `vih_sida` int(11) NOT NULL,
  `tuberculosis` int(11) NOT NULL,
  `asma` int(11) NOT NULL,
  `diabetes` int(11) NOT NULL,
  `hipertension` int(11) NOT NULL,
  `enf_cardiaca` int(11) NOT NULL,
  `otro_antecedentes` int(11) NOT NULL,
  `especificaciones_antecedentes` text COLLATE utf8_spanish_ci NOT NULL,
  `presion_arterial` text COLLATE utf8_spanish_ci NOT NULL,
  `frecuencia_cardiaca` text COLLATE utf8_spanish_ci NOT NULL,
  `temperatura` text COLLATE utf8_spanish_ci NOT NULL,
  `f_respiratoria` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones_signos_vitales` text COLLATE utf8_spanish_ci NOT NULL,
  `labios` int(11) NOT NULL,
  `mejillas` int(11) NOT NULL,
  `maxilar_superior` int(11) NOT NULL,
  `maxilar_inferior` int(11) NOT NULL,
  `lengua` int(11) NOT NULL,
  `paladar` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `carrillos` int(11) NOT NULL,
  `gandulas_salivales` int(11) NOT NULL,
  `oro_faringe` int(11) NOT NULL,
  `atm` int(11) NOT NULL,
  `ganglios` int(11) NOT NULL,
  `especificaciones_estomatognatico` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones_odontograma` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_55` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_55` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_55` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_55` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_55` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_54` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_54` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_54` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_54` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_54` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_53` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_53` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_53` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_53` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_53` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_52` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_52` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_52` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_52` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_52` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_51` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_51` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_51` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_51` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_51` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_61` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_61` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_61` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_61` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_61` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_62` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_62` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_62` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_62` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_62` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_63` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_63` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_63` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_63` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_63` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_65` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_65` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_65` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_65` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_65` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_85` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_85` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_85` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_85` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_85` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_84` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_84` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_84` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_84` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_84` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_83` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_83` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_83` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_83` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_83` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_82` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_82` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_82` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_82` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_82` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_81` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_81` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_81` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_81` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_81` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_71` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_71` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_71` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_71` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_71` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_72` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_72` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_72` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_72` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_72` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_73` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_73` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_73` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_73` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_73` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_74` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_74` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_74` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_74` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_74` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_75` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_75` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_75` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_75` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_75` text COLLATE utf8_spanish_ci NOT NULL,
  `l_sup_64` text COLLATE utf8_spanish_ci NOT NULL,
  `l_der_64` text COLLATE utf8_spanish_ci NOT NULL,
  `l_inf_64` text COLLATE utf8_spanish_ci NOT NULL,
  `l_izq_64` text COLLATE utf8_spanish_ci NOT NULL,
  `l_cen_64` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_18` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_18` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_18` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_18` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_18` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_17` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_17` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_17` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_17` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_17` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_16` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_16` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_16` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_16` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_16` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_15` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_15` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_15` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_15` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_15` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_14` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_14` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_14` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_14` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_14` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_13` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_13` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_13` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_13` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_13` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_12` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_12` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_12` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_12` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_12` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_11` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_11` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_11` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_11` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_11` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_21` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_21` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_21` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_21` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_21` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_22` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_22` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_22` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_22` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_22` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_23` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_23` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_23` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_23` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_23` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_24` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_24` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_24` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_24` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_24` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_25` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_25` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_25` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_25` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_25` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_26` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_26` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_26` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_26` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_26` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_27` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_27` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_27` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_27` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_27` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_28` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_28` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_28` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_28` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_28` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_48` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_48` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_48` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_48` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_48` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_47` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_47` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_47` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_47` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_47` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_46` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_46` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_46` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_46` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_46` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_45` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_45` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_45` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_45` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_45` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_44` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_44` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_44` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_44` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_44` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_43` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_43` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_43` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_43` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_43` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_42` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_42` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_42` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_42` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_42` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_41` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_41` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_41` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_41` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_41` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_31` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_31` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_31` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_31` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_31` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_32` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_32` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_32` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_32` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_32` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_33` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_33` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_33` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_33` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_33` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_34` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_34` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_34` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_34` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_34` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_35` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_35` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_35` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_35` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_35` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_36` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_36` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_36` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_36` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_36` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_37` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_37` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_37` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_37` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_37` text COLLATE utf8_spanish_ci NOT NULL,
  `v_sup_38` text COLLATE utf8_spanish_ci NOT NULL,
  `v_der_38` text COLLATE utf8_spanish_ci NOT NULL,
  `v_inf_38` text COLLATE utf8_spanish_ci NOT NULL,
  `v_izq_38` text COLLATE utf8_spanish_ci NOT NULL,
  `v_cen_38` text COLLATE utf8_spanish_ci NOT NULL,
  `recesion_1_01` int(11) NOT NULL,
  `recesion_1_02` int(11) NOT NULL,
  `recesion_1_03` int(11) NOT NULL,
  `recesion_1_04` int(11) NOT NULL,
  `recesion_1_05` int(11) NOT NULL,
  `recesion_1_06` int(11) NOT NULL,
  `recesion_1_07` int(11) NOT NULL,
  `recesion_1_08` int(11) NOT NULL,
  `recesion_1_09` int(11) NOT NULL,
  `recesion_1_10` int(11) NOT NULL,
  `recesion_1_11` int(11) NOT NULL,
  `recesion_1_12` int(11) NOT NULL,
  `recesion_1_13` int(11) NOT NULL,
  `recesion_1_14` int(11) NOT NULL,
  `recesion_1_15` int(11) NOT NULL,
  `recesion_1_16` int(11) NOT NULL,
  `recesion_2_01` int(11) NOT NULL,
  `recesion_2_02` int(11) NOT NULL,
  `recesion_2_03` int(11) NOT NULL,
  `recesion_2_04` int(11) NOT NULL,
  `recesion_2_05` int(11) NOT NULL,
  `recesion_2_06` int(11) NOT NULL,
  `recesion_2_07` int(11) NOT NULL,
  `recesion_2_08` int(11) NOT NULL,
  `recesion_2_09` int(11) NOT NULL,
  `recesion_2_10` int(11) NOT NULL,
  `recesion_2_11` int(11) NOT NULL,
  `recesion_2_12` int(11) NOT NULL,
  `recesion_2_13` int(11) NOT NULL,
  `recesion_2_14` int(11) NOT NULL,
  `recesion_2_15` int(11) NOT NULL,
  `recesion_2_16` int(11) NOT NULL,
  `movilidad_1_01` int(11) NOT NULL,
  `movilidad_1_02` int(11) NOT NULL,
  `movilidad_1_03` int(11) NOT NULL,
  `movilidad_1_04` int(11) NOT NULL,
  `movilidad_1_05` int(11) NOT NULL,
  `movilidad_1_06` int(11) NOT NULL,
  `movilidad_1_07` int(11) NOT NULL,
  `movilidad_1_08` int(11) NOT NULL,
  `movilidad_1_09` int(11) NOT NULL,
  `movilidad_1_10` int(11) NOT NULL,
  `movilidad_1_11` int(11) NOT NULL,
  `movilidad_1_12` int(11) NOT NULL,
  `movilidad_1_13` int(11) NOT NULL,
  `movilidad_1_14` int(11) NOT NULL,
  `movilidad_1_15` int(11) NOT NULL,
  `movilidad_1_16` int(11) NOT NULL,
  `movilidad_2_01` int(11) NOT NULL,
  `movilidad_2_02` int(11) NOT NULL,
  `movilidad_2_03` int(11) NOT NULL,
  `movilidad_2_04` int(11) NOT NULL,
  `movilidad_2_05` int(11) NOT NULL,
  `movilidad_2_06` int(11) NOT NULL,
  `movilidad_2_07` int(11) NOT NULL,
  `movilidad_2_08` int(11) NOT NULL,
  `movilidad_2_09` int(11) NOT NULL,
  `movilidad_2_10` int(11) NOT NULL,
  `movilidad_2_11` int(11) NOT NULL,
  `movilidad_2_12` int(11) NOT NULL,
  `movilidad_2_13` int(11) NOT NULL,
  `movilidad_2_14` int(11) NOT NULL,
  `movilidad_2_15` int(11) NOT NULL,
  `movilidad_2_16` int(11) NOT NULL,
  `pieza_dental_16` int(11) NOT NULL,
  `pieza_dental_17` int(11) NOT NULL,
  `pieza_dental_55` int(11) NOT NULL,
  `pieza_dental_11` int(11) NOT NULL,
  `pieza_dental_21` int(11) NOT NULL,
  `pieza_dental_51` int(11) NOT NULL,
  `pieza_dental_26` int(11) NOT NULL,
  `pieza_dental_27` int(11) NOT NULL,
  `pieza_dental_65` int(11) NOT NULL,
  `pieza_dental_36` int(11) NOT NULL,
  `pieza_dental_37` int(11) NOT NULL,
  `pieza_dental_75` int(11) NOT NULL,
  `pieza_dental_31` int(11) NOT NULL,
  `pieza_dental_41` int(11) NOT NULL,
  `pieza_dental_71` int(11) NOT NULL,
  `pieza_dental_46` int(11) NOT NULL,
  `pieza_dental_47` int(11) NOT NULL,
  `pieza_dental_85` int(11) NOT NULL,
  `placa_01` int(11) NOT NULL,
  `placa_02` int(11) NOT NULL,
  `placa_03` int(11) NOT NULL,
  `placa_04` int(11) NOT NULL,
  `placa_05` int(11) NOT NULL,
  `placa_06` int(11) NOT NULL,
  `placa_total` int(11) NOT NULL,
  `calculo_01` int(11) NOT NULL,
  `calculo_02` int(11) NOT NULL,
  `calculo_03` int(11) NOT NULL,
  `calculo_04` int(11) NOT NULL,
  `calculo_05` int(11) NOT NULL,
  `calculo_06` int(11) NOT NULL,
  `calculo_total` int(11) NOT NULL,
  `gingivitis_01` int(11) NOT NULL,
  `gingivitis_02` int(11) NOT NULL,
  `gingivitis_03` int(11) NOT NULL,
  `gingivitis_04` int(11) NOT NULL,
  `gingivitis_05` int(11) NOT NULL,
  `gingivitis_06` int(11) NOT NULL,
  `gingivitis_total` int(11) NOT NULL,
  `enf_periodontal_leve` int(11) NOT NULL,
  `enf_periodontal_moderada` int(11) NOT NULL,
  `enf_periodontal_severa` int(11) NOT NULL,
  `mal_oclusion_angleI` int(11) NOT NULL,
  `mal_oclusion_angleII` int(11) NOT NULL,
  `mal_oclusion_angleIII` int(11) NOT NULL,
  `fluorosis_leve` int(11) NOT NULL,
  `fluorosis_moderada` int(11) NOT NULL,
  `fluorosis_severa` int(11) NOT NULL,
  `indices_CPO_C` int(11) NOT NULL,
  `indices_CPO_P` int(11) NOT NULL,
  `indices_CPO_O` int(11) NOT NULL,
  `indices_ceo_c` int(11) NOT NULL,
  `indices_ceo_e` int(11) NOT NULL,
  `indices_ceo_o` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `intro` text COLLATE utf8_spanish_ci NOT NULL,
  `horaE` time NOT NULL,
  `horaS` time NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `favicon` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `intro`, `horaE`, `horaS`, `telefono`, `correo`, `direccion`, `logo`, `favicon`) VALUES
(1, 'Bienvenido a Nuestra clínica', '09:00:00', '19:00:00', '000000', 'clinica@clinicaaaa.com', 'San Antonio de Pichincha 1000', 'Vistas/img/logo.png', 'Vistas/img/favicon.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_01` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_02` text COLLATE utf8_spanish_ci NOT NULL,
  `e_mail` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarias`
--

CREATE TABLE `secretarias` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `biometria` int(11) NOT NULL,
  `quimica_sanguinea` int(11) NOT NULL,
  `rayos_x` int(11) NOT NULL,
  `otros` int(11) NOT NULL,
  `planes_descripcion` text NOT NULL,
  `fecha_apertura` date NOT NULL DEFAULT current_timestamp(),
  `fecha_control` date NOT NULL DEFAULT current_timestamp(),
  `profesional` text NOT NULL,
  `codigo` text NOT NULL,
  `firma` text NOT NULL,
  `numero_hoja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento_paciente`
--

CREATE TABLE `tratamiento_paciente` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `diagnostico_y_complicaciones` text NOT NULL,
  `procedimientos` text NOT NULL,
  `fecha_tratamiento` date NOT NULL DEFAULT current_timestamp(),
  `prescripciones` text NOT NULL,
  `codigo` text NOT NULL,
  `firma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historiaclinicatest`
--
ALTER TABLE `historiaclinicatest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente_fk` (`id_paciente`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamiento_paciente`
--
ALTER TABLE `tratamiento_paciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `historiaclinicatest`
--
ALTER TABLE `historiaclinicatest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tratamiento_paciente`
--
ALTER TABLE `tratamiento_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historiaclinicatest`
--
ALTER TABLE `historiaclinicatest`
  ADD CONSTRAINT `id_paciente_fk` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
