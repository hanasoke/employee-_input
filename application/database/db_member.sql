-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2026 at 05:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `hobby` text NOT NULL,
  `thn_lahir` year(4) NOT NULL,
  `umur` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `handphone`, `nama`, `alamat`, `agama`, `hobby`, `thn_lahir`, `umur`, `created_at`) VALUES
(8, '81732424298', 'Nakano Itsuki', 'Jl Saiya No 89', 'Hindu', 'Musik, Kesenian', 2001, 25, '2026-03-06 04:40:21'),
(9, '81642738232', 'Nakano Yotsuba', 'Jl Kawagakure No 89', 'Budha', 'Olahraga, Makan, Tidur', 2001, 25, '2026-03-06 04:41:15'),
(10, '8132712390998', 'Nakano Miku', 'Jl Sunagakure No 78', 'Kristen', 'Games', 2001, 25, '2026-03-06 04:41:48'),
(11, '81782381292', 'Mitsuba AOI', 'Jl Amegakure No 89', 'Islam', 'Musik, Olahraga, Kesenian, Games', 2001, 25, '2026-03-06 04:43:19'),
(12, '628773457585', 'Ajeng Utami', 'Jl Ki Hadjar Dewantara No 76', 'Islam', 'Musik, Olahraga, Kesenian, Games, Otomotif, Makan, Tidur', 1999, 27, '2026-03-06 04:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
