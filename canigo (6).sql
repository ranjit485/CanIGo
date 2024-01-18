-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 09:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canigo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `course` varchar(250) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `ProfilePhoto`, `FirstName`, `LastName`, `course`, `Username`, `Password`) VALUES
(1, '', 'BE Tech', 'Admin', 'BE Tech', 'BETECHADMIN', 'BETECHADMIN'),
(2, '', 'Diploma', 'Admin', 'Diploma', 'DIPLOMAADMIN', 'DIPLOMAADMIN'),
(3, '', 'ITI', 'Admin', 'ITI', 'ITIADMIN', 'ITIADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `guards`
--

CREATE TABLE `guards` (
  `id` int(11) NOT NULL,
  `ProfilePhoto` mediumtext NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guards`
--

INSERT INTO `guards` (`id`, `ProfilePhoto`, `FirstName`, `LastName`, `Username`, `Password`) VALUES
(0, '', 'Omkar', 'Bhagat', 'omkar', 'omkar'),
(0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hods`
--

CREATE TABLE `hods` (
  `HODID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `course` varchar(250) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`HODID`, `ProfilePhoto`, `FirstName`, `LastName`, `course`, `Department`, `Username`, `Password`) VALUES
(5, '../profiles/hods/AAV POly CM.jpg', 'Kiran', 'Gaikwad', 'Diploma', 'Computer Science', 'kiran', 'kiran'),
(6, '../profiles/hods/daksh-kapoor.png', 'Manoj', 'Yadav', 'Diploma', 'AI', 'manoj', 'manoj'),
(7, '../profiles/hods/AAV POly CM.jpg', 'Aashish', 'Vankundare', 'Diploma', 'Computer Science', '1909910050', 'root'),
(9, '../profiles/hods/daksh-kapoor.png', 'GANESH', 'PAWAR', 'Diploma', 'Computer Science', '0987654321', 'ganewsh');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `StudentID` int(11) DEFAULT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `TeacherID` int(11) DEFAULT NULL,
  `HODID` int(11) DEFAULT NULL,
  `LeaveType` varchar(255) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `ByGuard` varchar(50) DEFAULT NULL,
  `Reason` text DEFAULT NULL,
  `TeacherApprovalStatus` varchar(50) DEFAULT NULL,
  `HODApprovalStatus` varchar(50) DEFAULT NULL,
  `LeaveID` int(11) NOT NULL,
  `Status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`StudentID`, `DateTime`, `TeacherID`, `HODID`, `LeaveType`, `StartDate`, `EndDate`, `ByGuard`, `Reason`, `TeacherApprovalStatus`, `HODApprovalStatus`, `LeaveID`, `Status`) VALUES
(34, '2024-01-11 22:21:42', 6, 5, 'Sick Leave', '2024-01-13 22:21:00', '2024-01-14 22:21:00', 'IN', 'test one', 'Approved', 'Rejected', 44, ''),
(35, '2024-01-12 11:24:46', 9, 6, 'Sick Leave', '2024-01-05 11:24:00', '2024-01-05 11:24:00', NULL, 'kkkkks', 'Approved', 'Rejected', 45, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `course` varchar(250) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Class` varchar(255) DEFAULT NULL,
  `StudentContactNo` varchar(15) DEFAULT NULL,
  `ParentContactNo` varchar(15) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `RollNo`, `ProfilePhoto`, `FirstName`, `LastName`, `course`, `Department`, `Class`, `StudentContactNo`, `ParentContactNo`, `Username`, `Password`) VALUES
(34, 1, '../profiles/students/daksh-kapoor.png', 'Ranjit                               ', 'Patil                               ', 'Diploma', 'Computer Science', 'TY', '9766800965', '7499491002', '  1909910058', 'root'),
(35, 2, '', 'Bhaskar', 'Haragude', 'Diploma', 'AI', 'TY', '0987654321', '1234567890', 'bhaskar', 'bhaskar');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Class` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `ProfilePhoto`, `FirstName`, `LastName`, `Class`, `course`, `Department`, `Position`, `Username`, `Password`) VALUES
(6, '../profiles/teachers/daksh-kapoor.png', 'Mahesh', 'Pawar', 'SY', 'Diploma', 'Computer Science', 'Class Teacher', 'mahesh', 'mahesh'),
(9, '../students\\profileScreenshot 2023-10-03 113643.png', 'Snehal', 'kinkar', 'TY', 'Diploma', 'AI', 'Class Teacher', '0987654321', 'snhal'),
(16, '../profiles/teachers/AAV POly CM.jpg', 'Ranjit', 'Patil', 'TY', 'Diploma', 'Computer Science', 'Class Teacher', '1909910050', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `hods`
--
ALTER TABLE `hods`
  ADD PRIMARY KEY (`HODID`),
  ADD UNIQUE KEY `hods_username_unique` (`Username`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`LeaveID`),
  ADD KEY `leaves_hodid_foreign` (`HODID`),
  ADD KEY `leaves_studentid_foreign` (`StudentID`),
  ADD KEY `leaves_teacherid_foreign` (`TeacherID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `students_username_unique` (`Username`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`TeacherID`),
  ADD UNIQUE KEY `teachers_username_unique` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hods`
--
ALTER TABLE `hods`
  MODIFY `HODID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_hodid_foreign` FOREIGN KEY (`HODID`) REFERENCES `hods` (`HODID`),
  ADD CONSTRAINT `leaves_studentid_foreign` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`),
  ADD CONSTRAINT `leaves_teacherid_foreign` FOREIGN KEY (`TeacherID`) REFERENCES `teachers` (`TeacherID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
