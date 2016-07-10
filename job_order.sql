-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 02:41 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_payment`
--

CREATE TABLE IF NOT EXISTS `account_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acc_id` (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `account_payment`
--

INSERT INTO `account_payment` (`id`, `acc_id`, `order_number`, `amount`, `payment_date`) VALUES
(1, 1, '001', '1000.00', '2016-04-16'),
(2, 1, '001', '1000.00', '2016-04-21'),
(3, 1, '002', '900.00', '2016-05-26'),
(4, 1, '004', '6100.00', '2016-05-31'),
(6, 2, '001', '600.00', '2016-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `account_rec`
--

CREATE TABLE IF NOT EXISTS `account_rec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_rec`
--

INSERT INTO `account_rec` (`id`, `customer_id`, `description`, `amount`, `status`) VALUES
(1, 2, 'Test Payment', '9000.00', 2),
(2, 1, 'test', '2000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `address`, `telephone`) VALUES
(1, 'Chester Paul Danao', 'feardarkness08@gmail.com', 'Bacolod City', '09494117192'),
(2, 'June Maebelle Plagata', 'junemaebelleplagata@gmail.com', 'Mandurio, Iloilo City', '091231231231');

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE IF NOT EXISTS `job_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `customer_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_order_meta`
--

CREATE TABLE IF NOT EXISTS `job_order_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` int(11) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reference_id` (`reference_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `job_order_meta`
--

INSERT INTO `job_order_meta` (`id`, `reference_id`, `meta_field`, `meta_value`) VALUES
(1, 1, 'type', 'Camera'),
(2, 1, 'serial', '98628735215'),
(3, 1, 'brand', 'Nikon'),
(4, 1, 'model', 'Nik 09761'),
(5, 1, 'date_due', '2016-04-15'),
(6, 1, 'costing', '3000'),
(7, 1, 'remarks', 'Good'),
(8, 1, 'status_id', '8'),
(9, 1, 'jo_number', '9012');

-- --------------------------------------------------------

--
-- Table structure for table `lay_away`
--

CREATE TABLE IF NOT EXISTS `lay_away` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 = active,1 = canceled,2 = claim',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lay_away`
--

INSERT INTO `lay_away` (`id`, `customer_id`, `description`, `status`) VALUES
(1, 1, 'Nikon Camera', 0),
(3, 2, 'Nikon 9001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `remarks` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_id`, `status_id`, `img`, `remarks`, `last_updated`) VALUES
(1, 1, 1, '', 'Good', '2016-04-06 18:45:17'),
(2, 1, 8, '', 'Good', '2016-04-10 17:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lay_away_id` int(11) NOT NULL,
  `or_number` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lay_away_id` (`lay_away_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `lay_away_id`, `or_number`, `amount`, `payment_date`) VALUES
(2, 1, '002', '200.00', '2016-04-22'),
(3, 3, '001', '900.00', '2016-04-07'),
(4, 1, '002', '100.00', '2016-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'completed'),
(3, 'released'),
(4, 'pullout'),
(5, 'paid'),
(6, 'collectable'),
(7, 'onprocess'),
(8, 'follow-up');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1),
(4, 'standard', '82b278beec33b3c27def7283df580374', 2),
(5, 'viewer', '49e5e739ea41d635246cd9cd21af17c4', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_payment`
--
ALTER TABLE `account_payment`
  ADD CONSTRAINT `account_payment_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account_rec` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_rec`
--
ALTER TABLE `account_rec`
  ADD CONSTRAINT `account_rec_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_order`
--
ALTER TABLE `job_order`
  ADD CONSTRAINT `job_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_order_meta`
--
ALTER TABLE `job_order_meta`
  ADD CONSTRAINT `job_order_meta_ibfk_1` FOREIGN KEY (`reference_id`) REFERENCES `job_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lay_away`
--
ALTER TABLE `lay_away`
  ADD CONSTRAINT `lay_away_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `job_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_status_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`lay_away_id`) REFERENCES `lay_away` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
