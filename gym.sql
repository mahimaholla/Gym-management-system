-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 02:04 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllusers` ()  NO SQL
SELECT * FROM `user`$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_add1` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_level_id`, `user_username`, `user_password`, `user_add1`, `user_email`, `user_gender`, `user_image`) VALUES
(4, 1, 'admin', 'test', 'House no : 768', 'kaushal.rahuljaiswal@gmail.com', '', 'IMG_5739.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_title` varchar(255) NOT NULL,
  `package_fees` varchar(255) NOT NULL,
  `package_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_title`, `package_fees`, `package_description`) VALUES
(3, 'Monthly Package', '1000', 'Monthl Package'),
(4, '6 Month Package', '5000', '6 Months Package'),
(5, '9 Month Package ', '7000', '9 Month Package '),
(6, 'Yearly Package', '9000', 'Yearly Package');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_user_id` int(11) NOT NULL,
  `payment_for_month` int(11) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `payment_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_user_id`, `payment_for_month`, `payment_date`, `payment_amount`, `payment_description`) VALUES
(2, 7, 4, '17 March,2016', '1000', 'Payment for april'),
(3, 4, 2, '1 March,2016', '1200', 'Payment for fenruary'),
(4, 8, 9, '19 March,2016', '1000', 'Payment for Suman'),
(5, 14, 12, '5 December,2019', '10000', 'fee'),
(6, 8, 8, '5 December,2019', '10000', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_title` varchar(255) NOT NULL,
  `shift_from_time` varchar(255) NOT NULL,
  `shift_to_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_title`, `shift_from_time`, `shift_to_time`) VALUES
(2, 'Morning Shift - 1', '06:00 AM', '07:00 AM'),
(3, 'Morning Shift - 2', '07:00 AM', '08:00 AM'),
(4, 'Morning Shift - 3', '08:00 AM', '09:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `trainer_add1` varchar(255) NOT NULL,
  `trainer_email` varchar(255) NOT NULL,
  `trainer_gender` varchar(255) NOT NULL,
  `trainer_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_add1`, `trainer_email`, `trainer_gender`, `trainer_image`) VALUES
(1, 'Kaushal Kishore', 'Mumbai', 'kaushal@gmail.com', 'M', 'Image.jpg'),
(2, 'mahima', 'puttur', 'mahimaholla17@gmail.com', 'F', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_package_id` int(11) NOT NULL,
  `user_shift_id` int(11) NOT NULL,
  `user_level_id` int(11) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_add1` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_package_id`, `user_shift_id`, `user_level_id`, `user_username`, `user_password`, `user_add1`, `user_email`, `user_gender`, `user_image`, `created_at`) VALUES
(7, 1, 1, 3, 'faculty', 'test', 'House no : 768', 'amit@gmail.com', 'M', 'IMG_5746.JPG', '2019-12-06 16:39:52'),
(8, 2, 3, 3, 'suman', 'test', 'House no : 768', 'suman@gmail.com', 'M', 'IMG_5748.jpg', '2019-12-06 16:40:02'),
(14, 4, 2, 3, 'mahi', 'mahima', 'puttur', 'mahimaholla17@gmail.com', 'F', '', '2019-12-06 16:58:11'),
(15, 6, 4, 3, 'mahima', 'mahima', 'puttur', 'mahimaholla17@gmail.commm', 'F.', '', '2019-12-06 18:31:26');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `time` BEFORE UPDATE ON `user` FOR EACH ROW BEGIN
set new.created_at=CURRENT_TIMESTAMP();
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_user_id` (`payment_user_id`),
  ADD KEY `payment_for_month` (`payment_for_month`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_package_id` (`user_package_id`),
  ADD KEY `user_shift_id` (`user_shift_id`),
  ADD KEY `user_level_id` (`user_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
