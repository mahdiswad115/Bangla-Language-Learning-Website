-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 05:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banglalanguage`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `admin_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`admin_id`, `Name`, `Email`, `Password`) VALUES
(1, 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Course_code` int(11) NOT NULL,
  `Content` text DEFAULT NULL,
  `Category` enum('Reading','Writing','Listening','Speaking') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_code`, `Content`, `Category`) VALUES
(1, 'Bangla Basics', 'Reading'),
(2, 'Grammar Fundamentals', 'Writing'),
(3, 'Listening Comprehension', 'Listening'),
(4, 'Speaking Practice', 'Speaking'),
(5, 'Advanced Reading Skills', 'Reading'),
(6, 'Essay Writing Workshop', 'Writing'),
(7, 'Audio Lessons', 'Listening'),
(8, 'Conversational Bangla', 'Speaking'),
(9, 'Literature Studies', 'Reading'),
(10, 'Public Speaking Mastery', 'Speaking'),
(11, 'Bangla Basics', 'Reading'),
(12, 'Grammar Fundamentals', 'Writing'),
(13, 'Listening Comprehension', 'Listening'),
(14, 'Speaking Practice', 'Speaking'),
(15, 'Advanced Reading Skills', 'Reading'),
(16, 'Essay Writing Workshop', 'Writing'),
(17, 'Audio Lessons', 'Listening'),
(18, 'Conversational Bangla', 'Speaking'),
(19, 'Literature Studies', 'Reading'),
(20, 'Public Speaking Mastery', 'Speaking'),
(21, 'Bangla Basics', 'Reading'),
(22, 'Grammar Fundamentals', 'Writing'),
(23, 'Listening Comprehension', 'Listening'),
(24, 'Speaking Practice', 'Speaking'),
(25, 'Advanced Reading Skills', 'Reading'),
(26, 'Essay Writing Workshop', 'Writing'),
(27, 'Audio Lessons', 'Listening'),
(28, 'Conversational Bangla', 'Speaking'),
(30, 'Takwar Teaching', 'Writing'),
(33, 'nayeen teaching', 'Writing'),
(34, 'nayeen teaching', 'Writing'),
(35, 'nayeen teaching', 'Writing'),
(36, 'nayeen teaching', 'Writing'),
(37, 'nayeen teaching', 'Writing'),
(38, 'nayeen teaching', 'Writing'),
(39, 'swads teaching', 'Writing');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `user_id` int(11) NOT NULL,
  `Course_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`user_id`, `Course_code`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(4, 4),
(4, 5),
(23, 3),
(24, 9);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exam_code` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Category` enum('Reading','Writing','Listening','Speaking') DEFAULT NULL,
  `Type` enum('Live','Online') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam_code`, `Date`, `Time`, `Category`, `Type`) VALUES
