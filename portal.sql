-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 09:07 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

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
  `sem_id` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `code`, `unit`, `schedule`, `room`, `instructor`, `section_id`, `sem_id`, `college`) VALUES
(1, 'Data Communication & Basic Network Concepts', 'ACS311', '3', 'MTh | 7:00-8:30', '301', '', '5', '8', 'CET'),
(2, 'Database Management Systems 2', 'ACS312', '3', 'MTh | 8:30-10:00', '301', '', '5', '8', 'CET'),
(3, 'Multimedia Technology I', 'ACS313', '3', 'MTh | 10:00-11:30', '301', '', '5', '8', 'CET'),
(4, 'Object Oriented Programming', 'ACS314', '3', 'MTh | 1:00-2:30', '303', '', '5', '8', 'CET'),
(5, 'System Analysis & Design', 'ACS315', '3', 'WS | 7:00-8:30', '302', '', '5', '8', 'CET'),
(6, 'Computer systems Organization & Assembly Language', 'ACS316', '3', 'WS | 8:30-10:00', '302', '', '5', '8', 'CET'),
(7, 'Web Application Design I', 'ACS317', '3', 'WS | 10:00-11:30', '302', '', '5', '8', 'CET'),
(8, 'Business Process I', 'BPO101', '3', 'WS | 1:00-2:30', '303', '', '5', '8', 'CET'),
(9, 'Advanced Computer Networking', 'ACS321', '3', '', '', '', '5', '9', 'CET'),
(10, 'Computer Architecture', 'BIT321', '3', '', '', '', '5', '9', 'CET'),
(11, 'Project Management', 'BIT322', '3', '', '', '', '5', '9', 'CET'),
(12, 'Web Application Design 2', 'ACS323', '3', '', '', '', '5', '9', 'CET'),
(13, 'Multimedia Technology 2', 'BIT323', '3', '', '', '', '5', '9', 'CET'),
(14, 'Business Process 2', 'BPO102', '3', '', '', '', '5', '9', 'CET'),
(15, 'Principles of Critical Thinking', 'STH101', '3', '', '', '', '5', '9', 'CET'),
(16, 'Network Technologies', 'BIT324', '3', '', '', '', '5', '9', 'CET'),
(17, 'Microprocessor Systems', 'CPE444', '4', 'WS | 1:30-4:30', '402', '', '7', '8', 'CET'),
(18, 'E-Commerce', 'BIT311', '3', 'WS | 6:00-8:30', '301', '', '7', '8', 'CET'),
(19, 'Operating Systems', 'CPE424B', '3', 'MTh | 9:30-12:00', '302', '', '7', '8', 'CET'),
(20, 'Basic Accounting', 'ACS411', '3', 'MTh | 12:00-1:30', 'CAE', '', '7', '8', 'CET'),
(21, 'Network Security and Management', 'BIT414', '3', 'WS | 4:30-6:00', '304', '', '7', '8', 'CET'),
(22, 'Software Engineering', 'CPE423', '3', 'MTh | 7:00-8:30', '305', '', '7', '8', 'CET'),
(23, 'Internship 1', 'BIT416', '6', 'TF | 7:00-10:00', '307', '', '7', '8', 'CET'),
(24, 'Data Communication & Basic Network Concepts', 'ACS311', '3', 'TF | 7:00-8:30', '301', '', '6', '8', 'CET'),
(25, 'Database Management Systems 2', 'ACS312', '3', 'TF | 8:30-10:00', '301', '', '6', '8', 'CET'),
(26, 'Multimedia Technology I', 'ACS313', '3', 'TF | 10:00-11:30', '301', '', '6', '8', 'CET'),
(27, 'Object Oriented Programming', 'ACS314', '3', 'TF | 1:00-2:30', '304', '', '6', '8', 'CET'),
(28, 'System Analysis & Design', 'ACS315', '3', 'WS | 1:00-2:30', '302', '', '6', '8', 'CET'),
(29, 'Computer systems Organization & Assembly Language', 'ACS316', '3', 'WS | 2:30-4:00', '302', '', '6', '8', 'CET'),
(30, 'Web Application Design I', 'ACS317', '3', 'WS | 4:00-5:30', '302', '', '6', '8', 'CET'),
(31, 'Business Process I', 'BPO101', '3', 'WS | 5:30-7:00', '302', '', '6', '8', 'CET'),
(32, 'Advanced Computer Networking', 'ACS321', '3', '', '', '', '6', '9', 'CET'),
(33, 'Computer Architecture', 'BIT321', '3', '', '', '', '6', '9', 'CET'),
(34, 'Project Management', 'BIT322', '3', '', '', '', '6', '9', 'CET'),
(35, 'Web Application Design 2', 'ACS323', '3', '', '', '', '6', '9', 'CET'),
(36, 'Multimedia Technology 2', 'BIT323', '3', '', '', '', '6', '9', 'CET'),
(37, 'Business Process 2', 'BPO102', '3', '', '', '', '6', '9', 'CET'),
(38, 'Principles of Critical Thinking', 'STH101', '3', '', '', '', '6', '9', 'CET'),
(39, 'Network Technologies', 'BIT324', '3', '', '', '', '6', '9', 'CET'),
(40, 'Advanced Business English with Fundamentals of Reasearch', 'ENG013\r\n', '3', 'MTh | 7:00-8:30', '306', '47', '3', '8', 'CET'),
(41, 'Philippine Literature', 'ENG014\r\n', '3', 'MTh | 8:30-10:00', '306', '48', '3', '8', 'CET'),
(42, 'Masining na Pagpapahayag', 'FIL013\r\n', '3', 'MTh | 10:00-11:30', '306', '49', '3', '8', 'CET'),
(43, 'Advanced Business English with Fundamentals of Reasearch', 'ENG013\r\n', '3', 'TF | 7:00-8:30', '305', '47', '4', '8', 'CET'),
(44, 'Philippine Literature', 'ENG014\r\n', '3', 'TF | 8:30-10:00', '305', '48', '4', '8', 'CET'),
(45, 'Masining na Pagpapahayag', 'FIL013\r\n', '3', 'TF | 10:00-11:30', '305', '49', '4', '8', 'CET'),
(46, 'Microprocessor Systems', 'CPE444', '4', 'TF 7:00-10:00', '401', '', '8', '8', 'CET'),
(47, 'E-Commerce', 'BIT311', '3', 'MTh 6:30-9:00', '303', '', '8', '8', 'CET'),
(48, 'Operating Systems', 'CPE424B', '3', 'W 7:00-12:00', '302', '', '8', '8', 'CET'),
(49, 'Basic Accounting', 'ACS411', '3', 'MTh 3:00-4:30', '302', '', '8', '8', 'CET'),
(50, 'Network Security and Management', 'BIT414', '3', 'F 10:00-1:00', '306', '', '8', '8', 'CET'),
(51, 'Software Engineering', 'CPE423', '3', 'MTh 7:00-8:30', '305', '', '8', '8', 'CET'),
(52, 'Internship 1', 'BIT416', '6', 'F 1:00-4:00', '306', '', '8', '8', 'CET'),
(53, 'Data Communication & Basic Network Concepts', 'ACS311', '3', 'MTh | 1:00-2:30', '403', '', '9', '8', 'CET'),
(54, 'Database Management Systems 2', 'ACS312', '3', 'MTh | 2:30-4:00', '403', '', '9', '8', 'CET'),
(55, 'Multimedia Technology I', 'ACS313', '3', 'MTh | 4:00-5:30', '403', '', '9', '8', 'CET'),
(56, 'Object Oriented Programming', 'ACS314', '3', 'MTh | 5:30-7:00', '403', '', '9', '8', 'CET'),
(57, 'System Analysis & Design', 'ACS315', '3', 'T | 7:00-10:00', '303', '', '9', '8', 'CET'),
(58, 'Computer systems Organization & Assembly Language', 'ACS316', '3', 'T | 10:00-1:00', '304', '', '9', '8', 'CET'),
(59, 'Web Application Design I', 'ACS317', '3', 'F | 7:00-10:00', '303', '', '9', '8', 'CET'),
(60, 'Business Process I', 'BPO101', '3', 'F | 10:00-1:00', '304', '', '9', '8', 'CET');

-- --------------------------------------------------------

--
-- Table structure for table `course_log`
--

