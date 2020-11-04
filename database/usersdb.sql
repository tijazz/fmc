-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 12:20 PM
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
-- Database: `usersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `organization`) VALUES
(1, 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a', 'Dufma'),
(2, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda', 'Dufma');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantity` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `place` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `location`, `category`, `place`, `status`, `date`) VALUES
(1, 2, NULL, 'dsl', 'dcl iron', '12', 'Abdullahi', 'Oyo', 'A.C.', 'ibadan', 'in stock', '2020-08-16 00:00:00'),
(3, 2, NULL, 'Abdullahi Temidayo Jimoh', 'camry404', '12', 'Adullahi', 'Oyo, Nigeria.', 'fan', 'ibadan', 'out stock', '2020-08-27 00:00:00'),
(4, 1, 1, 'Terminus', 'camry404', '12', 'jat', 'Oyo, Nigeria.', 'fan', 'ibadan', 'in stock', '2020-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`id`, `user_id`, `org_id`, `type`, `name`, `description`, `amount`, `date`) VALUES
(1, 0, 1, 'print', 'pen', 'camry404', 5000, '2020-10-15 21:57:08'),
(2, 0, 1, 'tv', 'manager', 'Bypassing', 100000, '2020-10-15 21:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `alarm`
--

CREATE TABLE `alarm` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `end` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alarm`
--

INSERT INTO `alarm` (`id`, `user_id`, `org_id`, `name`, `description`, `start`, `end`) VALUES
(1, 0, 1, 'camry', 'treated corn', '2020-11-02 16:17:13', '2020-11-02 16:16:51'),
(2, 0, 1, 'camry', 'treated corn', '2020-11-02 16:17:42', '2020-11-02 16:16:51'),
(3, 0, 1, 'Saheed Adigun', 'Bypassing', '2020-11-02 16:18:20', '2020-11-01 23:00:00'),
(4, 0, 1, 'Saheed Adigun', 'Bypassing', '2020-11-02 16:18:43', '2020-11-01 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `empwor_id` int(11) DEFAULT NULL,
  `manager` int(11) DEFAULT NULL,
  `resp` varchar(50) DEFAULT NULL,
  `major_acp` varchar(50) DEFAULT NULL,
  `minor_acp` varchar(50) DEFAULT NULL,
  `manager_com` varchar(225) DEFAULT NULL,
  `manager_rating` varchar(225) DEFAULT NULL,
  `date` timestamp(6) NULL DEFAULT NULL,
  `data_type` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id`, `user_id`, `org_id`, `empwor_id`, `manager`, `resp`, `major_acp`, `minor_acp`, `manager_com`, `manager_rating`, `date`, `data_type`) VALUES
(2, 1, 1, 55, 55, 'You are Working. Updating ...', NULL, NULL, NULL, '3', '2020-10-11 23:00:00.000000', 'employee'),
(3, 1, 1, 1, 55, 'the workers are working', NULL, NULL, NULL, '3', '2020-10-11 23:00:00.000000', 'worker'),
(4, 1, 1, 1, 55, 'getting work done', NULL, NULL, NULL, '3', '2020-10-12 23:00:00.000000', 'worker'),
(5, 1, 1, 58, 55, 'trying to get the work done', NULL, NULL, NULL, '3', '0000-00-00 00:00:00.000000', 'employee'),
(6, 0, 1, 1, 55, 'hello', NULL, NULL, NULL, '3', '2020-10-14 23:00:00.000000', 'worker');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `item` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`item`, `category`) VALUES
('Machinery', 'tractor'),
('Building', 'admin'),
('Building', 'ops'),
('Building', 'storage'),
('Building', 'warehouse'),
('operation', 'seed'),
('administration', 'fan'),
('administration', 'A.C.'),
('Machinery', 'tractor'),
('Building', 'admin'),
('Building', 'ops'),
('Building', 'storage'),
('Building', 'warehouse'),
('operation', 'seed'),
('administration', 'fan'),
('administration', 'A.C.'),
('Machinery', 'Truck');

-- --------------------------------------------------------

--
-- Table structure for table `asset_amount`
--

CREATE TABLE `asset_amount` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `asset_type` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_amount`
--

INSERT INTO `asset_amount` (`id`, `user_id`, `asset_id`, `asset_type`, `amount`, `date`) VALUES
(1, '2', 1, 'machinery', 1000000, '2020-08-28 00:00:00'),
(2, '2', 1, 'machinery', 1000000, '2020-08-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'building',
  `capacity` int(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `utilization` varchar(50) DEFAULT NULL,
  `start_season` date DEFAULT NULL,
  `end_season` date DEFAULT NULL,
  `ownership` varchar(50) DEFAULT NULL,
  `fallow` varchar(50) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `user_id`, `org_id`, `name`, `description`, `size`, `amount`, `location`, `lat`, `lng`, `category`, `date`, `table_name`, `capacity`, `type`, `purpose`, `status`, `utilization`, `start_season`, `end_season`, `ownership`, `fallow`, `manager`) VALUES
(4, 2, NULL, 'Abdullahi', 'camry404', '12', 1000, 'Oyo', NULL, NULL, 'ops', '2020-08-18 23:00:00', 'building', 0, '', '', 'full', '', '0000-00-00', '0000-00-00', 'full', '', ''),
(7, 2, NULL, 'Abdullahi', 'Buy Fuel', '20', 1233, 'nigeria', NULL, NULL, 'ops', '2020-08-27 17:55:40', 'building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 1, 'Abdullahi', 'Bypassing', '23', 1000000, 'Oyo, Nigeria.', NULL, NULL, 'admin', '2020-09-20 15:42:24', 'building', 0, '', '', 'full', '', '2020-10-26', '2020-11-02', 'full', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `attachment`, `time`) VALUES
(20, 'clearing', 'farm clearing and bush burning', 'srecorder.txt', '2020-09-30 12:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `kin` varchar(50) DEFAULT NULL,
  `kin_phone` varchar(50) DEFAULT NULL,
  `job_location` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `contract_start` varchar(11) DEFAULT NULL,
  `contract_end` varchar(11) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_acct_no` varchar(50) DEFAULT NULL,
  `contract_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `quality_of_work` varchar(50) DEFAULT NULL,
  `team_work` varchar(50) DEFAULT NULL,
  `punctuality` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) NOT NULL DEFAULT 'employee',
  `supply` int(11) NOT NULL DEFAULT 0,
  `risk` int(11) NOT NULL DEFAULT 0,
  `monitory` int(11) NOT NULL DEFAULT 0,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `financial` int(11) NOT NULL DEFAULT 0,
  `sign_up_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `org_id`, `image`, `name`, `address`, `email`, `username`, `password`, `gender`, `role`, `phone`, `kin`, `kin_phone`, `job_location`, `dob`, `department`, `contract_start`, `contract_end`, `salary`, `bank_name`, `bank_acct_no`, `contract_type`, `status`, `quality_of_work`, `team_work`, `punctuality`, `organization`, `table_name`, `supply`, `risk`, `monitory`, `inventory`, `financial`, `sign_up_date`) VALUES
