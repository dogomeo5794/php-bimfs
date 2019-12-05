-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 01:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `brother_sister`
--

CREATE TABLE `brother_sister` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `sex` set('male','female') NOT NULL,
  `bdate` date NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_reg` date NOT NULL,
  `child_no` int(11) NOT NULL,
  `familno` varchar(20) NOT NULL,
  `datefirstseen` date NOT NULL,
  `birthweight` decimal(5,2) NOT NULL,
  `deliveryplace` varchar(100) NOT NULL,
  `registerdate` date NOT NULL,
  `birthat` varchar(100) NOT NULL,
  `mothersname` varchar(300) NOT NULL,
  `motherseduclevel` varchar(100) NOT NULL,
  `motherswork` varchar(100) NOT NULL,
  `fathername` varchar(300) NOT NULL,
  `fatherseduclevel` varchar(100) NOT NULL,
  `fatherwork` varchar(100) NOT NULL,
  `brgy_id` int(11) NOT NULL COMMENT 'patient address FK from table barangay',
  `login_id` int(11) NOT NULL COMMENT 'FK from user who added this records'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `current_pregnant_action`
--

CREATE TABLE `current_pregnant_action` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `hint` varchar(100) NOT NULL,
  `date_reg` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cur_pregnant_answer`
--

CREATE TABLE `cur_pregnant_answer` (
  `id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `date_reg` date NOT NULL,
  `curpreg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cur_pregnant_hint`
--

CREATE TABLE `cur_pregnant_hint` (
  `id` int(11) NOT NULL,
  `trimesterno` int(2) NOT NULL,
  `date_reg` date NOT NULL,
  `curpregnant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Error reading data for table 20191007_bimfs_db.cur_pregnant_hint: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `20191007_bimfs_db`.`cur_pregnant_hint`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `date_toxoid`
--

CREATE TABLE `date_toxoid` (
  `id` int(11) NOT NULL,
  `dateconduct` date NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `datereg` datetime NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `datereg`, `staff_id`) VALUES
(6, 'rdogomeo94', '30b38d53f9a44b27de873bbeb72427d9057a71acc4f7c3c2a5df186311ba53c9', '2019-10-15 00:00:00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `date_reg` date NOT NULL,
  `familyno` varchar(20) NOT NULL,
  `heigthcm` decimal(5,2) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL COMMENT 'FK from user who added this records'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_answer`
--

CREATE TABLE `pregnant_answer` (
  `id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `pregrechint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_lmp_edc`
--

CREATE TABLE `pregnant_lmp_edc` (
  `id` int(11) NOT NULL,
  `preg_date` date NOT NULL,
  `type` set('lmp','edc') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_records`
--

CREATE TABLE `pregnant_records` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `datereg` date NOT NULL,
  `types` set('previous','current') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_records_hint`
--

CREATE TABLE `pregnant_records_hint` (
  `id` int(11) NOT NULL,
  `pregno` int(2) NOT NULL,
  `hint` varchar(100) NOT NULL,
  `pregrecords_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_visit`
--

CREATE TABLE `pregnant_visit` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `weekno_from` int(3) NOT NULL,
  `weekno_to` int(3) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_visit_answer`
--

CREATE TABLE `pregnant_visit_answer` (
  `id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `type` set('home','center') NOT NULL,
  `date_reg` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `pregvisithint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_visit_hint`
--

CREATE TABLE `pregnant_visit_hint` (
  `id` int(11) NOT NULL,
  `weeknofrom` int(3) NOT NULL,
  `weeknoto` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `pregvisit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_date`
--

CREATE TABLE `services_date` (
  `id` int(11) NOT NULL,
  `dateconduct` date NOT NULL,
  `service_id` int(11) NOT NULL
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
(12, '12345', 'ronald', 'recibido', 'dogomeo', 'toboso, negros occidental', 'admin', '1994-05-07', '09078345303', 'dogomeo5794@gmail.com', 'active', 'single', '2018-11-27', 'filipino', 'male');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `brother_sister`
--
ALTER TABLE `brother_sister`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`login_id`),
  ADD KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `current_pregnant_action`
--
ALTER TABLE `current_pregnant_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cur_pregnant_answer`
--
ALTER TABLE `cur_pregnant_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `curpreg_id` (`curpreg_id`);

--
-- Indexes for table `cur_pregnant_hint`
--
ALTER TABLE `cur_pregnant_hint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curpregnant_id` (`curpregnant_id`);

--
-- Indexes for table `date_toxoid`
--
ALTER TABLE `date_toxoid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`login_id`),
  ADD KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `pregnant_answer`
--
ALTER TABLE `pregnant_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `pregrechint_id` (`pregrechint_id`);

--
-- Indexes for table `pregnant_lmp_edc`
--
ALTER TABLE `pregnant_lmp_edc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregnant_records`
--
ALTER TABLE `pregnant_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pregnant_records_hint`
--
ALTER TABLE `pregnant_records_hint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregrecords_id` (`pregrecords_id`);

--
-- Indexes for table `pregnant_visit`
--
ALTER TABLE `pregnant_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pregnant_visit_answer`
--
ALTER TABLE `pregnant_visit_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregvisithint_id` (`pregvisithint_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pregnant_visit_hint`
--
ALTER TABLE `pregnant_visit_hint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `pregvisit_id` (`pregvisit_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services_date`
--
ALTER TABLE `services_date`
  ADD KEY `service_id` (`service_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brother_sister`
--
ALTER TABLE `brother_sister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `current_pregnant_action`
--
ALTER TABLE `current_pregnant_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cur_pregnant_answer`
--
ALTER TABLE `cur_pregnant_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cur_pregnant_hint`
--
ALTER TABLE `cur_pregnant_hint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `date_toxoid`
--
ALTER TABLE `date_toxoid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pregnant_answer`
--
ALTER TABLE `pregnant_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_lmp_edc`
--
ALTER TABLE `pregnant_lmp_edc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_records`
--
ALTER TABLE `pregnant_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_records_hint`
--
ALTER TABLE `pregnant_records_hint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_visit`
--
ALTER TABLE `pregnant_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_visit_answer`
--
ALTER TABLE `pregnant_visit_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnant_visit_hint`
--
ALTER TABLE `pregnant_visit_hint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `children_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parents_ibfk_2` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