(1, '2024-05-01', '09:00:00', 'Reading', 'Live'),
(2, '2024-05-02', '10:00:00', 'Writing', 'Online'),
(3, '2024-05-03', '11:00:00', 'Listening', 'Live'),
(4, '2024-05-04', '12:00:00', 'Speaking', 'Online'),
(5, '2024-05-05', '13:00:00', 'Reading', 'Live'),
(6, '2024-05-06', '14:00:00', 'Writing', 'Online'),
(7, '2024-05-07', '15:00:00', 'Listening', 'Live'),
(8, '2024-05-08', '16:00:00', 'Speaking', 'Online'),
(9, '2024-05-09', '17:00:00', 'Reading', 'Live'),
(10, '2024-05-10', '18:00:00', 'Writing', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Educational_Qualification` text DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `payment_eligibility` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `Name`, `Phone_Number`, `Email`, `Password`, `Educational_Qualification`, `joining_date`, `payment_eligibility`) VALUES
(1, 'Sadman', '1234567890', 'sadman@gmail.com', '1234', 'M.Sc', '2024-04-20', 1),
(2, 'Niloy', '2345678901', 'ahsan@gmail.com', '1234', 'M.Sc', '2024-04-28', 1),
(3, 'Habib', '3456789012', 'habib@gmail.com', '1234', 'M.Sc', '2024-04-28', 1),
(4, 'Foysal', '4567890123', 'foysal@gmail.com', '1234', 'M.Sc', '2024-04-28', 0),
(5, 'Ahmed', '5678901234', 'ahmed@gmail.com', '1234', 'PhD', '2024-04-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_courses`
--

CREATE TABLE `instructor_courses` (
  `instructor_id` int(11) NOT NULL,
  `Course_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_courses`
--

INSERT INTO `instructor_courses` (`instructor_id`, `Course_code`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 3),
(3, 4),
(4, 5),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_feedback`
--

CREATE TABLE `instructor_feedback` (
  `feedback_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_feedback`
--

INSERT INTO `instructor_feedback` (`feedback_id`, `instructor_id`, `feedback_text`) VALUES
(1, 1, 'All users are acting good'),
(2, 1, 'All users are acting good'),
(3, 4, 'Students are well mannered'),
(4, 1, 'bhalo lagsa'),
(5, 1, 'dasiudfgaisudhgiuahsduia'),
(6, 1, 'kam shesh');

-- --------------------------------------------------------

--
-- Table structure for table `live_exam`
--

CREATE TABLE `live_exam` (
  `live_exam_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `exam_code` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `live_exam`
--

INSERT INTO `live_exam` (`live_exam_id`, `instructor_id`, `exam_code`, `category`, `type`) VALUES
(4, 1, '1', 'Reading', 'Live'),
(5, 1, '9', 'Reading', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam`
--

CREATE TABLE `online_exam` (
  `online_exam_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `exam_code` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_exam`
--

INSERT INTO `online_exam` (`online_exam_id`, `instructor_id`, `exam_code`, `category`, `type`) VALUES
(2, 1, '2', 'Writing', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `slip_no` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`slip_no`, `Date`, `Amount`, `user_id`) VALUES
(1, '2024-04-01', 50.00, 1),
(2, '2024-04-02', 50.00, 2),
(3, '2024-04-04', 50.00, 4),
(4, '2024-04-26', 50.00, 3),
(9, '2024-04-26', 50.00, 24),
(10, '2024-04-27', 50.00, 3),
(11, '2024-04-27', 50.00, 23),
(12, '2024-04-28', 50.00, 3),
(13, '2024-04-28', 50.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_courses`
--

CREATE TABLE `suggested_courses` (
  `suggest_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Category` enum('Reading','Writing','Listening','Speaking') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggested_courses`
--

INSERT INTO `suggested_courses` (`suggest_id`, `instructor_id`, `Content`, `Category`) VALUES
(1, 1, 'Rabindranath Poetries', 'Reading'),
(2, 2, 'Daily Handwriting Practice', 'Writing'),
(3, 3, 'Communicate with Natives', 'Listening'),
(4, 4, 'Speak 10 minutes Daily', 'Speaking'),
(5, 1, 'xyz', 'Reading'),
(13, 1, 'abc', 'Speaking'),
(14, 1, 'xyz', 'Reading'),
(15, 1, 'aaa', 'Listening'),
(16, 1, 'hehe', 'Writing'),
(17, 1, 'ijk', 'Reading');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Membership_status` varchar(50) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Address`, `Email`, `Password`, `Membership_status`, `Phone_Number`) VALUES
(1, 'Swad', 'Mirpur', 'swad@gmail.com', '1234', 'Active', '1234567890'),
(2, 'Nayeen', 'Uttara', 'nayeen@gmail.com', '1234', 'Inactive', '2345678901'),
(3, 'Takwar', 'Rampura', 'takwar@gmail.com', '1234', 'Active', '3456789012'),
(4, 'Maliha', 'Rajarbag', 'maliha@gmail.com', '1234', 'Active', '4567890123'),
(17, 'Risadh', 'khagan', 'risadh@gmail.com', '1234', 'Inactive', '12345673519'),
(21, 'jkl', 'abc', 'jkl@gmail.com', '1234', 'Inactive', '01677250527'),
(23, 'ghj', 'abc', 'asfd@gmail.com', '1234', 'Active', '016772505278'),
(24, 'Tawhid', 'Dhanmondi', 'tawhid@gmail.com', '1234', 'Active', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `user_exams`
--

CREATE TABLE `user_exams` (
  `user_id` int(11) NOT NULL,
  `Exam_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_exams`
--

INSERT INTO `user_exams` (`user_id`, `Exam_code`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(4, 2),
(4, 4),
(24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`feedback_id`, `user_id`, `feedback_text`) VALUES
(1, 1, 'Nice Website'),
(2, 1, 'good'),
(3, 1, 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Course_code`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`user_id`,`Course_code`),
  ADD KEY `Course_code` (`Course_code`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`Exam_code`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `instructor_courses`
--
ALTER TABLE `instructor_courses`
  ADD PRIMARY KEY (`instructor_id`,`Course_code`),
  ADD KEY `Course_code` (`Course_code`);

--
-- Indexes for table `instructor_feedback`
--
ALTER TABLE `instructor_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `live_exam`
--
ALTER TABLE `live_exam`
  ADD PRIMARY KEY (`live_exam_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD PRIMARY KEY (`online_exam_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`slip_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `suggested_courses`
--
ALTER TABLE `suggested_courses`
  ADD PRIMARY KEY (`suggest_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_exams`
--
ALTER TABLE `user_exams`
  ADD PRIMARY KEY (`user_id`,`Exam_code`),
  ADD KEY `Exam_code` (`Exam_code`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Course_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exam_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor_feedback`
--
ALTER TABLE `instructor_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `live_exam`
--
ALTER TABLE `live_exam`
  MODIFY `live_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online_exam`
--
ALTER TABLE `online_exam`
  MODIFY `online_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `slip_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suggested_courses`
--
ALTER TABLE `suggested_courses`
  MODIFY `suggest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`Course_code`) REFERENCES `courses` (`Course_code`);

--
-- Constraints for table `instructor_courses`
--
ALTER TABLE `instructor_courses`
  ADD CONSTRAINT `instructor_courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`),
  ADD CONSTRAINT `instructor_courses_ibfk_2` FOREIGN KEY (`Course_code`) REFERENCES `courses` (`Course_code`);

--
-- Constraints for table `instructor_feedback`
--
ALTER TABLE `instructor_feedback`
  ADD CONSTRAINT `instructor_feedback_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `live_exam`
--
ALTER TABLE `live_exam`
  ADD CONSTRAINT `live_exam_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD CONSTRAINT `online_exam_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_exams`
--
ALTER TABLE `user_exams`
  ADD CONSTRAINT `user_exams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_exams_ibfk_2` FOREIGN KEY (`Exam_code`) REFERENCES `exam` (`Exam_code`);

--
-- Constraints for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
