-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 07:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllVoters` ()  BEGIN

	SELECT full_name FROM `tbl_users`;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `capitalize` (`s` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
  declare c int;
  declare x varchar(255);
  declare y varchar(255);
  declare z varchar(255);

  set x = UPPER( SUBSTRING( s, 1, 1));
  set y = SUBSTR( s, 2);
  set c = instr( y, ' ');

  while c > 0
    do
      set z = SUBSTR( y, 1, c);
      set x = CONCAT( x, z);
      set z = UPPER( SUBSTR( y, c+1, 1));
      set x = CONCAT( x, z);
      set y = SUBSTR( y, c+2);
      set c = INSTR( y, ' ');     
  end while;
  set x = CONCAT(x, y);
  return x;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `aid` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`aid`, `admin_username`, `admin_password`, `time_stamp`) VALUES
(1, 'admin', 'admin123', '2021-01-10 16:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `rating` int(5) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`rating`, `comment`) VALUES
(3, 'nice app'),
(5, 'good work'),
(4, 'good one'),
(2, 'user friendly'),
(1, 'just ok'),
(5, 'easy to cast vote'),
(4, 'nice web design'),
(4, 'excellent work'),
(5, 'great work'),
(5, 'great and nice work'),
(4, 'nice homepage'),
(5, 'qwerty'),
(5, 'make this website in other lang'),
(1, ''),
(3, ''),
(3, ''),
(0, ''),
(1, ''),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(5) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `voter_id` int(10) NOT NULL,
  `aadhar` bigint(12) DEFAULT NULL,
  `dob` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `email`, `voter_id`, `aadhar`, `dob`) VALUES
(1, 'Abhishek Kumar Ravi', 'don.coolbuddy.xxx@gmail.com', 5467540, 1147483647, '2001-01-03'),
(3, 'Chadan', 'chabdan@gmail.com', 6578638, 1563567555, '1999-02-02'),
(4, 'Aman', 'aman@live.in', 8967409, 1010101020, '1998-04-04'),
(5, 'Vicky', 'lastworker@gmail.com', 4543245, 1034345667, '2004-06-06'),
(6, 'Abhishek Singh', 'abhi6751@gmail.com', 8743023, 2020344509, '2002-04-04'),
(7, 'Avneet', 'avneet@gmail.com', 7460029, 1957122345, '1999-03-06'),
(8, 'Santanu', 'santa@gmail.com', 8093078, 2045205678, '2004-01-01'),
(9, 'Arvind Kejriwal', 'arvind@gmail.com', 9674940, 2100340090, '2001-01-03'),
(10, 'Manish Sisodia', 'manish@live.in', 6240483, 1717121208, '2000-03-04'),
(11, 'Rahul Raju', 'rahulraj@hmail.com', 9749403, 2127895603, '2006-02-06'),
(12, 'Subham Kumar', 'subham@gmail.com', 9562278, 1130304090, '2008-04-04'),
(13, 'Chadan', 'chabdan@gmail.com', 5088034, 2099708088, '2003-02-01'),
(15, 'Abhishek Kumar', 'ak@gmail.com', 1238845, 1515454503, '2005-07-07'),
(17, 'Ravi', 'ravi@gmail.com', 1233458, 1312345673, '2003-06-06'),
(18, 'Aryaya', 'rtt@gmail.com', 4567896, 1718999903, '2009-12-12'),
(19, 'Binityre', 'binit@gmail.com', 6543298, 1413234509, '1997-12-12'),
(22, 'Nikhilrah', 'nikhil@gmail.com', 65432907, 2147481787, '2021-01-07'),
(23, 'Nikhil Raj', 'sdfgh@gmail.com', 1233456, 2147483647, '2020-04-08'),
(24, 'Abhay', 'abhay@gmail.com', 2345689, 2047483647, '2019-02-02');

--
-- Triggers `tbl_users`
--
DELIMITER $$
CREATE TRIGGER `frst_l_up_insert` BEFORE INSERT ON `tbl_users` FOR EACH ROW SET NEW.full_name = capitalize(NEW.full_name)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `frst_l_up_update` BEFORE UPDATE ON `tbl_users` FOR EACH ROW SET NEW.full_name = capitalize(NEW.full_name)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes`
--

CREATE TABLE `tbl_votes` (
  `voter_id` int(10) NOT NULL,
  `selection` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_votes`
--

INSERT INTO `tbl_votes` (`voter_id`, `selection`) VALUES
(1233456, 'BJP'),
(2345689, 'BJP'),
(4543245, 'TMC'),
(6543298, 'AAP'),
(65432907, 'INC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD CONSTRAINT `voter_id` FOREIGN KEY (`voter_id`) REFERENCES `tbl_users` (`voter_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
