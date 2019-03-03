-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 12:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+11:00";

--
-- Database: `emeat`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `supplier` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `postcode_id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `postcode_id` (`postcode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` decimal(10,2) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE IF NOT EXISTS `postcode` (
  `postcode_id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `distance` varchar(10) NOT NULL,
  PRIMARY KEY (`postcode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(11) NOT NULL,
  `quantity` decimal(20,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`postcode_id`) REFERENCES `postcode` (`postcode_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
