-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 05:14 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `unit` varchar(1) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`, `unit`, `schedule`, `room`, `instructor`, `section_id`, `sem_id`) VALUES
(1, 'Data Communication & Basic Network Concepts', 'ACS311', '3', '', '', '2', '', '1'),
(2, 'Database Management Systems 2', 'ACS312', '3', '', '', '3', '', '1'),
(3, 'Multimedia Technology I', 'ACS313', '3', '', '', '2', '', '1'),
(4, 'Object Oriented Programming', 'ACS314', '3', '', '', '3', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `id` int(11) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `npe` varchar(255) NOT NULL,
  `ope` varchar(255) NOT NULL,
  `le` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_log`
--

INSERT INTO `course_log` (`id`, `sem_id`, `course`, `student`, `grade`, `npe`, `ope`, `le`, `remarks`) VALUES
(1, '1', '1', '1', '', '', '', '', ''),
(2, '1', '2', '1', '', '', '', '', ''),
(3, '1', '3', '1', '', '', '', '', ''),
(4, '1', '4', '1', '', '', '', '', ''),
(5, '1', '1', '4', '', '', '', '', ''),
(6, '1', '2', '4', '', '', '', '', ''),
(7, '1', '3', '4', '', '', '', '', ''),
(8, '1', '4', '4', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eval_log`
--

CREATE TABLE `eval_log` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eval_log`
--

INSERT INTO `eval_log` (`id`, `student_id`, `course_id`, `result`, `comment`) VALUES
(4, 1, 1, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\''),
(7, 1, 2, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\''),
(8, 1, 3, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\''),
(9, 1, 3, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\''),
(10, 1, 4, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\''),
(11, 4, 3, '[{\"ID\":\"A1\",\"Value\":\"4\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\'');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category` varchar(1) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `question`, `description`, `active`) VALUES
(1, 'A', 'The instructor clearly presented the skills to be learned', '', 1),
(2, 'A', 'The instructor effectively presented the tools (e.g. materials, skills, and techniques) needed', '', 1),
(3, 'B', 'The instructor explained concepts clearly', '', 1),
(4, 'B', 'The instructor made the elements of good writing clear', '', 1),
(5, 'C', 'The instructor helped me achieve my goals', '', 1),
(6, 'C', 'The instructor helped me define the goals and scope of the project', '', 1),
(7, 'D', 'The instructor provided clear constructive feedback', '', 1),
(8, 'D', 'The instructor provided useful feedback on my writing', '', 1),
(9, 'E', 'The instructor engaged the class in productive discussions', '', 1),
(10, 'E', 'The instructor guided the discussion well', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_college`
--

CREATE TABLE `ref_college` (
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_college`
--

INSERT INTO `ref_college` (`name`, `code`) VALUES
('College of Accountancy and Economics', 'CAE'),
('College of Arts and Sciences', 'CAS'),
('College of Business and Entrepreneurship', 'CBE'),
('College of Criminology', 'CCr'),
('College of Education', 'CEd'),
('College of Engineering and Technology', 'CET'),
('College of Human Kinetics', 'CHK'),
('College of Health Science', 'CHS'),
('College of Industrial Technology', 'CIT'),
('College of Mass Communication', 'CMC'),
('College of Public Administration', 'CPA');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'SY2017-2018 First Semester'),
(2, 'SY2017-2018 Second Semester');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `name` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`name`, `sem_id`, `active`, `start_date`, `date`) VALUES
('faculty_eval', '1', 1, '', '30-12-2017 24:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `usertype`, `college`) VALUES
(1, '1student', 'password', 'Monkey', 'D.', 'Luffy', '1', 'CET'),
(2, '1faculty', 'password', 'Silvers', '', 'Rayleigh', '2', 'CAE'),
(3, '2faculty', 'password', 'Jinbe', '', '', '2', 'CET'),
(4, '2student', 'password', 'Vinsmoke', '', 'Sanji', '1', 'CET'),
(5, 'admin', '12345', 'Eiichiro', '', 'Oda', '5', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_log`
--
ALTER TABLE `course_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eval_log`
--
ALTER TABLE `eval_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_college`
--
ALTER TABLE `ref_college`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_log`
--
ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eval_log`
--
ALTER TABLE `eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
