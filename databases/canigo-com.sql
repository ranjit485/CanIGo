-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 03:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `StudentID` int(11) DEFAULT NULL,
  `ComplaintType` varchar(250) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `HODID` int(11) DEFAULT NULL,
  `ByAdmin` varchar(50) DEFAULT NULL,
  `ByHOD` varchar(90) NOT NULL,
  `Discription` text DEFAULT NULL,
  `ComplaintID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`StudentID`, `ComplaintType`, `DateTime`, `HODID`, `ByAdmin`, `ByHOD`, `Discription`, `ComplaintID`) VALUES
(36, 'Falculty', '2024-03-12 23:16:55', 5, 'Solved', 'Assigend', 'Anything', 31),
(36, 'Falculty', '2024-03-12 15:31:06', 5, 'Solved', 'Reviewed', '1234567890', 32),
(35, 'Raging', '2024-03-13 20:54:15', 9, 'Assigend', 'Assigend', 'hhh', 37);

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
(5, '../profiles/hods/AAV POly CM.jpg', 'Kiran', 'Gaikwad', 'Diploma', 'Computer Science', 'DIPLOMACMHOD', 'DIPLOMACMHOD'),
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
(35, '2024-03-27 17:04:49', 9, 6, 'Sick Leave', '2024-03-23 17:04:00', '2024-01-24 17:04:00', NULL, 'Example new', 'Assigned', 'Assgined', 65, 'Pending'),
(35, '2024-03-22 18:13:40', 9, 6, 'Other', '2024-03-22 18:13:00', '2024-01-23 18:13:00', NULL, 'Hello Bhaskar Harugade..........', 'Assigned', 'Assgined', 66, 'Pending'),
(35, '2024-03-22 18:14:35', 9, 6, 'Other', '2024-03-22 18:14:00', '2024-01-23 18:14:00', NULL, 'Bhaskar Harugade....', 'Assigned', 'Assgined', 67, 'Pending'),
(35, '2024-03-22 18:19:14', 9, 6, 'Other', '2024-03-22 18:19:00', '2024-01-23 18:19:00', NULL, '..........................', 'Assigned', 'Assgined', 68, 'Pending'),
(35, '2024-01-23 10:34:01', 9, 6, 'Other', '2024-03-23 10:33:00', '2024-01-24 10:33:00', NULL, 'Hello myself bhaskar Harugade ', 'Assigned', 'Assgined', 69, 'Pending');

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
(35, 2, '', 'Bhaskar', 'Haragude', 'Diploma', 'Computer Science', 'TY', '0987654321', '8830573512', 'bhaskar', 'bhaskar');

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

-- --------------------------------------------------------

--
-- Table structure for table `teacher_complaints`
--

CREATE TABLE `teacher_complaints` (
  `TeacherID` varchar(200) NOT NULL,
  `ComplaintType` varchar(250) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `ByAdmin` varchar(200) NOT NULL,
  `ByHOD` varchar(200) NOT NULL,
  `Discription` text NOT NULL,
  `ComplaintID` int(11) NOT NULL,
  `HODID` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_complaints`
--

INSERT INTO `teacher_complaints` (`TeacherID`, `ComplaintType`, `DateTime`, `ByAdmin`, `ByHOD`, `Discription`, `ComplaintID`, `HODID`) VALUES
('6', 'SchoolBus', '2024-03-12 06:14:36', 'Solved', 'Assigend', 'wwwwww', 14, 5),
('6', 'SchoolBus', '2024-03-12 06:16:55', 'Reviewed', 'Assigend', 'sssss', 15, 5),
('6', 'SchoolBus', '2024-03-13 20:09:10', 'Assigend', 'Assigend', 'nnm', 23, 5),
('6', 'Office', '2024-03-13 20:10:58', 'Assigend', 'Assigend', 'hello hii', 24, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ComplaintID`),
  ADD UNIQUE KEY `ComplaintID` (`ComplaintID`),
  ADD KEY `complaints_hodid_foreign` (`HODID`),
  ADD KEY `complaints_studentid_foreign` (`StudentID`);

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
-- Indexes for table `teacher_complaints`
--
ALTER TABLE `teacher_complaints`
  ADD PRIMARY KEY (`ComplaintID`),
  ADD KEY `teacher_complaints_hodid_foreign` (`HODID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ComplaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `hods`
--
ALTER TABLE `hods`
  MODIFY `HODID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
-- AUTO_INCREMENT for table `teacher_complaints`
--
ALTER TABLE `teacher_complaints`
  MODIFY `ComplaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
