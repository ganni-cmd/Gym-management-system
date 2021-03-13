-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 02:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arnoldgym`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `member_id`, `attendance_date`, `attendance_time`) VALUES
(1, 1, '2021-03-01', '16:20:11'),
(2, 3, '2021-03-08', '01:31:57'),
(3, 1, '2021-03-08', '01:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `home_announcement` text NOT NULL,
  `home_announcement_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`home_id`, `home_announcement`, `home_announcement_datetime`) VALUES
(5, 'Test announcement', '2021-03-02 10:57:52'),
(6, 'Gym will be closed on Holi', '2021-03-08 01:51:32'),
(7, 'Gym will be closed due to Maintainance', '2021-03-08 10:57:06'),
(8, 'Gym will be closed on Mahashivratri', '2021-03-08 01:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_fname` varchar(100) NOT NULL,
  `member_lname` varchar(100) NOT NULL,
  `member_password` varchar(100) NOT NULL,
  `member_bdate` date NOT NULL,
  `member_age` int(11) NOT NULL,
  `member_sex` enum('Male','Female') NOT NULL,
  `member_address` varchar(200) NOT NULL,
  `member_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_fname`, `member_lname`, `member_password`, `member_bdate`, `member_age`, `member_sex`, `member_address`, `member_email`) VALUES
(1, 'yash', 'Mani', '202cb962ac59075b964b07152d234b70', '1998-01-09', 23, 'Male', 'kalyan', 'ganesh@gmail.com'),
(2, 'Ganesh ', 'Y', '1f6c73fdb9658b58d179f9d1e7d33b23', '1999-12-07', 21, 'Male', 'kalamboli', 'y@gmail.com'),
(3, 'naman', 's', '8aa1ef9afbb2e0799af4c96103a078e1', '2001-03-12', 19, 'Male', 'kamothe', 'n@gmail.com'),
(4, 'Ganesh ', 'Yadav', '3cc46010324649fc9dad17ba0d774aff', '1998-06-03', 22, 'Male', 'Kalamboli', 'yganesh004@gmail.com'),
(5, 'Naman', 'saxena', '8aa1ef9afbb2e0799af4c96103a078e1', '2000-02-06', 21, 'Male', 'thane', 'naman@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_name` text NOT NULL,
  `program_number` int(11) NOT NULL,
  `program_day1` text NOT NULL,
  `program_day2` text NOT NULL,
  `program_day3` text NOT NULL,
  `program_day4` text NOT NULL,
  `program_day5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_name`, `program_number`, `program_day1`, `program_day2`, `program_day3`, `program_day4`, `program_day5`) VALUES
('bulking', 1, 'Dumbbell Press', 'Dumbbell Curls', 'Pull-ups', 'Pull-ups', 'Squats'),
('bulking', 2, 'Dips', 'Barbell Curls', 'One Arm Pull-ups', 'One Arm Pull-ups', 'Lunges'),
('bulking', 3, 'Inclined Bench Press', 'One-arm Tricep Lift', 'Deadlift', 'Deadlift', 'Leg Press Machine'),
('bulking', 4, 'Push-ups', 'Rope Pull', 'Dumbbell Pull-ups', 'Dumbbell Pull-ups', 'Sit ups'),
('bulking', 5, 'Declined Bench Press', 'Lateral Push Down', 'Jumping Jacks', 'Jumping Jacks', 'Crunches'),
('cutting', 6, 'Dumbbell Press', 'Normal Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 7, 'Dips', 'Hard Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 8, 'Inclined Bench Press', 'Cardio Exercise', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 9, 'Push-ups', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cutting', 10, 'Declined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press'),
('cardio', 11, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Squats'),
('cardio', 12, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Lunges'),
('cardio', 13, 'pushups', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Leg Press Machine'),
('cardio', 14, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Sit ups'),
('cardio', 15, 'pushups', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Crunches'),
('closecombat', 16, 'voyak', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Squats'),
('closecombat', 17, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Lunges'),
('closecombat', 18, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Leg Press Machine'),
('closecombat', 19, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Sit ups'),
('closecombat', 20, 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Inclined Bench Press', 'Crunches');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_member` (`member_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
