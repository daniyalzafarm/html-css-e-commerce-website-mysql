-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 10:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore.pk`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(10) NOT NULL,
  `admin_lname` varchar(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`) VALUES
(1, 'Daniyal', 'Zafar', 'daniyalzafar40@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `cartquantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `products_id` varchar(1000) NOT NULL,
  `products_quan` varchar(1000) NOT NULL,
  `products_price` varchar(1000) NOT NULL,
  `totalbill` int(11) NOT NULL,
  `order_status` varchar(11) NOT NULL,
  `order_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `cid`, `products_id`, `products_quan`, `products_price`, `totalbill`, `order_status`, `order_date`) VALUES
(7, 9, '26,20,21,16,22,19', '4,2,1,1,1,1', '', 714500, 'Canceled', '12/01/2021 09:51:56 PM'),
(11, 11, '22,21,25,26,29,30', '2,2,1,1,1,1', '', 544400, 'Delivered', '14/01/2021 10:13:04 PM'),
(12, 13, '19,21,29', '2,1,1', '80000.00,1500.00,0.00', 161500, 'Canceled', '15/01/2021 12:46:14 AM'),
(13, 13, '22,25', '2,2', '225000.00,85000.00', 620000, 'Delivered', '15/01/2021 05:37:02 PM');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `cfname` varchar(20) NOT NULL,
  `clname` varchar(20) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cphone` bigint(13) NOT NULL,
  `caddress` varchar(100) NOT NULL,
  `ccity` varchar(20) NOT NULL,
  `czip` int(5) NOT NULL,
  `ccountry` varchar(20) NOT NULL,
  `cpassword` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cfname`, `clname`, `cemail`, `cphone`, `caddress`, `ccity`, `czip`, `ccountry`, `cpassword`) VALUES
(8, 'Muhammad Daniyal', 'Zafar', 'daniyalzafar40@gmail.com', 923077001606, 'Iqbal Colony Sargodha', 'Sargodha', 58246, 'Pakistan', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'Daniyal', 'Zafar', 'daniyalzafar836@gmail.com', 923000000000, 'Iqbal Colony Sargodha', 'Sargodha', 58246, 'Pakistan', '25d55ad283aa400af464c76d713c07ad'),
(13, 'Zafar', 'Iqbal', 'zafariqbal@gmail.com', 923005224843, 'Iqbal Colony Sargodha', 'Sargodha', 58246, 'Pakistan', '25d55ad283aa400af464c76d713c07ad'),
(14, 'Ali', 'Raza', 'aliraza@gmail.com', 923052365489, 'Street 2,Hussainabad', 'Sargodha', 2545, 'Pakistan', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `fid` int(11) NOT NULL,
  `fstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`fid`, `fstatus`) VALUES
