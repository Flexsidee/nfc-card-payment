-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 10:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfc_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `card_number` varchar(15) NOT NULL,
  `transaction_type` int(2) NOT NULL,
  `amount` int(11) NOT NULL,
  `previous_balance` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `card_number`, `transaction_type`, `amount`, `previous_balance`, `balance`, `time`) VALUES
(1, '71FCD126', 0, 3000, 2000, 5000, '2022-12-27 15:32:55'),
(2, 'C2B1B421', 0, 2000, 10500, 12500, '2022-12-27 15:54:16'),
(3, 'C2B1B421', 0, 5000, 12500, 17500, '2022-12-27 16:04:45'),
(4, 'C2B1B421', 0, 2500, 17500, 20000, '2022-12-29 19:22:32'),
(5, 'C2B1B421', 0, 5000, 20000, 25000, '2022-12-30 20:32:50'),
(6, 'C2B1B421', 0, 2000, 25000, 27000, '2023-01-06 11:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reads_card` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `amount`, `reads_card`, `timestamp`) VALUES
(1, 1672155155, 3000, 1, '2022-12-27 15:32:55'),
(2, 1672156442, 2000, 1, '2022-12-27 15:54:16'),
(3, 1672157061, 5000, 1, '2022-12-27 16:04:45'),
(4, 1672341723, 2500, 1, '2022-12-29 19:22:32'),
(5, 1672432360, 5000, 1, '2022-12-30 20:32:50'),
(6, 1673006318, 2000, 1, '2023-01-06 11:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `student_id` int(11) NOT NULL,
  `matric_number` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `balance` int(5) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`student_id`, `matric_number`, `name`, `card_number`, `balance`, `password`, `date_created`) VALUES
(1, '21/8874', 'Somade Daniel ', 'C2B1B421', 27000, 'somade', '2023-01-06 11:58:49'),
(2, 'admin', 'admin', '', 23, 'admin', '2022-12-31 01:42:39'),
(4, '21/8714', 'Salami Kehinde', '71FCD126', 5000, 'salami', '2022-12-27 15:32:55'),
(5, '21/93734', 'Shifatu Usman', '36698JLJSD', 0, 'usman', '2022-12-29 18:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `card_number` (`card_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
