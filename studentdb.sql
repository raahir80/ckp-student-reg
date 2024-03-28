-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2024 at 04:53 PM
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
  `declared` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studid`, `surname`, `name`, `fname`, `mname`, `gender`, `board`, `category`, `dob`, `regno`, `course`, `schoolname`, `hseatno`, `hpassing`, `gujappno`, `gujseatno`, `Maths`, `Guj_Maths`, `Chem`, `Guj_Chem`, `Phy`, `Guj_Phy`, `Eng`, `Chempr`, `average`, `Phypr`, `pcm`, `Comp`, `gujper`, `Comppr`, `address`, `pincode`, `email`, `smobno`, `pmobno`, `declared`) VALUES
(1, 'jhsfhj', 'PARITA', 'sdff', 'Mirabai', 'Male', 'GSEB', 'GEN', '2024-03-05', '', 'Electrical', 'Vidhybharti school', '123', '2014', '456789', '589745', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9898989898, 'Declared'),
(2, 'Desai', 'Dharmi', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-14', '', 'Computer', 'Vidhybharti school', '123456', '132132', '13213', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9898989898, 'Declared'),
(3, 'Desai', 'Dharmi', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-14', '', 'Computer', 'Vidhybharti school', '123456', '132132', '13213', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9876543210, 9898989898, 'Declared'),
(4, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', '', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(5, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET381711621074', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(6, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET201711621164', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(7, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET29', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(8, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET71', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(9, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET111', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(10, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET718', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(11, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET677', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(12, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET932', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(13, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET788', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(14, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET998', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(15, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET579', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(16, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET350', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared'),
(17, 'Patel', 'VINITA', 'Maheshbhai', 'Mirabai', 'Female', 'GSEB', 'GEN', '2024-03-15', 'CKPCET271', 'Computer', 'Vidhybharti school', '123456', '2014', '456789', '987654', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 9898989898, 9898989898, 'Declared');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
