-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2015 at 03:10 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dtbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `audience`
--

CREATE TABLE IF NOT EXISTS `audience` (
`audience_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `nic` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audience`
--

INSERT INTO `audience` (`audience_id`, `title`, `fname`, `lname`, `gender`, `dob`, `nic`, `address`, `city`, `mobile`, `email`, `password`, `d_id`) VALUES
(11, 'Mr', 'Lochana', 'Koralage', 'male', '1948-02-17', '801591241v', 'met', 'Modara', 947772962, 'lochana@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(12, 'Mr', 'Kumar', 'Sangakkara', 'male', '1977-11-18', '123456789v', 'Kandy', 'Kandy', 947772962, 'kumara@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 11),
(13, 'Mr', 'Daminda', 'Herath', 'male', '1980-06-07', '123456789v', 'BIT', 'Gonapola Junction', 947772962, 'dherath101@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 10),
(14, 'Rev', 'Daminda', 'Herath', 'male', '1946-01-18', '801591241v', 'BIT', 'Gonapola Junction', 947772962, 'dherath111@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(15, 'Dr', 'Dayan', 'Rajapaksha', '', '1945-01-30', '4561358', 'madra colomo 15', 'colombi', 55555, 'thilankoralage@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`booking_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `audience_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `seatcat` varchar(30) NOT NULL,
  `seatref` varchar(250) NOT NULL,
  `bstatus` varchar(10) NOT NULL,
  `btime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `schedule_id`, `audience_id`, `seat_id`, `session_id`, `seatcat`, `seatref`, `bstatus`, `btime`) VALUES
(42, 10, 11, 7, '11-1435338106', 'Balcony', 'BS0-7', 'Complete', 1435342010),
(43, 10, 11, 8, '11-1435338106', 'Balcony', 'BS0-8', 'Complete', 1435342013),
(44, 10, 11, 1, '11-1435342431', 'Balcony', 'BS0-1', 'Complete', 1435342471),
(45, 10, 11, 2, '11-1435342431', 'Balcony', 'BS0-2', 'Complete', 1435342473),
(48, 11, 11, 1, '11-1435487873', 'Balcony', 'BS0-1', 'Complete', 1435488276),
(49, 11, 11, 20, '11-1435487873', 'Balcony', 'BS1-2', 'Complete', 1435488279),
(56, 12, 11, 1, '11-1436082974', 'Balcony', 'BS0-1', 'Complete', 1436082990);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`comment id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE IF NOT EXISTS `director` (
`director_id` int(11) NOT NULL,
  `director_name` varchar(200) NOT NULL,
  `director_gender` varchar(10) NOT NULL,
  `director_des` text NOT NULL,
  `director_image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `director_name`, `director_gender`, `director_des`, `director_image`) VALUES
(1, 'John De Silva', 'Male', 'Ramayanaya', ''),
(2, 'Dayananda Gunawardane', 'Male', 'Nari baana', ''),
(3, 'Lushan Bulathsinghala', 'Male', 'Tharawo Egilethi', ''),
(4, 'Pro Ediriweera Saraschandra', 'Male', 'Maname., Sinhabahu', '');

-- --------------------------------------------------------

--
-- Table structure for table `dir_drama`
--

CREATE TABLE IF NOT EXISTS `dir_drama` (
  `drama_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dir_drama`
--

INSERT INTO `dir_drama` (`drama_id`, `director_id`) VALUES
(22, 3),
(24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
`d_id` int(11) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`d_id`, `description`) VALUES
(1, 'Ampara'),
(2, 'Anuradupura'),
(3, 'Badulla'),
(4, 'Batticaloa'),
(5, 'Colombo'),
(6, 'Galle'),
(7, 'Gampha'),
(8, 'Hambanthota'),
(9, 'Jaffna'),
(10, 'Kaluthara'),
(11, 'Kandy'),
(12, 'Kegalle'),
(13, 'Kilinochchi'),
(14, 'Kurunegala'),
(15, 'Mannar'),
(16, 'Matale'),
(17, 'Matara'),
(18, 'Monaragala'),
(19, 'Mullativu'),
(20, 'Nuwara Eliya'),
(21, 'Polonnaruwa'),
(22, 'Puttalama'),
(23, 'Rathnapura'),
(24, 'Trincomalee'),
(25, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `drama`
--

CREATE TABLE IF NOT EXISTS `drama` (
`drama_id` int(11) NOT NULL,
  `drama_name` varchar(200) NOT NULL,
  `drama_cat` varchar(20) NOT NULL,
  `performing` text NOT NULL,
  `drama_des` text NOT NULL,
  `intro_year` int(11) NOT NULL,
  `audio_clip` varchar(200) NOT NULL,
  `video_clip` varchar(200) NOT NULL,
  `language` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `doa` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drama`
--

INSERT INTO `drama` (`drama_id`, `drama_name`, `drama_cat`, `performing`, `drama_des`, `intro_year`, `audio_clip`, `video_clip`, `language`, `country`, `user_id`, `image`, `doa`) VALUES
(22, 'Sadaya Marai Salli Hamarai', 'Comady', 'ABC', 'ABC', 2014, '', '', 'Sinhala', 'Sri Lanak', 2, '1423370681_1416456537aa.jpg', '2015-02-08'),
(24, 'Hunuwate Kathawa', 'Classic', '', '', 1960, '', '', 'Sinhala', 'Sri Lanak', 2, '1423370759_1416483497hunuwataye_kathawa-211x300.jpg', '2015-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `drama_images`
--

CREATE TABLE IF NOT EXISTS `drama_images` (
`drama_image_id` int(11) NOT NULL,
  `drama_image_name` varchar(200) NOT NULL,
  `drama_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`pay_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `bdate` date NOT NULL,
  `method` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `total`, `session_id`, `bdate`, `method`) VALUES
(1, 1500, '11-1435338106', '2015-06-26', 'paypal'),
(2, 1500, '11-1435338106', '2015-06-26', 'paypal'),
(3, 1500, '11-1435338106', '2015-06-26', 'paypal'),
(4, 1500, '11-1435338106', '2015-06-26', 'paypal'),
(5, 1500, '11-1435338106', '2015-06-26', 'paypal'),
(6, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(7, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(8, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(9, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(10, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(11, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(12, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(13, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(14, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(15, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(16, 1500, '11-1435342431', '2015-06-26', 'paypal'),
(17, 2500, '11-1435487873', '2015-06-28', 'paypal'),
(18, 1250, '11-1436082974', '2015-07-05', 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`schedule_id` int(11) NOT NULL,
  `drama_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  `sstatus` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `drama_id`, `date`, `time_slot_id`, `sstatus`) VALUES
(5, 23, '2015-02-10', 1, 'Yes'),
(6, 23, '2015-02-10', 2, 'Yes'),
(7, 24, '2015-02-14', 1, 'Yes'),
(8, 25, '2015-02-12', 2, 'Yes'),
(9, 22, '2015-02-01', 1, 'Yes'),
(10, 24, '2015-06-28', 1, 'Yes'),
(11, 22, '2015-06-30', 1, 'Yes'),
(12, 24, '2015-07-06', 1, 'Yes'),
(13, 26, '2015-07-03', 1, 'Yes'),
(14, 26, '2015-07-03', 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE IF NOT EXISTS `system_user` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`user_id`, `firstname`, `lastname`, `email`, `user_image`, `user_role_id`, `username`, `password`) VALUES
(1, 'Lochana', 'Koralage', 'Lochana@gmail.com', '1.jpg', 1, 'Loch', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'Gayani', 'Ransika', 'ga@esoft.lk', '2.jpg', 2, 'gaya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'Shashi', 'Prabha', 'sha@esoft.lk', '3.jpg', 3, 'shashi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_price`
--

CREATE TABLE IF NOT EXISTS `ticket_price` (
`ticket_price_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_price`
--

INSERT INTO `ticket_price` (`ticket_price_id`, `schedule_id`, `category`, `type`, `price`) VALUES
(1, 1, 'Gallery', 'Adult', 1000),
(2, 1, 'Gallery', 'Child', 750),
(3, 1, 'Balcony', 'Adult', 1250),
(4, 1, 'Balcony', 'Child', 1000),
(5, 2, 'Gallery', 'Adult', 1000),
(6, 2, 'Gallery', 'Child', 750),
(7, 2, 'Balcony', 'Adult', 1250),
(8, 2, 'Balcony', 'Child', 1000),
(9, 3, 'Gallery', 'Adult', 1000),
(10, 3, 'Gallery', 'Child', 750),
(11, 3, 'Balcony', 'Adult', 1250),
(12, 3, 'Balcony', 'Child', 1000),
(13, 4, 'Gallery', 'Adult', 1000),
(14, 4, 'Gallery', 'Child', 750),
(15, 4, 'Balcony', 'Adult', 1250),
(16, 4, 'Balcony', 'Child', 1000),
(17, 5, 'Gallery', 'Adult', 1000),
(18, 5, 'Gallery', 'Child', 750),
(19, 5, 'Balcony', 'Adult', 1250),
(20, 5, 'Balcony', 'Child', 1000),
(21, 6, 'Gallery', 'Adult', 1000),
(22, 6, 'Gallery', 'Child', 750),
(23, 6, 'Balcony', 'Adult', 1250),
(24, 6, 'Balcony', 'Child', 1000),
(25, 7, 'Gallery', 'Adult', 1000),
(26, 7, 'Gallery', 'Child', 750),
(27, 7, 'Balcony', 'Adult', 1250),
(28, 7, 'Balcony', 'Child', 1000),
(29, 8, 'Gallery', 'Adult', 1000),
(30, 8, 'Gallery', 'Child', 750),
(31, 8, 'Balcony', 'Adult', 1250),
(32, 8, 'Balcony', 'Child', 1000),
(33, 9, 'Gallery', 'Adult', 1000),
(34, 9, 'Gallery', 'Child', 750),
(35, 9, 'Balcony', 'Adult', 1250),
(36, 9, 'Balcony', 'Child', 1000),
(37, 10, 'Gallery', 'Adult', 1000),
(38, 10, 'Gallery', 'Child', 750),
(39, 10, 'Balcony', 'Adult', 750),
(40, 10, 'Balcony', 'Child', 500),
(41, 11, 'Gallery', 'Adult', 1000),
(42, 11, 'Gallery', 'Child', 750),
(43, 11, 'Balcony', 'Adult', 1250),
(44, 11, 'Balcony', 'Child', 1000),
(45, 12, 'Gallery', 'Adult', 1000),
(46, 12, 'Gallery', 'Child', 750),
(47, 12, 'Balcony', 'Adult', 1250),
(48, 12, 'Balcony', 'Child', 1000),
(49, 13, 'Gallery', 'Adult', 1000),
(50, 13, 'Gallery', 'Child', 123),
(51, 13, 'Balcony', 'Adult', 1000),
(52, 13, 'Balcony', 'Child', 150),
(53, 14, 'Gallery', 'Adult', 1000),
(54, 14, 'Gallery', 'Child', 123),
(55, 14, 'Balcony', 'Adult', 1000),
(56, 14, 'Balcony', 'Child', 150);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE IF NOT EXISTS `time_slot` (
`time_slot_id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `description`) VALUES
(1, '3pm - 5pm'),
(2, '6pm - 8pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Staff Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audience`
--
ALTER TABLE `audience`
 ADD PRIMARY KEY (`audience_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`comment id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
 ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `dir_drama`
--
ALTER TABLE `dir_drama`
 ADD PRIMARY KEY (`drama_id`,`director_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
 ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `drama`
--
ALTER TABLE `drama`
 ADD PRIMARY KEY (`drama_id`);

--
-- Indexes for table `drama_images`
--
ALTER TABLE `drama_images`
 ADD PRIMARY KEY (`drama_image_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ticket_price`
--
ALTER TABLE `ticket_price`
 ADD PRIMARY KEY (`ticket_price_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
 ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audience`
--
ALTER TABLE `audience`
MODIFY `audience_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `comment id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `drama`
--
ALTER TABLE `drama`
MODIFY `drama_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `drama_images`
--
ALTER TABLE `drama_images`
MODIFY `drama_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ticket_price`
--
ALTER TABLE `ticket_price`
MODIFY `ticket_price_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
MODIFY `time_slot_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
