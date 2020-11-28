-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2015 at 04:04 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marvel`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `address`, `mobile`) VALUES
(1, 'Marvel Water Park', 'NH-8, GOVERDHAN VILAS, UDAIPUR', '7891745000');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE IF NOT EXISTS `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `group_bookings`
--

CREATE TABLE IF NOT EXISTS `group_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `complete_address` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email_id` varchar(120) NOT NULL,
  `date_time` varchar(120) NOT NULL,
  `adult` int(10) NOT NULL,
  `children` int(10) NOT NULL,
  `tot_amount` varchar(10) NOT NULL,
  `discount_percent` varchar(10) NOT NULL,
  `paid_amount` varchar(10) NOT NULL,
  `authorised_person` varchar(120) NOT NULL,
  `remarks` text NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `current_date` date NOT NULL,
  `time` varchar(120) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_bookings`
--

INSERT INTO `group_bookings` (`id`, `bill_no`, `name`, `complete_address`, `contact_no`, `email_id`, `date_time`, `adult`, `children`, `tot_amount`, `discount_percent`, `paid_amount`, `authorised_person`, `remarks`, `login_id`, `counter_id`, `current_date`, `time`, `status`) VALUES
(2, 'GH0002', 'dasu menaria', 'udaipur', '9680747166', 'dasumenaria@gmail', '17-October-2015 12:31', 2, 3, '1450', '50', '725', 'das', '', 1, 1, '2015-10-18', '02:26:59 pm', 1),
(3, 'GH0003', 'Abhilash', 'udaipur', '9680747166', '', '17-October-2015 12:31', 5, 5, '3000', '50', '1500', 'das', '', 1, 1, '2015-10-18', '02:30:15 pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_returns`
--

CREATE TABLE IF NOT EXISTS `issue_returns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_caregory_id` int(11) NOT NULL,
  `master_item_id` int(11) NOT NULL,
  `quantitiy` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `login_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 means issue, 1 means return',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_inwards`
--

CREATE TABLE IF NOT EXISTS `item_inwards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_item_id` int(11) NOT NULL,
  `quantitiy` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `login_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 means ineward 1 means outward',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_inwards`
--

