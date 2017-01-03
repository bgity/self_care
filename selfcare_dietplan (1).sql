-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2016 at 06:39 AM
-- Server version: 10.0.21-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selfcare_dietplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_weight_master`
--

CREATE TABLE IF NOT EXISTS `body_weight_master` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `height_in_feet` varchar(50) NOT NULL COMMENT '1 inch = 0.0100 feet',
  `height_in_cm` decimal(10,2) NOT NULL,
  `height_in_inches` decimal(10,2) NOT NULL,
  `height_in_meter` decimal(10,3) NOT NULL,
  `bw_small_frame` decimal(10,2) NOT NULL,
  `bw_small_frame_maxval` decimal(10,2) NOT NULL,
  `bw_medium_frame` decimal(10,2) NOT NULL,
  `bw_medium_frame_maxval` decimal(10,2) NOT NULL,
  `bw_large_frame` decimal(10,2) NOT NULL,
  `bw_large_frame_maxval` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `body_weight_master`
--

INSERT INTO `body_weight_master` (`id`, `gender`, `height_in_feet`, `height_in_cm`, `height_in_inches`, `height_in_meter`, `bw_small_frame`, `bw_small_frame_maxval`, `bw_medium_frame`, `bw_medium_frame_maxval`, `bw_large_frame`, `bw_large_frame_maxval`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'Female', '4'' 9"', '144.78', '57.00', '2.096', '44.00', '48.00', '47.00', '53.00', '53.00', '57.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:52:19', '1'),
(3, 'Female', '4'' 10"', '147.32', '58.00', '2.170', '45.90', '49.90', '49.00', '54.00', '53.10', '58.90', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:54:44', '1'),
(4, 'Female', '4'' 10.5"', '148.59', '58.50', '2.208', '46.10', '50.40', '49.50', '54.70', '53.60', '59.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:55:53', '1'),
(5, 'Female', '4'' 11"', '149.86', '59.00', '2.246', '46.30', '50.80', '49.90', '55.30', '54.00', '60.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:56:48', '1'),
(6, 'Female', '4'' 11.5"', '151.13', '59.50', '2.284', '46.50', '51.30', '50.30', '56.10', '54.40', '61.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:58:13', '1'),
(7, 'Female', '5''', '152.40', '60.00', '2.323', '46.80', '51.70', '50.80', '56.70', '54.90', '61.60', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 07:59:09', '1'),
(9, 'Female', '5'' 1"', '154.94', '61.00', '2.401', '47.70', '53.10', '51.70', '58.00', '56.20', '63.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:02:08', '1'),
(10, 'Female', '5'' 1.5"', '156.21', '61.50', '2.440', '48.10', '53.70', '52.40', '58.70', '56.90', '63.70', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:03:02', '1'),
(11, 'Female', '5'' 2"', '157.48', '62.00', '2.480', '48.60', '54.40', '53.10', '59.40', '57.60', '64.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:03:51', '1'),
(12, 'Female', '5'' 2.5"', '158.75', '62.50', '2.520', '49.20', '55.10', '53.70', '60.00', '58.30', '65.20', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:04:32', '1'),
(13, 'Female', '5'' 3"', '160.02', '63.00', '2.561', '49.90', '55.80', '54.40', '60.70', '58.90', '66.10', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:05:07', '1'),
(14, 'Female', '5'' 3.5"', '161.29', '63.50', '2.601', '51.10', '56.50', '55.10', '61.40', '60.10', '67.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:05:51', '1'),
(15, 'Female', '5'' 4''', '162.56', '64.00', '2.643', '51.30', '57.10', '55.80', '62.10', '60.30', '67.90', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:06:31', '1'),
(16, 'Female', '5'' 4.5"', '163.83', '64.50', '2.684', '52.00', '57.70', '56.50', '62.70', '61.00', '68.00', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:07:14', '1'),
(17, 'Female', '5'' 5"', '165.10', '65.00', '2.726', '52.60', '58.50', '57.10', '63.40', '61.60', '69.70', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:09:34', '1'),
(18, 'Female', '5'' 5.5"', '166.37', '65.50', '2.768', '53.20', '59.10', '57.80', '64.10', '62.30', '70.60', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:10:19', '1'),
(19, 'Female', '5'' 6"', '167.64', '66.00', '2.810', '54.00', '59.80', '58.50', '64.80', '63.00', '71.50', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:10:55', '1'),
(20, 'Female', '5'' 6.5"', '168.91', '66.50', '2.853', '54.60', '60.50', '59.10', '65.50', '63.60', '72.40', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:11:44', '1'),
(21, 'Female', '5'' 7"', '170.18', '67.00', '2.896', '55.30', '61.20', '59.80', '66.10', '64.30', '73.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:12:25', '1'),
(22, 'Female', '5'' 7.5"', '171.45', '67.50', '2.940', '56.00', '61.80', '61.00', '66.80', '65.00', '74.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:13:03', '1'),
(23, 'Female', '5'' 8"', '172.72', '68.00', '2.983', '56.70', '62.50', '61.20', '67.50', '65.70', '75.40', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:13:43', '1'),
(24, 'Female', '5'' 8.5"', '173.99', '68.50', '3.027', '57.60', '63.20', '61.80', '68.20', '66.60', '75.90', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:14:21', '1'),
(25, 'Female', '5'' 9"', '175.26', '69.00', '3.072', '58.05', '63.90', '62.50', '68.80', '67.05', '76.50', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:15:08', '1'),
(26, 'Female', '5'' 10"', '177.80', '70.00', '3.161', '59.40', '65.20', '63.90', '70.20', '68.40', '77.80', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:15:45', '1'),
(27, 'Female', '5'' 11"', '180.30', '70.98', '3.251', '60.70', '66.60', '65.20', '71.50', '69.70', '79.20', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:17:05', '1'),
(28, 'Female', '5''11.5"', '181.61', '71.50', '3.298', '66.90', '71.90', '70.50', '76.20', '73.70', '84.80', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:18:11', '1'),
(29, 'Female', '6''', '182.90', '72.00', '3.345', '67.60', '72.60', '71.20', '77.10', '74.40', '85.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:19:29', '1'),
(30, 'Female', '6''0.5"', '184.15', '72.50', '3.391', '68.10', '73.00', '71.90', '78.10', '75.50', '86.90', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:20:55', '1'),
(31, 'Female', '6''1"', '185.40', '73.00', '3.437', '68.90', '74.40', '72.60', '78.90', '76.20', '87.10', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:20:17', '1'),
(32, 'Female', '6''1.5"', '186.69', '73.50', '3.485', '70.10', '75.50', '73.70', '79.80', '77.10', '88.60', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:21:16', '1'),
(33, 'Female', '6''2"', '188.00', '74.00', '3.534', '70.30', '76.20', '74.40', '80.70', '78.00', '89.40', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:21:35', '1'),
(34, 'Female', '6''2.5"', '189.23', '74.50', '3.581', '71.00', '77.30', '75.00', '81.80', '78.90', '90.60', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:21:56', '1'),
(35, 'Female', '6''3"', '190.50', '75.00', '3.629', '71.70', '78.00', '75.70', '82.60', '79.80', '91.60', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:22:15', '1'),
(36, 'Female', '6''3.5"', '191.77', '75.50', '3.678', '72.60', '78.90', '76.80', '83.50', '81.40', '92.80', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:22:32', '1'),
(37, 'Female', '6''4"', '193.00', '76.00', '3.725', '73.50', '79.80', '77.60', '84.40', '82.10', '93.30', '', '2015-08-28 00:00:00', 'SelfCare', '2015-10-21 08:22:53', '1'),
(41, 'Male', '5'' 2"', '157.50', '62.00', '2.481', '58.10', '60.80', '59.40', '64.00', '62.60', '68.00', '', '2015-10-13 07:31:19', '1', '0000-00-00 00:00:00', ''),
(42, 'Male', '5'' 2.5"', '158.75', '62.50', '2.520', '58.50', '61.20', '59.90', '64.50', '63.00', '68.70', '', '2015-10-13 07:33:34', '1', '0000-00-00 00:00:00', ''),
(43, 'Male', '5'' 3.5"', '161.29', '63.50', '2.601', '59.50', '62.10', '60.70', '65.90', '63.90', '69.00', '', '2015-10-13 07:34:41', '1', '0000-00-00 00:00:00', ''),
(44, 'Male', '5'' 4''', '162.60', '64.00', '2.644', '59.90', '62.60', '61.20', '67.10', '64.40', '70.70', '', '2015-10-13 07:35:53', '1', '0000-00-00 00:00:00', ''),
(45, 'Male', '5'' 4.5"', '163.83', '64.50', '2.684', '60.30', '63.00', '61.70', '67.00', '64.80', '71.80', '', '2015-10-13 07:37:24', '1', '0000-00-00 00:00:00', ''),
(46, 'Male', '5'' 5"', '165.10', '65.00', '2.726', '60.80', '63.50', '62.10', '67.10', '65.30', '72.60', '', '2015-10-13 07:38:26', '1', '0000-00-00 00:00:00', ''),
(47, 'Male', '5'' 5.5"', '166.37', '65.50', '2.768', '61.20', '64.00', '62.50', '67.80', '65.70', '73.50', '', '2015-10-13 07:39:24', '1', '0000-00-00 00:00:00', ''),
(48, 'Male', '5'' 6"', '167.60', '66.00', '2.809', '61.70', '64.40', '63.00', '68.50', '66.20', '74.40', '', '2015-10-13 07:40:22', '1', '0000-00-00 00:00:00', ''),
(49, 'Male', '5'' 6.5"', '168.91', '66.50', '2.853', '62.20', '65.10', '63.70', '69.10', '66.90', '75.50', '', '2015-10-13 07:41:16', '1', '0000-00-00 00:00:00', ''),
(50, 'Male', '5'' 7"', '170.20', '67.00', '2.897', '62.60', '65.80', '64.40', '69.80', '67.60', '76.20', '', '2015-10-13 07:42:26', '1', '0000-00-00 00:00:00', ''),
(51, 'Male', '5'' 7.5"', '171.45', '67.50', '2.940', '63.00', '66.50', '65.10', '70.80', '68.20', '77.10', '', '2015-10-13 07:43:24', '1', '0000-00-00 00:00:00', ''),
(52, 'Male', '5'' 8"', '172.70', '68.00', '2.983', '63.50', '67.10', '65.80', '71.20', '68.90', '78.00', '', '2015-10-13 07:44:17', '1', '0000-00-00 00:00:00', ''),
(53, 'Male', '5'' 8.5"', '173.99', '68.50', '3.027', '64.00', '67.80', '66.50', '71.90', '70.10', '78.90', '', '2015-10-13 07:45:08', '1', '0000-00-00 00:00:00', ''),
(54, 'Male', '5'' 9"', '175.30', '69.00', '3.073', '64.40', '68.50', '67.10', '72.60', '70.30', '79.80', '', '2015-10-13 07:48:18', '1', '0000-00-00 00:00:00', ''),
(55, 'Male', '5''9.5"', '176.53', '69.50', '3.116', '64.80', '69.10', '67.90', '73.10', '71.00', '80.70', '', '2015-10-13 07:49:18', '1', '0000-00-00 00:00:00', ''),
(56, 'Male', '5''10"', '177.80', '70.00', '3.161', '65.30', '69.80', '68.50', '73.90', '71.70', '81.60', '', '2015-10-13 07:50:13', '1', '0000-00-00 00:00:00', ''),
(57, 'Male', '5''10.5"', '179.07', '70.50', '3.207', '65.80', '70.50', '69.10', '74.60', '72.30', '82.70', '', '2015-10-13 07:51:10', '1', '0000-00-00 00:00:00', ''),
(58, 'Male', '5''11"', '180.30', '71.00', '3.251', '66.20', '71.20', '69.80', '75.30', '73.00', '83.50', '', '2015-10-13 07:52:06', '1', '0000-00-00 00:00:00', ''),
(59, 'Male', '5''11.5"', '181.61', '71.50', '3.298', '66.90', '71.90', '70.50', '76.20', '73.70', '84.80', '', '2015-10-13 07:53:01', '1', '0000-00-00 00:00:00', ''),
(60, 'Male', '6''', '182.90', '72.00', '3.345', '67.60', '72.60', '71.20', '77.10', '74.40', '85.30', '', '2015-10-13 07:53:52', '1', '0000-00-00 00:00:00', ''),
(61, 'Male', '6''0.5"', '184.15', '72.50', '3.391', '68.10', '73.00', '71.90', '78.10', '75.50', '86.90', '', '2015-10-13 07:54:47', '1', '0000-00-00 00:00:00', ''),
(62, 'Male', '6''1"', '185.40', '73.00', '3.437', '68.90', '74.40', '72.60', '78.90', '76.20', '87.10', '', '2015-10-13 07:55:37', '1', '0000-00-00 00:00:00', ''),
(63, 'Male', '6''1.5"', '186.69', '73.50', '3.485', '70.10', '75.50', '73.70', '79.80', '77.10', '88.60', '', '2015-10-13 07:56:28', '1', '0000-00-00 00:00:00', ''),
(64, 'Male', '6''2"', '188.00', '74.00', '3.534', '70.30', '76.20', '74.40', '80.70', '78.00', '89.40', '', '2015-10-13 07:57:20', '1', '0000-00-00 00:00:00', ''),
(65, 'Male', '6''2.5"', '189.23', '74.50', '3.581', '71.00', '77.30', '75.00', '81.80', '78.90', '90.60', '', '2015-10-13 07:58:13', '1', '0000-00-00 00:00:00', ''),
(66, 'Male', '6''3"', '190.50', '75.00', '3.629', '71.70', '78.00', '75.70', '82.60', '79.80', '91.60', '', '2015-10-13 07:59:06', '1', '0000-00-00 00:00:00', ''),
(67, 'Male', '6''3.5"', '191.77', '75.50', '3.678', '72.60', '78.90', '76.80', '83.50', '81.40', '92.80', '', '2015-10-13 07:59:57', '1', '0000-00-00 00:00:00', ''),
(68, 'Male', '6''4"', '193.00', '76.00', '3.725', '73.50', '79.80', '77.60', '84.40', '82.10', '93.90', '', '2015-10-13 08:00:54', '1', '0000-00-00 00:00:00', ''),
(69, 'Female', '4'' 9.5"', '146.05', '57.50', '2.133', '45.00', '49.00', '48.00', '53.50', '53.00', '58.00', '', '2015-10-21 07:53:48', '1', '0000-00-00 00:00:00', ''),
(70, 'Female', '5'' 0.5"', '153.67', '60.50', '2.361', '47.30', '52.40', '51.20', '57.20', '55.50', '62.30', '', '2015-10-21 08:01:20', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f7f2d2bd683c3658894a3b32060ff47f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', 1441952315, '');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_exercise`
--

