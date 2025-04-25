-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 10:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'Kunal Singh', 'Kunal.beast@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `c_image` text NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `sub_total` int(255) NOT NULL,
  `discount` varchar(650) NOT NULL,
  `qnt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `user_id`, `c_image`, `p_name`, `price`, `sub_total`, `discount`, `qnt`) VALUES
(14, 9337, 'Assets/uploads/60d6c156495bd6.45826153.jpg', 'eplant', 100, 100, '', 5),
(25, 79225, 'Assets/uploads/60ed0b0c1cfc95.85742481.jpg', 'Dhaniya Dal seeds by Jd Fresh', 132, 528, '', 4),
(26, 27091733, 'Assets/uploads/60ec3da7d42631.29402181.jpg', 'Black Rice (by Swabhiman33)', 132, 132, '', 1),
(27, 27091733, 'Assets/uploads/60ec3e2e25ae57.65849831.jpg', 'brown rice (by swabhiman33)', 132, 132, '', 1),
(30, 27091733, 'Assets/uploads/60ec34fed5b043.38080169.jpg', 'Alysum (by Pages Seeds)', 154, 616, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `pid` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `add1` varchar(255) NOT NULL,
  `add2` varchar(255) NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(6) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total_fare` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_catogery` varchar(25) NOT NULL,
  `p_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `p_image`, `p_name`, `p_price`, `p_catogery`, `p_details`) VALUES
(1, 'Assets/uploads/60d6c156495bd6.45826153.jpg', 'eplant', 100, 'seeds', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quibusdam laudantium odio quidem\r\n                        pariatur dolorem, explicabo nulla placeat fugit, blanditiis commodi, autem corrupti recusandae\r\n                        optio eum. Totam fugiat quia quis?'),
(3, 'Assets/uploads/60d6c915746d91.47073500.png', 'fertilizer', 98, 'fertilizer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quibusdam laudantium odio quidem\r\n                        pariatur dolorem, explicabo nulla placeat fugit, blanditiis commodi, autem corrupti recusandae\r\n                        optio eum. Totam fugiat quia quis?'),
(5, 'Assets/uploads/60ec34b73ec354.64146304.jpg', 'American crenberry dried', 105, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(6, 'Assets/uploads/60ec34fed5b043.38080169.jpg', 'Alysum (by Pages Seeds)', 154, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(7, 'Assets/uploads/60ec3da7d42631.29402181.jpg', 'Black Rice (by Swabhiman33)', 132, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(8, 'Assets/uploads/60ec3e074b3853.44636206.jpg', 'Chia Seeds (by Zenulife)', 143, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(9, 'Assets/uploads/60ec3e2e25ae57.65849831.jpg', 'brown rice (by swabhiman33)', 132, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(10, 'Assets/uploads/60ec3ef67fd8a5.58412277.jpg', 'Cabbage Plant Seeds (by EAST-WEST-SEEDS)', 126, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(11, 'Assets/uploads/60ed0b0c1cfc95.85742481.jpg', 'Dhaniya Dal seeds by Jd Fresh', 132, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(12, 'Assets/uploads/60ed0b3616c562.76363895.jpg', 'Fennel Seeds by JD Fresh', 102, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(13, 'Assets/uploads/60ed0b555f3bd4.94865648.jpg', 'flax seeds (by zenulife)', 135, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(14, 'Assets/uploads/60ed0ba0d249d3.97397278.jpg', 'Fenugreek Seds by Trinetra', 136, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(15, 'Assets/uploads/60ed0bd89a4264.95682623.jpg', 'cumin seeds by Trinentra', 162, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(16, 'Assets/uploads/60ed0c224f9678.29541683.jpg', 'Nazia F1 by EAST-WEST-SEED', 123, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(17, 'Assets/uploads/60ed0c4c39fdd7.79863662.jpg', 'flax seeds by Zenulife', 132, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(18, 'Assets/uploads/60ed0c8e84b202.61105036.jpg', 'flax seeds by MICKNO Organics', 121, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(19, 'Assets/uploads/60ed0cbaca6b55.77139628.jpg', 'Cumin Seeds by JD Fresh', 132, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.'),
(20, 'Assets/uploads/60ed0cfce1e6e6.86645106.jpg', 'Pragati 065 F1 by EAST-WEST-SEED', 111, 'seeds', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga cum id illo harum labore, adipisci natus quis aliquam\r\npariatur a iure qui eveniet eligendi blanditiis illum aspernatur quos exercitationem delectus.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `comments` varchar(599) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `phone_no`, `password`) VALUES
(6, 224706404, 'patanjali pandey', 'pandeypatanjali4@gmail.com', 2147483647, '123'),
(8, 27091733, 'Kunal Singh', 'kunal@gmail.com', 2147483647, '1234'),
(9, 883126, 'sudipta mandal', 'sudip@gmail.com', 55767867, '1236'),
(10, 336525421, 'rajeev', 'rajeevranjan42@gmail.com', 2147483647, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
