-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2018 a las 18:58:04
-- Versión del servidor: 5.5.60-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mycms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(2083) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(4) NOT NULL,
  `date` int(11) NOT NULL,
  `link` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id`, `name`, `image`, `content`, `author`, `date`, `link`, `published`) VALUES
(1, 'Lorem Ipsum', 'https://www.inlinguagranada.es/wp-content/uploads/2018/02/Lorem-Ipsum.jpg', '<div id="output">\r\n<p>Lorem ipsum dolor sit amet consectetur adipiscing elit justo natoque nam metus mus, nibh curae morbi sollicitudin convallis erat netus dictumst in commodo tempus a nullam, litora diam interdum tortor fermentum porta torquent arcu sociosqu ligula feugiat. Parturient duis curae morbi molestie gravida inceptos viverra taciti, vivamus suscipit porta sed tortor eget ullamcorper habitant conubia, pulvinar vel rutrum ridiculus ut ac fringilla. Turpis fames massa proin pharetra odio, quam sem egestas primis, aptent ante varius lacus.</p>\r\n<p>Erat facilisi laoreet taciti bibendum mauris lectus curabitur integer pulvinar, leo magnis condimentum inceptos nam nisi hendrerit at donec, sem varius vulputate iaculis accumsan facilisis cras nibh. Dapibus natoque malesuada maecenas pretium nec orci aenean nullam tellus, sollicitudin ultricies eros imperdiet dignissim nulla facilisis aptent suspendisse mi, sagittis varius tristique accumsan feugiat iaculis tortor habitasse. Curae tristique pretium quis etiam arcu viverra risus volutpat nostra vulputate platea nisi, habitant vitae imperdiet facilisi vel laoreet fermentum litora dictum varius duis conubia sapien, montes ac eros dui ante tortor faucibus lobortis porta nulla hac. Etiam sociosqu cubilia dis quam pretium netus leo accumsan, proin hendrerit lectus rutrum cum senectus semper pharetra, blandit est lacinia montes scelerisque convallis justo.</p>\r\n<p>Per quis posuere felis sollicitudin massa platea mollis rhoncus vestibulum sem donec cras, rutrum nibh conubia curabitur mauris dui mi vivamus dictumst faucibus. Commodo montes vulputate vel urna et nisl ante, pulvinar lectus per porttitor mi hendrerit placerat tincidunt, dictumst primis blandit auctor natoque justo. Euismod nisi ante risus cras aliquet per blandit aliquam, sem sodales erat eu consequat scelerisque enim natoque eleifend, non molestie penatibus vitae potenti tellus condimentum.</p>\r\n<p>Commodo vulputate venenatis magnis magna id tristique senectus faucibus, ut vivamus massa donec risus erat urna placerat convallis, enim mollis diam dis nisl sociosqu porta. Vel semper eget lobortis mi non elementum rhoncus nascetur nisl torquent justo turpis, consequat netus mollis eleifend euismod viverra commodo fames sagittis lacinia ligula. Litora metus viverra tortor platea curabitur, imperdiet eros in neque commodo, nullam dictumst inceptos proin.</p>\r\n<p>Etiam dapibus nec quisque tempor fames nisl praesent luctus ullamcorper, ligula sagittis quam litora sem accumsan condimentum viverra cras, vel mi facilisis sollicitudin a cubilia felis fusce. Vitae non augue tellus litora ut odio ante taciti imperdiet, sed senectus viverra fermentum vehicula habitant sapien risus conubia orci, dictumst in sociosqu eget accumsan sagittis et porta. Convallis magnis sem praesent semper imperdiet rutrum ridiculus pretium dictumst diam sodales non, mattis porta leo tincidunt lectus phasellus velit blandit magna pellentesque etiam, eu vitae justo arcu vestibulum ut egestas pulvinar tempus lacinia primis. Velit iaculis porta netus dui imperdiet phasellus commodo pellentesque lobortis pulvinar ante magna vulputate, felis proin sollicitudin luctus mattis venenatis nibh eleifend platea dictum mi donec.</p>\r\n<p>Proin fermentum platea ut maecenas vestibulum mauris porttitor risus, ridiculus bibendum parturient habitasse tempor vulputate nisi gravida ullamcorper, hac porta mi penatibus id pretium semper. Hendrerit platea ad nisl metus taciti diam ridiculus, fringilla felis ornare suscipit convallis sagittis rhoncus fames, nascetur in gravida enim himenaeos ultricies. Dictum augue nam netus quis sollicitudin orci etiam posuere hac, luctus nisi mattis et tempor blandit tristique auctor magna, eget lectus commodo donec turpis nibh urna a.</p>\r\n<p>Porta congue litora torquent nulla senectus per tristique, semper bibendum pulvinar netus fames fringilla habitasse penatibus, ultrices eros tempor pellentesque sagittis convallis. A convallis natoque varius felis luctus dis venenatis, quam mattis sed facilisis sem taciti posuere pellentesque, hendrerit sagittis per ultricies blandit ut. Molestie sociosqu ultrices suscipit taciti eu id penatibus himenaeos porta sem, aenean interdum mus curae quis nisi turpis quisque duis aptent phasellus, facilisis montes suspendisse inceptos cras scelerisque bibendum hendrerit facilisi. Volutpat viverra ultricies enim ac metus etiam conubia semper sollicitudin euismod, porttitor eleifend eros natoque sapien augue donec pellentesque suspendisse pretium, himenaeos vitae ad curabitur magnis faucibus egestas parturient maecenas.</p>\r\n<p>Posuere orci rutrum urna sed ligula etiam libero sociis quis cursus, porttitor est accumsan luctus rhoncus potenti nam laoreet facilisi tincidunt semper, curae dis odio porta cum vestibulum sodales litora dapibus. Senectus proin nibh velit auctor placerat ante sagittis dictum, torquent suscipit vestibulum pharetra odio non nam laoreet euismod, lacus tristique habitasse eros vel mus facilisis. Imperdiet cum at semper non pretium penatibus urna, nisi augue gravida arcu cras ultricies natoque morbi, tempus sociosqu fermentum etiam phasellus ac. Aenean ultrices dignissim dis fusce rhoncus duis taciti purus laoreet neque varius, torquent nam litora inceptos ornare hendrerit sed tristique imperdiet hac, mi lectus mus quisque nisi cras suspendisse sociis mauris erat.</p>\r\n</div>', 1, 1543949826, 'lorem-ipsum', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(2) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Editor'),
(4, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(2) DEFAULT '4',
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nick`, `password`, `name`, `role`, `email`) VALUES
(1, 'admin', '$2y$10$6JFLscncvFGonaan6JYGTeYs9fN09QCRnHKuXl04D9vJOighLZEVy', 'Site Administrator', 1, 'admin@yoursite.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `author_2` (`author`),
  ADD KEY `author_3` (`author`),
  ADD KEY `author_4` (`author`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`),
  ADD KEY `role` (`role`),
  ADD KEY `nick_2` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
