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
(1, 'Data Communication & Basic Network Concepts', 'ACS 311', '3', '', '', '2', '', '1'),
(2, 'Database Management Systems 2', 'ACS 312', '3', '', '', '3', '', '1'),
(3, 'Multimedia Technology I', 'ACS 313', '3', '', '', '2', '', '1'),
(4, 'Object Oriented Programming', 'ACS 314', '3', '', '', '3', '', '1');

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
(4, '1', '4', '1', '', '', '', '', '');

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'SY2017-2018 First Semester');

CREATE TABLE `status` (
  `name` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`name`, `sem_id`, `active`) VALUES
('faculty_eval', '1', 0);

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `usertype` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `usertype`) VALUES
(1, '1student', 'password', 'Monkey', 'D.', 'Luffy', '1'),
(2, '1faculty', 'password', 'Silvers', '', 'Rayleigh', '2'),
(3, '2faculty', 'password', 'Jinbe', '', '', '2'),
(4, '2student', 'password', 'Vinsmoke', '', 'Sanji', '1');


ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `course_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