CREATE TABLE IF NOT EXISTS `diet_plan_exercise` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `consult_date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_Date` datetime NOT NULL,
  `exercise_id` varchar(255) DEFAULT NULL,
  `total_cd` decimal(10,2) NOT NULL,
  `ex_def` decimal(10,2) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `cal_loss` decimal(10,2) NOT NULL,
  `weight_loss` decimal(10,2) NOT NULL,
  `program` decimal(10,2) NOT NULL,
  `weeks` decimal(10,2) NOT NULL,
  `exercise_det` text NOT NULL,
  `exercise_anytime` text NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_plan_exercise`
--

INSERT INTO `diet_plan_exercise` (`id`, `plan_id`, `consult_date`, `start_date`, `end_Date`, `exercise_id`, `total_cd`, `ex_def`, `no_of_days`, `cal_loss`, `weight_loss`, `program`, `weeks`, `exercise_det`, `exercise_anytime`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 1, '2015-11-02 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '683.50', '251.00', 6, '5607.00', '728.18', '5000.00', '6.87', '{"1":{"items":[{"exercise_name":"Normal walk","duration":"60","ex_def":"251"}]},"2":{"items":[{"exercise_name":"","duration":"","ex_def":""}]},"3":{"items":[{"exercise_name":"","duration":"","ex_def":""}]},"4":{"items":[{"exercise_name":"","duration":"","ex_def":""}]}}', '[{"exercise_name":"","repetition":""}]', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_food_details`
--

CREATE TABLE IF NOT EXISTS `diet_plan_food_details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_desc` varchar(50) NOT NULL,
  `servings` decimal(10,2) NOT NULL,
  `servings_prot` decimal(10,2) NOT NULL,
  `servings_fat` decimal(10,2) NOT NULL,
  `servings_chol` decimal(10,2) NOT NULL,
  `servings_calo` decimal(10,2) NOT NULL,
  `servings_calc` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_plan_food_details`
--

INSERT INTO `diet_plan_food_details` (`id`, `client_id`, `plan_id`, `plan_date`, `start_date`, `end_date`, `food_id`, `food_desc`, `servings`, `servings_prot`, `servings_fat`, `servings_chol`, `servings_calo`, `servings_calc`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(15, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, '', '6.00', '15.00', '3.00', '108.00', '510.00', '30.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(16, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 15, '', '2.00', '6.00', '0.00', '0.00', '30.00', '8.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(17, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, '', '1.50', '0.00', '16.50', '0.00', '150.00', '0.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(18, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 26, '', '3.00', '18.00', '1.50', '43.50', '255.00', '54.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(19, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 28, '', '3.50', '10.80', '0.40', '15.40', '115.50', '420.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(20, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 32, '', '2.00', '0.00', '0.00', '10.00', '40.00', '0.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1'),
(21, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 35, '', '8.00', '8.00', '0.00', '36.00', '200.00', '280.00', 'T', '0000-00-00 00:00:00', '', '2015-11-02 11:28:19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_guidelines`
--

CREATE TABLE IF NOT EXISTS `diet_plan_guidelines` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `recommend_id` int(11) NOT NULL,
  `recommend_text` text NOT NULL,
  `plan_id` int(11) NOT NULL,
  `checked` int(1) NOT NULL DEFAULT '1',
  `recommend_text_ext` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan_guidelines`
--

INSERT INTO `diet_plan_guidelines` (`id`, `client_id`, `disease_id`, `recommend_id`, `recommend_text`, `plan_id`, `checked`, `recommend_text_ext`) VALUES
(8, 1, 6, 27, '', 1, 1, ''),
(9, 1, 6, 28, '', 1, 0, ''),
(10, 1, 6, 29, '', 1, 1, ''),
(11, 1, 26, 20, 'It is preferable to boil the tetra packed milk and then use it.', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_intake_calories`
--

CREATE TABLE IF NOT EXISTS `diet_plan_intake_calories` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `carb_ex` varchar(255) NOT NULL,
  `ptn_ex` varchar(255) NOT NULL,
  `veg_ex` varchar(255) NOT NULL,
  `fat_ex` varchar(255) NOT NULL,
  `smp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_intake_chart`
--

CREATE TABLE IF NOT EXISTS `diet_plan_intake_chart` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `sdesc` varchar(50) NOT NULL,
  `breakfast_protein` decimal(10,2) NOT NULL,
  `lunch_protein` decimal(10,2) NOT NULL,
  `snack_protein` decimal(10,2) NOT NULL,
  `dinner_protein` decimal(10,2) NOT NULL,
  `breakfast_cal` decimal(10,2) NOT NULL,
  `lunch_cal` decimal(10,2) NOT NULL,
  `snack_cal` decimal(10,2) NOT NULL,
  `dinner_cal` decimal(10,2) NOT NULL,
  `calories` text NOT NULL,
  `prots` text NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_plan_intake_chart`
--

INSERT INTO `diet_plan_intake_chart` (`id`, `client_id`, `plan_id`, `sdesc`, `breakfast_protein`, `lunch_protein`, `snack_protein`, `dinner_protein`, `breakfast_cal`, `lunch_cal`, `snack_cal`, `dinner_cal`, `calories`, `prots`, `status`) VALUES
(1, 1, 1, '', '9.95', '21.40', '5.30', '21.40', '243.50', '454.50', '144.00', '454.50', '[{"0":"object:476","id":"1","name":"Carb Ex","mult":"85","bf":"1.5","bf_val":"127.5","lunch":"1.5","lunch_val":"127.5","snack":"1.5","snack_val":"127.5","dinner":"1.5","dinner_val":"127.5"},{"0":"object:477","id":"2","name":"PTN Ex","mult":"85","bf":"0","bf_val":"0","lunch":"1.5","lunch_val":"127.5","snack":"0","snack_val":"0","dinner":"1.5","dinner_val":"127.5"},{"0":"object:478","id":"3","name":"Veg Ex","mult":"25","bf":"0","bf_val":"0","lunch":"4","lunch_val":"100","snack":"0","snack_val":"0","dinner":"4","dinner_val":"100"},{"0":"object:479","id":"4","name":"FAT Ex","mult":"50","bf":"1","bf_val":"50","lunch":"1","lunch_val":"50","snack":"0","snack_val":"0","dinner":"1","dinner_val":"50"},{"0":"object:480","id":"5","name":"SMP","mult":"33","bf":"2","bf_val":"66","lunch":"1.5","lunch_val":"49.5","snack":"0.5","snack_val":"16.5","dinner":"1.5","dinner_val":"49.5"}]', '[{"0":"object:486","id":"1","value":"Carb Ex","mult":"2.5","bf":"0","bf_val":"3.75","lunch":"0","lunch_val":"3.75","snack":"0","snack_val":"3.75","dinner":"0","dinner_val":"3.75"},{"0":"object:487","id":"2","value":"PTN Ex","mult":"6","bf":"0","bf_val":"0","lunch":"0","lunch_val":"9","snack":"0","snack_val":"0","dinner":"0","dinner_val":"9"},{"0":"object:488","id":"3","value":"Veg Ex","mult":"1","bf":"0","bf_val":"0","lunch":"0","lunch_val":"4","snack":"0","snack_val":"0","dinner":"0","dinner_val":"4"},{"0":"object:489","id":"4","value":"FAT Ex","mult":"","bf":"0","bf_val":"0","lunch":"0","lunch_val":"0","snack":"0","snack_val":"0","dinner":"0","dinner_val":"0"},{"0":"object:490","id":"5","value":"SMP","mult":"3.1","bf":"0","bf_val":"6.2","lunch":"0","lunch_val":"4.65","snack":"0","snack_val":"1.55","dinner":"0","dinner_val":"4.65"}]', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_main`
--

