-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 01:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_tubes_183040024`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fullname`, `email`) VALUES
(5, 'avips205', '$2y$10$ekSUr3rrpwLMjp4bmIQrNeQrdSO57/eXpK/19xniD0pRcL20w.kX.', 'avip', 'syaifulloh.183040024@mail.unpas.ac.id'),
(6, 'admin', '$2y$10$TXdZNGUEwngkMLGWVeioB.PkdGSBs7IhD/ptNlJG0h66vE4abLrx6', 'admin', 'admin@mail.unpas.ac.id'),
(7, '', '$2y$10$KPdhLSbS1g6m4X/Jucm/welqGbHoqlTdbAUjWFhQ7HzqHKTD50X4e', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `message`) VALUES
(6, 4, 1, 'This is great review '),
(7, 4, 1, 'Apple Product always awesome'),
(10, 4, 1, 'This Product is very nice'),
(11, 4, 1, 'This Product is the best apple product ever\r\n'),
(14, 4, 1, 'This Product easy to use'),
(15, 5, 1, 'Great Review For This Product'),
(16, 5, 2, 'Nice product for gaming'),
(17, 4, 1, 'Product yang keren'),
(18, 4, 1, 'Great Product'),
(19, 4, 1, 'testing'),
(21, 10, 1, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `brand` varchar(64) NOT NULL,
  `storage` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  `cpu` varchar(64) NOT NULL,
  `gpu` varchar(64) NOT NULL,
  `ram` varchar(64) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `brand`, `storage`, `price`, `cpu`, `gpu`, `ram`, `picture`, `description`) VALUES
(1, 'iPhone XS', 'Apple', '64 GB', 14300000, 'Apple Chip A12 Bionic', 'Apple GPU', '4 GB', '1.png', 'Super Retina in two sizes including the largest display ever on an iPhone. Even faster Face ID. The smartest, most powerful chip in a smartphone. And a breakthrough dual-camera system with Depth Control. iPhone XS is everything you love about iPhone. Taken to the extreme.'),
(2, 'ROG Phone', 'Asus', '512 GB', 13600000, 'Qualcomm SDM845 Snapdragon 845', 'Adreno 630', '8 GB', '2.png', 'A new era of mobile gaming has dawned. An era where you take full control, where every sense is heightened, where every sinew is ready for the fray. With pure ROG gaming DNA at its core, ROG Phone breaks every rule to go where rivals fear to tread.'),
(3, 'Mate 20', 'Huawei', '128 GB / 64 GB', 8900000, 'HiSilicon Kirin 980', 'Mali-G76 MP10', '4/6 GB', '3.png', 'A visual art that embraces technology and craftsmanship. The HUAWEI Mate 20 is built with a full vibrant display to accentuate its pure beauty. The immensely powerful engine inside unlocks future possibilities and creates a new path for intelligence.'),
(4, 'Galaxy M 20', 'Samsung', '64 GB / 32 GB', 2799000, 'Exynos 7904', 'Mali-G71 MP2', '4 GB / 3 GB', '4.png', 'The M20 introduces you to the new delight in an expansive view with Infinity-V display. Its Full HD+ display extends from edge to edge giving you a more immersive visual experience. Infinity display provides truly immersive viewing experience by maximized screen size.'),
(5, '6.1 Plus', 'Nokia', '32 GB / 64 GB', 14300000, 'Qualcomm SDM636 Snapdragon 636', 'Adreno 509', '4 GB / 6 GB', '5.png', 'The Nokia 6.1 brings the Android One experience to the Nokia smartphone range. This means no unnecessary apps, no hidden processes eating into your battery life, no skins or UI changes.'),
(6, 'Zenfone Max m2', 'Asus', '64 GB', 2199000, 'test', 'test', '2000', '6.png', 'Testing'),
(7, 'F11 Pro', 'Oppo', '64 GB', 2999999, '', '', '900', '7.png', 'abc'),
(8, 'V15 Pro', 'Vivo', '64 GB', 4949000, '', '', '200', '8.png', 'dsffd'),
(9, 'Galaxy Note 9', 'Samsung', '1 TB', 14300000, '', '', '100', '9.png', 'asd'),
(10, 'Mi 8 Lite', 'Xiaomi', '64 GB', 3999000, '', '', '1000', '10.png', 'fsdfdf'),
(13, 'iPhone 11 Pro', 'Apple', '64 GB /128 GB', 19000000, 'Bionic A13', 'Mali-G72', '8 GB', '5e858e9b146c2.png', 'TEST');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating_val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `user_id`, `product_id`, `rating_val`) VALUES
(5, 4, 1, 5),
(6, 4, 1, 4),
(9, 10, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `administator` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `fullname`, `phone`, `administator`) VALUES
(1, 'admin2', '$2y$10$VtUE78ltkenIUa44hR9fZuBSqckdr.sccQWfqUSUkRFHQz4cmVS6u', 'avip@mail.unpas.ac.id', 'avip', '08150201020', '0'),
(2, 'avips205', '$2y$10$SitJyfjCIgw.joB5.wyRgO02vkJanysLKQqpYbfPpV2eeBct8o21m', 'avip@mail.unpas.ac.id', 'avip', '082115866580', '0'),
(4, 'avipsyaifulloh', '$2y$10$K82ITNqnk.Qju0Al7FUiMO5ZDwEv0.n8Cbvpg0F9wa8QaPqu79Piy', 'avips9h321415@gmail.com', 'Avip Syaifulloh', '082115866580', '0'),
(5, 'ramadhankyx', '$2y$10$qKhadDdcPmPf7VI8kUWvC.RDgud2kUEhSsfoiXDbRAbZmyJT19YSu', 'ramadhan.183040008@mail.unpas.ac.id', 'Rizky Ramadhan', '08927162882', '0'),
(6, 'adsad', '$2y$10$/QS5GD6QHXeWd3ALXR.4auUQevd0ztFvVucHPtGo/pZPeeJrPC/wC', 'avip@mail.unpas.ac.id', 'avip', '08150201020', '0'),
(8, 'admin', '$2y$10$TXdZNGUEwngkMLGWVeioB.PkdGSBs7IhD/ptNlJG0h66vE4abLrx6', 'admin', 'admin', 'admin', '1'),
(10, 'testing', '$2y$10$GQth9mNPCN/nQvJy64LTrOHCtFSrWNE9.Cz.XyWabIziROUk.xnDm', 'testing@gmail.com', 'testing', '08918727812', '0'),
(11, 'avip123', '$2y$10$H2QO.BEQlA9LPQ.fgATUbeLFlArqFKXTHGXweZs8ukd3hGHbHOige', 'avip123@gmail.com', 'avip123', '0892818281', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `member_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `member_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
