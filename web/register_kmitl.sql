-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 01:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_kmitl`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id_table` int(4) NOT NULL COMMENT 'id course ใน database',
  `course_id` varchar(8) NOT NULL COMMENT 'รหัสรายวิชา',
  `course_name` varchar(100) NOT NULL COMMENT 'ชื่อวิชา',
  `course_credit` int(3) NOT NULL COMMENT 'หน่วยกิต',
  `course_year` varchar(4) NOT NULL COMMENT 'ชั้นปี',
  `course_semester` varchar(3) NOT NULL COMMENT 'เทอมการศึกษา',
  `course_type_code` varchar(3) NOT NULL COMMENT 'รหัสประเภท กลุ่มวิชา',
  `course_prequisite_subject` varchar(8) NOT NULL COMMENT 'รหัสรายวิชา บังคับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id_table`, `course_id`, `course_name`, `course_credit`, `course_year`, `course_semester`, `course_type_code`, `course_prequisite_subject`) VALUES
(1, '01076031', 'CALCULUS', 3, '1', '1', '004', ''),
(2, '01076103', 'PROGRAMMING FUNDAMENTAL', 2, '1', '1', '004', ''),
(3, '01076104', 'PROGRAMMING PROJECT', 1, '1', '1', '004', ''),
(4, '01076105', 'OBJECT ORIENTED PROGRAMMING', 2, '1', '2', '006', '1076103'),
(5, '01076106', 'OBJECT ORIENTED PROGRAMMING PROJECT', 1, '1', '2', '006', '1076103'),
(6, '01076016', 'COMPUTER ENGINEERING PROJECT PREPARATION', 2, '2', '1', '004', ''),
(7, '01076109', 'OBJECT ORIENTED DATA STRUCTURES', 3, '2', '1', '006', '1076105'),
(8, '01076110', 'OBJECT ORIENTED DATA STRUCTURES PROJECT', 1, '2', '1', '006', '1076105'),
(9, '01076112', 'DIGITAL SYSTEM FUNDAMENTALS', 3, '1', '1', '006', ''),
(10, '01076113', 'DIGITAL SYSTEM FUNDAMENTALS IN PRACTICE', 1, '1', '1', '006', ''),
(11, '01076118', 'SYSTEM PLATFORM ADMINISTRATION', 3, '1', '1', '006', ''),
(12, '01076114', 'COMPUTER ORGANIZATION AND ARCHITECTURE', 3, '1', '2', '006', '01076112'),
(13, '01076115', 'COMPUTER ORGANIZATION IN PRACTICE', 1, '1', '2', '006', '01076112'),
(14, '01076116', 'COMPUTER NETWORKS', 3, '1', '2', '006', ''),
(15, '01076117', 'COMPUTER NETWORKS IN PRACTICE', 1, '1', '2', '006', ''),
(16, '01076263', 'DATABASE SYSTEMS', 3, '2', '1', '006', ''),
(17, '01076043', 'INTRODUCTION TO CLOUD ARCHITECTURE', 2, '1', '2', '006', ''),
(18, '01076044', 'INTRODUCTION TO CLOUD ARCHITECTURE IN PRACTICE', 1, '1', '2', '006', ''),
(19, '01076011', 'OPERATING SYSTEMS', 3, '2', '1', '006', ''),
(20, '01076035', 'SOFTWARE DEVELOPMENT PROCESS IN PRACTICE', 3, '3', '1', '006', '01076105'),
(21, '01076034', 'PRINCIPLES OF SOFTWARE DEVELOPMENT PROCESS', 3, '2', '2', '006', '01076105'),
(22, '01076119', 'WEB APPLICATION DEVELOPMENT', 3, '2', '1', '006', '1076105'),
(23, '01076120', 'WEB APPLICATION DEVELOPMENT PROJECT', 1, '2', '1', '006', '01076105'),
(24, '01076121', 'THEORY OF COMPUTATION', 3, '2', '1', '006', ''),
(25, '01076050', 'MICROCONTROLLER APPLICATION AND DEVELOPMENT', 3, '2', '2', '006', '01076112'),
(26, '01076051', 'MICROCONTROLLER PROJECT', 1, '2', '2', '006', '01076112'),
(27, '01076040', 'INTERNETWORKING STANDARDS AND TECHNOLOGIES', 3, '2', '2', '006', '01076116'),
(28, '01076041', 'INTERNETWORKING STANDARDS AND TECHNOLOGIES IN PRACTICE', 1, '2', '2', '006', '01076116'),
(29, '90641001', 'CHARM SCHOOL', 2, '1', '2', '002', ''),
(30, '90641003', 'SPORTS AND RECREATIONAL ACTIVITIES', 1, '1', '2', '002', ''),
(31, '90641002', 'DIGITAL INTELLIGENCE QUOTIENT', 3, '1', '1', '002', ''),
(32, '90644007', 'FOUNDATION ENGLISH 1', 3, '1', '1', '001', ''),
(33, '90644008', 'FOUNDATION ENGLISH 2', 3, '1', '2', '001', '90644007'),
(34, '90644012', 'ENGLISH FOR COMMUNICATION', 3, '2', '1', '001', ''),
(35, '90642038', 'OCCUPATIONAL SAFETY AND HEALTH', 3, '2', '2', '003', ''),
(36, '90643035', 'KNOWLEDGE MANAGEMENT FOR INNOVATION DEVELOPMENT', 3, '2', '2', '003', ''),
(37, '01076311', 'PROJECT 1', 3, '3', '1', '006', '01076016'),
(38, '01076312', 'PROJECT 2', 3, '3', '2', '006', '01076311'),
(39, '01076411', 'MICRO ROBOT DEVELOPMENT', 3, '3', '1', '007', '01076112'),
(40, '01076418', 'HIGH PERFORMANCE COMPUTING', 3, '3', '1', '007', ''),
(41, '01076420', 'ADVANCED DIGITAL DESIGN USING HDL', 3, '3', '1', '007', '01076112'),
(42, '01076421', 'EMBEDED SYSTEM DESIGN', 3, '3', '2', '007', '01076112'),
(43, '01076414', 'INTRODUCTION TO AUTONOMOUS VEHICLE', 3, '3', '2', '007', '01076112'),
(44, '01076052', 'REAL-TIME EMBEDDED SYSTEMS', 3, '3', '2', '007', '01076112'),
(45, '01076053', 'INTERNET OF THINGS AND SMART SYSTEMS', 3, '3', '1', '007', '01076112'),
(46, '01076513', 'COMPILER CONSTRUCTION', 3, '3', '2', '007', '01076121'),
(47, '01076564', 'DESIGN AND ANALYSIS OF ALGORITHMS', 3, '3', '1', '007', '01076109'),
(48, '01076568', 'HUMAN COMPUTER INTERACTION\r\n', 3, '3', '2', '007', ''),
(49, '01076589', 'ADVANCED DATABASE SYSTEMS', 3, '3', '2', '007', '01076263'),
(50, '01076599', 'SOFTWARE TESTING AND QUALITY ASSURANCE', 3, '3', '1', '007', '01076034'),
(51, '01076596', 'SYSTEM REQUIREMENTS ENGINEERING', 3, '3', '1', '007', '01076034'),
(52, '01076036', 'USER EXPERIENCE AND USER INTERFACE DESIGN', 2, '3', '1', '007', '01076105'),
(53, '01076037', 'USER EXPERIENCE AND USER INTERFACE PROJECT', 1, '3', '1', '007', '01076105'),
(54, '01076558', 'MICROSERVICES AND REST API DESIGN', 3, '3', '2', '007', '01076109'),
(55, '01076559', 'SOFTWARE ARCHITECTURE AND DESIGN', 3, '3', '2', '007', '01076109'),
(59, '01076560', 'SMART MOBILE APPLICATION DEVELOPMENT', 3, '3', '1', '007', '01076109'),
(60, '01076574', 'DATA WAREHOUSE', 3, '3', '1', '007', ''),
(61, '01076585', 'DATA MINING', 3, '3', '2', '007', ''),
(62, '01076634', 'BIG DATA ARCHITECTURE', 3, '3', '1', '007', ''),
(63, '01076598', 'INTRODUCTION TO DATA ANALYTICS', 3, '3', '2', '007', ''),
(64, '01076567', 'IMAGE PROCESSING', 3, '3', '2', '007', ''),
(65, '01076583', 'COMPUTER GRAPHICS', 3, '3', '1', '007', ''),
(66, '01076597', 'AUGMENTED REALITY', 3, '3', '2', '007', ''),
(67, '01076532', 'MACHINE LEARNING', 3, '3', '1', '007', ''),
(68, '01076582', 'ARTIFICIAL INTELLIGENCE', 3, '3', '1', '007', ''),
(69, '01076566', 'MULTIMEDIA SYSTEMS', 3, '3', '1', '007', ''),
(70, '01076595', 'INFORMATION STORAGE AND WEB SEARCH', 3, '3', '2', '007', ''),
(71, '01076533', 'DEEP LEARNING', 3, '3', '2', '007', ''),
(72, '01076627', 'ICT SECURITY ARCHITECTURE AND MANAGEMENT', 3, '3', '1', '007', ''),
(73, '01076628', 'INFORMATION TECHNOLOGY SECURITY ASSESSMENT', 3, '3', '2', '007', ''),
(74, '01076629', 'BASIC PENETRATION TESTING AND ETHICAL HACKING', 3, '3', '1', '007', ''),
(75, '01076042', 'INFORMATION AND COMPUTER SECURITY', 3, '3', '2', '007', '01076116'),
(76, '01076636', 'OFFENSIVE CYBER SECURITY', 3, '3', '2', '007', '01076629'),
(77, '01076629', 'BASIC PENETRATION TESTING AND ETHICAL HACKING', 3, '3', '1', '007', '01076116'),
(78, '01076042', 'INFORMATION AND COMPUTER SECURITY', 3, '3', '2', '007', '01076116'),
(79, '01076632', 'WIRELESS NETWORK TECHNOLOGY', 3, '3', '2', '007', '01076018'),
(80, '01076631', 'SOFTWARE DEFINED NETWORKING', 3, '3', '1', '007', '01076116'),
(81, '01076633', 'SERVICE AND SYSTEM VIRTUALIZATION', 3, '3', '1', '007', '01076018'),
(82, '01076633', 'SERVICE AND SYSTEM VIRTUALIZATION', 3, '3', '2', '007', '01076040'),
(83, '01076635', 'IP SWITCHED NETWORKS', 3, '3', '1', '007', '01076040'),
(84, '01076584', 'COMPUTER SIMULATION', 3, '3', '2', '007', ''),
(85, '01076592', 'ENTREPRENEURSHIP AND THE ENGINEER', 3, '3', '2', '007', ''),
(86, '01076422', 'IT ENTREPRENEURSHIP AND MANAGEMENT', 3, '3', '1', '007', ''),
(87, '01076423', 'STRATEGIC PLANNING USING BOARD AND CARD GAME', 3, '3', '1', '007', ''),
(88, '01076577', 'IT PROJECT MANAGEMENT', 3, '3', '2', '007', '');

