-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 01:56 AM
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

--
-- Dumping data for table `brother_sister`
--

INSERT INTO `brother_sister` (`id`, `name`, `sex`, `bdate`, `child_id`) VALUES
(1, 'SAMPLE SIBLINGS123', 'male', '2019-10-20', 10),
(2, 'another sibling', 'male', '1995-01-31', 10),
(3, 'ERTHE', 'female', '2014-11-20', 10);

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
  `login_id` int(11) NOT NULL COMMENT 'FK from user who added this records',
  `ifdone` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `fname`, `mname`, `lname`, `gender`, `birthday`, `date_reg`, `child_no`, `familno`, `datefirstseen`, `birthweight`, `deliveryplace`, `registerdate`, `birthat`, `mothersname`, `motherseduclevel`, `motherswork`, `fathername`, `fatherseduclevel`, `fatherwork`, `brgy_id`, `login_id`, `ifdone`) VALUES
(8, 'efer', 'adfv', 'aerr', 'male', '2012-09-08', '2019-10-16', 9, 'erg', '2019-06-08', '88.88', 'center', '2019-10-16', 'center', 'aer', 'aerv', 'ade', 'aer', 'eqr', 'adf', 1, 1, 0),
(9, 'aefa', 'ae', 'w', 'male', '2019-05-20', '2019-10-16', 5, '12345', '2019-05-05', '88.00', 'center', '2019-10-16', 'center', 'werg', 'srt', 'adfv', 'erg', 'srg', 'sgt', 1, 1, 0),
(10, 'ronald', 'dela pena', 'dogomeo', 'male', '1994-05-07', '2019-11-03', 2, '1234567', '1994-05-07', '50.00', 'toboso, center', '2019-11-03', 'toboso, center', 'analiza dogomeo', 'elementary level', 'none', 'saturnino dogomeo', 'elementary graduate', 'carpenter', 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `children_nutrition_services`
--

CREATE TABLE `children_nutrition_services` (
  `nutrition_id` int(11) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `answer_1st` varchar(100) DEFAULT NULL,
  `answer_2nd` varchar(100) DEFAULT NULL,
  `answer_3rd` varchar(100) DEFAULT NULL,
  `answer_4th` varchar(100) DEFAULT NULL,
  `answer_5th` varchar(100) DEFAULT NULL,
  `answer_6th` varchar(100) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `date_reg` date DEFAULT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children_nutrition_services`
--

INSERT INTO `children_nutrition_services` (`nutrition_id`, `question`, `answer_1st`, `answer_2nd`, `answer_3rd`, `answer_4th`, `answer_5th`, `answer_6th`, `remarks`, `date_reg`, `child_id`) VALUES
(1, 'new born screening', 'ok', '', '', '', '', '', NULL, '2019-11-03', 10),
(2, 'bcg (at birth)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(3, 'dpt (6 wks, 10 wks, 14 wks old)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(4, 'opv (6 wks, 10 wks, 14 wks old)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(5, 'hepatitis b (6 wks, 10 wks, 14 wks old)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(6, 'measles (9 mos.)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(7, 'vitamin a (start at 6 mos.)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-03', 10),
(8, 'pcv (3rd dose)', 'sample 1', 'okay dokay', '', '', '', '', NULL, '2019-11-03', 10);

-- --------------------------------------------------------

--
-- Table structure for table `current_problem`
--

CREATE TABLE `current_problem` (
  `cur_prob_id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `answer1` varchar(50) DEFAULT NULL,
  `answer2` varchar(50) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_problem`
--

INSERT INTO `current_problem` (`cur_prob_id`, `question`, `answer1`, `answer2`, `parent_id`) VALUES
(2, 'tubercolosis', NULL, NULL, 24),
(3, 'sobra sa 14 ka adlaw nga ubo', NULL, NULL, 24),
(4, 'sakit sa corazon', NULL, NULL, 24),
(5, 'diabetes', NULL, NULL, 24),
(6, 'hapo', NULL, NULL, 24),
(7, 'goiter', NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `date_toxoid`
--

CREATE TABLE `date_toxoid` (
  `id` int(11) NOT NULL,
  `date_1` date DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_toxoid`
--

INSERT INTO `date_toxoid` (`id`, `date_1`, `date_2`, `date_3`, `date_4`, `date_5`, `parent_id`) VALUES
(3, '2019-10-17', '2019-10-18', '2019-10-18', '2019-09-30', '2019-10-16', 24);

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
(1, 'admin', '4a0d12426920dfb35d244baa2f16cb5b052c286f8460a87df5dbb585150c2780', '2019-10-14 00:00:00', 1),
(4, 'ronald', '2a87818866d3a04424803030fdcd26d2a6ab37bbef9e7a0a82019e7fd204a62e', '2019-10-14 00:00:00', 8),
(5, 'uuser94', '0b6ecb3aa9b23589fb9e314b46c832d977e597228c1e358fcc564bd8ba733195', '2019-11-12 00:00:00', 9),
(6, 'sstaff194', '320485ee0733e14a191335a254b96730f6c76f08da17abd9c93a3031f318a7d5', '2019-11-12 00:00:00', 10),
(7, 'qqwe94', '2ebce7637570230f37fbb45661b073c9e02d87da168cc4466ebf057410350e56', '2019-11-12 00:00:00', 11),
(8, 'aasd94', '320485ee0733e14a191335a254b96730f6c76f08da17abd9c93a3031f318a7d5', '2019-11-12 00:00:00', 12);

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
  `bloodtype` varchar(5) NOT NULL,
  `date_reg` date NOT NULL,
  `pregdate` date NOT NULL,
  `familyno` varchar(20) NOT NULL,
  `heigthcm` decimal(5,2) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL COMMENT 'FK from user who added this records',
  `ifdone` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `fname`, `mname`, `lname`, `birthday`, `civil_status`, `bloodtype`, `date_reg`, `pregdate`, `familyno`, `heigthcm`, `brgy_id`, `login_id`, `ifdone`) VALUES
(24, 'sample 1', 'sample 1', 'sample 1', '1994-10-20', '', 'o+', '2019-10-26', '2014-10-20', 'sample 1', '85.00', 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_lmp_edc`
--

CREATE TABLE `pregnant_lmp_edc` (
  `id` int(11) NOT NULL,
  `lmp` date DEFAULT NULL,
  `edc` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnant_lmp_edc`
--

INSERT INTO `pregnant_lmp_edc` (`id`, `lmp`, `edc`, `parent_id`) VALUES
(3, '2019-10-01', '2019-11-21', 24);

-- --------------------------------------------------------

--
-- Table structure for table `prev_pregnant`
--

CREATE TABLE `prev_pregnant` (
  `prev_preg_id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `answer1` varchar(100) DEFAULT NULL,
  `answer2` varchar(100) DEFAULT NULL,
  `answer3` varchar(100) DEFAULT NULL,
  `answer4` varchar(100) DEFAULT NULL,
  `pregnant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prev_pregnant`
--

INSERT INTO `prev_pregnant` (`prev_preg_id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `pregnant_id`) VALUES
(2, 'nakaagi ceasarian section', 'wala', '', '', '', 24),
(3, '3 kasunod-sunod na hulugan', NULL, NULL, NULL, NULL, 24),
(4, 'bata nga binun-ag nga patay', NULL, NULL, NULL, NULL, 24),
(5, 'dinugo tapos pagbun-ag', NULL, NULL, NULL, NULL, 24);

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
(1, '12345', 'admin', 'admin', 'admin', 'admin', 'admin', '1994-07-05', 'admin', 'admin', 'active', 'admin', '2019-09-17', 'admin', ''),
(8, '5794', 'ronaldo', 'recibido', 'dogomeo', 'toboso', 'admin', '1994-05-07', '09078345303', 'dogomeo5794@gmail.com', 'active', 'single', '2018-11-27', 'filipino', 'male'),
(9, '10001', 'user', 'user', 'user', 'toboso, negros occidental', 'user', '1994-10-20', '09078345303', 'dogomeo5794@gmail.com', 'active', 'single', '2019-10-20', 'filipino', ''),
(10, '1002', 'staff1', 'staff1', 'staff1', 'toboso, negros occidental', 'user', '1994-10-20', '09078345303', 'ronald393@yahoo.com', 'active', 'single', '2019-10-20', 'filipino', 'female'),
(11, '12346', 'qwe', 'qwe', 'qwe', 'toboso, negros occidental', 'user', '1994-02-20', '09078345303', 'dogomeo5794@gmail.com', 'active', 'single', '2019-10-20', 'filipino', 'male'),
(12, '4561', 'asd', 'asd', 'asd', 'toboso, negros occidental', 'user', '1994-10-20', '12345678901', 'saskiafernandez84@yahoo.com', 'active', 'single', '2019-10-20', 'filipino', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

CREATE TABLE `trimester` (
  `trimester_id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `answer_2or3` varchar(100) DEFAULT NULL,
  `answer_4` varchar(100) DEFAULT NULL,
  `answer_5` varchar(100) DEFAULT NULL,
  `answer_6` varchar(100) DEFAULT NULL,
  `answer_7` varchar(100) DEFAULT NULL,
  `answer_8` varchar(100) DEFAULT NULL,
  `answer_9` varchar(100) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimester`
--

INSERT INTO `trimester` (`trimester_id`, `question`, `answer_2or3`, `answer_4`, `answer_5`, `answer_6`, `answer_7`, `answer_8`, `answer_9`, `parent_id`) VALUES
(2, 'petsa sang pagprenatal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(3, 'nagpangdugo (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(4, 'impeksyon sang renion (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(5, 'kabug-aton (kg)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(6, 'presyon sang dugo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(7, 'presyon sang dugo 140/90 o subra pa (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(8, 'hilanat 380 o sobra pa (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(9, 'malapsi (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(10, 'abnormal ang kataason sang pagbusong (hu-o / hindi)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(11, 'abnormal ang posisyon sang bata (hu-o / hindi)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(12, 'wala magpitik ang corazon sang bata (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(13, 'may palamanog (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(14, 'impreksyon sa puerta (hu-o / wala)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(15, 'resulta sang eksaminasion sang dugo, inih, venareal disease', '', '', '', '', '', '', 'sergwer', 24);

-- --------------------------------------------------------

--
-- Table structure for table `trimester_action`
--

CREATE TABLE `trimester_action` (
  `action_id` int(11) NOT NULL,
  `question` varchar(200) DEFAULT NULL,
  `action_2or3` varchar(100) DEFAULT NULL,
  `action_4` varchar(100) DEFAULT NULL,
  `action_5` varchar(100) DEFAULT NULL,
  `action_6` varchar(100) DEFAULT NULL,
  `action_7` varchar(100) DEFAULT NULL,
  `action_8` varchar(100) DEFAULT NULL,
  `action_9` varchar(100) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimester_action`
--

INSERT INTO `trimester_action` (`action_id`, `question`, `action_2or3`, `action_4`, `action_5`, `action_6`, `action_7`, `action_8`, `action_9`, `parent_id`) VALUES
(2, 'question 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(3, 'question 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(4, 'question 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(5, 'question 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(6, 'question 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(7, 'question 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(8, 'question 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(9, 'question 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24),
(10, 'question 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24);

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
-- Indexes for table `children_nutrition_services`
--
ALTER TABLE `children_nutrition_services`
  ADD PRIMARY KEY (`nutrition_id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `current_problem`
--
ALTER TABLE `current_problem`
  ADD PRIMARY KEY (`cur_prob_id`),
  ADD KEY `parent_id` (`parent_id`);

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
-- Indexes for table `pregnant_lmp_edc`
--
ALTER TABLE `pregnant_lmp_edc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `prev_pregnant`
--
ALTER TABLE `prev_pregnant`
  ADD PRIMARY KEY (`prev_preg_id`),
  ADD KEY `pregnant_id` (`pregnant_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id_no` (`id_no`);

--
-- Indexes for table `trimester`
--
ALTER TABLE `trimester`
  ADD PRIMARY KEY (`trimester_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `trimester_action`
--
ALTER TABLE `trimester_action`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `parent_id` (`parent_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `children_nutrition_services`
--
ALTER TABLE `children_nutrition_services`
  MODIFY `nutrition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `current_problem`
--
ALTER TABLE `current_problem`
  MODIFY `cur_prob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `date_toxoid`
--
ALTER TABLE `date_toxoid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pregnant_lmp_edc`
--
ALTER TABLE `pregnant_lmp_edc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prev_pregnant`
--
ALTER TABLE `prev_pregnant`
  MODIFY `prev_preg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trimester`
--
ALTER TABLE `trimester`
  MODIFY `trimester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trimester_action`
--
ALTER TABLE `trimester_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `children_nutrition_services`
--
ALTER TABLE `children_nutrition_services`
  ADD CONSTRAINT `children_nutrition_services_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `current_problem`
--
ALTER TABLE `current_problem`
  ADD CONSTRAINT `current_problem_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `date_toxoid`
--
ALTER TABLE `date_toxoid`
  ADD CONSTRAINT `date_toxoid_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `pregnant_lmp_edc`
--
ALTER TABLE `pregnant_lmp_edc`
  ADD CONSTRAINT `pregnant_lmp_edc_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prev_pregnant`
--
ALTER TABLE `prev_pregnant`
  ADD CONSTRAINT `prev_pregnant_ibfk_1` FOREIGN KEY (`pregnant_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trimester`
--
ALTER TABLE `trimester`
  ADD CONSTRAINT `trimester_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trimester_action`
--
ALTER TABLE `trimester_action`
  ADD CONSTRAINT `trimester_action_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
