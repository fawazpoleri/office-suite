-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2020 at 06:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attend_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `attendance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attend_id`, `staff_id`, `date`, `attendance`) VALUES
(1, 1, '01-01-2020', 'absent'),
(2, 2, '01-01-2020', 'absent'),
(3, 3, '01-01-2020', 'absent'),
(4, 1, '02-01-2020', 'Present'),
(5, 2, '02-01-2020', 'Present'),
(6, 3, '02-01-2020', 'Present'),
(7, 1, '03-01-2020', 'Present'),
(8, 2, '03-01-2020', 'Absent'),
(9, 3, '03-01-2020', 'Present'),
(10, 1, '03-01-2020', 'Present'),
(11, 2, '03-01-2020', 'Absent'),
(12, 3, '03-01-2020', 'Present'),
(13, 3, '', 'Array'),
(14, 3, '', 'Array'),
(15, 3, '2020-03-28', 'Array'),
(16, 3, '2020-03-28', 'Array'),
(17, 3, '2020-03-28', 'Array'),
(18, 3, '2020-03-28', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `clg_id` int(11) NOT NULL,
  `clg_name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`clg_id`, `clg_name`, `address`) VALUES
(2, 'JDT', 'CALICUT'),
(3, 'AWH', 'CALICUT'),
(4, 'KMCT', 'MUKKAM'),
(8, 'CEV', 'VADAKARA'),
(9, 'MES', 'VADAKARA'),
(11, 'COCHIN COLLEGE', 'CALICUT'),
(13, 'SN', 'VADAKARA'),
(15, 'CHINMAYA', 'KANNUR'),
(16, 'MH', 'KUTTIADY'),
(17, 'CKM', 'PERAMBRA'),
(18, 'CSI', 'MAHE'),
(19, 'IHRD', 'CALICUT'),
(20, 'IHRD', 'NADAPURAM');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `design_id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`design_id`, `designation`) VALUES
(1, 'HR'),
(2, 'Project Manager'),
(3, 'Python developer'),
(4, 'Junior software Developer'),
(9, 'Web Designer'),
(10, 'System Tester'),
(11, 'PHP developer'),
(12, 'Java Developer'),
(13, 'Marketting'),
(14, 'Managing director');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `details` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`course_id`, `course_name`, `details`, `duration`) VALUES
(6, 'python', 'djando', '3 months'),
(7, 'flutter', ' ios app development', '4 months'),
(8, 'php', ' laraval', '6 months'),
(9, 'angular', 'fullstack', '6 months'),
(10, 'Node Js', ' Basics', '4 Months'),
(11, 'Node Js', ' Basics\r\n', '4 Months'),
(12, 'Aws', ' cloud computing', '4 Months'),
(13, 'CCNA', ' Networking', '4 Months'),
(14, 'MCSE', ' System admin', '4 Months');

-- --------------------------------------------------------

--
-- Table structure for table `intern_candidate`
--

