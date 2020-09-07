-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2017 at 05:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_secret` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_secret`, `created_on`, `last_login`) VALUES
(1, 'benjamin', '1f32aa4c9a1d2ea010adcf2348166a04', 'd9b1d7db4cd6e70935368a1efb10e377', '2017-06-02 16:04:50', '2017-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state_of_origin` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `passport` text NOT NULL,
  `vote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `party_id`, `first_name`, `last_name`, `position`, `email`, `state_of_origin`, `age`, `passport`, `vote_count`) VALUES
(1, 1, 'benjamin', 'Nwakonobi', 'presidential', 'ogbuechiyoung@gmail.com', 'Delta', 87, 'wox_striped_800.png', 1),
(2, 2, 'John', 'Emmanuel', 'presidential', 'benjaminchukwudi0@gmail.com', 'Jigawa', 40, 'children-887393_1280.jpg', 1),
(3, 4, 'Ebere', 'Anisiobi', 'presidential', 'anisiobi@gmail.com', 'Delta', 67, 'social_share2.jpg', 0),
(4, 5, 'Ifeanyi', 'okowa', 'governorship', 'ifeanyi@gmail.com', 'Delta', 45, 'download (2).jpg', 0),
(5, 4, 'Andy', 'Uba', 'senatorial', 'uba@gmail.com', 'Delta', 40, 'download (3).jpg', 0),
(6, 4, 'Peter', 'Obi', 'senatorial', 'obi@gmail.com', 'Anambra', 43, 'download (4).jpg', 0),
(7, 1, 'benjamin', 'chuks', 'governorship', 'benjaminchuks0@gmail.com', 'Anambra', 45, 'download (4).jpg', 0),
(8, 5, 'Peter', 'Obi', 'presidential', 'benjaminchuks0@gmail.com4', 'Anambra', 33, 'download (4).jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `election_date`
--

CREATE TABLE `election_date` (
  `id` int(11) NOT NULL,
  `election_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election_date`
--

INSERT INTO `election_date` (`id`, `election_type`, `date`, `start_time`, `end_time`) VALUES
(1, 'presidential', '2017-05-31', '01:00:00', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `username`, `password`, `prof_id`, `created_on`, `last_login`) VALUES
(1, 'benjamin', 'ec6a6536ca304edf844d1d248a4f08dc', 36030, '2017-06-02 13:40:04', '0000-00-00 00:00:00'),
(2, 'benx', 'ec6a6536ca304edf844d1d248a4f08dc', 13603, '2017-06-02 11:44:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `party_abbr` varchar(100) NOT NULL,
  `party_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party_name`, `party_abbr`, `party_logo`) VALUES
(1, 'People Democratic Party', 'PDP', 'pdp.png'),
(2, 'Action Congress', 'AC', 'ac.png'),
(4, 'Democratic Peoples Parties', 'DPP', 'dpp.png'),
(5, 'people for democratic change', 'PDC', 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `candidates_id` int(11) NOT NULL,
  `position` varchar(30) NOT NULL,
  `voters_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `candidates_id`, `position`, `voters_id`) VALUES
(1, 1, 'presidential', '38569846'),
(2, 2, 'presidential', '75801077');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birth_day` int(11) NOT NULL,
  `birth_month` int(11) NOT NULL,
  `birth_year` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `state` varchar(100) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `maiden_name` varchar(50) NOT NULL,
  `LGA` varchar(170) NOT NULL,
  `residential_address` text NOT NULL,
  `disability` varchar(255) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vote_president` int(1) NOT NULL,
  `vote_governor` int(1) NOT NULL,
  `vote_senatorial` int(1) NOT NULL,
  `voters_id` varchar(100) NOT NULL,
  `passport` text NOT NULL,
  `biometrics` text NOT NULL,
  `secret_qus` varchar(255) NOT NULL,
  `secret_ans` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `username`, `password`, `first_name`, `last_name`, `sex`, `birth_day`, `birth_month`, `birth_year`, `city`, `phone`, `state`, `marital_status`, `maiden_name`, `LGA`, `residential_address`, `disability`, `occupation`, `religion`, `email`, `vote_president`, `vote_governor`, `vote_senatorial`, `voters_id`, `passport`, `biometrics`, `secret_qus`, `secret_ans`, `created_on`) VALUES
(3, 'ogbuefi', 'd9b1d7db4cd6e70935368a1efb10e377', 'benjamin', 'chuks', 'male', 4, 11, 1996, 'asaba', '8131652852', 'Delta', 'male', 'okelue', 'oshmili south', 'federal college of education', '', 'student', 'christianity', 'ogbuechiyoung@gmail.com', 1, 0, 0, '38569846', 'wox_striped_800.png', '', 'Whats the name of your best friend', 'andrew', '2017-06-02 15:55:33'),
(6, 'nuel', 'bcf7e898745fefc29d80dafd16d941d5', 'omo', 'Emm', 'male', 12, 5, 1999, 'Asaba', '8030706164', 'Edo', 'married', 'iya', 'oshimili', 'asasa delta', '', 'Banker', 'christain', 'nuelco@yahoo.com', 0, 0, 0, '19038802', 'lp.png', '', '', '', '2017-06-02 13:01:42'),
(7, 'omoh', '1f32aa4c9a1d2ea010adcf2348166a04', 'patience', 'okhadugbore', 'female', 12, 5, 1990, 'asaba', '8063364405', 'Edo', 'male', 'oboh', 'oshmili', 'lagos man compound', '', 'student', 'christianity', 'beautifutreasure@gmail.com', 1, 0, 0, '75801077', 'nou.png', 'tjojfosjojiu90uiwr094r.jpg', 'Whats the name of your best primary school teacher', 'abuah', '2017-06-08 11:28:00'),
(8, 'bentelo', '1f32aa4c9a1d2ea010adcf2348166a04', 'bentelo', 'chuky', 'male', 2, 11, 1990, 'asaba', '777777', 'Delta', 'male', 'okeke', 'oshmili south', 'federal college of education', '', 'banker', 'christianity', 'benjaminchuks0@gmail.com1', 0, 0, 0, '86046085', 'wox_striped_800.png', 'hd8uheuy8y487487.jpg', 'In which town did your father meet your mother', 'oko', '2017-06-08 12:42:17'),
(10, 'chukwumma', '1f32aa4c9a1d2ea010adcf2348166a04', 'chukwumma', 'chuky', 'male', 9, 12, 1990, 'asaba', '98766544', 'Edo', 'married', 'okeke', 'oshmili south', 'federal college of education', '', 'student', 'christianity', 'benjaminchuks0@gmail.com', 0, 0, 0, '85336514', 'wox_striped_800.png', 'Finger_Prints-1p0f.png', 'Whats the name of your best primary school teacher', 'ogo', '2017-06-08 13:00:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_date`
--
ALTER TABLE `election_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `election_date`
--
ALTER TABLE `election_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
