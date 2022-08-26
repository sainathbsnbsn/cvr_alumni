-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 03:12 PM
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
-- Database: `alumini`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_alumini`
--

CREATE TABLE `add_alumini` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `alumini_image` varchar(200) NOT NULL,
  `role` text NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_alumini`
--

INSERT INTO `add_alumini` (`id`, `name`, `alumini_image`, `role`, `subject`) VALUES
(9, 'Prashanth ', 'WhatsApp Image 2022-03-24 at 11.02.43 PM.jpeg', 'Director', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam, culpa odio.'),
(10, 'Sankalp Reddy', 'WhatsApp Image 2022-03-24 at 11.03.47 PM.jpeg', 'Director', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam, culpa odio.'),
(11, 'Roll Rider', 'WhatsApp Image 2022-03-24 at 10.34.02 PM.jpeg', 'rapper', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam, culpa odio.');

-- --------------------------------------------------------

--
-- Table structure for table `add_events`
--

CREATE TABLE `add_events` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `event_image` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_events`
--

INSERT INTO `add_events` (`id`, `title`, `event_image`, `subject`, `date`) VALUES
(29, 'Fest 1', 'WhatsApp Image 2022-03-22 at 5.50.44 PM (2).jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora itaque, autem dolores culpa cum mollitia voluptate nesciunt voluptatibus quasi.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eveniet vel et mollitia nemo corporis sed ut, exercitationem incidunt, rerum nam doloremque quos ratione doloribus, officiis adipisci error quasi soluta?\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, magnam.', '2022-03-22'),
(30, 'Fest 2', 'WhatsApp Image 2022-03-22 at 5.50.44 PM (1).jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora itaque, autem dolores culpa cum mollitia voluptate nesciunt voluptatibus quasi.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eveniet vel et mollitia nemo corporis sed ut, exercitationem incidunt, rerum nam doloremque quos ratione doloribus, officiis adipisci error quasi soluta?\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, magnam.', '2022-03-22'),
(31, 'Fest 3', 'WhatsApp Image 2022-03-22 at 5.50.44 PM.jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora itaque, autem dolores culpa cum mollitia voluptate nesciunt voluptatibus quasi.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis eveniet vel et mollitia nemo corporis sed ut, exercitationem incidunt, rerum nam doloremque quos ratione doloribus, officiis adipisci error quasi soluta?\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, magnam.', '2022-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `add_events_by_student`
--

CREATE TABLE `add_events_by_student` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `event_image` varchar(200) NOT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL,
  `roll_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_events_by_student`
--

INSERT INTO `add_events_by_student` (`id`, `title`, `category`, `event_image`, `subject`, `date`, `roll_no`) VALUES
(9, 'Fest 1', 'flash_mab', '88A4947 1_2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora itaque', '2022-03-28', '19b81a0438@cvr.ac.in'),
(10, 'Holi', 'parties', 'Events Management festival image.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', '2022-03-28', '19b81a0438@cvr.ac.in'),
(11, 'Event', 'fests', 'events-management-and-promotion-768x341.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora itaque', '2022-03-28', '19b81a0438@cvr.ac.in'),
(12, 'Party', 'fests', 'https___media.insider.in_image_upload_c_crop,g_custom_v1519627962_vltlogy23k1iid9pjffx.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2022-03-28', '19b81a0438@cvr.ac.in'),
(13, 'Dj night', 'parties', 'images (1).jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2022-03-23', '19b81a0438@cvr.ac.in'),
(14, 'Party', 'parties', 'images (3).jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2022-03-28', '19b81a0438@cvr.ac.in'),
(15, 'Fest', 'fests', 'images (2).jpeg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2022-03-28', '19b81a0438@cvr.ac.in'),
(16, 'Event', 'fests', 'table-setting-for-an-event-party-or-wedding-reception-picture-id479977238 (1).jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2022-03-28', '19b81a0438@cvr.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`) VALUES
(1, '19b81a0438@cvr.ac.in', 'Sainath Beemanapally');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `branch` text NOT NULL,
  `need` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`id`, `name`, `email`, `branch`, `need`, `admin`) VALUES
(1, 'Sainath', '', 'ECE', 'Registrar, JNTU prior to becoming the Rector of the University. He has published over 25 papers in national and international Journals and Conferences and he has guided more than 30 M.Tech. projects. He is also t', ''),
(2, 'Anand Karthik', '19b81a0565@cvr.ac.in', 'CSE', 'RRegistrar, JNTU prior to becoming the Rector of the University. He has published over 25 papers in national and international Journals and Conferences and he has guided more than 30 M.Tech. projects. He is also ', ''),
(3, 'Sainath', '19b81a0565@cvr.ac.in', 'ECE', 'RRegistrar, JNTU prior to becoming the Rector of the University. He has published over 25 papers in national and international Journals and Conferences and he has guided more than 30 M.Tech. projects. He is also', ''),
(4, 'Abul Mal Muhit', '19b81a0565@cvr.ac.in', 'EIE', 'RRegistrar, JNTU prior to becoming the Rector of the University. He has published over 25 papers in national and international Journals and Conferences and he has guided more than 30 M.Tech. projects. He is also', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_alumini`
--
ALTER TABLE `add_alumini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_events`
--
ALTER TABLE `add_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_events_by_student`
--
ALTER TABLE `add_events_by_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_alumini`
--
ALTER TABLE `add_alumini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `add_events`
--
ALTER TABLE `add_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `add_events_by_student`
--
ALTER TABLE `add_events_by_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
