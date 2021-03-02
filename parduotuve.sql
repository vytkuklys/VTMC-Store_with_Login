-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 06:13 AM
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
-- Database: `parduotuve`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_userid`
--

CREATE TABLE `cart_userid` (
  `vartotojo_id` int(11) NOT NULL,
  `preke_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prekes`
--

CREATE TABLE `prekes` (
  `prekes_id` int(11) NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf32_lithuanian_ci NOT NULL,
  `apibudinimas` varchar(255) COLLATE utf32_lithuanian_ci NOT NULL,
  `kaina` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_lithuanian_ci;

--
-- Dumping data for table `prekes`
--

INSERT INTO `prekes` (`prekes_id`, `pavadinimas`, `apibudinimas`, `kaina`) VALUES
(2, 'Palapine', 'Laisvalaikio preke', 129.99),
(3, 'Baidare', 'Laisvalaikio preke', 299.99),
(4, 'Havajietiska pica', 'Saldyto maisto preke', 3.99),
(5, 'Darzoviu rinkinys', 'Saldyto maisto preke', 1.99),
(6, 'Ananasas', 'Sviezio maisto preke', 1.59),
(7, 'Brokolis', 'Sviezio maisto preke', 1.19),
(8, 'Apsauginis salmas', 'Statybine preke', 39.99),
(9, 'Ankeris su kabliuku', 'Statybine preke', 0.39);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `id` int(11) NOT NULL,
  `vartotojo_vardas` varchar(255) COLLATE utf32_lithuanian_ci DEFAULT NULL,
  `vardas` varchar(255) COLLATE utf32_lithuanian_ci NOT NULL,
  `pavarde` varchar(255) COLLATE utf32_lithuanian_ci NOT NULL,
  `slaptazodis` varchar(255) COLLATE utf32_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_lithuanian_ci;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`id`, `vartotojo_vardas`, `vardas`, `pavarde`, `slaptazodis`) VALUES
(2, 'asd', 'asd', 'asd', '$2y$10$3AMbzoyHfl.9rzVWHUO.d.PFd0kz65..IjUAiFTBjuLgab36Ul0Fq'),
(4, 'dsa', 'dsa', 'dsa', '$2y$10$n9olWUQmHfkS/urv4hVpsOW3P34BMt2VGlbwjR519SSPhDVl/QN1O'),
(6, 'as', 'as', 'as', '$2y$10$gMcFgxRTyIlZnfXXi7cAD.cb8g3jRy0ugChomocJZ1Tmxt3NklBca');

-- --------------------------------------------------------

--
-- Table structure for table `vertinimai`
--

CREATE TABLE `vertinimai` (
  `vertinimai_id` int(11) NOT NULL,
  `vartotojo_id` int(11) NOT NULL,
  `vidurkis` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_lithuanian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_userid`
--
ALTER TABLE `cart_userid`
  ADD KEY `vartotojo_id` (`vartotojo_id`),
  ADD KEY `preke_id` (`preke_id`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`prekes_id`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vertinimai`
--
ALTER TABLE `vertinimai`
  ADD PRIMARY KEY (`vertinimai_id`),
  ADD KEY `vartotojo_id` (`vartotojo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prekes`
--
ALTER TABLE `prekes`
  MODIFY `prekes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vertinimai`
--
ALTER TABLE `vertinimai`
  MODIFY `vertinimai_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_userid`
--
ALTER TABLE `cart_userid`
  ADD CONSTRAINT `preke_id` FOREIGN KEY (`preke_id`) REFERENCES `prekes` (`prekes_id`),
  ADD CONSTRAINT `vartotojo_id` FOREIGN KEY (`vartotojo_id`) REFERENCES `vartotojai` (`id`);

--
-- Constraints for table `vertinimai`
--
ALTER TABLE `vertinimai`
  ADD CONSTRAINT `vertinimai_ibfk_1` FOREIGN KEY (`vartotojo_id`) REFERENCES `vartotojai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
