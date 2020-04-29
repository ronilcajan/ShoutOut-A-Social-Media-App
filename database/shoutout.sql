-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2020 at 11:20 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoutout`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_type` varchar(10) DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `email`, `password`, `account_type`) VALUES
('bugs', 'bug@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('Diego', 'diego@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('james', 'bond@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('jay', 'jay123@gmail.com', 'bbba7df1cf0e2eeca9bfb3df8640f2b7150562e9', 'guest'),
('jay1', 'cajanr02@gmail.com', '9c9a01a13290de75fbc3f2c83a94e4f60534272e', 'guest'),
('juan', 'juan@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('lebron', 'lebron@gmail.com', 'a780806dcc29a0cff2d4058dd58f30aa1d44dda9', 'guest'),
('leo', 'leo@gmail.com', '408789e5caf51767cb73e0db150b5f851af63029', 'guest'),
('myk', 'myk@gmai.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'guest'),
('projects', 'roncajan@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('ron', 'ron@gmail.com', '6eda99ea5225fc8f766329564ce1873ea46f51a3', 'guest'),
('ronil', 'roncajan@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
('rupert', 'rupert@gmail.com', 'edfa156ad62f684ce3ce5eaf3428ba388e7332e7', 'guest'),
('shoutout', 'shout@gmail.com', '8f87524e0fd89643c348f5aef9746fd436f0c647', 'guest'),
('test', 'test@gmail.com', '9bc34549d565d9505b287de0cd20ac77be1d3f2c', 'guest'),
('user', 'user@gmail.com', '2ee1003ffbff51e8c75081dff000f6dd7be8a6e4', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `date_commented` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `username`, `comments`, `date_commented`) VALUES
(1, 8, 'jay', 'Let\'s light your darkness place', '2019-11-26 09:14:49'),
(22, 13, 'jay1', 'hahahah', '2019-11-28 14:37:22'),
(23, 16, 'ron', 'Nice One', '2019-12-04 05:35:07'),
(24, 18, 'ron', 'gwapooooooo', '2019-12-04 05:59:33'),
(25, 16, 'myk', 'Nice Two', '2019-12-04 06:35:26'),
(26, 22, 'rupert', 'fsdf', '2019-12-08 09:04:38'),
(27, 20, 'rupert', 'halooooo', '2019-12-08 10:11:29'),
(28, 20, 'rupert', 'haloooo', '2019-12-08 10:11:40'),
(29, 20, 'rupert', 'halooo', '2019-12-08 10:11:49'),
(30, 22, 'rupert', 'hahahah', '2019-12-08 10:21:09'),
(31, 22, 'ron', 'hahahaha', '2019-12-08 10:24:11'),
(32, 24, 'projects', 'Good Job doctors', '2020-01-05 11:17:17'),
(33, 24, 'projects', 'Thanks', '2020-01-05 11:17:43'),
(34, 26, 'test', 'Great job doctors', '2020-01-05 12:10:45'),
(35, 26, 'test', 'You are great', '2020-01-05 12:11:04'),
(36, 21, 'test', 'You awesome', '2020-01-05 12:12:00'),
(37, 28, 'user', 'This is a test comment..', '2020-01-05 12:29:17'),
(38, 28, 'user', 'My 2nd test comments', '2020-01-05 12:29:47'),
(39, 9, 'user', 'Nice post', '2020-01-05 12:31:08'),
(40, 9, 'user', 'My second comment for you', '2020-01-05 12:31:42'),
(41, 22, 'user', 'Hahaha what a nice name', '2020-01-05 12:32:19'),
(42, 21, 'user', 'Super awesome', '2020-01-05 12:32:57'),
(43, 30, 'lebron', 'Nice umbrella ...', '2020-01-05 12:51:30'),
(44, 30, 'lebron', 'Nice color', '2020-01-05 12:52:03'),
(45, 21, 'lebron', 'This is  nice code', '2020-01-05 12:52:59'),
(46, 33, 'leo', 'This is great umbrella', '2020-01-05 13:30:59'),
(47, 33, 'leo', 'Greater than before', '2020-01-05 13:31:35'),
(48, 21, 'leo', 'Great One', '2020-01-05 13:32:13'),
(49, 22, 'leo', 'Great name', '2020-01-05 13:32:50'),
(50, 26, 'leo', 'nice post doctor', '2020-01-05 13:33:48'),
(51, 8, 'leo', 'We have the same profile', '2020-01-05 13:34:52'),
(52, 36, 'shoutout', 'good coding', '2020-01-05 16:01:02'),
(53, 36, 'shoutout', 'Wow Great one', '2020-01-05 16:01:17'),
(54, 21, 'shoutout', 'Nice One', '2020-01-05 16:01:31'),
(55, 7, 'shoutout', 'nice view', '2020-01-05 16:02:17'),
(56, 40, 'bugs', 'Nice coin', '2020-01-05 16:21:10'),
(57, 21, 'bugs', 'Nice', '2020-01-05 16:22:35'),
(58, 44, 'juan', 'test comments', '2020-01-06 01:53:24'),
(59, 44, 'juan', '2nd test ', '2020-01-06 01:53:40'),
(60, 22, 'juan', 'Nice one', '2020-01-06 01:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `username`) VALUES
(22, 'rupert'),
(22, 'ron'),
(21, 'ron'),
(21, 'james'),
(19, 'james'),
(24, 'projects'),
(25, 'test'),
(26, 'test'),
(26, 'ron'),
(28, 'user'),
(21, 'user'),
(29, 'lebron'),
(30, 'lebron'),
(33, 'leo'),
(36, 'shoutout'),
(40, 'bugs'),
(44, 'juan'),
(21, 'juan'),
(7, 'juan');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `post` text NOT NULL,
  `post_image` varchar(40) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `post`, `post_image`, `date`) VALUES
(6, 'Diego', 'This is my first shout', '', '2019-11-26 11:01:37'),
(7, 'Diego', 'My 2nd post with image', '382170014db29a56d3c275cb0a79ee06.jpeg', '2019-11-26 11:01:58'),
(8, 'jay', '', '86144967a8c6c725c5385da9d6da7c2a.jpeg', '2019-11-26 17:14:02'),
(9, 'jay', 'love me like i do', '', '2019-11-26 17:15:33'),
(13, 'jay1', 'Hello ', '', '2019-11-28 22:37:06'),
(14, 'ron', 'This is edited post. 1', '', '2019-11-29 08:18:32'),
(15, 'ron', 'This my post. ', '0893da3555e98f42c300c2796c0837fe.jpeg', '2019-11-29 08:29:15'),
(16, 'ron', 'Halooo Cassy and Shaira', '', '2019-12-04 13:33:34'),
(17, 'ron', 'I like you', '', '2019-12-04 13:55:21'),
(18, 'ron', 'babooooy koo', '', '2019-12-04 13:58:56'),
(19, 'ron', 'baluyos gwapo\r\n', '', '2019-12-04 14:23:12'),
(20, 'myk', 'This is my first post.', '', '2019-12-04 14:31:17'),
(21, 'myk', 'My pic', '2788b4e96235c2976c4a4663b2dea93f.png', '2019-12-04 14:31:42'),
(22, 'rupert', 'My name is rupert', '', '2019-12-08 15:45:55'),
(23, 'projects', 'This is my post', NULL, '2020-01-05 19:16:23'),
(24, 'projects', 'This is my post with picture', 'caf91102250226da0fc7e0874a6c962f.jpg', '2020-01-05 19:16:48'),
(25, 'test', 'This is my first shout...', NULL, '2020-01-05 20:09:53'),
(26, 'test', 'This is a test with picture', 'a960d2998d976f3cf982a0fb28f3547d.jpeg', '2020-01-05 20:10:21'),
(27, 'user', 'My test shout', NULL, '2020-01-05 20:28:18'),
(28, 'user', 'My 2nd test with image', 'f3ca6d0574d9ffbc0edcd4b66ddc5829.jpeg', '2020-01-05 20:28:46'),
(29, 'lebron', 'My post test', NULL, '2020-01-05 20:49:47'),
(30, 'lebron', 'My test with image', '6644f72d19667bc0f644ee81d4a04282.jpeg', '2020-01-05 20:50:57'),
(31, 'lebron', 'Haloooo Viewers Please put a like and subscribe me. Thanks ', NULL, '2020-01-05 20:55:34'),
(32, 'leo', 'This is a test post', NULL, '2020-01-05 21:29:50'),
(33, 'leo', 'This is a 2nd test with image', 'bac963e0d7977431d50aa7c17e97b4fb.jpeg', '2020-01-05 21:30:17'),
(34, 'leo', 'Please like and subscribe if you like this video. If you thinks this helpful please do a comment below thanks :)', NULL, '2020-01-05 21:37:48'),
(35, 'shoutout', 'My shout', NULL, '2020-01-06 00:00:20'),
(36, 'shoutout', 'My 2nd shout with image', 'e97278c1c12037f98e020cb32d0baf3d.png', '2020-01-06 00:00:43'),
(37, 'shoutout', 'This is my social media website', NULL, '2020-01-06 00:04:49'),
(38, 'shoutout', 'If you like kindly subscribe and share the video for more videos like this. Thank you ', NULL, '2020-01-06 00:05:37'),
(39, 'bugs', 'Test 1', NULL, '2020-01-06 00:20:24'),
(40, 'bugs', 'test two', 'a9ad5af03556d7cc3a9a4ba39f4b3e08.png', '2020-01-06 00:20:49'),
(41, 'bugs', 'Thank You for watching!', NULL, '2020-01-06 00:23:13'),
(42, 'bugs', 'Hope you like and subscribe. Kindly hit the like button also. Thanks', NULL, '2020-01-06 00:23:54'),
(43, 'juan', 'This is a test post', NULL, '2020-01-06 09:52:43'),
(44, 'juan', 'Post with image', '143d214db59ae62bce2547f5a560c62e.jpeg', '2020-01-06 09:53:05'),
(45, 'juan', 'This is a social media platform. Hope you like it.', NULL, '2020-01-06 09:57:24'),
(46, 'juan', 'Please like and subscribe to my channel. Thank you!', NULL, '2020-01-06 09:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `username` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `cover` varchar(100) NOT NULL DEFAULT 'cover.jpeg',
  `name` varchar(20) NOT NULL,
  `bio` text NOT NULL,
  `Address` text NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`username`, `image`, `cover`, `name`, `bio`, `Address`, `birthdate`) VALUES
('bugs', 'c3fd24d728b5f229ab07b8e834030d01.jpeg', '7ac559a5eec2a724683bf6a943d16334.jpeg', 'Bugs Gamer', 'This is a test bio', 'Philippines', '2020-01-01'),
('Diego', '096212cf56ca33b022646cd4b4625a08.jpg', 'a902a9ddad30b4514bac8fc7cdf35ac3.jpg', 'Diego Ty', 'District 1 Congressman', 'Plaridel', '2019-11-03'),
('james', 'default.png', 'cover.jpeg', '', '', '', '0000-00-00'),
('jay', 'b1090bbdfbbe941de08ead5b01d6f5af.jpeg', '04b27a0be53fb65caca9ad584464e77d.jpeg', 'Jay Mark Anthony Lem', 'Gwapo', 'Oroquieta City', '1998-01-05'),
('jay1', 'default.png', 'cover.jpeg', 'Jay Sabado', 'Im good every saturday', 'United States', '2019-11-06'),
('juan', '72e9342568bec5afaef28bf7024cac65.jpeg', 'bf7e26d2ec19b0e3daa0b27ebf07ac1c.jpg', 'Juan de la Cruz', 'This is my bio.', 'Philippines', '2020-01-01'),
('lebron', '390eb4d0d732d2ac1dab125dc4c88449.jpeg', '29f453142b3e9c658fb75b7fe67ff6fb.jpeg', 'Lebron James', 'NBA Players', 'United States', '2020-01-01'),
('leo', 'fe2de2b3e6c0c31bb46a4ad32d8b2f3f.jpeg', '2ae9c27b8f73f8590745a3b5cf895627.jpeg', 'Leo Rodriguez', 'This is a test bio', 'Philippines', '2020-01-01'),
('myk', 'efa91c8c20612e067645cb296c5e5eef.jpeg', 'b74d851fe8ff309243860bd0ff250915.jpeg', 'Mykel James', 'Basketball Player', 'United States', '2019-12-23'),
('projects', '15f74119d580e7a4936aa1dd4a4e15db.jpeg', '2e7c5aa78adaa495d12f02da854f8796.jpg', 'Ron Projects', 'I\'m a coder.', 'Philippines', '2020-01-01'),
('ron', 'a16944781a30643ecc9921108d7a665a.jpeg', '776dc5378c65a29a4488cbb47db07710.jpg', 'Ronil Cajan', 'IT Student', 'Looc Proper, Plaridel, Mis. Occ', '1999-12-21'),
('rupert', 'dccb5da71ae7e6dd27fec6fd2b2e53bd.png', '67684a75e2b8da5af59906af63af50f5.jpg', 'Rupert Aya-ay', 'Bio Flu', 'Current Location', '2019-12-02'),
('shoutout', '701084e3c919242591defb202f12ab9b.jpeg', '73e4c4f9719e1aca423033b6b5a35ec9.jpeg', 'Shout Out', 'This is a Test bio', 'Philippines', '2020-01-01'),
('test', 'b8971e3164d88aabf6631050aa9a24e2.jpeg', '7a5ab89d98a400c534a98ca1a240ee90.jpg', 'Test User', 'This is a test for the platform.', 'Philippines', '2015-02-14'),
('user', '8d7961fdf0f3d6d583b9e6afd3e02e24.jpeg', '323ee5706d532cc1166af7e5980633ab.jpg', 'User Test', 'This is my test user profile.', 'Philippines', '2020-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`post_id`),
  ADD KEY `comments_ibfk_2` (`username`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `likes_ibfk_2` (`username`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`username`) REFERENCES `profile` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`username`) REFERENCES `profile` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