-- --------------------------------------------------------

--
-- Table structure for table `coursetype`
--

CREATE TABLE `coursetype` (
  `coursetype_id` int(3) NOT NULL COMMENT 'type_id ใน database',
  `coursetype_code` varchar(3) NOT NULL COMMENT 'รหัสกลุ่มรายวิชา',
  `coursetype_name` varchar(50) NOT NULL COMMENT 'ชื่อ กลุ่มรายวิชา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coursetype`
--

INSERT INTO `coursetype` (`coursetype_id`, `coursetype_code`, `coursetype_name`) VALUES
(1, '001', 'กลุ่มภาษา'),
(2, '002', 'กลุ่มgen-ed พื้นฐาน'),
(3, '003', 'กลุ่มgen-ed เลือกทั่วไป'),
(4, '004', 'กลุ่มวิศวกรรมพื้นฐาน'),
(5, '005', 'กลุ่มเสรี'),
(6, '006', 'กลุ่มวิชาวิศวกรรมคอมพิวเตอร์พื้นฐาน'),
(7, '007', 'กลุ่มวิชาเลือกเฉพาะสาขา');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id_table` int(5) NOT NULL COMMENT 'id ใน table',
  `enrollment_course_id` varchar(8) NOT NULL COMMENT 'รหัสวิชา',
  `enrollment_username` varchar(100) NOT NULL COMMENT 'username',
  `enrollment_student_id` varchar(8) NOT NULL COMMENT 'รหัสนักศึกษา',
  `enrollment_year` varchar(4) NOT NULL COMMENT 'ปีการศึกษาที่ลงทะเบียน',
  `enrollment_semester` varchar(3) NOT NULL COMMENT 'เทอมการศึกษาที่ลงทะเบียน',
  `enrollment_coursetype_code` varchar(3) NOT NULL COMMENT 'รหัสกลุ่มรายวิชา',
  `enrollment_rating` int(5) NOT NULL COMMENT 'ระดับคะแนน reciew',
  `enrollment_review_detail` varchar(200) NOT NULL COMMENT 'review รายวิชา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id_table`, `enrollment_course_id`, `enrollment_username`, `enrollment_student_id`, `enrollment_year`, `enrollment_semester`, `enrollment_coursetype_code`, `enrollment_rating`, `enrollment_review_detail`) VALUES
