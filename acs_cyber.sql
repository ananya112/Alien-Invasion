-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2015 at 06:17 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acs_cyber`
--

-- --------------------------------------------------------

--
-- Table structure for table `competetion`
--

CREATE TABLE IF NOT EXISTS `competetion` (
`competetion_number` int(11) NOT NULL,
  `game1` int(11) DEFAULT NULL,
  `game2` int(11) DEFAULT NULL,
  `game3` int(11) DEFAULT NULL,
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `competetion`
--


-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`game_number` int(11) NOT NULL,
  `hacker` int(11) DEFAULT NULL,
  `defender` int(11) DEFAULT NULL,
  `score_hacker` int(11) DEFAULT NULL,
  `score_defender` int(11) DEFAULT NULL,
  `vulnerability1` varchar(15) DEFAULT NULL,
  `vulnerability2` varchar(15) DEFAULT NULL,
  `vulnerability3` varchar(15) DEFAULT NULL,
  `winner` varchar(10) DEFAULT NULL,
  `bonus_hacker` int(11) DEFAULT NULL,
  `bonus_defender` int(11) DEFAULT NULL,
  `hacked_at1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hacked_at2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hacked_at3` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `game`
--


-- --------------------------------------------------------

--
-- Table structure for table `matched`
--

CREATE TABLE IF NOT EXISTS `matched` (
`id` int(11) NOT NULL,
  `hacker` int(11) DEFAULT NULL,
  `defender` int(11) DEFAULT NULL,
  `competetion_number` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `matched`
--



-- --------------------------------------------------------

--
-- Table structure for table `moves`
--

CREATE TABLE IF NOT EXISTS `moves` (
`id` int(11) NOT NULL,
  `move` varchar(500) DEFAULT NULL,
  `made_by` varchar(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score_hacker` int(11) DEFAULT NULL,
  `score_defender` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `moves`
--



-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `registration`
--



-- --------------------------------------------------------

--
-- Table structure for table `wait`
--

CREATE TABLE IF NOT EXISTS `wait` (
`number` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competetion`
--
ALTER TABLE `competetion`
 ADD PRIMARY KEY (`competetion_number`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`game_number`);

--
-- Indexes for table `matched`
--
ALTER TABLE `matched`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moves`
--
ALTER TABLE `moves`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wait`
--
ALTER TABLE `wait`
 ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competetion`
--
ALTER TABLE `competetion`
MODIFY `competetion_number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
MODIFY `game_number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `matched`
--
ALTER TABLE `matched`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `moves`
--
ALTER TABLE `moves`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `wait`
--
ALTER TABLE `wait`
MODIFY `number` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