INSERT INTO `item_inwards` (`id`, `master_item_id`, `quantitiy`, `date`, `remarks`, `login_id`, `type`) VALUES
(1, 3, 1, '2015-10-17', 'fsd', 1, 0),
(2, 3, 1, '2015-10-17', 'fsd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_manages`
--

CREATE TABLE IF NOT EXISTS `item_manages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_status` int(11) NOT NULL COMMENT '0 means return 1 means not return',
  `master_item_id` varchar(120) NOT NULL,
  `no_of_item` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `login_id`, `password`, `username`, `email`, `counter_id`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ankit@phppoets.com', 1, 1),
(2, 'dasu', '304ef9a575bf4b50e337969df0c671a2', 'Dashrath Menaria', 'Dasumenaria@gmail.com', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_categories`
--

CREATE TABLE IF NOT EXISTS `master_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_categories`
--

INSERT INTO `master_categories` (`id`, `category`, `flag`) VALUES
(1, 'item', 0),
(2, 'other', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_items`
--

CREATE TABLE IF NOT EXISTS `master_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `status` int(11) NOT NULL,
  `rate` varchar(120) NOT NULL,
  `security` varchar(120) NOT NULL,
  `counter_id` varchar(120) NOT NULL,
  `auto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `master_items`
--

INSERT INTO `master_items` (`id`, `name`, `status`, `rate`, `security`, `counter_id`, `auto_id`) VALUES
(1, 'Adult', 2, '350', '0', '1,2,3', 1),
(2, 'Children', 2, '250', '0', '1,2,3', 1),
(3, 'Male Costume', 1, '100', '50', '2,4', 2),
(4, 'Female Costume', 1, '100', '50', '2,4', 2),
(7, 'Locker', 1, '50', '0', '4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `missings`
--

CREATE TABLE IF NOT EXISTS `missings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=Lost , 1=Found',
  `lost_date` date NOT NULL,
  `location_item` text NOT NULL,
  `description_item` text NOT NULL,
  `comments` text NOT NULL,
  `found_date` date NOT NULL,
  `found_by` varchar(120) NOT NULL,
  `found_location` text NOT NULL,
  `found_comment` text NOT NULL,
  `current_date` date NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `missings`
--

INSERT INTO `missings` (`id`, `ticket_no`, `name`, `mobile_no`, `email_id`, `address`, `status`, `lost_date`, `location_item`, `description_item`, `comments`, `found_date`, `found_by`, `found_location`, `found_comment`, `current_date`, `type`) VALUES
(1, '', 'sdfs', 'sdfsd', 'dasumenaria@gmail', '', 0, '2015-10-17', '', '', '', '0000-00-00', '', '', '', '2015-10-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `main_menu` text NOT NULL,
  `main_menu_icon` varchar(30) NOT NULL,
  `sub_menu` varchar(20) NOT NULL,
  `sub_menu_icon` varchar(20) NOT NULL,
  `page_name_url` text NOT NULL,
  `icon_class_name` varchar(20) NOT NULL,
  `query_string` text NOT NULL,
  `target` varchar(50) NOT NULL,
  `preferance` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_menu`, `main_menu_icon`, `sub_menu`, `sub_menu_icon`, `page_name_url`, `icon_class_name`, `query_string`, `target`, `preferance`) VALUES
(1, 'Dashboard', '', '', '', '', 'index', 'icon-home', '', '', 1),
(2, 'Ticket Portal', '', '', '', '', 'ticket_generate?mode=tic', 'fa fa-ticket', '', '', 2),
(3, 'Add', 'Lost', 'fa fa-bell', '', '', 'lost_menu', 'fa fa-plus ', '', '', 9),
(4, 'Edit', 'Lost', 'fa fa-bell', '', '', 'lost_menu?mode=edit', 'fa fa-edit', '', '', 9),
(5, 'Delete', 'Lost', 'fa fa-bell', '', '', 'lost_menu?mode=del', 'fa fa-trash-o', '', '', 9),
(6, 'Search', 'Lost', 'fa fa-bell', '', '', 'lost_menu?mode=view', 'fa fa-search', '', '', 9),
(7, 'Ticket ', 'Reports', 'fa fa-bar-chart-o', '', '', 'report_ticket', 'fa fa-ticket', '', '', 11),
(8, 'Create Account', 'Users', 'fa fa-users', '', '', 'create_login', 'fa fa-user', '', '', 12),
(9, 'Assign Rights', 'Users', 'fa fa-users', '', '', 'user_right', 'fa fa-check', '', '', 12),
(10, 'Counter', 'Master Setup', 'icon-settings', '', '', 'counter_menu', 'fa fa-inbox', '', '', 13),
(11, 'Item Category', 'Master Setup', 'icon-settings', '', '', 'ticket_menu', 'fa fa-ticket', '', '', 13),
(13, 'Return Items', '', 'fa fa-mail-reply', '', '', 'item_manage?mode=ret', 'fa fa-mail-reply', '', '', 3),
(14, 'Item Summary', 'Reports', 'fa fa-bar-chart-o', '', '', 'report_item_allotted', 'fa fa-cubes ', '', '', 11),
(15, 'Add Stock', 'Inward', 'icon-puzzle', '', '', 'inward_menu', 'fa fa-plus', '', '', 4),
(16, 'Edit|Delete|View', 'Inward', 'icon-puzzle', '', '', 'inward_menu?mode=edit', 'fa fa-cogs', '', '', 4),
(17, 'Stock Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'report_stock', 'fa fa-inbox', '', '', 11),
(18, 'Add Group Booking', 'Booking', 'fa fa-gift', '', '', 'group_booking', 'fa fa-plus', '', '', 14),
(19, 'View', 'Booking', 'fa fa-gift', '', '', 'group_booking?mode=view', 'fa fa-search', '', '', 14),
(20, 'Add Stock', 'Outward', 'fa fa-truck', '', '', 'outward', 'fa fa-plus', '', '', 5),
(21, 'Edit|Delete|View', 'Outward', 'fa fa-truck', '', '', 'outward?mode=edit', 'fa fa-truck', '', '', 5),
(22, 'Add Reading', 'PH Reading', 'fa fa-book', '', '', 'ph_reading', 'fa fa-plus', '', '', 6),
(23, 'Edit|Delete|View', 'PH Reading', 'fa fa-book', '', '', 'ph_reading?mode=edit', 'fa fa-truck', '', '', 6),
(24, 'Summary Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'summary_report', 'fa fa-list', '', '_blank', 11),
(25, 'Issue', 'Issue', 'fa fa-mail-forward', '', '', 'Issue_item', 'fa fa-plus', '', '', 7),
(26, 'Edit|Delete|View', 'Issue', 'fa fa-mail-forward', '', '', 'Issue_item?mode=edit', 'fa fa-book', '', '', 7),
(27, 'Return', 'Return', 'fa fa-mail-reply-all', '', '', 'return_item', 'fa fa-plus', '', '', 8),
(28, 'Edit|Delete|View', 'Return', 'fa fa-mail-reply-all', '', '', 'return_item?mode=edit', 'fa fa-book', '', '', 8),
(29, 'Month Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'month_report', 'fa fa-book', '', '', 11),
(30, 'Daily Summary', 'Reports', 'fa fa-bar-chart-o', '', '', 'daily_summary_report', 'fa fa-book', '', '', 11),
(31, 'Group Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'group_report', 'fa fa-book', '', '', 11),
(32, 'Add', 'Found', 'fa fa-bell', '', '', 'found_menu', 'fa fa-plus ', '', '', 10),
(33, 'Edit', 'Found', 'fa fa-bell', '', '', 'found_menu?mode=edit', 'fa fa-edit', '', '', 10),
(34, 'Delete', 'Found', 'fa fa-bell', '', '', 'found_menu?mode=del', 'fa fa-trash-o', '', '', 10),
(35, 'Search', 'Found', 'fa fa-bell', '', '', 'found_menu?mode=view', 'fa fa-search', '', '', 10),
(36, 'Edit Ticket', '', '', '', '', 'ticket_edit', 'fa fa-plus ', '', '', 2),
(37, 'Taxi Commission', 'Booking', 'fa fa-gift', '', '', 'taxi_commission', 'fa fa-plus', '', '', 14),
(38, 'Ticket Wise Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'ticket_wise_report', 'fa fa-cubes ', '', '', 11),
(39, 'Taxi Commission Report', 'Reports', 'fa fa-bar-chart-o', '', '', 'taxi_commission_report', 'fa fa-book', '', '', 11),
(40, 'Update Password', 'Users', 'fa fa-users', '', '', 'user_profile', 'fa fa-edit', '', '', 12),
(41, 'Backup  Database', '', '', '', '', 'backup', 'fa fa-database', '', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `ph_readings`
--

CREATE TABLE IF NOT EXISTS `ph_readings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kids_pool_reading` varchar(30) NOT NULL,
  `adult_pool_reading` varchar(50) NOT NULL,
  `river_reading` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` text NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxi_commissions`
--

CREATE TABLE IF NOT EXISTS `taxi_commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `ticket_no` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_entries`
--

CREATE TABLE IF NOT EXISTS `ticket_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` int(15) NOT NULL,
  `auto_increment` int(11) NOT NULL,
  `category_auto_id` int(11) NOT NULL,
  `master_item_id` varchar(120) NOT NULL,
  `no_of_person` text,
  `amount` varchar(120) NOT NULL,
  `tot_amnt` varchar(120) NOT NULL,
  `discount` varchar(120) NOT NULL,
  `grand_amnt` varchar(120) NOT NULL,
  `security_amnt` varchar(120) NOT NULL,
  `paid_amnt` varchar(120) NOT NULL,
  `discount_authorise` varchar(120) NOT NULL,
  `locker_no` int(10) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_entry_olds`
--

CREATE TABLE IF NOT EXISTS `ticket_entry_olds` (
  `id` int(11) NOT NULL,
  `auto_increment` int(11) NOT NULL,
  `category_auto_id` int(11) NOT NULL,
  `master_item_id` varchar(120) NOT NULL,
  `no_of_person` text,
  `amount` varchar(120) NOT NULL,
  `tot_amnt` varchar(120) NOT NULL,
  `discount` varchar(120) NOT NULL,
  `grand_amnt` varchar(120) NOT NULL,
  `security_amnt` varchar(120) NOT NULL,
  `paid_amnt` varchar(120) NOT NULL,
  `discount_authorise` varchar(120) NOT NULL,
  `locker_no` int(10) NOT NULL,
  `name_person` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_entry_olds`
--

INSERT INTO `ticket_entry_olds` (`id`, `auto_increment`, `category_auto_id`, `master_item_id`, `no_of_person`, `amount`, `tot_amnt`, `discount`, `grand_amnt`, `security_amnt`, `paid_amnt`, `discount_authorise`, `locker_no`, `name_person`, `mobile`, `date`, `time`, `login_id`, `counter_id`, `flag`) VALUES
(1, 1, 1, '1,2', '1,1', '350,250', '600', '0', '600', '0', '600', '', 0, 'Dasu menaria', '9999999999', '2015-10-16', '04:44:06 pm', 1, 1, 0),
(2, 2, 1, '1,2', '5,4', '1750,1000', '2750', '0', '2750', '0', '2750', '', 0, 'Dashrat', '9650414141', '2015-10-16', '05:05:26 pm', 1, 1, 1),
(3, 3, 1, '1,2', '2,2', '700,500', '1200', '0', '1200', '0', '1200', '', 0, 'nilesh', '9928228690', '2015-10-16', '05:05:47 pm', 1, 1, 1),
(4, 4, 1, '1,2', '1,1', '350,250', '600', '0', '600', '0', '600', '', 0, 'Dasu menaria', '9999999999', '2015-10-17', '10:57:19 am', 1, 1, 0),
(5, 5, 1, '1,2', '1,1', '350,250', '600', '0', '600', '0', '600', '', 0, 'Dasu menaria', '9650414141', '2015-10-17', '04:47:23 pm', 1, 1, 0),
(6, 6, 1, '1,2', '1,1', '350,250', '600', '0', '600', '0', '600', '', 0, 'nilesh', '', '2015-10-19', '11:24:31 am', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE IF NOT EXISTS `user_rights` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_rights`
--

INSERT INTO `user_rights` (`id`, `user_id`, `module_id`) VALUES
(1, 1, '1,2,3,4,5,6,7,8,9,10,11,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41'),
(2, 2, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
