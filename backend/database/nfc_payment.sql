-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 01:32 AM
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
-- Table structure for table `input_card`
--

CREATE TABLE `input_card` (
  `id` int(11) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `time_entered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `input_card`
--

INSERT INTO `input_card` (`id`, `card_number`, `time_entered`) VALUES
(1, '0', '2022-12-19 14:24:07'),
(2, '0', '2022-12-19 14:24:09'),
(3, '0', '2022-12-19 14:24:22'),
(4, '0', '2022-12-19 14:24:24'),
(5, '0', '2022-12-19 14:24:29'),
(6, '333', '2022-12-19 14:25:45'),
(7, '.C2B1B421.', '2022-12-19 14:26:54'),
(8, '.C2B1B421.', '2022-12-19 14:27:03'),
(9, '.C2B1B421.', '2022-12-19 14:27:04'),
(10, '.C2B1B421.', '2022-12-19 14:28:11'),
(11, '.E2605021.', '2022-12-19 14:28:48'),
(12, '.E2605021.', '2022-12-19 14:28:50'),
(13, '.A1506D26.', '2022-12-19 14:29:08'),
(14, '.A1506D26.', '2022-12-19 14:29:21'),
(15, '.C2B1B421.', '2022-12-19 14:29:30'),
(16, '.A1506D26.', '2022-12-19 14:29:31'),
(17, '.C2B1B421.', '2022-12-19 14:29:32'),
(18, '.A1506D26.', '2022-12-19 14:29:33');

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
(1, 'C2B1B421', 1, 400, 0, 3400, '2022-12-20 23:59:04'),
(2, 'C2B1B421', 1, 400, 0, 3000, '2022-12-21 00:00:32'),
(3, 'C2B1B421', 0, 400, 0, 3400, '2022-12-21 00:01:31'),
(4, 'C2B1B421', 0, 400, 0, 3800, '2022-12-21 00:01:58'),
(5, 'C2B1B421', 0, 400, 3800, 4200, '2022-12-21 00:21:49'),
(6, 'C2B1B421', 0, 400, 4200, 4600, '2022-12-21 00:22:20'),
(7, 'C2B1B421', 0, 400, 4600, 5000, '2022-12-21 00:22:30'),
(8, 'C2B1B421', 1, 400, 5000, 4600, '2022-12-21 00:24:56'),
(9, 'C2B1B421', 1, 400, 4600, 4200, '2022-12-21 00:25:01'),
(10, 'C2B1B421', 1, 400, 4200, 3800, '2022-12-21 00:25:12');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`student_id`, `matric_number`, `name`, `card_number`, `balance`, `date_created`) VALUES
(1, '21/8874', 'Somade Daniel ', 'C2B1B421', 3800, '2022-12-21 00:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input_card`
--
ALTER TABLE `input_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

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
-- AUTO_INCREMENT for table `input_card`
--
ALTER TABLE `input_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
