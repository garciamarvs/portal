SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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

INSERT INTO `course` (`id`, `title`, `code`, `unit`, `schedule`, `room`, `instructor`, `section_id`, `sem_id`) VALUES
(1, 'Data Communication & Basic Network Concepts', 'ACS311', '3', '', '', '2', '', '1'),
(2, 'Database Management Systems 2', 'ACS312', '3', '', '', '3', '', '1'),
(3, 'Multimedia Technology I', 'ACS313', '3', '', '', '2', '', '1'),
(4, 'Object Oriented Programming', 'ACS314', '3', '', '', '3', '', '1');

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

INSERT INTO `course_log` (`id`, `sem_id`, `course`, `student`, `grade`, `npe`, `ope`, `le`, `remarks`) VALUES
(1, '1', '1', '1', '', '', '', '', ''),
(2, '1', '2', '1', '', '', '', '', ''),
(3, '1', '3', '1', '', '', '', '', ''),
(4, '1', '4', '1', '', '', '', '', ''),
(5, '1', '1', '4', '', '', '', '', ''),
(6, '1', '2', '4', '', '', '', '', ''),
(7, '1', '3', '4', '', '', '', '', ''),
(8, '1', '4', '4', '', '', '', '', '');

CREATE TABLE `eval_log` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `eval_log` (`id`, `student_id`, `course_id`, `result`, `comment`) VALUES
(18, 1, 1, '[{\"ID\":\"A1\",\"Value\":\"4\"},{\"ID\":\"A2\",\"Value\":\"4\"},{\"ID\":\"B3\",\"Value\":\"4\"},{\"ID\":\"B4\",\"Value\":\"4\"},{\"ID\":\"C5\",\"Value\":\"4\"},{\"ID\":\"C6\",\"Value\":\"4\"},{\"ID\":\"D7\",\"Value\":\"4\"},{\"ID\":\"D8\",\"Value\":\"4\"},{\"ID\":\"E9\",\"Value\":\"4\"},{\"ID\":\"E10\",\"Value\":\"4\"}]', '\'\''),
(19, 4, 1, '[{\"ID\":\"A1\",\"Value\":\"3\"},{\"ID\":\"A2\",\"Value\":\"3\"},{\"ID\":\"B3\",\"Value\":\"3\"},{\"ID\":\"B4\",\"Value\":\"3\"},{\"ID\":\"C5\",\"Value\":\"3\"},{\"ID\":\"C6\",\"Value\":\"3\"},{\"ID\":\"D7\",\"Value\":\"3\"},{\"ID\":\"D8\",\"Value\":\"3\"},{\"ID\":\"E9\",\"Value\":\"3\"},{\"ID\":\"E10\",\"Value\":\"3\"}]', '\'\''),
(20, 1, 3, '[{\"ID\":\"A1\",\"Value\":\"4\"},{\"ID\":\"A2\",\"Value\":\"4\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"3\"},{\"ID\":\"D7\",\"Value\":\"4\"},{\"ID\":\"D8\",\"Value\":\"3\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"4\"}]', '\'\''),
(22, 4, 3, '[{\"ID\":\"A1\",\"Value\":\"3\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"4\"},{\"ID\":\"B4\",\"Value\":\"4\"},{\"ID\":\"C5\",\"Value\":\"3\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"4\"},{\"ID\":\"E10\",\"Value\":\"5\"}]', '\'\'');

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category` varchar(1) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ref_college` (
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'SY2017-2018 First Semester'),
(2, 'SY2017-2018 Second Semester');

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `name`, `sem_id`, `active`, `start_date`, `date`) VALUES
(1, 'faculty_eval', '1', 0, '', '12/30/2017 24:00:00'),
(3, 'faculty_eval', '1', 0, '12/31/2017 00:00:00', '01/01/2018 24:00:00'),
(4, 'faculty_eval', '1', 1, '01/01/2018 00:00:00', '01/08/2018 24:00:00');

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

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `usertype`, `college`) VALUES
(1, '1student', 'password', 'Monkey', 'D.', 'Luffy', '1', 'CET'),
(2, '1faculty', 'password', 'Silvers', '', 'Rayleigh', '2', 'CAE'),
(3, '2faculty', 'password', 'Jinbe', '', '', '2', 'CET'),
(4, '2student', 'password', 'Vinsmoke', '', 'Sanji', '1', 'CET'),
(5, 'admin', '12345', 'Eiichiro', '', 'Oda', '5', '');


ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `course_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `eval_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ref_college`
  ADD UNIQUE KEY `code` (`code`);

ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
