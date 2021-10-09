-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2021 at 10:01 AM
-- Server version: 5.7.33-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasuyos1_pasuyoalpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `active_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_username`, `admin_password`, `active_status`) VALUES
(1, 'Jhonlloydc', 'admin', 'active'),
(2, 'admin', 'admin', 'active'),
(3, 'tsantos', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(45) NOT NULL,
  `cust_address` varchar(190) DEFAULT NULL,
  `cust_mobile` bigint(11) NOT NULL,
  `cust_username` varchar(45) NOT NULL,
  `cust_password` varchar(45) NOT NULL,
  `order_status` varchar(60) DEFAULT NULL,
  `asigned_delivery` int(11) DEFAULT NULL,
  `loc_link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_address`, `cust_mobile`, `cust_username`, `cust_password`, `order_status`, `asigned_delivery`, `loc_link`) VALUES
(15, 'Super Admin', 'San Isidro', 9090350890, 'admin', 'admin', 'Inactive', NULL, 'https://maps.app.goo.gl/JKzn35LjrczC1W7Z7');

-- --------------------------------------------------------

--
-- Table structure for table `generalcart`
--

CREATE TABLE `generalcart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(45) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(45) NOT NULL,
  `prod_category` varchar(45) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generalcart`
--

INSERT INTO `generalcart` (`id`, `user_id`, `prod_id`, `prod_name`, `prod_price`, `prod_img`, `prod_category`, `prod_qty`, `total`) VALUES
(69, 15, 123456799, 'Great Taste Coffee Premium Blend 2g', 14, 'Great Taste Coffee Premium Blend 2g.jpg', 'Instant Coffee and Creamer', 1, 14),
(74, 15, 123456805, 'Nescafe Classic Resealable 200g', 45, 'Nescafe Classic Resealable 200g.jpg', 'Instant Coffee and Creamer', 9, 405),
(77, 15, 123456793, 'Blend Instant Coffee 100g', 2, 'Blend Instant Coffee 100G.jpg', 'Instant Coffee and Creamer', 4, 8),
(78, 15, 22, 'Gardenia Neu Bake White', 43, 'Gardenia Neu Bake White Bread.jpg', 'Bread / Bakery', 5, 215),
(79, 15, 23, 'Gardenia Neu Bake Spanish Bread 150g', 25, 'Neu Bake Spanish Bread.jpg', 'Bread / Bakery', 1, 25),
(80, 15, 123456827, 'Gardenia California Raisin Loaf 400g', 73, 'Gardenia California Raisin Loaf 400g.jpg', 'Bread / Bakery', 3, 219),
(81, 15, 123456825, 'Gardenia Choco Chip Loaf 400g', 68, 'Gardenia Choco Chip Loaf 400g.jpg', 'Bread / Bakery', 3, 204),
(82, 15, 123456837, 'Enfagrow A+ Four (Above 3 Years) Powdered Mil', 995, 'enfa900g.jpg', 'Baby Care', 3, 2985);

-- --------------------------------------------------------

--
-- Table structure for table `onprocess`
--

CREATE TABLE `onprocess` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(60) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(120) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `prod_availability` varchar(60) DEFAULT NULL,
  `order_date` varchar(45) DEFAULT NULL,
  `onprocess_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onprocess`
--