CREATE TABLE `intern_candidate` (
  `intern_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `qual` varchar(20) NOT NULL,
  `college` varchar(30) NOT NULL,
  `joining_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_candidate`
--

INSERT INTO `intern_candidate` (`intern_id`, `course_id`, `name`, `address`, `email`, `phone`, `qual`, `college`, `joining_date`) VALUES
(9, 7, 'fawaz', 'vadakara', 'fawaz@gmail.com', 2147483647, 'MCA', 'CEV', '2020-03-17'),
(11, 0, 'new', 'vadakara', 'fawaz@gmail.com', 2147483647, 'BCA', 'mes', '2020-03-19'),
(16, 7, 'karthik', 'vadakara', 'karthik@gmail.com', 987654321, 'MCA', 'mes vadakara', '2020-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `intern_enquiry`
--

CREATE TABLE `intern_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `qual` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `enq_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_enquiry`
--

INSERT INTO `intern_enquiry` (`id`, `name`, `course_id`, `qual`, `address`, `phone`, `email`, `date`, `enq_details`) VALUES
(1, 'shibin', 13, 'btech', 'kochi', '1234567890', 'shibin1245@gmail.com', '2020-06-23', 'eqq');

-- --------------------------------------------------------

--
-- Table structure for table `intern_fee`
--

CREATE TABLE `intern_fee` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `intern_id` int(11) NOT NULL,
  `total` int(30) NOT NULL,
  `paid` int(30) NOT NULL DEFAULT 0,
  `date` varchar(30) NOT NULL DEFAULT 'Not Paid',
  `due` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_fee`
--

INSERT INTO `intern_fee` (`id`, `course_id`, `intern_id`, `total`, `paid`, `date`, `due`) VALUES
(1, 9, 9, 10000, 10000, '2020-03-18', 'completed'),
(2, 7, 16, 10000, 5000, '2020-06-23', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`leave_id`, `login_id`, `leave_type`, `reason`, `date_from`, `date_to`, `status`) VALUES
(9, 3, 'Medical Leave', 'not wel;', '2020-03-10', '2020-03-12', 'Approved'),
(13, 2, 'Medical Leave', 'aaaaawwwww', '2020-03-13', '2020-03-14', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'STAFF',
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `uname`, `passwd`, `role`, `staff_id`) VALUES
(1, 'admin', 'admin', 'ADMIN', 1),
(2, 'yafiz', 'yafiz', 'STAFF', 2),
(3, 'shamseer', 'shamseer', 'STAFF', 3),
(4, 'anu', 'anu', 'STAFF', 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(20) NOT NULL,
  `domain` varchar(20) NOT NULL,
  `details` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `domain`, `details`) VALUES
(2, 'kseb', 'python', 'embedded'),
(3, 'Real estate', 'android', ' mobile application '),
(4, 'office Management', 'php', 'web application\r\n\r\n'),
(5, 'library', 'android', 'mobile application'),
(7, 'face recognition', 'pythom', ' Embedded'),
(8, 'Food Calorie', 'pythom', ' embedded'),
(9, 'live stream', 'flutter', ' mobile Application'),
(10, 'Object Detection', 'Machine Learning', ' application');

-- --------------------------------------------------------

--
-- Table structure for table `project_candi`
--

CREATE TABLE `project_candi` (
  `candidate_id` int(11) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `total_members` int(10) NOT NULL,
  `team_details` varchar(50) NOT NULL,
  `joining_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_candi`
--

INSERT INTO `project_candi` (`candidate_id`, `clg_id`, `project_id`, `name`, `address`, `phone`, `email`, `course_name`, `total_members`, `team_details`, `joining_date`) VALUES
(1, 2, 2, 'arun', 'CALICUT', '1234567895', 'arun@gmail.com', 'BCA', 2, 'arun,vishnu', '2020-03-10'),
(4, 3, 2, 'shibin', 'thalassery', '1234567890', 'shibin123@gmail.com', 'BCA', 2, 'Arjun', '2020-06-23'),
(5, 4, 5, 'hussain', 'vadakara', '1234556890', 'hussain@gmail.com', 'MCA', 2, 'fawaz', '2020-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `project_enquiry`
--

CREATE TABLE `project_enquiry` (
  `enq_id` int(11) NOT NULL,
  `project_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `college` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `details` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_enquiry`
--

INSERT INTO `project_enquiry` (`enq_id`, `project_id`, `name`, `college`, `course`, `address`, `phone`, `email`, `date`, `details`) VALUES
(1, '8', 'anju', 'mes', 'mca', 'VADAKARA', '1234567890', 'anju321@gmail.com', '2020-06-23', 'project');

-- --------------------------------------------------------

--
-- Table structure for table `project_fee`
--

CREATE TABLE `project_fee` (
  `fee_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `total` int(30) NOT NULL,
  `paid` int(30) NOT NULL DEFAULT 0,
  `date` varchar(30) NOT NULL DEFAULT 'Not Paid',
  `due` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_fee`
--

INSERT INTO `project_fee` (`fee_id`, `candidate_id`, `clg_id`, `project_id`, `total`, `paid`, `date`, `due`) VALUES
(1, 1, 2, 2, 15000, 15000, '2020-03-20', '0'),
(2, 4, 3, 2, 10000, 0, '2020-06-23', '10000'),
(3, 5, 4, 5, 15000, 0, 'Not Paid', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `staff_id`, `salary`, `date`, `status`) VALUES
(8, 1, 10000, '2020-06-01', NULL),
(9, 2, 20000, '2020-06-01', NULL),
(10, 3, 15000, '2020-06-01', NULL),
(11, 4, 10000, '2020-06-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `Age` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `design_id`, `staff_name`, `gender`, `Age`, `address`, `phone`, `email`, `join_date`) VALUES
(1, 1, 'fawaz', 'male', 25, 'vadakara', '9846492571', 'fawazpoleri@gmail.com', '2020-06-23'),
(2, 2, 'yafiz', 'male', 25, 'calicut', '0987654321', 'yafis@gmail.com', '2020-05-11'),
(3, 3, 'shamseer', 'male', 23, 'VADAKARA', '1234567890', 'shamseer@gmail.com', '2020-06-23'),
(4, 4, 'Anu', 'male', 25, 'calicut', '0987654321', 'Anu123@gmail.com', '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `task_type` varchar(50) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_details` varchar(100) NOT NULL,
  `strt_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cmplt_date` date DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Not Started',
  `completion` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `staff_id`, `task_type`, `task_name`, `task_details`, `strt_date`, `end_date`, `cmplt_date`, `status`, `completion`) VALUES
(1, 1, 'Day to Day Task', 'login', 'login register', '2020-03-06', '2020-03-07', '0000-00-00', 'In Progress', '30'),
(2, 2, 'student project', 'web', 'trew', '2020-03-06', '2020-03-07', '0000-00-00', 'In Progress', '30'),
(3, 3, 'Day to Day Task', 'design', 'complete ui design', '2020-06-23', '2020-06-24', NULL, 'Not Started', '0'),
(4, 4, 'Student Session', 'guide team', 'project guiding', '2020-06-23', '2020-06-23', NULL, 'Not Started', '0'),
(5, 1, 'student project', 'login session', 'complete session design', '2020-06-23', '2020-06-24', NULL, 'Completed', '100'),
(6, 3, 'Client Project', 'data base', 'create db,table,connection', '2020-06-23', '2020-06-24', NULL, 'Not Started', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `intern_candidate`
--
ALTER TABLE `intern_candidate`
  ADD PRIMARY KEY (`intern_id`);

--
-- Indexes for table `intern_enquiry`
--
ALTER TABLE `intern_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern_fee`
--
ALTER TABLE `intern_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_candi`
--
ALTER TABLE `project_candi`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `project_enquiry`
--
ALTER TABLE `project_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `project_fee`
--
ALTER TABLE `project_fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `clg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `design_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `intern_candidate`
--
ALTER TABLE `intern_candidate`
  MODIFY `intern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `intern_enquiry`
--
ALTER TABLE `intern_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `intern_fee`
--
ALTER TABLE `intern_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_candi`
--
ALTER TABLE `project_candi`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_enquiry`
--
ALTER TABLE `project_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_fee`
--
ALTER TABLE `project_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
