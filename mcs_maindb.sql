-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2018 at 08:00 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcs_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_holders`
--

CREATE TABLE `account_holders` (
  `account_holder_id` int(255) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `father_name` varchar(300) NOT NULL,
  `mother_name` varchar(300) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `file_reference` varchar(300) NOT NULL,
  `amount` int(255) NOT NULL DEFAULT '0',
  `present_address` varchar(300) NOT NULL,
  `permanent__address` varchar(300) NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_holders`
--

INSERT INTO `account_holders` (`account_holder_id`, `full_name`, `father_name`, `mother_name`, `birthdate`, `gender`, `telephone`, `email`, `password`, `file_reference`, `amount`, `present_address`, `permanent__address`, `branch_id`) VALUES
(1, 'ajadi tamilore', 'ajadi tami', 'ajadi lore', '2018-02-02', 'F', '2147483647', 'deadguy@deadguys.com', 'deadness', 'Reg/25:Feb:2018/1/ajadi tamilore', 0, '13th hell street', '13th hell street', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_loan`
-- (See below for the actual view)
--
CREATE TABLE `admin_loan` (
`account_name` varchar(300)
,`loan_amount` int(255)
,`loan_description` text
,`interest` int(11)
,`loan_start` datetime
,`loan_stop` datetime
,`full_name` varchar(25)
,`file_reference` varchar(300)
,`branch_id` int(255)
,`status` enum('Pending','Approved','Expired','Declined')
);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `intime` datetime NOT NULL,
  `outtime` datetime NOT NULL,
  `meeting_id` int(255) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `account_holder_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `attendance employee`
-- (See below for the actual view)
--
CREATE TABLE `attendance employee` (
`info` text
,`venue` text
,`branch_id` int(255)
,`created_date` datetime
,`full_name` varchar(25)
,`intime` datetime
,`outtime` datetime
,`attendance_id` int(255)
,`meeting_id` int(255)
,`employee_id` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `attendance user`
-- (See below for the actual view)
--
CREATE TABLE `attendance user` (
`info` text
,`venue` text
,`branch_id` int(255)
,`created_date` datetime
,`full_name` varchar(300)
,`intime` datetime
,`outtime` datetime
,`attendance_id` int(255)
,`meeting_id` int(255)
,`account_holder_id` int(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `branchs`
--

CREATE TABLE `branchs` (
  `branch_id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `contact_email` varchar(300) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branchs`
--

INSERT INTO `branchs` (`branch_id`, `name`, `employee_id`, `address`, `contact_no`, `contact_email`, `date_created`) VALUES
(1, 'Dumuriya', 2, 'Dumuriya Bazar', '01326457895', 'd@dmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `broadcast_id` int(255) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `status` enum('General','Branch','Managers','') NOT NULL,
  `branch_id` int(255) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`broadcast_id`, `title`, `message`, `status`, `branch_id`, `creation_date`) VALUES
(1, 'Test', 'Test Message', 'General', 1, '2018-03-22'),
(2, 'Test', 'Test Message', 'Branch', 1, '2018-03-22'),
(3, 'Test', 'Test Message', 'Managers', 1, '2018-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(255) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`, `date_created`, `branch_id`) VALUES
(9, 'Registry', '0000-00-00 00:00:00', 1),
(10, 'Branch', '0000-00-00 00:00:00', 1),
(11, 'Sales', '0000-00-00 00:00:00', 1),
(12, 'Registration', '0000-00-00 00:00:00', 1),
(13, 'Records', '0000-00-00 00:00:00', 1),
(14, 'General', '0000-00-00 00:00:00', 1),
(15, 'Broadcast', '0000-00-00 00:00:00', 1),
(16, 'Loan', '0000-00-00 00:00:00', 1),
(18, 'Accounting', '2018-02-23 08:46:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(255) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `fathers_name` varchar(25) NOT NULL,
  `mothers_name` varchar(25) NOT NULL,
  `department` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `gender_type` enum('M','F','','') NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `file_reference` varchar(25) NOT NULL,
  `present_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive','','') NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `full_name`, `fathers_name`, `mothers_name`, `department`, `birth_date`, `gender_type`, `mobile`, `email`, `password`, `file_reference`, `present_address`, `permanent_address`, `joining_date`, `status`, `branch_id`) VALUES
(1, 'ibekie ifeanyi', 'gabriel', 'francisca', 'Registry', '1998-06-05', 'M', '08145126202', 'ifeanyi.ibekie@gmail.com', 'excellency', '', '13 rd', '13 rd', '2018-02-23 09:09:08', 'Active', 1),
(2, 'ibekie ifeanyi', 'gabriel', 'francisca', 'Branch', '1998-06-05', 'M', '08145126202', 'ifeanyi.branch@gmail.com', 'excellency', '', '13 rd', '13 rd', '2018-02-23 09:09:08', 'Active', 1),
(3, 'ibekie ifeanyi', 'gabriel', 'francisca', 'Records', '1998-06-05', 'M', '08145126202', 'ifeanyi.records@gmail.com', 'excellency', '', '13 rd', '13 rd', '2018-02-23 09:09:08', 'Active', 1),
(4, 'ibekie ifeanyi', 'gabriel', 'francisca', 'Sales', '1998-06-05', 'M', '08145126202', 'ifeanyi.sales@gmail.com', 'excellency', '', '13 rd', '13 rd', '2018-02-23 09:09:08', 'Active', 1),
(5, 'ibekie ifeanyi', 'gabriel', 'francisca', 'Loan', '1998-06-05', 'M', '08145126202', 'ifeanyi.loan@gmail.com', 'excellency', '', '13 rd', '13 rd', '2018-02-23 09:09:08', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guarantors`
--

CREATE TABLE `guarantors` (
  `guarantor_id` int(255) NOT NULL,
  `account_holder_id` int(255) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `fathers_name` varchar(25) NOT NULL,
  `mothers_name` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `relation` varchar(12) NOT NULL,
  `file_reference` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `permanent_address` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guarantors`
--

INSERT INTO `guarantors` (`guarantor_id`, `account_holder_id`, `full_name`, `fathers_name`, `mothers_name`, `birth_date`, `relation`, `file_reference`, `mobile`, `permanent_address`, `email`) VALUES
(1, 1, 'ibekie ifeanyi', 'Gabriel Ibekie', 'Francisca Ibekie', '2018-03-19', 'Friend', 'Reg/1222/guarantor', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(255) NOT NULL,
  `file_reference` varchar(30) NOT NULL,
  `file_subject` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `action` enum('Creation','Incoming','Outgoing','') NOT NULL,
  `dept_from` varchar(30) NOT NULL,
  `dept_to` varchar(30) NOT NULL,
  `employee` varchar(300) NOT NULL,
  `start_page` int(255) NOT NULL,
  `stop_page` int(255) NOT NULL,
  `file_remarks` text NOT NULL,
  `status` enum('Active','Archived','','') NOT NULL,
  `folio_out` varchar(30) NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `file_reference`, `file_subject`, `date`, `action`, `dept_from`, `dept_to`, `employee`, `start_page`, `stop_page`, `file_remarks`, `status`, `folio_out`, `branch_id`) VALUES
(1, 'Reg/25:Feb:2018/1/ajadi tamilo', 'New Registration', '0000-00-00 00:00:00', 'Creation', '', 'Registration', '', 0, 1, 'A newly registered member to your branch', 'Active', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `incoming_file`
--

CREATE TABLE `incoming_file` (
  `id` int(255) NOT NULL,
  `file_reference` varchar(30) NOT NULL,
  `file_subject` varchar(30) NOT NULL,
  `dept_from` varchar(30) NOT NULL,
  `dept_to` varchar(30) NOT NULL,
  `employee` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `start_page` int(255) NOT NULL,
  `stop_page` int(255) NOT NULL,
  `file_remarks` text NOT NULL,
  `status` enum('Active','Archived','Approved','') NOT NULL,
  `branch_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incoming_file`
--

INSERT INTO `incoming_file` (`id`, `file_reference`, `file_subject`, `dept_from`, `dept_to`, `employee`, `date`, `start_page`, `stop_page`, `file_remarks`, `status`, `branch_id`) VALUES
(2, 'Reg/25:Feb:2018/1/ajadi tamilo', 'New Registration', '', 'Registration', '', '0000-00-00 00:00:00', 0, 1, 'A newly registered Member to your branch', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(255) NOT NULL,
  `account_holder_id` int(255) NOT NULL,
  `loan_amount` int(255) NOT NULL,
  `loan_description` text NOT NULL,
  `interest` int(11) NOT NULL,
  `loan_start` datetime NOT NULL,
  `loan_stop` datetime NOT NULL,
  `guarantor_id` int(25) NOT NULL,
  `branch_id` int(255) NOT NULL,
  `file_reference` varchar(300) NOT NULL,
  `status` enum('Pending','Approved','Expired','Declined') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meeting_id` int(255) NOT NULL,
  `info` text NOT NULL,
  `venue` text NOT NULL,
  `branch_id` int(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_file`
--

CREATE TABLE `outgoing_file` (
  `id` int(255) NOT NULL,
  `file_reference` varchar(30) NOT NULL,
  `file_subject` varchar(30) NOT NULL,
  `start_page` int(255) NOT NULL,
  `stop_page` int(255) NOT NULL,
  `file_remarks` text NOT NULL,
  `dept_from` varchar(30) NOT NULL,
  `dept_to` varchar(30) NOT NULL,
  `status` enum('Active','Archived','','') NOT NULL,
  `folio_out` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_buy`
--

CREATE TABLE `product_buy` (
  `product_buy_id` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(255) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `account_holder_id` int(255) NOT NULL,
  `order_status` enum('Pending','Confirmed','Shipping','Shipped') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(255) NOT NULL,
  `name` varchar(25) NOT NULL,
  `main_grp` text NOT NULL,
  `sub_grp` text NOT NULL,
  `specification` text NOT NULL,
  `details` text NOT NULL,
  `amount` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `photopath` varchar(300) NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(255) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `salary_amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `savings_id` int(255) NOT NULL,
  `employee_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(255) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriber_id`, `full_name`, `email`, `date`) VALUES
(1, '', 'dfsdfsd', '2016-07-29 01:15:11');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_loan`
-- (See below for the actual view)
--
CREATE TABLE `users_loan` (
`loan_id` int(255)
,`account_holder_id` int(255)
,`loan_amount` int(255)
,`loan_description` text
,`interest` int(11)
,`loan_start` datetime
,`loan_stop` datetime
,`branch_id` int(255)
,`file_reference` varchar(300)
,`full_name` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure for view `admin_loan`
--
DROP TABLE IF EXISTS `admin_loan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_loan`  AS  select `account_holders`.`full_name` AS `account_name`,`loan`.`loan_amount` AS `loan_amount`,`loan`.`loan_description` AS `loan_description`,`loan`.`interest` AS `interest`,`loan`.`loan_start` AS `loan_start`,`loan`.`loan_stop` AS `loan_stop`,`guarantors`.`full_name` AS `full_name`,`loan`.`file_reference` AS `file_reference`,`loan`.`branch_id` AS `branch_id`,`loan`.`status` AS `status` from ((`loan` join `account_holders`) join `guarantors` on(((`account_holders`.`account_holder_id` = `loan`.`account_holder_id`) and (`guarantors`.`guarantor_id` = `loan`.`guarantor_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `attendance employee`
--
DROP TABLE IF EXISTS `attendance employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attendance employee`  AS  select `meeting`.`info` AS `info`,`meeting`.`venue` AS `venue`,`meeting`.`branch_id` AS `branch_id`,`meeting`.`created_date` AS `created_date`,`employees`.`full_name` AS `full_name`,`attendance`.`intime` AS `intime`,`attendance`.`outtime` AS `outtime`,`attendance`.`attendance_id` AS `attendance_id`,`meeting`.`meeting_id` AS `meeting_id`,`employees`.`employee_id` AS `employee_id` from ((`attendance` join `employees`) join `meeting` on(((`attendance`.`meeting_id` = `meeting`.`meeting_id`) and (`attendance`.`employee_id` = `employees`.`employee_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `attendance user`
--
DROP TABLE IF EXISTS `attendance user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `attendance user`  AS  select `meeting`.`info` AS `info`,`meeting`.`venue` AS `venue`,`meeting`.`branch_id` AS `branch_id`,`meeting`.`created_date` AS `created_date`,`account_holders`.`full_name` AS `full_name`,`attendance`.`intime` AS `intime`,`attendance`.`outtime` AS `outtime`,`attendance`.`attendance_id` AS `attendance_id`,`meeting`.`meeting_id` AS `meeting_id`,`account_holders`.`account_holder_id` AS `account_holder_id` from ((`attendance` join `account_holders`) join `meeting` on(((`attendance`.`meeting_id` = `meeting`.`meeting_id`) and (`attendance`.`account_holder_id` = `account_holders`.`account_holder_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `users_loan`
--
DROP TABLE IF EXISTS `users_loan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_loan`  AS  select `loan`.`loan_id` AS `loan_id`,`loan`.`account_holder_id` AS `account_holder_id`,`loan`.`loan_amount` AS `loan_amount`,`loan`.`loan_description` AS `loan_description`,`loan`.`interest` AS `interest`,`loan`.`loan_start` AS `loan_start`,`loan`.`loan_stop` AS `loan_stop`,`loan`.`branch_id` AS `branch_id`,`loan`.`file_reference` AS `file_reference`,`guarantors`.`full_name` AS `full_name` from (`loan` join `guarantors` on((`loan`.`guarantor_id` = `guarantors`.`guarantor_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_holders`
--
ALTER TABLE `account_holders`
  ADD PRIMARY KEY (`account_holder_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `meeting_id` (`meeting_id`),
  ADD KEY `account_holder_id` (`account_holder_id`);

--
-- Indexes for table `branchs`
--
ALTER TABLE `branchs`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`broadcast_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `guarantors`
--
ALTER TABLE `guarantors`
  ADD PRIMARY KEY (`guarantor_id`),
  ADD KEY `account_holder_id` (`account_holder_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `incoming_file`
--
ALTER TABLE `incoming_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `account_holder_id` (`account_holder_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `guarantor_id` (`guarantor_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `outgoing_file`
--
ALTER TABLE `outgoing_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_buy`
--
ALTER TABLE `product_buy`
  ADD PRIMARY KEY (`product_buy_id`),
  ADD KEY `account_holder_id` (`account_holder_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`savings_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_holders`
--
ALTER TABLE `account_holders`
  MODIFY `account_holder_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branchs`
--
ALTER TABLE `branchs`
  MODIFY `branch_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `broadcast_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guarantors`
--
ALTER TABLE `guarantors`
  MODIFY `guarantor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incoming_file`
--
ALTER TABLE `incoming_file`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outgoing_file`
--
ALTER TABLE `outgoing_file`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_buy`
--
ALTER TABLE `product_buy`
  MODIFY `product_buy_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `savings_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subscriber_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_holders`
--
ALTER TABLE `account_holders`
  ADD CONSTRAINT `account_holders_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`meeting_id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`account_holder_id`);

--
-- Constraints for table `branchs`
--
ALTER TABLE `branchs`
  ADD CONSTRAINT `branchs_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD CONSTRAINT `broadcast_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `guarantors`
--
ALTER TABLE `guarantors`
  ADD CONSTRAINT `guarantors_ibfk_1` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`account_holder_id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `incoming_file`
--
ALTER TABLE `incoming_file`
  ADD CONSTRAINT `incoming_file_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`account_holder_id`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`),
  ADD CONSTRAINT `loan_ibfk_3` FOREIGN KEY (`guarantor_id`) REFERENCES `guarantors` (`guarantor_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branchs` (`branch_id`);

--
-- Constraints for table `product_buy`
--
ALTER TABLE `product_buy`
  ADD CONSTRAINT `product_buy_ibfk_1` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`account_holder_id`),
  ADD CONSTRAINT `product_buy_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_details` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
