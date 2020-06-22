-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 22, 2020 at 08:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secure_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `sa_categories`
--

CREATE TABLE `sa_categories` (
  `catID` int(11) UNSIGNED NOT NULL,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sa_categories`
--

INSERT INTO `sa_categories` (`catID`, `catTitle`, `catSlug`) VALUES
(9, 'Kigobe', 'kigobe'),
(10, 'Kibenga', 'kibenga'),
(11, 'Kinanira', 'kinanira'),
(12, 'Mutanga-Nord', 'mutanga-nord'),
(13, 'Mutanga-Sud', 'mutanga-sud');

-- --------------------------------------------------------

--
-- Table structure for table `sa_posts`
--

CREATE TABLE `sa_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_posts`
--

INSERT INTO `sa_posts` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postDate`, `image`) VALUES
(22, 'maison a loue', 'maison-a-loue', '<p><strong>Maison a loue quartier kigobe</strong></p>', '<p>description&nbsp;</p>\r\n<p>68724498</p>\r\n<p>irakoze@gmail.com</p>', '2020-06-22 08:07:15', 'HOUSE-RENT-BURUNDI-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sa_post_categories`
--

CREATE TABLE `sa_post_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sa_post_categories`
--

INSERT INTO `sa_post_categories` (`id`, `postID`, `catID`) VALUES
(49, 22, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sa_users`
--

CREATE TABLE `sa_users` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_users`
--

INSERT INTO `sa_users` (`memberID`, `username`, `password`, `email`) VALUES
(3, 'irakoze@gmail.com', '$2y$10$8vXel9SFG.9zjxrUjZE7wuOvymPjv5fWCaac40FQ4f0hPatb.q.q2', 'irakoze@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sa_categories`
--
ALTER TABLE `sa_categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `sa_posts`
--
ALTER TABLE `sa_posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `sa_post_categories`
--
ALTER TABLE `sa_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sa_users`
--
ALTER TABLE `sa_users`
  ADD PRIMARY KEY (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sa_categories`
--
ALTER TABLE `sa_categories`
  MODIFY `catID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sa_posts`
--
ALTER TABLE `sa_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sa_post_categories`
--
ALTER TABLE `sa_post_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sa_users`
--
ALTER TABLE `sa_users`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
