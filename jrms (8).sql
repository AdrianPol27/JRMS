-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 03:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `feedback_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`feedback_id`, `request_id`, `fullname`, `feedback`) VALUES
(4, 93, 'Adrian Pol Peligrino', 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `requests_tbl`
--

CREATE TABLE `requests_tbl` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `unit_head` varchar(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `requested_by` varchar(100) NOT NULL,
  `work_to_be_done` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_cost` int(10) NOT NULL,
  `total_cost` int(10) NOT NULL,
  `labor_needed` int(11) NOT NULL,
  `requested_date` date NOT NULL,
  `requested_month` varchar(10) NOT NULL,
  `completion_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests_tbl`
--

INSERT INTO `requests_tbl` (`request_id`, `user_id`, `unit`, `unit_head`, `college`, `department`, `requested_by`, `work_to_be_done`, `quantity`, `unit_cost`, `total_cost`, `labor_needed`, `requested_date`, `requested_month`, `completion_date`, `status`) VALUES
(91, 3, '', '', 'None', 'popl', 'Adrian Pol Peligrino', 'wr', 0, 0, 0, 0, '2022-05-21', 'May', '0000-00-00', 'Cancelled'),
(92, 3, '', '', 'None', 'ZXCZXC', 'Adrian Pol Peligrino', 'zxczxc', 0, 0, 0, 0, '2022-05-21', 'May', '0000-00-00', 'Cancelled'),
(93, 3, 'Repair and Fabrication Unit', 'Test', 'COA', 'ITSS', 'Adrian Pol Peligrino', 'fhfghfg', 1, 3, 3, 2, '2022-05-24', 'May', '2022-05-24', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `privilege_level` int(1) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(75) NOT NULL,
  `middle_name` varchar(75) DEFAULT NULL,
  `last_name` varchar(75) NOT NULL,
  `extension_name` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `privilege_level` int(1) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `extension_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `privilege_level`, `first_name`, `middle_name`, `last_name`, `extension_name`, `email`, `password`) VALUES
(1, 1, 'Admin', 'Admin', 'Admin', '', 'admin@gmail.com', 'admin'),
(3, 2, 'Adrian Pol', 'Sano', 'Peligrino', '', 'adrianpolpeligrino27@gmail.com', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_privilege_level` FOREIGN KEY (`privilege_level`) REFERENCES `privileges` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
