-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 07:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_type` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_type`, `student_id`, `teacher_id`, `class_id`, `section_id`, `attendance_date`, `mark`) VALUES
(15, 1, 37, 0, 1, 18, '2021-03-02', 1),
(16, 1, 38, 0, 1, 18, '2021-03-02', 1),
(17, 1, 37, 0, 1, 18, '2021-03-03', 2),
(18, 1, 38, 0, 1, 18, '2021-03-03', 3),
(21, 2, 0, 12, 0, 0, '2021-03-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `numeric_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `numeric_name`) VALUES
(1, 'One', '01'),
(4, 'Four', '04'),
(5, 'Five', '5'),
(6, 'Two', '02'),
(7, 'Nine', '09');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_name` varchar(255) NOT NULL,
  `expenses_amount` varchar(255) NOT NULL,
  `expenses_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `expenses_name`, `expenses_amount`, `expenses_name_id`) VALUES
(1, 'sdfsd', '50', 1),
(2, 'sdfsd', '500', 2);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_name`
--

CREATE TABLE `expenses_name` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_name`
--

INSERT INTO `expenses_name` (`id`, `date`, `name`, `total_amount`) VALUES
(1, '2021-02-11', 'dfs', '50.00'),
(2, '2021-02-11', 'dfs', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `marksheet_id` int(11) NOT NULL,
  `marksheet_name` varchar(255) NOT NULL,
  `marksheet_date` date NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`marksheet_id`, `marksheet_name`, `marksheet_date`, `class_id`) VALUES
(21, 'Final Exam', '2021-03-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marksheet_student`
--

CREATE TABLE `marksheet_student` (
  `marksheet_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `obtain_mark` varchar(255) NOT NULL,
  `marksheet_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marksheet_student`
--

INSERT INTO `marksheet_student` (`marksheet_student_id`, `student_id`, `subject_id`, `obtain_mark`, `marksheet_id`, `class_id`, `section_id`) VALUES
(5, 37, 9, '50', 21, 1, 18),
(6, 37, 11, '50', 21, 1, 18),
(7, 37, 12, '50', 21, 1, 18),
(8, 38, 9, '50', 21, 1, 18),
(9, 38, 11, '60', 21, 1, 18),
(10, 38, 12, '50', 21, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creator_id` int(11) NOT NULL,
  `creator_role` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `creator_id`, `creator_role`, `created`) VALUES
(2, 'sdfsdf', ' sdfsdfsdfsdfsdf', 1, 'admin', '2021-02-25 07:16:36'),
(4, 'dsfsadf', ' sdafsadf', 1, 'teacher', '2021-02-25 08:10:58'),
(5, 'sdfsd', ' sdfsfdsdfsdfsdf\r\nfsdfsdfsdaf\r\nsdfdsafsad\r\n\r\nsad\r\nfsd\r\nfsdafdsf', 1, 'admin', '2021-02-25 19:17:19'),
(9, 'sdfsd', ' ewrffasdfs', 1, 'admin', '2021-02-26 16:19:12'),
(10, 'sdfsdfsadf', ' sdfsadfsaf', 1, 'admin', '2021-02-26 16:51:44'),
(11, 'sdfsadf', ' sadfsadfasdf', 1, 'admin', '2021-02-26 16:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `paid_amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `payment_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `paid_amount`, `status`, `payment_type`, `payment_date`, `class_id`, `section_id`, `student_id`, `payment_name_id`) VALUES
(5, '600', 1, 1, '2021-03-02', 1, 18, 37, 5),
(8, '', 0, 0, '0000-00-00', 1, 18, 37, 7),
(9, '', 0, 0, '0000-00-00', 1, 18, 38, 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment_name`
--

CREATE TABLE `payment_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_name`
--

INSERT INTO `payment_name` (`id`, `name`, `start_date`, `end_date`, `total_amount`, `type`) VALUES
(5, 'January', '2021-02-17', '2021-02-18', '600', 1),
(7, 'January', '2021-02-17', '2021-02-17', '600', 2);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `class_id`, `teacher_id`) VALUES
(18, 'B', 1, 12),
(19, 'C', 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `age` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `register_date`, `class_id`, `section_id`, `fname`, `lname`, `password`, `image`, `age`, `dob`, `contact`, `email`, `address`, `city`, `country`) VALUES
(34, '2021-02-17', 5, 19, 'Dhaka', 'sdfsdf', '12345', 'assets/images/default/default_avatar.png', '234', '2021-02-25', '234234234234', 'samsu32@gmail.com', 'Subid bazar', 'Sylhet', 'Bangladesh'),
(35, '2021-03-18', 5, 19, 'Kablu', 'mama', '123456', 'assets/images/default/default_avatar.png', '12', '2021-03-19', '01768960881', 'samsu32@gmail.com', 'Subid bazar', 'Sylhet', 'Bangladesh'),
(37, '2021-03-18', 1, 18, 'Demra', 'Pua', '12345', 'assets/images/default/default_avatar.png', '12', '2021-03-19', '23424234', 'samsu32@gmail.com', 'Subid bazar', 'Sylhet', 'Bangladesh'),
(38, '2021-03-17', 1, 18, 'Dhaka', 'pok', '54645645', 'assets/images/t5-removebg-preview.png', '12', '2021-03-11', '546445645645', 'samsu32@gmail.com', 'Subid bazar', 'Sylhet', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_mark` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `total_mark`, `class_id`, `teacher_id`) VALUES
(9, 'Bangla', '100', 1, 12),
(10, 'English', '100', 6, 12),
(11, 'English', '100', 1, 12),
(12, 'Math', '100', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `job_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `register_date`, `fname`, `lname`, `password`, `image`, `date_of_birth`, `age`, `contact`, `email`, `address`, `city`, `country`, `job_type`) VALUES
(12, '2021-02-18', 'Dhaka', 'Irfan', '50000', 'assets/images/adidas.png', '2021-02-18', '20', '44564', 'samsu32@gmail.com', 'Subid bazar', 'Sylhet', 'Bangladesh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fname`, `lname`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'John', 'Doe', 'john@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `expenses_name`
--
ALTER TABLE `expenses_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`marksheet_id`);

--
-- Indexes for table `marksheet_student`
--
ALTER TABLE `marksheet_student`
  ADD PRIMARY KEY (`marksheet_student_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_name`
--
ALTER TABLE `payment_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses_name`
--
ALTER TABLE `expenses_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `marksheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `marksheet_student`
--
ALTER TABLE `marksheet_student`
  MODIFY `marksheet_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_name`
--
ALTER TABLE `payment_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
