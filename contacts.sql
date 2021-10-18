-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 08:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `fullname`, `email`, `mobile`, `pass`, `created`, `updated`, `photo`) VALUES
(6, 'Aditi Soni', 'aditi@gmail.com', 9963545231, 'ee98b674518afaa10af85206037d43f9', '2021-10-12 22:46:51', NULL, 'components/uploads/profile/IMG-20200804-WA0011.jpg'),
(9, 'Sagar Mishra', 'pratik@gmail.com', 9515658657, 'ee98b674518afaa10af85206037d43f9', '2021-10-15 15:01:52', NULL, 'components/uploads/profile/blackcircle.PNG'),
(10, 'Nitish Mishra', 'ntmishra98shivu@gmail.com', 7318409147, 'ee98b674518afaa10af85206037d43f9', '2021-10-17 13:15:24', NULL, 'components/uploads/profile/Nitish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mycontacts`
--

CREATE TABLE `mycontacts` (
  `userId` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(500) DEFAULT NULL,
  `userProfile` varchar(500) DEFAULT NULL,
  `userMobile` varchar(300) DEFAULT NULL,
  `userAddress` varchar(1000) DEFAULT NULL,
  `authEmail` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycontacts`
--

INSERT INTO `mycontacts` (`userId`, `userName`, `userEmail`, `userProfile`, `userMobile`, `userAddress`, `authEmail`, `created`, `updated`) VALUES
(1, 'Aradhana Shukla', 'aradhana786shukla@gmail.com', 'components/uploads/contacts/IMG-1634456901.jpg', '6393913289', 'Meja Road Allahabad Uttar Pradesh', 'ntmishra98shivu@gmail.com', '2021-10-17 13:18:21', NULL),
(3, 'Suraj Mishra', 'mishra98suraj@gmail.com', 'components/uploads/contacts/user-1634568571.jpg', '9936639012', 'Lochanganj Phulpur', 'ntmishra98shivu@gmail.com', '2021-10-17 21:53:56', '2021-10-18 23:33:11'),
(5, 'Nitin Mishra', 'mishra98sagar@gmail.com', 'components/uploads/contacts/IMG-1634488079.jpg', '9517658657', 'Lochanganj Phulpur', 'ntmishra98shivu@gmail.com', '2021-10-17 21:57:59', NULL),
(6, 'Muskan Mishra', 'muskan@gmail.com', 'components/uploads/contacts/IMG-1634488151.jpg', '7038586261', 'Nagpur Maharashtra', 'ntmishra98shivu@gmail.com', '2021-10-17 21:59:11', NULL),
(7, 'Ranu Mishra', 'ranu@gmail.com', 'components/uploads/contacts/IMG-1634488255.jpg', '7754077581', 'Jhunsi Allahabad', 'ntmishra98shivu@gmail.com', '2021-10-17 22:00:54', NULL),
(8, 'Prity Masi', 'priya0101@gmail.com', 'components/uploads/contacts/IMG-1634488475.jpg', '9935795352', 'Nyay Nagar Jhunsi Allahabad', 'ntmishra98shivu@gmail.com', '2021-10-17 22:04:35', NULL),
(9, 'Nishi Kushwaha', 'nishibca@gmail.com', 'components/uploads/contacts/IMG-1634488597.jpg', '6392408934', 'Katra Allahabad', 'ntmishra98shivu@gmail.com', '2021-10-17 22:06:36', NULL),
(10, 'Pratik Kumar', 'pratik420@gmail.com', 'components/uploads/contacts/IMG-1634493487.jpg', '9598578709', 'Basnehata Pratappur Allahabad', 'aditi@gmail.com', '2021-10-17 23:28:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycontacts`
--
ALTER TABLE `mycontacts`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mycontacts`
--
ALTER TABLE `mycontacts`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
