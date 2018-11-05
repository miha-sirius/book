-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2018 at 07:11 PM
-- Server version: 10.1.36-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skaistu3_mybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `ip` text NOT NULL,
  `browser` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `www` text NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `date`, `ip`, `browser`, `username`, `email`, `www`, `text`) VALUES
(28, '2018-11-05 18:00:20', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'User', 'ert@dfsgfdg.lv', '', 'sdfdsafsda'),
(27, '2018-11-05 18:00:02', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Vika', 'asd@asd.lv', 'http://www.google.lv', 'asdasdas'),
(26, '2018-11-05 17:58:39', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Olga', 'k@inbox.lv', '', '123xcvcxv dg dfg '),
(25, '2018-11-05 17:58:16', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Alex', 'al@inbox.lv', 'http://www.google.lv', 'asdasdsadas asd asd as '),
(24, '2018-11-05 17:58:02', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Maria', 'serg@one.lv', 'http://www.google.lv', 'wer wer we rew r'),
(23, '2018-11-05 17:57:36', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Vlad', 'asd@asd.lv', 'http://www.google.lv', 'TEst TEst TEst TEst '),
(22, '2018-11-05 17:57:21', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Sergejs', 'serg@one.lv', 'http://www.google.lv', 'sdfdsfds sd'),
(21, '2018-11-05 17:57:03', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Katrina', 'k@inbox.lv', '', 'jikhkhkj'),
(20, '2018-11-05 17:55:14', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Mike', 'asd@asd.lv', 'http://www.google.lv', 'asdsadsad'),
(19, '2018-11-05 17:54:35', '212.142.99.29', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:63.0) Gecko/20100101 Firefox/63.0', 'Mike', 'test@test.com', 'http://www.google.lv', ' <i>asdasdasd</i>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