CREATE TABLE IF NOT EXISTS `diet_plan_main` (
  `id` int(11) NOT NULL,
  `client_id` varchar(25) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birth_date` datetime NOT NULL,
  `age` int(11) NOT NULL,
  `food_pref_id` int(11) NOT NULL,
  `file_no` varchar(50) NOT NULL,
  `preg_lact` varchar(50) NOT NULL,
  `programe_type` int(1) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_plan_main`
--

INSERT INTO `diet_plan_main` (`id`, `client_id`, `first_name`, `last_name`, `email`, `gender`, `city`, `birth_date`, `age`, `food_pref_id`, `file_no`, `preg_lact`, `programe_type`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, '', 'Siddhant Seth', '', 'kohin.bellara@rediffmail.com', 'Male', '', '1993-07-21 00:00:00', 22, 2, '11730', '', 2, 'T', '2015-11-02 11:21:34', '1', '2015-11-02 11:28:19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_meals`
--

CREATE TABLE IF NOT EXISTS `diet_plan_meals` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `meal_name` varchar(150) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan_meals`
--

INSERT INTO `diet_plan_meals` (`id`, `client_id`, `plan_id`, `meal`, `meal_name`, `start_time`, `end_time`, `notes`) VALUES
(11, 1, 1, 2, 'Break Fast', '09:00:00', '09:30:00', ''),
(12, 1, 1, 4, 'Lunch', '13:00:00', '13:30:00', ''),
(13, 1, 1, 6, 'Snack', '17:00:00', '17:30:00', ''),
(14, 1, 1, 8, 'Dinner', '21:00:00', '21:30:00', ''),
(15, 1, 1, 9, 'After Dinner', '23:00:00', '23:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_meal_options`
--

CREATE TABLE IF NOT EXISTS `diet_plan_meal_options` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan_meal_options`
--

INSERT INTO `diet_plan_meal_options` (`id`, `meal_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_meal_option_items`
--

CREATE TABLE IF NOT EXISTS `diet_plan_meal_option_items` (
  `id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `food_item_id` int(11) NOT NULL,
  `food_item` varchar(255) NOT NULL,
  `uom` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_plan_meal_option_items`
--

INSERT INTO `diet_plan_meal_option_items` (`id`, `option_id`, `food_item_id`, `food_item`, `uom`, `amount`) VALUES
(1, 1, 1, 'White bread', '', '1.5'),
(2, 1, 13, 'Egg Whites', '', '2'),
(3, 1, 52, 'Cooking Oil', '', '1'),
(4, 2, 3, 'Rice, cooked', '', '1.5'),
(5, 2, 83, 'Dal (average)', '', '1.5'),
(6, 2, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(7, 2, 32, 'Light Vegetables', '', '4'),
(8, 2, 52, 'Cooking Oil', '', '1'),
(9, 3, 94, 'Marie biscuits', '', '1.5'),
(10, 3, 84, 'Tea With Milk', '', '0.5'),
(11, 4, 3, 'Rice, cooked', '', '1.5'),
(12, 4, 83, 'Dal (average)', '', '1.5'),
(13, 4, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(14, 4, 32, 'Light Vegetables', '', '1'),
(15, 4, 52, 'Cooking Oil', '', '1'),
(16, 5, 44, 'Fruit', '', '1'),
(17, 6, 1, 'White bread', '', '1.5'),
(18, 6, 13, 'Egg Whites', '', '2'),
(19, 6, 52, 'Cooking Oil', '', '1'),
(20, 7, 3, 'Rice, cooked', '', '1.5'),
(21, 7, 83, 'Dal (average)', '', '1.5'),
(22, 7, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(23, 7, 32, 'Light Vegetables', '', '4'),
(24, 7, 52, 'Cooking Oil', '', '1'),
(25, 8, 94, 'Marie biscuits', '', '1.5'),
(26, 8, 84, 'Tea With Milk', '', '0.5'),
(27, 9, 3, 'Rice, cooked', '', '1.5'),
(28, 9, 83, 'Dal (average)', '', '1.5'),
(29, 9, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(30, 9, 32, 'Light Vegetables', '', '1'),
(31, 9, 52, 'Cooking Oil', '', '1'),
(32, 10, 44, 'Fruit', '', '1'),
(33, 11, 1, 'White bread', '', '1.5'),
(34, 11, 13, 'Egg Whites', '', '2'),
(35, 11, 52, 'Cooking Oil', '', '1'),
(36, 12, 3, 'Rice, cooked', '', '1.5'),
(37, 12, 83, 'Dal (average)', '', '1.5'),
(38, 12, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(39, 12, 32, 'Light Vegetables', '', '4'),
(40, 12, 52, 'Cooking Oil', '', '1'),
(41, 13, 94, 'Marie biscuits', '', '1.5'),
(42, 13, 84, 'Tea With Milk', '', '0.5'),
(43, 14, 3, 'Rice, cooked', '', '1.5'),
(44, 14, 83, 'Dal (average)', '', '1.5'),
(45, 14, 114, 'Curd (from 0 % fat milk)', '', '1.5'),
(46, 14, 32, 'Light Vegetables', '', '4'),
(47, 14, 52, 'Cooking Oil', '', '1'),
(48, 15, 44, 'Fruit', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_profile`
--

CREATE TABLE IF NOT EXISTS `diet_plan_profile` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `consultation_date` datetime NOT NULL,
  `target_date` datetime NOT NULL,
  `height_in_cm` decimal(10,2) NOT NULL,
  `weight_in_kg` decimal(10,2) NOT NULL,
  `target_weight_in_kg` decimal(10,2) NOT NULL,
  `bfc_in_percentage` decimal(10,2) NOT NULL,
  `wrist_in_inch` decimal(10,2) NOT NULL,
  `wrist_in_cm` decimal(10,2) NOT NULL,
  `rfactor` decimal(10,2) NOT NULL,
  `body_fat` varchar(25) NOT NULL,
  `ibw` varchar(50) NOT NULL,
  `ibw_mean` decimal(10,2) NOT NULL,
  `icc` decimal(10,2) NOT NULL,
  `icc_adjusted` decimal(10,2) NOT NULL,
  `bmi` decimal(10,2) NOT NULL,
  `excess_weight` decimal(10,2) NOT NULL,
  `rec_protien` decimal(10,2) NOT NULL,
  `rec_fat` decimal(10,2) NOT NULL,
  `rec_carbs` decimal(10,2) NOT NULL,
  `rec_calcium` decimal(10,2) NOT NULL,
  `preg_lact_energy` int(5) NOT NULL,
  `preg_lact_protein` int(5) NOT NULL,
  `started_fat` decimal(10,2) NOT NULL,
  `target_fat` decimal(10,2) NOT NULL,
  `fat_ideal_range` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diet_plan_profile`
--

INSERT INTO `diet_plan_profile` (`id`, `client_id`, `consultation_date`, `target_date`, `height_in_cm`, `weight_in_kg`, `target_weight_in_kg`, `bfc_in_percentage`, `wrist_in_inch`, `wrist_in_cm`, `rfactor`, `body_fat`, `ibw`, `ibw_mean`, `icc`, `icc_adjusted`, `bmi`, `excess_weight`, `rec_protien`, `rec_fat`, `rec_carbs`, `rec_calcium`, `preg_lact_energy`, `preg_lact_protein`, `started_fat`, `target_fat`, `fat_ideal_range`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 1, '2015-11-02 00:00:00', '2016-01-02 00:00:00', '171.00', '73.50', '68.50', '0.00', '6.00', '15.24', '11.22', 'S-M', '63.00 - 66.50', '64.00', '1984.00', '1984.00', '25.14', '9.50', '57.60', '28.66', '248.00', '0.00', 0, 0, '22.80', '20.30', '8 - 20', 'T', '2015-11-02 11:21:34', '1', '2015-11-02 11:28:19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `name`) VALUES
(1, 'Diabetes'),
(2, 'Insulin Resistance'),
(3, 'Blood pressure'),
(4, 'High Cholesterol'),
(5, 'Acidity'),
(6, 'Gas'),
(7, 'Constipation'),
(8, 'Hiatus Hernia'),
(9, 'Irritable bowel Syndrome'),
(10, 'Kidney Stones'),
(11, 'High Uric Acid'),
(12, 'Migraine'),
(13, 'Asthma'),
(14, 'Cancer'),
(15, 'Thalesemia Minor'),
(16, 'Anemia'),
(17, 'Thyroid'),
(18, 'Healthy Hair'),
(19, 'Gall stones'),
(20, 'Ulcerative Colitis'),
(21, 'Pregnancy'),
(22, 'Lactation'),
(23, 'Arthitis'),
(24, 'Osteo Arthitis'),
(25, 'Osteoporosis'),
(26, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `disease_recommendation`
--

CREATE TABLE IF NOT EXISTS `disease_recommendation` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `recommendation` varchar(250) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease_recommendation`
--

INSERT INTO `disease_recommendation` (`id`, `disease_id`, `recommendation`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(1, 1, 'If you feel low sugar then have some sugar immediately and do visit your doctor as it may require revision Diabetes medication.', '1', '2015-09-29 07:41:29', '1', '2015-09-30 13:42:42'),
(3, 2, 'Maximum consumption of sugar, honey, jaggery should be 2 tsps a day.', '1', '2015-09-10 17:23:00', '1', '2015-09-29 07:44:07'),
(4, 1, 'You should try to avoid taking Rice products like rice flakes, bhel, south Indian preparation and cooked rice.', '1', '2015-09-29 07:43:14', '', '0000-00-00 00:00:00'),
(5, 1, 'Avoid consuming the given fruit on an empty stomach. Opt for it in-between meals.', '1', '2015-09-29 07:43:25', '', '0000-00-00 00:00:00'),
(6, 1, 'Avoid alcohol.', '1', '2015-09-29 07:43:35', '', '0000-00-00 00:00:00'),
(7, 1, 'Avoid sugar, honey, jaggery completely. If needed, use stevia as a sugar substitute.', '1', '2015-09-29 07:43:44', '', '0000-00-00 00:00:00'),
(8, 1, 'Preferred fruits are apple, pear and guava. Avoid fruit juices completely.', '1', '2015-09-29 07:43:53', '', '0000-00-00 00:00:00'),
(9, 2, 'Avoid fruit juices.', '1', '2015-09-29 07:44:17', '', '0000-00-00 00:00:00'),
(10, 2, 'Having a low carbohydrate diet is very important.', '1', '2015-09-29 07:44:27', '', '0000-00-00 00:00:00'),
(11, 3, 'Avoid corn and corn products like popcorn.', '1', '2015-09-29 07:44:37', '', '0000-00-00 00:00:00'),
(12, 3, 'Avoid table salt, chutney, pickle, papad and canned food.', '1', '2015-09-29 07:44:49', '', '0000-00-00 00:00:00'),
(13, 3, 'Avoid muskmelon and litchi.', '1', '2015-09-29 07:44:59', '', '0000-00-00 00:00:00'),
(14, 3, 'Avoid Chinese food not only as it is rich in MSG but it contains Soya sauce that has high sodium content.', '1', '2015-09-29 07:45:08', '', '0000-00-00 00:00:00'),
(15, 3, 'If you feel dizzy or low B.P. then have some salt and sugar water immediately and do visit your doctor as it may require revision in your B.P. medication.', '1', '2015-09-29 07:45:19', '', '0000-00-00 00:00:00'),
(16, 4, 'Add oatbran OR fibro essential (fiber) to the flour in the ratio of 1kg of wheat flour to 200gms of fiber.', '1', '2015-09-29 07:45:32', '', '0000-00-00 00:00:00'),
(17, 5, 'Have 1 glass of warm water with 5-6 drops of lime and 1 tsp honey on an empty stomach.', '1', '2015-09-29 07:45:45', '', '0000-00-00 00:00:00'),
(18, 5, 'Avoid plums and prunes.', '1', '2015-09-29 07:45:54', '', '0000-00-00 00:00:00'),
(19, 26, 'Your total milk product allowance in a day is 450 ml. Milk as milk, or in and in curd should be 450 ml skimmed milk.', '1', '2015-10-06 10:09:08', '1', '2015-10-06 10:09:35'),
(20, 26, 'It is preferable to boil the tetra packed milk and then use it.', '1', '2015-10-06 10:09:25', '1', '2015-10-06 10:09:43'),
(21, 26, 'You have been given 2 tsp. of sugar in a day.', '1', '2015-10-06 10:10:04', '', '0000-00-00 00:00:00'),
(22, 26, 'We prepare you diets in such a way that there should not be any weakness or dizziness. However if you ever feel so, contact us immediately.', '1', '2015-10-06 10:10:16', '', '0000-00-00 00:00:00'),
(23, 26, 'All the 21 meals (breakfast/lunch/dinner) in a week must contain the recommended proteins: milk, curd/yogurt, dals, sprouts, bean-based foods, chicken, fish or egg whites. Do not miss a single protein exchange.', '1', '2015-10-06 10:10:34', '', '0000-00-00 00:00:00'),
(24, 26, 'All curds should be freshly set and can be had in form of buttermilk or raita.', '1', '2015-10-06 10:10:51', '', '0000-00-00 00:00:00'),
(25, 26, 'You MUST consume minimum 3 tspn of oil in a day or as recommended', '1', '2015-10-06 10:11:05', '', '0000-00-00 00:00:00'),
(26, 26, 'The weight loss program will expires after 8-10 weeks or on the Target date given to you or as you arrive your target weight, which ever come first. Then you have two options i.e. enroll for further weight loss or take a maintenance diet.', '1', '2015-10-06 10:11:18', '1', '2015-10-06 10:11:36'),
(27, 6, 'Avoid all raw foods, especially salad.', '1', '2015-10-14 07:38:34', '', '0000-00-00 00:00:00'),
(28, 6, 'Avoid chana, chole, rajmah, udad dal and chana dal. Preferably use moong dal.', '1', '2015-10-14 07:38:56', '1', '2015-10-14 07:39:07'),
(29, 6, 'Avoid muskmelon and watermelon.', '1', '2015-10-14 07:39:24', '', '0000-00-00 00:00:00'),
(30, 7, 'Avoid coffee.', '1', '2015-10-14 07:39:44', '', '0000-00-00 00:00:00'),
(31, 7, 'Drink 6-8 glasses of water daily.', '1', '2015-10-14 07:40:01', '', '0000-00-00 00:00:00'),
(32, 7, 'Add methi leaves, ladies finger, guava and soaked figs in your diet to avoid constipation.', '1', '2015-10-14 07:40:16', '', '0000-00-00 00:00:00'),
(33, 8, 'Avoid intake of fluids with meals.', '1', '2015-10-14 07:40:31', '', '0000-00-00 00:00:00'),
(34, 8, 'Avoid alcohol consumption and cigarette smoking.', '1', '2015-10-14 07:40:48', '', '0000-00-00 00:00:00'),
(35, 8, 'Do not lie down, bend over or strain soon after eating.', '1', '2015-10-14 07:41:04', '', '0000-00-00 00:00:00'),
(36, 8, 'Eat smaller meals at regular intervals instead of large meals at one time', '1', '2015-10-14 07:41:18', '', '0000-00-00 00:00:00'),
(37, 9, 'Avoid caffeine filled beverages like tea, coffee, colas.', '1', '2015-10-14 07:41:39', '', '0000-00-00 00:00:00'),
(38, 9, 'Avoid consumption of milk, instead have yogurt.', '1', '2015-10-14 07:41:51', '', '0000-00-00 00:00:00'),
(39, 9, 'Eat smaller meals at regular intervals instead of large meals at one time.', '1', '2015-10-14 07:42:06', '', '0000-00-00 00:00:00'),
(40, 10, 'Avoid table salt, chutney, pickles, papad.', '1', '2015-10-14 07:42:25', '', '0000-00-00 00:00:00'),
(41, 10, 'Eat less meat, fish, and poultry.', '1', '2015-10-14 07:42:40', '', '0000-00-00 00:00:00'),
(42, 10, 'Limit your tea, coffee, cola to 1-2 cups a day.', '1', '2015-10-14 07:42:55', '', '0000-00-00 00:00:00'),
(43, 10, 'Drink plenty of water.', '1', '2015-10-14 07:43:08', '', '0000-00-00 00:00:00'),
(44, 11, 'Restrict alcohol consumption.', '1', '2015-10-14 07:43:31', '', '0000-00-00 00:00:00'),
(45, 11, 'Restrict pulse protein consumption.', '1', '2015-10-14 07:43:52', '', '0000-00-00 00:00:00'),
(46, 11, 'Avoid red meat, shell fish and fish like mackerel, herring, anchovies.', '1', '2015-10-14 07:44:07', '', '0000-00-00 00:00:00'),
(47, 11, 'Drink plenty of water.', '1', '2015-10-14 07:44:27', '', '0000-00-00 00:00:00'),
(48, 11, 'Add low fat dairy products.', '1', '2015-10-14 07:44:39', '', '0000-00-00 00:00:00'),
(49, 12, 'Have 1 glass of warm water with 5-6 drops of lime and 1 tsp honey on an empty stomach.', '1', '2015-10-14 07:45:00', '', '0000-00-00 00:00:00'),
(50, 12, 'Do not skip or delay a meal', '1', '2015-10-14 07:45:15', '', '0000-00-00 00:00:00'),
(51, 12, 'Avoid nuts, chocolate, coffee, red wine and Chinese food (as it contains MSG)', '1', '2015-10-14 07:45:31', '', '0000-00-00 00:00:00'),
(52, 12, 'Keep yourself well hydrated.', '1', '2015-10-14 07:45:45', '', '0000-00-00 00:00:00'),
(53, 13, 'Avoid nuts, chana dal and sea food.', '1', '2015-10-14 07:46:02', '', '0000-00-00 00:00:00'),
(54, 13, 'Eat dinner 3 hours before going to bed.', '1', '2015-10-14 07:46:17', '', '0000-00-00 00:00:00'),
(55, 13, 'Eat 3-4 dried figs soaked overnight in warm water and have it first thing in the morning.', '1', '2015-10-14 07:46:32', '', '0000-00-00 00:00:00'),
(56, 13, 'Avoid having curd at night.', '1', '2015-10-14 07:46:44', '', '0000-00-00 00:00:00'),
(57, 14, 'Avoid sugar and fatty foods.', '1', '2015-10-14 07:47:03', '', '0000-00-00 00:00:00'),
(58, 14, 'Avoid raw foods.', '1', '2015-10-14 07:47:16', '', '0000-00-00 00:00:00'),
(59, 14, 'Drink plenty of fluids.', '1', '2015-10-14 07:47:30', '', '0000-00-00 00:00:00'),
(60, 14, 'Incorporate iron rich foods like dates, black currant, moth beans, soya bean and Bengal gram during chemo therapy and radiation.', '1', '2015-10-14 07:47:47', '', '0000-00-00 00:00:00'),
(61, 14, 'Include foods that are high in protein such as low fat dairy, lean meat, egg whites and nuts.', '1', '2015-10-14 07:48:02', '', '0000-00-00 00:00:00'),
(62, 15, 'Include folvite supplement.', '1', '2015-10-14 07:48:18', '', '0000-00-00 00:00:00'),
(63, 15, 'Have 2-3 dates daily.', '1', '2015-10-14 07:48:32', '', '0000-00-00 00:00:00'),
(64, 16, 'Include iron supplement.', '1', '2015-10-14 07:48:45', '', '0000-00-00 00:00:00'),
(65, 16, 'Have 2-3 dates daily.', '1', '2015-10-14 07:49:00', '', '0000-00-00 00:00:00'),
(66, 17, 'Avoid bajra, masoor dal, peanuts, soya and soya products.', '1', '2015-10-14 07:49:15', '', '0000-00-00 00:00:00'),
(67, 17, 'Have mineral water as it helps in reducing TSH levels.', '1', '2015-10-14 07:49:30', '', '0000-00-00 00:00:00'),
(68, 18, 'Include a supplement.', '1', '2015-10-14 07:49:47', '', '0000-00-00 00:00:00'),
(69, 18, 'Do not miss on your protein exchanges.', '1', '2015-10-14 07:50:02', '', '0000-00-00 00:00:00'),
(70, 19, 'Drink 6-8 glasses of water in a day.', '1', '2015-10-14 07:50:17', '', '0000-00-00 00:00:00'),
(71, 19, 'Avoid too much fat and refined sugar.', '1', '2015-10-14 07:50:30', '', '0000-00-00 00:00:00'),
(72, 20, 'Avoid milk as milk. Consume it in the form of curd or paneer.', '1', '2015-10-14 07:50:50', '', '0000-00-00 00:00:00'),
(73, 20, 'Avoid caffeine.', '1', '2015-10-14 07:51:05', '', '0000-00-00 00:00:00'),
(74, 20, 'Eat smaller meals at regular intervals.', '1', '2015-10-14 07:51:18', '', '0000-00-00 00:00:00'),
(75, 20, 'Definitely have stewed apple OR fruit juices.', '1', '2015-10-14 07:51:32', '', '0000-00-00 00:00:00'),
(76, 21, 'Have frequent and small meals', '1', '2015-10-14 07:51:54', '', '0000-00-00 00:00:00'),
(77, 21, 'Do not ever go hungry.', '1', '2015-10-14 07:52:14', '', '0000-00-00 00:00:00'),
(78, 21, 'Do not overeat at one meal.', '1', '2015-10-14 07:52:29', '', '0000-00-00 00:00:00'),
(79, 21, 'Take adequate intake of fluid and fiber to avoid constipation.', '1', '2015-10-14 07:52:44', '', '0000-00-00 00:00:00'),
(80, 21, 'Must have 8 to 10 glasses of water.', '1', '2015-10-14 07:52:56', '', '0000-00-00 00:00:00'),
(81, 21, 'Do not ever strain yourself or get fatigued.', '1', '2015-10-14 07:53:09', '', '0000-00-00 00:00:00'),
(82, 21, 'Have plenty of fresh fruits and freshly cut salad to avoid constipation.', '1', '2015-10-14 07:53:22', '', '0000-00-00 00:00:00'),
(83, 22, 'You should never skip your milk and pulse options to suffice you of protein and calcium.', '1', '2015-10-14 07:53:41', '', '0000-00-00 00:00:00'),
(84, 22, 'Make sure you have included at least three vitamin ‘c’ rich raw food in your diet e.g. orange, sweet lime, strawberry, guava, pineapple, papaya, kiwi, tomato, cabbage, capsicum, sprouted moong etc.', '1', '2015-10-14 07:53:57', '', '0000-00-00 00:00:00'),
(85, 22, 'Must include two dark green leafy vegetable or orange vegetable or fruit in your daily diet to suffice your Vitamin ‘A’ needs. Papaya and mango are good choices in fruits. Carrot and pumpkin are good in vegetable choices.', '1', '2015-10-14 07:54:15', '', '0000-00-00 00:00:00'),
(86, 22, 'Greens of cauliflower, radish, fenugreek, amaranth (chawli) are very good because besides Vitamin ‘A’ some of them are also rich in calcium and other minerals.', '1', '2015-10-14 07:54:29', '', '0000-00-00 00:00:00'),
(87, 22, 'Avoid fried food as far as possible, and try including the foods that are easily digestible.', '1', '2015-10-14 07:54:44', '', '0000-00-00 00:00:00'),
(88, 22, 'You should take fluids liberally in between meals that are nutritious as well.', '1', '2015-10-14 07:54:58', '', '0000-00-00 00:00:00'),
(89, 22, 'Do not skip salad from your meals to avoid constipation.', '1', '2015-10-14 07:55:09', '', '0000-00-00 00:00:00'),
(90, 22, 'While feeding take care to sit in correct posture and support your back to avoid backaches.', '1', '2015-10-14 07:55:22', '', '0000-00-00 00:00:00'),
(91, 22, 'When you are feeding try to keep a relaxed mental state, as it troubled and tensed mental state inhibits the proper flow of the milk.', '1', '2015-10-14 07:55:42', '', '0000-00-00 00:00:00'),
(92, 22, 'There are certain foods that have been proved to be galactogogues (foods that improves secretion of milk). They are as follows: -\n-Garlic \n-Methi\n-Satavari (commercial ayurvedic preparations available in the market as     Sataverex, Satavari Kalpa, S', '1', '2015-10-14 07:56:20', '', '0000-00-00 00:00:00'),
(93, 23, 'Cook vegetables and dal in vegetable oil which is rich in PUFA such as peanut oil, rice bran oil and sunflower oil.', '1', '2015-10-14 07:57:00', '', '0000-00-00 00:00:00'),
(94, 23, 'Avoid red meat, potato, egg plant, cheese.', '1', '2015-10-14 07:57:15', '', '0000-00-00 00:00:00'),
(95, 23, 'Avoid excess tea and coffee.', '1', '2015-10-14 07:57:29', '', '0000-00-00 00:00:00'),
(96, 23, 'Glucosamine/Fish oil supplement have beneficial effects.', '1', '2015-10-14 07:57:43', '', '0000-00-00 00:00:00'),
(97, 24, 'Evening primrose oil helps to reduce pain.', '1', '2015-10-14 07:58:06', '', '0000-00-00 00:00:00'),
(98, 24, 'Spices like turmeric and ginger have anti-inflammatory effects.', '1', '2015-10-14 07:58:19', '', '0000-00-00 00:00:00'),
(99, 25, 'Avoid papad, pickle, processed foods and sauces.', '1', '2015-10-14 07:58:36', '', '0000-00-00 00:00:00'),
(100, 25, 'Limit intake of alcohol, caffeine and tobacco.', '1', '2015-10-14 07:58:49', '', '0000-00-00 00:00:00'),
(101, 25, 'Avoid soft drinks.', '1', '2015-10-14 07:59:02', '', '0000-00-00 00:00:00'),
(102, 25, 'Increase intake of calcium rich foods lke low fat milk, curd, tofu, rajmah, moth beans, almonds, ragi, salmon and sardines.', '1', '2015-10-14 07:59:16', '', '0000-00-00 00:00:00'),
(103, 25, 'Consume green leafy vegetables like methi, lettuce, spinach and amaranth.', '1', '2015-10-14 07:59:30', '', '0000-00-00 00:00:00'),
(104, 25, 'Keep your vitamin D levels in check.', '1', '2015-10-14 07:59:43', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_master`
--

CREATE TABLE IF NOT EXISTS `exercise_master` (
  `id` int(11) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `wt_50` int(11) NOT NULL,
  `wt_60` int(11) NOT NULL,
  `wt_70` int(11) NOT NULL,
  `wt_80` int(11) NOT NULL,
  `wt_90` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_Date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercise_master`
--

INSERT INTO `exercise_master` (`id`, `desc`, `wt_50`, `wt_60`, `wt_70`, `wt_80`, `wt_90`, `status`, `created_date`, `created_by`, `edited_Date`, `edited_by`) VALUES
(1, 'Treadmill @ 5km/hr', 161, 206, 251, 296, 341, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(2, 'Treadmill @ 6km/hr', 206, 265, 324, 383, 442, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(3, 'Jog', 300, 360, 420, 480, 540, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(4, 'Run @ 8.6 km/hr', 430, 533, 636, 739, 842, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(5, 'Run @ 9.6 km/hr', 492, 606, 720, 836, 950, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(6, 'Elipticle/ Cross trainer', 435, 521, 612, 694, 824, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(7, 'Cycling, Stationary Bike', 293, 373, 453, 533, 613, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(8, 'Cycling, slow', 190, 235, 280, 326, 372, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(9, 'Cycling, moderate', 380, 473, 564, 655, 746, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(10, 'Gym stepper, moderate', 385, 462, 539, 616, 693, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(11, 'Stair climbing', 361, 451, 540, 790, 1090, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(12, 'Pilates, mat', 174, 209, 246, 281, 317, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(13, 'Aerobics, low impact', 243, 303, 360, 401, 457, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(14, 'Aerobics- moderate', 297, 367, 440, 514, 588, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(15, 'Aqua aerobics', 187, 232, 277, 322, 367, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(16, 'Circuit training', 350, 420, 490, 560, 630, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(17, 'Functional Training', 196, 241, 286, 331, 377, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(18, 'Weight  lifting/Training, light', 168, 213, 247, 281, 315, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(19, 'Stretching, mild', 117, 145, 173, 201, 229, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(20, 'Yoga', 90, 135, 180, 225, 270, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(21, 'Power Yoga', 189, 302, 422, 544, 663, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(22, 'Judo, karate, kick-boxing', 228, 454, 680, 794, 908, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(23, 'Taekwando, Martial arts', 472, 587, 701, 816, 930, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(24, 'Swimming breaststroke', 492, 604, 716, 828, 940, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(25, 'Swimming Butterfly', 528, 653, 778, 903, 1028, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(26, 'Swimming  freestyle, leisurely', 360, 430, 500, 570, 640, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(27, 'Skipping, (Jumping rope) moderate', 520, 640, 760, 875, 990, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(28, 'Table tennis', 182, 227, 272, 320, 366, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(29, 'Lawn Tennis', 340, 430, 520, 612, 702, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(30, 'Badminton', 210, 261, 312, 363, 414, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(31, 'Squash', 528, 664, 800, 940, 1080, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(32, 'Cricket', 226, 283, 340, 397, 453, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(33, 'Football', 380, 460, 540, 621, 701, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(34, 'Basketball', 334, 402, 470, 538, 606, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(35, 'Volleyball', 140, 175, 210, 245, 280, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(36, 'Golf', 204, 255, 306, 357, 408, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(37, 'Hockey', 434, 453, 544, 635, 726, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(38, 'Baseball', 179, 224, 265, 305, 347, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(39, 'Zumba', 330, 402, 470, 538, 605, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(40, 'Bollywood dance', 298, 357, 400, 456, 537, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(41, 'Salsa/Jazz', 278, 331, 380, 432, 514, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(42, 'Hiking', 250, 300, 350, 400, 450, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(43, 'Ice skating', 332, 415, 492, 571, 652, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(44, 'Horse riding', 190, 229, 270, 310, 351, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(45, 'Household work', 117, 146, 175, 204, 234, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(46, 'Sailing', 240, 296, 354, 412, 469, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(47, 'Trampoline', 167, 208, 248, 288, 330, 'T', '2015-10-15 00:00:00', '1', '0000-00-00 00:00:00', ''),
(49, 'Normal walk', 161, 206, 251, 296, 341, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', ''),
(50, 'Brisk walk', 206, 265, 324, 383, 442, 'T', '2015-10-12 00:00:00', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `food_item_master`
--

CREATE TABLE IF NOT EXISTS `food_item_master` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `food_category` int(11) NOT NULL COMMENT 'id of food_master',
  `macro_nut` varchar(255) NOT NULL,
  `calorie_calc_base` varchar(50) NOT NULL,
  `calc_base` varchar(50) NOT NULL,
  `number_meas` decimal(10,2) NOT NULL,
  `cup_meas` decimal(10,2) NOT NULL,
  `gm_ml_meas` decimal(10,2) NOT NULL,
  `protein` decimal(10,2) NOT NULL,
  `fat` decimal(10,2) NOT NULL,
  `carbs` decimal(10,2) NOT NULL,
  `kcal` decimal(10,2) NOT NULL,
  `fibre` decimal(10,2) NOT NULL,
  `calcium` decimal(10,2) NOT NULL,
  `iron` decimal(10,2) NOT NULL,
  `exchange` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item_master`
--

INSERT INTO `food_item_master` (`id`, `name`, `food_category`, `macro_nut`, `calorie_calc_base`, `calc_base`, `number_meas`, `cup_meas`, `gm_ml_meas`, `protein`, `fat`, `carbs`, `kcal`, `fibre`, `calcium`, `iron`, `exchange`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'White bread', 1, 'CARBS', 'gms', 'slice', '1.00', '0.00', '20.00', '3.10', '0.20', '12.00', '63.00', '0.50', '7.80', '0.10', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 07:47:26', 1),
(2, 'Poha, cooked', 1, 'CARBS', 'gms', 'cup', '0.00', '0.50', '22.00', '1.50', '0.30', '17.00', '76.00', '0.20', '4.40', '4.40', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 10:53:28', 1),
(3, 'Rice, cooked', 1, 'CARBS', 'gms', 'cup', '0.00', '0.50', '25.00', '1.90', '0.30', '19.80', '87.00', '0.20', '2.50', '0.80', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 10:54:11', 1),
(4, 'Bengal Gram (Chana)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '4.30', '1.30', '15.00', '90.00', '0.10', '50.50', '1.20', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'Lentil (Masoor)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '6.30', '0.20', '15.00', '86.00', '0.20', '17.30', '1.90', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'Green Gram,dal(Moong)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '6.10', '0.30', '15.00', '87.00', '0.20', '18.80', '1.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'Chicken', 23, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.40', '0.80', '0.00', '34.00', '0.00', '0.30', '0.40', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:25:50', 1),
(8, 'Meat', 23, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.40', '6.00', '0.00', '35.00', '0.00', '60.00', '0.80', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:26:36', 1),
(9, 'Prawns', 22, 'PROTEIN', 'gms', 'pieces', '1.00', '0.00', '30.00', '5.70', '0.30', '0.00', '27.00', '0.00', '96.90', '1.60', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:29:44', 1),
(10, 'Surmai, fresh', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.00', '0.40', '0.00', '28.00', '0.00', '27.60', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'Pomfrets', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '5.10', '0.80', '0.00', '26.00', '0.00', '60.00', '0.70', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'Ravas', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.70', '0.30', '1.00', '34.00', '0.00', '120.00', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'Egg Whites', 20, 'PROTEIN', 'Number', 'Number', '1.00', '0.00', '1.00', '3.00', '0.00', '0.00', '15.00', '0.00', '4.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'Egg Yolk', 21, 'PROTEIN', 'Number', 'Number', '1.00', '0.00', '1.00', '3.00', '6.00', '0.00', '65.00', '0.00', '26.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'Protein bars 10gm protein', 34, 'PROTEIN', 'Number', 'Number', '1.00', '0.00', '50.00', '10.00', '7.60', '24.00', '210.00', '0.00', '248.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'Protein bars 20gm protein', 35, 'PROTEIN', 'Number', 'Number', '1.00', '0.00', '75.00', '20.00', '12.50', '31.70', '308.00', '0.00', '150.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'Whey protein', 25, 'PROTEIN', 'gms', 'Tbsp', '1.00', '0.00', '1.00', '4.00', '0.30', '0.50', '20.00', '0.00', '1.50', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:37:52', 1),
(18, 'Soya protein', 37, 'PROTEIN', 'gms', 'Tbsp', '1.00', '0.00', '1.00', '4.30', '0.20', '0.20', '20.00', '0.00', '35.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:38:53', 1),
(19, '0 % fat milk', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '0.10', '4.40', '33.00', '0.00', '120.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, '1.5 % fat milk', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.30', '1.50', '5.00', '47.00', '0.00', '120.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:41:32', 1),
(21, '2 % fat milk', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '1.70', '1.00', '2.40', '26.00', '0.00', '120.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:42:15', 1),
(22, '3 % fat milk', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '3.00', '5.00', '58.00', '0.00', '150.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:43:11', 1),
(23, 'Paneer, from 3 % fat milk', 6, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '25.00', '4.60', '6.30', '1.00', '95.00', '0.00', '240.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'Paneer, readymade', 43, 'PROTEIN', 'gms', 'gms', '0.00', '0.00', '25.00', '3.50', '6.30', '0.50', '72.00', '0.00', '120.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'Tofu', 8, 'PROTEIN', 'gms', 'gms', '0.00', '0.00', '50.00', '6.90', '2.50', '2.10', '59.00', '0.00', '155.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'Silken tofu', 8, 'PROTEIN', 'gms', 'gms', '0.00', '0.00', '50.00', '3.60', '1.20', '1.00', '27.00', '0.00', '16.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'Cheese regular', 10, 'PROTEIN', 'Number', 'slice', '1.00', '0.00', '20.00', '3.80', '5.20', '1.00', '65.00', '0.00', '122.40', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'Cheese low fat', 10, 'PROTEIN', 'Number', 'slice', '1.00', '0.00', '17.50', '3.10', '1.50', '0.80', '29.00', '0.00', '110.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'Feta', 10, 'PROTEIN', 'gms', 'Tbsp', '2.00', '0.00', '20.00', '2.60', '3.40', '1.00', '43.00', '0.00', '99.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:59:01', 1),
(30, 'Mozarella cheese', 10, 'PROTEIN', 'gms', 'Tbsp', '2.00', '0.00', '20.00', '4.40', '4.50', '0.00', '60.00', '0.00', '122.40', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:58:16', 1),
(32, 'Light Vegetables', 13, 'FIBRE', 'gms', 'cup', '0.00', '0.25', '100.00', '1.30', '0.30', '4.00', '24.00', '1.00', '10.00', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:00:06', 1),
(33, 'Cauliflower', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '2.60', '0.40', '4.00', '30.00', '1.20', '33.00', '1.20', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'Cabbage', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.80', '0.10', '5.00', '21.00', '1.00', '34.00', '0.80', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'French Beans', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.70', '0.10', '5.00', '26.00', '1.80', '50.00', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'High Calorie Vegetables', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '0.40', '0.20', '11.00', '48.00', '1.20', '80.00', '1.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'Beet Root', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.70', '0.10', '9.00', '43.00', '0.90', '18.30', '1.20', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'Onion', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.20', '0.10', '11.00', '50.00', '0.60', '46.90', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'Mushrooms', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '3.10', '0.80', '4.30', '43.00', '0.40', '50.00', '1.50', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:11:54', 1),
(40, 'Starchy Vegetables', 15, 'FIBRE', 'gms', 'cup', '0.00', '0.75', '100.00', '2.00', '0.00', '23.00', '97.00', '0.40', '50.00', '1.50', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'Colocasia(Arawi)', 15, 'FIBRE', 'gms', 'cup', '0.00', '0.75', '100.00', '3.10', '0.80', '4.00', '97.00', '0.40', '50.00', '1.50', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'Sweet Potato', 15, 'FIBRE', 'gms', 'cup', '0.00', '0.75', '100.00', '3.10', '0.80', '4.30', '120.00', '0.40', '50.00', '1.50', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:15:41', 1),
(43, 'Yam', 15, 'FIBRE', 'gms', 'cup', '0.00', '0.75', '100.00', '3.10', '0.80', '4.30', '111.00', '0.40', '50.00', '1.50', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:16:11', 1),
(44, 'Fruit', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '85.00', '0.20', '0.40', '11.00', '50.00', '0.90', '8.50', '0.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'Guava', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '120.00', '1.10', '0.40', '13.00', '61.00', '6.20', '12.00', '0.30', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'Mango,ripe', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '70.00', '0.40', '0.30', '12.00', '52.00', '0.50', '9.80', '0.90', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'Pomegranate', 17, 'FIBRE', 'gms', 'cup', '0.00', '0.50', '70.00', '1.10', '0.10', '10.00', '46.00', '3.60', '7.00', '1.30', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'Almond', 28, 'FATS', 'gms', 'Number', '15.00', '0.00', '16.00', '3.30', '9.40', '2.00', '105.00', '0.30', '36.70', '0.80', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'Cashewnut', 28, 'FATS', 'gms', 'Number', '10.00', '0.00', '16.00', '3.40', '7.50', '4.00', '95.00', '0.20', '8.00', '0.90', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'Pistachios, roasted', 28, 'FATS', 'gms', 'Number', '22.00', '0.00', '16.00', '3.40', '7.40', '4.00', '91.00', '0.30', '22.50', '1.20', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'Walnut', 28, 'FATS', 'gms', 'Number', '3.00', '0.00', '15.00', '2.30', '9.70', '2.00', '103.00', '0.40', '15.00', '0.40', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'Cooking Oil ', 45, 'FATS', 'gms', 'Tsp', '1.00', '0.00', '4.00', '0.00', '4.00', '0.00', '36.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:29:53', 1),
(53, 'Butter', 45, 'FAT', 'gms', 'Tsp', '1.00', '0.00', '5.00', '0.00', '4.10', '0.00', '36.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:30:41', 1),
(54, 'Sugar', 18, 'CARBS', 'gms', 'Tsp', '1.00', '0.00', '5.00', '0.00', '0.00', '5.00', '20.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'Honey', 18, 'CARBS', 'gms', 'Tsp', '1.00', '0.00', '7.10', '0.00', '0.00', '5.60', '23.00', '0.00', '0.30', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:35:11', 1),
(56, 'Dark Chocolate', 46, 'CARBS', 'gms', 'pieces', '1.00', '0.00', '10.00', '0.80', '3.40', '6.00', '56.00', '0.00', '74.10', '2.60', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:48:21', 1),
(57, 'Dairy Milk ', 46, 'CARBS', 'gms', 'pieces', '1.00', '0.00', '10.00', '0.80', '2.80', '5.50', '52.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:48:02', 1),
(58, '5-Star', 46, 'CARBS', 'gms', 'pieces', '1.00', '0.00', '10.00', '0.40', '1.60', '7.00', '44.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:48:55', 1),
(59, 'Tropicana Juice-Orange', 47, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '200.00', '2.00', '0.00', '22.00', '100.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'Real-Mixed fruit juice', 47, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '200.00', '2.00', '0.00', '26.00', '112.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'Frooti', 47, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '200.00', '0.00', '0.00', '32.00', '130.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'Appy', 47, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '200.00', '1.00', '0.40', '33.00', '134.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:50:37', 1),
(63, 'Beer ', 54, 'CARBS', 'ml', 'Pint', '1.00', '0.00', '350.00', '0.00', '0.00', '0.00', '150.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:53:13', 1),
(64, 'Beer Lite', 54, 'CARBS', 'ml', 'Pint', '1.00', '0.00', '350.00', '0.00', '0.00', '0.00', '83.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:53:34', 1),
(65, 'Wine ', 54, 'CARBS', 'ml', 'Glass', '1.00', '0.00', '100.00', '0.00', '0.00', '0.00', '88.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:54:07', 1),
(66, 'Spirits', 54, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '30.00', '0.00', '0.00', '0.00', '66.50', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:54:43', 1),
(67, 'Coconut water', 53, 'CARBS', 'gms', 'cup', '0.00', '1.00', '200.00', '3.00', '0.00', '9.00', '48.00', '0.00', '48.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 12:39:51', 1),
(68, 'Green Tea', 48, 'NA', 'gms', 'cup', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'Black Tea', 48, 'NA', 'gms', 'cup', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'Rice dal khichdi', 49, 'PROTEIN,CARBS', 'gms', 'cup', '0.00', '0.50', '50.00', '5.00', '1.00', '38.00', '100.00', '0.00', '10.00', '0.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'Rawa Idli with Sambhar', 49, 'PROTEIN,CARBS', 'gms', 'Number,cup', '2.00', '1.50', '0.00', '12.00', '5.00', '48.00', '284.00', '1.50', '80.00', '2.40', 'Idli,Sambhar', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'Vegetable Dal dalia', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '9.00', '5.30', '37.50', '236.00', '2.30', '75.00', '3.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'Pav Bhaji Unjunked', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '7.60', '5.00', '29.00', '196.00', '3.00', '88.00', '2.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'Pasta and Bean in Red Sauce', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '2.00', '0.00', '13.00', '5.00', '60.00', '286.00', '2.00', '173.00', '3.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'Rice and Vegtable bake', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '2.00', '0.00', '13.50', '9.70', '38.00', '372.00', '3.00', '332.00', '4.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'Chole Palak Roll', 49, 'PROTEIN,CARBS', '', 'Number', '2.00', '0.00', '0.00', '11.00', '8.00', '49.00', '313.00', '3.00', '229.00', '4.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'Fada ni Khichdi', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '8.60', '4.00', '28.00', '270.00', '2.00', '47.00', '4.00', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'Hot Noodle Wok', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '10.00', '6.00', '40.00', '257.00', '3.30', '194.00', '1.70', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'Baked Ragda Pattice', 49, 'PROTEIN,CARBS', '', 'Number,cup', '2.00', '1.00', '0.00', '15.00', '5.00', '59.00', '339.00', '4.00', '120.00', '4.00', 'Pattice,Ragda', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'Hyderabadi Briyani', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.00', '0.00', '7.00', '4.00', '17.00', '222.00', '1.90', '57.00', '2.20', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'Mexican rice with beans and corn', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '12.50', '7.00', '38.00', '337.00', '3.60', '134.00', '3.60', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'Vegetable Macaroni', 49, 'PROTEIN,CARBS', '', 'cup', '0.00', '1.50', '0.00', '13.00', '4.00', '55.00', '274.00', '2.00', '170.00', '4.10', '', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'Dal (average)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '6.00', '0.50', '14.50', '85.00', '1.00', '18.00', '1.80', '', 'T', '0000-00-00 00:00:00', 0, '2015-10-31 11:23:12', 1),
(84, 'Tea With Milk', 3, 'PROTEIN', 'ml', 'Ml', '0.00', '100.00', '100.00', '3.10', '0.10', '4.40', '33.00', '0.00', '120.00', '0.00', 'Tea With, Milk', 'T', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, '0 % fat curd', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '0.10', '4.40', '33.00', '0.00', '120.00', '0.00', '', 'F', '0000-00-00 00:00:00', 0, '2015-11-01 19:18:02', 1),
(86, '1.5 % fat curd', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '1.70', '0.80', '2.50', '23.00', '0.00', '60.00', '0.00', '', 'F', '0000-00-00 00:00:00', 0, '2015-11-01 19:17:51', 1),
(87, '2 % fat curd', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '1.70', '1.00', '2.40', '26.00', '0.00', '60.00', '0.00', '', 'F', '0000-00-00 00:00:00', 0, '2015-11-01 19:17:41', 1),
(88, '3 % fat curd', 3, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '1.70', '1.70', '2.70', '31.00', '0.00', '75.00', '0.00', '', 'F', '0000-00-00 00:00:00', 0, '2015-11-01 19:17:29', 1),
(90, 'Dosa', 51, 'FATS', '125', 'cup', '10.00', '2.00', '20.00', '35.00', '22.20', '18.00', '250.58', '124.25', '850.25', '550.00', '', 'F', '2015-10-30 04:46:39', 1, '2015-10-30 04:53:21', 1),
(91, 'Bourbon biscuits', 1, 'CARBS', 'gms', 'biscuits', '1.00', '0.00', '10.00', '0.60', '1.90', '7.00', '47.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 10:59:19', 1, '0000-00-00 00:00:00', 0),
(92, 'Cream cracker biscuits', 1, 'CARBS', 'gms', 'biscuits', '1.00', '0.00', '7.70', '0.80', '1.20', '5.00', '35.00', '0.10', '1.70', '0.20', '', 'T', '2015-10-31 11:01:06', 1, '0000-00-00 00:00:00', 0),
(93, 'Digestive marie biscuits', 1, 'CARBS', 'gms', 'biscuits', '1.00', '0.00', '4.90', '0.40', '0.50', '4.00', '21.00', '0.20', '0.70', '0.10', '', 'T', '2015-10-31 11:02:22', 1, '0000-00-00 00:00:00', 0),
(94, 'Marie biscuits', 1, 'CARBS', 'gms', 'biscuits', '3.00', '0.00', '5.60', '0.40', '0.60', '4.00', '24.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:03:38', 1, '0000-00-00 00:00:00', 0),
(95, 'SELFCARE Bajra rings', 1, 'CARBS', 'gms', 'rings', '1.00', '0.00', '5.00', '0.50', '0.30', '4.00', '22.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:04:44', 1, '0000-00-00 00:00:00', 0),
(96, 'SELFCARE Oatmeal cookies', 1, 'CARBS', 'gms', 'cookies', '1.00', '0.00', '4.00', '0.30', '0.30', '3.00', '16.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:05:40', 1, '0000-00-00 00:00:00', 0),
(97, 'SELFCARE Cranberry cookies', 1, 'CARBS', 'gms', 'cookies', '1.00', '0.00', '20.00', '2.00', '4.20', '13.00', '97.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:06:51', 1, '0000-00-00 00:00:00', 0),
(98, 'Jowar rotis', 1, 'CARBS', 'gms', 'rotis', '1.00', '0.00', '15.00', '1.60', '0.30', '11.00', '52.00', '0.20', '3.80', '0.60', '', 'T', '2015-10-31 11:08:06', 1, '0000-00-00 00:00:00', 0),
(99, 'Maize, tender', 1, 'CARBS', 'gms', 'cup', '0.00', '1.00', '100.00', '4.70', '0.90', '24.60', '125.00', '1.90', '9.00', '1.10', '', 'T', '2015-10-31 11:09:06', 1, '0000-00-00 00:00:00', 0),
(100, 'Kurmura, puffed rice', 1, 'CARBS', 'gms', 'cup', '0.00', '1.00', '14.00', '1.10', '0.10', '10.00', '46.00', '0.30', '3.20', '0.90', '', 'T', '2015-10-31 11:10:08', 1, '0000-00-00 00:00:00', 0),
(101, 'Wheat bread', 1, 'CARBS', 'gms', 'slices', '1.00', '0.00', '25.00', '3.00', '0.40', '18.00', '87.00', '0.30', '10.30', '1.30', '', 'T', '2015-10-31 11:11:12', 1, '0000-00-00 00:00:00', 0),
(102, 'Wheat flour', 1, 'CARBS', 'gms', 'cup', '0.00', '0.25', '25.00', '3.00', '0.40', '17.40', '85.00', '0.40', '5.00', '1.20', '', 'T', '2015-10-31 11:12:09', 1, '0000-00-00 00:00:00', 0),
(103, 'Kellogs Cornflakes', 1, 'CARBS', 'gms', 'cup', '0.00', '0.75', '25.00', '2.00', '0.10', '21.00', '93.00', '0.60', '0.00', '0.00', '', 'T', '2015-10-31 11:12:57', 1, '0000-00-00 00:00:00', 0),
(104, 'Kellogs wheatflakes', 1, 'CARBS', 'gms', 'cup', '0.00', '0.75', '25.00', '2.50', '0.30', '20.00', '94.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:14:06', 1, '0000-00-00 00:00:00', 0),
(105, 'Kelloggs all bran', 1, 'CARBS', 'gms', 'cup', '0.00', '0.75', '25.00', '3.50', '0.90', '12.00', '84.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 11:14:56', 1, '0000-00-00 00:00:00', 0),
(106, 'Cow Pea(Chavli)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '6.00', '0.30', '14.00', '81.00', '1.00', '19.30', '2.20', '', 'T', '2015-10-31 11:17:26', 1, '2015-10-31 11:19:04', 1),
(107, 'Rajmah', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '5.70', '0.30', '15.00', '87.00', '1.20', '65.00', '1.30', '', 'T', '2015-10-31 11:18:40', 1, '0000-00-00 00:00:00', 0),
(108, 'Redgram,dhal(Toor)', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.75', '25.00', '5.60', '0.40', '14.00', '84.00', '0.40', '18.30', '0.70', '', 'T', '2015-10-31 11:20:43', 1, '0000-00-00 00:00:00', 0),
(109, 'Baked Beans, Heinz', 2, 'PROTEIN', 'gms', 'cup', '0.00', '0.50', '100.00', '4.70', '0.20', '12.90', '79.00', '3.70', '0.00', '3.00', '', 'T', '2015-10-31 11:21:59', 1, '0000-00-00 00:00:00', 0),
(110, 'Mutton, muscle', 23, 'PROTEIN', 'gms', 'gms', '0.00', '0.00', '0.30', '3.70', '2.70', '0.00', '39.00', '0.00', '30.00', '0.50', '', 'T', '2015-10-31 11:28:06', 1, '0000-00-00 00:00:00', 0),
(111, 'Mackerel(Bangda)', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '5.70', '0.50', '0.00', '28.00', '0.00', '128.70', '1.40', '', 'T', '2015-10-31 11:32:49', 1, '0000-00-00 00:00:00', 0),
(112, 'Sardine', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.30', '0.60', '0.00', '30.00', '0.00', '27.00', '0.80', '', 'T', '2015-10-31 11:33:54', 1, '0000-00-00 00:00:00', 0),
(113, 'Fish (average)', 22, 'PROTEIN', 'gms', 'cup', '0.00', '0.25', '30.00', '6.30', '2.40', '0.00', '34.00', '0.00', '100.00', '0.80', '', 'T', '2015-10-31 11:34:47', 1, '0000-00-00 00:00:00', 0),
(114, 'Curd (from 0 % fat milk)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '0.10', '4.40', '33.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:45:17', 1, '0000-00-00 00:00:00', 0),
(115, 'Curd ( from 1.5 % fat milk)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.30', '1.50', '5.00', '47.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:46:05', 1, '0000-00-00 00:00:00', 0),
(116, 'Curd (from 2 % fat milk)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '1.70', '1.00', '2.40', '26.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:47:00', 1, '0000-00-00 00:00:00', 0),
(117, 'Curd (from 3 % fat milk)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '3.00', '5.00', '58.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:47:52', 1, '0000-00-00 00:00:00', 0),
(118, 'Curd  (from cow''s milk)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '4.00', '3.00', '60.00', '0.00', '149.00', '0.20', '', 'T', '2015-10-31 11:49:00', 1, '0000-00-00 00:00:00', 0),
(119, 'Nestle Slim Dahi (1.5 % fat)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '4.10', '1.50', '68.00', '54.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:50:04', 1, '0000-00-00 00:00:00', 0),
(120, 'Britannia Daily fresh dahi (3 % fat)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.10', '3.00', '6.00', '64.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:51:44', 1, '0000-00-00 00:00:00', 0),
(121, 'Danone Dahi (3.5 % fat)', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.50', '3.50', '6.00', '68.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:52:48', 1, '0000-00-00 00:00:00', 0),
(122, 'Nestle flavored yogurt, low-fat', 52, 'PROTEIN', 'ml', 'cup', '0.00', '0.50', '100.00', '3.50', '1.50', '16.00', '90.00', '0.00', '140.00', '0.00', '', 'T', '2015-10-31 11:53:39', 1, '0000-00-00 00:00:00', 0),
(123, 'Capsicum', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.30', '0.30', '4.30', '24.00', '1.00', '10.00', '0.50', '', 'T', '2015-10-31 12:03:03', 1, '0000-00-00 00:00:00', 0),
(124, 'Cucumber', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.00', '100.00', '0.40', '0.10', '3.00', '13.00', '0.40', '10.00', '0.60', '', 'T', '2015-10-31 12:04:26', 1, '0000-00-00 00:00:00', 0),
(125, 'Ladies Fingers', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.90', '0.20', '6.40', '35.00', '1.20', '66.00', '0.40', '', 'T', '2015-10-31 12:05:24', 1, '0000-00-00 00:00:00', 0),
(126, 'Brinjal', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.40', '0.30', '4.00', '24.00', '1.30', '18.00', '0.40', '', 'T', '2015-10-31 12:06:22', 1, '0000-00-00 00:00:00', 0),
(127, 'Spinach', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '2.00', '0.70', '2.90', '26.00', '0.60', '73.00', '1.10', '', 'T', '2015-10-31 12:07:45', 1, '0000-00-00 00:00:00', 0),
(128, 'Tomato', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.00', '100.00', '0.90', '0.20', '3.60', '20.00', '0.80', '48.00', '0.60', '', 'T', '2015-10-31 12:08:41', 1, '0000-00-00 00:00:00', 0),
(129, 'Stir-fry/soup/salad', 13, 'FIBRE', 'gms', 'gms', '0.00', '0.50', '100.00', '1.30', '0.40', '4.50', '25.00', '1.00', '35.00', '0.80', '', 'T', '2015-10-31 12:10:01', 1, '0000-00-00 00:00:00', 0),
(130, 'Carrots', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '0.90', '0.20', '10.60', '48.00', '1.20', '80.00', '1.00', '', 'T', '2015-10-31 12:12:57', 1, '0000-00-00 00:00:00', 0),
(131, 'Stir-fry/soup/salad', 14, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '1.60', '0.80', '10.00', '50.00', '1.30', '40.00', '1.00', '', 'T', '2015-10-31 12:14:20', 1, '0000-00-00 00:00:00', 0),
(132, 'Stir-fry/soup/salad', 15, 'FIBRE', 'gms', 'gms', '0.00', '0.25', '100.00', '2.00', '0.40', '22.00', '100.00', '2.00', '40.00', '1.00', '', 'T', '2015-10-31 12:17:10', 1, '0000-00-00 00:00:00', 0),
(133, 'Apple', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '85.00', '0.20', '0.40', '11.00', '50.00', '0.90', '8.50', '0.60', '', 'T', '2015-10-31 12:21:08', 1, '0000-00-00 00:00:00', 0),
(134, 'Banana', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '65.00', '0.80', '0.20', '18.00', '75.00', '0.30', '11.10', '0.20', '', 'T', '2015-10-31 12:22:02', 1, '0000-00-00 00:00:00', 0),
(135, 'Orange', 17, 'FIBRE', 'gms', 'Number', '1.00', '0.00', '128.00', '0.20', '0.30', '14.00', '61.00', '0.40', '33.30', '0.40', '', 'T', '2015-10-31 12:22:58', 1, '0000-00-00 00:00:00', 0),
(136, 'Papaya', 17, 'FIBRE', 'gms', 'cup', '0.00', '1.50', '170.00', '1.10', '0.20', '13.00', '56.00', '1.40', '29.80', '0.90', '', 'T', '2015-10-31 12:23:54', 1, '0000-00-00 00:00:00', 0),
(137, 'Pineapple slices', 17, 'FIBRE', 'gms', 'slices', '5.00', '0.00', '100.00', '0.40', '0.10', '11.00', '46.00', '0.50', '20.00', '2.40', '', 'T', '2015-10-31 12:25:12', 1, '2015-10-31 12:25:44', 1),
(138, 'Sitaphal (Custard Apple)', 17, 'FIBRE', 'gms', 'cup', '0.00', '0.75', '60.00', '1.00', '0.40', '12.00', '54.00', '0.60', '50.40', '0.90', '', 'T', '2015-10-31 12:26:31', 1, '0000-00-00 00:00:00', 0),
(139, 'Amul butter', 45, 'FAT', 'gms', 'Tsp', '1.00', '0.00', '5.00', '0.00', '4.00', '0.00', '36.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:31:47', 1, '0000-00-00 00:00:00', 0),
(140, 'Ghee (Cow)', 45, 'FAT', 'gms', 'Tsp', '1.00', '0.00', '5.00', '0.00', '5.00', '0.00', '45.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:32:54', 1, '0000-00-00 00:00:00', 0),
(141, 'Olive oil', 45, 'FATS', 'gms', 'Tsp', '1.00', '0.00', '4.00', '0.00', '4.00', '0.00', '35.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:33:58', 1, '0000-00-00 00:00:00', 0),
(142, 'Jaggery', 18, 'CARBS', 'gms', 'Tsp', '1.00', '0.00', '10.00', '0.00', '0.00', '10.00', '38.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:36:40', 1, '0000-00-00 00:00:00', 0),
(143, 'Sweetened lime water', 53, 'CARBS', 'gms', 'cup', '0.00', '1.00', '200.00', '0.00', '0.00', '10.00', '42.00', '0.00', '223.00', '0.00', '', 'T', '2015-10-31 12:41:03', 1, '0000-00-00 00:00:00', 0),
(144, 'Gatorade', 53, 'CARBS', 'ml', 'cup', '0.00', '1.00', '200.00', '0.00', '0.00', '7.20', '48.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:41:58', 1, '0000-00-00 00:00:00', 0),
(145, 'Red wine or Rose', 54, 'CARBS', 'ml', 'Ml', '0.00', '0.00', '100.00', '0.00', '0.00', '0.00', '71.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:55:39', 1, '0000-00-00 00:00:00', 0),
(146, 'Scotch', 54, 'CARBS', 'ml', 'Ml', '1.00', '0.00', '30.00', '0.00', '0.00', '0.00', '67.00', '0.00', '0.00', '0.00', '', 'T', '2015-10-31 12:56:32', 1, '0000-00-00 00:00:00', 0),
(147, 'test2', 1, 'CARBS,PROTEIN', 'tt', 'Number,cup', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '', 'F', '2015-11-03 10:29:53', 1, '2015-11-03 10:30:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_master`
--

CREATE TABLE IF NOT EXISTS `food_master` (
  `id` int(11) NOT NULL,
  `short_desc` varchar(25) NOT NULL,
  `long_desc` varchar(100) NOT NULL,
  `weight_per_serving` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'uom_serving -> name',
  `prot_per_serving` decimal(10,2) NOT NULL,
  `fat_per_serving` decimal(10,2) NOT NULL,
  `chol_per_serving` decimal(10,2) NOT NULL,
  `calo_per_serving` decimal(10,2) NOT NULL,
  `calc_per_serving` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'T for true, F for false',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime DEFAULT NULL,
  `edited_by` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_master`
--

INSERT INTO `food_master` (`id`, `short_desc`, `long_desc`, `weight_per_serving`, `name`, `prot_per_serving`, `fat_per_serving`, `chol_per_serving`, `calo_per_serving`, `calc_per_serving`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`, `order_by`) VALUES
(1, '', '', '25.00 GM', 'CEREALS', '2.50', '0.50', '18.00', '85.00', '5.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:27:19', '1', 1),
(2, '', '', '25.00 GM', 'PULSES', '6.00', '0.50', '14.50', '85.00', '18.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:27:23', '1', 2),
(3, '', '', '100 ML', 'MILK', '3.30', '3.30', '5.40', '62.00', '116.00', 'F', '2015-08-27 00:00:00', 0, '2015-11-04 08:13:19', '1', 0),
(4, '', '', '100 ML', '0% FAT MILK', '3.10', '0.10', '4.40', '33.00', '120.00', 'T', '2015-08-27 00:00:00', 0, '2015-11-04 08:13:23', '1', 13),
(5, '', '', '100 ML', 'DOUBLE TONNED MILK(1.5% fat)', '3.30', '1.50', '5.00', '46.70', '120.00', 'F', '2015-08-27 00:00:00', 0, '2015-11-04 08:13:26', '1', 0),
(6, '', '', '25 GMS(200 ML Milk)', 'PANEER FROM 3% FAT MILK', '4.60', '6.30', '1.00', '94.50', '240.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:44:44', '1', 17),
(7, '', '', '1.00', 'MAX PROTEIN BAR', '20.00', '12.50', '31.70', '308.00', '150.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:05:57', '1', 0),
(8, '', '', '50 GM (4 CUBES)', 'TOFU', '6.90', '2.50', '2.10', '58.50', '155.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:45:57', '1', 19),
(9, '', '', '1.00', 'WORKOUT BAR', '10.00', '7.60', '24.00', '210.00', '248.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:06', '1', 0),
(10, '', '', '20 GM', 'CHEESE REGULAR', '3.00', '5.00', '0.80', '61.40', '129.20', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 11:56:20', '1', 21),
(11, '', '', '17.5 gm(1 cube)', 'CHEESE LOW FAT', '3.90', '1.50', '0.80', '28.90', '110.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 11:56:08', '1', 22),
(12, '', '', '17.50', 'HAPPY COW CHEESE (low fat 8%)', '3.11', '1.15', '0.84', '28.87', '110.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:23', '1', 0),
(13, '', '', '100 GM', 'VEG A', '1.00', '0.00', '4.50', '25.00', '35.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:47:56', '1', 23),
(14, '', '', '100 GM', 'VEG B', '0.00', '0.00', '10.00', '50.00', '40.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:07', '1', 24),
(15, '', '', '100 GM', 'VEG C', '1.00', '0.00', '22.00', '100.00', '15.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:21', '1', 25),
(16, '', '', '25.00', 'Soya POPs', '11.69', '113.00', '9.30', '94.20', '63.70', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:33', '1', 0),
(17, '', '', 'VARIABLE', 'FRUITS', '0.00', '0.00', '10.00', '50.00', '40.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:42', '1', 26),
(18, '', '', '1 TSPN', 'SUGARS', '0.00', '0.00', '5.00', '20.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:49:27', '1', 28),
(19, '', '', '2 TSPN', 'OIL & BUTTER, GHEE', '0.00', '11.00', '0.00', '100.00', '0.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:46', '1', 0),
(20, '', '', '33 GM', 'EGG WHITE', '3.00', '0.00', '0.00', '15.00', '4.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:33', '1', 5),
(21, '', '', '17 GM', 'EGG YOLK', '3.00', '6.00', '0.00', '65.00', '26.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:48', '1', 6),
(22, '', '', '75 GM (5*5 CM)', 'FISH & SEAFOOD', '6.40', '6.00', '0.00', '85.00', '250.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:07', '1', 4),
(23, '', '', '75 GM OR 35 GM', 'CHICKEN/MEAT', '6.40', '6.00', '0.00', '85.00', '15.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:35:25', '1', 3),
(24, '', '', '50.00', 'MEAT', '6.40', '6.00', '0.00', '85.00', '60.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:59', '1', 0),
(25, '', '', '5 gms (1 tbsp)', 'WHEY PROTEIN', '4.00', '0.30', '0.50', '20.00', '1.50', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:56:57', '1', 10),
(26, '', '', '10.00', 'NUTRILITE PROTEIN POWDER', '8.00', '0.30', '0.50', '36.00', '70.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:07:15', '1', 0),
(27, '', '', '100 ML', 'COCONUT WATER', '1.40', '0.00', '4.40', '24.00', '48.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:50:23', '1', 30),
(28, '', '', '15 GMS', 'NUTS & OIL SEEDS', '3.50', '8.00', '8.50', '100.00', '22.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 12:27:18', '1', 27),
(29, '', '', '1 PINT (350 ML)', 'BEER', '0.00', '0.00', '0.00', '150.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:51:55', '1', 33),
(30, '', '', '1 PINT (350 ML)', 'BEER LITE', '0.00', '0.00', '0.00', '83.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:52:11', '1', 34),
(31, '', '', '100 ML', 'WINE', '0.00', '0.00', '0.00', '88.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:52:26', '1', 35),
(32, '', '', '30 ML', 'SPIRITS', '0.00', '0.00', '0.00', '66.50', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:53:20', '1', 36),
(34, '', '', '1 Bar (50)', '10 gm PROTEIN BARS', '10.00', '7.60', '24.00', '210.00', '248.00', 'T', '2015-09-10 12:37:39', 1, NULL, '', 7),
(35, '', '', '1 Bar (75 gms)', '20 gm PROTEIN BARS', '20.00', '12.50', '31.70', '308.00', '150.00', 'T', '2015-09-10 12:38:19', 1, NULL, '', 8),
(36, '', '', '10 GM', 'PROTEIN POWDERS', '8.00', '0.30', '0.50', '36.00', '70.00', 'T', '2015-09-10 12:39:00', 1, NULL, '', 9),
(37, '', '', '5 gms (1 tbsp)', 'SOYA PROTEIN', '4.30', '0.20', '0.20', '19.60', '0.00', 'T', '2015-09-10 12:40:07', 1, NULL, '', 12),
(38, '', '', '7 gms', 'AMINO COLLAGEN', '5.70', '0.00', '9.00', '26.50', '0.00', 'T', '2015-09-10 12:41:07', 1, NULL, '', 12),
(39, '', '', '100 ML', 'TONED MILK', '3.40', '2.00', '4.80', '52.00', '120.00', 'F', '2015-09-10 12:41:59', 1, '2015-11-04 08:13:30', '1', 0),
(40, '', '', '100 ML', '1.5% FAT MILK', '3.30', '1.50', '5.00', '46.70', '120.00', 'T', '2015-09-10 12:42:42', 1, '2015-10-06 10:02:37', '1', 14),
(41, '', '', '100 ML', '2% FAT MILK', '3.40', '2.00', '4.80', '52.00', '120.00', 'T', '2015-09-10 12:43:22', 1, '2015-10-06 10:02:42', '1', 15),
(42, '', '', '100 ML', '3% FAT MILK', '3.30', '3.30', '5.40', '62.00', '116.00', 'T', '2015-09-10 12:43:47', 1, '2015-10-06 10:02:46', '1', 16),
(43, '', '', '25 GMS(200 ML Milk)', 'PANEER, READYMADE', '3.50', '6.30', '0.50', '72.00', '120.00', 'T', '2015-09-10 12:45:25', 1, NULL, '', 18),
(44, '', '', '100ML', 'SOYA MILK', '3.20', '1.60', '2.00', '46.00', '0.00', 'T', '2015-09-10 12:46:26', 1, NULL, '', 20),
(45, '', '', '2 TSPN', 'FATS & EDIBLE OILS', '0.00', '11.00', '0.00', '100.00', '0.00', 'T', '2015-09-10 12:50:05', 1, NULL, '', 29),
(46, '', '', '10 GMS', 'CHOCOLATES', '1.60', '6.80', '10.90', '111.00', '0.00', 'T', '2015-09-10 12:51:07', 1, NULL, '', 31),
(47, '', '', '200 ML', 'JUICES', '2.00', '0.00', '26.00', '112.00', '0.00', 'T', '2015-09-10 12:51:31', 1, NULL, '', 32),
(48, '', '', '', 'NA', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '0000-00-00 00:00:00', 1, NULL, '', 99),
(49, '', '', '50 GM', 'SINGLE DISH', '5.00', '1.00', '38.00', '100.00', '10.00', 'T', '2015-10-01 12:18:34', 1, '2015-10-01 12:19:41', '1', 99),
(50, '', '', '1 cup', 'Chana', '3.50', '7.25', '22.00', '90.27', '58.00', 'F', '2015-10-30 04:29:43', 1, '2015-10-30 04:33:40', '1', 0),
(52, '', '', '0', 'CURDS/YOGHURT', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 11:44:08', 1, NULL, '', 99),
(53, '', '', '0', 'BEVERAGES', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 12:39:26', 1, NULL, '', 99),
(54, '', '', '0', 'ALCOHOL', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 12:52:41', 1, NULL, '', 99);

-- --------------------------------------------------------

--
-- Table structure for table `food_master_041115`
--

CREATE TABLE IF NOT EXISTS `food_master_041115` (
  `id` int(11) NOT NULL,
  `short_desc` varchar(25) NOT NULL,
  `long_desc` varchar(100) NOT NULL,
  `weight_per_serving` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'uom_serving -> name',
  `prot_per_serving` decimal(10,2) NOT NULL,
  `fat_per_serving` decimal(10,2) NOT NULL,
  `chol_per_serving` decimal(10,2) NOT NULL,
  `calo_per_serving` decimal(10,2) NOT NULL,
  `calc_per_serving` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL COMMENT 'T for true, F for false',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime DEFAULT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_master_041115`
--

INSERT INTO `food_master_041115` (`id`, `short_desc`, `long_desc`, `weight_per_serving`, `name`, `prot_per_serving`, `fat_per_serving`, `chol_per_serving`, `calo_per_serving`, `calc_per_serving`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, '', '', '25.00 GM', 'CEREALS', '2.50', '0.50', '18.00', '85.00', '5.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:27:19', '1'),
(2, '', '', '25.00 GM', 'PULSES', '6.00', '0.50', '14.50', '85.00', '18.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:27:23', '1'),
(3, '', '', '100 ML', 'MILK', '3.30', '3.30', '5.40', '62.00', '116.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 11:40:10', '1'),
(4, '', '', '100 ML', 'SLIM MILK', '3.10', '0.10', '4.40', '33.00', '120.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:28:45', '1'),
(5, '', '', '100 ML', 'DOUBLE TONNED MILK(1.5% fat)', '3.30', '1.50', '5.00', '46.70', '120.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 10:01:51', '1'),
(6, '', '', '25 GMS(200 ML Milk)', 'PANEER FROM 3% FAT MILK', '4.60', '6.30', '1.00', '94.50', '240.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:44:44', '1'),
(7, '', '', '1.00', 'MAX PROTEIN BAR', '20.00', '12.50', '31.70', '308.00', '150.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:05:57', '1'),
(8, '', '', '50 GM (4 CUBES)', 'TOFU', '6.90', '2.50', '2.10', '58.50', '155.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:45:57', '1'),
(9, '', '', '1.00', 'WORKOUT BAR', '10.00', '7.60', '24.00', '210.00', '248.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:06', '1'),
(10, '', '', '20 GM', 'CHEESE', '3.00', '5.00', '0.80', '61.40', '129.20', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 11:56:20', '1'),
(11, '', '', '17.5 gm(1 cube)', 'CHEESE LOW FAT', '3.90', '1.50', '0.80', '28.90', '110.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-31 11:56:08', '1'),
(12, '', '', '17.50', 'HAPPY COW CHEESE (low fat 8%)', '3.11', '1.15', '0.84', '28.87', '110.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:23', '1'),
(13, '', '', '100 GM', 'VEG A', '1.00', '0.00', '4.50', '25.00', '35.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:47:56', '1'),
(14, '', '', '100 GM', 'VEG B', '0.00', '0.00', '10.00', '50.00', '40.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:07', '1'),
(15, '', '', '100 GM', 'VEG C', '1.00', '0.00', '22.00', '100.00', '15.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:21', '1'),
(16, '', '', '25.00', 'Soya POPs', '11.69', '113.00', '9.30', '94.20', '63.70', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:33', '1'),
(17, '', '', 'VARIABLE', 'FRUITS', '0.00', '0.00', '10.00', '50.00', '40.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:48:42', '1'),
(18, '', '', '1 TSPN', 'SUGARS', '0.00', '0.00', '5.00', '20.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:49:27', '1'),
(19, '', '', '2 TSPN', 'OIL & BUTTER, GHEE', '0.00', '11.00', '0.00', '100.00', '0.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:46', '1'),
(20, '', '', '33 GM', 'EGG WHITE', '3.00', '0.00', '0.00', '15.00', '4.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:33', '1'),
(21, '', '', '17 GM', 'EGG YOLK', '3.00', '6.00', '0.00', '65.00', '26.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:48', '1'),
(22, '', '', '75 GM (5*5 CM)', 'FISH & SEAFOOD', '6.40', '6.00', '0.00', '85.00', '250.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:36:07', '1'),
(23, '', '', '75 GM OR 35 GM', 'CHICKEN/MEAT', '6.40', '6.00', '0.00', '85.00', '15.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:35:25', '1'),
(24, '', '', '50.00', 'MEAT', '6.40', '6.00', '0.00', '85.00', '60.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:06:59', '1'),
(25, '', '', '5 gms (1 tbsp)', 'WHEY PROTEIN', '4.00', '0.30', '0.50', '20.00', '1.50', 'T', '2015-08-27 00:00:00', 0, '2015-10-06 09:56:57', '1'),
(26, '', '', '10.00', 'NUTRILITE PROTEIN POWDER', '8.00', '0.30', '0.50', '36.00', '70.00', 'F', '2015-08-27 00:00:00', 0, '2015-10-08 10:07:15', '1'),
(27, '', '', '100 ML', 'COCONUT WATER', '1.40', '0.00', '4.40', '24.00', '48.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:50:23', '1'),
(28, '', '', '15 GMS', 'NUTS & OIL SEEDS', '3.50', '8.00', '8.50', '100.00', '22.00', 'T', '2015-08-27 00:00:00', 0, '2015-10-31 12:27:18', '1'),
(29, '', '', '1 PINT (350 ML)', 'BEER', '0.00', '0.00', '0.00', '150.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:51:55', '1'),
(30, '', '', '1 PINT (350 ML)', 'BEER LITE', '0.00', '0.00', '0.00', '83.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:52:11', '1'),
(31, '', '', '100 ML', 'WINE', '0.00', '0.00', '0.00', '88.00', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:52:26', '1'),
(32, '', '', '30 ML', 'SPIRITS', '0.00', '0.00', '0.00', '66.50', '0.00', 'T', '2015-08-27 00:00:00', 0, '2015-09-10 12:53:20', '1'),
(33, '', '', '25', 'test123', '1.00', '2.00', '2.00', '2.00', '2.00', 'F', '2015-09-04 13:04:58', 1, '2015-09-04 14:01:53', '1'),
(34, '', '', '1 Bar (50)', '10 gm PROTEIN BARS', '10.00', '7.60', '24.00', '210.00', '248.00', 'T', '2015-09-10 12:37:39', 1, NULL, ''),
(35, '', '', '1 Bar (75 gms)', '20 gm PROTEIN BARS', '20.00', '12.50', '31.70', '308.00', '150.00', 'T', '2015-09-10 12:38:19', 1, NULL, ''),
(36, '', '', '10 GM', 'PROTEIN POWDERS', '8.00', '0.30', '0.50', '36.00', '70.00', 'T', '2015-09-10 12:39:00', 1, NULL, ''),
(37, '', '', '5 gms (1 tbsp)', 'SOYA PROTEIN', '4.30', '0.20', '0.20', '19.60', '0.00', 'T', '2015-09-10 12:40:07', 1, NULL, ''),
(38, '', '', '7 gms', 'AMINO COLLAGEN', '5.70', '0.00', '9.00', '26.50', '0.00', 'T', '2015-09-10 12:41:07', 1, NULL, ''),
(39, '', '', '100 ML', 'TONED MILK', '3.40', '2.00', '4.80', '52.00', '120.00', 'T', '2015-09-10 12:41:59', 1, '2015-10-06 10:02:22', '1'),
(40, '', '', '100 ML', '1.5% FAT MILK', '3.30', '1.50', '5.00', '46.70', '120.00', 'F', '2015-09-10 12:42:42', 1, '2015-10-06 10:02:37', '1'),
(41, '', '', '100 ML', '2% FAT MILK', '3.40', '2.00', '4.80', '52.00', '120.00', 'F', '2015-09-10 12:43:22', 1, '2015-10-06 10:02:42', '1'),
(42, '', '', '100 ML', '3% FAT MILK', '3.30', '3.30', '5.40', '62.00', '116.00', 'F', '2015-09-10 12:43:47', 1, '2015-10-06 10:02:46', '1'),
(43, '', '', '25 GMS(200 ML Milk)', 'PANEER, READYMADE', '3.50', '6.30', '0.50', '72.00', '120.00', 'T', '2015-09-10 12:45:25', 1, NULL, ''),
(44, '', '', '100ML', 'SOYA MILK', '3.20', '1.60', '2.00', '46.00', '0.00', 'T', '2015-09-10 12:46:26', 1, NULL, ''),
(45, '', '', '2 TSPN', 'FATS & EDIBLE OILS', '0.00', '11.00', '0.00', '100.00', '0.00', 'T', '2015-09-10 12:50:05', 1, NULL, ''),
(46, '', '', '10 GMS', 'CHOCOLATES', '1.60', '6.80', '10.90', '111.00', '0.00', 'T', '2015-09-10 12:51:07', 1, NULL, ''),
(47, '', '', '200 ML', 'JUICES', '2.00', '0.00', '26.00', '112.00', '0.00', 'T', '2015-09-10 12:51:31', 1, NULL, ''),
(48, '', '', '', 'NA', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '0000-00-00 00:00:00', 1, NULL, ''),
(49, '', '', '50 GM', 'SINGLE DISH', '5.00', '1.00', '38.00', '100.00', '10.00', 'T', '2015-10-01 12:18:34', 1, '2015-10-01 12:19:41', '1'),
(50, '', '', '1 cup', 'Chana', '3.50', '7.25', '22.00', '90.27', '58.00', 'F', '2015-10-30 04:29:43', 1, '2015-10-30 04:33:40', '1'),
(51, '', '', '1 cup', 'Chana', '3.50', '7.25', '2.00', '90.27', '58.00', 'F', '2015-10-30 04:34:31', 1, '2015-10-30 06:48:43', '1'),
(52, '', '', '0', 'CURDS/YOGHURT', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 11:44:08', 1, NULL, ''),
(53, '', '', '0', 'BEVERAGES', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 12:39:26', 1, NULL, ''),
(54, '', '', '0', 'ALCOHOL', '0.00', '0.00', '0.00', '0.00', '0.00', 'T', '2015-10-31 12:52:41', 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `food_preference_master`
--

CREATE TABLE IF NOT EXISTS `food_preference_master` (
  `id` int(11) NOT NULL,
  `ldesc` varchar(150) NOT NULL,
  `sdesc` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_preference_master`
--

INSERT INTO `food_preference_master` (`id`, `ldesc`, `sdesc`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'Vegetarian', 'Veg', 'T', '2015-09-08 00:00:00', '1', '0000-00-00 00:00:00', ''),
(2, 'Non-Vegetarian', 'Non Veg', 'T', '2015-09-08 00:00:00', '1', '2015-09-11 10:01:18', '1'),
(3, 'Eggiterian', 'Eggiterian', 'F', '2015-10-30 09:26:34', '1', '2015-10-30 09:27:04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `frame_size_master`
--

CREATE TABLE IF NOT EXISTS `frame_size_master` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `operator` text NOT NULL,
  `value1` decimal(10,2) NOT NULL,
  `value2` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frame_size_master`
--

INSERT INTO `frame_size_master` (`id`, `gender`, `operator`, `value1`, `value2`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'Male', 'Small', '0.00', '10.40', '', '2015-09-08 12:34:08', '1', '2015-09-11 10:00:46', '1'),
(2, 'Male', 'Medium', '10.40', '9.60', '', '2015-09-08 12:34:43', '1', '0000-00-00 00:00:00', ''),
(3, 'Male', 'Large', '9.60', '1.00', '', '2015-09-08 12:35:05', '1', '2015-09-08 12:38:44', '1'),
(4, 'Female', 'Small', '0.00', '10.40', '', '2015-09-08 12:42:41', '1', '2015-09-11 10:00:57', '1'),
(5, 'Female', 'Medium', '10.40', '9.60', '', '2015-09-08 13:23:05', '1', '0000-00-00 00:00:00', ''),
(6, 'Female', 'Large', '9.60', '0.00', '', '2015-09-08 13:23:26', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `height_weight_master`
--

CREATE TABLE IF NOT EXISTS `height_weight_master` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age_in_years` decimal(10,2) NOT NULL,
  `height_in_cms` decimal(8,2) NOT NULL,
  `weight_in_kgs` decimal(8,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(1) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `height_weight_master`
--

INSERT INTO `height_weight_master` (`id`, `gender`, `age_in_years`, `height_in_cms`, `weight_in_kgs`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'boy', '1.00', '76.10', '10.20', 'T', '2015-09-03 00:00:00', 1, '0000-00-00 00:00:00', 0),
(2, 'boy', '1.50', '83.40', '11.50', 'T', '2015-09-03 00:00:00', 1, '2015-09-04 15:01:51', 1),
(3, 'girl', '1.00', '74.30', '9.50', 'T', '2015-09-03 00:00:00', 1, '0000-00-00 00:00:00', 0),
(4, 'girl', '1.50', '80.90', '10.80', 'T', '2015-09-03 00:00:00', 1, '2015-09-04 15:14:26', 1),
(5, 'boy', '2.00', '85.60', '12.30', 'T', '2015-09-04 08:53:49', 1, '0000-00-00 00:00:00', 0),
(6, 'boy', '2.50', '90.40', '13.50', 'T', '2015-09-04 08:57:21', 1, '0000-00-00 00:00:00', 0),
(7, 'boy', '3.00', '99.10', '15.70', 'T', '2015-09-04 08:57:54', 1, '0000-00-00 00:00:00', 0),
(8, 'boy', '3.50', '99.10', '15.70', 'T', '2015-09-04 08:58:10', 1, '0000-00-00 00:00:00', 0),
(9, 'boy', '4.00', '102.90', '16.70', 'T', '2015-09-04 08:58:36', 1, '0000-00-00 00:00:00', 0),
(10, 'boy', '4.50', '106.60', '17.70', 'T', '2015-09-04 08:58:53', 1, '0000-00-00 00:00:00', 0),
(11, 'boy', '5.00', '109.90', '18.70', 'T', '2015-09-04 08:59:09', 1, '0000-00-00 00:00:00', 0),
(12, 'boy', '5.50', '113.10', '19.70', 'T', '2015-09-04 08:59:24', 1, '0000-00-00 00:00:00', 0),
(13, 'boy', '6.00', '116.10', '20.70', 'T', '2015-09-04 08:59:53', 1, '0000-00-00 00:00:00', 0),
(14, 'girl', '2.00', '84.50', '11.80', 'T', '2015-09-04 15:14:43', 1, '0000-00-00 00:00:00', 0),
(15, 'girl', '2.50', '89.50', '13.00', 'T', '2015-09-04 15:15:02', 1, '0000-00-00 00:00:00', 0),
(16, 'girl', '3.00', '93.90', '14.10', 'T', '2015-09-04 15:15:20', 1, '0000-00-00 00:00:00', 0),
(17, 'girl', '3.50', '97.90', '15.10', 'T', '2015-09-04 15:15:39', 1, '0000-00-00 00:00:00', 0),
(18, 'girl', '4.00', '101.60', '16.00', 'T', '2015-09-04 15:16:11', 1, '0000-00-00 00:00:00', 0),
(19, 'girl', '4.50', '105.10', '16.80', 'T', '2015-09-04 15:16:33', 1, '0000-00-00 00:00:00', 0),
(20, 'girl', '5.00', '108.40', '17.70', 'T', '2015-09-04 15:17:30', 1, '0000-00-00 00:00:00', 0),
(21, 'girl', '5.50', '111.60', '18.60', 'T', '2015-09-04 15:17:57', 1, '0000-00-00 00:00:00', 0),
(22, 'girl', '6.00', '114.60', '19.50', 'T', '2015-09-04 15:18:20', 1, '0000-00-00 00:00:00', 0),
(23, 'girl', '6.50', '117.60', '20.60', 'T', '2015-09-04 15:18:40', 1, '0000-00-00 00:00:00', 0),
(24, 'boy', '6.50', '119.00', '21.70', 'T', '2015-09-04 15:21:41', 1, '0000-00-00 00:00:00', 0),
(25, 'boy', '7.00', '121.70', '22.90', 'T', '2015-09-04 15:21:59', 1, '0000-00-00 00:00:00', 0),
(26, 'girl', '7.00', '120.60', '21.80', 'T', '2015-09-04 15:22:18', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `intake_master`
--

CREATE TABLE IF NOT EXISTS `intake_master` (
  `id` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age_from` int(6) NOT NULL,
  `age_to` int(6) NOT NULL,
  `height_in_cm` decimal(10,2) NOT NULL,
  `weight_in_kgs` decimal(10,2) NOT NULL,
  `kcal_daily` decimal(10,2) NOT NULL,
  `kcal_per_kg` decimal(10,2) NOT NULL,
  `kcal_per_cm` decimal(10,2) NOT NULL,
  `prot_gram_per_day` decimal(10,2) NOT NULL,
  `prot_gram_per_cm` decimal(10,2) NOT NULL,
  `prot_gram_per_kg` decimal(10,2) NOT NULL,
  `calc_mg_daily` decimal(10,2) NOT NULL,
  `status` char(1) NOT NULL,
  `created_Date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intake_master`
--

INSERT INTO `intake_master` (`id`, `gender`, `age_from`, `age_to`, `height_in_cm`, `weight_in_kgs`, `kcal_daily`, `kcal_per_kg`, `kcal_per_cm`, `prot_gram_per_day`, `prot_gram_per_cm`, `prot_gram_per_kg`, `calc_mg_daily`, `status`, `created_Date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'Children', 0, 1, '100.00', '2.00', '120.00', '1.00', '21.00', '2.50', '233.00', '12.00', '44.00', 'T', '2015-09-09 14:20:40', '1', '2015-09-09 14:24:50', '1'),
(2, 'Children', 1, 1, '199.00', '2.00', '120.00', '1.00', '21.00', '2.50', '233.00', '12.00', '44.00', 'T', '2015-09-09 14:25:19', '1', '2015-09-09 14:27:02', '1'),
(4, 'Children', 1, 3, '199.00', '50.00', '120.00', '300.00', '2300.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:33:20', '1', '0000-00-00 00:00:00', ''),
(5, 'Children', 3, 10, '199.00', '50.00', '120.00', '1.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:33:50', '1', '0000-00-00 00:00:00', ''),
(6, 'Children', 10, 15, '199.00', '50.00', '120.00', '300.00', '2300.00', '2.50', '233.00', '12.00', '44.00', 'F', '2015-09-09 14:34:24', '1', '2015-09-09 15:56:24', '1'),
(7, 'Female', 16, 20, '199.00', '60.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:36:08', '1', '0000-00-00 00:00:00', ''),
(8, 'Female', 20, 30, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:37:00', '1', '0000-00-00 00:00:00', ''),
(9, 'Female', 30, 45, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:37:34', '1', '0000-00-00 00:00:00', ''),
(10, 'Female', 45, 60, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:38:01', '1', '0000-00-00 00:00:00', ''),
(11, 'Male', 16, 20, '199.00', '60.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:36:08', '1', '0000-00-00 00:00:00', ''),
(12, 'Male', 20, 30, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:37:00', '1', '0000-00-00 00:00:00', ''),
(13, 'Male', 30, 45, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:37:34', '1', '0000-00-00 00:00:00', ''),
(14, 'Male', 45, 60, '199.00', '50.00', '120.00', '300.00', '21.00', '20.00', '10.00', '12.00', '44.00', 'T', '2015-09-09 14:38:01', '1', '2015-09-09 14:51:50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uom_master`
--

CREATE TABLE IF NOT EXISTS `uom_master` (
  `id` int(18) NOT NULL,
  `sdesc` varchar(50) NOT NULL,
  `ldesc` varchar(500) NOT NULL,
  `status` char(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uom_master`
--

INSERT INTO `uom_master` (`id`, `sdesc`, `ldesc`, `status`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(1, 'kgs', 'Kilograms', 'T', '2015-09-07 00:00:00', 1, '2015-09-09 09:13:22', '1'),
(2, 'cms', 'Centimetres', 'T', '2015-09-07 08:34:24', 1, '2015-09-07 08:52:24', '1'),
(3, 'inches', 'Inches', 'T', '2015-09-07 08:56:28', 1, '0000-00-00 00:00:00', ''),
(4, 'qty', 'Quantity', 'T', '2015-09-09 09:13:12', 1, '0000-00-00 00:00:00', ''),
(5, 'cup (200ml)', 'Cup (200ml)', 'T', '2015-09-09 09:14:00', 1, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `admin` enum('1','0') NOT NULL DEFAULT '0',
  `view` enum('1','0') NOT NULL DEFAULT '0',
  `dietplan` enum('1','0') NOT NULL DEFAULT '0',
  `isdeleted` enum('1','0') NOT NULL DEFAULT '0',
  `createddate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `view`, `dietplan`, `isdeleted`, `createddate`) VALUES
(1, 'admin', 'sandeep.gopalan@appetals.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1', '2015-08-24'),
(2, 'abhi office', 'abhinav.khare@appetals.com', '123456', '1', '1', '1', '1', '2015-08-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_weight_master`
--
ALTER TABLE `body_weight_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_exercise`
--
ALTER TABLE `diet_plan_exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_food_details`
--
ALTER TABLE `diet_plan_food_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_guidelines`
--
ALTER TABLE `diet_plan_guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_intake_chart`
--
ALTER TABLE `diet_plan_intake_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_main`
--
ALTER TABLE `diet_plan_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_meals`
--
ALTER TABLE `diet_plan_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_meal_options`
--
ALTER TABLE `diet_plan_meal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_meal_option_items`
--
ALTER TABLE `diet_plan_meal_option_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diet_plan_profile`
--
ALTER TABLE `diet_plan_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease_recommendation`
--
ALTER TABLE `disease_recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_master`
--
ALTER TABLE `exercise_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_item_master`
--
ALTER TABLE `food_item_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_master`
--
ALTER TABLE `food_master`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `food_master_041115`
--
ALTER TABLE `food_master_041115`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `food_preference_master`
--
ALTER TABLE `food_preference_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frame_size_master`
--
ALTER TABLE `frame_size_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `height_weight_master`
--
ALTER TABLE `height_weight_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intake_master`
--
ALTER TABLE `intake_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom_master`
--
ALTER TABLE `uom_master`
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
-- AUTO_INCREMENT for table `body_weight_master`
--
ALTER TABLE `body_weight_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `diet_plan_exercise`
--
ALTER TABLE `diet_plan_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diet_plan_food_details`
--
ALTER TABLE `diet_plan_food_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `diet_plan_guidelines`
--
ALTER TABLE `diet_plan_guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `diet_plan_intake_chart`
--
ALTER TABLE `diet_plan_intake_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diet_plan_main`
--
ALTER TABLE `diet_plan_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diet_plan_meals`
--
ALTER TABLE `diet_plan_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `diet_plan_meal_options`
--
ALTER TABLE `diet_plan_meal_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `diet_plan_meal_option_items`
--
ALTER TABLE `diet_plan_meal_option_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `diet_plan_profile`
--
ALTER TABLE `diet_plan_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `disease_recommendation`
--
ALTER TABLE `disease_recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `exercise_master`
--
ALTER TABLE `exercise_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `food_item_master`
--
ALTER TABLE `food_item_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `food_master`
--
ALTER TABLE `food_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `food_master_041115`
--
ALTER TABLE `food_master_041115`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `food_preference_master`
--
ALTER TABLE `food_preference_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `frame_size_master`
--
ALTER TABLE `frame_size_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `height_weight_master`
--
ALTER TABLE `height_weight_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `intake_master`
--
ALTER TABLE `intake_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `uom_master`
--
ALTER TABLE `uom_master`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