CREATE TABLE `course_log` (
  `id` int(11) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `course` text NOT NULL,
  `student` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_log`
--

INSERT INTO `course_log` (`id`, `sem_id`, `course`, `student`, `section_id`) VALUES
(1, '8', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"87\"},{\"course\":\"3\",\"grade\":\"95\"},{\"course\":\"4\",\"grade\":\"94\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"89\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"92\"}]', '90', '5'),
(2, '9', '[{\"course\":\"9\",\"grade\":\"94\"},{\"course\":\"10\",\"grade\":\"70\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"98\"},{\"course\":\"13\",\"grade\":\"82\"},{\"course\":\"14\",\"grade\":\"83\"},{\"course\":\"15\",\"grade\":\"91\"},{\"course\":\"16\",\"grade\":\"96\"}]', '1', '5'),
(6, '8', '[{\"course\":\"1\",\"grade\":\"98\"},{\"course\":\"2\",\"grade\":\"85\"},{\"course\":\"3\",\"grade\":\"75\"},{\"course\":\"4\",\"grade\":\"92\"},{\"course\":\"5\",\"grade\":\"87\"},{\"course\":\"6\",\"grade\":\"83\"},{\"course\":\"7\",\"grade\":\"82\"},{\"course\":\"8\",\"grade\":\"84\"}]', '91', '5'),
(7, '8', '[{\"course\":\"1\",\"grade\":\"79\"},{\"course\":\"2\",\"grade\":\"79\"},{\"course\":\"3\",\"grade\":\"86\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"96\"},{\"course\":\"6\",\"grade\":\"93\"},{\"course\":\"7\",\"grade\":\"83\"},{\"course\":\"8\",\"grade\":\"83\"}]', '92', '5'),
(8, '8', '[{\"course\":\"1\",\"grade\":\"83\"},{\"course\":\"2\",\"grade\":\"85\"},{\"course\":\"3\",\"grade\":\"98\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"80\"},{\"course\":\"6\",\"grade\":\"95\"},{\"course\":\"7\",\"grade\":\"88\"},{\"course\":\"8\",\"grade\":\"77\"}]', '93', '5'),
(9, '8', '[{\"course\":\"1\",\"grade\":\"97\"},{\"course\":\"2\",\"grade\":\"90\"},{\"course\":\"3\",\"grade\":\"89\"},{\"course\":\"4\",\"grade\":\"85\"},{\"course\":\"5\",\"grade\":\"87\"},{\"course\":\"6\",\"grade\":\"93\"},{\"course\":\"7\",\"grade\":\"85\"},{\"course\":\"8\",\"grade\":\"86\"}]', '94', '5'),
(10, '8', '[{\"course\":\"1\",\"grade\":\"83\"},{\"course\":\"2\",\"grade\":\"75\"},{\"course\":\"3\",\"grade\":\"86\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"94\"},{\"course\":\"6\",\"grade\":\"99\"},{\"course\":\"7\",\"grade\":\"95\"},{\"course\":\"8\",\"grade\":\"80\"}]', '95', '5'),
(11, '8', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"88\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"96\"},{\"course\":\"5\",\"grade\":\"80\"},{\"course\":\"6\",\"grade\":\"79\"},{\"course\":\"7\",\"grade\":\"85\"},{\"course\":\"8\",\"grade\":\"79\"}]', '96', '5'),
(12, '8', '[{\"course\":\"1\",\"grade\":\"86\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"82\"},{\"course\":\"4\",\"grade\":\"95\"},{\"course\":\"5\",\"grade\":\"91\"},{\"course\":\"6\",\"grade\":\"79\"},{\"course\":\"7\",\"grade\":\"97\"},{\"course\":\"8\",\"grade\":\"75\"}]', '97', '5'),
(13, '8', '[{\"course\":\"1\",\"grade\":\"91\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"94\"},{\"course\":\"4\",\"grade\":\"88\"},{\"course\":\"5\",\"grade\":\"95\"},{\"course\":\"6\",\"grade\":\"90\"},{\"course\":\"7\",\"grade\":\"75\"},{\"course\":\"8\",\"grade\":\"89\"}]', '98', '5'),
(14, '8', '[{\"course\":\"1\",\"grade\":\"96\"},{\"course\":\"2\",\"grade\":\"93\"},{\"course\":\"3\",\"grade\":\"96\"},{\"course\":\"4\",\"grade\":\"97\"},{\"course\":\"5\",\"grade\":\"88\"},{\"course\":\"6\",\"grade\":\"80\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"86\"}]', '99', '5'),
(15, '8', '[{\"course\":\"1\",\"grade\":\"81\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"91\"},{\"course\":\"4\",\"grade\":\"82\"},{\"course\":\"5\",\"grade\":\"99\"},{\"course\":\"6\",\"grade\":\"84\"},{\"course\":\"7\",\"grade\":\"97\"},{\"course\":\"8\",\"grade\":\"94\"}]', '100', '5'),
(16, '8', '[{\"course\":\"1\",\"grade\":\"78\"},{\"course\":\"2\",\"grade\":\"92\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"93\"},{\"course\":\"5\",\"grade\":\"94\"},{\"course\":\"6\",\"grade\":\"88\"},{\"course\":\"7\",\"grade\":\"78\"},{\"course\":\"8\",\"grade\":\"89\"}]', '101', '5'),
(17, '8', '[{\"course\":\"1\",\"grade\":\"82\"},{\"course\":\"2\",\"grade\":\"98\"},{\"course\":\"3\",\"grade\":\"76\"},{\"course\":\"4\",\"grade\":\"76\"},{\"course\":\"5\",\"grade\":\"92\"},{\"course\":\"6\",\"grade\":\"87\"},{\"course\":\"7\",\"grade\":\"91\"},{\"course\":\"8\",\"grade\":\"89\"}]', '102', '5'),
(18, '8', '[{\"course\":\"1\",\"grade\":\"85\"},{\"course\":\"2\",\"grade\":\"82\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"98\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"98\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"88\"}]', '103', '5'),
(19, '8', '[{\"course\":\"1\",\"grade\":\"82\"},{\"course\":\"2\",\"grade\":\"88\"},{\"course\":\"3\",\"grade\":\"79\"},{\"course\":\"4\",\"grade\":\"79\"},{\"course\":\"5\",\"grade\":\"96\"},{\"course\":\"6\",\"grade\":\"92\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"80\"}]', '104', '5'),
(20, '8', '[{\"course\":\"1\",\"grade\":\"91\"},{\"course\":\"2\",\"grade\":\"86\"},{\"course\":\"3\",\"grade\":\"96\"},{\"course\":\"4\",\"grade\":\"87\"},{\"course\":\"5\",\"grade\":\"90\"},{\"course\":\"6\",\"grade\":\"86\"},{\"course\":\"7\",\"grade\":\"89\"},{\"course\":\"8\",\"grade\":\"83\"}]', '105', '5'),
(21, '8', '[{\"course\":\"1\",\"grade\":\"80\"},{\"course\":\"2\",\"grade\":\"84\"},{\"course\":\"3\",\"grade\":\"77\"},{\"course\":\"4\",\"grade\":\"89\"},{\"course\":\"5\",\"grade\":\"89\"},{\"course\":\"6\",\"grade\":\"97\"},{\"course\":\"7\",\"grade\":\"82\"},{\"course\":\"8\",\"grade\":\"85\"}]', '106', '5'),
(22, '8', '[{\"course\":\"1\",\"grade\":\"94\"},{\"course\":\"2\",\"grade\":\"81\"},{\"course\":\"3\",\"grade\":\"77\"},{\"course\":\"4\",\"grade\":\"80\"},{\"course\":\"5\",\"grade\":\"91\"},{\"course\":\"6\",\"grade\":\"88\"},{\"course\":\"7\",\"grade\":\"75\"},{\"course\":\"8\",\"grade\":\"92\"}]', '107', '5'),
(23, '8', '[{\"course\":\"1\",\"grade\":\"88\"},{\"course\":\"2\",\"grade\":\"78\"},{\"course\":\"3\",\"grade\":\"79\"},{\"course\":\"4\",\"grade\":\"76\"},{\"course\":\"5\",\"grade\":\"82\"},{\"course\":\"6\",\"grade\":\"77\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"76\"}]', '108', '5'),
(24, '8', '[{\"course\":\"1\",\"grade\":\"81\"},{\"course\":\"2\",\"grade\":\"94\"},{\"course\":\"3\",\"grade\":\"80\"},{\"course\":\"4\",\"grade\":\"96\"},{\"course\":\"5\",\"grade\":\"81\"},{\"course\":\"6\",\"grade\":\"80\"},{\"course\":\"7\",\"grade\":\"92\"},{\"course\":\"8\",\"grade\":\"79\"}]', '109', '5'),
(25, '8', '[{\"course\":\"24\",\"grade\":\"81\"},{\"course\":\"25\",\"grade\":\"95\"},{\"course\":\"26\",\"grade\":\"85\"},{\"course\":\"27\",\"grade\":\"82\"},{\"course\":\"28\",\"grade\":\"88\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"76\"},{\"course\":\"31\",\"grade\":\"93\"}]', '110', '6'),
(26, '8', '[{\"course\":\"24\",\"grade\":\"87\"},{\"course\":\"25\",\"grade\":\"85\"},{\"course\":\"26\",\"grade\":\"81\"},{\"course\":\"27\",\"grade\":\"75\"},{\"course\":\"28\",\"grade\":\"80\"},{\"course\":\"29\",\"grade\":\"92\"},{\"course\":\"30\",\"grade\":\"94\"},{\"course\":\"31\",\"grade\":\"77\"}]', '111', '6'),
(27, '8', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"76\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"86\"},{\"course\":\"28\",\"grade\":\"94\"},{\"course\":\"29\",\"grade\":\"94\"},{\"course\":\"30\",\"grade\":\"95\"},{\"course\":\"31\",\"grade\":\"76\"}]', '112', '6'),
(28, '8', '[{\"course\":\"24\",\"grade\":\"83\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"87\"},{\"course\":\"27\",\"grade\":\"84\"},{\"course\":\"28\",\"grade\":\"75\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"98\"},{\"course\":\"31\",\"grade\":\"84\"}]', '113', '6'),
(29, '8', '[{\"course\":\"24\",\"grade\":\"85\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"86\"},{\"course\":\"27\",\"grade\":\"88\"},{\"course\":\"28\",\"grade\":\"90\"},{\"course\":\"29\",\"grade\":\"93\"},{\"course\":\"30\",\"grade\":\"97\"},{\"course\":\"31\",\"grade\":\"95\"}]', '114', '6'),
(30, '8', '[{\"course\":\"24\",\"grade\":\"81\"},{\"course\":\"25\",\"grade\":\"96\"},{\"course\":\"26\",\"grade\":\"90\"},{\"course\":\"27\",\"grade\":\"92\"},{\"course\":\"28\",\"grade\":\"85\"},{\"course\":\"29\",\"grade\":\"77\"},{\"course\":\"30\",\"grade\":\"86\"},{\"course\":\"31\",\"grade\":\"78\"}]', '115', '6'),
(31, '8', '[{\"course\":\"24\",\"grade\":\"91\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"93\"},{\"course\":\"27\",\"grade\":\"90\"},{\"course\":\"28\",\"grade\":\"76\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"83\"},{\"course\":\"31\",\"grade\":\"76\"}]', '116', '6'),
(32, '8', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"84\"},{\"course\":\"26\",\"grade\":\"89\"},{\"course\":\"27\",\"grade\":\"75\"},{\"course\":\"28\",\"grade\":\"84\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"82\"},{\"course\":\"31\",\"grade\":\"84\"}]', '117', '6'),
(33, '8', '[{\"course\":\"24\",\"grade\":\"99\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"96\"},{\"course\":\"27\",\"grade\":\"91\"},{\"course\":\"28\",\"grade\":\"77\"},{\"course\":\"29\",\"grade\":\"94\"},{\"course\":\"30\",\"grade\":\"77\"},{\"course\":\"31\",\"grade\":\"94\"}]', '118', '6'),
(34, '8', '[{\"course\":\"24\",\"grade\":\"85\"},{\"course\":\"25\",\"grade\":\"78\"},{\"course\":\"26\",\"grade\":\"84\"},{\"course\":\"27\",\"grade\":\"81\"},{\"course\":\"28\",\"grade\":\"99\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"87\"},{\"course\":\"31\",\"grade\":\"76\"}]', '119', '6'),
(35, '8', '[{\"course\":\"24\",\"grade\":\"84\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"91\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"97\"},{\"course\":\"30\",\"grade\":\"80\"},{\"course\":\"31\",\"grade\":\"99\"}]', '120', '6'),
(36, '8', '[{\"course\":\"24\",\"grade\":\"90\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"87\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"77\"},{\"course\":\"30\",\"grade\":\"76\"},{\"course\":\"31\",\"grade\":\"81\"}]', '121', '6'),
(37, '8', '[{\"course\":\"24\",\"grade\":\"96\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"91\"},{\"course\":\"27\",\"grade\":\"90\"},{\"course\":\"28\",\"grade\":\"98\"},{\"course\":\"29\",\"grade\":\"93\"},{\"course\":\"30\",\"grade\":\"92\"},{\"course\":\"31\",\"grade\":\"90\"}]', '122', '6'),
(38, '8', '[{\"course\":\"24\",\"grade\":\"97\"},{\"course\":\"25\",\"grade\":\"82\"},{\"course\":\"26\",\"grade\":\"87\"},{\"course\":\"27\",\"grade\":\"93\"},{\"course\":\"28\",\"grade\":\"97\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"98\"},{\"course\":\"31\",\"grade\":\"96\"}]', '123', '6'),
(39, '8', '[{\"course\":\"24\",\"grade\":\"86\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"82\"},{\"course\":\"27\",\"grade\":\"89\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"81\"},{\"course\":\"30\",\"grade\":\"87\"},{\"course\":\"31\",\"grade\":\"93\"}]', '124', '6'),
(40, '8', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"93\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"97\"},{\"course\":\"28\",\"grade\":\"81\"},{\"course\":\"29\",\"grade\":\"92\"},{\"course\":\"30\",\"grade\":\"78\"},{\"course\":\"31\",\"grade\":\"99\"}]', '125', '6'),
(41, '8', '[{\"course\":\"24\",\"grade\":\"79\"},{\"course\":\"25\",\"grade\":\"97\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"86\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"91\"},{\"course\":\"31\",\"grade\":\"83\"}]', '126', '6'),
(42, '8', '[{\"course\":\"24\",\"grade\":\"95\"},{\"course\":\"25\",\"grade\":\"83\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"76\"},{\"course\":\"28\",\"grade\":\"80\"},{\"course\":\"29\",\"grade\":\"89\"},{\"course\":\"30\",\"grade\":\"93\"},{\"course\":\"31\",\"grade\":\"88\"}]', '127', '6'),
(43, '8', '[{\"course\":\"24\",\"grade\":\"98\"},{\"course\":\"25\",\"grade\":\"96\"},{\"course\":\"26\",\"grade\":\"78\"},{\"course\":\"27\",\"grade\":\"83\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"87\"},{\"course\":\"30\",\"grade\":\"78\"},{\"course\":\"31\",\"grade\":\"84\"}]', '128', '6'),
(44, '8', '[{\"course\":\"24\",\"grade\":\"84\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"78\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"78\"},{\"course\":\"30\",\"grade\":\"90\"},{\"course\":\"31\",\"grade\":\"89\"}]', '129', '6'),
(45, '9', '[{\"course\":\"9\",\"grade\":\"80\"},{\"course\":\"10\",\"grade\":\"82\"},{\"course\":\"11\",\"grade\":\"84\"},{\"course\":\"12\",\"grade\":\"81\"},{\"course\":\"13\",\"grade\":\"76\"},{\"course\":\"14\",\"grade\":\"78\"},{\"course\":\"15\",\"grade\":\"75\"},{\"course\":\"16\",\"grade\":\"80\"}]', '4', '5'),
(46, '9', '[{\"course\":\"9\",\"grade\":\"83\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"76\"},{\"course\":\"12\",\"grade\":\"87\"},{\"course\":\"13\",\"grade\":\"89\"},{\"course\":\"14\",\"grade\":\"98\"},{\"course\":\"15\",\"grade\":\"88\"},{\"course\":\"16\",\"grade\":\"87\"}]', '6', '5'),
(47, '9', '[{\"course\":\"9\",\"grade\":\"84\"},{\"course\":\"10\",\"grade\":\"95\"},{\"course\":\"11\",\"grade\":\"98\"},{\"course\":\"12\",\"grade\":\"87\"},{\"course\":\"13\",\"grade\":\"84\"},{\"course\":\"14\",\"grade\":\"75\"},{\"course\":\"15\",\"grade\":\"93\"},{\"course\":\"16\",\"grade\":\"88\"}]', '7', '5'),
(48, '9', '[{\"course\":\"9\",\"grade\":\"88\"},{\"course\":\"10\",\"grade\":\"94\"},{\"course\":\"11\",\"grade\":\"95\"},{\"course\":\"12\",\"grade\":\"88\"},{\"course\":\"13\",\"grade\":\"89\"},{\"course\":\"14\",\"grade\":\"80\"},{\"course\":\"15\",\"grade\":\"92\"},{\"course\":\"16\",\"grade\":\"96\"}]', '9', '5'),
(49, '9', '[{\"course\":\"9\",\"grade\":\"76\"},{\"course\":\"10\",\"grade\":\"84\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"80\"},{\"course\":\"13\",\"grade\":\"78\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"92\"},{\"course\":\"16\",\"grade\":\"79\"}]', '10', '5'),
(50, '9', '[{\"course\":\"9\",\"grade\":\"90\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"81\"},{\"course\":\"12\",\"grade\":\"95\"},{\"course\":\"13\",\"grade\":\"90\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"82\"},{\"course\":\"16\",\"grade\":\"94\"}]', '11', '5'),
(51, '9', '[{\"course\":\"9\",\"grade\":\"99\"},{\"course\":\"10\",\"grade\":\"80\"},{\"course\":\"11\",\"grade\":\"83\"},{\"course\":\"12\",\"grade\":\"77\"},{\"course\":\"13\",\"grade\":\"95\"},{\"course\":\"14\",\"grade\":\"98\"},{\"course\":\"15\",\"grade\":\"82\"},{\"course\":\"16\",\"grade\":\"84\"}]', '12', '5'),
(52, '9', '[{\"course\":\"9\",\"grade\":\"96\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"93\"},{\"course\":\"13\",\"grade\":\"85\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"94\"}]', '13', '5'),
(53, '9', '[{\"course\":\"9\",\"grade\":\"77\"},{\"course\":\"10\",\"grade\":\"97\"},{\"course\":\"11\",\"grade\":\"99\"},{\"course\":\"12\",\"grade\":\"88\"},{\"course\":\"13\",\"grade\":\"79\"},{\"course\":\"14\",\"grade\":\"99\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"91\"}]', '14', '5'),
(54, '9', '[{\"course\":\"9\",\"grade\":\"84\"},{\"course\":\"10\",\"grade\":\"95\"},{\"course\":\"11\",\"grade\":\"75\"},{\"course\":\"12\",\"grade\":\"81\"},{\"course\":\"13\",\"grade\":\"97\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"98\"},{\"course\":\"16\",\"grade\":\"96\"}]', '15', '5'),
(55, '9', '[{\"course\":\"9\",\"grade\":\"86\"},{\"course\":\"10\",\"grade\":\"85\"},{\"course\":\"11\",\"grade\":\"89\"},{\"course\":\"12\",\"grade\":\"89\"},{\"course\":\"13\",\"grade\":\"81\"},{\"course\":\"14\",\"grade\":\"85\"},{\"course\":\"15\",\"grade\":\"97\"},{\"course\":\"16\",\"grade\":\"76\"}]', '16', '5'),
(56, '9', '[{\"course\":\"9\",\"grade\":\"77\"},{\"course\":\"10\",\"grade\":\"87\"},{\"course\":\"11\",\"grade\":\"84\"},{\"course\":\"12\",\"grade\":\"83\"},{\"course\":\"13\",\"grade\":\"77\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"99\"},{\"course\":\"16\",\"grade\":\"75\"}]', '17', '5'),
(57, '9', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"94\"},{\"course\":\"11\",\"grade\":\"79\"},{\"course\":\"12\",\"grade\":\"80\"},{\"course\":\"13\",\"grade\":\"77\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"97\"},{\"course\":\"16\",\"grade\":\"88\"}]', '18', '5'),
(58, '9', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"92\"},{\"course\":\"12\",\"grade\":\"75\"},{\"course\":\"13\",\"grade\":\"75\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"86\"},{\"course\":\"16\",\"grade\":\"82\"}]', '19', '5'),
(59, '9', '[{\"course\":\"9\",\"grade\":\"95\"},{\"course\":\"10\",\"grade\":\"99\"},{\"course\":\"11\",\"grade\":\"92\"},{\"course\":\"12\",\"grade\":\"86\"},{\"course\":\"13\",\"grade\":\"90\"},{\"course\":\"14\",\"grade\":\"81\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"77\"}]', '20', '5'),
(60, '9', '[{\"course\":\"9\",\"grade\":\"78\"},{\"course\":\"10\",\"grade\":\"85\"},{\"course\":\"11\",\"grade\":\"99\"},{\"course\":\"12\",\"grade\":\"82\"},{\"course\":\"13\",\"grade\":\"91\"},{\"course\":\"14\",\"grade\":\"80\"},{\"course\":\"15\",\"grade\":\"85\"},{\"course\":\"16\",\"grade\":\"91\"}]', '21', '5'),
(61, '9', '[{\"course\":\"9\",\"grade\":\"95\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"80\"},{\"course\":\"12\",\"grade\":\"82\"},{\"course\":\"13\",\"grade\":\"96\"},{\"course\":\"14\",\"grade\":\"93\"},{\"course\":\"15\",\"grade\":\"83\"},{\"course\":\"16\",\"grade\":\"93\"}]', '22', '5'),
(62, '9', '[{\"course\":\"9\",\"grade\":\"88\"},{\"course\":\"10\",\"grade\":\"90\"},{\"course\":\"11\",\"grade\":\"80\"},{\"course\":\"12\",\"grade\":\"79\"},{\"course\":\"13\",\"grade\":\"75\"},{\"course\":\"14\",\"grade\":\"89\"},{\"course\":\"15\",\"grade\":\"96\"},{\"course\":\"16\",\"grade\":\"77\"}]', '23', '5'),
(63, '9', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"93\"},{\"course\":\"12\",\"grade\":\"92\"},{\"course\":\"13\",\"grade\":\"95\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"94\"},{\"course\":\"16\",\"grade\":\"87\"}]', '24', '5'),
(64, '8', '[{\"course\":\"32\",\"grade\":\"91\"},{\"course\":\"33\",\"grade\":\"75\"},{\"course\":\"34\",\"grade\":\"93\"},{\"course\":\"35\",\"grade\":\"76\"},{\"course\":\"36\",\"grade\":\"77\"},{\"course\":\"37\",\"grade\":\"90\"},{\"course\":\"38\",\"grade\":\"80\"},{\"course\":\"39\",\"grade\":\"81\"}]', '25', '6'),
(65, '8', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"92\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"83\"},{\"course\":\"36\",\"grade\":\"93\"},{\"course\":\"37\",\"grade\":\"83\"},{\"course\":\"38\",\"grade\":\"90\"},{\"course\":\"39\",\"grade\":\"76\"}]', '26', '6'),
(66, '8', '[{\"course\":\"32\",\"grade\":\"84\"},{\"course\":\"33\",\"grade\":\"78\"},{\"course\":\"34\",\"grade\":\"87\"},{\"course\":\"35\",\"grade\":\"95\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"80\"},{\"course\":\"39\",\"grade\":\"86\"}]', '27', '6'),
(67, '8', '[{\"course\":\"32\",\"grade\":\"91\"},{\"course\":\"33\",\"grade\":\"77\"},{\"course\":\"34\",\"grade\":\"89\"},{\"course\":\"35\",\"grade\":\"82\"},{\"course\":\"36\",\"grade\":\"93\"},{\"course\":\"37\",\"grade\":\"98\"},{\"course\":\"38\",\"grade\":\"93\"},{\"course\":\"39\",\"grade\":\"79\"}]', '28', '6'),
(68, '8', '[{\"course\":\"32\",\"grade\":\"89\"},{\"course\":\"33\",\"grade\":\"83\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"87\"},{\"course\":\"36\",\"grade\":\"90\"},{\"course\":\"37\",\"grade\":\"83\"},{\"course\":\"38\",\"grade\":\"98\"},{\"course\":\"39\",\"grade\":\"75\"}]', '29', '6'),
(69, '8', '[{\"course\":\"32\",\"grade\":\"95\"},{\"course\":\"33\",\"grade\":\"89\"},{\"course\":\"34\",\"grade\":\"97\"},{\"course\":\"35\",\"grade\":\"77\"},{\"course\":\"36\",\"grade\":\"92\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"89\"},{\"course\":\"39\",\"grade\":\"91\"}]', '30', '6'),
(70, '8', '[{\"course\":\"32\",\"grade\":\"80\"},{\"course\":\"33\",\"grade\":\"90\"},{\"course\":\"34\",\"grade\":\"91\"},{\"course\":\"35\",\"grade\":\"99\"},{\"course\":\"36\",\"grade\":\"95\"},{\"course\":\"37\",\"grade\":\"77\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"97\"}]', '31', '6'),
(71, '8', '[{\"course\":\"32\",\"grade\":\"86\"},{\"course\":\"33\",\"grade\":\"79\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"94\"},{\"course\":\"36\",\"grade\":\"91\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"77\"},{\"course\":\"39\",\"grade\":\"86\"}]', '32', '6'),
(72, '8', '[{\"course\":\"32\",\"grade\":\"83\"},{\"course\":\"33\",\"grade\":\"75\"},{\"course\":\"34\",\"grade\":\"76\"},{\"course\":\"35\",\"grade\":\"82\"},{\"course\":\"36\",\"grade\":\"99\"},{\"course\":\"37\",\"grade\":\"86\"},{\"course\":\"38\",\"grade\":\"88\"},{\"course\":\"39\",\"grade\":\"78\"}]', '33', '6'),
(73, '8', '[{\"course\":\"32\",\"grade\":\"89\"},{\"course\":\"33\",\"grade\":\"97\"},{\"course\":\"34\",\"grade\":\"80\"},{\"course\":\"35\",\"grade\":\"81\"},{\"course\":\"36\",\"grade\":\"89\"},{\"course\":\"37\",\"grade\":\"84\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"90\"}]', '34', '6'),
(74, '8', '[{\"course\":\"32\",\"grade\":\"98\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"92\"},{\"course\":\"35\",\"grade\":\"86\"},{\"course\":\"36\",\"grade\":\"78\"},{\"course\":\"37\",\"grade\":\"85\"},{\"course\":\"38\",\"grade\":\"85\"},{\"course\":\"39\",\"grade\":\"92\"}]', '35', '6'),
(75, '8', '[{\"course\":\"32\",\"grade\":\"78\"},{\"course\":\"33\",\"grade\":\"91\"},{\"course\":\"34\",\"grade\":\"80\"},{\"course\":\"35\",\"grade\":\"90\"},{\"course\":\"36\",\"grade\":\"86\"},{\"course\":\"37\",\"grade\":\"84\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"77\"}]', '36', '6'),
(76, '8', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"77\"},{\"course\":\"34\",\"grade\":\"88\"},{\"course\":\"35\",\"grade\":\"87\"},{\"course\":\"36\",\"grade\":\"81\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"99\"},{\"course\":\"39\",\"grade\":\"90\"}]', '37', '6'),
(77, '8', '[{\"course\":\"32\",\"grade\":\"79\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"85\"},{\"course\":\"35\",\"grade\":\"95\"},{\"course\":\"36\",\"grade\":\"82\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"76\"},{\"course\":\"39\",\"grade\":\"98\"}]', '38', '6'),
(78, '8', '[{\"course\":\"32\",\"grade\":\"87\"},{\"course\":\"33\",\"grade\":\"94\"},{\"course\":\"34\",\"grade\":\"90\"},{\"course\":\"35\",\"grade\":\"83\"},{\"course\":\"36\",\"grade\":\"83\"},{\"course\":\"37\",\"grade\":\"77\"},{\"course\":\"38\",\"grade\":\"82\"},{\"course\":\"39\",\"grade\":\"96\"}]', '39', '6'),
(79, '8', '[{\"course\":\"32\",\"grade\":\"92\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"96\"},{\"course\":\"35\",\"grade\":\"96\"},{\"course\":\"36\",\"grade\":\"77\"},{\"course\":\"37\",\"grade\":\"78\"},{\"course\":\"38\",\"grade\":\"87\"},{\"course\":\"39\",\"grade\":\"78\"}]', '40', '6'),
(80, '8', '[{\"course\":\"32\",\"grade\":\"87\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"97\"},{\"course\":\"35\",\"grade\":\"76\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"95\"},{\"course\":\"38\",\"grade\":\"83\"},{\"course\":\"39\",\"grade\":\"86\"}]', '41', '6'),
(81, '8', '[{\"course\":\"32\",\"grade\":\"92\"},{\"course\":\"33\",\"grade\":\"89\"},{\"course\":\"34\",\"grade\":\"87\"},{\"course\":\"35\",\"grade\":\"93\"},{\"course\":\"36\",\"grade\":\"97\"},{\"course\":\"37\",\"grade\":\"98\"},{\"course\":\"38\",\"grade\":\"90\"},{\"course\":\"39\",\"grade\":\"91\"}]', '42', '6'),
(82, '8', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"85\"},{\"course\":\"34\",\"grade\":\"85\"},{\"course\":\"35\",\"grade\":\"90\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"77\"},{\"course\":\"39\",\"grade\":\"85\"}]', '43', '6'),
(83, '8', '[{\"course\":\"32\",\"grade\":\"78\"},{\"course\":\"33\",\"grade\":\"94\"},{\"course\":\"34\",\"grade\":\"84\"},{\"course\":\"35\",\"grade\":\"86\"},{\"course\":\"36\",\"grade\":\"91\"},{\"course\":\"37\",\"grade\":\"82\"},{\"course\":\"38\",\"grade\":\"87\"},{\"course\":\"39\",\"grade\":\"87\"}]', '44', '6'),
(85, '8', '[{\"course\":\"40\",\"grade\":\"76\"},{\"course\":\"41\",\"grade\":\"87\"},{\"course\":\"42\",\"grade\":\"94\"}]', '50', '3'),
(86, '8', '[{\"course\":\"40\",\"grade\":\"79\"},{\"course\":\"41\",\"grade\":\"80\"},{\"course\":\"42\",\"grade\":\"94\"}]', '51', '3'),
(87, '8', '[{\"course\":\"40\",\"grade\":\"95\"},{\"course\":\"41\",\"grade\":\"98\"},{\"course\":\"42\",\"grade\":\"84\"}]', '52', '3'),
(88, '8', '[{\"course\":\"40\",\"grade\":\"85\"},{\"course\":\"41\",\"grade\":\"98\"},{\"course\":\"42\",\"grade\":\"78\"}]', '53', '3'),
(89, '8', '[{\"course\":\"40\",\"grade\":\"84\"},{\"course\":\"41\",\"grade\":\"99\"},{\"course\":\"42\",\"grade\":\"88\"}]', '54', '3'),
(90, '8', '[{\"course\":\"40\",\"grade\":\"76\"},{\"course\":\"41\",\"grade\":\"88\"},{\"course\":\"42\",\"grade\":\"78\"}]', '55', '3'),
(91, '8', '[{\"course\":\"40\",\"grade\":\"89\"},{\"course\":\"41\",\"grade\":\"92\"},{\"course\":\"42\",\"grade\":\"90\"}]', '56', '3'),
(92, '8', '[{\"course\":\"40\",\"grade\":\"95\"},{\"course\":\"41\",\"grade\":\"88\"},{\"course\":\"42\",\"grade\":\"99\"}]', '57', '3'),
(93, '8', '[{\"course\":\"40\",\"grade\":\"89\"},{\"course\":\"41\",\"grade\":\"92\"},{\"course\":\"42\",\"grade\":\"80\"}]', '58', '3'),
(94, '8', '[{\"course\":\"40\",\"grade\":\"82\"},{\"course\":\"41\",\"grade\":\"97\"},{\"course\":\"42\",\"grade\":\"95\"}]', '59', '3'),
(95, '8', '[{\"course\":\"40\",\"grade\":\"94\"},{\"course\":\"41\",\"grade\":\"87\"},{\"course\":\"42\",\"grade\":\"87\"}]', '60', '3'),
(96, '8', '[{\"course\":\"40\",\"grade\":\"94\"},{\"course\":\"41\",\"grade\":\"98\"},{\"course\":\"42\",\"grade\":\"97\"}]', '61', '3'),
(97, '8', '[{\"course\":\"40\",\"grade\":\"97\"},{\"course\":\"41\",\"grade\":\"92\"},{\"course\":\"42\",\"grade\":\"97\"}]', '62', '3'),
(98, '8', '[{\"course\":\"40\",\"grade\":\"83\"},{\"course\":\"41\",\"grade\":\"75\"},{\"course\":\"42\",\"grade\":\"78\"}]', '63', '3'),
(99, '8', '[{\"course\":\"40\",\"grade\":\"86\"},{\"course\":\"41\",\"grade\":\"80\"},{\"course\":\"42\",\"grade\":\"84\"}]', '64', '3'),
(100, '8', '[{\"course\":\"40\",\"grade\":\"80\"},{\"course\":\"41\",\"grade\":\"93\"},{\"course\":\"42\",\"grade\":\"82\"}]', '65', '3'),
(101, '8', '[{\"course\":\"40\",\"grade\":\"97\"},{\"course\":\"41\",\"grade\":\"88\"},{\"course\":\"42\",\"grade\":\"87\"}]', '66', '3'),
(102, '8', '[{\"course\":\"40\",\"grade\":\"99\"},{\"course\":\"41\",\"grade\":\"77\"},{\"course\":\"42\",\"grade\":\"79\"}]', '67', '3'),
(103, '8', '[{\"course\":\"40\",\"grade\":\"99\"},{\"course\":\"41\",\"grade\":\"76\"},{\"course\":\"42\",\"grade\":\"98\"}]', '68', '3'),
(104, '8', '[{\"course\":\"40\",\"grade\":\"92\"},{\"course\":\"41\",\"grade\":\"97\"},{\"course\":\"42\",\"grade\":\"98\"}]', '69', '3'),
(105, '8', '[{\"course\":\"43\",\"grade\":\"76\"},{\"course\":\"44\",\"grade\":\"99\"},{\"course\":\"45\",\"grade\":\"75\"}]', '70', '4'),
(106, '8', '[{\"course\":\"43\",\"grade\":\"90\"},{\"course\":\"44\",\"grade\":\"96\"},{\"course\":\"45\",\"grade\":\"94\"}]', '71', '4'),
(107, '8', '[{\"course\":\"43\",\"grade\":\"81\"},{\"course\":\"44\",\"grade\":\"94\"},{\"course\":\"45\",\"grade\":\"91\"}]', '72', '4'),
(108, '8', '[{\"course\":\"43\",\"grade\":\"77\"},{\"course\":\"44\",\"grade\":\"98\"},{\"course\":\"45\",\"grade\":\"85\"}]', '73', '4'),
(109, '8', '[{\"course\":\"43\",\"grade\":\"80\"},{\"course\":\"44\",\"grade\":\"80\"},{\"course\":\"45\",\"grade\":\"88\"}]', '74', '4'),
(110, '8', '[{\"course\":\"43\",\"grade\":\"90\"},{\"course\":\"44\",\"grade\":\"92\"},{\"course\":\"45\",\"grade\":\"75\"}]', '75', '4'),
(111, '8', '[{\"course\":\"43\",\"grade\":\"99\"},{\"course\":\"44\",\"grade\":\"99\"},{\"course\":\"45\",\"grade\":\"96\"}]', '76', '4'),
(112, '8', '[{\"course\":\"43\",\"grade\":\"96\"},{\"course\":\"44\",\"grade\":\"94\"},{\"course\":\"45\",\"grade\":\"89\"}]', '77', '4'),
(113, '8', '[{\"course\":\"43\",\"grade\":\"98\"},{\"course\":\"44\",\"grade\":\"88\"},{\"course\":\"45\",\"grade\":\"97\"}]', '78', '4'),
(114, '8', '[{\"course\":\"43\",\"grade\":\"76\"},{\"course\":\"44\",\"grade\":\"89\"},{\"course\":\"45\",\"grade\":\"85\"}]', '79', '4'),
(115, '8', '[{\"course\":\"43\",\"grade\":\"94\"},{\"course\":\"44\",\"grade\":\"87\"},{\"course\":\"45\",\"grade\":\"76\"}]', '80', '4'),
(116, '8', '[{\"course\":\"43\",\"grade\":\"84\"},{\"course\":\"44\",\"grade\":\"85\"},{\"course\":\"45\",\"grade\":\"85\"}]', '81', '4'),
(117, '8', '[{\"course\":\"43\",\"grade\":\"77\"},{\"course\":\"44\",\"grade\":\"93\"},{\"course\":\"45\",\"grade\":\"82\"}]', '82', '4'),
(118, '8', '[{\"course\":\"43\",\"grade\":\"75\"},{\"course\":\"44\",\"grade\":\"97\"},{\"course\":\"45\",\"grade\":\"83\"}]', '83', '4'),
(119, '8', '[{\"course\":\"43\",\"grade\":\"83\"},{\"course\":\"44\",\"grade\":\"95\"},{\"course\":\"45\",\"grade\":\"79\"}]', '84', '4'),
(120, '8', '[{\"course\":\"43\",\"grade\":\"87\"},{\"course\":\"44\",\"grade\":\"75\"},{\"course\":\"45\",\"grade\":\"98\"}]', '85', '4'),
(121, '8', '[{\"course\":\"43\",\"grade\":\"78\"},{\"course\":\"44\",\"grade\":\"77\"},{\"course\":\"45\",\"grade\":\"83\"}]', '86', '4'),
(122, '8', '[{\"course\":\"43\",\"grade\":\"99\"},{\"course\":\"44\",\"grade\":\"88\"},{\"course\":\"45\",\"grade\":\"86\"}]', '87', '4'),
(123, '8', '[{\"course\":\"43\",\"grade\":\"93\"},{\"course\":\"44\",\"grade\":\"75\"},{\"course\":\"45\",\"grade\":\"89\"}]', '88', '4'),
(124, '8', '[{\"course\":\"43\",\"grade\":\"86\"},{\"course\":\"44\",\"grade\":\"80\"},{\"course\":\"45\",\"grade\":\"91\"}]', '89', '4'),
(125, '8', '[{\"course\":\"17\",\"grade\":\"93\"},{\"course\":\"18\",\"grade\":\"77\"},{\"course\":\"19\",\"grade\":\"83\"},{\"course\":\"20\",\"grade\":\"84\"},{\"course\":\"21\",\"grade\":\"76\"},{\"course\":\"22\",\"grade\":\"91\"},{\"course\":\"23\",\"grade\":\"94\"}]', '1', '7'),
(126, '8', '[{\"course\":\"17\",\"grade\":\"82\"},{\"course\":\"18\",\"grade\":\"92\"},{\"course\":\"19\",\"grade\":\"98\"},{\"course\":\"20\",\"grade\":\"96\"},{\"course\":\"21\",\"grade\":\"84\"},{\"course\":\"22\",\"grade\":\"81\"},{\"course\":\"23\",\"grade\":\"84\"}]', '4', '7'),
(127, '8', '[{\"course\":\"17\",\"grade\":\"92\"},{\"course\":\"18\",\"grade\":\"89\"},{\"course\":\"19\",\"grade\":\"94\"},{\"course\":\"20\",\"grade\":\"79\"},{\"course\":\"21\",\"grade\":\"75\"},{\"course\":\"22\",\"grade\":\"94\"},{\"course\":\"23\",\"grade\":\"81\"}]', '6', '7'),
(128, '8', '[{\"course\":\"17\",\"grade\":\"99\"},{\"course\":\"18\",\"grade\":\"89\"},{\"course\":\"19\",\"grade\":\"82\"},{\"course\":\"20\",\"grade\":\"78\"},{\"course\":\"21\",\"grade\":\"95\"},{\"course\":\"22\",\"grade\":\"90\"},{\"course\":\"23\",\"grade\":\"75\"}]', '7', '7'),
(129, '8', '[{\"course\":\"17\",\"grade\":\"83\"},{\"course\":\"18\",\"grade\":\"95\"},{\"course\":\"19\",\"grade\":\"81\"},{\"course\":\"20\",\"grade\":\"85\"},{\"course\":\"21\",\"grade\":\"90\"},{\"course\":\"22\",\"grade\":\"84\"},{\"course\":\"23\",\"grade\":\"96\"}]', '9', '7'),
(130, '8', '[{\"course\":\"17\",\"grade\":\"83\"},{\"course\":\"18\",\"grade\":\"81\"},{\"course\":\"19\",\"grade\":\"77\"},{\"course\":\"20\",\"grade\":\"78\"},{\"course\":\"21\",\"grade\":\"87\"},{\"course\":\"22\",\"grade\":\"83\"},{\"course\":\"23\",\"grade\":\"77\"}]', '10', '7'),
(131, '8', '[{\"course\":\"17\",\"grade\":\"75\"},{\"course\":\"18\",\"grade\":\"97\"},{\"course\":\"19\",\"grade\":\"86\"},{\"course\":\"20\",\"grade\":\"79\"},{\"course\":\"21\",\"grade\":\"94\"},{\"course\":\"22\",\"grade\":\"76\"},{\"course\":\"23\",\"grade\":\"92\"}]', '11', '7'),
(132, '8', '[{\"course\":\"17\",\"grade\":\"87\"},{\"course\":\"18\",\"grade\":\"81\"},{\"course\":\"19\",\"grade\":\"96\"},{\"course\":\"20\",\"grade\":\"91\"},{\"course\":\"21\",\"grade\":\"94\"},{\"course\":\"22\",\"grade\":\"95\"},{\"course\":\"23\",\"grade\":\"96\"}]', '12', '7'),
(133, '8', '[{\"course\":\"17\",\"grade\":\"85\"},{\"course\":\"18\",\"grade\":\"82\"},{\"course\":\"19\",\"grade\":\"83\"},{\"course\":\"20\",\"grade\":\"98\"},{\"course\":\"21\",\"grade\":\"90\"},{\"course\":\"22\",\"grade\":\"93\"},{\"course\":\"23\",\"grade\":\"78\"}]', '13', '7'),
(134, '8', '[{\"course\":\"17\",\"grade\":\"90\"},{\"course\":\"18\",\"grade\":\"82\"},{\"course\":\"19\",\"grade\":\"82\"},{\"course\":\"20\",\"grade\":\"75\"},{\"course\":\"21\",\"grade\":\"97\"},{\"course\":\"22\",\"grade\":\"77\"},{\"course\":\"23\",\"grade\":\"93\"}]', '14', '7'),
(135, '8', '[{\"course\":\"17\",\"grade\":\"84\"},{\"course\":\"18\",\"grade\":\"79\"},{\"course\":\"19\",\"grade\":\"77\"},{\"course\":\"20\",\"grade\":\"80\"},{\"course\":\"21\",\"grade\":\"75\"},{\"course\":\"22\",\"grade\":\"85\"},{\"course\":\"23\",\"grade\":\"97\"}]', '15', '7'),
(136, '8', '[{\"course\":\"17\",\"grade\":\"88\"},{\"course\":\"18\",\"grade\":\"83\"},{\"course\":\"19\",\"grade\":\"79\"},{\"course\":\"20\",\"grade\":\"88\"},{\"course\":\"21\",\"grade\":\"95\"},{\"course\":\"22\",\"grade\":\"77\"},{\"course\":\"23\",\"grade\":\"84\"}]', '16', '7'),
(137, '8', '[{\"course\":\"17\",\"grade\":\"92\"},{\"course\":\"18\",\"grade\":\"96\"},{\"course\":\"19\",\"grade\":\"93\"},{\"course\":\"20\",\"grade\":\"86\"},{\"course\":\"21\",\"grade\":\"84\"},{\"course\":\"22\",\"grade\":\"96\"},{\"course\":\"23\",\"grade\":\"76\"}]', '17', '7'),
(138, '8', '[{\"course\":\"17\",\"grade\":\"85\"},{\"course\":\"18\",\"grade\":\"81\"},{\"course\":\"19\",\"grade\":\"88\"},{\"course\":\"20\",\"grade\":\"84\"},{\"course\":\"21\",\"grade\":\"92\"},{\"course\":\"22\",\"grade\":\"84\"},{\"course\":\"23\",\"grade\":\"77\"}]', '18', '7'),
(139, '8', '[{\"course\":\"17\",\"grade\":\"89\"},{\"course\":\"18\",\"grade\":\"82\"},{\"course\":\"19\",\"grade\":\"83\"},{\"course\":\"20\",\"grade\":\"81\"},{\"course\":\"21\",\"grade\":\"99\"},{\"course\":\"22\",\"grade\":\"92\"},{\"course\":\"23\",\"grade\":\"81\"}]', '19', '7'),
(140, '8', '[{\"course\":\"17\",\"grade\":\"80\"},{\"course\":\"18\",\"grade\":\"85\"},{\"course\":\"19\",\"grade\":\"95\"},{\"course\":\"20\",\"grade\":\"92\"},{\"course\":\"21\",\"grade\":\"93\"},{\"course\":\"22\",\"grade\":\"81\"},{\"course\":\"23\",\"grade\":\"79\"}]', '20', '7'),
(141, '8', '[{\"course\":\"17\",\"grade\":\"94\"},{\"course\":\"18\",\"grade\":\"76\"},{\"course\":\"19\",\"grade\":\"83\"},{\"course\":\"20\",\"grade\":\"93\"},{\"course\":\"21\",\"grade\":\"77\"},{\"course\":\"22\",\"grade\":\"95\"},{\"course\":\"23\",\"grade\":\"75\"}]', '21', '7'),
(142, '8', '[{\"course\":\"17\",\"grade\":\"98\"},{\"course\":\"18\",\"grade\":\"93\"},{\"course\":\"19\",\"grade\":\"82\"},{\"course\":\"20\",\"grade\":\"78\"},{\"course\":\"21\",\"grade\":\"93\"},{\"course\":\"22\",\"grade\":\"81\"},{\"course\":\"23\",\"grade\":\"80\"}]', '22', '7'),
(143, '8', '[{\"course\":\"17\",\"grade\":\"75\"},{\"course\":\"18\",\"grade\":\"91\"},{\"course\":\"19\",\"grade\":\"95\"},{\"course\":\"20\",\"grade\":\"93\"},{\"course\":\"21\",\"grade\":\"87\"},{\"course\":\"22\",\"grade\":\"90\"},{\"course\":\"23\",\"grade\":\"98\"}]', '23', '7'),
(144, '8', '[{\"course\":\"17\",\"grade\":\"90\"},{\"course\":\"18\",\"grade\":\"98\"},{\"course\":\"19\",\"grade\":\"77\"},{\"course\":\"20\",\"grade\":\"94\"},{\"course\":\"21\",\"grade\":\"77\"},{\"course\":\"22\",\"grade\":\"79\"},{\"course\":\"23\",\"grade\":\"77\"}]', '24', '7'),
(145, '8', '[{\"course\":\"46\",\"grade\":\"97\"},{\"course\":\"47\",\"grade\":\"96\"},{\"course\":\"48\",\"grade\":\"89\"},{\"course\":\"49\",\"grade\":\"76\"},{\"course\":\"50\",\"grade\":\"85\"},{\"course\":\"51\",\"grade\":\"78\"},{\"course\":\"52\",\"grade\":\"99\"}]', '25', '8'),
(146, '8', '[{\"course\":\"46\",\"grade\":\"99\"},{\"course\":\"47\",\"grade\":\"97\"},{\"course\":\"48\",\"grade\":\"91\"},{\"course\":\"49\",\"grade\":\"92\"},{\"course\":\"50\",\"grade\":\"81\"},{\"course\":\"51\",\"grade\":\"86\"},{\"course\":\"52\",\"grade\":\"90\"}]', '26', '8'),
(147, '8', '[{\"course\":\"46\",\"grade\":\"89\"},{\"course\":\"47\",\"grade\":\"98\"},{\"course\":\"48\",\"grade\":\"91\"},{\"course\":\"49\",\"grade\":\"93\"},{\"course\":\"50\",\"grade\":\"75\"},{\"course\":\"51\",\"grade\":\"86\"},{\"course\":\"52\",\"grade\":\"90\"}]', '27', '8'),
(148, '8', '[{\"course\":\"46\",\"grade\":\"81\"},{\"course\":\"47\",\"grade\":\"94\"},{\"course\":\"48\",\"grade\":\"94\"},{\"course\":\"49\",\"grade\":\"98\"},{\"course\":\"50\",\"grade\":\"97\"},{\"course\":\"51\",\"grade\":\"82\"},{\"course\":\"52\",\"grade\":\"85\"}]', '28', '8'),
(149, '8', '[{\"course\":\"46\",\"grade\":\"92\"},{\"course\":\"47\",\"grade\":\"96\"},{\"course\":\"48\",\"grade\":\"83\"},{\"course\":\"49\",\"grade\":\"81\"},{\"course\":\"50\",\"grade\":\"87\"},{\"course\":\"51\",\"grade\":\"96\"},{\"course\":\"52\",\"grade\":\"81\"}]', '29', '8'),
(150, '8', '[{\"course\":\"46\",\"grade\":\"95\"},{\"course\":\"47\",\"grade\":\"85\"},{\"course\":\"48\",\"grade\":\"77\"},{\"course\":\"49\",\"grade\":\"98\"},{\"course\":\"50\",\"grade\":\"77\"},{\"course\":\"51\",\"grade\":\"76\"},{\"course\":\"52\",\"grade\":\"83\"}]', '30', '8'),
(151, '8', '[{\"course\":\"46\",\"grade\":\"93\"},{\"course\":\"47\",\"grade\":\"87\"},{\"course\":\"48\",\"grade\":\"88\"},{\"course\":\"49\",\"grade\":\"95\"},{\"course\":\"50\",\"grade\":\"85\"},{\"course\":\"51\",\"grade\":\"75\"},{\"course\":\"52\",\"grade\":\"85\"}]', '31', '8'),
(152, '8', '[{\"course\":\"46\",\"grade\":\"79\"},{\"course\":\"47\",\"grade\":\"84\"},{\"course\":\"48\",\"grade\":\"79\"},{\"course\":\"49\",\"grade\":\"94\"},{\"course\":\"50\",\"grade\":\"91\"},{\"course\":\"51\",\"grade\":\"86\"},{\"course\":\"52\",\"grade\":\"96\"}]', '32', '8'),
(153, '8', '[{\"course\":\"46\",\"grade\":\"82\"},{\"course\":\"47\",\"grade\":\"75\"},{\"course\":\"48\",\"grade\":\"75\"},{\"course\":\"49\",\"grade\":\"89\"},{\"course\":\"50\",\"grade\":\"99\"},{\"course\":\"51\",\"grade\":\"86\"},{\"course\":\"52\",\"grade\":\"96\"}]', '33', '8'),
(154, '8', '[{\"course\":\"46\",\"grade\":\"81\"},{\"course\":\"47\",\"grade\":\"85\"},{\"course\":\"48\",\"grade\":\"92\"},{\"course\":\"49\",\"grade\":\"83\"},{\"course\":\"50\",\"grade\":\"86\"},{\"course\":\"51\",\"grade\":\"94\"},{\"course\":\"52\",\"grade\":\"98\"}]', '34', '8'),
(155, '8', '[{\"course\":\"46\",\"grade\":\"82\"},{\"course\":\"47\",\"grade\":\"76\"},{\"course\":\"48\",\"grade\":\"90\"},{\"course\":\"49\",\"grade\":\"98\"},{\"course\":\"50\",\"grade\":\"78\"},{\"course\":\"51\",\"grade\":\"89\"},{\"course\":\"52\",\"grade\":\"99\"}]', '35', '8'),
(156, '8', '[{\"course\":\"46\",\"grade\":\"96\"},{\"course\":\"47\",\"grade\":\"90\"},{\"course\":\"48\",\"grade\":\"99\"},{\"course\":\"49\",\"grade\":\"88\"},{\"course\":\"50\",\"grade\":\"86\"},{\"course\":\"51\",\"grade\":\"78\"},{\"course\":\"52\",\"grade\":\"93\"}]', '36', '8'),
(157, '8', '[{\"course\":\"46\",\"grade\":\"83\"},{\"course\":\"47\",\"grade\":\"98\"},{\"course\":\"48\",\"grade\":\"87\"},{\"course\":\"49\",\"grade\":\"94\"},{\"course\":\"50\",\"grade\":\"75\"},{\"course\":\"51\",\"grade\":\"76\"},{\"course\":\"52\",\"grade\":\"77\"}]', '37', '8'),
(158, '8', '[{\"course\":\"46\",\"grade\":\"90\"},{\"course\":\"47\",\"grade\":\"90\"},{\"course\":\"48\",\"grade\":\"99\"},{\"course\":\"49\",\"grade\":\"93\"},{\"course\":\"50\",\"grade\":\"79\"},{\"course\":\"51\",\"grade\":\"93\"},{\"course\":\"52\",\"grade\":\"86\"}]', '38', '8'),
(159, '8', '[{\"course\":\"46\",\"grade\":\"94\"},{\"course\":\"47\",\"grade\":\"99\"},{\"course\":\"48\",\"grade\":\"88\"},{\"course\":\"49\",\"grade\":\"91\"},{\"course\":\"50\",\"grade\":\"76\"},{\"course\":\"51\",\"grade\":\"98\"},{\"course\":\"52\",\"grade\":\"88\"}]', '39', '8'),
(160, '8', '[{\"course\":\"46\",\"grade\":\"84\"},{\"course\":\"47\",\"grade\":\"97\"},{\"course\":\"48\",\"grade\":\"89\"},{\"course\":\"49\",\"grade\":\"95\"},{\"course\":\"50\",\"grade\":\"95\"},{\"course\":\"51\",\"grade\":\"80\"},{\"course\":\"52\",\"grade\":\"95\"}]', '40', '8'),
(161, '8', '[{\"course\":\"46\",\"grade\":\"76\"},{\"course\":\"47\",\"grade\":\"90\"},{\"course\":\"48\",\"grade\":\"81\"},{\"course\":\"49\",\"grade\":\"79\"},{\"course\":\"50\",\"grade\":\"82\"},{\"course\":\"51\",\"grade\":\"77\"},{\"course\":\"52\",\"grade\":\"98\"}]', '41', '8'),
(162, '8', '[{\"course\":\"46\",\"grade\":\"89\"},{\"course\":\"47\",\"grade\":\"77\"},{\"course\":\"48\",\"grade\":\"98\"},{\"course\":\"49\",\"grade\":\"89\"},{\"course\":\"50\",\"grade\":\"87\"},{\"course\":\"51\",\"grade\":\"91\"},{\"course\":\"52\",\"grade\":\"83\"}]', '42', '8'),
(163, '8', '[{\"course\":\"46\",\"grade\":\"75\"},{\"course\":\"47\",\"grade\":\"98\"},{\"course\":\"48\",\"grade\":\"86\"},{\"course\":\"49\",\"grade\":\"76\"},{\"course\":\"50\",\"grade\":\"89\"},{\"course\":\"51\",\"grade\":\"83\"},{\"course\":\"52\",\"grade\":\"91\"}]', '43', '8'),
(164, '8', '[{\"course\":\"46\",\"grade\":\"81\"},{\"course\":\"47\",\"grade\":\"79\"},{\"course\":\"48\",\"grade\":\"92\"},{\"course\":\"49\",\"grade\":\"95\"},{\"course\":\"50\",\"grade\":\"92\"},{\"course\":\"51\",\"grade\":\"76\"},{\"course\":\"52\",\"grade\":\"85\"}]', '44', '8'),
(185, '8', '[{\"course\":\"53\",\"grade\":\"86\"},{\"course\":\"54\",\"grade\":\"92\"},{\"course\":\"55\",\"grade\":\"80\"},{\"course\":\"56\",\"grade\":\"90\"},{\"course\":\"57\",\"grade\":\"96\"},{\"course\":\"58\",\"grade\":\"76\"},{\"course\":\"59\",\"grade\":\"78\"},{\"course\":\"60\",\"grade\":\"90\"}]', '120', '9'),
(186, '8', '[{\"course\":\"53\",\"grade\":\"82\"},{\"course\":\"54\",\"grade\":\"80\"},{\"course\":\"55\",\"grade\":\"89\"},{\"course\":\"56\",\"grade\":\"78\"},{\"course\":\"57\",\"grade\":\"78\"},{\"course\":\"58\",\"grade\":\"89\"},{\"course\":\"59\",\"grade\":\"91\"},{\"course\":\"60\",\"grade\":\"85\"}]', '121', '9'),
(187, '8', '[{\"course\":\"53\",\"grade\":\"80\"},{\"course\":\"54\",\"grade\":\"77\"},{\"course\":\"55\",\"grade\":\"99\"},{\"course\":\"56\",\"grade\":\"80\"},{\"course\":\"57\",\"grade\":\"97\"},{\"course\":\"58\",\"grade\":\"82\"},{\"course\":\"59\",\"grade\":\"90\"},{\"course\":\"60\",\"grade\":\"92\"}]', '122', '9'),
(188, '8', '[{\"course\":\"53\",\"grade\":\"75\"},{\"course\":\"54\",\"grade\":\"77\"},{\"course\":\"55\",\"grade\":\"78\"},{\"course\":\"56\",\"grade\":\"89\"},{\"course\":\"57\",\"grade\":\"96\"},{\"course\":\"58\",\"grade\":\"75\"},{\"course\":\"59\",\"grade\":\"92\"},{\"course\":\"60\",\"grade\":\"77\"}]', '123', '9'),
(189, '8', '[{\"course\":\"53\",\"grade\":\"84\"},{\"course\":\"54\",\"grade\":\"99\"},{\"course\":\"55\",\"grade\":\"95\"},{\"course\":\"56\",\"grade\":\"75\"},{\"course\":\"57\",\"grade\":\"95\"},{\"course\":\"58\",\"grade\":\"87\"},{\"course\":\"59\",\"grade\":\"91\"},{\"course\":\"60\",\"grade\":\"86\"}]', '124', '9'),
(190, '8', '[{\"course\":\"53\",\"grade\":\"76\"},{\"course\":\"54\",\"grade\":\"87\"},{\"course\":\"55\",\"grade\":\"94\"},{\"course\":\"56\",\"grade\":\"81\"},{\"course\":\"57\",\"grade\":\"86\"},{\"course\":\"58\",\"grade\":\"86\"},{\"course\":\"59\",\"grade\":\"82\"},{\"course\":\"60\",\"grade\":\"87\"}]', '125', '9'),
(191, '8', '[{\"course\":\"53\",\"grade\":\"96\"},{\"course\":\"54\",\"grade\":\"83\"},{\"course\":\"55\",\"grade\":\"94\"},{\"course\":\"56\",\"grade\":\"75\"},{\"course\":\"57\",\"grade\":\"89\"},{\"course\":\"58\",\"grade\":\"91\"},{\"course\":\"59\",\"grade\":\"82\"},{\"course\":\"60\",\"grade\":\"99\"}]', '126', '9'),
(192, '8', '[{\"course\":\"53\",\"grade\":\"86\"},{\"course\":\"54\",\"grade\":\"83\"},{\"course\":\"55\",\"grade\":\"88\"},{\"course\":\"56\",\"grade\":\"78\"},{\"course\":\"57\",\"grade\":\"97\"},{\"course\":\"58\",\"grade\":\"96\"},{\"course\":\"59\",\"grade\":\"87\"},{\"course\":\"60\",\"grade\":\"91\"}]', '127', '9'),
(193, '8', '[{\"course\":\"53\",\"grade\":\"91\"},{\"course\":\"54\",\"grade\":\"79\"},{\"course\":\"55\",\"grade\":\"95\"},{\"course\":\"56\",\"grade\":\"81\"},{\"course\":\"57\",\"grade\":\"78\"},{\"course\":\"58\",\"grade\":\"94\"},{\"course\":\"59\",\"grade\":\"89\"},{\"course\":\"60\",\"grade\":\"80\"}]', '128', '9'),
(194, '8', '[{\"course\":\"53\",\"grade\":\"80\"},{\"course\":\"54\",\"grade\":\"90\"},{\"course\":\"55\",\"grade\":\"83\"},{\"course\":\"56\",\"grade\":\"80\"},{\"course\":\"57\",\"grade\":\"78\"},{\"course\":\"58\",\"grade\":\"80\"},{\"course\":\"59\",\"grade\":\"82\"},{\"course\":\"60\",\"grade\":\"87\"}]', '129', '9');

-- --------------------------------------------------------

--
-- Table structure for table `eval_log`
--

CREATE TABLE `eval_log` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `dean_id` varchar(255) NOT NULL,
  `assoc_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `result` text NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eval_log`
--

INSERT INTO `eval_log` (`id`, `student_id`, `section_id`, `dean_id`, `assoc_id`, `course_id`, `faculty`, `sem_id`, `result`, `comment`) VALUES
(48, '50', '3', '', '', '42', '', '', '[{\"ID\":\"IA0\",\"Value\":\"5\"},{\"ID\":\"IA1\",\"Value\":\"5\"},{\"ID\":\"IA2\",\"Value\":\"5\"},{\"ID\":\"IA3\",\"Value\":\"5\"},{\"ID\":\"IA4\",\"Value\":\"5\"},{\"ID\":\"IA5\",\"Value\":\"5\"},{\"ID\":\"IA6\",\"Value\":\"5\"},{\"ID\":\"IB0\",\"Value\":\"5\"},{\"ID\":\"IB1\",\"Value\":\"5\"},{\"ID\":\"IB2\",\"Value\":\"5\"},{\"ID\":\"IB3\",\"Value\":\"5\"},{\"ID\":\"IB4\",\"Value\":\"5\"},{\"ID\":\"IB5\",\"Value\":\"5\"},{\"ID\":\"IB6\",\"Value\":\"5\"},{\"ID\":\"IB7\",\"Value\":\"5\"},{\"ID\":\"IB8\",\"Value\":\"5\"},{\"ID\":\"IC0\",\"Value\":\"5\"},{\"ID\":\"IC1\",\"Value\":\"5\"},{\"ID\":\"IC2\",\"Value\":\"5\"},{\"ID\":\"IC3\",\"Value\":\"5\"},{\"ID\":\"IC4\",\"Value\":\"5\"},{\"ID\":\"IC5\",\"Value\":\"5\"},{\"ID\":\"IC6\",\"Value\":\"5\"},{\"ID\":\"IC7\",\"Value\":\"5\"},{\"ID\":\"IC8\",\"Value\":\"5\"},{\"ID\":\"IC9\",\"Value\":\"5\"},{\"ID\":\"ID0\",\"Value\":\"5\"},{\"ID\":\"ID1\",\"Value\":\"5\"},{\"ID\":\"ID2\",\"Value\":\"5\"},{\"ID\":\"II0\",\"Value\":\"5\"},{\"ID\":\"II1\",\"Value\":\"5\"},{\"ID\":\"II2\",\"Value\":\"5\"},{\"ID\":\"II3\",\"Value\":\"5\"},{\"ID\":\"II4\",\"Value\":\"5\"},{\"ID\":\"II5\",\"Value\":\"5\"},{\"ID\":\"II6\",\"Value\":\"5\"},{\"ID\":\"II7\",\"Value\":\"5\"}]', '\'\'');

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
-- Table structure for table `ref_course`
--

CREATE TABLE `ref_course` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_course`
--

INSERT INTO `ref_course` (`code`, `name`, `college`) VALUES
('COE', 'Computer Engineering', 'CET'),
('EK', 'Electronics and Communications Engineering', 'CET'),
('IT', 'Information Technology', 'CET');

-- --------------------------------------------------------

--
-- Table structure for table `ref_curriculum`
--

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

--
-- Dumping data for table `ref_curriculum`
--

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
(23, 'Database Management Systems I', 'ACS223', '3', 'CET', 'IT', '2', 'Summer', ''),
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

-- --------------------------------------------------------

--
-- Table structure for table `ref_section`
--

CREATE TABLE `ref_section` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_section`
--

INSERT INTO `ref_section` (`id`, `name`, `college`) VALUES
(1, 'IT11', 'CET'),
(2, 'IT12', 'CET'),
(3, 'IT21', 'CET'),
(4, 'IT22', 'CET'),
(5, 'IT31', 'CET'),
(6, 'IT32', 'CET'),
(7, 'IT41', 'CET'),
(8, 'IT42', 'CET'),
(9, 'IT33', 'CET');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sem_id` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `sections` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `sem_id`, `faculty`, `sections`, `active`, `start_date`, `date`) VALUES
(14, 'faculty_eval', '8', '49', '3,4,5', 0, '02/24/2018 00:00:00', '02/24/2018 24:00:00'),
(15, 'faculty_eval', '8', '48', '3,4,5', 0, '02/24/2018 00:00:00', '02/24/2018 24:00:00'),
(16, 'faculty_eval', '8', '49', '3,4,5', 0, '02/25/2018 00:00:00', '02/25/2018 24:00:00'),
(17, 'faculty_eval', '8', '48', '3,4,5', 0, '02/25/2018 00:00:00', '02/25/2018 24:00:00'),
(18, 'faculty_eval', '8', '49', '3,4', 1, '02/26/2018 00:00:00', '02/26/2018 24:00:00');

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
  `college` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `usertype`, `college`, `course`, `user_ID`) VALUES
