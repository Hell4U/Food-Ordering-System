-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 08:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`fullname`, `username`, `email`, `password`, `address`, `phone`) VALUES
('asd asd', '18BCE000', '18BCE000@gmail.com', 'neel', 'asc', '9292929292'),
('neel mungra', 'asd', 'neelmungara.007@gmail.com', 'asd', 'Ghj\r\nRidhi', '9898989898'),
('neel mungra', 'neel05', 'neelmungara.007@gmail.com', 'neel', 'Ghj\r\nRidhi', '9875654644');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `options` varchar(30) NOT NULL DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `image_path`, `options`) VALUES
(1, 'Alooparatha', 40, 'Taste a perfect North Indian breakfast!', './images/alooparatha.jpg', 'ENABLE'),
(2, 'Menduvada', 30, 'Perfect Healthy South Indian Breakfast!', './images/menduvada.jpg', 'ENABLE'),
(3, 'Rajavadi Thali', 180, 'Perfect meal to end tiring day!', './images/rajavadi.jpg', 'ENABLE'),
(4, 'Veg. Burger', 50, 'Veg crispy burger to have on weekend!', './images/vegburger.jpg', 'ENABLE'),
(6, 'Pizza', 150, 'Taste authentic Italian flavor', './images/pizza.jpg', 'ENABLE'),
(7, 'Pasta', 100, 'Taste authentic Italian pasta', './images/pasta.jpg', 'ENABLE'),
(8, 'Coffee', 50, 'Just a sip of coffee to make your morning fresh!', './images/coffee.jpg', 'ENABLE'),
(9, 'Vadapav', 30, 'Taste authentic Bombay vadapav', './images/vadapav.jpg', 'ENABLE');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`fullname`, `username`, `email`, `password`, `address`, `phone`) VALUES
('Abc def', '18BCE131', '18BCE000@gmail.com', 'neel', 'asd', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `orderdate` date NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `F_ID`, `foodname`, `price`, `quantity`, `orderdate`, `username`) VALUES
(1, 3, 'Taco Pizza', 100, 1, '2021-03-28', 'asd'),
(2, 3, 'Taco Pizza', 100, 1, '2021-03-28', 'asd'),
(3, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(4, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(5, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(6, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(7, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(8, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(9, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(10, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(11, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(12, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(13, 2, 'Happy Happy Shake', 40, 1, '2021-03-29', 'asd'),
(14, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(15, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(16, 4, 'Noodles', 80, 1, '2021-03-29', 'asd'),
(17, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(18, 3, 'Taco Pizza', 100, 1, '2021-03-29', 'asd'),
(19, 2, 'Menduvada', 100, 1, '2021-03-30', 'asd'),
(20, 2, 'Menduvada', 100, 1, '2021-03-30', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `F_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