(1, 'Featured'),
(2, 'Non-Featured'),
(3, 'On Sale'),
(4, 'Not on Sale');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `imgid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pcategory` int(10) NOT NULL,
  `pprice` double(10,2) NOT NULL,
  `psprice` double(10,2) DEFAULT NULL,
  `pquantity` int(10) NOT NULL,
  `pfeatured` int(20) NOT NULL,
  `psdescription` varchar(50) NOT NULL,
  `pldescription` text NOT NULL,
  `pmain_image` varchar(50) NOT NULL,
  `gallery_images` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pcategory`, `pprice`, `psprice`, `pquantity`, `pfeatured`, `psdescription`, `pldescription`, `pmain_image`, `gallery_images`) VALUES
(16, 'Ear Buds', 3, 600.00, 550.00, 20, 3, 'Short Description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem reiciendis saepe voluptatibus dolor? Pariatur obcaecati animi ad vero. Exercitationem, eligendi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem reiciendis saepe voluptatibus dolor? Pariatur obcaecati animi ad vero. Exercitationem, eligendi.Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem reiciendis saepe voluptatibus dolor? Pariatur obcaecati animi ad vero. Exercitationem, eligendi.', 'buds.jpg', ''),
(19, 'Samsung Galaxy S9', 2, 85000.00, 80000.00, 10, 3, 'Short Description', 'Long Description Long Description Long Description Long Description', 'samsung 3.jpg', ''),
(20, 'Mac Book', 1, 200000.00, 195000.00, 5, 2, 'Short Description', 'Long DescriptionLong DescriptionLong DescriptionLong Description', 'mac 1.jpg', ''),
(21, 'Wrist Watch', 4, 1500.00, 1450.00, 15, 3, 'Short Description Lorem, ipsum dolor sit amet cons', 'Long DescriptionLong DescriptionLong DescriptionLong DescriptionLong Description', 'g5.jpg', ''),
(22, 'Mac Book', 1, 225000.00, 0.00, 3, 1, 'Short Description Lorem, ipsum dolor sit amet cons', 'Long Description Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, beatae', 'mac 2.jpg', ''),
(23, 'Mac Book', 1, 250000.00, 248000.00, 5, 3, 'Short Description Lorem, ipsum dolor sit amet cons', 'Short Description Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, beatae', 'mac 4.jpg', ''),
(24, 'Mac Book', 1, 300000.00, 0.00, 5, 1, 'Short Description Lorem, ipsum dolor sit amet cons', 'Long Description Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, beatae', 'mac 3.jpg', ''),
(25, 'Samsung Note 8', 2, 90000.00, 85000.00, 10, 3, 'Short Description Lorem, ipsum dolor sit amet cons', 'Short Description Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, beatae', 'samsung 4.jpg', ''),
(26, 'Mouse', 3, 600.00, 0.00, 8, 1, 'Short Description Lorem, ipsum dolor sit amet cons', 'Short Description Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae, beatae', 'g3.jpg', ''),
(29, 'Test', 4, 600.00, 0.00, 3, 1, 'exampleModalCenterexampleModalCenter', 'exampleModalCenterexampl  exampleModalCenterexampl  exampleModalCenterexampl  ', 'g4.jpg', ''),
(30, 'Test', 4, 200.00, 0.00, 2, 1, 'exampleModalCenterexampleModalCenter', 'exampleModalCenterexampleModalCenterexampleModalCenterexampleModalCenter', 'g1.jpg', 'g4.jpg,g5.jpg'),
(32, '', 0, 0.00, 0.00, 0, 0, '', '', 'deal-of-week.jpg', 'categ 1.jpg'),
(33, 'Handsfree', 3, 2000.00, 1800.00, 20, 2, 'exampleModalCenterexampleModalCenter', 'exampleModalCenterexampl  exampleModalCenterexampl  exampleModalCenterexampl  ', 'deal-of-week.jpg', 'categ 1.jpg,categ 2.jpg'),
(34, 'Hp Laptop 10 gen', 1, 50000.00, 0.00, 10, 1, 'exampleModalCenterexampleModalCenter', 'exampleModalCenterexampleModa exampleModalCenterexampleModalCenter', 'pic 1.jpg', 'categ 1.jpg,categ 2.jpg,categ 3-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `categid` int(11) NOT NULL,
  `categname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`categid`, `categname`) VALUES
(1, 'Laptops'),
(2, 'Mobiles'),
(3, 'Accessories'),
(4, 'Other Items');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestion_id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`suggestion_id`, `fname`, `lname`, `suggestion`) VALUES
(1, 'Daniyal', 'Zafar', 'Hello Kesy ho yar Hello Kesy ho yar Hello Kesy ho yar '),
(3, 'Daniyal', 'Zafar', 'Chup kr k beh, jinni teri ooqat ha utthy reh'),
(4, 'Sheikh', 'Khan', 'Hello Kesy ho yar Hello Kesy ho yar Hello Kesy ho yar '),
(5, 'Sheikh', 'Zafar', 'Hello Kesy ho yar Hello Kesy ho yar Hello Kesy ho yar '),
(6, 'Daniyal', 'Khan', 'Hello Kesy ho yar Hello Kesy ho yar Hello Kesy ho yar ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`imgid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`categid`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `categid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
