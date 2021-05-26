-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 10:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `sid` int(11) NOT NULL,
  `roll_no` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sid`, `roll_no`, `username`, `password`) VALUES
(1, '2K19/SE/101', 'riyabansal_2k19se101@dtu.ac.in', 'riyabansal'),
(7, '2K19/SE/135', 'tanyasamyal_2k19se135@dtu.ac.in', 'tanyasamyal'),
(10, '2K19/SE/106', 'sahithibommareddy_2k19se106@dtu.ac.in', 'sahithi');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `keyword1` text NOT NULL,
  `keyword2` text NOT NULL,
  `keyword3` text NOT NULL,
  `keyword4` text NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `keyword1`, `keyword2`, `keyword3`, `keyword4`, `answer`) VALUES
(5, '4th', 'sem', 'fee', 'due', 'you can contact at 9999900000'),
(6, 'end', '4th', 'will', 'sem', 'Your 4th sem will end on 5 may.'),
(7, 'subjects', '4rd', 'sem', 'SE', 'The subjects in 4th sem are: DBMS, Software Engineering, Digital Electronics, Discreet Structure, COA and FEC '),
(10, 'declared', '4th', 'results', 'SE', 'Your result will be declared on 25th may'),
(12, '5th', 'sem', 'results', 'SE', 'Your will be out on 25th january 2021'),
(13, 'timetable', '4th', 'sem', 'SE', 'your time table is A2SE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `roll_no` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `att1` text NOT NULL,
  `att2` text NOT NULL,
  `att3` text NOT NULL,
  `att4` text NOT NULL,
  `att5` text NOT NULL,
  `att6` text NOT NULL,
  `branch` text NOT NULL,
  `year` text NOT NULL,
  `fee_status` text NOT NULL,
  `accountExist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `roll_no`, `email`, `password`, `name`, `address`, `att1`, `att2`, `att3`, `att4`, `att5`, `att6`, `branch`, `year`, `fee_status`, `accountExist`) VALUES
(1, '2K19/SE/101', 'riyabansal_2k19se101@dtu.ac.in', 'riyabansal', 'Riya Bansal', 'haryana,India', '20/20', '20/20', '24/25', '30/30', '20/20', '24/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 1),
(5, '2K19/SE/099', 'ritikgupta_2k19se099@dtu.ac.in', 'ritik', 'Ritik Gupta', 'Delhi, India', '18/20', '20/20', '24/25', '27/30', '16/20', '21/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 0),
(6, '2K19/SE/100', 'riya_2k19se100@dtu.ac.in', 'riya', 'Riya Arora', 'Delhi,India', '16/20', '17/20', '20/25', '20/30', '12/20', '23/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 0),
(7, '2K19/SE/135', 'tanyasamyal_2k19se135@dtu.ac.in', 'tanyasamyal', 'Tanya Samyal', 'Faridabad, India', '20/20', '19/20', '24/25', '26/30', '18/20', '25/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 1),
(8, '2K19/SE/078', 'naseebullahmomand_2k19se078@dtu.ac.in', 'naseebullahmomand', 'Naseebullah Momand', 'Afganishtan', '19/20', '15/20', '20/25', '20/30', '19/20', '19/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 0),
(9, '2K19/SE/079', 'natashamushinge_2k19se079@dtu.ac.in', 'natashamushinge', 'Natasha Mushinge', 'Afganishtan', '16/20', '12/20', '20/25', '28/30', '20/20', '21/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 0),
(10, '2K19/SE/106', 'sahithibommareddy_2k19se106@dtu.ac.in', 'sahithi', 'Sahithi Bommaraddy', 'US', '20/20', '19/20', '24/25', '29/30', '16/20', '20/25', 'SOFTWARE ENGINEERING', '2019-2023', 'PAID', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);
ALTER TABLE `questions` ADD FULLTEXT KEY `keyword1` (`keyword1`,`keyword2`,`keyword3`,`keyword4`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sid` (`sid`),
  ADD UNIQUE KEY `sid_3` (`sid`),
  ADD KEY `sid_2` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
