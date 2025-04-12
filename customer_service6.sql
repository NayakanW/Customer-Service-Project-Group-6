-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 03:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customerservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `i_Id` int(11) NOT NULL,
  `iUser_id` int(11) NOT NULL,
  `iTicket_id` int(11) DEFAULT NULL,
  `szAction` varchar(255) NOT NULL,
  `szDescription` varchar(1000) DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `i_Id` int(11) NOT NULL,
  `iTicket_id` int(11) NOT NULL,
  `iUser_id` int(11) NOT NULL,
  `szFile_path` varchar(255) NOT NULL,
  `szFile_name` varchar(255) NOT NULL,
  `iFile_size` int(11) NOT NULL,
  `szMime_type` varchar(100) NOT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `i_Id` int(11) NOT NULL,
  `szName` varchar(255) NOT NULL,
  `szDescription` varchar(1000) DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `i_Id` int(11) NOT NULL,
  `iTicket_id` int(11) NOT NULL,
  `iUser_id` int(11) NOT NULL,
  `szContent` varchar(2000) NOT NULL,
  `szAttachment_url` varchar(255) DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `i_Id` int(11) NOT NULL,
  `szName` varchar(255) NOT NULL,
  `szDescription` varchar(1000) DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `i_Id` int(11) NOT NULL,
  `iUser_id` int(11) NOT NULL,
  `szTitle` varchar(255) NOT NULL,
  `szBody` varchar(2000) NOT NULL,
  `blnIs_read` tinyint(1) NOT NULL DEFAULT 0,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `i_Id` int(11) NOT NULL,
  `szKey` varchar(255) NOT NULL,
  `szValue` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sla_rules`
--

CREATE TABLE `sla_rules` (
  `i_Id` int(11) NOT NULL,
  `enmPriority` enum('low','medium','high','urgent') NOT NULL,
  `iResponse_time_minutes` int(11) NOT NULL,
  `iResolution_time_minutes` int(11) NOT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `i_Id` int(11) NOT NULL,
  `szName` varchar(255) NOT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `i_Id` int(11) NOT NULL,
  `szSubject` varchar(255) NOT NULL,
  `szDescription` varchar(1000) DEFAULT NULL,
  `iUser_id` int(11) NOT NULL,
  `iAssigned_to` int(11) DEFAULT NULL,
  `iDepartment_id` int(11) NOT NULL,
  `enmPriority` enum('low','medium','high','urgent') NOT NULL DEFAULT 'low',
  `enmStatus` enum('open','pending','resolved','closed') NOT NULL DEFAULT 'open',
  `iCategory_id` int(11) DEFAULT NULL,
  `dtmSla_due_at` datetime DEFAULT NULL,
  `dtmClosed_at` datetime DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_escalations`
--