(1, '14-0001', 'password', 'Monkey', 'D.', 'Luffy', '1', 'CET', 'IT', '14-UC-01-0001-63'),
(2, '1faculty', 'password', 'Silvers', '', 'Rayleigh', '2', 'CET', '', ''),
(3, '2faculty', 'password', 'Jinbe', '', '', '2', 'CET', '', ''),
(4, '14-0002', 'password', 'Vinsmoke', '', 'Sanji', '1', 'CET', 'IT', '14-UC-01-0002-63'),
(5, 'admin', '12345', 'Eiichiro', '', 'Oda', '5', '', '', ''),
(6, '14-0003', 'password', 'Roronoa', '', 'Zoro', '1', 'CET', 'IT', '14-UC-01-0003-63'),
(7, '14-0004', 'password', 'Nico', '', 'Robin', '1', 'CET', 'IT', '14-UC-01-0004-63'),
(8, '1dean', 'password', 'Sengoku', '', '', '3', 'CET', '', ''),
(9, '14-0005', 'password', 'Tony Tony', '', 'Chopper', '1', 'CET', 'IT', '14-UC-01-0005-63'),
(10, '14-0006', 'password', 'Nami', '', '', '1', 'CET', 'IT', '14-UC-01-0006-63'),
(11, '14-0007', 'password', 'Usopp', '', '', '1', 'CET', 'IT', '14-UC-01-0007-63'),
(12, '14-0008', 'password', 'Franky', '', '', '1', 'CET', 'IT', '14-UC-01-0008-63'),
(13, '14-0009', 'password', 'Brook', '', '', '1', 'CET', 'IT', '14-UC-01-0009-63'),
(14, '14-0010', 'password', 'Trafalgar', 'D.', 'Water Law', '1', 'CET', 'IT', '14-UC-01-0010-63'),
(15, '14-0011', 'password', 'Bepo', '', '', '1', 'CET', 'IT', '14-UC-01-0011-63'),
(16, '14-0012', 'password', 'Jean', '', 'Bart', '1', 'CET', 'IT', '14-UC-01-0012-63'),
(17, '14-0013', 'password', 'Kozuki ', '', 'Momonosuke', '1', 'CET', 'IT', '14-UC-01-0013-63'),
(18, '14-0014', 'password', 'Kin\'emon', '', '', '1', 'CET', 'IT', '14-UC-01-0014-63'),
(19, '14-0015', 'password', 'Kanjuro', '', '', '1', 'CET', 'IT', '14-UC-01-0015-63'),
(20, '14-0016', 'password', 'Raizo', '', '', '1', 'CET', 'IT', '14-UC-01-0016-63'),
(21, '14-0017', 'password', 'Inuarashi', '', '', '1', 'CET', 'IT', '14-UC-01-0017-63'),
(22, '14-0018', 'password', 'Nekomamushi', '', '', '1', 'CET', 'IT', '14-UC-01-0018-63'),
(23, '14-0019', 'password', 'Carrot', '', '', '1', 'CET', 'IT', '14-UC-01-0019-63'),
(24, '14-0020', 'password', 'Bartolomeo', '', '', '1', 'CET', 'IT', '14-UC-01-0020-63'),
(25, '14-0021', 'password', 'Cavendish', '', '', '1', 'CET', 'IT', '14-UC-02-0021-63'),
(26, '14-0022', 'password', 'Sai', '', '', '1', 'CET', 'IT', '14-UC-02-0022-63'),
(27, '14-0023', 'password', 'Ideo', '', '', '1', 'CET', 'IT', '14-UC-02-0023-63'),
(28, '14-0024', 'password', 'Leo', '', '', '1', 'CET', 'IT', '14-UC-02-0024-63'),
(29, '14-0025', 'password', 'Hajrudin', '', '', '1', 'CET', 'IT', '14-UC-02-0025-63'),
(30, '14-0026', 'password', 'Orlumbus', '', '', '1', 'CET', 'IT', '14-UC-02-0026-63'),
(31, '14-0027', 'password', 'Baby', '', '5', '1', 'CET', 'IT', '14-UC-02-0027-63'),
(32, '14-0028', 'password', 'Chinjao', '', '', '1', 'CET', 'IT', '14-UC-02-0028-63'),
(33, '14-0029', 'password', 'Shanks', '', '', '1', 'CET', 'IT', '14-UC-02-0029-63'),
(34, '14-0030', 'password', 'Benn', '', 'Beckman', '1', 'CET', 'IT', '14-UC-02-0030-63'),
(35, '14-0031', 'password', 'Yasopp', '', '', '1', 'CET', 'IT', '14-UC-02-0031-63'),
(36, '14-0032', 'password', 'Lucky', '', 'Roo', '1', 'CET', 'IT', '14-UC-02-0032-63'),
(37, '14-0033', 'password', 'Buggy', '', '', '1', 'CET', 'IT', '14-UC-02-0033-63'),
(38, '14-0034', 'password', 'Crocus', '', '', '1', 'CET', 'IT', '14-UC-02-0034-63'),
(39, '14-0035', 'password', 'Marco', '', '', '1', 'CET', 'IT', '14-UC-02-0035-63'),
(40, '14-0036', 'password', 'Portgas', 'D.', 'Ace', '1', 'CET', 'IT', '14-UC-02-0036-63'),
(41, '14-0037', 'password', 'Jozu', '', '', '1', 'CET', 'IT', '14-UC-02-0037-63'),
(42, '14-0038', 'password', 'Vista', '', '', '1', 'CET', 'IT', '14-UC-02-0038-63'),
(43, '14-0039', 'password', 'Kuzan', '', '', '1', 'CET', 'IT', '14-UC-02-0039-63'),
(44, '14-0040', 'password', 'Monkey', 'D.', 'Garp', '1', 'CET', 'IT', '14-UC-02-0040-63'),
(45, '14-0041', 'password', 'Issho', '', '', '1', 'CET', 'IT', '14-UC-02-0041-63'),
(46, '1assoc', 'password', 'Rosinante', '', 'Donquixote', '4', 'CET', '', ''),
(47, '3faculty', 'password', 'Juan', '', 'Dela Cruz', '2', 'CET', '', ''),
(48, '4faculty', 'password', 'Pedro', '', 'Pedro', '2', 'CET', '', ''),
(49, '5faculty', 'password', 'James', '', 'James', '2', 'CET', '', ''),
(50, '14-0051', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0051-63'),
(51, '14-0052', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0052-63'),
(52, '14-0053', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0053-63'),
(53, '14-0054', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0054-63'),
(54, '14-0055', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0055-63'),
(55, '14-0056', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0056-63'),
(56, '14-0057', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0057-63'),
(57, '14-0058', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0058-63'),
(58, '14-0059', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0059-63'),
(59, '14-0060', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0060-63'),
(60, '14-0061', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0061-63'),
(61, '14-0062', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0062-63'),
(62, '14-0063', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0063-63'),
(63, '14-0064', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0064-63'),
(64, '14-0065', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0065-63'),
(65, '14-0066', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0066-63'),
(66, '14-0067', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0067-63'),
(67, '14-0068', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0068-63'),
(68, '14-0069', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0069-63'),
(69, '14-0070', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0070-63'),
(70, '14-0071', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0071-63'),
(71, '14-0072', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0072-63'),
(72, '14-0073', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0073-63'),
(73, '14-0074', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0074-63'),
(74, '14-0075', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0075-63'),
(75, '14-0076', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0076-63'),
(76, '14-0077', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0077-63'),
(77, '14-0078', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0078-63'),
(78, '14-0079', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0079-63'),
(79, '14-0080', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0080-63'),
(80, '14-0081', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0081-63'),
(81, '14-0082', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0082-63'),
(82, '14-0083', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0083-63'),
(83, '14-0084', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0084-63'),
(84, '14-0085', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0085-63'),
(85, '14-0086', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0086-63'),
(86, '14-0087', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0087-63'),
(87, '14-0088', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0088-63'),
(88, '14-0089', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0089-63'),
(89, '14-0090', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0090-63'),
(90, '14-0100', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0100-63'),
(91, '14-0101', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0101-63'),
(92, '14-0102', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0102-63'),
(93, '14-0103', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0103-63'),
(94, '14-0104', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0104-63'),
(95, '14-0105', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0105-63'),
(96, '14-0106', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0106-63'),
(97, '14-0107', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0107-63'),
(98, '14-0108', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0108-63'),
(99, '14-0109', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0109-63'),
(100, '14-0110', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0110-63'),
(101, '14-0111', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0111-63'),
(102, '14-0112', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0112-63'),
(103, '14-0113', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0113-63'),
(104, '14-0114', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0114-63'),
(105, '14-0115', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0115-63'),
(106, '14-0116', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0116-63'),
(107, '14-0117', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0117-63'),
(108, '14-0118', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0118-63'),
(109, '14-0119', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0119-63'),
(110, '14-0120', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0120-63'),
(111, '14-0121', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0121-63'),
(112, '14-0122', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0122-63'),
(113, '14-0123', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0123-63'),
(114, '14-0124', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0124-63'),
(115, '14-0125', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0125-63'),
(116, '14-0126', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0126-63'),
(117, '14-0127', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0127-63'),
(118, '14-0128', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0128-63'),
(119, '14-0129', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0129-63'),
(120, '14-0130', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0130-63'),
(121, '14-0131', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0131-63'),
(122, '14-0132', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0132-63'),
(123, '14-0133', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0133-63'),
(124, '14-0134', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0134-63'),
(125, '14-0135', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0135-63'),
(126, '14-0136', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0136-63'),
(127, '14-0137', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0137-63'),
(128, '14-0138', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0138-63'),
(129, '14-0139', 'password', 'Name', '', '', '1', 'CET', 'IT', '14-UC-02-0139-63'),
(140, 'FEPEDO', 'password', 'FEPEDO', '', 'ADMIN', '6', '', '', '');

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
-- Indexes for table `ref_course`
--
ALTER TABLE `ref_course`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `ref_curriculum`
--
ALTER TABLE `ref_curriculum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `ref_section`
--
ALTER TABLE `ref_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `course_log`
--
ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `eval_log`
--
ALTER TABLE `eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ref_curriculum`
--
ALTER TABLE `ref_curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ref_section`
--
ALTER TABLE `ref_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
