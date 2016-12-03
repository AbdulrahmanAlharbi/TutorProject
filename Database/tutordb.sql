-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2016 at 09:28 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(25) NOT NULL,
  `AdLName` varchar(25) NOT NULL,
  `AdFName` varchar(25) NOT NULL,
  `AdminEmail` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdLName`, `AdFName`, `AdminEmail`, `Username`) VALUES
('Admin2016', 'Admin', 'Administrator', 'jazanu2010@gmail.com', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(25) NOT NULL,
  `AdminID` varchar(25) NOT NULL,
  `SubjectID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `AdminID`, `SubjectID`) VALUES
(100, 'Java', 'Admin2016', 'CS'),
(200, 'Web Tech', 'Admin2016', 'CS'),
(552, 'Computer Architecture', 'Admin2016', 'CS'),
(553, 'Computer Systems', 'Admin2016', 'CS'),
(554, 'Theory of Computation', 'Admin2016', 'CS'),
(610, 'Software Engineering', 'Admin2016', 'CS'),
(620, 'Internet App. Development', 'Admin2016', 'CS'),
(621, 'Database', 'Admin2016', 'CS'),
(623, 'Data Communications', 'Admin2016', 'CS'),
(627, 'Introduction to Security', 'Admin2016', 'CS'),
(680, 'Artificial Intelligence', 'Admin2016', 'CS'),
(681, 'Programming Paradigms', 'Admin2016', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedID` int(11) NOT NULL,
  `Comment` varchar(25) NOT NULL,
  `Date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_rate`
--

CREATE TABLE `feedback_rate` (
  `Rate` int(11) NOT NULL,
  `FeedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `Type`) VALUES
('aa123', '123', 'Student'),
('Admin1', 'Admin123', 'Admin'),
('mk123', '123', 'Student'),
('Tx123', '123', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `preview`
--

CREATE TABLE `preview` (
  `SID` int(11) NOT NULL,
  `FeedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requesttutoron`
--

CREATE TABLE `requesttutoron` (
  `CourseID` int(11) NOT NULL,
  `SID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requesttutoron`
--

INSERT INTO `requesttutoron` (`CourseID`, `SID`) VALUES
(100, 111),
(621, 222),
(621, 333);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SID` int(11) NOT NULL,
  `SFName` varchar(25) NOT NULL,
  `SLName` varchar(25) NOT NULL,
  `SEmail` varchar(25) NOT NULL,
  `IsTutor` tinyint(1) NOT NULL,
  `Username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `SFName`, `SLName`, `SEmail`, `IsTutor`, `Username`) VALUES
(111, 'Tao', 'Xie', 'tx123@gmail.com', 1, 'Tx123'),
(222, 'Abdul', 'Alharbi', 'aa123@gmail.com', 1, 'aa123'),
(333, 'Mark', 'Black', 'mk123@gmail.com', 0, 'mk123');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` varchar(25) NOT NULL,
  `SubjectName` varchar(25) NOT NULL,
  `AdminID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`, `AdminID`) VALUES
('CS', 'Computer Science', 'Admin2016');

-- --------------------------------------------------------

--
-- Table structure for table `taughtby`
--

CREATE TABLE `taughtby` (
  `SID_1` int(11) NOT NULL,
  `TaughtBySID_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taughtby`
--

INSERT INTO `taughtby` (`SID_1`, `TaughtBySID_2`) VALUES
(111, 222),
(222, 111),
(333, 111);

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `SID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach`
--

INSERT INTO `teach` (`SID`, `CourseID`) VALUES
(111, 621),
(222, 100);

-- --------------------------------------------------------

--
-- Table structure for table `write_tb`
--

CREATE TABLE `write_tb` (
  `SID` int(11) NOT NULL,
  `FeedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `AdminEmail` (`AdminEmail`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `CourseName` (`CourseName`),
  ADD KEY `AdminID` (`AdminID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedID`);

--
-- Indexes for table `feedback_rate`
--
ALTER TABLE `feedback_rate`
  ADD PRIMARY KEY (`Rate`,`FeedID`),
  ADD KEY `FeedID` (`FeedID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `preview`
--
ALTER TABLE `preview`
  ADD PRIMARY KEY (`SID`,`FeedID`),
  ADD KEY `FeedID` (`FeedID`);

--
-- Indexes for table `requesttutoron`
--
ALTER TABLE `requesttutoron`
  ADD PRIMARY KEY (`CourseID`,`SID`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD UNIQUE KEY `SEmail` (`SEmail`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`),
  ADD UNIQUE KEY `SubjectName` (`SubjectName`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `taughtby`
--
ALTER TABLE `taughtby`
  ADD PRIMARY KEY (`SID_1`,`TaughtBySID_2`),
  ADD KEY `TaughtBySID_2` (`TaughtBySID_2`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`SID`,`CourseID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `write_tb`
--
ALTER TABLE `write_tb`
  ADD PRIMARY KEY (`SID`,`FeedID`),
  ADD KEY `FeedID` (`FeedID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`SubjectID`);

--
-- Constraints for table `feedback_rate`
--
ALTER TABLE `feedback_rate`
  ADD CONSTRAINT `feedback_rate_ibfk_1` FOREIGN KEY (`FeedID`) REFERENCES `feedback` (`FeedID`);

--
-- Constraints for table `preview`
--
ALTER TABLE `preview`
  ADD CONSTRAINT `preview_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `preview_ibfk_2` FOREIGN KEY (`FeedID`) REFERENCES `feedback` (`FeedID`);

--
-- Constraints for table `requesttutoron`
--
ALTER TABLE `requesttutoron`
  ADD CONSTRAINT `requesttutoron_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `requesttutoron_ibfk_2` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `taughtby`
--
ALTER TABLE `taughtby`
  ADD CONSTRAINT `taughtby_ibfk_1` FOREIGN KEY (`SID_1`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `taughtby_ibfk_2` FOREIGN KEY (`TaughtBySID_2`) REFERENCES `student` (`SID`);

--
-- Constraints for table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `write_tb`
--
ALTER TABLE `write_tb`
  ADD CONSTRAINT `write_tb_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`),
  ADD CONSTRAINT `write_tb_ibfk_2` FOREIGN KEY (`FeedID`) REFERENCES `feedback` (`FeedID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
