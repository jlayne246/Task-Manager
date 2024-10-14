-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2024 at 12:58 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `task_id` int NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `User_Comment_ID` (`user_id`),
  KEY `Task_Comment_ID` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `task_id`, `comment`) VALUES
(1, 15, 1, 'test'),
(2, 15, 1, 'test 2'),
(3, 15, 1, 'test 3'),
(4, 15, 3, 'New Comment'),
(5, 15, 2, 'Testing Testing Testing'),
(6, 15, 1, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL,
  `role_ref_id` int NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `role_ref_id`) VALUES
(1, 'admin', 1),
(2, 'manager', 2),
(3, 'employee', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','In Progress','Completed') NOT NULL,
  `assigned_to` int NOT NULL,
  `created_by` int NOT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `assigned_to` (`assigned_to`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `description`, `status`, `assigned_to`, `created_by`, `due_date`) VALUES
(1, 'Test', 'This is a test', 'In Progress', 15, 13, '2024-10-14'),
(2, 'Test Task 2', 'This is testing the DB connection. Edit 3', 'Completed', 15, 13, '2024-10-13'),
(3, 'Task 3', 'Testing....', 'In Progress', 15, 13, '2024-10-31'),
(4, 'Testing for No Error', 'Testing for no error', 'Pending', 18, 13, '2024-10-27'),
(5, 'New Task', 'Test', 'Pending', 18, 13, '2024-10-20'),
(6, 'Guinea Pig', 'Added 2', 'Completed', 18, 13, '2024-10-31'),
(7, 'Mate', '', 'Pending', 15, 13, '2024-10-20'),
(8, 'My First', '', 'Pending', 15, 19, '2024-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE IF NOT EXISTS `userrole` (
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `RoleID` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`user_id`, `role_id`) VALUES
(1, 1),
(20, 1),
(13, 2),
(19, 2),
(21, 2),
(15, 3),
(18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(75) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, '123', 'abc@gmail.com', '$2y$10$Elo4b/dxY/sNCOJmU2Ifqe.jHjDA1.3.PmacwoV/mtVjsa7W1J5OW'),
(13, 'aaaaa', 'aaaaa@gmail.com', '$2y$10$gZLV7NnGVoap14tHCqyGQeC/KFZuMXLl/Co2xd426iO4C3l1fEu.2'),
(15, 'bbc', 'bbc@gmail.com', '$2y$10$H9mKyeNNtSCq8p9rqc9OFeVjXWx2/XQNeXATc5kzeHg1KLjGR0ori'),
(18, '123', 'abcd@gmail.com', '$2y$10$g3ako0VfGi9NQ0P4G9/Tb.jwUjoU1vaJzxHMYxisZeBRMSUqTDUwW'),
(19, 'abcde', 'abcde@gmail.com', '$2y$10$Lwh17QTEt7RlY55fGLQePexUMVwybc5TFKOV02cO2k83X2.LRiuTu'),
(20, 'abcdef', 'abcdef@gmail.com', '$2y$10$cCUNwYfv4sH1C4g/VcMc1uzU6PPoH/hotEwDWwJtM7w1R2mvNA.Qu'),
(21, 'test', 'test@hotmail.com', '$2y$10$v/V46y52ECq.sklTw48kxeWSsBAb7OQZJZYPaSUIXQs8RzSDstU7K');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Task_Comment_ID` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `User_Comment_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `RoleID` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `UserID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
