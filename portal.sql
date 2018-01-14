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
  `sem_id` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `course` (`id`, `title`, `code`, `unit`, `schedule`, `room`, `instructor`, `section_id`, `sem_id`, `college`) VALUES
(1, 'Data Communication & Basic Network Concepts', 'ACS311', '3', '', '', '2', '5', '6', 'CET'),
(2, 'Database Management Systems 2', 'ACS312', '3', '', '', '2', '5', '6', 'CET'),
(3, 'Multimedia Technology I', 'ACS313', '3', '', '', '2', '5', '6', 'CET'),
(4, 'Object Oriented Programming', 'ACS314', '3', '', '', '2', '5', '6', 'CET'),
(5, 'System Analysis & Design', 'ACS315', '3', '', '', '2', '5', '6', 'CET'),
(6, 'Computer systems Organization & Assembly Language', 'ACS316', '3', '', '', '2', '5', '6', 'CET'),
(7, 'Web Application Design I', 'ACS317', '3', '', '', '2', '5', '6', 'CET'),
(8, 'Business Process I', 'BPO101', '3', '', '', '2', '5', '6', 'CET'),
(9, 'Advanced Computer Networking', 'ACS321', '3', '', '', '3', '5', '7', 'CET'),
(10, 'Computer Architecture', 'BIT321', '3', '', '', '3', '5', '7', 'CET'),
(11, 'Project Management', 'BIT322', '3', '', '', '3', '5', '7', 'CET'),
(12, 'Web Application Design 2', 'ACS323', '3', '', '', '3', '5', '7', 'CET'),
(13, 'Multimedia Technology 2', 'BIT323', '3', '', '', '3', '5', '7', 'CET'),
(14, 'Business Process 2', 'BPO102', '3', '', '', '3', '5', '7', 'CET'),
(15, 'Principles of Critical Thinking', 'STH101', '3', '', '', '3', '5', '7', 'CET'),
(16, 'Network Technologies', 'BIT324', '3', '', '', '3', '5', '7', 'CET'),
(17, 'Microprocessor Systems', 'CPE444', '4', '', '', '2', '7', '8', 'CET'),
(18, 'E-Commerce', 'BIT311', '3', '', '', '2', '7', '8', 'CET'),
(19, 'Operating Systems', 'CPE424B', '3', '', '', '2', '7', '8', 'CET'),
(20, 'Basic Accounting', 'ACS411', '3', '', '', '2', '7', '8', 'CET'),
(21, 'Network Security and Management', 'BIT414', '3', '', '', '2', '7', '8', 'CET'),
(22, 'Software Engineering', 'CPE423', '3', '', '', '2', '7', '8', 'CET'),
(23, 'Internship 1', 'BIT416', '6', '', '', '2', '7', '8', 'CET');

