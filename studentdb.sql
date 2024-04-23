-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2024 at 10:03 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dipstudent`
--

CREATE TABLE `dipstudent` (
  `studid` int NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `university` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `regno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `collegename` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `spi1` float NOT NULL,
  `spi2` float NOT NULL,
  `spi3` float NOT NULL,
  `spi4` float NOT NULL,
  `spi5` float NOT NULL,
  `spi6` float NOT NULL,
  `cpi1` float NOT NULL,
  `cpi2` float NOT NULL,
  `cpi3` float NOT NULL,
  `cpi4` float NOT NULL,
  `cpi5` float NOT NULL,
  `cpi6` float NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `smobno` bigint NOT NULL,
  `pmobno` bigint NOT NULL,
  `declared` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `acpcmeritno` bigint NOT NULL,
  `acpcmeritmarks` double NOT NULL,
  `acpcappno` bigint NOT NULL,
  `aadhar` bigint NOT NULL,
  `enrolno` bigint NOT NULL,
  `dipyear` int NOT NULL,
  `cgpa` float NOT NULL,
  `back1` int NOT NULL,
  `back2` int NOT NULL,
  `back3` int NOT NULL,
  `back4` int NOT NULL,
  `back5` int NOT NULL,
  `back6` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dipstudent`
--

INSERT INTO `dipstudent` (`studid`, `surname`, `name`, `fname`, `mname`, `gender`, `university`, `category`, `dob`, `regno`, `course`, `collegename`, `spi1`, `spi2`, `spi3`, `spi4`, `spi5`, `spi6`, `cpi1`, `cpi2`, `cpi3`, `cpi4`, `cpi5`, `cpi6`, `address`, `pincode`, `email`, `smobno`, `pmobno`, `declared`, `acpcmeritno`, `acpcmeritmarks`, `acpcappno`, `aadhar`, `enrolno`, `dipyear`, `cgpa`, `back1`, `back2`, `back3`, `back4`, `back5`, `back6`) VALUES
(1, 'Solanki', 'samarth', 'maheshkumar', 'Saruben', 'Male', 'UTU', 'EWS', '2024-04-04', 'CKPCETD2D0001', 'IT', 'Maliba Campus', 8, 7, 8, 8, 9, 9, 8, 7, 8, 8, 9, 9, 'SURAT', '395008', 'samarth1910@gmail.com', 7896548968, 8987456535, 'Declared', 12345, 25.89, 123546, 254623562598, 210090107005, 2014, 25.36, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studid` int NOT NULL,
  `surname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `board` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `regno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `schoolname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `hseatno` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `hpassing` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `gujappno` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `gujseatno` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Maths` int NOT NULL,
  `Guj_Maths` int NOT NULL,
  `Chem` int NOT NULL,
  `Guj_Chem` int NOT NULL,
  `Phy` int NOT NULL,
  `Guj_Phy` int NOT NULL,
  `Eng` int NOT NULL,
  `Chempr` int NOT NULL,
  `average` int NOT NULL,
  `Phypr` int NOT NULL,
  `pcm` int NOT NULL,
  `Comp` int NOT NULL,
  `gujper` int NOT NULL,
  `Comppr` int NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `smobno` bigint NOT NULL,
  `pmobno` bigint NOT NULL,
  `declared` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `acpcmeritno` bigint NOT NULL,
  `acpcmeritmarks` double NOT NULL,
  `acpcappno` bigint NOT NULL,
  `aadhar` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studid`, `surname`, `name`, `fname`, `mname`, `gender`, `board`, `category`, `dob`, `regno`, `course`, `schoolname`, `hseatno`, `hpassing`, `gujappno`, `gujseatno`, `Maths`, `Guj_Maths`, `Chem`, `Guj_Chem`, `Phy`, `Guj_Phy`, `Eng`, `Chempr`, `average`, `Phypr`, `pcm`, `Comp`, `gujper`, `Comppr`, `address`, `pincode`, `email`, `smobno`, `pmobno`, `declared`, `acpcmeritno`, `acpcmeritmarks`, `acpcappno`, `aadhar`) VALUES
(1, 'Patel', 'Suraj', 'Kantibhai', 'Savitaben', 'Male', 'GSEB', 'ews', '2024-03-31', 'CKPCET0001', 'Computer', 'Shri C U Shah Sarvajanik English medium high school', '987456', '2023', '896589', '56325', 89, 22, 87, 38, 56, 37, 78, 35, 88, 45, 95, 70, 77, 98, '78, Shri hari nagar society, near smc party plot, majura gate, surat ', '395001', 'suraj@gmail.com', 9632587410, 9856321470, 'Declared', 12345, 25.89, 123456789, 254623562598),
(2, 'Patel', 'Sunny', 'Deepakbhai', 'Madhuben', 'Male', 'CBSE', 'ews', '2024-04-01', 'CKPCET0002', 'Computer', 'Sanskar bharti Vidya school', '6789', '2014', '6789', '4566', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Surat', '395010', 'sunny@gmail.com', 8985868283, 9658456582, 'Declared', 9876, 89, 876, 1234567890),
(3, 'Solanki', 'pratik', 'Dayanand', 'Labhuben', 'Male', 'CBSE', 'gen', '2024-04-08', 'CKPCET0003', 'Computer', 'jeevanbharti kumar bhavan', '12345', '2023', '13213', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9876543210, 'Declared', 12345, 25.89, 123546, 254623562598),
(4, 'Solanki', 'pratik', 'Dayanand', 'Labhuben', 'Male', 'CBSE', 'gen', '2024-04-08', 'CKPCET0004', 'Computer', 'jeevanbharti kumar bhavan', '12345', '2023', '13213', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9876543210, 'Declared', 12345, 25.89, 123546, 254623562598),
(5, 'Solanki', 'pratik', 'Dayanand', 'Labhuben', 'Male', 'CBSE', 'gen', '2024-04-08', 'CKPCET0005', 'Computer', 'jeevanbharti kumar bhavan', '12345', '2023', '13213', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9876543210, 'Declared', 12345, 25.89, 123546, 254623562598);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Admin', '$2y$10$EsVBR1If0zr9u9.NPsXWB.bGxjSZAw2mIfwdaFHCpWEjuhioyGLlq', '2024-04-01 10:30:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dipstudent`
--
ALTER TABLE `dipstudent`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dipstudent`
--
ALTER TABLE `dipstudent`
  MODIFY `studid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
