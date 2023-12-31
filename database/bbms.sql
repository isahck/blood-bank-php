-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 09:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(11) NOT NULL,
  `blood_id` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `blood_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`id`, `blood_id`, `blood_group`, `blood_quantity`) VALUES
(1, '', 'o+', '69'),
(2, '', 'o-', '18'),
(3, '', 'ab', '18'),
(4, '', 'ab+', '32'),
(5, '', 'ab-', '10'),
(6, '', 'a+', '43'),
(7, '', 'a-', '42'),
(8, '', 'b+', '0'),
(9, '', 'b-', '35');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `user_donator_name` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `blood_quantity` varchar(255) NOT NULL,
  `desease` varchar(255) NOT NULL,
  `donated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `user_donator_name`, `blood_group`, `blood_quantity`, `desease`, `donated_at`) VALUES
(1, 'donor', 'ab', '12', 'fever\r\n', '2023-12-31 19:07:58'),
(2, 'donor', 'ab', '12', 'fever\r\n', '2023-12-31 19:08:48'),
(3, 'donor', 'ab-', '7', 'fever', '2023-12-31 19:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `donor_mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`donor_id`, `donor_name`, `donor_email`, `blood_group`, `donor_mobile`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'donor', 'donor@gmail.com', 'o-', '8673', 'donor', 'IMG_9902.jpg', '2023-12-31 19:07:18', '2023-12-31 19:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `request_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `blood_quantity` varchar(255) NOT NULL,
  `blood_id` varchar(255) NOT NULL,
  `reson` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `request_id`, `user_id`, `donor_id`, `blood_group`, `blood_quantity`, `blood_id`, `reson`, `status`, `requested_at`) VALUES
(1, 'request/6591bde09a500', 'user/6591bcdb6ed37', 0, 'o+', '12', '1', 'fever', 'Approved', '2023-12-31 19:15:44'),
(2, 'request/6591bf0c4072d', '', 1, 'o+', '12', '1', 'fever', 'Approved', '2023-12-31 19:20:44'),
(3, 'request/6591c332d1090', '', 1, 'o+', '6', '1', 'fever', 'Approved', '2023-12-31 19:38:26'),
(4, 'request/6591c3424b056', '', 1, 'b-', '10', '9', 'fever', 'Approved', '2023-12-31 19:38:42'),
(5, 'request/6591c35311a19', '', 1, 'a-', '12', '7', 'fever', 'Rejected', '2023-12-31 19:38:59'),
(6, 'request/6591c4475fb09', 'user/6591bcdb6ed37', 0, 'o+', '68', '1', 'fever', 'Rejected', '2023-12-31 19:43:03'),
(7, 'request/6591c4ba2b57d', 'user/6591bcdb6ed37', 0, 'b+', '22', '8', 'fever', 'Approved', '2023-12-31 19:44:58'),
(8, 'request/6591c4d780ece', 'user/6591bcdb6ed37', 0, 'o-', '2', '2', 'fever', 'Approved', '2023-12-31 19:45:27'),
(9, 'request/6591c66575c49', '', 1, 'a-', '1', '7', 'fever', 'pending', '2023-12-31 19:52:05'),
(10, 'request/6591c80d6c11b', 'user/6591c7c45384f', 0, 'o-', '', '2', '', 'Approved', '2023-12-31 19:59:09'),
(11, 'request/6591c8b039581', 'user/6591c7c45384f', 0, 'o+', '1', '1', 'dfghjkdftgyhujk', 'Approved', '2023-12-31 20:01:52'),
(12, 'request/6591c8db7f7c9', 'user/6591c7c45384f', 0, 'o+', '3', '1', 'you are not seriouse', 'Rejected', '2023-12-31 20:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `mobile`, `blood`, `address`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'user/6591bcdb6ed37', 'muhammad yakub ahmad', 'muhammad@gmail.com', '757', 'Select Blood Group', 'lol', 'YUSUF 1.png', 'muhammad', '2023-12-31 19:11:23', '2023-12-31 19:11:23'),
(2, 'user/6591c7c45384f', 'muhammad', 'musa@gmail.com', '09070991321', 'o-', 'wsedfghjuiko', 'Screenshot (3).png', 'muhammad', '2023-12-31 19:57:56', '2023-12-31 19:57:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
