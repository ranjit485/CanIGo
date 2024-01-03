-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 10:18 AM
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
-- Table structure for table `hods`
--

CREATE TABLE `hods` (
  `HODID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`HODID`, `FirstName`, `LastName`, `Department`, `Username`, `Password`) VALUES
(1, 'Dr.', 'Bapat', 'Computer Science', 'dr_bapat', 'hodpass'),
(2, 'Prof', 'Kale', 'Electrical Engineering', 'prof_kale', 'kale@123'),
(3, 'Dr.', 'Gupta', 'Mechanical Engineering', 'dr_gupta', 'gupta@123'),
(4, 'Mrs.', 'Patil', 'Civil Engineering', 'mrs_dandekar', 'Patil@123');

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
  `Status` varchar(50) DEFAULT NULL,
  `Reason` text DEFAULT NULL,
  `TeacherApprovalStatus` varchar(50) DEFAULT NULL,
  `HODApprovalStatus` varchar(50) DEFAULT NULL,
  `LeaveID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`StudentID`, `DateTime`, `TeacherID`, `HODID`, `LeaveType`, `StartDate`, `EndDate`, `Status`, `Reason`, `TeacherApprovalStatus`, `HODApprovalStatus`, `LeaveID`) VALUES
(1, '2023-12-30 17:13:08', 1, 1, 'Sick Leave', '2023-12-31 02:03:00', '2024-01-05 02:03:00', 'Pending', 'feaver', 'Approved', 'Assgined', 19),
(1, '2023-12-30 17:13:08', 1, 1, 'Other', '2023-12-10 01:32:00', '2023-12-31 01:35:00', 'Pending', 'wedding party', 'Assigned', 'Assgined', 20),
(1, '2023-12-30 17:13:08', 1, 1, 'Sick Leave', '2024-01-02 01:34:00', '2024-01-03 01:34:00', 'Pending', 'testing', 'Assigned', 'Assgined', 21),
(1, '2023-12-30 17:13:08', 1, 1, 'Sick Leave', '2024-01-02 01:34:00', '2024-01-03 01:34:00', 'Pending', 'testing', 'Assigned', 'Assgined', 22),
(1, '2023-12-30 17:45:21', 1, 1, 'Other', '2024-01-02 11:14:00', '2024-02-07 11:15:00', 'Pending', 'testing one', 'Assigned', 'Assgined', 27),
(1, '2023-12-30 17:50:02', 1, 1, 'Vacation', '2024-02-07 11:19:00', '2024-02-11 11:19:00', 'Pending', 'hello ', 'Assigned', 'Assgined', 28),
(1, '2023-12-31 11:24:39', 1, 1, 'Sick Leave', '2023-12-29 11:24:00', '2023-12-16 11:24:00', 'Pending', 'hhhhhhhhhh', 'Assigned', 'Assgined', 29),
(1, '2023-12-31 17:12:50', 1, 1, 'Vacation', '2024-01-01 17:16:00', '2024-01-07 17:17:00', 'Pending', 'holomvnv ', 'Assigned', 'Assgined', 30),
(1, '2024-01-01 12:37:38', 1, 1, 'Sick Leave', '2024-01-28 12:37:00', '2024-02-03 12:37:00', 'Pending', 'ggggggg', 'Assigned', 'Assgined', 31),
(1, '2024-01-01 12:59:10', 1, 1, 'Vacation', '2024-01-19 12:59:00', '2024-01-13 12:59:00', 'Pending', 'hhhhhhhhhhh', 'Assigned', 'Assgined', 32),
(1, '2024-01-02 10:08:21', 1, 1, 'Vacation', '2024-01-27 10:08:00', '2024-01-02 10:13:00', 'Pending', 'iiiiiiiiiiiiiiiiiiiii', 'Assigned', 'Assgined', 33);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
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

INSERT INTO `students` (`StudentID`, `ProfilePhoto`, `FirstName`, `LastName`, `Department`, `Class`, `StudentContactNo`, `ParentContactNo`, `Username`, `Password`) VALUES
(1, 'students\\profilephoto_2023-02-02_05-45-48.jpg', 'Ranjit', 'Patil', 'Computer Science', 'CS101', '9876543210', '9876543211', 'ranjit485', 'ranjit485');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `TeacherID` int(11) NOT NULL,
  `ProfilePhoto` varchar(500) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`TeacherID`, `FirstName`, `LastName`, `Department`, `Position`, `Username`, `Password`) VALUES
(1, 'Dr.', 'Chavan', 'CM', 'Professor', 'dr_chavan', 'Chavan@123'),
(2, 'Prof', 'Deshpande', 'Mech', 'Assistant Professor', 'prof_deshpande', 'Deshpande@123'),
(3, 'Mrs.', 'Patil', 'CM', 'Associate Professor', 'mrs_patil', 'Patil@123'),
(4, 'Mr.', 'Gokhale', 'ENTC', 'Lecturer', 'mr_gokhale', 'Gokhale@123');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `hods`
--
ALTER TABLE `hods`
  MODIFY `HODID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
