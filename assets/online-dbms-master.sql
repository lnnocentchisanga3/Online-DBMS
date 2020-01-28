-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2020 at 03:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-dbms-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `document-id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`document-id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document-id`, `user_email`, `document_name`, `date_time`) VALUES
(1, 'lnnocentchisanga3@gmail.com', '75247283_721875688288278_7998201670431408128_n.jpg', '2020-01-20 01:43:09'),
(2, 'lnnocentchisanga3@gmail.com', 'a.jpg', '2020-01-20 01:43:47'),
(3, 'lnnocentchisanga3@gmail.com', '', '2020-01-20 11:46:20'),
(4, 'lnnocentchisanga3@gmail.com', '5HPExKN-holy-bible-wallpaper.jpg', '2020-01-20 11:46:37'),
(5, 'lnnocentchisanga3@gmail.com', '5HPExKN-holy-bible-wallpaper.jpg', '2020-01-20 11:51:15'),
(6, 'lnnocentchisanga3@gmail.com', '5HPExKN-holy-bible-wallpaper.jpg', '2020-01-20 11:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `music_file`
--

DROP TABLE IF EXISTS `music_file`;
CREATE TABLE IF NOT EXISTS `music_file` (
  `musicfile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `timedate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task-name` varchar(30) NOT NULL,
  `derscription` varchar(100) NOT NULL,
  `time_date` datetime NOT NULL,
  `email` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

DROP TABLE IF EXISTS `tool`;
CREATE TABLE IF NOT EXISTS `tool` (
  `tool_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `derscription` text NOT NULL,
  PRIMARY KEY (`tool_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `password`, `email`, `username`) VALUES
('Chisanga', 'Innocent', '$2y$10$ineedsomecrazystringsu3uGEi7skPRTO5MnoeJsJHFWZ90jP0GS', 'lnnocentchisanga3@gmail.com', 'Maluine'),
('Munshya', 'Francis', '$2y$10$ineedsomecrazystringsu3uGEi7skPRTO5MnoeJsJHFWZ90jP0GS', 'chisangainnocent@outlook.com', 'admin'),
('Munshya', 'Francis', '$2y$10$ineedsomecrazystringsu3uGEi7skPRTO5MnoeJsJHFWZ90jP0GS', 'admin@mail.com', 'Maluine');
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `phonenumber`, `email`, `username`, `password`, `date`) VALUES
(1, 'MR Adeleke Adebayo', '483984093840938', 'oshorisqat97@gmail.com', 'adeleke123', 'etisalat123', '2019-09-06 10:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(120) NOT NULL,
  `studentname` text NOT NULL,
  `supervisor` text NOT NULL,
  `matricnumber` text NOT NULL,
  `projecttopic` text NOT NULL,
  `projectplatform` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `level` text NOT NULL,
  `users` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `studentname`, `supervisor`, `matricnumber`, `projecttopic`, `projectplatform`, `date`, `status`, `level`, `users`) VALUES
(1, 'Osho Risqat', 'Mr Olaitan', '16/69/0061', 'School Management system', 'Mobile (IOS)', '0000-00-00 00:00:00', '', 'ND', 'Individual'),
(2, 'Osho Risqat', 'Mr Olaitan', '16/69/0061', 'Online student forum', 'Web', '2019-09-06 09:43:57', '', 'HND', 'Individual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
