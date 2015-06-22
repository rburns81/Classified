-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 06:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classifiedads`
--

-- --------------------------------------------------------

--
-- Table structure for table `classifiedads`
--

CREATE TABLE IF NOT EXISTS `classifiedads` (
`Id` int(11) NOT NULL,
  `AdOwner` varchar(200) NOT NULL,
  `Type` int(11) NOT NULL,
  `Teaser` varchar(300) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Price` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `Contact1` varchar(100) NOT NULL,
  `Contact2` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classifiedads`
--

INSERT INTO `classifiedads` (`Id`, `AdOwner`, `Type`, `Teaser`, `Description`, `Price`, `IsActive`, `Contact1`, `Contact2`) VALUES
(1, 'Rich', 1, 'Wardrobe', 'Oak wardrobe. Very fancy.  Some wear and tear.', 50, 1, 'me@somewhere.com', '123-456-7890'),
(3, 'Rich', 2, 'Widget', 'Variable speed widget.  Like, a lot of speeds, you know?', 20, 1, '123-456-7890', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classifiedads`
--
ALTER TABLE `classifiedads`
 ADD PRIMARY KEY (`Id`), ADD KEY `Type` (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classifiedads`
--
ALTER TABLE `classifiedads`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classifiedads`
--
ALTER TABLE `classifiedads`
ADD CONSTRAINT `classifiedads_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `classifiedstypes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
