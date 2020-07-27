-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 11:32 PM
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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a'),
(2, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda'),
(1, 'admin', 'admin@admin.com', '9ae2be73b58b565bce3e47493a56e26a'),
(2, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda');

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
-- Table structure for table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `user_id`, `description`, `type-expenses`, `type-asset`, `amount`, `created_at`) VALUES
(1, 5, 'Boy', 'Insurance & security', '', 1000000, '2020-07-12 16:27:45'),
(2, 5, 'Training', 'Raw Materials', '', 1245677, '2020-07-12 16:35:00'),
(4, 5, 'good', 'Project\r\nExpenses', '', 1334344, '2020-07-12 16:56:15'),
(5, 5, 'repair of pipes', 'Buildings', '', 10000, '2020-07-13 20:21:22');

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
(5, '1556112789graduate-finance-jobs-planning.jpg', '2020-07-03 00:55:26');

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
(5, 1, 'fatai', 'fatai@gmail.com', '09034412009', 'Gold', 12, 600000, 132000, 1, '88a5d978cad92b8841c91f2d9d299e3a', 'fatai', '2020-06-28 11:37:05', 'whatsapp-image-2020-03-29-at-9.16.27-pm.jpeg', 1),
(4, 1, 'bolaji', 'bolaji@gmail.com', '09089089009', 'Silver', 2, 50000, 10000, 1, '0c80c124799585376519959d2374b07c', 'bolaji', '2020-06-15 00:00:00', '', 1),
(5, 1, 'fatai', 'fatai@gmail.com', '09034412009', 'Gold', 12, 600000, 132000, 1, '88a5d978cad92b8841c91f2d9d299e3a', 'fatai', '2020-06-28 11:37:05', 'whatsapp-image-2020-03-29-at-9.16.27-pm.jpeg', 1);

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
(1, 'Buy Fuel', 5000, '2017-05-31 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productsale`
--

CREATE TABLE `productsale` (
  `id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `salename` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `productname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
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
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Add parameter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `type`, `name`, `amount payable`, `employee status`, `description`, `eligibility`, `method`, `allowance to be debited`, `date`, `Add parameter`) VALUES
(1, 'Salary', 'Abdullahi', 1000000, 'contract', 'go home', 'yes', 'transfer', 100000, '2017-05-31 23:00:00', ''),
(2, 'Salary', 'Abdullahi', 1000000, 'contract', 'Bypassing', 'yes', 'transfer', 100000, '2017-05-31 23:00:00', '');

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
  `totalamount` int(11) NOT NULL,
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

INSERT INTO `service` (`id`, `transaction`, `salename`, `date`, `productname`, `description`, `price`, `quantity`, `discount`, `totalamount`, `totalquantity`, `method`, `customername`, `phone`, `type`, `add_parameter`) VALUES
(0, '123', 'otun', '2020-07-02', 'boska', 'brown', 100, 3, 20, 200, 200, 'transfer', 'tunde', '08039412009', 'Weekly', 'nothing');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
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
-- Indexes for table `power`
--
ALTER TABLE `power`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product sales`
--
ALTER TABLE `product sales`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `granty`
--
ALTER TABLE `granty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `power`
--
ALTER TABLE `power`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product sales`
--
ALTER TABLE `product sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
