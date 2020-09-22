-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 12:56 PM
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
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`sn`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `location`, `category`, `place`, `status`, `date`) VALUES
(1, 2, NULL, 'dsl', 'dcl iron', '12', 'Abdullahi', 'Oyo', 'A.C.', 'ibadan', 'in stock', '2020-08-16'),
(3, 2, NULL, 'Abdullahi Temidayo Jimoh', 'camry404', '12', 'Adullahi', 'Oyo, Nigeria.', 'fan', 'ibadan', 'out stock', '2020-08-27'),
(4, 1, 1, 'Terminus', 'camry404', '12', 'jat', 'Oyo, Nigeria.', 'fan', 'ibadan', 'in stock', '2020-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`id`, `type`, `sn`, `name`, `description`, `amount`, `date`, `add_parameters`) VALUES
(2, 'Radio', '001', 'ade', 'ICT director\'s car', 2300, '2018-06-14', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `alarm`
--

CREATE TABLE `alarm` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `start` datetime DEFAULT current_timestamp(),
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `empwor_id` int(11) DEFAULT NULL,
  `quality_of_work` varchar(50) NOT NULL,
  `team_work` varchar(50) NOT NULL,
  `punctuality` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL DEFAULT 'appraisal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('administration', 'A.C.');

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
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_amount`
--

INSERT INTO `asset_amount` (`id`, `user_id`, `asset_id`, `asset_type`, `amount`, `date`) VALUES
(1, '2', 1, 'machinery', 1000000, '2020-08-28'),
(2, '2', 1, 'machinery', 1000000, '2020-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
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

INSERT INTO `building` (`sn`, `user_id`, `org_id`, `name`, `description`, `size`, `amount`, `location`, `lat`, `lng`, `category`, `date`, `table_name`, `capacity`, `type`, `purpose`, `status`, `utilization`, `start_season`, `end_season`, `ownership`, `fallow`, `manager`) VALUES
(4, 2, NULL, 'Abdullahi', 'camry404', '12', 1000, 'Oyo', NULL, NULL, 'ops', '2020-08-18 23:00:00', 'building', 0, '', '', 'full', '', '0000-00-00', '0000-00-00', 'full', '', ''),
(7, 2, NULL, 'Abdullahi', 'Buy Fuel', '20', 1233, 'nigeria', NULL, NULL, 'ops', '2020-08-27 17:55:40', 'building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 1, 'Abdullahi', 'Bypassing', '23', 1000000, 'Oyo, Nigeria.', NULL, NULL, 'admin', '2020-09-20 15:42:24', 'building', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contract_start` varchar(11) DEFAULT NULL,
  `contract_end` varchar(11) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `quality_of_work` varchar(50) DEFAULT NULL,
  `team_work` varchar(50) DEFAULT NULL,
  `punctuality` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) NOT NULL DEFAULT 'employee',
  `supply` int(11) NOT NULL DEFAULT 0,
  `risk` int(11) NOT NULL DEFAULT 0,
  `monitory` int(11) NOT NULL DEFAULT 0,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `financial` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `image`, `name`, `email`, `password`, `gender`, `role`, `phone`, `contract_start`, `contract_end`, `salary`, `quality_of_work`, `team_work`, `punctuality`, `organization`, `table_name`, `supply`, `risk`, `monitory`, `inventory`, `financial`) VALUES
