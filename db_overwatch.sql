-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2018 a las 20:22:34
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_overwatch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_pj` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `contenido` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `id_pj`, `id_autor`, `puntaje`, `contenido`) VALUES
(1, 17, 2, 4, 'huyguybu'),
(2, 34, 1, 2, 'mjnjinini'),
(3, 14, 5, 4, 'probando api'),
(4, 15, 5, 1, 'probando api2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `src` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `id_pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`src`, `id`, `id_pj`) VALUES
('img/5be31a21a88b0.jpg', 15, 46),
('img/5be31a21adab9.jpg', 16, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id`, `nombre`, `descripcion`, `id_rol`) VALUES
(9, 'Roadhog', 'Roadhog emplea su insigne garfio para atraer a los enemigos y hacerlos trizas con los disparos de su chatarrera. Es lo bastante robusto como para aguantar cantidades ingentes de daño y puede recuperar la salud con un inhalador portátil.', 8),
(10, 'Winston', 'Winston cuenta con una fuerza bestial e inventos impresionantes, como unos propulsores, un cañón tesla que lanza descargas eléctricas, un proyector de escudos portátil y más.', 8),
(11, 'Wrecking Ball', 'Wrecking Ball se desplaza rodando por todo el campo y aprovecha su arsenal de armas y el poderoso cuerpo mecánico que tiene para aplastar a sus enemigos.', 8),
(12, 'Zarya', 'Zarya es una ayuda inestimable en el frente de cualquier batalla gracias a sus potentes barreras personales, que convierten el daño en energía para su enorme cañón de partículas.', 8),
(13, 'D.Va', 'El meca de D.Va es ágil y poderoso. Sus dos cañones de fusión arrasan con todo a corta distancia, y puede usar sus impulsores para superar a enemigos y obstáculos, además de absorber proyectiles con su matriz de defensa.', 8),
(14, 'Orisa', 'Orisa hace las veces de punto de anclaje central para su equipo y defiende a sus camaradas desde primera línea con una barrera protectora. Puede atacar desde larga distancia, reforzar sus propias defensas, lanzar cargas de gravitones para desplazar y rale', 8),
(15, 'Reinhardt', 'Ataviado de una armadura potenciada y equipado con su martillo, Reinhardt realiza embestidas propulsadas por el campo de batalla y defiende a su escuadrón con un enorme campo protector.', 8),
(16, 'Bastion', 'Sus protocolos de reparación y su capacidad de adoptar modos de asalto inmóvil, reconocimiento móvil y tanque devastador aumentan considerablemente las probabilidades de victoria de Bastion.', 6),
(17, 'Doomfist', 'Gracias a su tecnología cibernética, Doomfist es un luchador de primera línea muy ágil y fuerte. Además de infligir daño a distancia con Cañón de mano, Doomfist puede golpear el suelo, lanzar enemigos al aire y desequilibrarlos, o meterse en la refriega c', 6),
(18, 'Genji', 'Genji lanza precisos y letales shuriken a sus objetivos y usa su moderna katana para desviar proyectiles o infligir cortes veloces que hacen sangrar a los enemigos.', 6),
(19, 'Hanzo', 'Las versátiles flechas de Hanzo pueden revelar a sus enemigos o fragmentarse para atacar a varios objetivos. Es capaz de escalar muros para disparar flechas desde las alturas, y también puede invocar a un titánico espíritu dragón.', 6),
(20, 'Junkrat', 'El armamento antipersona de Junkrat está compuesto de un lanzagranadas que lanza proyectiles que rebotan, minas de conmoción que hacen saltar a los enemigos por los aires y cepos que los inmovilizan por completo.', 6),
(21, 'McCree', 'Armado con su Pacificador, McCree da cuenta de los objetivos con una precisión letal, para después huir del peligro a una velocidad vertiginosa.', 6),
(22, 'Mei', 'Los dispositivos de manipulación climática de Mei ralentizan a los oponentes y protegen ubicaciones. Su pistola endotérmica lanza carámbanos dañinos y ráfagas heladas. Además, Mei puede crionizarse para protegerse de ataques u obstruir los movimientos del', 6),
(23, 'Pharah', 'Surcando los cielos en su armadura de combate y armada con un lanzacohetes que dispara misiles altamente explosivos y de conmoción, Pharah es decisiva en el campo de batalla.', 6),
(24, 'Reaper', 'Sus escopetas infernales, la fantasmal habilidad de volverse inmune al daño y el poder de desplazarse por las tinieblas hacen de Reaper uno de los seres más letales de la Tierra.', 6),
(25, 'Soldado: 76', 'Provisto de armamento de alta tecnología, como un rifle de pulsos experimental capaz de lanzar espirales de potentes cohetes hélice, Soldado: 76 cuenta con la velocidad y la experiencia de un guerrero veterano.', 6),
(26, 'Sombra', 'Su invisibilidad y sus ataques debilitantes han hecho que Sombra desarrolle unas técnicas de infiltración insuperables. Su hackeo puede alterar la estrategia de los enemigos, lo que los convierte en blancos más fáciles, y su PEM supone una ventaja ante gr', 6),
(27, 'Symmetra', 'Symmetra usa su proyector de fotones para despachar a los adversarios, escudar a sus compañeros, construir teletransportadores y desplegar torretas centinela que disparan rayos de partículas.', 6),
(28, 'Torbjörn', 'El amplio arsenal de Torbjörn incluye una remachadora y un martillo, además de una forja personal que usa para construir torretas, mejorarlas y distribuir packs de armadura.', 6),
(29, 'Tracer', 'Armada con dos pistolas de pulsos, bombas energéticas de tiempo y un humor rápido como el viento, Tracer es capaz de «trasladarse» instantáneamente de un sitio a otro y retroceder en su línea temporal mientras combate el mal por todo el mundo.', 6),
(30, 'Widowmaker', 'Widowmaker va equipada de lo que haga falta para eliminar a sus objetivos, como minas que despiden gas venenoso, un visor que otorga infravisión a su escuadrón y un potente rifle de francotirador que puede disparar en modo automático.', 6),
(31, 'Ana', 'Ana posee un arsenal versátil que le permite curar y potenciar a sus aliados desde lejos, mientras que los disparos de su rifle biótico, los dardos tranquilizantes y los efectos de las granadas bióticas logran neutralizar a aquellos que suponen una amenaz', 7),
(32, 'Brigitte', 'La especialidad de Brigitte es la armadura. Puede lanzar kits de reparación a sus compañeros o sanar de forma automática a sus aliados al dañar a los enemigos con su mangual. Puede golpear con el mangual en un arco amplio que le permite alcanzar a varios ', 7),
(33, 'Lúcio', 'En el campo de batalla, el sofisticado amplificador sónico de Lúcio golpea a los enemigos con proyectiles y repele a los rivales con descargas de sonido. Sus canciones pueden curar o aumentar la velocidad de movimiento de su equipo, y puede cambiar de can', 7),
(34, 'Mercy', 'El traje Valkyrie de Mercy la ayuda a mantenerse cerca de sus compañeros de equipo cual ángel de la guarda, y los sana, los resucita o los fortalece con el haz que emana de su bastón caduceo.', 7),
(35, 'Moira', 'Las habilidades bióticas de Moira le permiten sanar e infligir daño, según la situación lo requiera. Mientras Rayo biótico otorga a Moira recursos para combatir a corto alcance, Orbe biótico le permite sanar e infligir daño desde una distancia mayor. Moir', 7),
(36, 'Zenyatta', 'Zenyatta se sirve de orbes de armonía y discordia para sanar a sus compañeros de equipo y debilitar a los oponentes, y siempre busca un estado de trascendencia que lo hace inmune al daño.', 7),
(46, 'jutytyj', 'teee', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`) VALUES
(6, 'Daño', 'Consiste en hacer todo el daño posible posicionándose correctamente.'),
(7, 'Apoyo', 'Consiste en apoyar al equipo en todo lo posible para ganar.'),
(8, 'Tanque', 'Consiste en tratar de recibir la mayor cantidad de daño que puedas, sin morir.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `pass`, `admin`) VALUES
(1, 'admin', '$2y$10$Azi/8EPj6QaWys2Q4Bmyeenp.nv8dGeuION/SRj8Rvb2gWn0HF8Zq', 1),
(2, 'admin2', '$2y$10$BnxoeE3nc5zpaD.FZSDKmeTZcNU/t01A.4887Tmzc4Bf3N7RZoVHC', 1),
(5, 'usuario', '$2y$10$bC/l2ObAeLXRXkMwEN2.luAr.Npx4uOxO3cB1IGgL.nle8c6bmHTi', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pj` (`id_pj`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pj` (`id_pj`);

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_pj`) REFERENCES `personaje` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_pj`) REFERENCES `personaje` (`id`);

--
-- Filtros para la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD CONSTRAINT `personaje_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
