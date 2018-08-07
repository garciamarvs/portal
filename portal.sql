-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 06:16 PM
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
(1, 'Data Communication & Basic Network Concepts', 'ACS311', '3', '', '', '2', '5', '6', 'CET'),
(2, 'Database Management Systems 2', 'ACS312', '3', '', '', '3', '5', '6', 'CET'),
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
(23, 'Internship 1', 'BIT416', '6', '', '', '2', '7', '8', 'CET'),
(24, 'Data Communication & Basic Network Concepts', 'ACS311', '3', '', '', '2', '6', '6', 'CET'),
(25, 'Database Management Systems 2', 'ACS312', '3', '', '', '2', '6', '6', 'CET'),
(26, 'Multimedia Technology I', 'ACS313', '3', '', '', '2', '6', '6', 'CET'),
(27, 'Object Oriented Programming', 'ACS314', '3', '', '', '2', '6', '6', 'CET'),
(28, 'System Analysis & Design', 'ACS315', '3', '', '', '2', '6', '6', 'CET'),
(29, 'Computer systems Organization & Assembly Language', 'ACS316', '3', '', '', '2', '6', '6', 'CET'),
(30, 'Web Application Design I', 'ACS317', '3', '', '', '2', '6', '6', 'CET'),
(31, 'Business Process I', 'BPO101', '3', '', '', '2', '6', '6', 'CET'),
(32, 'Advanced Computer Networking', 'ACS321', '3', '', '', '3', '6', '7', 'CET'),
(33, 'Computer Architecture', 'BIT321', '3', '', '', '3', '6', '7', 'CET'),
(34, 'Project Management', 'BIT322', '3', '', '', '3', '6', '7', 'CET'),
(35, 'Web Application Design 2', 'ACS323', '3', '', '', '3', '6', '7', 'CET'),
(36, 'Multimedia Technology 2', 'BIT323', '3', '', '', '3', '6', '7', 'CET'),
(37, 'Business Process 2', 'BPO102', '3', '', '', '3', '6', '7', 'CET'),
(38, 'Principles of Critical Thinking', 'STH101', '3', '', '', '3', '6', '7', 'CET'),
(39, 'Network Technologies', 'BIT324', '3', '', '', '3', '6', '7', 'CET');

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
(1, '6', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"87\"},{\"course\":\"3\",\"grade\":\"95\"},{\"course\":\"4\",\"grade\":\"94\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"89\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"92\"}]', '1', '5'),
(2, '7', '[{\"course\":\"9\",\"grade\":\"94\"},{\"course\":\"10\",\"grade\":\"70\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"98\"},{\"course\":\"13\",\"grade\":\"82\"},{\"course\":\"14\",\"grade\":\"83\"},{\"course\":\"15\",\"grade\":\"91\"},{\"course\":\"16\",\"grade\":\"96\"}]', '1', '5'),
(6, '6', '[{\"course\":\"1\",\"grade\":\"98\"},{\"course\":\"2\",\"grade\":\"85\"},{\"course\":\"3\",\"grade\":\"75\"},{\"course\":\"4\",\"grade\":\"92\"},{\"course\":\"5\",\"grade\":\"87\"},{\"course\":\"6\",\"grade\":\"83\"},{\"course\":\"7\",\"grade\":\"82\"},{\"course\":\"8\",\"grade\":\"84\"}]', '4', '5'),
(7, '6', '[{\"course\":\"1\",\"grade\":\"79\"},{\"course\":\"2\",\"grade\":\"79\"},{\"course\":\"3\",\"grade\":\"86\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"96\"},{\"course\":\"6\",\"grade\":\"93\"},{\"course\":\"7\",\"grade\":\"83\"},{\"course\":\"8\",\"grade\":\"83\"}]', '6', '5'),
(8, '6', '[{\"course\":\"1\",\"grade\":\"83\"},{\"course\":\"2\",\"grade\":\"85\"},{\"course\":\"3\",\"grade\":\"98\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"80\"},{\"course\":\"6\",\"grade\":\"95\"},{\"course\":\"7\",\"grade\":\"88\"},{\"course\":\"8\",\"grade\":\"77\"}]', '7', '5'),
(9, '6', '[{\"course\":\"1\",\"grade\":\"97\"},{\"course\":\"2\",\"grade\":\"90\"},{\"course\":\"3\",\"grade\":\"89\"},{\"course\":\"4\",\"grade\":\"85\"},{\"course\":\"5\",\"grade\":\"87\"},{\"course\":\"6\",\"grade\":\"93\"},{\"course\":\"7\",\"grade\":\"85\"},{\"course\":\"8\",\"grade\":\"86\"}]', '9', '5'),
(10, '6', '[{\"course\":\"1\",\"grade\":\"83\"},{\"course\":\"2\",\"grade\":\"75\"},{\"course\":\"3\",\"grade\":\"86\"},{\"course\":\"4\",\"grade\":\"99\"},{\"course\":\"5\",\"grade\":\"94\"},{\"course\":\"6\",\"grade\":\"99\"},{\"course\":\"7\",\"grade\":\"95\"},{\"course\":\"8\",\"grade\":\"80\"}]', '10', '5'),
(11, '6', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"88\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"96\"},{\"course\":\"5\",\"grade\":\"80\"},{\"course\":\"6\",\"grade\":\"79\"},{\"course\":\"7\",\"grade\":\"85\"},{\"course\":\"8\",\"grade\":\"79\"}]', '11', '5'),
(12, '6', '[{\"course\":\"1\",\"grade\":\"86\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"82\"},{\"course\":\"4\",\"grade\":\"95\"},{\"course\":\"5\",\"grade\":\"91\"},{\"course\":\"6\",\"grade\":\"79\"},{\"course\":\"7\",\"grade\":\"97\"},{\"course\":\"8\",\"grade\":\"75\"}]', '12', '5'),
(13, '6', '[{\"course\":\"1\",\"grade\":\"91\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"94\"},{\"course\":\"4\",\"grade\":\"88\"},{\"course\":\"5\",\"grade\":\"95\"},{\"course\":\"6\",\"grade\":\"90\"},{\"course\":\"7\",\"grade\":\"75\"},{\"course\":\"8\",\"grade\":\"89\"}]', '13', '5'),
(14, '6', '[{\"course\":\"1\",\"grade\":\"96\"},{\"course\":\"2\",\"grade\":\"93\"},{\"course\":\"3\",\"grade\":\"96\"},{\"course\":\"4\",\"grade\":\"97\"},{\"course\":\"5\",\"grade\":\"88\"},{\"course\":\"6\",\"grade\":\"80\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"86\"}]', '14', '5'),
(15, '6', '[{\"course\":\"1\",\"grade\":\"81\"},{\"course\":\"2\",\"grade\":\"97\"},{\"course\":\"3\",\"grade\":\"91\"},{\"course\":\"4\",\"grade\":\"82\"},{\"course\":\"5\",\"grade\":\"99\"},{\"course\":\"6\",\"grade\":\"84\"},{\"course\":\"7\",\"grade\":\"97\"},{\"course\":\"8\",\"grade\":\"94\"}]', '15', '5'),
(16, '6', '[{\"course\":\"1\",\"grade\":\"78\"},{\"course\":\"2\",\"grade\":\"92\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"93\"},{\"course\":\"5\",\"grade\":\"94\"},{\"course\":\"6\",\"grade\":\"88\"},{\"course\":\"7\",\"grade\":\"78\"},{\"course\":\"8\",\"grade\":\"89\"}]', '16', '5'),
(17, '6', '[{\"course\":\"1\",\"grade\":\"82\"},{\"course\":\"2\",\"grade\":\"98\"},{\"course\":\"3\",\"grade\":\"76\"},{\"course\":\"4\",\"grade\":\"76\"},{\"course\":\"5\",\"grade\":\"92\"},{\"course\":\"6\",\"grade\":\"87\"},{\"course\":\"7\",\"grade\":\"91\"},{\"course\":\"8\",\"grade\":\"89\"}]', '17', '5'),
(18, '6', '[{\"course\":\"1\",\"grade\":\"85\"},{\"course\":\"2\",\"grade\":\"82\"},{\"course\":\"3\",\"grade\":\"78\"},{\"course\":\"4\",\"grade\":\"98\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"98\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"88\"}]', '18', '5'),
(19, '6', '[{\"course\":\"1\",\"grade\":\"82\"},{\"course\":\"2\",\"grade\":\"88\"},{\"course\":\"3\",\"grade\":\"79\"},{\"course\":\"4\",\"grade\":\"79\"},{\"course\":\"5\",\"grade\":\"96\"},{\"course\":\"6\",\"grade\":\"92\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"80\"}]', '19', '5'),
(20, '6', '[{\"course\":\"1\",\"grade\":\"91\"},{\"course\":\"2\",\"grade\":\"86\"},{\"course\":\"3\",\"grade\":\"96\"},{\"course\":\"4\",\"grade\":\"87\"},{\"course\":\"5\",\"grade\":\"90\"},{\"course\":\"6\",\"grade\":\"86\"},{\"course\":\"7\",\"grade\":\"89\"},{\"course\":\"8\",\"grade\":\"83\"}]', '20', '5'),
(21, '6', '[{\"course\":\"1\",\"grade\":\"80\"},{\"course\":\"2\",\"grade\":\"84\"},{\"course\":\"3\",\"grade\":\"77\"},{\"course\":\"4\",\"grade\":\"89\"},{\"course\":\"5\",\"grade\":\"89\"},{\"course\":\"6\",\"grade\":\"97\"},{\"course\":\"7\",\"grade\":\"82\"},{\"course\":\"8\",\"grade\":\"85\"}]', '21', '5'),
(22, '6', '[{\"course\":\"1\",\"grade\":\"94\"},{\"course\":\"2\",\"grade\":\"81\"},{\"course\":\"3\",\"grade\":\"77\"},{\"course\":\"4\",\"grade\":\"80\"},{\"course\":\"5\",\"grade\":\"91\"},{\"course\":\"6\",\"grade\":\"88\"},{\"course\":\"7\",\"grade\":\"75\"},{\"course\":\"8\",\"grade\":\"92\"}]', '22', '5'),
(23, '6', '[{\"course\":\"1\",\"grade\":\"88\"},{\"course\":\"2\",\"grade\":\"78\"},{\"course\":\"3\",\"grade\":\"79\"},{\"course\":\"4\",\"grade\":\"76\"},{\"course\":\"5\",\"grade\":\"82\"},{\"course\":\"6\",\"grade\":\"77\"},{\"course\":\"7\",\"grade\":\"80\"},{\"course\":\"8\",\"grade\":\"76\"}]', '23', '5'),
(24, '6', '[{\"course\":\"1\",\"grade\":\"81\"},{\"course\":\"2\",\"grade\":\"94\"},{\"course\":\"3\",\"grade\":\"80\"},{\"course\":\"4\",\"grade\":\"96\"},{\"course\":\"5\",\"grade\":\"81\"},{\"course\":\"6\",\"grade\":\"80\"},{\"course\":\"7\",\"grade\":\"92\"},{\"course\":\"8\",\"grade\":\"79\"}]', '24', '5'),
(25, '6', '[{\"course\":\"24\",\"grade\":\"81\"},{\"course\":\"25\",\"grade\":\"95\"},{\"course\":\"26\",\"grade\":\"85\"},{\"course\":\"27\",\"grade\":\"82\"},{\"course\":\"28\",\"grade\":\"88\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"76\"},{\"course\":\"31\",\"grade\":\"93\"}]', '25', '6'),
(26, '6', '[{\"course\":\"24\",\"grade\":\"87\"},{\"course\":\"25\",\"grade\":\"85\"},{\"course\":\"26\",\"grade\":\"81\"},{\"course\":\"27\",\"grade\":\"75\"},{\"course\":\"28\",\"grade\":\"80\"},{\"course\":\"29\",\"grade\":\"92\"},{\"course\":\"30\",\"grade\":\"94\"},{\"course\":\"31\",\"grade\":\"77\"}]', '26', '6'),
(27, '6', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"76\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"86\"},{\"course\":\"28\",\"grade\":\"94\"},{\"course\":\"29\",\"grade\":\"94\"},{\"course\":\"30\",\"grade\":\"95\"},{\"course\":\"31\",\"grade\":\"76\"}]', '27', '6'),
(28, '6', '[{\"course\":\"24\",\"grade\":\"83\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"87\"},{\"course\":\"27\",\"grade\":\"84\"},{\"course\":\"28\",\"grade\":\"75\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"98\"},{\"course\":\"31\",\"grade\":\"84\"}]', '28', '6'),
(29, '6', '[{\"course\":\"24\",\"grade\":\"85\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"86\"},{\"course\":\"27\",\"grade\":\"88\"},{\"course\":\"28\",\"grade\":\"90\"},{\"course\":\"29\",\"grade\":\"93\"},{\"course\":\"30\",\"grade\":\"97\"},{\"course\":\"31\",\"grade\":\"95\"}]', '29', '6'),
(30, '6', '[{\"course\":\"24\",\"grade\":\"81\"},{\"course\":\"25\",\"grade\":\"96\"},{\"course\":\"26\",\"grade\":\"90\"},{\"course\":\"27\",\"grade\":\"92\"},{\"course\":\"28\",\"grade\":\"85\"},{\"course\":\"29\",\"grade\":\"77\"},{\"course\":\"30\",\"grade\":\"86\"},{\"course\":\"31\",\"grade\":\"78\"}]', '30', '6'),
(31, '6', '[{\"course\":\"24\",\"grade\":\"91\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"93\"},{\"course\":\"27\",\"grade\":\"90\"},{\"course\":\"28\",\"grade\":\"76\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"83\"},{\"course\":\"31\",\"grade\":\"76\"}]', '31', '6'),
(32, '6', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"84\"},{\"course\":\"26\",\"grade\":\"89\"},{\"course\":\"27\",\"grade\":\"75\"},{\"course\":\"28\",\"grade\":\"84\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"82\"},{\"course\":\"31\",\"grade\":\"84\"}]', '32', '6'),
(33, '6', '[{\"course\":\"24\",\"grade\":\"99\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"96\"},{\"course\":\"27\",\"grade\":\"91\"},{\"course\":\"28\",\"grade\":\"77\"},{\"course\":\"29\",\"grade\":\"94\"},{\"course\":\"30\",\"grade\":\"77\"},{\"course\":\"31\",\"grade\":\"94\"}]', '33', '6'),
(34, '6', '[{\"course\":\"24\",\"grade\":\"85\"},{\"course\":\"25\",\"grade\":\"78\"},{\"course\":\"26\",\"grade\":\"84\"},{\"course\":\"27\",\"grade\":\"81\"},{\"course\":\"28\",\"grade\":\"99\"},{\"course\":\"29\",\"grade\":\"84\"},{\"course\":\"30\",\"grade\":\"87\"},{\"course\":\"31\",\"grade\":\"76\"}]', '34', '6'),
(35, '6', '[{\"course\":\"24\",\"grade\":\"84\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"91\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"97\"},{\"course\":\"30\",\"grade\":\"80\"},{\"course\":\"31\",\"grade\":\"99\"}]', '35', '6'),
(36, '6', '[{\"course\":\"24\",\"grade\":\"90\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"87\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"77\"},{\"course\":\"30\",\"grade\":\"76\"},{\"course\":\"31\",\"grade\":\"81\"}]', '36', '6'),
(37, '6', '[{\"course\":\"24\",\"grade\":\"96\"},{\"course\":\"25\",\"grade\":\"88\"},{\"course\":\"26\",\"grade\":\"91\"},{\"course\":\"27\",\"grade\":\"90\"},{\"course\":\"28\",\"grade\":\"98\"},{\"course\":\"29\",\"grade\":\"93\"},{\"course\":\"30\",\"grade\":\"92\"},{\"course\":\"31\",\"grade\":\"90\"}]', '37', '6'),
(38, '6', '[{\"course\":\"24\",\"grade\":\"97\"},{\"course\":\"25\",\"grade\":\"82\"},{\"course\":\"26\",\"grade\":\"87\"},{\"course\":\"27\",\"grade\":\"93\"},{\"course\":\"28\",\"grade\":\"97\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"98\"},{\"course\":\"31\",\"grade\":\"96\"}]', '38', '6'),
(39, '6', '[{\"course\":\"24\",\"grade\":\"86\"},{\"course\":\"25\",\"grade\":\"77\"},{\"course\":\"26\",\"grade\":\"82\"},{\"course\":\"27\",\"grade\":\"89\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"81\"},{\"course\":\"30\",\"grade\":\"87\"},{\"course\":\"31\",\"grade\":\"93\"}]', '39', '6'),
(40, '6', '[{\"course\":\"24\",\"grade\":\"82\"},{\"course\":\"25\",\"grade\":\"93\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"97\"},{\"course\":\"28\",\"grade\":\"81\"},{\"course\":\"29\",\"grade\":\"92\"},{\"course\":\"30\",\"grade\":\"78\"},{\"course\":\"31\",\"grade\":\"99\"}]', '40', '6'),
(41, '6', '[{\"course\":\"24\",\"grade\":\"79\"},{\"course\":\"25\",\"grade\":\"97\"},{\"course\":\"26\",\"grade\":\"95\"},{\"course\":\"27\",\"grade\":\"86\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"88\"},{\"course\":\"30\",\"grade\":\"91\"},{\"course\":\"31\",\"grade\":\"83\"}]', '41', '6'),
(42, '6', '[{\"course\":\"24\",\"grade\":\"95\"},{\"course\":\"25\",\"grade\":\"83\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"76\"},{\"course\":\"28\",\"grade\":\"80\"},{\"course\":\"29\",\"grade\":\"89\"},{\"course\":\"30\",\"grade\":\"93\"},{\"course\":\"31\",\"grade\":\"88\"}]', '42', '6'),
(43, '6', '[{\"course\":\"24\",\"grade\":\"98\"},{\"course\":\"25\",\"grade\":\"96\"},{\"course\":\"26\",\"grade\":\"78\"},{\"course\":\"27\",\"grade\":\"83\"},{\"course\":\"28\",\"grade\":\"78\"},{\"course\":\"29\",\"grade\":\"87\"},{\"course\":\"30\",\"grade\":\"78\"},{\"course\":\"31\",\"grade\":\"84\"}]', '43', '6'),
(44, '6', '[{\"course\":\"24\",\"grade\":\"84\"},{\"course\":\"25\",\"grade\":\"80\"},{\"course\":\"26\",\"grade\":\"75\"},{\"course\":\"27\",\"grade\":\"78\"},{\"course\":\"28\",\"grade\":\"93\"},{\"course\":\"29\",\"grade\":\"78\"},{\"course\":\"30\",\"grade\":\"90\"},{\"course\":\"31\",\"grade\":\"89\"}]', '44', '6'),
(45, '7', '[{\"course\":\"9\",\"grade\":\"80\"},{\"course\":\"10\",\"grade\":\"82\"},{\"course\":\"11\",\"grade\":\"84\"},{\"course\":\"12\",\"grade\":\"81\"},{\"course\":\"13\",\"grade\":\"76\"},{\"course\":\"14\",\"grade\":\"78\"},{\"course\":\"15\",\"grade\":\"75\"},{\"course\":\"16\",\"grade\":\"80\"}]', '4', '5'),
(46, '7', '[{\"course\":\"9\",\"grade\":\"83\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"76\"},{\"course\":\"12\",\"grade\":\"87\"},{\"course\":\"13\",\"grade\":\"89\"},{\"course\":\"14\",\"grade\":\"98\"},{\"course\":\"15\",\"grade\":\"88\"},{\"course\":\"16\",\"grade\":\"87\"}]', '6', '5'),
(47, '7', '[{\"course\":\"9\",\"grade\":\"84\"},{\"course\":\"10\",\"grade\":\"95\"},{\"course\":\"11\",\"grade\":\"98\"},{\"course\":\"12\",\"grade\":\"87\"},{\"course\":\"13\",\"grade\":\"84\"},{\"course\":\"14\",\"grade\":\"75\"},{\"course\":\"15\",\"grade\":\"93\"},{\"course\":\"16\",\"grade\":\"88\"}]', '7', '5'),
(48, '7', '[{\"course\":\"9\",\"grade\":\"88\"},{\"course\":\"10\",\"grade\":\"94\"},{\"course\":\"11\",\"grade\":\"95\"},{\"course\":\"12\",\"grade\":\"88\"},{\"course\":\"13\",\"grade\":\"89\"},{\"course\":\"14\",\"grade\":\"80\"},{\"course\":\"15\",\"grade\":\"92\"},{\"course\":\"16\",\"grade\":\"96\"}]', '9', '5'),
(49, '7', '[{\"course\":\"9\",\"grade\":\"76\"},{\"course\":\"10\",\"grade\":\"84\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"80\"},{\"course\":\"13\",\"grade\":\"78\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"92\"},{\"course\":\"16\",\"grade\":\"79\"}]', '10', '5'),
(50, '7', '[{\"course\":\"9\",\"grade\":\"90\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"81\"},{\"course\":\"12\",\"grade\":\"95\"},{\"course\":\"13\",\"grade\":\"90\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"82\"},{\"course\":\"16\",\"grade\":\"94\"}]', '11', '5'),
(51, '7', '[{\"course\":\"9\",\"grade\":\"99\"},{\"course\":\"10\",\"grade\":\"80\"},{\"course\":\"11\",\"grade\":\"83\"},{\"course\":\"12\",\"grade\":\"77\"},{\"course\":\"13\",\"grade\":\"95\"},{\"course\":\"14\",\"grade\":\"98\"},{\"course\":\"15\",\"grade\":\"82\"},{\"course\":\"16\",\"grade\":\"84\"}]', '12', '5'),
(52, '7', '[{\"course\":\"9\",\"grade\":\"96\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"91\"},{\"course\":\"12\",\"grade\":\"93\"},{\"course\":\"13\",\"grade\":\"85\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"94\"}]', '13', '5'),
(53, '7', '[{\"course\":\"9\",\"grade\":\"77\"},{\"course\":\"10\",\"grade\":\"97\"},{\"course\":\"11\",\"grade\":\"99\"},{\"course\":\"12\",\"grade\":\"88\"},{\"course\":\"13\",\"grade\":\"79\"},{\"course\":\"14\",\"grade\":\"99\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"91\"}]', '14', '5'),
(54, '7', '[{\"course\":\"9\",\"grade\":\"84\"},{\"course\":\"10\",\"grade\":\"95\"},{\"course\":\"11\",\"grade\":\"75\"},{\"course\":\"12\",\"grade\":\"81\"},{\"course\":\"13\",\"grade\":\"97\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"98\"},{\"course\":\"16\",\"grade\":\"96\"}]', '15', '5'),
(55, '7', '[{\"course\":\"9\",\"grade\":\"86\"},{\"course\":\"10\",\"grade\":\"85\"},{\"course\":\"11\",\"grade\":\"89\"},{\"course\":\"12\",\"grade\":\"89\"},{\"course\":\"13\",\"grade\":\"81\"},{\"course\":\"14\",\"grade\":\"85\"},{\"course\":\"15\",\"grade\":\"97\"},{\"course\":\"16\",\"grade\":\"76\"}]', '16', '5'),
(56, '7', '[{\"course\":\"9\",\"grade\":\"77\"},{\"course\":\"10\",\"grade\":\"87\"},{\"course\":\"11\",\"grade\":\"84\"},{\"course\":\"12\",\"grade\":\"83\"},{\"course\":\"13\",\"grade\":\"77\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"99\"},{\"course\":\"16\",\"grade\":\"75\"}]', '17', '5'),
(57, '7', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"94\"},{\"course\":\"11\",\"grade\":\"79\"},{\"course\":\"12\",\"grade\":\"80\"},{\"course\":\"13\",\"grade\":\"77\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"97\"},{\"course\":\"16\",\"grade\":\"88\"}]', '18', '5'),
(58, '7', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"92\"},{\"course\":\"12\",\"grade\":\"75\"},{\"course\":\"13\",\"grade\":\"75\"},{\"course\":\"14\",\"grade\":\"79\"},{\"course\":\"15\",\"grade\":\"86\"},{\"course\":\"16\",\"grade\":\"82\"}]', '19', '5'),
(59, '7', '[{\"course\":\"9\",\"grade\":\"95\"},{\"course\":\"10\",\"grade\":\"99\"},{\"course\":\"11\",\"grade\":\"92\"},{\"course\":\"12\",\"grade\":\"86\"},{\"course\":\"13\",\"grade\":\"90\"},{\"course\":\"14\",\"grade\":\"81\"},{\"course\":\"15\",\"grade\":\"84\"},{\"course\":\"16\",\"grade\":\"77\"}]', '20', '5'),
(60, '7', '[{\"course\":\"9\",\"grade\":\"78\"},{\"course\":\"10\",\"grade\":\"85\"},{\"course\":\"11\",\"grade\":\"99\"},{\"course\":\"12\",\"grade\":\"82\"},{\"course\":\"13\",\"grade\":\"91\"},{\"course\":\"14\",\"grade\":\"80\"},{\"course\":\"15\",\"grade\":\"85\"},{\"course\":\"16\",\"grade\":\"91\"}]', '21', '5'),
(61, '7', '[{\"course\":\"9\",\"grade\":\"95\"},{\"course\":\"10\",\"grade\":\"75\"},{\"course\":\"11\",\"grade\":\"80\"},{\"course\":\"12\",\"grade\":\"82\"},{\"course\":\"13\",\"grade\":\"96\"},{\"course\":\"14\",\"grade\":\"93\"},{\"course\":\"15\",\"grade\":\"83\"},{\"course\":\"16\",\"grade\":\"93\"}]', '22', '5'),
(62, '7', '[{\"course\":\"9\",\"grade\":\"88\"},{\"course\":\"10\",\"grade\":\"90\"},{\"course\":\"11\",\"grade\":\"80\"},{\"course\":\"12\",\"grade\":\"79\"},{\"course\":\"13\",\"grade\":\"75\"},{\"course\":\"14\",\"grade\":\"89\"},{\"course\":\"15\",\"grade\":\"96\"},{\"course\":\"16\",\"grade\":\"77\"}]', '23', '5'),
(63, '7', '[{\"course\":\"9\",\"grade\":\"75\"},{\"course\":\"10\",\"grade\":\"98\"},{\"course\":\"11\",\"grade\":\"93\"},{\"course\":\"12\",\"grade\":\"92\"},{\"course\":\"13\",\"grade\":\"95\"},{\"course\":\"14\",\"grade\":\"87\"},{\"course\":\"15\",\"grade\":\"94\"},{\"course\":\"16\",\"grade\":\"87\"}]', '24', '5'),
(64, '7', '[{\"course\":\"32\",\"grade\":\"91\"},{\"course\":\"33\",\"grade\":\"75\"},{\"course\":\"34\",\"grade\":\"93\"},{\"course\":\"35\",\"grade\":\"76\"},{\"course\":\"36\",\"grade\":\"77\"},{\"course\":\"37\",\"grade\":\"90\"},{\"course\":\"38\",\"grade\":\"80\"},{\"course\":\"39\",\"grade\":\"81\"}]', '25', '6'),
(65, '7', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"92\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"83\"},{\"course\":\"36\",\"grade\":\"93\"},{\"course\":\"37\",\"grade\":\"83\"},{\"course\":\"38\",\"grade\":\"90\"},{\"course\":\"39\",\"grade\":\"76\"}]', '26', '6'),
(66, '7', '[{\"course\":\"32\",\"grade\":\"84\"},{\"course\":\"33\",\"grade\":\"78\"},{\"course\":\"34\",\"grade\":\"87\"},{\"course\":\"35\",\"grade\":\"95\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"80\"},{\"course\":\"39\",\"grade\":\"86\"}]', '27', '6'),
(67, '7', '[{\"course\":\"32\",\"grade\":\"91\"},{\"course\":\"33\",\"grade\":\"77\"},{\"course\":\"34\",\"grade\":\"89\"},{\"course\":\"35\",\"grade\":\"82\"},{\"course\":\"36\",\"grade\":\"93\"},{\"course\":\"37\",\"grade\":\"98\"},{\"course\":\"38\",\"grade\":\"93\"},{\"course\":\"39\",\"grade\":\"79\"}]', '28', '6'),
(68, '7', '[{\"course\":\"32\",\"grade\":\"89\"},{\"course\":\"33\",\"grade\":\"83\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"87\"},{\"course\":\"36\",\"grade\":\"90\"},{\"course\":\"37\",\"grade\":\"83\"},{\"course\":\"38\",\"grade\":\"98\"},{\"course\":\"39\",\"grade\":\"75\"}]', '29', '6'),
(69, '7', '[{\"course\":\"32\",\"grade\":\"95\"},{\"course\":\"33\",\"grade\":\"89\"},{\"course\":\"34\",\"grade\":\"97\"},{\"course\":\"35\",\"grade\":\"77\"},{\"course\":\"36\",\"grade\":\"92\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"89\"},{\"course\":\"39\",\"grade\":\"91\"}]', '30', '6'),
(70, '7', '[{\"course\":\"32\",\"grade\":\"80\"},{\"course\":\"33\",\"grade\":\"90\"},{\"course\":\"34\",\"grade\":\"91\"},{\"course\":\"35\",\"grade\":\"99\"},{\"course\":\"36\",\"grade\":\"95\"},{\"course\":\"37\",\"grade\":\"77\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"97\"}]', '31', '6'),
(71, '7', '[{\"course\":\"32\",\"grade\":\"86\"},{\"course\":\"33\",\"grade\":\"79\"},{\"course\":\"34\",\"grade\":\"86\"},{\"course\":\"35\",\"grade\":\"94\"},{\"course\":\"36\",\"grade\":\"91\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"77\"},{\"course\":\"39\",\"grade\":\"86\"}]', '32', '6'),
(72, '7', '[{\"course\":\"32\",\"grade\":\"83\"},{\"course\":\"33\",\"grade\":\"75\"},{\"course\":\"34\",\"grade\":\"76\"},{\"course\":\"35\",\"grade\":\"82\"},{\"course\":\"36\",\"grade\":\"99\"},{\"course\":\"37\",\"grade\":\"86\"},{\"course\":\"38\",\"grade\":\"88\"},{\"course\":\"39\",\"grade\":\"78\"}]', '33', '6'),
(73, '7', '[{\"course\":\"32\",\"grade\":\"89\"},{\"course\":\"33\",\"grade\":\"97\"},{\"course\":\"34\",\"grade\":\"80\"},{\"course\":\"35\",\"grade\":\"81\"},{\"course\":\"36\",\"grade\":\"89\"},{\"course\":\"37\",\"grade\":\"84\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"90\"}]', '34', '6'),
(74, '7', '[{\"course\":\"32\",\"grade\":\"98\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"92\"},{\"course\":\"35\",\"grade\":\"86\"},{\"course\":\"36\",\"grade\":\"78\"},{\"course\":\"37\",\"grade\":\"85\"},{\"course\":\"38\",\"grade\":\"85\"},{\"course\":\"39\",\"grade\":\"92\"}]', '35', '6'),
(75, '7', '[{\"course\":\"32\",\"grade\":\"78\"},{\"course\":\"33\",\"grade\":\"91\"},{\"course\":\"34\",\"grade\":\"80\"},{\"course\":\"35\",\"grade\":\"90\"},{\"course\":\"36\",\"grade\":\"86\"},{\"course\":\"37\",\"grade\":\"84\"},{\"course\":\"38\",\"grade\":\"84\"},{\"course\":\"39\",\"grade\":\"77\"}]', '36', '6'),
(76, '7', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"77\"},{\"course\":\"34\",\"grade\":\"88\"},{\"course\":\"35\",\"grade\":\"87\"},{\"course\":\"36\",\"grade\":\"81\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"99\"},{\"course\":\"39\",\"grade\":\"90\"}]', '37', '6'),
(77, '7', '[{\"course\":\"32\",\"grade\":\"79\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"85\"},{\"course\":\"35\",\"grade\":\"95\"},{\"course\":\"36\",\"grade\":\"82\"},{\"course\":\"37\",\"grade\":\"99\"},{\"course\":\"38\",\"grade\":\"76\"},{\"course\":\"39\",\"grade\":\"98\"}]', '38', '6'),
(78, '7', '[{\"course\":\"32\",\"grade\":\"87\"},{\"course\":\"33\",\"grade\":\"94\"},{\"course\":\"34\",\"grade\":\"90\"},{\"course\":\"35\",\"grade\":\"83\"},{\"course\":\"36\",\"grade\":\"83\"},{\"course\":\"37\",\"grade\":\"77\"},{\"course\":\"38\",\"grade\":\"82\"},{\"course\":\"39\",\"grade\":\"96\"}]', '39', '6'),
(79, '7', '[{\"course\":\"32\",\"grade\":\"92\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"96\"},{\"course\":\"35\",\"grade\":\"96\"},{\"course\":\"36\",\"grade\":\"77\"},{\"course\":\"37\",\"grade\":\"78\"},{\"course\":\"38\",\"grade\":\"87\"},{\"course\":\"39\",\"grade\":\"78\"}]', '40', '6'),
(80, '7', '[{\"course\":\"32\",\"grade\":\"87\"},{\"course\":\"33\",\"grade\":\"88\"},{\"course\":\"34\",\"grade\":\"97\"},{\"course\":\"35\",\"grade\":\"76\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"95\"},{\"course\":\"38\",\"grade\":\"83\"},{\"course\":\"39\",\"grade\":\"86\"}]', '41', '6'),
(81, '7', '[{\"course\":\"32\",\"grade\":\"92\"},{\"course\":\"33\",\"grade\":\"89\"},{\"course\":\"34\",\"grade\":\"87\"},{\"course\":\"35\",\"grade\":\"93\"},{\"course\":\"36\",\"grade\":\"97\"},{\"course\":\"37\",\"grade\":\"98\"},{\"course\":\"38\",\"grade\":\"90\"},{\"course\":\"39\",\"grade\":\"91\"}]', '42', '6'),
(82, '7', '[{\"course\":\"32\",\"grade\":\"99\"},{\"course\":\"33\",\"grade\":\"85\"},{\"course\":\"34\",\"grade\":\"85\"},{\"course\":\"35\",\"grade\":\"90\"},{\"course\":\"36\",\"grade\":\"84\"},{\"course\":\"37\",\"grade\":\"79\"},{\"course\":\"38\",\"grade\":\"77\"},{\"course\":\"39\",\"grade\":\"85\"}]', '43', '6'),
(83, '7', '[{\"course\":\"32\",\"grade\":\"78\"},{\"course\":\"33\",\"grade\":\"94\"},{\"course\":\"34\",\"grade\":\"84\"},{\"course\":\"35\",\"grade\":\"86\"},{\"course\":\"36\",\"grade\":\"91\"},{\"course\":\"37\",\"grade\":\"82\"},{\"course\":\"38\",\"grade\":\"87\"},{\"course\":\"39\",\"grade\":\"87\"}]', '44', '6'),
(84, '6', '[{\"course\":\"1\",\"grade\":\"90\"},{\"course\":\"2\",\"grade\":\"87\"},{\"course\":\"3\",\"grade\":\"95\"},{\"course\":\"4\",\"grade\":\"94\"},{\"course\":\"5\",\"grade\":\"86\"},{\"course\":\"6\",\"grade\":\"89\"},{\"course\":\"7\",\"grade\":\"90\"},{\"course\":\"8\",\"grade\":\"92\"}]', '45', '5');

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
(1, 1, 1, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"A11\",\"Value\":\"5\"},{\"ID\":\"A12\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"B13\",\"Value\":\"5\"},{\"ID\":\"B14\",\"Value\":\"5\"},{\"ID\":\"B15\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"C16\",\"Value\":\"5\"},{\"ID\":\"C17\",\"Value\":\"5\"},{\"ID\":\"C18\",\"Value\":\"5\"},{\"ID\":\"C19\",\"Value\":\"5\"},{\"ID\":\"C20\",\"Value\":\"5\"},{\"ID\":\"C21\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"4\"},{\"ID\":\"D8\",\"Value\":\"4\"},{\"ID\":\"D22\",\"Value\":\"4\"},{\"ID\":\"D23\",\"Value\":\"4\"},{\"ID\":\"D24\",\"Value\":\"4\"},{\"ID\":\"D25\",\"Value\":\"4\"},{\"ID\":\"D26\",\"Value\":\"5\"},{\"ID\":\"D27\",\"Value\":\"4\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"},{\"ID\":\"E28\",\"Value\":\"4\"},{\"ID\":\"E29\",\"Value\":\"5\"},{\"ID\":\"E30\",\"Value\":\"4\"},{\"ID\":\"E31\",\"Value\":\"5\"},{\"ID\":\"E32\",\"Value\":\"5\"}]', '\'\''),
(2, 1, 2, '[{\"ID\":\"A1\",\"Value\":\"5\"},{\"ID\":\"A2\",\"Value\":\"5\"},{\"ID\":\"A11\",\"Value\":\"5\"},{\"ID\":\"A12\",\"Value\":\"5\"},{\"ID\":\"B3\",\"Value\":\"5\"},{\"ID\":\"B4\",\"Value\":\"5\"},{\"ID\":\"B13\",\"Value\":\"5\"},{\"ID\":\"B14\",\"Value\":\"4\"},{\"ID\":\"B15\",\"Value\":\"5\"},{\"ID\":\"C5\",\"Value\":\"5\"},{\"ID\":\"C6\",\"Value\":\"5\"},{\"ID\":\"C16\",\"Value\":\"5\"},{\"ID\":\"C17\",\"Value\":\"5\"},{\"ID\":\"C18\",\"Value\":\"5\"},{\"ID\":\"C19\",\"Value\":\"5\"},{\"ID\":\"C20\",\"Value\":\"5\"},{\"ID\":\"C21\",\"Value\":\"5\"},{\"ID\":\"D7\",\"Value\":\"5\"},{\"ID\":\"D8\",\"Value\":\"5\"},{\"ID\":\"D22\",\"Value\":\"5\"},{\"ID\":\"D23\",\"Value\":\"5\"},{\"ID\":\"D24\",\"Value\":\"5\"},{\"ID\":\"D25\",\"Value\":\"5\"},{\"ID\":\"D26\",\"Value\":\"5\"},{\"ID\":\"D27\",\"Value\":\"5\"},{\"ID\":\"E9\",\"Value\":\"5\"},{\"ID\":\"E10\",\"Value\":\"5\"},{\"ID\":\"E28\",\"Value\":\"5\"},{\"ID\":\"E29\",\"Value\":\"5\"},{\"ID\":\"E30\",\"Value\":\"5\"},{\"ID\":\"E31\",\"Value\":\"5\"},{\"ID\":\"E32\",\"Value\":\"5\"}]', '\'\'');

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
(8, 'IT42', 'CET');

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
  `active` tinyint(1) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(45, '14-0041', 'password', 'Issho', '', '', '1', 'CET', 'IT', '14-UC-02-0041-63');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `course_log`
--
ALTER TABLE `course_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `eval_log`
--
ALTER TABLE `eval_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