INSERT INTO `onprocess` (`id`, `order_id`, `cust_id`, `prod_id`, `prod_name`, `prod_price`, `prod_img`, `prod_qty`, `total`, `prod_availability`, `order_date`, `onprocess_id`) VALUES
(454, 31500, 15, 123456825, 'Gardenia Choco Chip Loaf 400g', 68, 'Gardenia Choco Chip Loaf 400g.jpg', 3, 204, 'Available', '2021-08-27 09:59:58', 0),
(455, 31500, 15, 123456837, 'Enfagrow A+ Four (Above 3 Years) Powdered Mil', 995, 'enfa900g.jpg', 3, 2985, 'Available', '2021-08-27 09:59:58', 0),
(451, 31500, 15, 22, 'Gardenia Neu Bake White', 43, 'Gardenia Neu Bake White Bread.jpg', 5, 215, 'Available', '2021-08-27 09:59:58', 0),
(452, 31500, 15, 23, 'Gardenia Neu Bake Spanish Bread 150g', 25, 'Neu Bake Spanish Bread.jpg', 1, 25, 'Available', '2021-08-27 09:59:58', 0),
(453, 31500, 15, 123456827, 'Gardenia California Raisin Loaf 400g', 73, 'Gardenia California Raisin Loaf 400g.jpg', 3, 219, 'Available', '2021-08-27 09:59:58', 0),
(450, 31500, 15, 123456793, 'Blend Instant Coffee 100g', 2, 'Blend Instant Coffee 100G.jpg', 4, 8, 'Available', '2021-08-27 09:59:58', 0),
(449, 31500, 15, 123456805, 'Nescafe Classic Resealable 200g', 45, 'Nescafe Classic Resealable 200g.jpg', 9, 405, 'Available', '2021-08-27 09:59:58', 0),
(448, 31500, 15, 123456799, 'Great Taste Coffee Premium Blend 2g', 14, 'Great Taste Coffee Premium Blend 2g.jpg', 1, 14, 'Available', '2021-08-27 09:59:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(20) NOT NULL,
  `prod_name` varchar(45) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_img` varchar(45) NOT NULL,
  `prod_category` varchar(45) NOT NULL,
  `prod_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_img`, `prod_category`, `prod_qty`) VALUES
(2, 'Blend Instant Coffee 100g', 2, 'Blend Instant Coffee 100G.jpg', 'Instant Coffee and Creamer', 0),
(3, 'Blend Instant Coffee 100G', 2, 'Blend Instant Coffee 100G.jpg', 'Instant Coffee and Creamer', 0),
(4, 'Blend Instant Coffee 100G', 2, 'Blend Instant Coffee 100G.jpg', 'Instant Coffee and Creamer', 0),
(5, 'Coffee Mate Creamer 170g', 12, 'Coffee Mate Creamer 170g.jpg', 'Instant Coffee and Creamer', 0),
(6, 'Coffee Mate Creamer 250g', 4, 'Coffee Mate Creamer 250g.jpg', 'Instant Coffee and Creamer', 0),
(7, 'Great Taste Coffee Granules 100g', 52, 'Great Taste Coffee Granules 100g.jpg', 'Instant Coffee and Creamer', 0),
(8, 'Great Taste Coffee Premium Blend 2g', 14, 'Great Taste Coffee Premium Blend 2g.jpg', 'Instant Coffee and Creamer', 0),
(9, 'Great Taste Coffee Premium Blend 50g', 123, 'Great Taste Coffee Premium Blend 50g.jpg', 'Instant Coffee and Creamer', 0),
(10, 'Krem Top 80g', 12, 'Krem Top 80g.jpg', 'Instant Coffee and Creamer', 0),
(11, 'Krem Top 170g', 43, 'Krem Top 170g.jpg', 'Instant Coffee and Creamer', 0),
(12, 'Nescafe Classic 25g', 32, 'Nescafe Classic 25g.jpg', 'Instant Coffee and Creamer', 0),
(13, 'Nescafe Classic Resealable 100g', 45, 'Nescafe Classic Resealable 100g.jpg', 'Instant Coffee and Creamer', 0),
(14, 'Nescafe Classic Resealable 200g', 45, 'Nescafe Classic Resealable 200g.jpg', 'Instant Coffee and Creamer', 0),
(15, 'Nescafe Coffee Decaf Refill 20g', 32, 'Nescafe Coffee Decaf Refill 20g.jpg', 'Instant Coffee and Creamer', 0),
(16, 'Nescafe Coffee Decaf Refill 80g', 32, 'Nescafe Coffee Decaf Refill 80g.jpg', 'Instant Coffee and Creamer', 0),
(17, 'Shipping Fee 50', 50, 'none.jpg', 'Shipping Fee San Isidro', 1),
(18, 'Shipping Fee 10', 10, 'none.jpg', 'Shipping Fee San Isidro', 1),
(19, 'Gardenia White Bread Thick Slice 600g', 68, 'gardenia.jpg', 'Bread / Bakery', 0),
(20, 'Gardenia Pinoy Tasty 450g', 35, 'Tasty Pinoy.jpg', 'Bread / Bakery', 0),
(21, 'Marby Cheese Bites 110g', 33, 'Marby Cheese Bytes.jpg', 'Bread / Bakery', 0),
(22, 'Gardenia Neu Bake White', 43, 'Gardenia Neu Bake White Bread.jpg', 'Bread / Bakery', 0),
(23, 'Gardenia Neu Bake Spanish Bread 150g', 25, 'Neu Bake Spanish Bread.jpg', 'Bread / Bakery', 0),
(24, 'Gardenia Choco Chp Brioche Bun', 30, 'Gardenia Choco Chp Brioche Bun.jpg', 'Bread / Bakery', 0),
(25, 'Gardenia High Fiber Wheat Bread thick 600g', 81, 'Gardenia High Fiber Wheat Bread thick 600g.jp', 'Bread / Bakery', 0),
(26, 'Marby Super Loaf White Bread White Bread 600g', 65, 'Marby Super Loaf White Bread White Bread 600g', 'Bread / Bakery', 0),
(27, 'Marby Cheese Bread 250g 10pcs', 68, 'Marby Cheese Bread 250g 10pcs.jpg', 'Bread / Bakery', 0),
(123456819, 'Gardenia Butter Toast 2 Slice 50g x 10pcs', 114, 'Gardenia Butter Toast 2 Slice 50g x 10pcs.jpg', 'Bread / Bakery', 0),
(123456820, 'Gardenia Butter Toast 2 Slice 50g x 10pcs', 114, 'Gardenia Butter Toast 2 Slice 50g x 10pcs.jpg', 'Bread / Bakery', 0),
(123456821, 'Margy Monggo Bread 400g', 56.5, 'Margy Monggo Bread 400g.jpg', 'Bread / Bakery', 0),
(123456822, 'Fuwa Fuwa Mini Loaf Milk 225g', 68, '.jpg', '', 0),
(123456823, 'Baker John Classic Loaf 600g', 63, 'Baker John Classic Loaf 600g.jpg', 'Bread / Bakery', 0),
(123456824, 'Marby Ham Bread 400g X2 Packs', 36, 'Marby Ham Bread 400g X2 Packs.jpg', 'Bread / Bakery', 0),
(123456825, 'Gardenia Choco Chip Loaf 400g', 68, 'Gardenia Choco Chip Loaf 400g.jpg', 'Bread / Bakery', 0),
(123456826, 'Gardenia Choco Chip Loaf 400g', 68, 'Gardenia Choco Chip Loaf 400g.jpg', 'Bread / Bakery', 0),
(123456827, 'Gardenia California Raisin Loaf 400g', 72.5, 'Gardenia California Raisin Loaf 400g.jpg', 'Bread / Bakery', 0),
(123456828, 'Gardenia Pandesal 350g', 42, 'Gardenia Pandesal 350g.jpg', 'Bread / Bakery', 0),
(123456829, 'Gardenia Hamburger Buns 6pcs', 38, 'Gardenia Hamburger Buns 6pcs.jpg', 'Bread / Bakery', 0),
(123456830, 'Marby Whole Wheat Bread 600g', 73.5, 'Marby Whole Wheat Bread 600g.jpg', 'Bread / Bakery', 0),
(123456831, 'Gardenia Cheese Buns 250g', 46.5, 'Gardenia Cheese Buns 250g.jpg', 'Bread / Bakery', 0),
(123456832, 'Uncle George Hotdog Rolls Sliced 8pcs', 42, 'Uncle George Hotdog Rolls Sliced 8pcs.jpg', 'Bread / Bakery', 0),
(123456833, 'Uncle George Hamburger Buns 400g', 35, 'Uncle George Hamburger Buns 400g.jpg', 'Bread / Bakery', 0),
(123456834, 'Tifanny Hotdog Rolls X8 Pack', 41, 'Tifanny Hotdog Rolls X8 Pack.jpg', 'Bread / Bakery', 0),
(123456835, 'Marby Hamburger With Seeds', 46, 'Marby Hamburger With Seeds.jpg', 'Bread / Bakery', 0),
(123456836, 'Gardenia Soft Delight Pandesal 300g', 40, 'Gardenia Soft Delight Pandesal 300g.jpg', 'Bread / Bakery', 0),
(123456837, 'Enfagrow A+ Four (Above 3 Years) Powdered Mil', 995, 'enfa900g.jpg', 'Baby Care', 0),
(123456838, 'Enfagrow A+ Four (Above 3 Years) Powdered Mil', 381, 'enfa350g.jpg', 'Baby Care', 0),
(123456839, 'Babyflo Baby Buds [200 pcs]', 29, 'buds.jpg', 'Baby Care', 0),
(123456840, 'Nestle Nido Junior (1-3 years) [2kg]', 929, 'nidojr2kg.jpg', 'Baby Care', 0),
(123456841, 'Johnsonâ€™s Active Kids Strong & Healthy Sham', 88.5, 'violet100ml.jpg', 'Baby Care', 0),
(123456842, 'Baby First Baby Wipes 90 Sheets [2 pcs]', 159, 'wipes90.jpg', 'Baby Care', 0),
(123456843, 'Baby First Wipes Mixed Berry 60 sheets [2 pcs', 109, 'wipesberries.jpg', 'Baby Care', 0),
(123456844, 'Tendercare Hypoallergenic Baby Powder Classic', 34, 'tenderblue100g.jpg', 'Baby Care', 0),
(123456845, 'Baby Bench Colonia Bubble Gum [200mL]', 104, 'colonia.jpg', 'Baby Care', 0),
(123456846, 'Enfamil A+ One (0-6 months) Infant Formula Po', 584, 'enfamil350g.jpg', 'Baby Care', 0),
(123456847, 'Farlin Large Silicon Wide Neck Nipple [2 pcs]', 84.5, 'farlin2s.jpg', 'Baby Care', 0),
(123456848, 'Enfant Baby Nipple & Bottle Cleanser Refill [', 169.75, 'enfant700ml.jpg', 'Baby Care', 0),
(123456849, 'Earth Tones Bottle', 109.75, 'earthtones.jpg', 'Baby Care', 0),
(123456850, 'Nestle Nido 3+ Powdered Milk [2kg]', 915, 'nido3+2kg.jpg', 'Baby Care', 0),
(123456851, 'Gardenia Soft Delight Pandesal 300g', 40, 'Gardenia Soft Delight Pandesal 300g.jpg', 'Bread / Bakery', 0),
(123456852, 'Nestle Cerelac Wheat Banana & Milk [120g]', 62, 'cerelacbanana120g.jpg', 'Baby Care', 0),
(123456853, 'Gardenia Soft Delight Pandesal 300g', 40, 'Gardenia Soft Delight Pandesal 300g.jpg', 'Bread / Bakery', 0),
(123456854, 'Farlin Silicon Wide Neck Nipple [2 pcs]', 84.5, 'farlinlarge1.jpg', 'Baby Care', 0),
(123456855, 'Farlin Silicone Nipples Large [3 pcs]', 74.5, 'farlinlarge3.jpg', 'Baby Care', 0),
(123456856, 'Lactacyd Liquid Baby Bath [250mL]', 267.5, 'lactacyd250ml.jpg', 'Baby Care', 0),
(123456857, 'Baby First Baby Wipes 60 Sheets [2 pcs]', 99, 'babyfirst60.jpg', 'Baby Care', 0),
(123456858, 'Tendercare Powder Original [50g]', 19, 'tenderblue50g.jpg', 'Baby Care', 0),
(123456859, 'Sanicare Bamboo Wipes Rainforest Scent [25 sh', 49, 'sanicarebamboo25.jpg', 'Baby Care', 0),
(123456860, 'Tender Care Hypoallergenic Baby Powder Sakura', 38, 'tendersakura100g.jpg', 'Baby Care', 0),
(123456861, 'Nestle Cerelac Mixed Vegetables & Soya [120g]', 62, 'cerelacsoya120g.jpg', 'Baby Care', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(11) NOT NULL,
  `rider_username` varchar(45) NOT NULL,
  `rider_password` varchar(45) NOT NULL,
  `rider_name` varchar(45) NOT NULL,
  `rider_mobile` bigint(20) NOT NULL,
  `rider_vehicle` varchar(45) NOT NULL,
  `rider_address` varchar(45) NOT NULL,
  `rider_status` varchar(45) DEFAULT NULL,
  `viewing_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `num_accept` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `rider_username`, `rider_password`, `rider_name`, `rider_mobile`, `rider_vehicle`, `rider_address`, `rider_status`, `viewing_id`, `cust_id`, `num_accept`) VALUES
