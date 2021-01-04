-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 07:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `businfo`
--

CREATE TABLE `businfo` (
  `id` int(11) NOT NULL,
  `busName` varchar(255) NOT NULL,
  `busNo` varchar(50) NOT NULL,
  `busRoute` varchar(255) NOT NULL,
  `driverId` int(5) NOT NULL,
  `helperId` varchar(5) NOT NULL,
  `stopage` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businfo`
--

INSERT INTO `businfo` (`id`, `busName`, `busNo`, `busRoute`, `driverId`, `helperId`, `stopage`, `remarks`, `startTime`, `endTime`) VALUES
(7, 'Hanif 208', '20190201', 'University to Mirpur-1', 1, '3', 'Mirpur1, Mirpur-2, Mirpur-10', 'Friday Off', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Shamoli -37', '20180101', 'University to Gazipur', 2, '1', 'Abdullahpur, Tongi, Board-Bazar, Chowrasta', 'Gifted By Khaleda Zia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Fulkuri2', '20191011', 'University to Abdullahpur', 3, '2', 'Abdullahpur, Tongi, Board-Bazar, Chowrasta', 'Remarks', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Rojonigondha2', '20191011', 'University to Tongi', 2, '1', 'stopage1, stopage2, stopage 3, etc', 'Gifted by Primenister', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Hanif 208', '2017103', 'Virsity to Dhaka', 3, '3', 'Mirpur1, Mirpur-2, Mirpur-10', 'ghdnfh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Jamuna 47', '2015502', 'Campas to Gabtoli', 1, '2', 'stopage1, stopage2, stopage 3, etc', 'Gifted By priminerster', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Electrical Engineering'),
(3, 'Civil Engineering'),
(4, 'English'),
(5, 'Bangla'),
(6, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `stopage` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route`, `stopage`, `remarks`) VALUES
(1, 'Campas To Gabtoli', 'Stopage 1, Stopage 2, Stopage 3', 'Saturday Off'),
(2, 'Campas To Gaziput', 'Abdullahpur, Tongi, Board Bazar, Chowrasta', 'Friday Off'),
(3, 'Campas To Motijheel', 'Stopage 1, Stopage 2', 'Sunday Off');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth'),
(7, 'Seven'),
(8, 'Eight'),
(9, 'Nine'),
(10, 'Ten'),
(11, 'Eleven'),
(12, 'Twelve'),
(13, 'Irrigular');

-- --------------------------------------------------------

--
-- Table structure for table `stafinfo`
--

CREATE TABLE `stafinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `busNo` varchar(50) NOT NULL,
  `routeId` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `presentAddress` varchar(255) NOT NULL,
  `permamantAddress` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stafinfo`
--

INSERT INTO `stafinfo` (`id`, `name`, `designation`, `busNo`, `routeId`, `gender`, `Phone`, `email`, `nid`, `presentAddress`, `permamantAddress`, `remarks`) VALUES
(7, 'Md Shihabul Islam', 'Driver', '20190201', 2, '', '01927656235', '', '19901234542987345', 'House#7, Road #02, Dhanmondi, Dhaka.', 'Vill: Test, P/O: Janina, P/S: Bolbo na, Dist: Bangladesh', ''),
(12, 'Md Ainal', 'Driver', '20180101', 1, '', '01925656235', '', '12345678998765432', 'Vill: Village, P/O: Post Office, P/S: Police Station, Dist: Dhaka', '', ''),
(14, 'Hello', 'Driver', '20191011', 3, '', '987654321', '', '34567890098765432', 'Vill: Madhabpur, Chitagong Sadar Chitagong', 'Dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `std_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `parmanant_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `grphone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `std_id`, `username`, `dept_id`, `sem_id`, `type`, `phone`, `present_address`, `parmanant_address`, `password`, `region`, `gender`, `remarks`, `batch`, `fname`, `grphone`, `email`) VALUES
(1, 'Md Sahadat Hossain', '201901', 'sahadat', 1, 8, 'Regular', '01756603812', 'Dhaka', 'Jhenaidah', 'eac49e5a38b9cd6b4c22e405354542dd', 'Islam', 'Male', 'Good', '101', 'Md Jahangir Alam', '019123456788', 'sahadat@gmail.com'),
(2, 'Md Rahamat Ali', '201902', 'rahamat', 2, 4, '', '01910922069', 'Jhenaidah', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', '', 'rahamat@gmail.com'),
(3, 'Md Yadul Al Hasan', '201903', 'yadul', 3, 5, '', '01915563260', 'Dhaka', '', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '', '', 'yadul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(3, 'sahadat', 'sahadatjh@gmail.com', 'eac49e5a38b9cd6b4c22e405354542dd', 'Admin'),
(4, 'Alamgir', 'alamgir@gmail.com', '665a37ba0764a390a04c35c7b4c60728', 'User'),
(5, 'Jehad', 'jehad@gmail.com', '2b68d992a12ca80309e47616be71666f', 'User'),
(6, 'sahadat_2011', 'sahadat_2011@yahoo.com', '2eff243f81c69dae4b5e14c82d13911a', 'User'),
(7, 'mamun', 'mamun@gmail.com', 'c8e36a853fe91f3a4a3c4d739e830139', 'User'),
(8, 'ami', 'ami@gmail.com', '6c5b7de29192b42ed9cc6c7f635c92e0', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businfo`
--
ALTER TABLE `businfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafinfo`
--
ALTER TABLE `stafinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businfo`
--
ALTER TABLE `businfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stafinfo`
--
ALTER TABLE `stafinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