CREATE TABLE `ticket_escalations` (
  `i_Id` int(11) NOT NULL,
  `iTicket_id` int(11) NOT NULL,
  `iFrom_department_id` int(11) NOT NULL,
  `iTo_department_id` int(11) NOT NULL,
  `iEscalated_by` int(11) NOT NULL,
  `szReason` varchar(1000) NOT NULL,
  `szCreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_histories`
--

CREATE TABLE `ticket_histories` (
  `i_Id` int(11) NOT NULL,
  `iTicket_id` int(11) NOT NULL,
  `szField_changed` varchar(255) NOT NULL,
  `szOld_value` varchar(1000) DEFAULT NULL,
  `szNew_value` varchar(1000) DEFAULT NULL,
  `iChanged_by` int(11) NOT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tags`
--

CREATE TABLE `ticket_tags` (
  `i_Id` int(11) NOT NULL,
  `iTicket_id` int(11) NOT NULL,
  `iTag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `i_Id` int(11) NOT NULL,
  `szName` varchar(255) NOT NULL,
  `szEmail` varchar(255) NOT NULL,
  `szPassword_hash` varchar(255) NOT NULL,
  `enmRole` enum('admin','agent','user') NOT NULL,
  `iDepartment_id` int(11) DEFAULT NULL,
  `enmStatus` enum('active','inactive') NOT NULL DEFAULT 'active',
  `dtmLast_login_at` datetime DEFAULT NULL,
  `dtmCreated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `dtmUpdated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iUser_id` (`iUser_id`),
  ADD KEY `iTicket_id` (`iTicket_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iTicket_id` (`iTicket_id`),
  ADD KEY `iUser_id` (`iUser_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`i_Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iTicket_id` (`iTicket_id`),
  ADD KEY `iUser_id` (`iUser_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`i_Id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iUser_id` (`iUser_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`i_Id`),
  ADD UNIQUE KEY `szKey` (`szKey`);

--
-- Indexes for table `sla_rules`
--
ALTER TABLE `sla_rules`
  ADD PRIMARY KEY (`i_Id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`i_Id`),
  ADD UNIQUE KEY `szName` (`szName`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iUser_id` (`iUser_id`),
  ADD KEY `iAssigned_to` (`iAssigned_to`),
  ADD KEY `iDepartment_id` (`iDepartment_id`),
  ADD KEY `iCategory_id` (`iCategory_id`);

--
-- Indexes for table `ticket_escalations`
--
ALTER TABLE `ticket_escalations`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iTicket_id` (`iTicket_id`),
  ADD KEY `iFrom_department_id` (`iFrom_department_id`),
  ADD KEY `iTo_department_id` (`iTo_department_id`),
  ADD KEY `iEscalated_by` (`iEscalated_by`);

--
-- Indexes for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iTicket_id` (`iTicket_id`),
  ADD KEY `iChanged_by` (`iChanged_by`);

--
-- Indexes for table `ticket_tags`
--
ALTER TABLE `ticket_tags`
  ADD PRIMARY KEY (`i_Id`),
  ADD KEY `iTicket_id` (`iTicket_id`),
  ADD KEY `iTag_id` (`iTag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`i_Id`),
  ADD UNIQUE KEY `szEmail` (`szEmail`),
  ADD KEY `iDepartment_id` (`iDepartment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sla_rules`
--
ALTER TABLE `sla_rules`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_escalations`
--
ALTER TABLE `ticket_escalations`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_tags`
--
ALTER TABLE `ticket_tags`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `i_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`iUser_id`) REFERENCES `users` (`i_Id`),
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`);

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`),
  ADD CONSTRAINT `attachments_ibfk_2` FOREIGN KEY (`iUser_id`) REFERENCES `users` (`i_Id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`iUser_id`) REFERENCES `users` (`i_Id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`iUser_id`) REFERENCES `users` (`i_Id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`iUser_id`) REFERENCES `users` (`i_Id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`iAssigned_to`) REFERENCES `users` (`i_Id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`iDepartment_id`) REFERENCES `departments` (`i_Id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`iCategory_id`) REFERENCES `categories` (`i_Id`);

--
-- Constraints for table `ticket_escalations`
--
ALTER TABLE `ticket_escalations`
  ADD CONSTRAINT `ticket_escalations_ibfk_1` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`),
  ADD CONSTRAINT `ticket_escalations_ibfk_2` FOREIGN KEY (`iFrom_department_id`) REFERENCES `departments` (`i_Id`),
  ADD CONSTRAINT `ticket_escalations_ibfk_3` FOREIGN KEY (`iTo_department_id`) REFERENCES `departments` (`i_Id`),
  ADD CONSTRAINT `ticket_escalations_ibfk_4` FOREIGN KEY (`iEscalated_by`) REFERENCES `users` (`i_Id`);

--
-- Constraints for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  ADD CONSTRAINT `ticket_histories_ibfk_1` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`),
  ADD CONSTRAINT `ticket_histories_ibfk_2` FOREIGN KEY (`iChanged_by`) REFERENCES `users` (`i_Id`);

--
-- Constraints for table `ticket_tags`
--
ALTER TABLE `ticket_tags`
  ADD CONSTRAINT `ticket_tags_ibfk_1` FOREIGN KEY (`iTicket_id`) REFERENCES `tickets` (`i_Id`),
  ADD CONSTRAINT `ticket_tags_ibfk_2` FOREIGN KEY (`iTag_id`) REFERENCES `tags` (`i_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`iDepartment_id`) REFERENCES `departments` (`i_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