(46, 40, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', 'abdullahij951@gmail.com', '8b283e8957f744ae5a1a6add05fc354f', 'male', 'Developer', '+2348061266260', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, 'Dufma', 'employee', 0, 1, 0, 1, 0),
(49, 40, 'zeroavatar.jpg', 'Hikmat', 'fatai@gmail.com', '88a5d978cad92b8841c91f2d9d299e3a', 'female', 'Oriflame Seller', '08160263667', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, 'Dufma', 'employee', 0, 0, 0, 0, 0),
(52, 49, 'dark-world.jpg', 'dufma', 'aashoremi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'Owner', '08162313162', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, 'Dufma', 'employee', 0, 0, 0, 0, 0),
(53, 2, 'annotation-2020-08-17-123933.png', 'Abdullahi Temidayo Jimoh', 'abdullahij951@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'male', 'Developer', '+2348061266260', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, 'jascol', 'employee', 1, 0, 0, 1, 0),
(54, NULL, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', 'abdullahij951@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 'Developer', '+2348061266260', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, NULL, 'employee', 0, 0, 0, 0, 0),
(55, 1, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', 'abdullahij951@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', 'Developer', '+2348061266260', '2020-08-31', '2020-10-11', '150000', NULL, NULL, NULL, '1', 'employee', 0, 0, 1, 1, 1);

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

INSERT INTO `insurance` (`id`, `user_id`, `name`, `item`, `start_date`, `end_date`, `amount`, `amount_paid`, `period`, `company`, `table_name`) VALUES
(3, 2, 'Abdullahi', 'Buildings', '2020-08-31', '2020-10-11', 1000000, 10000, 'three', 'Jascol', 'insurance'),
(4, 2, 'Abdullahi', '0', '2020-08-31', '2020-10-11', 1245677, 10000, 'three', 'Jascol', 'insurance'),
(5, 2, 'Abdullahi', 'Buildings', '2020-08-31', '2020-10-11', 1000000, 10000, 'three', 'Jascol', 'insurance');

-- --------------------------------------------------------

--
-- Table structure for table `legalfees`
--

CREATE TABLE `legalfees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legalfees`
--

INSERT INTO `legalfees` (`id`, `name`, `description`, `amount`, `date`) VALUES
(1, 'Abdullahi', 'Bypassing', 100000, '2017-05-31 23:00:00');

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
  `manager` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user`, `org_id`, `name`, `lat`, `lng`, `description`, `location_status`, `size`, `soil_type`, `ph`, `chemical`, `active`, `utilization`, `start_season`, `end_season`, `ownership`, `fallow`, `manager`) VALUES
(21, 'olawale', NULL, NULL, 7.872496, 8.588821, 'farm 3A', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '', NULL, NULL, 7.146105, 5.126693, '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'hello', NULL, NULL, 8.824571, 8.240799, 'testing', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '', NULL, NULL, 8.951792, 9.697006, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '', NULL, NULL, 8.843251, 8.960922, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2', NULL, 'Abdullahi', 9.298905, 9.444320, 'Bypassing', 1, 23, 'loamy', '7', 'qwerty', 'dog', 'rearing', '2020-08-31', '2020-09-14', 'full', '12', 'Abdullahi'),
(28, '2', NULL, 'Abdullahi', 9.298905, 9.444320, 'Bypassing', 1, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '1', 1, 'camry', 8.669519, 9.114730, 'Bypassing', 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `serial_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'machinery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`sn`, `user_id`, `org_id`, `category`, `name`, `description`, `serial_no`, `manufacturer`, `amount`, `date`, `table_name`) VALUES
(1, 2, NULL, 'tractor', 'james', 'a player', '123235655', 'dangote', 1200, '2020-08-12', 'machinery'),
(3, 2, NULL, 'tractor', 'Terminus', 'For this month', '45323453', 'Adullahi', 0, '2020-08-12', 'machinery'),
(5, 2, NULL, 'tractor', 'Abdullahi ', 'Bypassing', '45323453', 'Q&S', 0, '2020-08-20', 'machinery'),
(7, 2, NULL, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 11000, '2020-08-27', 'machinery'),
(8, 2, NULL, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 1000000, '2020-08-31', 'machinery'),
(9, 1, 0, 'tractor', 'Abdullahi', 'camry404', '45323453', 'jat', 1000000, '2020-09-20', 'machinery'),
(10, 1, 1, 'tractor', 'Abdullahi', 'Bypassing', '45323453', 'jat', 1000000, '2020-09-20', 'machinery');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `serial no` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `Time` time(6) NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `serial no`, `type`, `description`, `amount`, `Time`, `date`) VALUES
(1, 12345678, 'Buildings', 'Repair of SInk', 100000, '21:29:28.000000', '2020-07-13 20:29:28');

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
(5, 1, 'fatai', 'fatai@gmail.com', '09034412009', 'Gold', 12, 600000, 132000, 1, '88a5d978cad92b8841c91f2d9d299e3a', 'fatai', '2020-06-28 11:37:05', 'zeroavatar.jpg', 1),
(4, 1, 'bolaji', 'bolaji@gmail.com', '09089089009', 'Silver', 2, 50000, 10000, 1, '0c80c124799585376519959d2374b07c', 'bolaji', '2020-06-15 00:00:00', '', 1),
(5, 1, 'fatai', 'fatai@gmail.com', '09034412009', 'Gold', 12, 600000, 132000, 1, '88a5d978cad92b8841c91f2d9d299e3a', 'fatai', '2020-06-28 11:37:05', 'zeroavatar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(18, 'test@gmail.com', 'Admin', 'Create Account', '2020-06-30 05:49:20'),
(19, 'fatai@gmail.com', 'Admin', 'Send Feedback', '2020-07-01 16:58:30'),
(20, 'Admin', 'fatai@gmail.com', 'Send Message', '2020-07-01 17:01:00'),
(50, 'fatai@gmail.com', 'Admin', 'Send Feedback', '2020-07-02 11:48:31'),
(51, 'Admin', 'fatai@gmail.com', 'Send Message', '2020-07-02 17:16:10'),
(52, 'bolaji@gmail.com', 'Admin', 'Send Feedback', '2020-07-03 04:07:28'),
(53, 'Admin', 'bolaji@gmail.com', 'Send Message', '2020-07-03 04:10:13'),
(18, 'test@gmail.com', 'Admin', 'Create Account', '2020-06-30 05:49:20'),
(19, 'fatai@gmail.com', 'Admin', 'Send Feedback', '2020-07-01 16:58:30'),
(20, 'Admin', 'fatai@gmail.com', 'Send Message', '2020-07-01 17:01:00'),
(50, 'fatai@gmail.com', 'Admin', 'Send Feedback', '2020-07-02 11:48:31'),
(51, 'Admin', 'fatai@gmail.com', 'Send Message', '2020-07-02 17:16:10'),
(52, 'bolaji@gmail.com', 'Admin', 'Send Feedback', '2020-07-03 04:07:28'),
(53, 'Admin', 'bolaji@gmail.com', 'Send Message', '2020-07-03 04:10:13');

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
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`sn`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `location`, `category`, `place`, `status`, `date`) VALUES
(1, 2, NULL, 'corn', 'treated corn', '15', 'covas', 'Oyo', 'seed', 'ibadan', 'in stock', '2020-08-16'),
(2, 2, NULL, 'Abdullahi', 'Bypassing', '15', 'jat', 'Oyo', 'seed', 'Ghana', 'in stock', '2020-08-21'),
(3, 2, NULL, 'Abdullahi Temidayo Jimoh', 'camry404', '12', 'jat', 'Oyo', 'seed', 'ibadan', 'in stock', '2020-08-27'),
(4, 1, 1, 'Abdullahi', 'Bypassing', '12', 'jat', 'Oyo, Nigeria.', 'seed', 'ibadan', 'out stock', '2020-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `username`, `email`, `password`, `organization`) VALUES
(1, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda', 'Dufma');

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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'other_asset'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_asset`
--

INSERT INTO `other_asset` (`sn`, `user_id`, `org_id`, `name`, `description`, `quantity`, `manufacturer`, `status`, `location`, `amount`, `date`, `table_name`) VALUES
(1, 0, NULL, 'hoe', 'iron hoe', '12', 'jat', 'in storage', 'Oyo', 1000000, '2020-08-16', 'other_asset'),
(4, 2, NULL, 'Abdullahi Temidayo Jimoh', 'Bypassing', '12', 'Adullahi', 'in use', 'Oyo', 0, '2020-08-27', 'other_asset'),
(5, 2, NULL, 'Terminus', 'Bypassing', '12', 'jat', 'in storage', 'Nigeria.', 1000000, '2020-08-31', 'other_asset'),
(6, 1, 1, 'Abdullahi', 'Bypassing', '12', 'jat', 'in storage', 'Nigeria.', 1000000, '2020-09-20', 'other_asset');

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
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `power`
--

INSERT INTO `power` (`id`, `description`, `amount`, `date`) VALUES
(1, 'Buy Fuel', 5000, '2017-05-31 23:00:00'),
(2, 'power for this month', 11000, '2017-05-31 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sn` int(6) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sn`, `product_id`, `user_id`, `product_name`, `quantity`, `date`) VALUES
(1, 'E007', 'Abdul', 'Feeder', 22, '2020-08-18 23:00:00'),
(3, 'E005', 'Tijani', 'NPK fetilizer', 57, '2020-09-17 14:56:54'),
(4, '200B', 'Ade', 'Tractor', 25, '2020-09-17 14:57:51'),
(5, 'E007', 'Similola', 'Disinfectant', 8, '2020-09-17 15:42:53');

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
  `Business transaction date` date NOT NULL DEFAULT current_timestamp(),
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
(1, 0, '', '2020-07-17', '', '', 0, 0, 0, 0, 0, '', 'Abdullahi', '2147483647', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ppunit` varchar(255) NOT NULL,
  `qitem` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `time` time(6) NOT NULL,
  `date` date NOT NULL,
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `sn`, `name`, `description`, `ppunit`, `qitem`, `amount`, `time`, `date`, `add_parameters`) VALUES
(1, '001', 'sugar', 'tea', '10', '4', 2300, '03:32:00.000000', '2016-09-01', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `rawmaterials`
--

CREATE TABLE `rawmaterials` (
  `id` int(6) NOT NULL,
  `id_rawmaterials` varchar(255) NOT NULL,
  `qty_rawmaterials` varchar(255) NOT NULL,
  `cost_unit` varchar(255) NOT NULL,
  `tot_cost_qty` varchar(255) NOT NULL,
  `tot_cost_rawmaterials` varchar(255) NOT NULL,
  `per_rawmaterials_cost` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawmaterials`
--

INSERT INTO `rawmaterials` (`id`, `id_rawmaterials`, `qty_rawmaterials`, `cost_unit`, `tot_cost_qty`, `tot_cost_rawmaterials`, `per_rawmaterials_cost`, `date`, `add_parameters`) VALUES
(12, '006', '6', '200', '1200', '6000', '20', '2020-08-30 00:56:40', 'nothing'),
(14, '006', '6', '60', '360', '600', '600', '2020-08-30 00:56:40', 'something');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `sn`, `name`, `description`, `quantity`, `amount`, `date`, `add_parameters`) VALUES
(2, '001', 'ade', 'ICT director\'s car', '2', 2300, '2017-06-01', 'nothing'),
(3, '001', 'ade', 'ICT director\'s car', '2', 2300, '2017-06-01', 'nothing'),
(4, '', '', '', '', 0, '2017-06-01', '');

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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `Add parameter` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `type`, `name`, `amount payable`, `employee status`, `description`, `eligibility`, `method`, `allowance to be debited`, `date`, `Add parameter`, `employee_id`) VALUES
(1, 'Salary', 'Abdullahi Temidayo Jimoh', 1000000, 'contract', 'Bypassing', 'yes', 'transfer', 100000, '2020-08-29', 'employee', 10),
(2, 'Salary', 'Saheed Adigun', 1245677, 'permanent', 'camry404', 'yes', 'transfer', 100000, '2020-08-29', 'employee', 11);

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
  `sn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL,
  `add_parameters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `sn`, `name`, `description`, `amount`, `date`, `add_parameters`) VALUES
(1, '001', 'light', 'dec', 2300, '2017-06-27', ''),
(2, '001', 'ade', 'ICT director\'s car', 2300, '2017-06-01', 'nothing'),
(0, '124345665', 'Terminus', 'Bypassing', 1000000, '2017-06-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `sn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `serial_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `manufacturer` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `table_name` varchar(50) NOT NULL DEFAULT 'vehicle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`sn`, `user_id`, `org_id`, `name`, `description`, `serial_no`, `manufacturer`, `amount`, `date`, `table_name`) VALUES
(1, 2, NULL, 'camry', 'camry404', '123453221', 'toyota', 1233, '2020-08-16', 'vehicle'),
(4, 2, NULL, 'sienna', 'a long vehicle', '1234434', 'mezidis', 0, '2020-08-21', 'vehicle'),
(7, 0, NULL, 'Terminus', '2', '1234434', 'covas', 0, '2020-08-27', 'vehicle'),
(8, 2, NULL, 'Abdullahi', 'Bypassing', '1234434', 'jat', 1000000, '2020-08-31', 'vehicle'),
(9, 1, 1, 'Abdullahi', 'Bypassing', '1234434', 'jat', 1000000, '2020-09-20', 'vehicle');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contract_start` varchar(11) DEFAULT NULL,
  `contract_end` varchar(11) DEFAULT NULL,
  `salary` int(50) DEFAULT NULL,
  `quality_of_work` varchar(50) DEFAULT NULL,
  `team_work` varchar(50) DEFAULT NULL,
  `punctuality` varchar(50) DEFAULT NULL,
  `table_name` varchar(50) NOT NULL DEFAULT 'worker'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `user_id`, `image`, `name`, `email`, `gender`, `role`, `phone`, `contract_start`, `contract_end`, `salary`, `quality_of_work`, `team_work`, `punctuality`, `table_name`) VALUES
(1, 2, 'zeroavatar.jpg', 'Abdullahi Temidayo Jimoh', 'abdullahij951@gmail.com', 'male', 'Developer', '08061266260', '2020-07-27', '2020-09-06', NULL, 'rejected', 'notsatisfactory', 'satisfactory', 'worker');

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
  ADD PRIMARY KEY (`sn`);

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
  ADD PRIMARY KEY (`sn`);

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
-- Indexes for table `legalfees`
--
ALTER TABLE `legalfees`
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
  ADD PRIMARY KEY (`sn`);

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
  ADD PRIMARY KEY (`sn`);

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
-- Indexes for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
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
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`sn`);

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
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alarm`
--
ALTER TABLE `alarm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appraisal`
--
ALTER TABLE `appraisal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_amount`
--
ALTER TABLE `asset_amount`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
-- AUTO_INCREMENT for table `legalfees`
--
ALTER TABLE `legalfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `liabilty`
--
ALTER TABLE `liabilty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance-item`
--
ALTER TABLE `maintenance-item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_asset`
--
ALTER TABLE `other_asset`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `power`
--
ALTER TABLE `power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sn` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `rawmaterials`
--
ALTER TABLE `rawmaterials`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
