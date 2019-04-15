-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2019 at 05:14 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'Delhi'),
(2, 'Allahabad');

-- --------------------------------------------------------

--
-- Table structure for table `matrix`
--

CREATE TABLE `matrix` (
  `id` int(11) NOT NULL,
  `city1` int(11) NOT NULL,
  `city2` int(11) NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passangers`
--

CREATE TABLE `passangers` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passangers`
--

INSERT INTO `passangers` (`id`, `ticket_id`, `name`, `age`) VALUES
(1, 8, '', 0),
(2, 8, '', 0),
(3, 8, 'Prabhat Shukla', 22),
(4, 8, 'Prabhat Shukla1', 22),
(5, 8, 'Prabhat Shukla', 22),
(6, 8, 'Prabhat Shukla1', 22),
(7, 8, 'Prabhat Shukla', 22),
(8, 8, 'Prabhat Shukla1', 22),
(9, 8, 'Prabhat Shukla3', 22),
(10, 17, 'Prabhat', 22),
(11, 18, 'Prabhat', 12),
(12, 18, 'Prabhat Shukla1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `fare` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `transport_id`, `date`, `fare`, `user_id`, `seats`, `status`) VALUES
(1, 1, '0000-00-00', 10, 1, 1, 0),
(2, 1, '0000-00-00', 30, 1, 3, 0),
(3, 1, '0000-00-00', 0, 1, 0, 0),
(4, 1, '0000-00-00', 0, 1, 0, 0),
(5, 1, '0000-00-00', 10, 1, 1, 0),
(6, 1, '0000-00-00', 10, 1, 1, 0),
(7, 1, '0000-00-00', 10, 1, 1, 1),
(8, 1, '2019-04-19', 30, 1, 3, 1),
(9, 1, '2019-04-19', 20, 1, 2, 0),
(10, 1, '2019-04-19', 20, 1, 2, 0),
(11, 1, '2019-04-19', 20, 1, 2, 0),
(12, 1, '2019-04-19', 10, 1, 1, 0),
(13, 1, '2019-04-19', 10, 1, 1, 0),
(14, 1, '2019-04-19', 10, 1, 1, -1),
(15, 0, '0000-00-00', 0, 1, 0, 0),
(16, 1, '2019-04-19', 10, 1, 1, 0),
(17, 1, '2019-04-19', 10, 1, 1, 1),
(18, 1, '2019-04-26', 20, 5, 2, -1);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `source` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  `duration` time NOT NULL,
  `day` varchar(50) NOT NULL,
  `availability` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `mode`, `name`, `source`, `destination`, `fare`, `duration`, `day`, `availability`, `time`) VALUES
(1, 2, 'bus1', 1, 2, 10, '11:00:00', '1,3,5', 20, '11:12:18'),
(2, 2, 'bus2', 1, 2, 25, '08:00:00', '2,4', 25, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'prabhat', '3e66e5d6cedf8a3fea10bd337f237f54', 'Prabhat Shukla', 'prabhat47.1928@gmail.com'),
(5, 'shaunak', '1a37d5ce5cc7104bd81aa32e65ff3a51', 'shaunak', 'shaunak@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrix`
--
ALTER TABLE `matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passangers`
--
ALTER TABLE `passangers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matrix`
--
ALTER TABLE `matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passangers`
--
ALTER TABLE `passangers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
