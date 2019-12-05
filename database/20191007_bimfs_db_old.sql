-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 02:26 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20191007_bimfs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(100) NOT NULL,
  `brgy_lat` double NOT NULL,
  `brgy_long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`brgy_id`, `brgy_name`, `brgy_lat`, `brgy_long`) VALUES
(1, 'puey', 10.72831, 123.31318),
(2, 'colonia divina', 10.768, 123.32718),
(3, 'taba-ao', 10.9225, 123.44032),
(4, 'maquiling', 10.78652, 123.37567),
(5, 'baviera', 10.8061, 123.3525),
(6, 'siwahon 1', 10.80187, 123.32934),
(7, 'lopez jaena', 10.81351, 123.40207),
(8, 'bato', 10.81404, 123.37783),
(9, 'rizal', 10.83838, 123.40638),
(10, 'general luna', 10.83947, 123.42885),
(11, 'campo himoga-an', 10.83412, 123.37503),
(12, 'tadlong', 10.84545, 123.34492),
(13, 'malubon', 10.85803, 123.36926),
(14, 'rafaela barrera', 10.86621, 123.43589),
(15, 'fabrica', 10.88037, 123.34332),
(16, 'paraiso', 10.88603, 123.36991),
(17, 'poblacion 2', 10.89138, 123.3997),
(18, 'himoga-an baybay', 10.92039, 123.37513),
(19, 'poblacion 1', 10.8798, 123.41227),
(20, 'old sagay', 10.92621, 123.41227),
(21, 'andres bonifacio', 10.87851, 123.4801),
(22, 'laridel', 10.88968, 123.45297),
(23, 'vito', 10.8957, 123.50504),
(24, 'bulanon', 10.91547, 123.48229),
(25, 'molocaboc', 10.96101, 123.56193);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` set('male','female') NOT NULL DEFAULT 'male',
  `birthday` date NOT NULL,
  `brgy_id` int(11) NOT NULL COMMENT 'patient address FK from table barangay',
  `guardian` varchar(300) NOT NULL,
  `date_reg` date NOT NULL,
  `user_id` varchar(200) NOT NULL COMMENT 'FK from user who added this records'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `fname`, `mname`, `lname`, `gender`, `birthday`, `brgy_id`, `guardian`, `date_reg`, `user_id`) VALUES
(2, 'ronald', 'recibido', 'dogomeo', 'male', '1994-05-07', 1, 'none', '2019-09-17', '5032109854129858949450585616503'),
(4, 'kadong', 'morados', 'recidido', 'female', '1994-05-07', 4, 'N/A', '2019-09-21', '9290969452349054145232183430545'),
(5, 'Dodong', 'morados', 'recidido', 'female', '1994-05-07', 4, 'N/A', '2019-09-21', '9290969452349054145232183430545'),
(6, 'patient 1 fname', 'patient 1 mname', 'patient 1 lname', 'female', '1995-05-07', 1, 'N/A', '2019-09-22', '9290969452349054145232183430545');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` int(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `datereg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` set('male','female') NOT NULL DEFAULT 'male',
  `birthday` date NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `brgy_id` int(11) NOT NULL COMMENT 'patient address FK from table barangay',
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `date_reg` date NOT NULL,
  `user_id` varchar(200) NOT NULL COMMENT 'FK from user who added this records'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `process` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process_content`
--

CREATE TABLE `process_content` (
  `id` int(11) NOT NULL,
  `process_content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `id` int(11) NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setup_content`
--

CREATE TABLE `setup_content` (
  `id` int(11) NOT NULL,
  `process` int(11) NOT NULL,
  `process_who` set('children','parents') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `id_no` varchar(20) NOT NULL COMMENT 'staff id no (id must unique number)',
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `position` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `active_status` set('active','deactive') NOT NULL COMMENT '''0'' for deactive | ''1'' for active',
  `civil_status` varchar(20) NOT NULL,
  `date_employed` date NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `gender` set('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `id_no`, `fname`, `mname`, `lname`, `address`, `position`, `birthdate`, `contact`, `email`, `active_status`, `civil_status`, `date_employed`, `nationality`, `gender`) VALUES
(1, '12345', 'admin', 'admin', 'admin', 'admin', 'admin', '1994-07-05', 'admin', 'admin', 'active', 'admin', '2019-09-17', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `log_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `userid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(200) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_content`
--
ALTER TABLE `process_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id_no` (`id_no`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_content`
--
ALTER TABLE `process_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup`
--
ALTER TABLE `setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
