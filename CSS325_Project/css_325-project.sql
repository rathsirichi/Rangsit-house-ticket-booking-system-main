-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 01:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `css_325-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(6) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` varchar(200) NOT NULL,
  `genre` varchar(120) NOT NULL,
  `duration` time NOT NULL,
  `rate` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description`, `genre`, `duration`, `rate`) VALUES
(1, 'Arrival', 'A linguist works with the military to communicate with alien lifeforms after twelve mysterious spacecraft appear around the world.', 'Drama,Mystery,Sci-Fi', '01:56:00', 'G'),
(2, 'Avengers Infinity War', 'The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', 'Action,Adventure,Sci-Fi', '02:29:00', 'G'),
(3, 'Deadpool', 'A wisecracking mercenary gets experimented on and becomes immortal but ugly, and sets out to track down the man who ruined his looks.', 'Action,Adventure,Comedy', '01:48:00', '15'),
(4, 'Ready Player One', 'When the creator of a virtual reality called the OASIS dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg, which will give the finder his fortune and control of his world.', 'Action,Action,Sci-Fi', '02:20:00', 'G'),
(5, 'Spider-Man No Way Home', 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to', 'Action,Adventure,Fantasy', '02:28:00', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `show_id` int(6) NOT NULL,
  `showdate` date NOT NULL,
  `Start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `movie_id` int(6) NOT NULL,
  `avaliable_seat` int(50) NOT NULL DEFAULT 50,
  `show_status` varchar(30) NOT NULL DEFAULT 'coming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`show_id`, `showdate`, `Start_time`, `end_time`, `movie_id`, `avaliable_seat`, `show_status`) VALUES
(1, '2022-11-22', '10:30:01', '12:20:00', 1, 47, 'ended'),
(2, '2022-11-22', '15:30:02', '17:20:00', 1, 0, 'ended'),
(3, '2022-11-22', '18:30:03', '20:20:00', 1, 47, 'ended'),
(4, '2022-11-23', '10:30:04', '12:20:00', 1, 47, 'ended'),
(5, '2022-11-23', '10:30:05', '12:20:00', 2, 47, 'ended'),
(6, '2022-11-24', '18:30:03', '20:20:00', 1, 47, 'ended'),
(7, '2022-11-24', '10:30:01', '12:20:00', 1, 47, 'ended'),
(8, '2022-11-24', '15:30:02', '17:20:00', 1, 47, 'ended'),
(9, '2022-11-27', '10:30:00', '13:10:00', 2, 47, 'coming');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(10) NOT NULL,
  `show_id` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pay'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `show_id`, `user_id`, `status`) VALUES
(2, 1, 1, 'ended'),
(3, 1, 1, 'ended'),
(19, 1, 1, 'ended'),
(22, 9, 1, 'Show Ticket'),
(23, 9, 1, 'Pay');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(120) NOT NULL,
  `member_plan` varchar(30) NOT NULL DEFAULT 'Basic'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `member_plan`) VALUES
(1, 'testuser0@email.com', '12345', 'firstname lastname', 'Basic'),
(2, 'testuser1@email.com', '1111111', 'user1name user1lname', 'Basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `show_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `show_id` FOREIGN KEY (`show_id`) REFERENCES `showtime` (`show_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