(1, 'jhonlloydc', '123567', 'Jhon Lloyd Clarion', 9090350890, 'Bike', 'San Isidro', NULL, NULL, NULL, NULL),
(2, 'jhonlloydc', '123567', 'Jhon Lloyd Clarion', 2147483647, 'Bike', 'San Isidro', NULL, NULL, NULL, NULL),
(3, 'admin', 'admin', 'Jhon Lloyd Clarion', 2147483647, 'Bike', 'San Isidro', '', 0, 0, NULL),
(4, 'macgaming0929', 'macdelrosario', 'Mac Calvin G Del Rosario', 9666908095, 'Bike', '231 Realica Village Pulo Cabuyao, Laguna', '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riderque`
--

CREATE TABLE `riderque` (
  `id` int(11) NOT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `que_status` varchar(40) DEFAULT NULL,
  `num_reject` int(11) DEFAULT NULL,
  `cust_lat` float DEFAULT NULL,
  `cust_long` float DEFAULT NULL,
  `cust_address` varchar(255) DEFAULT NULL,
  `cust_mobile` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `generalcart`
--
ALTER TABLE `generalcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onprocess`
--
ALTER TABLE `onprocess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `riderque`
--
ALTER TABLE `riderque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `generalcart`
--
ALTER TABLE `generalcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `onprocess`
--
ALTER TABLE `onprocess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456862;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riderque`
--
ALTER TABLE `riderque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
