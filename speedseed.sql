-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2023 at 08:53 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `speedseed`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `category`) VALUES
(3, 'Seed'),
(4, 'Leaf'),
(7, 'vegetables'),
(8, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE IF NOT EXISTS `delivery_boy` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bphone` varchar(100) NOT NULL,
  `baddress` varchar(100) NOT NULL,
  `blicence` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`bemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `bname`, `bemail`, `bphone`, `baddress`, `blicence`) VALUES
(3, 'boy', 'boy@gmail.com', '8089123456', 'kochi', '7892018'),
(4, 'boy1', 'boy1@gmail.com', '8089123457', 'kochi', '7892017');

-- --------------------------------------------------------

--
-- Table structure for table `ffeedback`
--

CREATE TABLE IF NOT EXISTS `ffeedback` (
  `feid` int(100) NOT NULL AUTO_INCREMENT,
  `fid` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`feid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ffeedback`
--

INSERT INTO `ffeedback` (`feid`, `fid`, `feedback`) VALUES
(1, '1', 'Good'),
(2, '2', 'Not Good');

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE IF NOT EXISTS `fproduct` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `fid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`pid`, `fid`, `name`, `category`, `price`, `image`, `stock`, `desc`) VALUES
(10, '4', 'cabbage', 'vegetables', '12', 'cabbage.jpg', '97', 'good'),
(11, '5', 'pepper', 'vegetables', '90', 'pepper.jpg', '99', 'spicy');

-- --------------------------------------------------------

--
-- Table structure for table `ifeedback`
--

CREATE TABLE IF NOT EXISTS `ifeedback` (
  `feid` int(100) NOT NULL AUTO_INCREMENT,
  `i_id` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`feid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ifeedback`
--

INSERT INTO `ifeedback` (`feid`, `i_id`, `feedback`) VALUES
(3, '1', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(100) NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `reg_id`, `email`, `password`, `type`, `status`) VALUES
(1, '0', 'admin@gmail.com', 'admin', 'ADMIN', 'approved'),
(9, '4', 'bo@gmail.com', '123', 'USER', 'approved'),
(10, '5', 'jo@gmail.com', '123', 'USER', 'approved'),
(11, '3', 'boy@gmail.com', '123456', 'Dboy', 'approved'),
(12, '4', 'boy1@gmail.com', '123', 'Dboy', 'approved'),
(13, '6', 'sivs@gmail.com', '123', 'USER', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(100) NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `sid`, `name`, `category`, `price`, `image`, `stock`, `desc`) VALUES
(4, '2', 'Seeds', 'Seed', '300', 'ab4.jpg', '80', 'Good'),
(6, '2', 'Tractor', 'Equipment', '250000', 'download (3).jpeg', '98', 'Good'),
(7, '3', 'Califlower', 'Leaf', '150', 'ab2.jpg', '29', 'No pesticide');

-- --------------------------------------------------------

--
-- Table structure for table `ucart`
--

CREATE TABLE IF NOT EXISTS `ucart` (
  `cid` int(100) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `fid` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `tstock` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `dboy` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ucart`
--

INSERT INTO `ucart` (`cid`, `uid`, `fid`, `pid`, `date`, `tstock`, `item`, `status`, `total`, `dboy`) VALUES
(12, '4', '1', '8', '2023/Sep/25', '1', 'Carrot', 'Paid', '450', 'pending'),
(13, '4', '1', '8', '2023/Sep/25', '4', 'Carrot', 'Paid', '1800', 'pending'),
(14, '5', '1', '8', '2023/Oct/06', '1', 'Carrot', 'Paid', '450', 'pending'),
(15, '4', '1', '9', '2023/Nov/07', '3', 'black pepper', 'Paid', '450', 'pending'),
(16, '4', '1', '9', '2023/Nov/07', '', 'black pepper', 'incart', '', 'pending'),
(18, '5', '4', '10', '2023/Nov/07', '2', 'cabbage', 'delivered', '24', '3'),
(19, '5', '1', '9', '2023/Nov/08', '1', 'black pepper', 'Paid', '150', 'pending'),
(20, '6', '4', '10', '2023/Nov/08', '1', 'cabbage', 'delivered', '12', '4'),
(21, '6', '5', '11', '2023/Nov/08', '1', 'pepper', 'delivered', '90', '4');

-- --------------------------------------------------------

--
-- Table structure for table `ufeedback`
--

CREATE TABLE IF NOT EXISTS `ufeedback` (
  `feid` int(100) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`feid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ufeedback`
--

INSERT INTO `ufeedback` (`feid`, `uid`, `feedback`) VALUES
(3, '5', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(100) NOT NULL,
  `uaddress` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `uaddress`) VALUES
(4, 'Bosco', 'bo@gmail.com', '9797646476', 'Kottayam'),
(5, 'Joy', 'jo@gmail.com', '7946133325', 'Kollam'),
(6, 'siva', 'sivs@gmail.com', '8089123454', 'kochi');