CREATE TABLE `course_log` (
  `id` int(11) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `course` text NOT NULL,
  `student` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `course_log` (`id`, `sem_id`, `course`, `student`, `section_id`) VALUES
(1, '6', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"87\"},{\"course\":\"3\",\"grade\":\"95\"},{\"course\":\"4\",\"grade\":\"94\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"89\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"92\"}]', '1', '5'),
(2, '7', '[{\"course\":\"9\",\"grade\":\"94\"},{\"course\":\"10\",\"grade\":\"84\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"98\"},{\"course\":\"13\",\"grade\":\"82\"},{\"course\":\"14\",\"grade\":\"83\"},{\"course\":\"15\",\"grade\":\"91\"},{\"course\":\"16\",\"grade\":\"96\"}]', '1', '5');

CREATE TABLE `eval_log` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `result` text NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(10, 'E', 'The instructor guided the discussion well', '', 1),
(11, 'A', 'The instructor effectively presented concepts and techniques', '', 1),
(12, 'A', 'The instructor presented content in an organized manner', '', 1),
(13, 'B', 'The instructor clearly articulated the standards of performance for the course', '', 1),
(14, 'B', 'The instructor provided guidance for understanding course exercises', '', 1),
(15, 'B', 'The instructor increased my understanding of course material', '', 1),
(16, 'C', 'The instructor helped me identify resources I needed to carry out the project', '', 1),
(17, 'C', 'The instructor was helpful when I had difficulty performing activities', '', 1),
(18, 'C', 'The instructor was helpful to me individually (in conferences, email exchanges, etc.)', '', 1),
(19, 'C', 'The instructor was readily available during the class', '', 1),
(20, 'C', 'The instructor provided help when I had difficulties', '', 1),
(21, 'C', 'The instructor was helpful when I had difficulties or questions', '', 1),
(22, 'D', 'The instructor provided meaningful feedback on my work', '', 1),
(23, 'D', 'The instructor provided meaningful guidance on my progress/work', '', 1),
(24, 'D', 'The instructor provided constructive feedback in response to difficulties with the language', '', 1),
(25, 'D', 'The instructor gave me constructive feedback', '', 1),
(26, 'D', 'The instructor gave me constructive feedback on assignments', '', 1),
(27, 'D', 'The instructor clearly articulated the standards of performance', '', 1),
(28, 'E', 'The instructor encouraged student contributions', '', 1),
(29, 'E', 'The instructor provided opportunities for class participation', '', 1),
(30, 'E', 'The instructor encouraged critical engagement with the material', '', 1),
(31, 'E', 'The instructor encouraged student questions and participation', '', 1),
(32, 'E', 'The instructor encouraged participation', '', 1);

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

CREATE TABLE `ref_course` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ref_course` (`code`, `name`) VALUES
('COE', 'Computer Engineering'),
('EK', 'Electronics and Communications Engineering'),
('IT', 'Information Technology');

CREATE TABLE `ref_curriculum` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `units` varchar(1) NOT NULL,
  `college` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(1) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `prerequisite/corequisite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ref_curriculum` (`id`, `title`, `code`, `units`, `college`, `course`, `year`, `sem`, `prerequisite/corequisite`) VALUES
(1, 'Advanced Business English with Fundamentals of Reasearch', 'ENG013', '3', 'CET', 'IT', '2', 'First', ''),
(2, 'Philippine Literature', 'ENG014', '3', 'CET', 'IT', '2', 'First', ''),
(3, 'Masining na Pagpapahayag', 'FIL013', '3', 'CET', 'IT', '2', 'First', ''),
(4, 'Andres Bonifacio and the Katipunan Movement', 'SOC015', '3', 'CET', 'IT', '2', 'First', ''),
(5, 'Basic and Applied Statistics', 'MATH013', '3', 'CET', 'IT', '2', 'First', ''),
(6, 'Arts Appreciation', 'HUM014', '3', 'CET', 'IT', '2', 'First', ''),
(7, 'Introduction to Programming', 'ACS211', '4', 'CET', 'IT', '2', 'First', ''),
(8, 'Physics for Computers', 'PHY011B', '5', 'CET', 'IT', '2', 'First', ''),
(9, 'Analytic Geometry', 'MTH014B', '3', 'CET', 'IT', '2', 'First', ''),
(10, 'Physical Education 3', 'PE013', '2', 'CET', 'IT', '2', 'First', ''),
(11, 'World Literature', 'ENG015', '3', 'CET', 'IT', '2', 'Second', ''),
(12, 'Speech and Oral Communication', 'ENG016', '3', 'CET', 'IT', '2', 'Second', ''),
(13, 'Multimedia Criticism', 'ENG017', '3', 'CET', 'IT', '2', 'Second', ''),
(14, 'Personal Financial Management', 'MAN011', '3', 'CET', 'IT', '2', 'Second', ''),
(15, 'Life, Works and Writings of Rizal', 'SOC016', '3', 'CET', 'IT', '2', 'Second', ''),
(16, 'Economics, taxation, Land Reform and Cooperatives', 'SOC017', '3', 'CET', 'IT', '2', 'Second', ''),
(17, 'Data Structure & Algorithm Analysis', 'ACS221', '3', 'CET', 'IT', '2', 'Second', ''),
(18, 'Business Communication', 'BCO101', '3', 'CET', 'IT', '2', 'Second', ''),
(19, 'Service Culture', 'ACS222', '3', 'CET', 'IT', '2', 'Second', ''),
(20, 'Digital & Logic Circuits', 'SCU101', '3', 'CET', 'IT', '2', 'Second', ''),
(21, 'Physical Fitness IV', 'PE014', '2', 'CET', 'IT', '2', 'Second', ''),
(23, 'Database Management Systems I', 'ACS221', '3', 'CET', 'IT', '2', 'Summer', ''),
(24, 'Interface Design and Vector Graphic using AUTOCAD', 'ACS224', '3', 'CET', 'IT', '2', 'Summer', ''),
(25, 'Web Programming/Basic Web Design', 'ACS225', '3', 'CET', 'IT', '2', 'Summer', ''),
(26, 'Data Communication & Basic Network Concepts', 'ACS311', '3', 'CET', 'IT', '3', 'First', ''),
(27, 'Database Management Systems 2', 'ACS312', '3', 'CET', 'IT', '3', 'First', ''),
(28, 'Multimedia Technology I', 'ACS313', '3', 'CET', 'IT', '3', 'First', ''),
(29, 'Object Oriented Programming', 'ACS314', '3', 'CET', 'IT', '3', 'First', ''),
(30, 'System Analysis & Design', 'ACS315', '3', 'CET', 'IT', '3', 'First', ''),
(31, 'Computer systems Organization & Assembly Language', 'ACS316', '3', 'CET', 'IT', '3', 'First', ''),
(32, 'Web Application Design I', 'ACS317', '3', 'CET', 'IT', '3', 'First', ''),
(33, 'Business Process I', 'BPO101', '3', 'CET', 'IT', '3', 'First', ''),
(34, 'Advanced Computer Networking', 'ACS321', '3', 'CET', 'IT', '3', 'Second', ''),
(35, 'Computer Architecture', 'BIT321', '3', 'CET', 'IT', '3', 'Second', ''),
(36, 'Project Management', 'BIT322', '3', 'CET', 'IT', '3', 'Second', ''),
(37, 'Web Application Design 2', 'ACS323', '3', 'CET', 'IT', '3', 'Second', ''),
(38, 'Multimedia Technology 2', 'BIT323', '3', 'CET', 'IT', '3', 'Second', ''),
(39, 'Business Process 2', 'BPO102', '3', 'CET', 'IT', '3', 'Second', ''),
(40, 'Principles of Critical Thinking', 'STH101', '3', 'CET', 'IT', '3', 'Second', ''),
(41, 'Network Technologies', 'BIT324', '3', 'CET', 'IT', '3', 'Second', ''),
(42, 'Microprocessor Systems', 'CPE444', '4', 'CET', 'IT', '4', 'First', 'BIT321'),
(43, 'E-Commerce', 'BIT311', '3', 'CET', 'IT', '4', 'First', 'BIT324,ACS323'),
(44, 'Operating Systems', 'CPE424B', '3', 'CET', 'IT', '4', 'First', 'BIT321'),
(45, 'Basic Accounting', 'ACS411', '3', 'CET', 'IT', '4', 'First', ''),
(46, 'Network Security and Management', 'BIT414', '3', 'CET', 'IT', '4', 'First', 'BIT324'),
(47, 'Software Engineering', 'CPE423', '3', 'CET', 'IT', '4', 'First', 'ACS314,ACS315,BIT322'),
(48, 'Internship 1', 'BIT416', '6', 'CET', 'IT', '4', 'First', ''),
(49, 'IT Trends & Ethics', 'BIT421', '4', 'CET', 'IT', '4', 'Second', ''),
(50, 'Software Development with Quality Assurance', 'BIT422', '3', 'CET', 'IT', '4', 'Second', 'CPE423,BIT414'),
(51, 'Management Information System', 'BIT423', '3', 'CET', 'IT', '4', 'Second', 'BIT414'),
(52, 'Technopreneurship', 'BIT424', '3', 'CET', 'IT', '4', 'Second', 'BPO102,BIT324'),
(53, 'Intership 2', 'BIT425', '6', 'CET', 'IT', '4', 'Second', 'BIT416'),
(54, 'Capstone Project', 'BIT426', '3', 'CET', 'IT', '4', 'Second', '');

CREATE TABLE `ref_section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ref_section` (`id`, `name`) VALUES
(1, 'IT11'),
(2, 'IT12'),
(3, 'IT21'),
(4, 'IT22'),
(5, 'IT31'),
(6, 'IT32'),
(7, 'IT41'),
(8, 'IT42');

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `semester` (`id`, `name`, `active`) VALUES
(1, 'SY2014-2015 First Semester', 0),
(2, 'SY2014-2015 Second Semester', 0),
(3, 'SY2015-2016 First Semester', 0),
(4, 'SY2015-2016 Second Semester', 0),
(5, 'SY2015-2016 Summer', 0),
(6, 'SY2016-2017 First Semester', 0),
(7, 'SY2016-2017 Second Semester', 1),
(8, 'SY2017-2018 First Semester', 0),
(9, 'SY2017-2018 Second Semester', 0);

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
(4, 'faculty_eval', '1', 0, '01/01/2018 00:00:00', '01/08/2018 24:00:00'),
(5, 'faculty_eval', '2', 0, '01/09/2018 00:00:00', '01/09/2018 24:00:00'),
(6, 'faculty_eval', '2', 0, '01/09/2018 00:00:00', '01/09/2018 24:00:00'),
(7, 'faculty_eval', '2', 0, '01/13/2018 00:00:00', '01/13/2018 24:00:00'),
(8, 'faculty_eval', '1', 0, '01/13/2018 00:00:00', '01/13/2018 24:00:00'),
(9, 'enroll', '8', 0, '01/13/2018 00:00:00', '01/30/2018 24:00:00'),
(12, 'enroll', '9', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(13, 'faculty_eval', '9', 1, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(14, 'enroll', '9', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(15, 'enroll', '9', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(16, 'enroll', '9', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(17, 'enroll', '8', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(18, 'enroll', '7', 0, '01/14/2018 00:00:00', '01/14/2018 24:00:00'),
(19, 'enroll', '9', 1, '01/14/2018 00:00:00', '01/14/2018 24:00:00');

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `usertype` varchar(1) NOT NULL,
  `college` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `usertype`, `college`, `course`, `user_ID`) VALUES
(1, '1student', 'password', 'Monkey', 'D.', 'Luffy', '1', 'CET', 'IT', '14-UC-01-0001-63'),
(2, '1faculty', 'password', 'Silvers', '', 'Rayleigh', '2', 'CET', '', ''),
(3, '2faculty', 'password', 'Jinbe', '', '', '2', 'CET', '', ''),
(4, '2student', 'password', 'Vinsmoke', '', 'Sanji', '1', 'CET', 'IT', ''),
(5, 'admin', '12345', 'Eiichiro', '', 'Oda', '5', '', '', ''),
(6, '3student', 'password', 'Roronoa', '', 'Zoro', '1', 'CET', 'IT', ''),
(7, '4student', 'password', 'Nico', '', 'Robin', '1', 'CET', 'IT', '');


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

ALTER TABLE `ref_course`
  ADD UNIQUE KEY `code` (`code`);

ALTER TABLE `ref_curriculum`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ref_section`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `ref_curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

ALTER TABLE `ref_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