(46, 40, NULL, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', NULL, 'abdullahij951@gmail.com', NULL, '8b283e8957f744ae5a1a6add05fc354f', 'male', 'Developer', '+2348061266260', NULL, NULL, NULL, NULL, NULL, '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dufma', 'employee', 0, 1, 0, 1, 0, '2020-09-26 23:00:00'),
(49, 40, NULL, 'zeroavatar.jpg', 'Hikmat', NULL, 'fatai@gmail.com', NULL, '88a5d978cad92b8841c91f2d9d299e3a', 'female', 'Oriflame Seller', '08160263667', NULL, NULL, NULL, NULL, NULL, '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dufma', 'employee', 0, 0, 0, 0, 0, '2020-09-26 23:00:00'),
(52, 49, NULL, 'dark-world.jpg', 'dufma', NULL, 'aashoremi@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'Owner', '08162313162', NULL, NULL, NULL, NULL, NULL, '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dufma', 'employee', 0, 0, 0, 0, 0, '2020-09-26 23:00:00'),
(53, 2, NULL, 'annotation-2020-08-17-123933.png', 'Abdullahi Temidayo Jimoh', NULL, 'abdullahij951@gmail.com', NULL, 'e00cf25ad42683b3df678c61f42c6bda', 'male', 'Developer', '+2348061266260', NULL, NULL, NULL, NULL, NULL, '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jascol', 'employee', 1, 0, 0, 1, 0, '2020-09-26 23:00:00'),
(54, NULL, NULL, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', NULL, 'abdullahij951@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'Developer', '+2348061266260', NULL, NULL, NULL, NULL, NULL, '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-09-26 23:00:00'),
(55, 1, 1, NULL, 'Abdullahi Temidayo Jimoh', '', 'abdullahij951@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Male', 'Developer', '+2348061266260', '', '', '', '0000-00-00', 'Developer', '2020-08-31', '2020-10-11', '150000', '', '', 'permanent', 'Active', NULL, NULL, NULL, '1', 'employee', 1, 1, 1, 1, 1, '2020-09-26 23:00:00'),
(56, 1, NULL, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', NULL, 'ef9c4de9ac1e9a98c15e55f39bd0e47e', 'male', NULL, '+2348061266260', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', 'permanent', 'active', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-10-11 22:10:01'),
(57, 1, NULL, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', NULL, '9f3be05aa998ef91c248fa85488cb406', 'male', NULL, '+2348061266260', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', 'permanent', 'active', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-10-11 22:11:07'),
(58, 1, 1, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', NULL, 'ba9efe632eae7716a16f64b7043792b1', 'male', NULL, '+2348061266260', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', 'permanent', 'active', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-10-11 22:12:26'),
(59, 1, 1, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', NULL, '6ef06a2495a48c6d6be6242f631399b7', 'male', NULL, '+2348061266260', '', '', '', '2020-10-12', '', NULL, NULL, '', '', '', 'permanent', 'active', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-10-11 23:04:22'),
(60, 0, 1, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', NULL, '61833d7ee14d94597e51c6df4066fa3d', '', NULL, '+2348061266260', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0, '2020-10-15 10:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(55) NOT NULL,
  `type-expenses` varchar(55) NOT NULL,
  `type-asset` varchar(55) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `user_id`, `description`, `type-expenses`, `type-asset`, `amount`, `date`) VALUES
(1, 5, 'Boy', 'Insurance & security', '', 1000000, '2020-07-12 16:27:45'),
(2, 5, 'Training', 'Raw Materials', '', 1245677, '2020-07-12 16:35:00'),
(4, 5, 'good', 'Project\r\nExpenses', '', 1334344, '2020-07-12 16:56:15'),
(5, 5, 'repair of pipes', 'Buildings', '', 10000, '2020-07-13 20:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(225) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(3, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(6, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(7, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `reciver`, `title`, `feedbackdata`, `attachment`) VALUES
(19, 'fatai@gmail.com', 'Admin', 'Hands on Java Programming Language', 'I need help with tutoring in Java OOP.', ' '),
(20, 'fatai@gmail.com', 'Admin', 'Introduction to Object Oriented Technology', 'Avoid to use a param with dot like \":table.column\".\r\nIt will return a error \'PDOException\' with message \'SQLSTATE[HY093]: Invalid parameter number: parameter was not defined\' in ...', ' '),
(21, 'bolaji@gmail.com', 'Admin', 'Password Issue', 'I can\'t sign in to m account. Aadmin kindly help fix it', ' '),
(19, 'fatai@gmail.com', 'Admin', 'Hands on Java Programming Language', 'I need help with tutoring in Java OOP.', ' '),
(20, 'fatai@gmail.com', 'Admin', 'Introduction to Object Oriented Technology', 'Avoid to use a param with dot like \":table.column\".\r\nIt will return a error \'PDOException\' with message \'SQLSTATE[HY093]: Invalid parameter number: parameter was not defined\' in ...', ' '),
(21, 'bolaji@gmail.com', 'Admin', 'Password Issue', 'I can\'t sign in to m account. Aadmin kindly help fix it', ' '),
(19, 'fatai@gmail.com', 'Admin', 'Hands on Java Programming Language', 'I need help with tutoring in Java OOP.', ' '),
(20, 'fatai@gmail.com', 'Admin', 'Introduction to Object Oriented Technology', 'Avoid to use a param with dot like \":table.column\".\r\nIt will return a error \'PDOException\' with message \'SQLSTATE[HY093]: Invalid parameter number: parameter was not defined\' in ...', ' '),
(21, 'bolaji@gmail.com', 'Admin', 'Password Issue', 'I can\'t sign in to m account. Aadmin kindly help fix it', ' '),
(19, 'fatai@gmail.com', 'Admin', 'Hands on Java Programming Language', 'I need help with tutoring in Java OOP.', ' '),
(20, 'fatai@gmail.com', 'Admin', 'Introduction to Object Oriented Technology', 'Avoid to use a param with dot like \":table.column\".\r\nIt will return a error \'PDOException\' with message \'SQLSTATE[HY093]: Invalid parameter number: parameter was not defined\' in ...', ' '),
(21, 'bolaji@gmail.com', 'Admin', 'Password Issue', 'I can\'t sign in to m account. Aadmin kindly help fix it', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `imageName` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `imageName`, `created_at`) VALUES
(1, '838.jpg', '2020-07-03 00:52:16'),
(4, 'invest-in-the-stock-market.jpg', '2020-07-03 00:54:51'),
(5, '1556112789graduate-finance-jobs-planning.jpg', '2020-07-03 00:55:26'),
(1, '838.jpg', '2020-07-03 00:52:16'),
(4, 'invest-in-the-stock-market.jpg', '2020-07-03 00:54:51'),
(5, '1556112789graduate-finance-jobs-planning.jpg', '2020-07-03 00:55:26'),
(0, 'dark-world.jpg', '2020-08-18 19:34:58'),
(1, '838.jpg', '2020-07-03 00:52:16'),
(4, 'invest-in-the-stock-market.jpg', '2020-07-03 00:54:51'),
(5, '1556112789graduate-finance-jobs-planning.jpg', '2020-07-03 00:55:26'),
(1, '838.jpg', '2020-07-03 00:52:16'),
(4, 'invest-in-the-stock-market.jpg', '2020-07-03 00:54:51'),
(5, '1556112789graduate-finance-jobs-planning.jpg', '2020-07-03 00:55:26'),
(0, 'dark-world.jpg', '2020-08-18 19:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `granty`
--

CREATE TABLE `granty` (
  `id` int(11) NOT NULL,
  `grantname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `possibilityofreturn` varchar(255) NOT NULL,
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `granty`
--

INSERT INTO `granty` (`id`, `grantname`, `description`, `amount`, `possibilityofreturn`, `add_parameters`) VALUES
(3, 'despicado', 'just something', 10000, 'no', ''),
(4, 'despicado', 'just something', 10000, 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` varchar(55) NOT NULL,
  `type-income` varchar(55) NOT NULL,
  `type-asset` varchar(55) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `user_id`, `details`, `type-income`, `type-asset`, `amount`, `created_at`) VALUES
(1, 5, 'Boy', 'Select', '', 1000000, '2020-07-12 16:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `amount_paid` int(50) DEFAULT NULL,
  `period` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `table_name` varchar(11) NOT NULL DEFAULT 'insurance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`id`, `user_id`, `org_id`, `name`, `item`, `start_date`, `end_date`, `amount`, `amount_paid`, `period`, `company`, `table_name`) VALUES
(3, 0, 1, 'Abdullahi', 'Buildings', '2020-08-31', '2020-10-11', 1000000, 10000, 'three', 'Jascol', 'insurance'),
(4, 0, 1, 'Abdullahi', '0', '2020-08-31', '2020-10-11', 1245677, 10000, 'three', 'Jascol', 'insurance'),
(5, 0, 1, 'Abdullahi', 'Buildings', '2020-08-31', '2020-10-11', 1000000, 10000, 'three', 'Jascol', 'insurance');

-- --------------------------------------------------------

--
-- Table structure for table `legal`
--

CREATE TABLE `legal` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ppunit` varchar(255) DEFAULT NULL,
  `qitem` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legal`
--

INSERT INTO `legal` (`id`, `user_id`, `org_id`, `sn`, `name`, `description`, `ppunit`, `qitem`, `amount`, `time`, `date`, `add_parameters`) VALUES
(1, 0, 1, NULL, 'manager', 'camry404', '12', '12', 144, '2020-10-16 11:04:16', '2020-10-16 11:04:16', ''),
(2, 0, 1, NULL, 'Saheed Adigun', 'camry404', NULL, NULL, 134, '2020-10-16 11:09:47', '2020-10-16 11:09:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `liabilty`
--

CREATE TABLE `liabilty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` varchar(55) NOT NULL,
  `type-liability` varchar(55) NOT NULL,
  `type-asset` varchar(55) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabilty`
--

INSERT INTO `liabilty` (`id`, `user_id`, `details`, `type-liability`, `type-asset`, `amount`, `created_at`) VALUES
(1, 5, 'Training', 'Unearned revenue', '', 1245677, '2020-07-12 17:01:11'),
(2, 5, 'good', 'Amount payable', '', 1334344, '2020-07-12 17:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `location_status` tinyint(1) DEFAULT 1,
  `size` int(50) DEFAULT NULL,
  `soil_type` varchar(50) DEFAULT NULL,
  `ph` varchar(50) DEFAULT NULL,
  `chemical` varchar(50) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `utilization` varchar(50) DEFAULT NULL,
  `start_season` date DEFAULT NULL,
  `end_season` date DEFAULT NULL,
  `ownership` varchar(50) DEFAULT NULL,
  `fallow` varchar(50) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL,
  `data_type` varchar(11) DEFAULT 'data',
  `locations` varchar(11) NOT NULL DEFAULT 'location'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user`, `org_id`, `name`, `lat`, `lng`, `description`, `location_status`, `size`, `soil_type`, `ph`, `chemical`, `active`, `utilization`, `start_season`, `end_season`, `ownership`, `fallow`, `manager`, `data_type`, `locations`) VALUES
(21, 'olawale', NULL, NULL, 7.872496, 8.588821, 'farm 3A', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(22, '', NULL, NULL, 7.146105, 5.126693, '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(24, 'hello', NULL, NULL, 8.824571, 8.240799, 'testing', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(25, '', NULL, NULL, 8.951792, 9.697006, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(26, '', NULL, NULL, 8.843251, 8.960922, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(27, '2', NULL, 'Abdullahi', 9.298905, 9.444320, 'Bypassing', 1, 23, 'loamy', '7', 'qwerty', 'dog', 'rearing', '2020-08-31', '2020-09-14', 'full', '12', 'Abdullahi', NULL, 'location'),
(28, '2', NULL, 'Abdullahi', 9.298905, 9.444320, 'Bypassing', 1, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'location'),
(29, '1', 1, 'camry', 8.669519, 9.114730, 'Bypassing', 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'field', 'location'),
(30, '1', 1, 'Abdullahi', 0.000000, 0.000000, 'Bypassing', 1, 23, '', '', '', '', '', '0000-00-00', '0000-00-00', 'lease', '', 'Abdullahi', 'field', 'location'),
(31, '1', 1, 'Terminus', 0.000000, 0.000000, 'camry404', 1, 12, '', '', '', '', '', '0000-00-00', '0000-00-00', 'full', '', '', 'pen', 'location'),
(32, '', NULL, NULL, 9.255534, 9.004867, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'data', 'location'),
(34, '0', 1, 'Saheed Adigun', 0.000000, 0.000000, 'Bypassing', 1, 0, '', '', 'qwerty', '', '', '0000-00-00', '0000-00-00', 'full', '', '', 'field', 'location'),
(35, '0', 1, 'Saheed Adigun', 0.000000, 0.000000, 'Bypass', 1, 0, '', '', '', '', '', '0000-00-00', '0000-00-00', 'lease', '', '', 'pen', 'location');

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `serial_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'machinery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`id`, `user_id`, `org_id`, `category`, `name`, `description`, `serial_no`, `manufacturer`, `amount`, `date`, `table_name`) VALUES
(1, 2, NULL, 'tractor', 'james', 'a player', '123235655', 'dangote', 1200, '2020-08-12 00:00:00', 'machinery'),
(3, 2, NULL, 'tractor', 'Terminus', 'For this month', '45323453', 'Adullahi', 0, '2020-08-12 00:00:00', 'machinery'),
(5, 2, NULL, 'tractor', 'Abdullahi ', 'Bypassing', '45323453', 'Q&S', 0, '2020-08-20 00:00:00', 'machinery'),
(7, 2, NULL, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 11000, '2020-08-27 00:00:00', 'machinery'),
(8, 2, NULL, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 1000000, '2020-08-31 00:00:00', 'machinery'),
(9, 1, 0, 'tractor', 'Abdullahi', 'camry404', '45323453', 'jat', 1000000, '2020-09-20 00:00:00', 'machinery'),
(10, 0, 1, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 1000000, '2020-09-20 00:00:00', 'machinery');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `serial no` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `org_id`, `user_id`, `item_id`, `serial no`, `type`, `description`, `amount`, `Time`, `date`) VALUES
(1, NULL, NULL, NULL, 12345678, 'Buildings', 'Repair of SInk', 100000, '0000-00-00 00:00:00', '2020-07-13 20:29:28'),
(2, 1, 0, 8, NULL, 'building', 'Bypassing', 100, '2020-10-14 07:06:25', '2020-10-13 23:00:00'),
(3, 1, 0, 10, NULL, 'machinery', 'Buy Fuel', 1000, '2020-10-14 08:51:47', '2017-05-31 23:00:00'),
(4, 1, 0, 9, NULL, 'vehicle', 'treated corn', 5000, '2020-10-14 08:52:04', '2017-05-31 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance-item`
--

CREATE TABLE `maintenance-item` (
  `id` int(100) NOT NULL,
  `item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance-item`
--

INSERT INTO `maintenance-item` (`id`, `item`) VALUES
(9, 'Buildings'),
(10, 'Vehicles'),
(11, 'Machines');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `unit_value` int(11) NOT NULL,
  `roi` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `realpword` varchar(100) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `active`, `fullname`, `email`, `phone`, `category`, `unit`, `unit_value`, `roi`, `pay`, `password`, `realpword`, `date_added`, `images`, `status`) VALUES
(4, 1, 'bolaji', 'bolaji@gmail.com', '09089089009', 'Silver', 2, 50000, 10000, 1, '0c80c124799585376519959d2374b07c', 'bolaji', '2020-06-15 00:00:00', '', 1),
(5, 1, 'fatai', 'fatai@gmail.com', '09034412009', 'Gold', 12, 600000, 132000, 1, '88a5d978cad92b8841c91f2d9d299e3a', 'fatai', '2020-06-28 11:37:05', 'zeroavatar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthlyreport`
--

CREATE TABLE `monthlyreport` (
  `id` int(6) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `month` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `hours` varchar(11) DEFAULT NULL,
  `activity` varchar(225) DEFAULT NULL,
  `activity_status` varchar(11) DEFAULT NULL,
  `field_status` varchar(11) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthlyreport`
--

INSERT INTO `monthlyreport` (`id`, `user_id`, `org_id`, `month`, `name`, `hours`, `activity`, `activity_status`, `field_status`, `manager`, `type`) VALUES
(1, '1', 1, '2020-09', '29', '1', 'hope you work this time around', 'Completed', '5', '1', 'field'),
(2, '1', 1, '2020-09', '31', '2', 'here is todays activity', 'Completed', '3', '1', 'pen'),
(3, '1', 1, '2020-09', '8', '2', 'hey you there. I feeling you', 'Completed', '3', '1', 'facility'),
(4, '55', 1, '2020-09', '8', '2', 'trying for the employee', 'Completed', '3', '55', 'facility'),
(5, '55', 55, '2020-10', '31', '1', 'superman', 'Completed', '3', '55', 'pen'),
(6, '55', 1, '2020-10', '31', '1', 'Nonsense', 'Completed', '3', '55', 'pen'),
(7, '0', 1, '2020-11', '8', '2', 'hello', 'Completed', '3', '0', 'facility'),
(8, '0', 1, '2020-11', NULL, '2', 'who is this?', 'Completed', '4', '0', 'field');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `org_id` varchar(50) DEFAULT NULL,
  `message` varchar(225) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `org_id`, `message`, `status`, `time`) VALUES
(15, '0', '1', 'Employee Deleted successfully', 0, '2020-11-04 01:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantity` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `place` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`sn`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `location`, `category`, `place`, `status`, `date`) VALUES
(1, 2, NULL, 'corn', 'treated corn', '15', 'covas', 'Oyo', 'seed', 'ibadan', 'in stock', '2020-08-16 00:00:00'),
(2, 2, NULL, 'Abdullahi', 'Bypassing', '15', 'jat', 'Oyo', 'seed', 'Ghana', 'in stock', '2020-08-21 00:00:00'),
(3, 2, NULL, 'Abdullahi Temidayo Jimoh', 'camry404', '12', 'jat', 'Oyo', 'seed', 'ibadan', 'in stock', '2020-08-27 00:00:00'),
(4, 1, 1, 'Abdullahi', 'Bypassing', '12', 'jat', 'Oyo, Nigeria.', 'seed', 'ibadan', 'out stock', '2020-09-20 00:00:00'),
(5, 0, 1, 'pen', 'Bypassing', '', '', '', 'seed', '', 'in stock', '2020-10-15 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `sign_up_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'organization'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `username`, `email`, `password`, `organization`, `image`, `sign_up_date`, `table_name`) VALUES
(1, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda', 'Dufma', NULL, '2020-09-27 15:23:48', 'organization'),
(3, 'abdullahij951', 'abdullahij951@gmail.com', '6515523fb9fe3308897a5df81763ea46', 'University of Ibadan', NULL, '2020-10-25 16:23:49', 'organization');

-- --------------------------------------------------------

--
-- Table structure for table `other_asset`
--

CREATE TABLE `other_asset` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantity` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'other_asset'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_asset`
--

INSERT INTO `other_asset` (`sn`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `status`, `location`, `amount`, `date`, `table_name`) VALUES
(1, 0, NULL, 'hoe', 'iron hoe', '12', 'jat', 'in storage', 'Oyo', 1000000, '2020-08-16 00:00:00', 'other_asset'),
(4, 2, NULL, 'Abdullahi Temidayo Jimoh', 'Bypassing', '12', 'Adullahi', 'in use', 'Oyo', 0, '2020-08-27 00:00:00', 'other_asset'),
(5, 2, NULL, 'Terminus', 'Bypassing', '12', 'jat', 'in storage', 'Nigeria.', 1000000, '2020-08-31 00:00:00', 'other_asset'),
(6, 1, 1, 'Abdullahi', 'Bypassing', '12', 'jat', 'in storage', 'Nigeria.', 1000000, '2020-09-20 00:00:00', 'other_asset');

-- --------------------------------------------------------

--
-- Table structure for table `plannedexpense`
--

CREATE TABLE `plannedexpense` (
  `expense` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plannedexpense`
--

INSERT INTO `plannedexpense` (`expense`, `amount`, `date`) VALUES
('maintenance', 1000000, '2020-05'),
('maintenance', 1334344, '2020-01');

-- --------------------------------------------------------

--
-- Table structure for table `plannedincome`
--

CREATE TABLE `plannedincome` (
  `income` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plannedincome`
--

INSERT INTO `plannedincome` (`income`, `amount`, `date`) VALUES
('productsales', 100000, '2020-06'),
('service', 1245677, '2020-05'),
('service', 1245677, '2020-01'),
('productsale', 1245677, '2020-06'),
('productsale', 100000, '2020-01');

-- --------------------------------------------------------

--
-- Table structure for table `power`
--

CREATE TABLE `power` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ppunit` varchar(255) DEFAULT NULL,
  `qitem` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `power`
--

INSERT INTO `power` (`id`, `user_id`, `org_id`, `sn`, `name`, `description`, `ppunit`, `qitem`, `amount`, `time`, `date`, `add_parameters`) VALUES
(1, 0, 1, NULL, 'Grid supply', 'Bypassing', NULL, NULL, 100, '2020-10-16 11:16:03', '2020-10-16 11:16:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `org_id`, `name`, `amount`) VALUES
(1, 'Abdul', NULL, NULL, NULL),
(3, 'Tijani', NULL, 'NPK fetilizer', 57),
(4, 'Ade', NULL, 'Tractor', 25),
(5, 'Similola', 1, 'Disinfectant', 8),
(6, '1', 1, 'Beans', 100),
(7, '55', 55, 'Abdullahi', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `productsale`
--

CREATE TABLE `productsale` (
  `id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `salename` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalquantity` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `add_parameter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product sales`
--

CREATE TABLE `product sales` (
  `id` int(11) NOT NULL,
  `Transaction number` int(50) NOT NULL,
  `Sale employee name` varchar(30) NOT NULL,
  `Business transaction date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Product name` varchar(50) NOT NULL,
  `Product description` varchar(50) NOT NULL,
  `Price of product per unit` int(11) NOT NULL,
  `Quantity of product sold` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Total income for product sold` int(11) NOT NULL,
  `Total number/quantity of product sold` int(11) NOT NULL,
  `Payment method` varchar(50) NOT NULL,
  `Customer’s name` varchar(50) NOT NULL,
  `Customer phone` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `Add parameter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product sales`
--

INSERT INTO `product sales` (`id`, `Transaction number`, `Sale employee name`, `Business transaction date`, `Product name`, `Product description`, `Price of product per unit`, `Quantity of product sold`, `Discount`, `Total income for product sold`, `Total number/quantity of product sold`, `Payment method`, `Customer’s name`, `Customer phone`, `type`, `Add parameter`) VALUES
(1, 0, '', '2020-07-17 00:00:00', '', '', 0, 0, 0, 0, 0, '', 'Abdullahi', '2147483647', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ppunit` varchar(255) DEFAULT NULL,
  `qitem` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `org_id`, `sn`, `name`, `description`, `ppunit`, `qitem`, `amount`, `time`, `date`, `add_parameters`) VALUES
(1, 0, 1, '001', 'sugar', 'tea', '10', '4', 2300, '0000-00-00 00:00:00', '2016-08-31 23:00:00', 'nothing'),
(2, 0, 1, NULL, 'manager', 'Bypassing', '100', '14', 1400, '2020-10-16 10:06:21', '2020-10-16 10:06:21', ''),
(3, 0, 1, NULL, 'manager', 'Bypassing', '345', '10', 3450, '2020-10-16 10:22:15', '2020-10-16 10:22:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterials`
--

CREATE TABLE `rawmaterials` (
  `id` int(6) NOT NULL,
  `id_rawmaterials` varchar(255) DEFAULT NULL,
  `qty_rawmaterials` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawmaterials`
--

INSERT INTO `rawmaterials` (`id`, `id_rawmaterials`, `qty_rawmaterials`, `amount`, `date`) VALUES
(12, '006', '6', '1200', '2020-08-30 00:56:40'),
(14, '006', '6', '360', '2020-08-30 00:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ppunit` varchar(255) DEFAULT NULL,
  `qitem` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `user_id`, `org_id`, `sn`, `name`, `description`, `ppunit`, `qitem`, `amount`, `time`, `date`) VALUES
(1, 0, 1, NULL, 'pen', 'Bypassing', '10', '367', 3670, '2020-10-16 10:55:06', '2020-10-16 10:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `feedbackID` int(11) NOT NULL,
  `receiver_email` varchar(55) NOT NULL,
  `reply_body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount payable` int(11) NOT NULL,
  `employee status` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `eligibility` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `allowance to be debited` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Add parameter` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `type`, `name`, `amount payable`, `employee status`, `description`, `eligibility`, `method`, `allowance to be debited`, `date`, `Add parameter`, `employee_id`) VALUES
(1, 'Salary', 'Abdullahi Temidayo Jimoh', 1000000, 'contract', 'Bypassing', 'yes', 'transfer', 100000, '2020-08-29 00:00:00', 'employee', 10),
(2, 'Salary', 'Saheed Adigun', 1245677, 'permanent', 'camry404', 'yes', 'transfer', 100000, '2020-08-29 00:00:00', 'employee', 11);

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ppunit` varchar(255) DEFAULT NULL,
  `qitem` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `user_id`, `org_id`, `name`, `ppunit`, `qitem`, `amount`, `time`, `date`, `add_parameters`) VALUES
(1, 0, 1, 'gatemen', '1200', '14', 16800, '2020-10-16 21:16:14', '2020-10-16 21:16:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `salename` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `productname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalquantity` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `add_parameter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `transaction`, `salename`, `date`, `productname`, `description`, `price`, `quantity`, `discount`, `amount`, `totalquantity`, `method`, `customername`, `phone`, `type`, `add_parameter`) VALUES
(0, '123', 'otun', '2020-07-02', 'boska', 'brown', 100, 3, 20, 200, 200, 'transfer', 'tunde', '08039412009', 'Weekly', 'nothing'),
(0, '12325544', 'Abdullahi', '2020-08-07', 'ybnl', 'Buy Fuel', 1200, 15, 200, 15000, 15, 'transfer', 'method', '+2348061266', 'Daily', 'qw');

-- --------------------------------------------------------

--
-- Table structure for table `slm`
--

CREATE TABLE `slm` (
  `id` int(255) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `org_id` int(6) DEFAULT NULL,
  `asset_id` varchar(255) DEFAULT NULL,
  `asset_type` varchar(255) DEFAULT NULL,
  `asset_life` varchar(225) DEFAULT NULL,
  `ope_cost` varchar(255) DEFAULT NULL,
  `salvage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slm`
--

INSERT INTO `slm` (`id`, `user_id`, `org_id`, `asset_id`, `asset_type`, `asset_life`, `ope_cost`, `salvage`) VALUES
(13, 0, 1, '10', 'machinery', '6', '1200', '25000'),
(16, 0, 1, '8', 'building', '6', '2300', '230000');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `occupation` varchar(55) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `fullname`, `occupation`, `body`, `created_at`) VALUES
(3, 'Wale Ayo', 'Trader', 'Dufma is the best agricultural investment service out there. I have 100% trust in them', '2020-07-03 00:50:24'),
(4, 'Ajibade Sodiq', 'ARTISAN', 'Invest in Dufma and enjoy money lavishly all your life yuuuuuuuuuuuuuuuuuuuuu', '2020-07-03 00:51:46'),
(3, 'Wale Ayo', 'Trader', 'Dufma is the best agricultural investment service out there. I have 100% trust in them', '2020-07-03 00:50:24'),
(4, 'Ajibade Sodiq', 'ARTISAN', 'Invest in Dufma and enjoy money lavishly all your life yuuuuuuuuuuuuuuuuuuuuu', '2020-07-03 00:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `details`, `category`, `amount`, `date`) VALUES
(22, 1, 'payment for house', 'Asset', 10000000, '2020-07-08 23:00:00'),
(23, 5, 'Shop payment', 'Asset', 5000, '2020-07-08 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `type-asset`
--

CREATE TABLE `type-asset` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type-asset`
--

INSERT INTO `type-asset` (`id`, `title`, `description`) VALUES
(1, 'Currents', 'reoccurring every time'),
(2, 'Fixed', 'permanent in nature');

-- --------------------------------------------------------

--
-- Table structure for table `type-expenses`
--

CREATE TABLE `type-expenses` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type-expenses`
--

INSERT INTO `type-expenses` (`id`, `title`, `description`) VALUES
(1, 'Overhead cost', ''),
(2, 'Insurance & security', ''),
(3, 'Raw Materials', ''),
(4, 'Project\r\nExpenses', ''),
(5, 'Depreciation\r\ncost', '');

-- --------------------------------------------------------

--
-- Table structure for table `type-income`
--

CREATE TABLE `type-income` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type-income`
--

INSERT INTO `type-income` (`id`, `title`, `description`) VALUES
(1, 'Product Sales ', ''),
(2, 'Service Sales', ''),
(3, 'Grants', '');

-- --------------------------------------------------------

--
-- Table structure for table `type-liability`
--

CREATE TABLE `type-liability` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type-liability`
--

INSERT INTO `type-liability` (`id`, `title`, `description`) VALUES
(1, 'Interest payable', ''),
(2, 'wages and Salary payable', ''),
(3, 'Income tax payable', ''),
(4, 'Unearned revenue', ''),
(5, 'Amount payable', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `mobile`, `designation`, `image`, `status`) VALUES
(20, 'Abdulazeez Tijani', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Male', '09098778900', 'Farmer', 'whatsapp-image-2020-03-29-at-9.16.27-pm.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `user_id`, `org_id`, `sn`, `name`, `description`, `amount`, `date`) VALUES
(1, NULL, NULL, '001', 'light', 'dec', 2300, '2017-06-26 23:00:00'),
(2, NULL, NULL, '001', 'ade', 'ICT director\'s car', 2300, '2017-05-31 23:00:00'),
(3, NULL, NULL, '124345665', 'Terminus', 'Bypassing', 1000000, '2017-05-31 23:00:00'),
(6, 0, 1, NULL, 'pen', 'iron hoe', 50, '2020-10-14 21:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `serial_no` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'vehicle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `user_id`, `org_id`, `name`, `description`, `serial_no`, `manufacturer`, `amount`, `date`, `table_name`) VALUES
(1, 2, NULL, 'camry', 'camry404', '123453221', 'toyota', 1233, '2020-08-16 00:00:00', 'vehicle'),
(4, 2, NULL, 'sienna', 'a long vehicle', '1234434', 'mezidis', 0, '2020-08-21 00:00:00', 'vehicle'),
(7, 0, NULL, 'Terminus', '2', '1234434', 'covas', 0, '2020-08-27 00:00:00', 'vehicle'),
(8, 2, NULL, 'Abdullahi', 'Bypassing', '1234434', 'jat', 1000000, '2020-08-31 00:00:00', 'vehicle'),
(9, 1, 1, 'Abdullahi', 'Bypassing', '1234434', 'jat', 1000000, '2020-09-20 00:00:00', 'vehicle'),
(10, 0, 1, 'jquery', 'Bypassing', '1234434', 'jat', 5000, '2020-10-15 16:28:59', 'vehicle');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `send_to` varchar(50) DEFAULT NULL,
  `trans_ref` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `org_id`, `amount`, `description`, `send_to`, `trans_ref`, `date`, `status`) VALUES
(1, 0, 1, 1000000, 'payment for Land', 'Temidayo', '124267836827628', '2020-10-26 13:49:56', 'received'),
(2, 0, 1, -200000, 'payment for Land', 'Temidayo', '1242678368344', '2020-10-26 13:50:02', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `sn` int(6) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `org_id` varchar(11) DEFAULT NULL,
  `warehouse` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `quantity` varchar(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`sn`, `product_id`, `user_id`, `org_id`, `warehouse`, `quantity`, `status`) VALUES
(1, '5', '1', '1', '', '10', 'closed'),
(2, '6', '1', '1', '8', '15', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `weeklyreport`
--

CREATE TABLE `weeklyreport` (
  `id` int(6) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `week` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `hours` varchar(11) DEFAULT NULL,
  `activity` varchar(225) DEFAULT NULL,
  `activity_status` varchar(11) DEFAULT NULL,
  `field_status` varchar(11) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weeklyreport`
--

INSERT INTO `weeklyreport` (`id`, `user_id`, `org_id`, `week`, `name`, `hours`, `activity`, `activity_status`, `field_status`, `manager`, `type`) VALUES
(1, '1', 1, '2020-W40', '29', '1', 'wssdd', 'Completed', '3', '1', 'field'),
(2, '1', 1, '2020-W40', '29', '1', 'wssdd', 'Completed', '3', '1', 'field'),
(3, '1', 1, '2020-W40', '31', '3', 'sdfds', 'Completed', '3', '1', 'pen'),
(4, '1', 1, '2020-W40', '30', '2', 'qwert key board', 'Completed', '3', '1', 'field'),
(5, '1', 1, '2020-W40', '30', '2', 'qwert key board', 'Completed', '3', '1', 'field'),
(6, '1', 1, '2020-W40', '', '2', 'qwert key board', 'Completed', '3', '1', 'field'),
(10, '1', 1, '2020-W40', '8', '3', 'try again', 'Completed', '3', '1', 'facility'),
(11, '1', 1, '2020-W40', '8', '2', 'there you are ', 'Completed', '3', '1', 'facility'),
(12, NULL, NULL, '2020-W43', NULL, '1', 'trying', 'Completed', '3', NULL, 'field'),
(13, '1', 1, '2020-W43', NULL, '3', 'coming', 'Completed', '3', '1', 'field'),
(14, '1', 1, '2020-W43', NULL, '2', 'heloo', 'Completed', '3', '1', 'field'),
(16, '0', 1, '2020-W45', '34', '2', 'It is working Great', 'Completed', '5', '0', 'field'),
(17, '0', 1, '2020-W45', '35', '2', 'hello', 'Completed', '5', '0', 'pen');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `kin` varchar(50) DEFAULT NULL,
  `kin_phone` varchar(50) DEFAULT NULL,
  `job_location` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `contract_start` varchar(11) DEFAULT NULL,
  `contract_end` varchar(11) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_acct_no` varchar(50) DEFAULT NULL,
  `contract_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `quality_of_work` varchar(50) DEFAULT NULL,
  `team_work` varchar(50) DEFAULT NULL,
  `punctuality` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) NOT NULL DEFAULT 'worker',
  `sign_up_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `user_id`, `org_id`, `image`, `name`, `address`, `email`, `gender`, `role`, `phone`, `kin`, `kin_phone`, `job_location`, `dob`, `department`, `contract_start`, `contract_end`, `salary`, `bank_name`, `bank_acct_no`, `contract_type`, `status`, `quality_of_work`, `team_work`, `punctuality`, `organization`, `table_name`, `sign_up_date`) VALUES
(1, 1, 1, NULL, 'Saheed Adigun', '24, Amina way, university of ibadan, ibadan, oyo state Nigeria', 'atuewi@gmail.com', '', NULL, '08109312880', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, 'employee', '2020-10-12 21:56:23'),
(2, 0, 1, NULL, 'Abdullahi Temidayo Jimoh', 'Borehole Area, Aroje, Ogbomoso, Oyo State.', 'abdullahij951@gmail.com', '', NULL, '+2348061266260', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, 'employee', '2020-10-15 10:23:31'),
(3, 0, 1, NULL, 'Saheed Adigun', '24, Amina way, university of ibadan, ibadan, oyo state Nigeria', 'atuewi@gmail.com', '', NULL, '08109312880', '', '', '', '0000-00-00', '', NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, 'employee', '2020-10-27 19:18:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_amount`
--
ALTER TABLE `asset_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `granty`
--
ALTER TABLE `granty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal`
--
ALTER TABLE `legal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilty`
--
ALTER TABLE `liabilty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machinery`
--
ALTER TABLE `machinery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance-item`
--
ALTER TABLE `maintenance-item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlyreport`
--
ALTER TABLE `monthlyreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_asset`
--
ALTER TABLE `other_asset`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `power`
--
ALTER TABLE `power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsale`
--
ALTER TABLE `productsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product sales`
--
ALTER TABLE `product sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slm`
--
ALTER TABLE `slm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `type-asset`
--
ALTER TABLE `type-asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type-expenses`
--
ALTER TABLE `type-expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type-income`
--
ALTER TABLE `type-income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type-liability`
--
ALTER TABLE `type-liability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appraisal`
--
ALTER TABLE `appraisal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asset_amount`
--
ALTER TABLE `asset_amount`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `granty`
--
ALTER TABLE `granty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `legal`
--
ALTER TABLE `legal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `liabilty`
--
ALTER TABLE `liabilty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance-item`
--
ALTER TABLE `maintenance-item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthlyreport`
--
ALTER TABLE `monthlyreport`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `other_asset`
--
ALTER TABLE `other_asset`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `power`
--
ALTER TABLE `power`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productsale`
--
ALTER TABLE `productsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product sales`
--
ALTER TABLE `product sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slm`
--
ALTER TABLE `slm`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `type-asset`
--
ALTER TABLE `type-asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type-expenses`
--
ALTER TABLE `type-expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type-income`
--
ALTER TABLE `type-income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type-liability`
--
ALTER TABLE `type-liability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `sn` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
