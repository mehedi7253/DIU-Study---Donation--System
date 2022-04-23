-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin'),
(2, 'mehedi@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5e5649089d9ff', '5e5649089e6d1'),
('5e564908a13f3', '5e564908a2ce9'),
('5e56ad521df73', '5e56ad521eb89'),
('5e56ad52239a5', '5e56ad522485f'),
('5e56ad5229c03', '5e56ad522a979'),
('5e56ad522e532', '5e56ad522fb71'),
('5e56ad52353c5', '5e56ad5236428'),
('5e57b81101d6e', '5e57b81102ff7'),
('5e57b81106e5d', '5e57b81107f6e'),
('5e57b8558fbb8', '5e57b85590634'),
('5e5808e32c32f', '5e5808e32fa4e'),
('5e580c65ed7b2', '5e580c65ef1cd'),
('5e580c6600799', '5e580c660228e'),
('5e580c66070c5', '5e580c66079ad'),
('5e76631a438d7', '5e76631a446e8'),
('5e76631a47d62', '5e76631a486c8'),
('5e76641261bd4', '5e76641262b36'),
('5e766412666f4', '5e76641268295');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `application` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_fee` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `course_fee`, `teacher`, `image`) VALUES
(7, 'Web Development', '', 'majadur rahman', ''),
(8, 'Networking ', '', '', ''),
(9, 'Accounting', '', '', ''),
(10, 'Data Structure', '', '', ''),
(11, 'C#', '', 'majadur rahman', '');

-- --------------------------------------------------------

--
-- Table structure for table `curse_video`
--

CREATE TABLE `curse_video` (
  `id` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `fcname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curse_video`
--

INSERT INTO `curse_video` (`id`, `teacherID`, `fcname`, `subject`, `name`, `url`) VALUES
(5, 10, 'mehedi hasan', 'Web Development', 'Kichu Bhul ( কিছুভুল ) _ Avraal Sahir _ Muna _ Afran Nisho _ Mehazabien _ Bangla New Song 2019.mp4', '469303405.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donet_id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `donet_condition` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donet_id`, `studentID`, `author`, `book`, `donet_condition`, `student_name`, `depertment`, `description`, `image`, `date`, `status`) VALUES
(10, 68, 'Mehedi', 'PHP', 'Medium', 'mehedi hasan', 'CIS', 'php', 'Capture.PNG', '2020-02-22', 1),
(11, 67, 'Jon', 'Networking', 'Urgent', 'majadur rahman', 'CSE', 'I need this book very urgent.', 'lrg.jpg', '2020-02-24', 1),
(12, 68, 'jon smith. 12th edition ', 'Computer Network', 'Urgent', 'mehedi hasan', 'CSE', 'i need this book very urgentlu.', 'lrg.jpg', '2020-03-21', 1),
(14, 68, 'jon smith. 12th edition ', 'Computer Network', 'Urgent', 'mehedi hasan', 'CSE', 'i need this book very urgentlu.', 'lrg.jpg', '2020-03-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doner`
--

CREATE TABLE `doner` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doner`
--

INSERT INTO `doner` (`id`, `first_name`, `last_name`, `username`, `password`, `status`, `contact`, `address`, `nid`, `image`, `date`) VALUES
(1, 'mehedi', 'hasan', 'mehedi@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '01941697253', 'Panthapath', '12456354544', 'IMG_20190518_191935-01.jpeg', '2020-02-23'),
(2, 'santo', 'hasan', 'm@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '01755374793', 'panthapath', '', 'Capture.PNG', '2020-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_course`
--

CREATE TABLE `enroll_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `student_id` int(10) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enroll_course`
--

INSERT INTO `enroll_course` (`id`, `course_name`, `student_id`, `teacher`, `date`) VALUES
(11, ' Web Development, Data Structure, C#, ', 69, 'majadur', '2020-03-22'),
(12, ' Networking , Data Structure, ', 67, 'mehedi', '2020-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `depertment`, `event_title`, `event_desc`, `start_date`, `image`, `notify`) VALUES
(4, 'CIS', 'programming Contest', 'test your programming skills..attend here and get certificed. ', '2020-03-03', 'client.PNG', 0),
(5, 'CSE', 'project Show', 'Show your project...attend here and get price. ', '2020-04-13', 'lrg.jpg', 0),
(6, 'SWE', 'test', 'TEST', '2111-12-11', 'lrg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('55846be776610', 'testing', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
('5586ee27af2c9', 'vikas', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm'),
('5589858b6c43b', 'nik', 'nik1@gmail.com', 'good', 'good site', '2015-06-23', '06:12:59pm'),
('5e50188a47344', '', '', '', '', '2020-02-21', '06:51:06pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('mehedi@gmail.com', '5e5648f8a38fe', 2, 2, 2, 0, '2020-02-26 17:05:42'),
('majadur@gmail.com', '5e5648f8a38fe', 2, 2, 2, 0, '2020-02-26 17:31:34'),
('majadur@gmail.com', '5e56abde1be6f', 3, 5, 3, 2, '2020-02-26 17:53:45'),
('mehedi@gmail.com', '5e56abde1be6f', 3, 5, 3, 2, '2020-02-26 20:03:21'),
('m@gmail.com', '5e5648f8a38fe', 0, 2, 0, 2, '2020-02-26 20:48:27'),
('m@gmail.com', '5e56abde1be6f', 0, 5, 0, 5, '2020-02-26 20:53:30'),
('sadia@diu.edu.bd', '5e5648f8a38fe', 0, 2, 0, 2, '2020-02-27 12:35:06'),
('sadia@diu.edu.bd', '5e57b80324070', 0, 2, 0, 2, '2020-02-27 12:37:49'),
('sadia@diu.edu.bd', '5e57b84d3f23c', 0, 1, 0, 1, '2020-02-27 12:39:00'),
('mehedi@gmail.com', '5e57b84d3f23c', 0, 1, 0, 1, '2020-02-27 12:39:51'),
('mehedi@gmail.com', '5e57b80324070', 0, 2, 0, 2, '2020-02-27 12:40:03'),
('majadur@gmail.com', '5e57b84d3f23c', 1, 1, 1, 0, '2020-02-27 18:25:18'),
('majadur@gmail.com', '5e57b80324070', 2, 2, 2, 0, '2020-02-27 18:25:26'),
('majadur@gmail.com', '5e5808dca08c5', 0, 1, 0, 1, '2020-02-27 18:29:07'),
('sadia@diu.edu.bd', '5e5808dca08c5', 1, 1, 1, 0, '2020-02-27 18:29:41'),
('sadia@diu.edu.bd', '5e56abde1be6f', 4, 5, 4, 1, '2020-02-27 18:29:59'),
('sadia@diu.edu.bd', '5e580be2b2734', 2, 3, 2, 1, '2020-02-28 18:51:24'),
('mehedi@gmail.com', '5e5808dca08c5', 1, 1, 1, 0, '2020-03-21 15:42:44'),
('majadur@gmail.com', '5e580be2b2734', 3, 3, 3, 0, '2020-03-21 18:53:53'),
('majadur@gmail.com', '5e766303da119', 1, 2, 1, 1, '2020-03-21 18:55:50'),
('majadur@gmail.com', '5e7663fbb0d65', 2, 2, 2, 2, '2020-03-21 19:00:10'),
('majadur@gmail.com', '5e7663fbb0d65', 2, 2, 2, 0, '2020-03-21 19:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(255) NOT NULL,
  `notice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice_title`, `notice`) VALUES
(2, 'off notice', 'friday all classes of');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5e5649089d9ff', '3', '5e5649089e6d1'),
('5e5649089d9ff', '3', '5e5649089e6da'),
('5e5649089d9ff', '32', '5e5649089e6dc'),
('5e5649089d9ff', '23', '5e5649089e6dd'),
('5e564908a13f3', '4', '5e564908a2ce2'),
('5e564908a13f3', 're', '5e564908a2ce9'),
('5e564908a13f3', 're', '5e564908a2cee'),
('5e564908a13f3', 're', '5e564908a2cef'),
('5e56ad521df73', '  Cat 3', '5e56ad521eb89'),
('5e56ad521df73', '  Cat 4', '5e56ad521eb8d'),
('5e56ad521df73', '  Cat 5', '5e56ad521eb8e'),
('5e56ad521df73', 'Ibm type 5', '5e56ad521eb8f'),
('5e56ad52239a5', 'Sever based', '5e56ad5224859'),
('5e56ad52239a5', 'peer based', '5e56ad522485f'),
('5e56ad52239a5', 'optical based', '5e56ad5224860'),
('5e56ad52239a5', 'both 1 & 2 ', '5e56ad5224861'),
('5e56ad5229c03', 'Physical', '5e56ad522a975'),
('5e56ad5229c03', 'Optical', '5e56ad522a979'),
('5e56ad5229c03', 'dhaska', '5e56ad522a97a'),
('5e56ad5229c03', 'aslhad', '5e56ad522a97b'),
('5e56ad522e532', 'Hub', '5e56ad522fb6c'),
('5e56ad522e532', 'Repeater', '5e56ad522fb71'),
('5e56ad522e532', 'Coket', '5e56ad522fb72'),
('5e56ad522e532', 'sd', '5e56ad522fb73'),
('5e56ad52353c5', 'ip', '5e56ad5236421'),
('5e56ad52353c5', 'ipx', '5e56ad5236426'),
('5e56ad52353c5', 'Appletalk', '5e56ad5236427'),
('5e56ad52353c5', 'Betbeui', '5e56ad5236428'),
('5e57b81101d6e', 'sdf', '5e57b81102ff7'),
('5e57b81101d6e', 'sdf', '5e57b81102ffd'),
('5e57b81101d6e', 'sdf', '5e57b81102ffe'),
('5e57b81101d6e', 'df', '5e57b81103000'),
('5e57b81106e5d', 'sdf', '5e57b81107f66'),
('5e57b81106e5d', 'sdf', '5e57b81107f6e'),
('5e57b81106e5d', 'sdf', '5e57b81107f71'),
('5e57b81106e5d', 'sdf', '5e57b81107f73'),
('5e57b8558fbb8', 'dsf', '5e57b85590634'),
('5e57b8558fbb8', 'sfd', '5e57b8559063d'),
('5e57b8558fbb8', 'sdf', '5e57b8559063e'),
('5e57b8558fbb8', 'sdf', '5e57b8559063f'),
('5e5808e32c32f', 'sa', '5e5808e32fa4e'),
('5e5808e32c32f', 'a', '5e5808e32fa53'),
('5e5808e32c32f', 'a', '5e5808e32fa54'),
('5e5808e32c32f', 'a', '5e5808e32fa55'),
('5e580c65ed7b2', 'sql', '5e580c65ef1cd'),
('5e580c65ed7b2', 'sds', '5e580c65ef1d2'),
('5e580c65ed7b2', 'sdk', '5e580c65ef1d3'),
('5e580c65ed7b2', 'sdk', '5e580c65ef1d5'),
('5e580c6600799', 'select table ', '5e580c660228e'),
('5e580c6600799', 'sellect culum', '5e580c6602292'),
('5e580c6600799', 'sf', '5e580c6602293'),
('5e580c6600799', 'sdf', '5e580c6602294'),
('5e580c66070c5', 'sdfsdf', '5e580c66079a6'),
('5e580c66070c5', 'sdf', '5e580c66079ac'),
('5e580c66070c5', 'sdf', '5e580c66079ad'),
('5e580c66070c5', 'sdfsdf', '5e580c66079ae'),
('5e76631a438d7', 'a', '5e76631a446e8'),
('5e76631a438d7', 'b', '5e76631a446ee'),
('5e76631a438d7', 'c', '5e76631a446ef'),
('5e76631a438d7', 'd', '5e76631a446f0'),
('5e76631a47d62', 'a', '5e76631a486c2'),
('5e76631a47d62', 'aqa', '5e76631a486c6'),
('5e76631a47d62', 'sd', '5e76631a486c7'),
('5e76631a47d62', 's', '5e76631a486c8'),
('5e76641261bd4', 'S', '5e76641262b36'),
('5e76641261bd4', 'A', '5e76641262b3e'),
('5e76641261bd4', 'A', '5e76641262b3f'),
('5e76641261bd4', 'A', '5e76641262b40'),
('5e766412666f4', 'SD', '5e76641268290'),
('5e766412666f4', 'SD', '5e76641268295'),
('5e766412666f4', 'DSW', '5e76641268296'),
('5e766412666f4', 'S', '5e76641268297');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5e5648f8a38fe', '5e5649089d9ff', 'dsfg', 4, 1),
('5e5648f8a38fe', '5e564908a13f3', 'tf', 4, 2),
('5e56abde1be6f', '5e56ad521df73', 'Which of these unshielded twisted pair cabling can you use for 10baseT networks with transmission speeds of up to 10 mbps?', 4, 1),
('5e56abde1be6f', '5e56ad52239a5', 'A network of 10 or fewer workstations connected by cable for the direct sharing file and hardware resources is which type of network? ', 4, 2),
('5e56abde1be6f', '5e56ad5229c03', 'A network bridge operates at which layer of the osi model? ', 4, 3),
('5e56abde1be6f', '5e56ad522e532', 'The connectivity device that is used to provide flexibility in cable management and troubleshooting is the?', 4, 4),
('5e56abde1be6f', '5e56ad52353c5', 'Which of the following network protocols is not routable? ', 4, 5),
('5e57b80324070', '5e57b81101d6e', 'dsf', 4, 1),
('5e57b80324070', '5e57b81106e5d', 'sdfsfd', 4, 2),
('5e57b84d3f23c', '5e57b8558fbb8', 'dsf', 4, 1),
('5e5808dca08c5', '5e5808e32c32f', 's', 4, 1),
('5e580be2b2734', '5e580c65ed7b2', 'Databse is.........', 4, 1),
('5e580be2b2734', '5e580c6600799', 'select * from table name is..........query', 4, 2),
('5e580be2b2734', '5e580c66070c5', 'sdfsdfsdf', 4, 3),
('5e766303da119', '5e76631a438d7', 'a', 4, 1),
('5e766303da119', '5e76631a47d62', 'b', 4, 2),
('5e7663fbb0d65', '5e76641261bd4', 'HJBJD', 4, 1),
('5e7663fbb0d65', '5e766412666f4', 'D,ABJFAK', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5e5648f8a38fe', 'Php', 1, 0, 2, 2, '', '', '2020-02-26 10:31:20'),
('5e56abde1be6f', 'Networking', 1, 0, 5, 0, '', '', '2020-02-26 17:33:18'),
('5e57b80324070', 'Php2', 1, 0, 2, 0, '', '', '2020-02-27 12:37:23'),
('5e57b84d3f23c', 'Fd', 1, 0, 1, 2, '', '', '2020-02-27 12:38:37'),
('5e5808dca08c5', 'M', 1, 0, 1, 1, '', '', '2020-02-27 18:22:20'),
('5e580be2b2734', 'Database', 1, 0, 3, 5, '', '', '2020-02-27 18:35:14'),
('5e766303da119', 'Test', 1, 0, 2, 2, '', '', '2020-03-21 18:54:59'),
('5e7663fbb0d65', 'Test 2', 1, 0, 2, 5, '', '', '2020-03-21 18:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('majadur@gmail.com', 18, '2020-03-21 19:00:10'),
('mehedi@gmail.com', 10, '2020-03-21 15:42:44'),
('m@gmail.com', 0, '2020-02-26 20:53:30'),
('sadia@diu.edu.bd', 7, '2020-02-28 18:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `rechive_donation`
--

CREATE TABLE `rechive_donation` (
  `id` int(11) NOT NULL,
  `donerID` int(11) NOT NULL,
  `doner_name` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `txtID` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechive_donation`
--

INSERT INTO `rechive_donation` (`id`, `donerID`, `doner_name`, `studentID`, `student_name`, `book`, `author`, `amount`, `txtID`, `date`, `status`) VALUES
(1, 1, 'mehedi hasan', 68, 'mehedi hasan', 'Computer Network', 'jon smith. 12th edition ', 200, 'hhj', '2020-03-21', 0),
(2, 1, 'mehedi hasan', 67, 'majadur rahman', 'Networking', 'Jon', 300, 'Mehedi', '2020-03-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rechive_exchange`
--

CREATE TABLE `rechive_exchange` (
  `id` int(11) NOT NULL,
  `exchanger_contact` varchar(255) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `exchangerID` int(10) NOT NULL,
  `exchanger_name` varchar(255) NOT NULL,
  `exchange_with` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechive_exchange`
--

INSERT INTO `rechive_exchange` (`id`, `exchanger_contact`, `studentID`, `student_name`, `exchangerID`, `exchanger_name`, `exchange_with`, `description`, `status`, `date`, `filename`) VALUES
(5, '01941697253', 67, 'majadur rahman', 1, 'mehedi hasan', 'PHP', 'I have Php book', 1, '2020-02-25', '1-API.txt'),
(6, '01941697253', 68, 'mehedi hasan', 1, 'mehedi hasan', 'sdg', 'sdg', 1, '2020-02-25', '6-Mehedi_CV.pdf'),
(7, '01941697253', 68, 'mehedi hasan', 1, 'mehedi hasan', 'PHP', 'i have this book', 1, '2020-02-25', '7-New Text Document.txt'),
(8, '01941697253', 68, 'mehedi hasan', 1, 'mehedi hasan', 'gf', 'bfgh', 1, '2020-02-26', '8-Mehedi_CV.pdf'),
(9, '01941697253', 67, 'majadur rahman', 1, 'mehedi hasan', 'php book', 'its new', 1, '2020-02-26', '9-Project Proposal(Phase II) (1) - Copy.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `rechive_sell`
--

CREATE TABLE `rechive_sell` (
  `id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `buyrID` int(10) NOT NULL,
  `buyer_contact` varchar(255) NOT NULL,
  `txt_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechive_sell`
--

INSERT INTO `rechive_sell` (`id`, `studentID`, `student_name`, `amount`, `book_name`, `author_name`, `status`, `date`, `buyer_name`, `buyrID`, `buyer_contact`, `txt_id`) VALUES
(1, 67, 'majadur rahman', '120', 'PHP', 'Mehdi', 1, '0000-00-00', 'mehedi hasan', 1, '01941697253', 'xyz'),
(2, 68, 'mehedi hasan', '100', 'CN', 'Jon', 0, '2020-02-25', 'mehedi hasan', 1, '01941697253', 'BVG-45'),
(3, 68, 'mehedi hasan', '80', 'hjk', 'hjk', 1, '2020-02-26', 'mehedi hasan', 1, '01941697253', 'jhgj'),
(4, 68, 'mehedi hasan', '80', 'hjk', 'hjk', 1, '2020-02-26', 'santo hasan', 2, '01755374793', 'cvc'),
(5, 68, 'mehedi hasan', '80', 'hjk', 'hjk', 1, '2020-02-26', 'santo hasan', 2, '01755374793', 'vf');

-- --------------------------------------------------------

--
-- Table structure for table `request_exchange`
--

CREATE TABLE `request_exchange` (
  `exchange_id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `condition_exchange` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_exchange`
--

INSERT INTO `request_exchange` (`exchange_id`, `studentID`, `student_name`, `depertment`, `book_name`, `author_name`, `condition_exchange`, `description`, `image`, `status`, `date`) VALUES
(1, 68, 'mehedi hasan', 'CIS', 'php', 'jon', 'Old', 'I want to exchange my php book with networking book.,', 'lrg.jpg', 1, '2020-02-24'),
(2, 67, 'majadur rahman', 'CSE', 'CN', 'Karim', 'Old', 'i need this book urgently', 'bb.PNG', 1, '2020-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `request_sell`
--

CREATE TABLE `request_sell` (
  `sell_id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `past_price` varchar(255) NOT NULL,
  `present_price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_sell`
--

INSERT INTO `request_sell` (`sell_id`, `studentID`, `student_name`, `dept`, `book_name`, `author_name`, `past_price`, `present_price`, `description`, `date`, `status`, `image`) VALUES
(5, 68, 'mehedi hasan', 'CIS', 'CN', 'Jon', '150', '100', 'New Condition', '2020-02-19', 1, 'lrg.jpg'),
(7, 68, 'mehedi hasan', 'CIS', 'hjk', 'hjk', '200', '80', 'hjk', '2020-02-19', 1, 'lrg.jpg'),
(8, 67, 'majadur rahman', 'CSE', 'PHP', 'Mehdi', '150', '120', 'Book condition is good.', '2020-02-24', 1, 'lrg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `depertment` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `fatherphone` varchar(255) NOT NULL,
  `motherphone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `username`, `depertment`, `password`, `status`, `contact`, `address`, `dob`, `gender`, `fathername`, `mothername`, `fatherphone`, `motherphone`, `image`) VALUES
(67, 'majadur', 'rahman', 'majadur@gmail.com', 'CSE', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01755374793', 'west rajabazar', '1995-12-11', 'Male', 'kashem', 'fatema', '012454552', '01255465', 'IMG_0241.JPG'),
(68, 'mehedi', 'hasan', 'mehedi@gmail.com', 'CSE', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'panthapath', '1196-12-12', 'Male', 'nurul islam', 'fatema islam', '0175545', '2154854', 'rsz_img_2225-01.jpg'),
(69, 'Hasan', 'Santo', 'm@gmail.com', 'CIS', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0', '01941697253', 'dhaka', '1996-12-12', 'Male', 'nurul  Islam', 'fatema islam', '012455', '01255', 'bb.PNG'),
(71, 'sadia', 'sultana', 'sadia@diu.edu.bd', 'SWE', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1', '01755374793', 'West Raza Bazar', '2000-11-28', 'Female', 'jahngir pradhania', 'Lona Ackter', '012445444', '14454547', 'idcard.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `fcname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `teacherID`, `filename`, `created`, `fcname`, `title`, `subject`) VALUES
(40, 10, '1-38-Basic_Router_Config.pdf', '2020-03-22 11:01:50', 'mehedi hasan', 'first class lecture ', 'Networking ');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `subject_teach` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `address` varchar(300) NOT NULL,
  `exp` varchar(225) NOT NULL,
  `nid` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `ssc` varchar(225) NOT NULL,
  `ssc_sub` varchar(255) NOT NULL,
  `ssc_inis` varchar(255) NOT NULL,
  `ssc_res` varchar(255) NOT NULL,
  `ssc_pass_year` varchar(255) NOT NULL,
  `ssc_award` varchar(255) NOT NULL,
  `hsc` varchar(225) NOT NULL,
  `hsc_sub` varchar(255) NOT NULL,
  `hsc_inis` varchar(255) NOT NULL,
  `hsc_res` varchar(255) NOT NULL,
  `hsc_pass_year` varchar(255) NOT NULL,
  `hsc_award` varchar(255) NOT NULL,
  `hons` varchar(225) NOT NULL,
  `msc` varchar(225) NOT NULL,
  `msc_sub` varchar(255) NOT NULL,
  `msc_inis` varchar(255) NOT NULL,
  `msc_res` varchar(255) NOT NULL,
  `msc_pass_year` varchar(255) NOT NULL,
  `msc_award` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `hons_sub` varchar(255) NOT NULL,
  `hons_inis` varchar(255) NOT NULL,
  `hons_res` varchar(255) NOT NULL,
  `hons_pass_year` varchar(255) DEFAULT NULL,
  `hons_award` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `username`, `password`, `subject_teach`, `contact`, `address`, `exp`, `nid`, `image`, `date`, `ssc`, `ssc_sub`, `ssc_inis`, `ssc_res`, `ssc_pass_year`, `ssc_award`, `hsc`, `hsc_sub`, `hsc_inis`, `hsc_res`, `hsc_pass_year`, `hsc_award`, `hons`, `msc`, `msc_sub`, `msc_inis`, `msc_res`, `msc_pass_year`, `msc_award`, `status`, `hons_sub`, `hons_inis`, `hons_res`, `hons_pass_year`, `hons_award`) VALUES
(8, 'majadur', 'rahman', 'majadur@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Web, network', '01245554555', 'panthapath', 'teaching', '12565255248544158784', 'IMG_0335.JPG', '2020-01-09', 'SSC', 'scince', 'shaid sriti school and college', 'A+', '2013', 'Higest Marks', 'HSC', 'Science ', 'dhaka college', 'A', '2015', '', 'BSc In CIS', '', '', '', '', '', '', '0', 'CIS', 'Daffodil International Univarsity', '3.30', '2020', ''),
(10, 'mehedi', 'hasan', 'm@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', '', '', '', '123554445', 'lrg.jpg', '2020-02-21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Majadur  Rahman', ' Male', ' CSE', 'majadur@gmail.com', 1941697253, '827ccb0eea8a706c4c34a16891f84e7b'),
('Mehedi  Hasan', ' Male', ' CIS', 'mehedi@gmail.com', 1941697253, '827ccb0eea8a706c4c34a16891f84e7b'),
('Hasan  Santo', 'Male', ' Software', 'm@gmail.com', 1941697253, '827ccb0eea8a706c4c34a16891f84e7b'),
('Sadia  Sultana', 'Femal', ' SWE', 'sadia@diu.edu.bd', 1755374793, '827ccb0eea8a706c4c34a16891f84e7b'),
('Mehedi  Hasan', 'Male', ' CSE', 'mehedi@gmail.com', 1941697253, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curse_video`
--
ALTER TABLE `curse_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donet_id`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `doner`
--
ALTER TABLE `doner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_course`
--
ALTER TABLE `enroll_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rechive_donation`
--
ALTER TABLE `rechive_donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donerID` (`donerID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `rechive_exchange`
--
ALTER TABLE `rechive_exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `rechive_sell`
--
ALTER TABLE `rechive_sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `request_exchange`
--
ALTER TABLE `request_exchange`
  ADD PRIMARY KEY (`exchange_id`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `request_sell`
--
ALTER TABLE `request_sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `curse_video`
--
ALTER TABLE `curse_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enroll_course`
--
ALTER TABLE `enroll_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rechive_donation`
--
ALTER TABLE `rechive_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rechive_exchange`
--
ALTER TABLE `rechive_exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rechive_sell`
--
ALTER TABLE `rechive_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_exchange`
--
ALTER TABLE `request_exchange`
  MODIFY `exchange_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_sell`
--
ALTER TABLE `request_sell`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curse_video`
--
ALTER TABLE `curse_video`
  ADD CONSTRAINT `curse_video_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `enroll_course`
--
ALTER TABLE `enroll_course`
  ADD CONSTRAINT `enroll_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rechive_donation`
--
ALTER TABLE `rechive_donation`
  ADD CONSTRAINT `rechive_donation_ibfk_1` FOREIGN KEY (`donerID`) REFERENCES `doner` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rechive_donation_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rechive_exchange`
--
ALTER TABLE `rechive_exchange`
  ADD CONSTRAINT `rechive_exchange_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rechive_sell`
--
ALTER TABLE `rechive_sell`
  ADD CONSTRAINT `rechive_sell_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `request_exchange`
--
ALTER TABLE `request_exchange`
  ADD CONSTRAINT `request_exchange_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `request_sell`
--
ALTER TABLE `request_sell`
  ADD CONSTRAINT `request_sell_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD CONSTRAINT `tbl_files_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teachers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