(246, '01076031', '', '65015101', '1', '1', '', 0, ''),
(247, '01076103', '', '65015101', '1', '1', '', 0, ''),
(248, '01076104', '', '65015101', '1', '1', '', 0, ''),
(249, '01076112', '', '65015101', '1', '1', '', 0, ''),
(250, '01076113', '', '65015101', '1', '1', '', 0, ''),
(251, '01076118', '', '65015101', '1', '1', '', 0, ''),
(252, '90641002', '', '65015101', '1', '1', '', 0, ''),
(253, '90644007', '', '65015101', '1', '1', '', 0, ''),
(254, '01076105', '', '65015101', '1', '2', '', 0, ''),
(255, '90641003', '', '65015101', '1', '2', '', 0, ''),
(256, '90641001', '', '65015101', '1', '2', '', 0, ''),
(257, '01076044', '', '65015101', '1', '2', '', 0, ''),
(258, '01076043', '', '65015101', '1', '2', '', 0, ''),
(259, '01076117', '', '65015101', '1', '2', '', 0, ''),
(260, '01076116', '', '65015101', '1', '2', '', 0, ''),
(261, '01076115', '', '65015101', '1', '2', '', 0, ''),
(262, '01076114', '', '65015101', '1', '2', '', 0, ''),
(263, '01076106', '', '65015101', '1', '2', '', 0, ''),
(264, '90644008', '', '65015101', '1', '2', '', 0, ''),
(265, '01076016', '', '65015101', '2', '1', '', 0, ''),
(266, '01076109', '', '65015101', '2', '1', '', 0, ''),
(267, '01076110', '', '65015101', '2', '1', '', 0, ''),
(268, '01076263', '', '65015101', '2', '1', '', 0, ''),
(269, '01076011', '', '65015101', '2', '1', '', 0, ''),
(270, '01076119', '', '65015101', '2', '1', '', 0, ''),
(271, '01076120', '', '65015101', '2', '1', '', 0, ''),
(272, '01076121', '', '65015101', '2', '1', '', 0, ''),
(273, '90644012', '', '65015101', '2', '1', '', 0, ''),
(274, '01076034', '', '65015101', '2', '2', '', 0, ''),
(275, '01076050', '', '65015101', '2', '2', '', 0, ''),
(276, '01076051', '', '65015101', '2', '2', '', 0, ''),
(277, '01076040', '', '65015101', '2', '2', '', 0, ''),
(278, '01076041', '', '65015101', '2', '2', '', 0, ''),
(279, '90642038', '', '65015101', '2', '2', '', 0, ''),
(280, '90643035', '', '65015101', '2', '2', '', 0, ''),
(281, '01076035', '', '65015101', '3', '1', '', 0, ''),
(282, '01076311', '', '65015101', '3', '1', '', 0, ''),
(283, '01076599', '', '65015101', '3', '1', '', 0, ''),
(284, '01076036', '', '65015101', '3', '1', '', 0, ''),
(285, '01076596', '', '65015101', '3', '1', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL COMMENT 'id ใน table',
  `user_name` varchar(100) NOT NULL COMMENT 'ชื่อ user ที่เข้าใช้งาน',
  `user_password` varchar(30) NOT NULL COMMENT 'password user',
  `user_student_id` varchar(8) NOT NULL COMMENT 'รหัสนักศึกษา',
  `user_student_name` varchar(100) NOT NULL COMMENT 'ชื่อนักศึกษา',
  `user_type_id` varchar(3) NOT NULL COMMENT 'id ผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_student_id`, `user_student_name`, `user_type_id`) VALUES
(1, '65015101@kmitl.ac.th', '1234', '65015101', 'Phontakorn', '002'),
(2, '65015123@kmitl.ac.th', '1234', '65015123', 'Muthita', '002');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'id ผู้ใช้งาน',
  `type_name` varchar(20) NOT NULL COMMENT 'ชื่อประเภทผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`) VALUES
(001, 'admin'),
(002, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id_table`);

--
-- Indexes for table `coursetype`
--
ALTER TABLE `coursetype`
  ADD PRIMARY KEY (`coursetype_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id_table`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id_table` int(4) NOT NULL AUTO_INCREMENT COMMENT 'id course ใน database', AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `coursetype`
--
ALTER TABLE `coursetype`
  MODIFY `coursetype_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'type_id ใน database', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id_table` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id ใน table', AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'id ใน table', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'id ผู้ใช้งาน', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
