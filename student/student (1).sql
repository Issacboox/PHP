-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 09:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(8) NOT NULL,
  `std_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`) VALUES
('63310162', 'นางสาวนุรารัตน์ สังข์เรือง'),
('65310027', 'นายปัณณธร ชนะภัย'),
('65310028', 'นายธีรภัทร ยุทธยะ'),
('65310029', 'นายทีปกร ก้อนสำโรง'),
('65310030', 'นายนนทกร ช้างโต'),
('65310031', 'นางสาวนภัสวรรณ สาตะสิน'),
('65310032', 'นายหฤท เกิดทวี'),
('65310139', 'นายกันต์ศักดิ์ ดียม'),
('65310140', 'นายจักรพันธ์ ศรีขจร'),
('65310141', 'นายภูวดล พานทอง'),
('65310142', 'นายกมล ตั้งสงบ'),
('65310143', 'นายธีรภัทร คงเพ็ชร'),
('65310144', 'นายนรภัทร ทองไพ'),
('65310145', 'นายพงศธร สุทธิธรรม'),
('65310146', 'นายพรชัย พึ่งพร้อม'),
('65310147', 'นางสาวภัสสรา สอนเอก'),
('65310148', 'นายอติชัย พุทไธสง'),
('65310149', 'นายอัสนี ศรีนวล'),
('65310163', 'นายกฤติเดช ไวยไชย'),
('65310164', 'นายเจษฎาพร บัวศรี'),
('65310165', 'นายชมนันทน์ โพนนาค'),
('65310167', 'นางสาวบัวแก้ว ใจเมตตา'),
('65310168', 'นายพลภัทร พุ่มพวง'),
('65310169', 'นางสาวพัณณ์ชิตา สวภาพมงคล');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
