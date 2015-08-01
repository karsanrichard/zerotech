-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2015 at 03:34 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zerocorp`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `parent_id`) VALUES
(1, 'Accessories', 'These are peripheral hardware devices.', 0),
(2, 'Computers', 'These are computers.', 0),
(3, 'Cameras', 'Devices used to capture special moments.', 0),
(4, 'Phones', 'Awesome life companions used for communication.', 0),
(5, 'Headphones', 'Amazing devices to listen to your finest tunes from all your devices.', 1),
(6, 'Mouse', 'Input devices for your computers.', 1),
(7, 'Keyboard', 'Input device for typing.', 1),
(8, 'Speakers', 'Output device that allows you to listen to all of your finest tunes.', 1),
(9, 'Video Camera', 'Awesome device that captures the amazing videos.', 2),
(10, 'Photo Camera', 'Amazing device that captures your best photos.', 2),
(11, 'Laptop', 'Portable computer, convenient for your lifestyle', 3),
(12, 'Desktop', 'Traditional computers stations.', 3),
(13, 'All-in-one', 'Computers that have the monitor and the CPU joined.', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
