-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2017 at 10:13 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3085886_sue`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `nombre`, `descripcion`, `vigente`, `icono`) VALUES
(1, 'Textil', 'Textil', 1, 'fa fa-ticket'),
(2, 'Electrica', 'Electrica', 1, 'fa fa-ticket');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoria_empresa`
--

CREATE TABLE `tb_categoria_empresa` (
  `id_categoria_empresa` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_categoria_empresa`
--

INSERT INTO `tb_categoria_empresa` (`id_categoria_empresa`, `id_categoria`, `id_empresa`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 2),
(8, 1, 4),
(9, 2, 4),
(10, 3, 4),
(11, 3, 6),
(12, 1, 7),
(13, 3, 7),
(14, 1, 8),
(15, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comuna`
--

CREATE TABLE `tb_comuna` (
  `id_comuna` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `id_region` int(11) NOT NULL,
  `vigente` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_comuna`
--

INSERT INTO `tb_comuna` (`id_comuna`, `nombre`, `id_region`, `vigente`) VALUES
(1, 'Arica', 1, 0),
(2, 'Camarones', 1, 0),
(3, 'General Lagos', 1, 0),
(4, 'Putre', 1, 0),
(5, 'Alto Hospicio', 2, 0),
(6, 'Iquique', 2, 0),
(7, 'Camiña', 2, 0),
(8, 'Colchane', 2, 0),
(9, 'Huara', 2, 0),
(10, 'Pica', 2, 0),
(11, 'Pozo Almonte', 2, 0),
(12, 'Antofagasta', 3, 0),
(13, 'Mejillones', 3, 0),
(14, 'Sierra Gorda', 3, 0),
(15, 'Taltal', 3, 0),
(16, 'Calama', 3, 0),
(17, 'Ollague', 3, 0),
(18, 'San Pedro de Atacama', 3, 0),
(19, 'María Elena', 3, 0),
(20, 'Tocopilla', 3, 0),
(21, 'Chañaral', 4, 0),
(22, 'Diego de Almagro', 4, 0),
(23, 'Caldera', 4, 0),
(24, 'Copiapó', 4, 0),
(25, 'Tierra Amarilla', 4, 0),
(26, 'Alto del Carmen', 4, 0),
(27, 'Freirina', 4, 0),
(28, 'Huasco', 4, 0),
(29, 'Vallenar', 4, 0),
(30, 'Canela', 5, 0),
(31, 'Illapel', 5, 0),
(32, 'Los Vilos', 5, 0),
(33, 'Salamanca', 5, 0),
(34, 'Andacollo', 5, 0),
(35, 'Coquimbo', 5, 0),
(36, 'La Higuera', 5, 0),
(37, 'La Serena', 5, 0),
(38, 'Paihuaco', 5, 0),
(39, 'Vicuña', 5, 0),
(40, 'Combarbalá', 5, 0),
(41, 'Monte Patria', 5, 0),
(42, 'Ovalle', 5, 0),
(43, 'Punitaqui', 5, 0),
(44, 'Río Hurtado', 5, 0),
(45, 'Isla de Pascua', 6, 0),
(46, 'Calle Larga', 6, 0),
(47, 'Los Andes', 6, 0),
(48, 'Rinconada', 6, 0),
(49, 'San Esteban', 6, 0),
(50, 'La Ligua', 6, 0),
(51, 'Papudo', 6, 0),
(52, 'Petorca', 6, 0),
(53, 'Zapallar', 6, 0),
(54, 'Hijuelas', 6, 0),
(55, 'La Calera', 6, 0),
(56, 'La Cruz', 6, 0),
(57, 'Limache', 6, 0),
(58, 'Nogales', 6, 0),
(59, 'Olmué', 6, 0),
(60, 'Quillota', 6, 0),
(61, 'Algarrobo', 6, 0),
(62, 'Cartagena', 6, 0),
(63, 'El Quisco', 6, 0),
(64, 'El Tabo', 6, 0),
(65, 'San Antonio', 6, 0),
(66, 'Santo Domingo', 6, 0),
(67, 'Catemu', 6, 0),
(68, 'Llaillay', 6, 0),
(69, 'Panquehue', 6, 0),
(70, 'Putaendo', 6, 0),
(71, 'San Felipe', 6, 0),
(72, 'Santa María', 6, 0),
(73, 'Casablanca', 6, 0),
(74, 'Concón', 6, 0),
(75, 'Juan Fernández', 6, 0),
(76, 'Puchuncaví', 6, 0),
(77, 'Quilpué', 6, 0),
(78, 'Quintero', 6, 0),
(79, 'Valparaíso', 6, 0),
(80, 'Villa Alemana', 6, 0),
(81, 'Viña del Mar', 6, 0),
(82, 'Colina', 7, 0),
(83, 'Lampa', 7, 0),
(84, 'Tiltil', 7, 0),
(85, 'Pirque', 7, 0),
(86, 'Puente Alto', 7, 0),
(87, 'San José de Maipo', 7, 0),
(88, 'Buin', 7, 1),
(89, 'Calera de Tango', 7, 0),
(90, 'Paine', 7, 0),
(91, 'San Bernardo', 7, 0),
(92, 'Alhué', 7, 0),
(93, 'Curacaví', 7, 0),
(94, 'María Pinto', 7, 0),
(95, 'Melipilla', 7, 0),
(96, 'San Pedro', 7, 0),
(97, 'Cerrillos', 7, 0),
(98, 'Cerro Navia', 7, 0),
(99, 'Conchalí', 7, 0),
(100, 'El Bosque', 7, 0),
(101, 'Estación Central', 7, 0),
(102, 'Huechuraba', 7, 0),
(103, 'Independencia', 7, 0),
(104, 'La Cisterna', 7, 0),
(105, 'La Granja', 7, 0),
(106, 'La Florida', 7, 0),
(107, 'La Pintana', 7, 0),
(108, 'La Reina', 7, 0),
(109, 'Las Condes', 7, 0),
(110, 'Lo Barnechea', 7, 0),
(111, 'Lo Espejo', 7, 0),
(112, 'Lo Prado', 7, 0),
(113, 'Macul', 7, 0),
(114, 'Maipú', 7, 0),
(115, 'Ñuñoa', 7, 0),
(116, 'Pedro Aguirre Cerda', 7, 0),
(117, 'Peñalolén', 7, 0),
(118, 'Providencia', 7, 0),
(119, 'Pudahuel', 7, 0),
(120, 'Quilicura', 7, 0),
(121, 'Quinta Normal', 7, 0),
(122, 'Recoleta', 7, 0),
(123, 'Renca', 7, 0),
(124, 'San Miguel', 7, 0),
(125, 'San Joaquín', 7, 0),
(126, 'San Ramón', 7, 0),
(127, 'Santiago', 7, 0),
(128, 'Vitacura', 7, 0),
(129, 'El Monte', 7, 0),
(130, 'Isla de Maipo', 7, 0),
(131, 'Padre Hurtado', 7, 0),
(132, 'Peñaflor', 7, 0),
(133, 'Talagante', 7, 0),
(134, 'Codegua', 8, 0),
(135, 'Coínco', 8, 0),
(136, 'Coltauco', 8, 0),
(137, 'Doñihue', 8, 0),
(138, 'Graneros', 8, 0),
(139, 'Las Cabras', 8, 0),
(140, 'Machalí', 8, 0),
(141, 'Malloa', 8, 0),
(142, 'Mostazal', 8, 0),
(143, 'Olivar', 8, 0),
(144, 'Peumo', 8, 0),
(145, 'Pichidegua', 8, 0),
(146, 'Quinta de Tilcoco', 8, 0),
(147, 'Rancagua', 8, 0),
(148, 'Rengo', 8, 0),
(149, 'Requínoa', 8, 0),
(150, 'San Vicente de Tagua Tagua', 8, 0),
(151, 'La Estrella', 8, 0),
(152, 'Litueche', 8, 0),
(153, 'Marchihue', 8, 0),
(154, 'Navidad', 8, 0),
(155, 'Peredones', 8, 0),
(156, 'Pichilemu', 8, 0),
(157, 'Chépica', 8, 0),
(158, 'Chimbarongo', 8, 0),
(159, 'Lolol', 8, 0),
(160, 'Nancagua', 8, 0),
(161, 'Palmilla', 8, 0),
(162, 'Peralillo', 8, 0),
(163, 'Placilla', 8, 0),
(164, 'Pumanque', 8, 0),
(165, 'San Fernando', 8, 0),
(166, 'Santa Cruz', 8, 0),
(167, 'Cauquenes', 9, 0),
(168, 'Chanco', 9, 0),
(169, 'Pelluhue', 9, 0),
(170, 'Curicó', 9, 0),
(171, 'Hualañé', 9, 0),
(172, 'Licantén', 9, 0),
(173, 'Molina', 9, 0),
(174, 'Rauco', 9, 0),
(175, 'Romeral', 9, 0),
(176, 'Sagrada Familia', 9, 0),
(177, 'Teno', 9, 0),
(178, 'Vichuquén', 9, 0),
(179, 'Colbún', 9, 0),
(180, 'Linares', 9, 0),
(181, 'Longaví', 9, 0),
(182, 'Parral', 9, 0),
(183, 'Retiro', 9, 0),
(184, 'San Javier', 9, 0),
(185, 'Villa Alegre', 9, 0),
(186, 'Yerbas Buenas', 9, 0),
(187, 'Constitución', 9, 0),
(188, 'Curepto', 9, 0),
(189, 'Empedrado', 9, 0),
(190, 'Maule', 9, 0),
(191, 'Pelarco', 9, 0),
(192, 'Pencahue', 9, 0),
(193, 'Río Claro', 9, 0),
(194, 'San Clemente', 9, 0),
(195, 'San Rafael', 9, 0),
(196, 'Talca', 9, 0),
(197, 'Arauco', 10, 0),
(198, 'Cañete', 10, 0),
(199, 'Contulmo', 10, 0),
(200, 'Curanilahue', 10, 0),
(201, 'Lebu', 10, 0),
(202, 'Los Álamos', 10, 0),
(203, 'Tirúa', 10, 0),
(204, 'Alto Biobío', 10, 0),
(205, 'Antuco', 10, 0),
(206, 'Cabrero', 10, 0),
(207, 'Laja', 10, 0),
(208, 'Los Ángeles', 10, 0),
(209, 'Mulchén', 10, 0),
(210, 'Nacimiento', 10, 0),
(211, 'Negrete', 10, 0),
(212, 'Quilaco', 10, 0),
(213, 'Quilleco', 10, 0),
(214, 'San Rosendo', 10, 0),
(215, 'Santa Bárbara', 10, 0),
(216, 'Tucapel', 10, 0),
(217, 'Yumbel', 10, 0),
(218, 'Chiguayante', 10, 0),
(219, 'Concepción', 10, 0),
(220, 'Coronel', 10, 0),
(221, 'Florida', 10, 0),
(222, 'Hualpén', 10, 0),
(223, 'Hualqui', 10, 0),
(224, 'Lota', 10, 0),
(225, 'Penco', 10, 0),
(226, 'San Pedro de La Paz', 10, 0),
(227, 'Santa Juana', 10, 0),
(228, 'Talcahuano', 10, 0),
(229, 'Tomé', 10, 0),
(230, 'Bulnes', 10, 0),
(231, 'Chillán', 10, 0),
(232, 'Chillán Viejo', 10, 0),
(233, 'Cobquecura', 10, 0),
(234, 'Coelemu', 10, 0),
(235, 'Coihueco', 10, 0),
(236, 'El Carmen', 10, 0),
(237, 'Ninhue', 10, 0),
(238, 'Ñiquen', 10, 0),
(239, 'Pemuco', 10, 0),
(240, 'Pinto', 10, 0),
(241, 'Portezuelo', 10, 0),
(242, 'Quillón', 10, 0),
(243, 'Quirihue', 10, 0),
(244, 'Ránquil', 10, 0),
(245, 'San Carlos', 10, 0),
(246, 'San Fabián', 10, 0),
(247, 'San Ignacio', 10, 0),
(248, 'San Nicolás', 10, 0),
(249, 'Treguaco', 10, 0),
(250, 'Yungay', 10, 0),
(251, 'Carahue', 11, 0),
(252, 'Cholchol', 11, 0),
(253, 'Cunco', 11, 0),
(254, 'Curarrehue', 11, 0),
(255, 'Freire', 11, 0),
(256, 'Galvarino', 11, 0),
(257, 'Gorbea', 11, 0),
(258, 'Lautaro', 11, 0),
(259, 'Loncoche', 11, 0),
(260, 'Melipeuco', 11, 0),
(261, 'Nueva Imperial', 11, 0),
(262, 'Padre Las Casas', 11, 0),
(263, 'Perquenco', 11, 0),
(264, 'Pitrufquén', 11, 0),
(265, 'Pucón', 11, 0),
(266, 'Saavedra', 11, 0),
(267, 'Temuco', 11, 0),
(268, 'Teodoro Schmidt', 11, 0),
(269, 'Toltén', 11, 0),
(270, 'Vilcún', 11, 0),
(271, 'Villarrica', 11, 0),
(272, 'Angol', 11, 0),
(273, 'Collipulli', 11, 0),
(274, 'Curacautín', 11, 0),
(275, 'Ercilla', 11, 0),
(276, 'Lonquimay', 11, 0),
(277, 'Los Sauces', 11, 0),
(278, 'Lumaco', 11, 0),
(279, 'Purén', 11, 0),
(280, 'Renaico', 11, 0),
(281, 'Traiguén', 11, 0),
(282, 'Victoria', 11, 0),
(283, 'Corral', 12, 0),
(284, 'Lanco', 12, 0),
(285, 'Los Lagos', 12, 0),
(286, 'Máfil', 12, 0),
(287, 'Mariquina', 12, 0),
(288, 'Paillaco', 12, 0),
(289, 'Panguipulli', 12, 0),
(290, 'Valdivia', 12, 0),
(291, 'Futrono', 12, 0),
(292, 'La Unión', 12, 0),
(293, 'Lago Ranco', 12, 0),
(294, 'Río Bueno', 12, 0),
(295, 'Ancud', 13, 0),
(296, 'Castro', 13, 0),
(297, 'Chonchi', 13, 0),
(298, 'Curaco de Vélez', 13, 0),
(299, 'Dalcahue', 13, 0),
(300, 'Puqueldón', 13, 0),
(301, 'Queilén', 13, 0),
(302, 'Quemchi', 13, 0),
(303, 'Quellón', 13, 0),
(304, 'Quinchao', 13, 0),
(305, 'Calbuco', 13, 0),
(306, 'Cochamó', 13, 0),
(307, 'Fresia', 13, 0),
(308, 'Frutillar', 13, 0),
(309, 'Llanquihue', 13, 0),
(310, 'Los Muermos', 13, 0),
(311, 'Maullín', 13, 0),
(312, 'Puerto Montt', 13, 0),
(313, 'Puerto Varas', 13, 0),
(314, 'Osorno', 13, 0),
(315, 'Puero Octay', 13, 0),
(316, 'Purranque', 13, 0),
(317, 'Puyehue', 13, 0),
(318, 'Río Negro', 13, 0),
(319, 'San Juan de la Costa', 13, 0),
(320, 'San Pablo', 13, 0),
(321, 'Chaitén', 13, 0),
(322, 'Futaleufú', 13, 0),
(323, 'Hualaihué', 13, 0),
(324, 'Palena', 13, 0),
(325, 'Aisén', 14, 0),
(326, 'Cisnes', 14, 0),
(327, 'Guaitecas', 14, 0),
(328, 'Cochrane', 14, 0),
(329, 'O`higgins', 14, 0),
(330, 'Tortel', 14, 0),
(331, 'Coihaique', 14, 0),
(332, 'Lago Verde', 14, 0),
(333, 'Chile Chico', 14, 0),
(334, 'Río Ibáñez', 14, 0),
(335, 'Antártica', 15, 0),
(336, 'Cabo de Hornos', 15, 0),
(337, 'Laguna Blanca', 15, 0),
(338, 'Punta Arenas', 15, 0),
(339, 'Río Verde', 15, 0),
(340, 'San Gregorio', 15, 0),
(341, 'Porvenir', 15, 0),
(342, 'Primavera', 15, 0),
(343, 'Timaukel', 15, 0),
(344, 'Natales', 15, 0),
(345, 'Torres del Paine', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion_corta` varchar(256) NOT NULL,
  `descripcion_larga` longtext NOT NULL,
  `url_facebook` varchar(256) NOT NULL,
  `url_twitter` varchar(256) NOT NULL,
  `url_imagen` varchar(256) NOT NULL DEFAULT 'img/food_is_pride_70x70.jpg',
  `vigente` tinyint(1) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nombre`, `descripcion_corta`, `descripcion_larga`, `url_facebook`, `url_twitter`, `url_imagen`, `vigente`, `id_categoria`) VALUES
(1, 'pepito SA', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium. Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Aenean viverra rhoncus pede. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus a est. Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique.', 'http://www.facebook.com', 'https://twitter.com/?lang=es', 'img/img_base.png', 1, 1),
(2, 'juan perez ltda.', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 2),
(3, 'emp1', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 1),
(4, 'emp2', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 1),
(5, 'emp3', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 1),
(6, 'emp4', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 1),
(7, 'emp5', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 0, 1),
(8, 'emp6', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 2),
(9, 'emp7', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 2),
(10, 'emp8', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', 'Faucibus fusce odio penatibus lorem quis molestie metus tempor habitasse parturient suspendisse suspendisse non blandit tristique et magna lectus hac ligula litora sapien ligula erat magna quam', '', '', 'img/img_base.png', 1, 2),
(11, 'aaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa', 'img/img_base.png', 0, 1),
(12, '', 'rwerwr', 'rwerwe', 'rwerwe', '', 'img/img_base.png', 0, 0),
(13, 'aaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaa', '', '', 'img/img_base.png', 0, 0),
(14, 'eeee', 'ee', 'eeee', '', '', 'img/img_base.png', 1, 1),
(15, 'rrrrrr', 'rrrrr', 'rrrrr', '', '', 'img/img_base.png', 1, 2),
(16, 'aaaaaaaaaa', 'aaaaaaaaaaa', 'a', '', '', 'img/img_base.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_comentario`
--

CREATE TABLE `tb_empresa_comentario` (
  `id_empresa_comentario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `texto` text NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT '2014-04-28 15:44:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empresa_comentario`
--

INSERT INTO `tb_empresa_comentario` (`id_empresa_comentario`, `id_empresa`, `nombre`, `email`, `texto`, `valor`, `fecha_creacion`) VALUES
(1, 1, 'danilo', 'prueba', 'cometario', 5, '2014-04-28 15:44:00'),
(2, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(3, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(4, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(5, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(6, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(7, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(8, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(9, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(10, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(11, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(12, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(13, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(14, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(15, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(16, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(17, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(18, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(19, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(20, 1, 'Danilo miranda muñoz', 'd@c.cl', 'este es un comentasrio que puede ser escrito por cualquier persona', 3, '2014-04-28 15:44:00'),
(21, 1, 'danilo', 'prueba', 'cometario', 5, '2014-04-28 15:44:00'),
(22, 1, 'sdad', '', 'dasdasdasdas', 3, '2015-04-28 16:30:00'),
(23, 1, 'vxcvxc', '', 'dasdasd', 3, '2015-04-28 16:33:01'),
(24, 1, 'Danilo Miranda', '', 'Holaaaaaa', 4, '2015-04-28 16:33:26'),
(25, 1, 'dasd', '', 'dasdasdas', 0, '2015-04-28 16:33:57'),
(26, 1, 'adas', '', 'dasdasdas', 1, '2015-04-28 16:36:06'),
(27, 1, 'dasdasd', '', 'dasdasd', 0, '2015-04-28 16:37:20'),
(28, 1, 'eqweqw', 'd@c.cl', 'dasdas', 0, '2015-04-28 16:37:59'),
(29, 1, 'sssss', 's@d.cl', 'fsdfsdfds', 3, '2015-04-28 16:52:51'),
(30, 1, 'eeee', 'f@n.cl', 'rwerwerwe', 4, '2015-04-28 16:55:06'),
(31, 1, 'eqwe', 'd@c.cl', 'eqw', 4, '2015-05-04 15:19:40'),
(32, 1, 'fsdfsdf', 'danilo.miranda.munoz@gmail.com', 'fsdfsdf', 0, '2015-05-04 16:21:25'),
(33, 3, 'Danilo Miranda', 'd@c.cl', 'Hola este es un comentario de prueba', 4, '2015-05-06 10:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_direccion`
--

CREATE TABLE `tb_empresa_direccion` (
  `id_empresa_direccion` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `calle` varchar(256) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `piso` varchar(11) DEFAULT NULL,
  `id_comuna` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `telefonos` varchar(256) DEFAULT NULL,
  `emails` varchar(512) DEFAULT NULL,
  `latitud` varchar(256) NOT NULL,
  `longitud` varchar(256) NOT NULL,
  `comuna_nombre` varchar(256) NOT NULL,
  `region_nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empresa_direccion`
--

INSERT INTO `tb_empresa_direccion` (`id_empresa_direccion`, `id_empresa`, `calle`, `numero`, `departamento`, `piso`, `id_comuna`, `id_region`, `telefonos`, `emails`, `latitud`, `longitud`, `comuna_nombre`, `region_nombre`) VALUES
(1, 1, 'Los trapenses', '256', '25', '12', 88, 7, '54653526-25698542', 'prueba@prueba.cl', '-33.4406038', '-70.6514096', 'Arica', 'Tarapacá'),
(2, 1, 'Moneda', '975', '', '12', 88, 7, '52465369-85965874', 'prueba@prueba.cl', '-33.4406038', '-70.6514096', 'Arica', 'Tarapacá'),
(3, 3, 'Agustinas', '345', '', NULL, 88, 7, '12312564', 'prueba@prueba.cl', '-33.4406038', '-70.6514096', 'Arica', 'Tarapacá'),
(4, 4, '312312', '3123', '12321', '31231', 88, 7, '12312', '312321', '-33.4406038', '-70.6514096', 'Arica', 'Tarapacá'),
(25, 0, 'aaaa', 'aaa', 'aa', 'aa', 88, 7, 'a', 'a', '423423', '42342342', 'Buin', 'Metropolitana de Santiago');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_imagen`
--

CREATE TABLE `tb_empresa_imagen` (
  `id_empresa_imagen` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `url_imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empresa_imagen`
--

INSERT INTO `tb_empresa_imagen` (`id_empresa_imagen`, `id_empresa`, `url_imagen`) VALUES
(1, 1, 'img\\locales\\pepito1.jpg'),
(2, 1, 'img\\locales\\pepito2.jpg'),
(3, 1, 'img\\locales\\pepito3.jpg'),
(4, 1, 'img\\locales\\pepito4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_producto`
--

CREATE TABLE `tb_empresa_producto` (
  `id_empresa_producto` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_empresa_tag`
--

CREATE TABLE `tb_empresa_tag` (
  `id_empresa_tag` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_empresa_tag`
--

INSERT INTO `tb_empresa_tag` (`id_empresa_tag`, `id_empresa`, `id_tag`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3),
(7, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `IDMenu` int(11) NOT NULL,
  `IDTipoMenu` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `URL` varchar(256) NOT NULL,
  `Activo` tinyint(1) NOT NULL,
  `Vigente` tinyint(1) NOT NULL,
  `Icono` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Define el menu de la aplicacion';

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`IDMenu`, `IDTipoMenu`, `Nombre`, `Descripcion`, `URL`, `Activo`, `Vigente`, `Icono`) VALUES
(1, 1, 'Inicio', 'Pagina de Inicio', 'Index.php', 1, 1, ''),
(2, 1, 'El Jardín', 'Pagina relacionada al jardin', 'Nosotros.php', 0, 1, ''),
(3, 1, 'Quienes Somos', 'dsa', 'docentes.php', 0, 1, ''),
(6, 1, 'Actividades', 'dasdas', '#', 0, 1, ''),
(7, 1, 'Matriculas', 'gk', '#', 0, 1, ''),
(8, 1, 'Contacto', '', 'contacto.php', 0, 1, ''),
(9, 1, 'Login', '', 'login.php', 0, 1, ''),
(10, 2, 'Empresas', 'Configuración Empresas', 'empresas_listar.php', 1, 1, 'fa fa-briefcase'),
(14, 2, 'Usuarios', 'desc', 'usuario_listar.php', 1, 1, 'fa fa-user-md'),
(15, 2, 'Tags', 'Mantenedor Tags', 'Tags.php', 1, 1, 'fa fa-user-md'),
(16, 2, 'Promociones', 'Mantenedor de Promociones', 'promocion_listar.php', 1, 1, 'fa fa-user-md');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan`
--

CREATE TABLE `tb_plan` (
  `id_plan` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `precio` int(11) NOT NULL,
  `vigente` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plan`
--

INSERT INTO `tb_plan` (`id_plan`, `nombre`, `descripcion`, `precio`, `vigente`) VALUES
(1, 'Basico', 'Plan Basico desc', 5000, 1),
(2, 'Intermedio', 'Plan Intermedio Desc', 10000, 1),
(3, 'Full', 'Plan Full Desc', 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan_caracteristica`
--

CREATE TABLE `tb_plan_caracteristica` (
  `id_plan_caracteristica` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `caracteristica` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plan_caracteristica`
--

INSERT INTO `tb_plan_caracteristica` (`id_plan_caracteristica`, `id_plan`, `caracteristica`) VALUES
(1, 1, '4 imagenes'),
(2, 1, '2 sucursales'),
(3, 2, '6 imagenes'),
(4, 2, 'mas de 2 direcciones'),
(5, 3, '6 imagenes'),
(6, 3, 'mas de 2 direcciones'),
(7, 3, 'imagen slider');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promocion`
--

CREATE TABLE `tb_promocion` (
  `id_promocion` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(256) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `nombre_region` varchar(256) NOT NULL,
  `nombre_comuna` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promocion`
--

INSERT INTO `tb_promocion` (`id_promocion`, `id_empresa`, `nombre`, `descripcion`, `url_imagen`, `id_categoria`, `vigente`, `fecha_inicio`, `fecha_fin`, `id_region`, `id_comuna`, `nombre_region`, `nombre_comuna`) VALUES
(1, 1, 'Lapices 50% descuento', 'descripcion', 'img/hot_mixer_800x600.jpg', 1, 1, '2015-05-01', '2015-05-31', 7, 88, '', ''),
(2, 1, 'descuento vinos 20%', 'desc', 'img/hot_mixer_800x600.jpg', 1, 1, '2015-05-01', '2015-05-31', 7, 87, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promocion_caracteristica`
--

CREATE TABLE `tb_promocion_caracteristica` (
  `id_promocion_caracteristica` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL,
  `caracteristica` varchar(528) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promocion_caracteristica`
--

INSERT INTO `tb_promocion_caracteristica` (`id_promocion_caracteristica`, `id_promocion`, `caracteristica`) VALUES
(1, 1, 'precio bajos'),
(2, 1, 'solo sucursal maule');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promocion_tag`
--

CREATE TABLE `tb_promocion_tag` (
  `id_promocion_tag` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_region`
--

CREATE TABLE `tb_region` (
  `id_region` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `ordinal` varchar(5) NOT NULL,
  `vigente` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_region`
--

INSERT INTO `tb_region` (`id_region`, `nombre`, `ordinal`, `vigente`) VALUES
(1, 'Arica y Parinacota', 'XV', 0),
(2, 'Tarapacá', 'I', 0),
(3, 'Antofagasta', 'II', 0),
(4, 'Atacama', 'III', 0),
(5, 'Coquimbo', 'IV', 0),
(6, 'Valparaiso', 'V', 0),
(7, 'Metropolitana de Santiago', 'RM', 1),
(8, 'Libertador General Bernardo O\'Higgins', 'VI', 0),
(9, 'Maule', 'VII', 0),
(10, 'Biobío', 'VIII', 0),
(11, 'La Araucanía', 'IX', 0),
(12, 'Los Ríos', 'XIV', 0),
(13, 'Los Lagos', 'X', 0),
(14, 'Aisén del General Carlos Ibáñez del Campo', 'XI', 0),
(15, 'Magallanes y de la Antártica Chilena', 'XII', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `icono` varchar(256) NOT NULL DEFAULT 'fa fa-check'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tag`
--

INSERT INTO `tb_tag` (`id_tag`, `nombre`, `vigente`, `icono`) VALUES
(1, 'libros', 1, 'fa fa-check'),
(2, 'lapices', 1, 'fa fa-check'),
(3, 'celulares', 1, 'fa fa-check'),
(4, 'lavadoras', 1, 'fa fa-check');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `IDUsuario` int(11) NOT NULL,
  `rut` varchar(16) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `Nombres` varchar(256) DEFAULT NULL,
  `PrimerApellido` varchar(256) DEFAULT NULL,
  `SegundoApellido` varchar(256) DEFAULT NULL,
  `EsPrimeraSession` tinyint(1) NOT NULL,
  `UrlImagen` varchar(1000) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `clave_inicial` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`IDUsuario`, `rut`, `pass`, `Nombres`, `PrimerApellido`, `SegundoApellido`, `EsPrimeraSession`, `UrlImagen`, `email`, `clave_inicial`) VALUES
(36, '1-9', '$2a$07$EA8/5864C0FJH66454725.ya0.sj4.9qLnvoBgky2u7Jp9e6BeynC', 'Prueba24', 'Prueba345fsd', 'Prueba451', 0, '../documentos/imagenes/142626477625429550312c889014142626477624938550312c88901b.jpg', 'd@c.cld', ''),
(37, '1-7', '$2a$07$HCCIKJK.C18JH2986435B.JHDEeQOs1DpbhSuoDU39Gp0ATRW9ZWS', 'aaa', 'aaa', 'aaa', 1, NULL, 'd@c.cl', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tb_categoria_empresa`
--
ALTER TABLE `tb_categoria_empresa`
  ADD PRIMARY KEY (`id_categoria_empresa`);

--
-- Indexes for table `tb_comuna`
--
ALTER TABLE `tb_comuna`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indexes for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `tb_empresa_comentario`
--
ALTER TABLE `tb_empresa_comentario`
  ADD PRIMARY KEY (`id_empresa_comentario`);

--
-- Indexes for table `tb_empresa_direccion`
--
ALTER TABLE `tb_empresa_direccion`
  ADD PRIMARY KEY (`id_empresa_direccion`);

--
-- Indexes for table `tb_empresa_imagen`
--
ALTER TABLE `tb_empresa_imagen`
  ADD PRIMARY KEY (`id_empresa_imagen`);

--
-- Indexes for table `tb_empresa_producto`
--
ALTER TABLE `tb_empresa_producto`
  ADD PRIMARY KEY (`id_empresa_producto`);

--
-- Indexes for table `tb_empresa_tag`
--
ALTER TABLE `tb_empresa_tag`
  ADD PRIMARY KEY (`id_empresa_tag`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`IDMenu`);

--
-- Indexes for table `tb_plan`
--
ALTER TABLE `tb_plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indexes for table `tb_plan_caracteristica`
--
ALTER TABLE `tb_plan_caracteristica`
  ADD PRIMARY KEY (`id_plan_caracteristica`);

--
-- Indexes for table `tb_promocion`
--
ALTER TABLE `tb_promocion`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indexes for table `tb_promocion_caracteristica`
--
ALTER TABLE `tb_promocion_caracteristica`
  ADD PRIMARY KEY (`id_promocion_caracteristica`);

--
-- Indexes for table `tb_promocion_tag`
--
ALTER TABLE `tb_promocion_tag`
  ADD PRIMARY KEY (`id_promocion_tag`);

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_categoria_empresa`
--
ALTER TABLE `tb_categoria_empresa`
  MODIFY `id_categoria_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_comuna`
--
ALTER TABLE `tb_comuna`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_empresa_comentario`
--
ALTER TABLE `tb_empresa_comentario`
  MODIFY `id_empresa_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_empresa_direccion`
--
ALTER TABLE `tb_empresa_direccion`
  MODIFY `id_empresa_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_empresa_imagen`
--
ALTER TABLE `tb_empresa_imagen`
  MODIFY `id_empresa_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_empresa_producto`
--
ALTER TABLE `tb_empresa_producto`
  MODIFY `id_empresa_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_empresa_tag`
--
ALTER TABLE `tb_empresa_tag`
  MODIFY `id_empresa_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `IDMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_plan_caracteristica`
--
ALTER TABLE `tb_plan_caracteristica`
  MODIFY `id_plan_caracteristica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_promocion`
--
ALTER TABLE `tb_promocion`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_promocion_caracteristica`
--
ALTER TABLE `tb_promocion_caracteristica`
  MODIFY `id_promocion_caracteristica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_promocion_tag`
--
ALTER TABLE `tb_promocion_tag`
  MODIFY `id_promocion_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tag`
--
ALTER TABLE `tb_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
