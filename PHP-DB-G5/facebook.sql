-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 02:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `description`, `user_id`, `post_id`) VALUES
(113, 'BYEasdasdsadsa', NULL, 176),
(114, 'hi junior', NULL, 176),
(115, 'hi junior', NULL, 177),
(117, 'BYE hi', NULL, 175),
(118, 'hi juniordsadasdsadsadas', NULL, 173),
(122, 'hi junior KILO', NULL, 175),
(123, 'BYE', NULL, 173),
(124, 'hi junior', NULL, 178);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(175, 13),
(175, 13),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(176, 16),
(177, 17),
(177, 17),
(177, 17),
(177, 17),
(177, 17),
(177, 17),
(177, 17),
(177, 17),
(173, 12),
(173, 12),
(175, 13),
(175, 13),
(178, 13),
(178, 13),
(173, 12),
(173, 12),
(173, 12),
(173, 12),
(173, 12),
(173, 12),
(173, 12);

-- --------------------------------------------------------

--
-- Stand-in structure for view `postcomment`
-- (See below for the actual view)
--
CREATE TABLE `postcomment` (
`post_id` int(11)
,`Number_of_comment` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `description`, `image`, `user_id`, `date`) VALUES
(171, NULL, 'hello world', 'upload2022032149213.jpg', 14, '2022-03-21'),
(173, NULL, 'hello hak', 'upload2022032385794.JPG', 12, '2022-03-21'),
(175, NULL, 'hello world hi', 'upload2022032499587.JPG', 13, '2022-03-21'),
(176, NULL, 'hi', 'upload2022032273468.', 16, '2022-03-22'),
(177, NULL, 'hello world', 'upload2022032361994.jpg', 17, '2022-03-23'),
(178, NULL, 'hello world', 'upload2022032425137.jpg', 13, '2022-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(500) DEFAULT 'default_profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `gender`, `email`, `password`, `image`) VALUES
(12, 'kim-hak', 'M', 'kimhak6747@gmail.com', '12345', 'image2022032430604.jpg'),
(13, 'vibol', 'M', 'vibol@gmail.com', '112233', 'image2022032461465.png'),
(14, 'hyacinthe', 'F', 'hak.kim@student.passerellesnumeriques.org', 'sss', 'default_profile.png'),
(16, 'sarath', 'M', 'sarath@gmail.com', '1111', 'default_profile.png'),
(17, 'dara', 'M', 'dara@gmail.com', '11112222', 'image2022032387836.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_posts`
-- (See below for the actual view)
--
CREATE TABLE `user_posts` (
`post_id` int(11)
,`description` varchar(500)
,`password` varchar(50)
,`image` varchar(500)
,`user_id` int(11)
,`username` varchar(50)
,`email` varchar(100)
,`date` date
,`userImage` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `postcomment`
--
DROP TABLE IF EXISTS `postcomment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `postcomment`  AS SELECT `posts`.`post_id` AS `post_id`, count(`comments`.`comment_id`) AS `Number_of_comment` FROM (`posts` left join `comments` on(`posts`.`post_id` = `comments`.`post_id`)) GROUP BY `posts`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `user_posts`
--
DROP TABLE IF EXISTS `user_posts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_posts`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`description` AS `description`, `users`.`password` AS `password`, `posts`.`image` AS `image`, `users`.`user_id` AS `user_id`, `users`.`username` AS `username`, `users`.`email` AS `email`, `posts`.`date` AS `date`, `users`.`image` AS `userImage` FROM (`posts` join `users` on(`posts`.`user_id` = `users`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
