-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 29, 2021 at 10:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(300) NOT NULL,
  `id` int(20) NOT NULL,
  `spec` varchar(2000) NOT NULL,
  `vday` varchar(1000) NOT NULL,
  `vts` varchar(300) NOT NULL,
  `vte` varchar(300) NOT NULL,
  `img` varchar(500) NOT NULL,
  `fee` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `id`, `spec`, `vday`, `vts`, `vte`, `img`, `fee`) VALUES
('Dr: Md.Nurul Amin', 1000, 'MBBS,BCS,C.M.U. Former Civil Surgeon,Rajbari.', 'Saturday Sunday Munday Wednesday Tuesday Thursday Friday', '5:00 pm', ' 8:00 pm', '1627542929photo_2021-07-29_13-08-03.jpg', '500');

-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `srno` int(20) NOT NULL,
  `sid` varchar(300) NOT NULL,
  `pname` varchar(300) NOT NULL,
  `pmn` varchar(300) NOT NULL,
  `did` varchar(300) NOT NULL,
  `dname` varchar(300) NOT NULL,
  `dspec` varchar(1000) NOT NULL,
  `rptime` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `fee` varchar(300) NOT NULL,
  `age` varchar(200) NOT NULL,
  `tdate` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serial`
--

INSERT INTO `serial` (`srno`, `sid`, `pname`, `pmn`, `did`, `dname`, `dspec`, `rptime`, `date`, `fee`, `age`, `tdate`) VALUES
(1, '1485736543', 'hasan', '01770377557', '1000', 'Dr: Md.Nurul Amin', 'MBBS,BCS,C.M.U. Former Civil Surgeon,Rajbari.', '5:00 pm', '2092021', '500', '23', '29/07/2021');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `msg_id` int(20) NOT NULL,
  `in_id` varchar(300) NOT NULL,
  `out_id` varchar(300) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`msg_id`, `in_id`, `out_id`, `msg`) VALUES
(1, '', '', ''),
(234, 'admin', '289748810', 'jhlhkkj'),
(235, 'admin', '289748810', 'jjkj'),
(236, 'admin', '289748810', 'jflagasflhaf'),
(237, 'admin', '289748810', 'afghafjg'),
(238, 'admin', '289748810', 'hahglkja'),
(239, 'admin', '289748810', 'afahg'),
(240, '289748810', 'admin', 'hello,,,'),
(241, 'admin', '289748810', 'hi,,'),
(242, 'admin', '709488270', 'hlkafjk'),
(243, 'admin', '709488270', 'hello,,'),
(244, '1541033453', 'admin', '7908709'),
(245, 'admin', '289748810', 'klkl;k'),
(246, 'admin', '639540315', 'jkhhkjl'),
(247, 'admin', '639540315', 'helllo,,'),
(248, '1541033453', 'admin', 'hi,,');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(300) NOT NULL,
  `name` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `phnNo` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `LmsgId` varchar(300) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phnNo`, `pass`, `status`, `LmsgId`) VALUES
('1226374592', 'Md. Milon Hossain', 'milon15-11603@diu.edu.bd', '01521477601', 'milon', 'admin', '28'),
('1541033453', 'Sakira Rezowana Sammy', 'sakira15-11448@diu.edu.bd', '01765750400', 'user3', 'user', '248'),
('289748810', 'Abdur Nur Tusher', 'abdur15-11632@diu.edu.bd', '01749517945', 'user1', 'user', '245'),
('589048525', 'Abdur Nur Tusher', 'abdur15-11632@diu.edu.bd', '01749517945', 'tusher', 'admin', '27'),
('589490746', 'Sakira Rezowana Sammy', 'sakira15-11448@diu.edu.bd', '01765750400', 'sammy', 'admin', ''),
('639540315', 'Shadaab Kawnain Bashir', 'shadaab.cse@diu.edu.bd', '01611499116', 'shadaab', 'user', '247'),
('709488270', 'Md. Milon Hossain', 'hossainmilon759@gmail.com', '01770377557', 'user2', 'user', '243');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `msg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
