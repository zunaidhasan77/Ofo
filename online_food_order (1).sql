-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 12:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online food order`
--

-- --------------------------------------------------------

--
-- Table structure for table `complainbox`
--

CREATE TABLE IF NOT EXISTS `complainbox` (
  `complainid` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`complainid`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT '1',
  `type` varchar(20) NOT NULL,
  `resid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resid` (`resid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `picture`, `price`, `availability`, `type`, `resid`) VALUES
(1, 'pizza a', NULL, 100, 1, 'pizza', 1),
(2, 'pizza b', NULL, 200, 1, 'pizza', 1),
(3, 'c', NULL, 400, 1, 'pizza', 1),
(4, 'd', NULL, 300, 1, 'pizza', 1),
(5, 'djadf', NULL, 23, 1, 'pizza', 1),
(6, 'jahsdf', NULL, 200, 1, 'pizza', 1),
(7, 'poado', NULL, 34, 1, 'pizza', 1),
(8, 'apasta', NULL, 100, 1, 'pasta', 2),
(9, 'bpasta', NULL, 100, 1, 'pasta', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `servicemanid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `customerid` (`customerid`),
  KEY `servicemanid` (`servicemanid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE IF NOT EXISTS `order_food` (
  `order_food_id` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`order_food_id`),
  KEY `foodid` (`foodid`),
  KEY `orderid` (`orderid`),
  KEY `foodid_2` (`foodid`),
  KEY `orderid_2` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `zoneid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zoneid` (`zoneid`),
  KEY `zoneid_2` (`zoneid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `zoneid`) VALUES
(1, 'pizzaking', 'lalbag', 1),
(2, 'Vuterbari', 'lalbag', 1),
(5, 'Heritage', 'lalbag', 1),
(6, 'ChinaKitchen', 'katabon', 2),
(7, 'CP', 'katabon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emailaddress` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `type` int(40) NOT NULL DEFAULT '0',
  `area` varchar(40) NOT NULL,
  `roadno` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `emailaddress`, `contact`, `type`, `area`, `roadno`) VALUES
(1, 'joyita', '123', 'kadshf', 'jadf', 0, 'DU', '12'),
(3, 'we', 'we', 'we', 'we', 0, 'Hatirpul', 'we'),
(4, 'a', 'a', 'a', 'a', 0, 'Ajimpur', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `name` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
