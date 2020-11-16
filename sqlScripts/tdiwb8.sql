-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2020 at 06:36 PM
-- Server version: 10.1.47-MariaDB-0+deb9u1
-- PHP Version: 7.3.7-1+0~20190710.40+debian9~1.gbp032aec

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdiwb8`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ruta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `ruta`) VALUES
(1, 'Cerveza', '/view/resources/pictures/CervezaCategoria.png'),
(2, 'Vino', '/view/resources/pictures/VinoCategoria.jpg'),
(3, 'Whisky', '/view/resources/pictures/WhiskyCategoria.jpg'),
(4, 'Cava', '/view/resources/pictures/CavaCategoria.jpg'),
(5, 'Ron', '/view/resources/pictures/RonCategoria.jpg'),
(6, 'Vodka', '/view/resources/pictures/VodkaCategoria.png');

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `nElementos` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `linea_comanda`
--

CREATE TABLE `linea_comanda` (
  `id` int(11) NOT NULL,
  `comanda_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `precio_unidad` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `ruta` text NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `descripcion`, `ruta`, `categoria_id`) VALUES
(1, 'San Miguel Especial', 1.23, 'Cerveza rubia con 5,4% de grado alcohólico.', '/view/resources/pictures/san-miguel-especial.png', 1),
(2, 'Cerveza Miss Hops', 23.95, 'Color ámbar oscuro y espuma blanca de buena retención. Potente aroma a notas cítricas, de naranja y pomelo y frutas tropicales. Carbonatación media, cremosa y suave al inicio. Es una IPA con una graduación del 6%. \r\nCajas de 8 unidades', '/view/resources/pictures/BeerMissHops.jpg', 1),
(3, 'Chardonnay 2018', 5.51, 'De nuestra finca “El Cerezo”, elaboramos un Chardonnay Joven con las características de un clima fresco y altitud elevada. Tiene un color brillante amarillo, fresco y persistente, con notas tropicales al inicio que van tornadose cítricas al final del paso por boca. ', '/view/resources/pictures/Chardonnay2018.png', 2),
(5, 'Chivas Regal XV Gold', 42.9, 'Chivas Regal XV es un whisky escocés de 15 años con un sabor único y refinado, afrutado y aterciopelado. El secreto de su extraordinario sabor es el selectivo proceso de acabado en sus barricas usadas anteriormente para madurar Coñacs de Grande Champagne.', '/view/resources/pictures/ChivasRegal.jpg', 3),
(6, 'Ron Zacapa Centenario XO', 142, 'Su nobleza excepcional se lugra gracias a un añejamiento de hasta 25 años a 2.300 metros de altitud. El resultado es un equilibrio grandioso entre complejos aromas y sabores que le hace ser considerado por muchos \'el Cognac de los rones\'. 70cl ', '/view/resources/pictures/RonZacapa.jpg', 5),
(7, 'Vodka RIP singular Madrid', 28.6, 'Elaborado de forma artesanal 100% natural y sin filtrar.\r\nRIP es un vodka puro, cristalino, de gran untuosidad y lleno de personalidad y matices provenientes de la uva del país. El destilado durante horas en cobre y lotes reducidos le da la máxima suavidad y redondez en boca. 50cl 40%', '/view/resources/pictures/VodkaRipSingularMafrid.png', 6),
(8, 'Castell Sant Antoni', 13.95, 'De color amarillo pálido con reflejos verdosos.\r\n\r\nBurbuja fina y abundante, con formación de rosarios de ascendencia constante.\r\n\r\nEn nariz es fresco y agradable. Destacan aromas de fruta blanca (manzana verde, melocotón, albaricoque), además de ciertos aromas de flores blancas, notas cítricas y lías finas (pan de molde).\r\n\r\nEn boca la entrada es fresca y viva, con una muy buena acidez y carbónico bien integrado.\r\n\r\nEl paso en boca es ágil y la sensación final es agradable y limpia. 75cl 12%Vol', '/view/resources/pictures/CastellSantAntoni.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `poblacion` varchar(20) NOT NULL,
  `cp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `mail`, `password`, `direccion`, `poblacion`, `cp`) VALUES
(1, 'Gaspar', 'gaspar.herman95@gmail.com', '$2y$10$OOlM3z7QT/2umXM034VO0OSqOuTiYOsPwOKHocIwwx.71sHemqRwK', '1234', 'Sant Cugat', 8912);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `linea_comanda`
--
ALTER TABLE `linea_comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comanda_id` (`comanda_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `linea_comanda`
--
ALTER TABLE `linea_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `fk_comanda_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `linea_comanda`
--
ALTER TABLE `linea_comanda`
  ADD CONSTRAINT `fk_lineacomanda_comanda_id` FOREIGN KEY (`comanda_id`) REFERENCES `comanda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lineacomanda_producto_id` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
