-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 11:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atbu_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `2015_1`
--

CREATE TABLE `2015_1` (
  `id` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `student_gpn` varchar(100) NOT NULL,
  `student_gpa` varchar(5) NOT NULL,
  `course_gp` varchar(100) NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `test1` varchar(50) NOT NULL,
  `test2` varchar(50) NOT NULL,
  `test3` varchar(50) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `approve` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2015_1`
--

INSERT INTO `2015_1` (`id`, `total`, `student_gpn`, `student_gpa`, `course_gp`, `reg_no`, `department`, `subject_code`, `test1`, `test2`, `test3`, `exam`, `course_title`, `approve`) VALUES
(1, '70', '15', 'A', '3', '419419', 'Mathematics', 'MTH112', '5', '5', '10', '50', 'Calculus', '1'),
(2, '65', '16', 'B', '4', '419419', 'Mathematics', 'MTH213', '10', '15', '10', '30', 'Analysis I', '1'),
(3, '69', '16', 'B', '4', '419419', 'Mathematics', 'CS142', '3', '10', '6', '50', 'Introduction To Computer Science', '1');

-- --------------------------------------------------------

--
-- Table structure for table `2015_2`
--

CREATE TABLE `2015_2` (
  `id` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `student_gpn` varchar(100) NOT NULL,
  `student_gpa` varchar(5) NOT NULL,
  `course_gp` varchar(100) NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `test1` varchar(50) NOT NULL,
  `test2` varchar(50) NOT NULL,
  `test3` varchar(50) NOT NULL,
  `exam` varchar(50) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `approve` varchar(5) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2015_2`
--

INSERT INTO `2015_2` (`id`, `total`, `student_gpn`, `student_gpa`, `course_gp`, `reg_no`, `department`, `subject_code`, `test1`, `test2`, `test3`, `exam`, `course_title`, `approve`, `level`) VALUES
(20, '81', '15', 'A', '3', '14/37139D/1', 'Architect', 'MTH223', '2', '5', '10', '64', 'Introduction to Statistics and Probability', '0', '200'),
(34, '', '', '', '3', '419419', 'Mathematics', 'ST271', '', '', '', '', 'Introduction to Statistics and Probability', '', ''),
(35, '', '', '', '3', '419419', 'Mathematics', 'MTH224', '', '', '', '', 'Mathematical Modelling', '', ''),
(37, '', '', '', '3', '419419', 'Mathematics', 'MTH222', '', '', '', '', 'Mathematical Method', '', ''),
(38, '80', '15', 'A', '3', '419419', 'Mathematics', 'MTH221', '20', '10', '5', '45', 'Linear Algebra II', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `atbu_course`
--

CREATE TABLE `atbu_course` (
  `id` int(11) NOT NULL,
  `Course_Code` varchar(50) NOT NULL,
  `Course_Title` varchar(250) NOT NULL,
  `School` varchar(250) NOT NULL,
  `Department` varchar(250) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `course_unit` varchar(10) NOT NULL,
  `staff_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atbu_course`
--

INSERT INTO `atbu_course` (`id`, `Course_Code`, `Course_Title`, `School`, `Department`, `Level`, `Semester`, `course_unit`, `staff_id`) VALUES
(1, 'CS142', 'Introduction To Computer Science', 'Science', 'Mathematics', '100', '1', '4', '111222'),
(2, 'MTH213', 'Analysis I', 'Science', 'Mathematics', '300', '1', '3', '111222'),
(3, 'MTH111', 'Linear Algebra', 'Science', 'Mathematics', '100', '1', '4', '10102'),
(4, 'MTH112', 'Calculus I', 'Science', 'Mathematics', '100', '1', '3', '111222'),
(5, 'MTH223', 'Analysis II', 'Science', 'Mathematics', '200', '2', '3', '180202'),
(7, 'MTH222', 'Mathematical Method', 'Science', 'Mathematics', '200', '2', '3', '10102'),
(9, 'ST271', 'Introduction to Statistics and Probability', 'Science', 'Mathematics', '200', '2', '3', '10102'),
(10, 'MTH224', 'Mathematical Modelling', 'Science', 'Mathematics', '200', '2', '3', '11113'),
(11, 'MTH221', 'Linear Algebra II', 'Science', 'Mathematics', '200', '2', '3', '111222'),
(12, 'MTH511', 'Topology II', 'Science', 'Mathematics', '100', '1', '4', '1456');

-- --------------------------------------------------------

--
-- Table structure for table `atbu_dept`
--

CREATE TABLE `atbu_dept` (
  `id` int(11) NOT NULL,
  `school` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `atbu_staff`
--

CREATE TABLE `atbu_staff` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(250) NOT NULL,
  `staff_name` varchar(250) NOT NULL,
  `staff_dept` varchar(250) NOT NULL,
  `staff_faculty` varchar(250) NOT NULL,
  `staff_password` varchar(250) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `course_upload` tinyint(1) NOT NULL,
  `staff_registration` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atbu_staff`
--

INSERT INTO `atbu_staff` (`id`, `staff_id`, `staff_name`, `staff_dept`, `staff_faculty`, `staff_password`, `admin`, `course_upload`, `staff_registration`) VALUES
(1, '111222', 'Abdulraheem Sherif A', 'Mathematics', 'Science', '111222', 1, 1, 1),
(2, '11113', 'Jimoh Hadi O.', 'Mathematics', 'Science', '1010', 0, 1, 1),
(3, '10102', 'Prof. Usman Dahiru', 'Mathematics', 'Science', '111222', 0, 1, 1),
(4, '180202', 'Usman Dalhatu J.', 'Mathematics', 'Science', '1111', 1, 1, 0),
(5, '2345', 'Lawal M. Barde', 'Mathematics', 'Science', '2345', 0, 0, 0),
(6, '1456', 'Yakubu Hamza', 'Mathematics', 'Science', '1456', 0, 0, 0),
(7, '12345', 'Usman Dahiru', 'Mathematics', 'Science', '12345', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `atbu_student`
--

CREATE TABLE `atbu_student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_password` varchar(250) NOT NULL,
  `student_facult` varchar(250) NOT NULL,
  `student_dept` varchar(250) NOT NULL,
  `student_level` varchar(20) NOT NULL,
  `student_regno` varchar(50) NOT NULL,
  `pics` blob NOT NULL,
  `stud_pics` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atbu_student`
--

INSERT INTO `atbu_student` (`id`, `student_name`, `student_password`, `student_facult`, `student_dept`, `student_level`, `student_regno`, `pics`, `stud_pics`) VALUES
(1, 'Abdulhaqq Abdulraheem A.', '419419', 'Science', 'Mathematics', '200', '419419', '', '419419.jpg'),
(2, 'Marry Jude K.', '1111', 'Environmental', 'Architect', '200', '14/37139D/1', '', '419419.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_cgp`
--

CREATE TABLE `course_cgp` (
  `id` int(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `reg_no` varchar(150) NOT NULL,
  `STP` varchar(50) NOT NULL,
  `CTU` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_cgp`
--

INSERT INTO `course_cgp` (`id`, `year`, `semester`, `reg_no`, `STP`, `CTU`) VALUES
(1, '2015', '1', '419419', '47', '11'),
(3, '2015', '2', '419419', '30', '15'),
(4, '2015', '2', '14/37139D/1', '15', '3');

-- --------------------------------------------------------

--
-- Table structure for table `course_data`
--

CREATE TABLE `course_data` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `edit_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_data`
--

INSERT INTO `course_data` (`id`, `year`, `semester`, `edit_status`) VALUES
(1, '2015', '1', 1),
(2, '2015', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userbest`
--

CREATE TABLE `userbest` (
  `id` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `bestFriend` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userbest`
--

INSERT INTO `userbest` (`id`, `userID`, `bestFriend`) VALUES
(1, 'NAMS700072376', 'Regina Cletus'),
(2, 'NAMS700072376', 'Mohammed Yusuf'),
(3, 'NAMS700072376', 'Habila Mercy'),
(4, 'NAMS700072376', 'Aishat Futuk'),
(9, 'NAMS701172376', 'Jelil Mamman'),
(10, 'NAMS701172376', 'Ohikere Yusuf'),
(11, 'NAMS703072376', 'Jelil Mamman'),
(12, 'NAMS703072376', 'Ohikere Yusuf'),
(13, 'NAMS701172379', 'Jelil Mamman'),
(14, 'NAMS701172379', 'Ohikere Yusuf'),
(15, 'NAMS710073476', 'Jelil Mamman'),
(16, 'NAMS710073476', 'Ohikere Yusuf'),
(17, 'NAMS701172000', 'Jelil Mamman'),
(18, 'NAMS701172000', 'Ohikere Yusuf'),
(19, 'NAMS7099372376', 'Jelil Mamman'),
(20, 'NAMS7099372376', 'Ohikere Yusuf'),
(21, 'NAMS7661172379', 'Jelil Mamman'),
(22, 'NAMS7661172379', 'Ohikere Yusuf'),
(23, 'NAMS404110260', 'Jelil Mamman'),
(24, 'NAMS385334496', 'Jelil Mamman'),
(25, 'NAMS555760711', 'Hannah Yakub'),
(26, 'NAMS555760711', 'Otori Musa Adama'),
(27, 'NAMS509655050', 'Hannah Yakub'),
(28, 'NAMS509655050', 'Otori Musa Adama'),
(29, 'NAMS666323570', 'Hannah Yakub'),
(30, 'NAMS666323570', 'Otori Musa Adama'),
(31, 'NAMS914403550', 'Hannah Yakub'),
(32, 'NAMS914403550', 'Otori Musa Adama'),
(33, 'NAMS734709865', 'Hannah Yakub'),
(34, 'NAMS734709865', 'Otori Musa Adama'),
(35, 'NAMS513289398', 'Hannah Yakub'),
(36, 'NAMS513289398', 'Otori Musa Adama'),
(37, 'NAMS470268351', 'Hannah Yakub'),
(38, 'NAMS470268351', 'Otori Musa Adama'),
(39, 'NAMS805509083', 'Hannah Yakub'),
(40, 'NAMS805509083', 'Otori Musa Adama'),
(41, 'NAMS961959951', 'Hannah Yakub'),
(42, 'NAMS961959951', 'Otori Musa Adama'),
(43, 'NAMS715957372', 'Hannah Yakub'),
(44, 'NAMS715957372', 'Otori Musa Adama'),
(45, 'NAMS605555634', 'Hannah Yakub'),
(46, 'NAMS605555634', 'Otori Musa Adama'),
(47, 'NAMS877642356', 'Karim Salihu'),
(48, 'NAMS877642356', 'John Adama K'),
(49, 'NAMS749546879', 'Karim Salihu'),
(50, 'NAMS749546879', 'John Adama K'),
(51, 'NAMS486769953', 'Karim Salihu'),
(52, 'NAMS486769953', 'John Adama K'),
(53, 'NAMS874389385', 'Karim Salihu'),
(54, 'NAMS874389385', 'John Adama K'),
(55, 'NAMS947209798', 'Karim Salihu'),
(56, 'NAMS947209798', 'John Adama K'),
(57, 'NAMS507810090', 'Karim Salihu'),
(58, 'NAMS507810090', 'John Adama K'),
(59, 'NAMS668920570', 'Karim Salihu'),
(60, 'NAMS668920570', 'John Adama K'),
(61, 'NAMS912853713', 'Karim Salihu'),
(62, 'NAMS912853713', 'John Adama K'),
(63, 'NAMS661320959', 'Karim Salihu'),
(64, 'NAMS661320959', 'John Adama K'),
(65, 'NAMS507438815', 'Karim Salihu'),
(66, 'NAMS507438815', 'John Adama K'),
(67, 'NAMS758461546', 'Karim Salihu'),
(68, 'NAMS758461546', 'John Adama K');

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE `usercourse` (
  `id` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `bestCourses` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`id`, `userID`, `bestCourses`) VALUES
(10, 'NAMS700072376', 'Complex Analysis'),
(6, 'NAMS700072376', 'Abstract Algebra I'),
(7, 'NAMS700072376', 'Analysis'),
(9, 'NAMS700072376', 'Mathematical Method'),
(11, 'NAMS701172376', 'Analysis II'),
(12, 'NAMS701172376', 'Analysis I'),
(13, 'NAMS701172376', 'Mathematical Method'),
(14, 'NAMS703072376', 'Analysis II'),
(15, 'NAMS703072376', 'Analysis I'),
(16, 'NAMS703072376', 'Mathematical Method'),
(17, 'NAMS701172379', 'Analysis II'),
(18, 'NAMS701172379', 'Analysis I'),
(19, 'NAMS701172379', 'Mathematical Method'),
(20, 'NAMS710073476', 'Analysis II'),
(21, 'NAMS710073476', 'Analysis I'),
(22, 'NAMS710073476', 'Mathematical Method'),
(23, 'NAMS701172000', 'Analysis II'),
(24, 'NAMS701172000', 'Analysis I'),
(25, 'NAMS701172000', 'Mathematical Method'),
(26, 'NAMS7099372376', 'Analysis II'),
(27, 'NAMS7099372376', 'Analysis I'),
(28, 'NAMS7099372376', 'Mathematical Method'),
(29, 'NAMS7661172379', 'Analysis II'),
(30, 'NAMS7661172379', 'Analysis I'),
(31, 'NAMS7661172379', 'Mathematical Method'),
(32, 'NAMS404110260', 'Analysis II'),
(33, 'NAMS404110260', 'Analysis I'),
(34, 'NAMS404110260', 'Mathematical Method'),
(35, 'NAMS385334496', 'Analysis II'),
(36, 'NAMS385334496', 'Analysis I'),
(37, 'NAMS385334496', 'Mathematical Method'),
(38, 'NAMS555760711', 'File Processing'),
(39, 'NAMS555760711', 'Introduction to Programming Language'),
(40, 'NAMS555760711', 'Artificial Intelligence'),
(41, 'NAMS509655050', 'File Processing'),
(42, 'NAMS509655050', 'Introduction to Programming Language'),
(43, 'NAMS509655050', 'Artificial Intelligence'),
(44, 'NAMS666323570', 'File Processing'),
(45, 'NAMS666323570', 'Introduction to Programming Language'),
(46, 'NAMS666323570', 'Artificial Intelligence'),
(47, 'NAMS914403550', 'File Processing'),
(48, 'NAMS914403550', 'Introduction to Programming Language'),
(49, 'NAMS914403550', 'Artificial Intelligence'),
(50, 'NAMS734709865', 'File Processing'),
(51, 'NAMS734709865', 'Introduction to Programming Language'),
(52, 'NAMS734709865', 'Artificial Intelligence'),
(53, 'NAMS513289398', 'File Processing'),
(54, 'NAMS513289398', 'Introduction to Programming Language'),
(55, 'NAMS513289398', 'Artificial Intelligence'),
(56, 'NAMS470268351', 'File Processing'),
(57, 'NAMS470268351', 'Introduction to Programming Language'),
(58, 'NAMS470268351', 'Artificial Intelligence'),
(59, 'NAMS805509083', 'File Processing'),
(60, 'NAMS805509083', 'Introduction to Programming Language'),
(61, 'NAMS805509083', 'Artificial Intelligence'),
(62, 'NAMS961959951', 'File Processing'),
(63, 'NAMS961959951', 'Introduction to Programming Language'),
(64, 'NAMS961959951', 'Artificial Intelligence'),
(65, 'NAMS715957372', 'File Processing'),
(66, 'NAMS715957372', 'Introduction to Programming Language'),
(67, 'NAMS715957372', 'Artificial Intelligence'),
(68, 'NAMS605555634', 'File Processing'),
(69, 'NAMS605555634', 'Introduction to Programming Language'),
(70, 'NAMS605555634', 'Artificial Intelligence'),
(71, 'NAMS877642356', 'File Processing'),
(72, 'NAMS877642356', 'Introduction to Probability Theory'),
(73, 'NAMS877642356', 'Set Theory Analysis'),
(74, 'NAMS749546879', 'File Processing'),
(75, 'NAMS749546879', 'Introduction to Probability Theory'),
(76, 'NAMS749546879', 'Set Theory Analysis'),
(77, 'NAMS486769953', 'File Processing'),
(78, 'NAMS486769953', 'Introduction to Probability Theory'),
(79, 'NAMS486769953', 'Set Theory Analysis'),
(80, 'NAMS874389385', 'File Processing'),
(81, 'NAMS874389385', 'Introduction to Probability Theory'),
(82, 'NAMS874389385', 'Set Theory Analysis'),
(83, 'NAMS947209798', 'File Processing'),
(84, 'NAMS947209798', 'Introduction to Probability Theory'),
(85, 'NAMS947209798', 'Set Theory Analysis'),
(86, 'NAMS507810090', 'File Processing'),
(87, 'NAMS507810090', 'Introduction to Probability Theory'),
(88, 'NAMS507810090', 'Set Theory Analysis'),
(89, 'NAMS668920570', 'File Processing'),
(90, 'NAMS668920570', 'Introduction to Probability Theory'),
(91, 'NAMS668920570', 'Set Theory Analysis'),
(92, 'NAMS912853713', 'File Processing'),
(93, 'NAMS912853713', 'Introduction to Probability Theory'),
(94, 'NAMS912853713', 'Set Theory Analysis'),
(95, 'NAMS661320959', 'File Processing'),
(96, 'NAMS661320959', 'Introduction to Probability Theory'),
(97, 'NAMS661320959', 'Set Theory Analysis'),
(98, 'NAMS507438815', 'File Processing'),
(99, 'NAMS507438815', 'Introduction to Probability Theory'),
(100, 'NAMS507438815', 'Set Theory Analysis'),
(101, 'NAMS758461546', 'File Processing'),
(102, 'NAMS758461546', 'Introduction to Probability Theory'),
(103, 'NAMS758461546', 'Set Theory Analysis');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `password` varchar(250) DEFAULT '""',
  `userID` varchar(250) DEFAULT '',
  `userQoute` text,
  `fullName` varchar(250) DEFAULT '',
  `userDept` varchar(250) DEFAULT '',
  `userLevel` varchar(250) DEFAULT '',
  `userGender` varchar(50) DEFAULT '',
  `userReligion` varchar(100) DEFAULT NULL,
  `userState` varchar(250) DEFAULT '',
  `userLgov` varchar(250) DEFAULT '',
  `userPermAdd` text,
  `userCState` varchar(250) DEFAULT '',
  `userCLgov` varchar(250) DEFAULT '',
  `userCPermAdd` text,
  `userBestMoment` text,
  `lastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userRegNo` varchar(100) DEFAULT '',
  `userEmail` varchar(250) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `password`, `userID`, `userQoute`, `fullName`, `userDept`, `userLevel`, `userGender`, `userReligion`, `userState`, `userLgov`, `userPermAdd`, `userCState`, `userCLgov`, `userCPermAdd`, `userBestMoment`, `lastLogin`, `userRegNo`, `userEmail`) VALUES
(1, '333', 'NAMS700072376', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Abdulraheem Sherif Adavuruku', 'Mathematics', '500', 'Male', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/37139D/1', 'aabdulraheemsherif@gmail.com'),
(2, '111', 'NAMS701172376', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Mohammed Zukanine', 'Mathematics', '500', 'Male', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/37239D/1', 'aabdulraheemsherif@gmail.com'),
(3, '111', 'NAMS703072376', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Abdulrahman Ishaq', 'Mathematics', '500', 'Male', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/57139D/1', 'aabdulraheemsherif@gmail.com'),
(4, '111', 'NAMS701172379', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Zubair Anare', 'Mathematics', '500', 'Male', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/37209D/1', 'aabdulraheemsherif@gmail.com'),
(5, '111', 'NAMS710073476', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Audu Jemilat', 'Mathematics', '500', 'Female', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/37118D/1', 'aabdulraheemsherif@gmail.com'),
(6, '111', 'NAMS701172000', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'John Pakwa O', 'Mathematics', '500', 'Male', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/3720039D/1', 'aabdulraheemsherif@gmail.com'),
(7, '111', 'NAMS7099372376', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Marian Ademola Jibolu', 'Mathematics', '500', 'Female', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/412139D/1', 'aabdulraheemsherif@gmail.com'),
(8, '111', 'NAMS7661172379', 'While Climbing to the Top ..you always meet lots of people that must be forgotten at some point but must always remembered when you finally gets to that top.', 'Jemilat Ohunene Siyaka', 'Mathematics', '500', 'Female', 'Islam', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.																		', 'Kogi', 'Okene', '							D41 Inike Okene Kogi State.						', 'My First Math113 Lecture Class at NLT II Lecture Hall.', '2018-01-05 11:34:21', '14/99209D/1', 'aabdulraheemsherif@gmail.com'),
(10, '111', 'NAMS404110260', 'We all Have a starting point that we cant determined but an end we can determined', 'Adaba Joel Nduka', 'Mathematics', '500', 'Male', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:09:17', '14/31112344/1', 'maim@yahoo.com'),
(11, '111', 'NAMS385334496', 'We all Have a starting point that we cant determined but an end we can determined', 'Adamu Marry', 'Mathematics', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:20:08', '14/322440D/1', 'maity@gmail.com'),
(12, '111', 'NAMS555760711', 'We all Have a starting point that we cant determined but an end we can determined', 'Ahmad Usman K', 'Computer Science', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:30:26', '14/00678D/1', 'adass@gmail.com'),
(13, '111', 'NAMS509655050', 'We all Have a starting point that we cant determined but an end we can determined', 'Ahmad Jumai John', 'Computer Science', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:31:45', '14/01672D/1', 'adass@gmail.com'),
(14, '111', 'NAMS666323570', 'We all Have a starting point that we cant determined but an end we can determined', 'Ahmad Jumai John', 'Computer Science', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:31:47', '14/01672D/1', 'adass@gmail.com'),
(15, '111', 'NAMS914403550', 'We all Have a starting point that we cant determined but an end we can determined', 'Marian Pawlka K', 'Computer Science', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:35:47', '14/916712D/1', 'adass@gmail.com'),
(16, '111', 'NAMS734709865', 'We all Have a starting point that we cant determined but an end we can determined', 'Jude Okoye', 'Computer Science', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:37:06', '14/3456661D/1', 'adass@gmail.com'),
(17, '111', 'NAMS513289398', 'We all Have a starting point that we cant determined but an end we can determined', 'Abdulaziz Aminat', 'Computer Science', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:38:08', '14/3111121D/1', 'aminat@gmail.com'),
(18, '111', 'NAMS470268351', 'We all Have a starting point that we cant determined but an end we can determined', 'Abdulaziz Ahmed D.', 'Computer Science', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:39:10', '14/02333D/1', 'aminat@gmail.com'),
(19, '111', 'NAMS805509083', 'We all Have a starting point that we cant determined but an end we can determined', 'Salawu Hanifat K.', 'Computer Science', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:40:01', '14/023340D/1', 'aminat@gmail.com'),
(20, '111', 'NAMS961959951', 'We all Have a starting point that we cant determined but an end we can determined', 'Abdulraheem AbdulHaqq A.', 'Computer Science', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:40:51', '14/203140D/1', 'aminat@gmail.com'),
(21, '111', 'NAMS715957372', 'We all Have a starting point that we cant determined but an end we can determined', 'Ahmed Rahimat O.', 'Computer Science', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:44:44', '14/203140D/1', 'aminat@gmail.com'),
(22, '111', 'NAMS605555634', 'We all Have a starting point that we cant determined but an end we can determined', 'Gabriel Precious O.', 'Computer Science', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:46:59', '14/203240/1', 'aminat@gmail.com'),
(23, '111', 'NAMS877642356', 'We all Have a starting point that we cant determined but an end we can determined', 'Anda Habib O.', 'Statistics', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:50:50', '14/2113240/1', 'atama@yahoo.com'),
(24, '111', 'NAMS749546879', 'We all Have a starting point that we cant determined but an end we can determined', 'Habib Aishat O.', 'Statistics', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:51:44', '14/29923240/1', 'atama@yahoo.com'),
(25, '111', 'NAMS486769953', 'We all Have a starting point that we cant determined but an end we can determined', 'Yakubu Jemilat.', 'Statistics', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:53:05', '14/88823240/1', 'yusufy@yahoo.com'),
(26, '111', 'NAMS874389385', 'We all Have a starting point that we cant determined but an end we can determined', 'Uzodinma Chidinma.', 'Statistics', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:53:56', '14/80173240/1', 'yusufy@yahoo.com'),
(27, '121', 'NAMS947209798', 'We must be focus in the pursuit of our dreams.. If we don\'t concentrate on the success the enemies will never deter from focusing on our failure.', 'Aliru Hanifat.', 'Statistics', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:55:30', '14/8991700/1', 'yusufy@yahoo.com'),
(28, '111', 'NAMS507810090', 'We all Have a starting point that we cant determined but an end we can determined', 'Musa Sadiya.', 'Statistics', '500', 'Female', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:56:12', '14/8031700D/1', 'sadiya@yahoo.com'),
(29, '111', 'NAMS668920570', 'We all Have a starting point that we cant determined but an end we can determined', 'Habila Mercy', 'Statistics', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:56:41', '14/93431700D/1', 'sadiya@yahoo.com'),
(30, '111', 'NAMS912853713', 'We all Have a starting point that we cant determined but an end we can determined', 'Okafor Suzzy', 'Statistics', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:57:26', '14/223300D/1', 'suzzy@yahoo.com'),
(31, '111', 'NAMS661320959', 'We all Have a starting point that we cant determined but an end we can determined', 'Musa Sherifat', 'Statistics', '500', 'Female', 'Christianity', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:58:30', '14/113325D/1', 'suzzy@yahoo.com'),
(32, '111', 'NAMS507438815', 'We all Have a starting point that we cant determined but an end we can determined', 'Adavuruku Sherif A.', 'Statistics', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 10:59:32', '14/615525D/1', 'suzzy@yahoo.com'),
(33, '111', 'NAMS758461546', 'We all Have a starting point that we cant determined but an end we can determined', 'Lawal Bibian.', 'Statistics', '500', 'Male', 'Islam', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'Kaduna', 'Kaduna South', 'No.35 Kad Street Kaduna', 'My Registration Date', '2018-01-08 11:00:16', '14/6977113D/1', 'bibian@gnail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userlecturer`
--

CREATE TABLE `userlecturer` (
  `id` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `bestLecturer` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlecturer`
--

INSERT INTO `userlecturer` (`id`, `userID`, `bestLecturer`) VALUES
(1, 'NAMS700072376', 'Mr. Tanko Barde'),
(2, 'NAMS700072376', 'Doc. Muhammed Muhammed'),
(5, 'NAMS701172376', 'Mr. Barde Yusuf'),
(4, 'NAMS700072376', 'Prof. M S Atureta'),
(6, 'NAMS701172376', 'Dr. Bello Isah'),
(7, 'NAMS703072376', 'Mr. Barde Yusuf'),
(8, 'NAMS703072376', 'Dr. Bello Isah'),
(9, 'NAMS701172379', 'Mr. Barde Yusuf'),
(10, 'NAMS701172379', 'Dr. Bello Isah'),
(11, 'NAMS710073476', 'Mr. Barde Yusuf'),
(12, 'NAMS710073476', 'Dr. Bello Isah'),
(13, 'NAMS701172000', 'Mr. Barde Yusuf'),
(14, 'NAMS701172000', 'Dr. Bello Isah'),
(15, 'NAMS7099372376', 'Mr. Barde Yusuf'),
(16, 'NAMS7099372376', 'Dr. Bello Isah'),
(17, 'NAMS7661172379', 'Mr. Barde Yusuf'),
(18, 'NAMS7661172379', 'Dr. Bello Isah'),
(19, 'NAMS404110260', 'Mr. Barde Yusuf'),
(20, 'NAMS404110260', 'Dr. Bello Isah'),
(21, 'NAMS385334496', 'Mr. Barde Yusuf'),
(22, 'NAMS385334496', 'Dr. Bello Isah'),
(23, 'NAMS555760711', 'Mr. Inuwa Ojochenim'),
(24, 'NAMS555760711', 'Dr. Muhammed Bello'),
(25, 'NAMS509655050', 'Mr. Inuwa Ojochenim'),
(26, 'NAMS509655050', 'Dr. Muhammed Bello'),
(27, 'NAMS666323570', 'Mr. Inuwa Ojochenim'),
(28, 'NAMS666323570', 'Dr. Muhammed Bello'),
(29, 'NAMS914403550', 'Mr. Inuwa Ojochenim'),
(30, 'NAMS914403550', 'Dr. Muhammed Bello'),
(31, 'NAMS734709865', 'Mr. Inuwa Ojochenim'),
(32, 'NAMS734709865', 'Dr. Muhammed Bello'),
(33, 'NAMS513289398', 'Mr. Inuwa Ojochenim'),
(34, 'NAMS513289398', 'Dr. Muhammed Bello'),
(35, 'NAMS470268351', 'Mr. Inuwa Ojochenim'),
(36, 'NAMS470268351', 'Dr. Muhammed Bello'),
(37, 'NAMS805509083', 'Mr. Inuwa Ojochenim'),
(38, 'NAMS805509083', 'Dr. Muhammed Bello'),
(39, 'NAMS961959951', 'Mr. Inuwa Ojochenim'),
(40, 'NAMS961959951', 'Dr. Muhammed Bello'),
(41, 'NAMS715957372', 'Mr. Inuwa Ojochenim'),
(42, 'NAMS715957372', 'Dr. Muhammed Bello'),
(43, 'NAMS605555634', 'Mr. Inuwa Ojochenim'),
(44, 'NAMS605555634', 'Dr. Muhammed Bello'),
(45, 'NAMS877642356', 'Prof. Adams Kabir'),
(46, 'NAMS877642356', 'Dr. Adinoyi Ahmed'),
(47, 'NAMS749546879', 'Prof. Adams Kabir'),
(48, 'NAMS749546879', 'Dr. Adinoyi Ahmed'),
(49, 'NAMS486769953', 'Prof. Adams Kabir'),
(50, 'NAMS486769953', 'Dr. Adinoyi Ahmed'),
(51, 'NAMS874389385', 'Prof. Adams Kabir'),
(52, 'NAMS874389385', 'Dr. Adinoyi Ahmed'),
(53, 'NAMS947209798', 'Prof. Adams Kabir'),
(54, 'NAMS947209798', 'Dr. Adinoyi Ahmed'),
(55, 'NAMS507810090', 'Prof. Adams Kabir'),
(56, 'NAMS507810090', 'Dr. Adinoyi Ahmed'),
(57, 'NAMS668920570', 'Prof. Adams Kabir'),
(58, 'NAMS668920570', 'Dr. Adinoyi Ahmed'),
(59, 'NAMS912853713', 'Prof. Adams Kabir'),
(60, 'NAMS912853713', 'Dr. Adinoyi Ahmed'),
(61, 'NAMS661320959', 'Prof. Adams Kabir'),
(62, 'NAMS661320959', 'Dr. Adinoyi Ahmed'),
(63, 'NAMS507438815', 'Prof. Adams Kabir'),
(64, 'NAMS507438815', 'Dr. Adinoyi Ahmed'),
(65, 'NAMS758461546', 'Prof. Adams Kabir'),
(66, 'NAMS758461546', 'Dr. Adinoyi Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `userphone`
--

CREATE TABLE `userphone` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `userID` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userphone`
--

INSERT INTO `userphone` (`id`, `phone`, `userID`) VALUES
(1, '08164377187', 'NAMS700072376'),
(5, '07034761741', 'NAMS700072376'),
(4, '0908665432', 'NAMS700072376'),
(6, '090654435222', 'NAMS701172376'),
(7, '081654435222', 'NAMS701172376'),
(8, '090654435222', 'NAMS703072376'),
(9, '081654435222', 'NAMS703072376'),
(10, '090654435222', 'NAMS701172379'),
(11, '081654435222', 'NAMS701172379'),
(12, '090654435222', 'NAMS710073476'),
(13, '081654435222', 'NAMS710073476'),
(14, '090654435222', 'NAMS701172000'),
(15, '081654435222', 'NAMS701172000'),
(16, '090654435222', 'NAMS7099372376'),
(17, '081654435222', 'NAMS7099372376'),
(18, '090654435222', 'NAMS7661172379'),
(19, '081654435222', 'NAMS7661172379'),
(20, '090654435222', 'NAMS404110260'),
(21, '081654435222', 'NAMS404110260'),
(22, '090654435222', 'NAMS385334496'),
(23, '081654435222', 'NAMS385334496'),
(24, '0706511135222', 'NAMS555760711'),
(25, '0816533435222', 'NAMS555760711'),
(26, '0706511135222', 'NAMS509655050'),
(27, '0816533435222', 'NAMS509655050'),
(28, '0706511135222', 'NAMS666323570'),
(29, '0816533435222', 'NAMS666323570'),
(30, '0706511135222', 'NAMS914403550'),
(31, '0816533435222', 'NAMS914403550'),
(32, '0706511135222', 'NAMS734709865'),
(33, '0816533435222', 'NAMS734709865'),
(34, '0706511135222', 'NAMS513289398'),
(35, '0816533435222', 'NAMS513289398'),
(36, '0706511135222', 'NAMS470268351'),
(37, '0816533435222', 'NAMS470268351'),
(38, '0706511135222', 'NAMS805509083'),
(39, '0816533435222', 'NAMS805509083'),
(40, '0706511135222', 'NAMS961959951'),
(41, '0816533435222', 'NAMS961959951'),
(42, '0706511135222', 'NAMS715957372'),
(43, '0816533435222', 'NAMS715957372'),
(44, '0706511135222', 'NAMS605555634'),
(45, '0816533435222', 'NAMS605555634'),
(46, '0810651122', 'NAMS877642356'),
(47, '07065114352', 'NAMS877642356'),
(48, '0810651122', 'NAMS749546879'),
(49, '07065114352', 'NAMS749546879'),
(50, '0810651122', 'NAMS486769953'),
(51, '07065114352', 'NAMS486769953'),
(52, '0810651122', 'NAMS874389385'),
(53, '07065114352', 'NAMS874389385'),
(54, '0810651122', 'NAMS947209798'),
(55, '07065114352', 'NAMS947209798'),
(56, '0810651122', 'NAMS507810090'),
(57, '07065114352', 'NAMS507810090'),
(58, '0810651122', 'NAMS668920570'),
(59, '07065114352', 'NAMS668920570'),
(60, '0810651122', 'NAMS912853713'),
(61, '07065114352', 'NAMS912853713'),
(62, '0810651122', 'NAMS661320959'),
(63, '07065114352', 'NAMS661320959'),
(64, '0810651122', 'NAMS507438815'),
(65, '07065114352', 'NAMS507438815'),
(66, '0810651122', 'NAMS758461546'),
(67, '07065114352', 'NAMS758461546');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2015_1`
--
ALTER TABLE `2015_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `2015_2`
--
ALTER TABLE `2015_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atbu_course`
--
ALTER TABLE `atbu_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atbu_dept`
--
ALTER TABLE `atbu_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atbu_staff`
--
ALTER TABLE `atbu_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atbu_student`
--
ALTER TABLE `atbu_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_cgp`
--
ALTER TABLE `course_cgp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_data`
--
ALTER TABLE `course_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userbest`
--
ALTER TABLE `userbest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlecturer`
--
ALTER TABLE `userlecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userphone`
--
ALTER TABLE `userphone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2015_1`
--
ALTER TABLE `2015_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `2015_2`
--
ALTER TABLE `2015_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `atbu_course`
--
ALTER TABLE `atbu_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `atbu_dept`
--
ALTER TABLE `atbu_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atbu_staff`
--
ALTER TABLE `atbu_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `atbu_student`
--
ALTER TABLE `atbu_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_cgp`
--
ALTER TABLE `course_cgp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `course_data`
--
ALTER TABLE `course_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userbest`
--
ALTER TABLE `userbest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `usercourse`
--
ALTER TABLE `usercourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `userlecturer`
--
ALTER TABLE `userlecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `userphone`
--
ALTER TABLE `userphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
