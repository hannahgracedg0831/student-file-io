-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 06:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcnhsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `email`, `temp_key`, `created`) VALUES
(1, 'gutierrezhannah70@gmail.com', 'ba28275eae55e1cf2a65e12e6a44b171', '2021-05-23 05:06:13'),
(2, 'gutierrezhannah70@gmail.com', 'f5b3cd15e2908ed18d19183ff8afa38e', '2021-05-23 05:07:24'),
(3, 'gutierrezhannah70@gmail.com', 'a1097236ec318da5e94c277ee971bcaf', '2021-05-23 05:10:04'),
(4, 'gutierrezhannah70@gmail.com', 'e2cdad6d2f7d9edbc4de6391fc75bb76', '2021-05-23 05:10:25'),
(5, 'gutierrezhannah70@gmail.com', 'f5e24c08d8325f83458f7e14a72f5fa7', '2021-05-23 05:10:49'),
(6, 'gutierrezhannah70@gmail.com', '410467981cd3b91132470599795d3688', '2021-05-23 05:12:33'),
(7, 'gutierrezhannah70@gmail.com', '45ce473727a8e97339bc353b34e451db', '2021-05-23 05:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_message`
--

CREATE TABLE `request_message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `mark` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `lrn` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `average` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`id`, `fname`, `mname`, `lname`, `address`, `contact`, `section`, `year`, `image`, `lrn`, `email`, `password`, `average`, `remarks`, `datetime`) VALUES
(12, 'Allen ', 'Diaz', 'Dela cruz', 'Rio Chico', '09876543223', 'SP-ICT-Canva', 'Grade 7', '245035049_618100065860639_5683929958113792759_n.png', '10537300057', 'allen@gmail.com', '$2y$10$SF5cO4GkeoBN3RRwQZt04O9KoNk.gqQKDkPqn0tJaaqRApFEi9Tuq', '', '', '2021-10-12 23:08:20'),
(13, 'Princess', 'Diaz', 'Delacruz', 'Rio Chico', '09273846252', 'SP-ICT-Canva', 'Grade 7', '245035049_618100065860639_5683929958113792759_n.png', '105373140093', 'princess@gmail.com', '$2y$10$eGQ1.HdL20RXhVAAv0L0gunbsw0rRWq8Pk9QZ8FrD4e8RKt.OnEKG', '', '', '2021-10-12 23:44:37'),
(14, 'Andrei', 'Diaz', 'Delacruz', 'Rio Chico', '09876543211', 'Bayabas', 'Grade 7', '245035049_618100065860639_5683929958113792759_n.png', '105368170008', 'andrei@gmail.com', '$2y$10$1PN9sdRWiR6YMhQlrNB0tOo9VkbsCHu8BFWWoj4sKB3otA7bEzdau', '', '', '2021-10-12 23:46:36'),
(16, 'John Lloyd', 'Ferrer', 'Arevalo', 'Rio Chico', '098765432111', 'Lansones', 'Grade 7', '245035049_618100065860639_5683929958113792759_n.png', '105373100074', 'jl@gmail.com', '$2y$10$Rix8Jrl1LN9hEppAzTloSexEY/CvUgB/pb/.aaJJdoMxQJG51v4Ei', '', '', '2021-10-12 23:49:54'),
(17, 'Rhian', 'Francine', 'Ramos', 'rio chico', '09118374854', 'SP-ICT-Zoom', 'Grade 8', '245035049_618100065860639_5683929958113792759_n.png', '10537312066', 'rhian@gmail.com', '$2y$10$6BsrVIE83F8becsIOJnwrevZP8BqTRa8tzyeYA7pgNa8ZRcAmEHjG', '', '', '2021-10-13 07:12:49'),
(18, 'Nicole', 'Coros =', 'De Guzman', 'rio chico', '09118374854', 'Atis', 'Grade 7', '245035049_618100065860639_5683929958113792759_n.png', '105373100047', 'nicole@gmail.com', '$2y$10$iasssUyAS8RHu7JX8oFGEuoLBRqe1jpOzn82aYY9vNAsaniMOb6sG', '', '', '2021-10-13 07:18:19'),
(19, 'Euriko', 'Polines', 'Ramos', 'Rio Chico', '09876654321', 'SP-ICT-Zoom', 'Grade 8', '245035049_618100065860639_5683929958113792759_n.png', '105373100125', 'euriko@gmail.com', '$2y$10$4QlgvNf5ES9np5WCyEKePOUFoCEmqESjWBb/Mcy.KwdmTag4Hm3Y.', '', '', '2021-10-13 07:21:12'),
(20, 'Sofia', 'Ramos', 'Castro', 'rio chico', '09118374854', 'Dahlia', 'Grade 8', '245035049_618100065860639_5683929958113792759_n.png', '105373100041', 'sofia@gmail.com', '$2y$10$D7.UFIcWdf/NhllqLjeElusd/jNWfAvTJs9bd37aznQU96X0x5vi6', '', '', '2021-10-13 07:22:35'),
(21, 'Bea Bianca', 'Mendoza', 'Garcia', 'rio chico', '09118374854', 'Ilang-ilang', 'Grade 8', '245035049_618100065860639_5683929958113792759_n.png', '300840170001', 'bea@gmail.com', '$2y$10$CMF85.KAzQDc8fP2hepKx.ZQDj3lfA6AhbgDeHZI0RHnM7rg4TwAe', '', '', '2021-10-13 07:23:48'),
(22, 'Crystal Dane', 'Bote', 'Pajarillaga', 'rio chico', '09988765432', 'Santan', 'Grade 8', '245035049_618100065860639_5683929958113792759_n.png', '105373120194', 'crystal@gmail.com', '$2y$10$xCcQ6tHDgS4p5AXT5oM0pOyMtNgsFkvi51FLm8xKhZkVGINxr3V1K', '', '', '2021-10-13 07:25:26'),
(23, 'Jecilyn', 'Maducdoc', 'Aquino', 'Rio Chico', '09090876543', 'SP-ICT-Minecraft', 'Grade 9', '245035049_618100065860639_5683929958113792759_n.png', '159024120026', 'jecilyn@gmail.com', '$2y$10$ZN8u8rFt7j3ME/O7uJskheI7YytstsBL4xf3Axe925s6L8SMmXrx6', '', '', '2021-10-13 07:27:16'),
(24, 'James Aldrin', 'Diaz', 'Del Rosario', 'Rio Chico', '09098765678', 'SP-ICT-Minecraft', 'Grade 9', '245035049_618100065860639_5683929958113792759_n.png', '105373120176', 'james@gmail.com', '$2y$10$Si5oIJvg7g15xg6XznBHWOFpyfaApsajpSohxSevgpaDNVVeAQQTu', '', '', '2021-10-13 07:28:37'),
(25, 'Luvy', 'Pascual', 'Bulacan', 'Rio Chico', '09010203040', 'Lagundi', 'Grade 9', '245035049_618100065860639_5683929958113792759_n.png', '159024130047', 'luvy@gmail.com', '$2y$10$.IHwnvglG6U5qE34C.y4muzfoMHAblxyLOGmpKS2UW82MfjjfF5zy', '', '', '2021-10-13 07:30:05'),
(26, 'Sophya Rose', 'Coros', 'Reynoso', 'Rio Chico', '09807060505', 'Banaba', 'Grade 9', '245035049_618100065860639_5683929958113792759_n.png', '105450110014', 'sophya@gmail.com', '$2y$10$Y8Ln.CX/KkvoM7sW0F45N.o/uopXDgYjwRi0LLECRws6BDSWyHTde', '', '', '2021-10-13 07:31:46'),
(27, 'Gian', 'Hagonoy', 'Salvacion', 'Rio Chico', '09997776655', 'Sambong', 'Grade 9', '245035049_618100065860639_5683929958113792759_n.png', '105687120200', 'gian@gmail.com', '$2y$10$SvQ8fjwrXeMD5B/qH1EF/O8v7mibRJXtGLTgQJEBzaTRZUZmw46Xm', '', '', '2021-10-13 07:33:25'),
(28, 'Alia Charlcey', 'Mendoza', 'Garcia', 'Rio Chico', '09123498754', 'SP-ICT-Larrypage', 'Grade 10', '245035049_618100065860639_5683929958113792759_n.png', '105687120105', 'alia@gmail.com', '$2y$10$AxlU7pZ2Z4n3xYTd8U/x5eb7hJygLh72WZ7OMIJkpjybNyAKt41Xi', '', '', '2021-10-13 07:35:17'),
(29, 'Mica Ella', 'Sta.Maria', 'Samin', 'Rio Chico', '09999912345', 'SP-ICT-Larrypage', 'Grade 10', '245035049_618100065860639_5683929958113792759_n.png', '105679120087', 'mica@gmail.com', '$2y$10$ysujBLBhabRKJ2v8lICakuSEPTbRpS8P8O7IcKTl7xI2QVwtApH6.', '', '', '2021-10-13 07:36:39'),
(30, 'Joilyn', 'Guttierez', 'Aguilar', 'Rio Chico', '09817263541', 'Molave', 'Grade 10', '245035049_618100065860639_5683929958113792759_n.png', '10539120223', 'joilyn@gmail.com', '$2y$10$FdF3RZAKjZg2z3Hl/PtPUed6NroYVT6bgMquLmxsaPi8juFUaD7wS', '', '', '2021-10-13 07:37:57'),
(31, 'Jennica Mae', 'Ramos', 'Santos', 'Rio Chico', '09182736451', 'Yakal', 'Grade 10', '245035049_618100065860639_5683929958113792759_n.png', '105689130116', 'jennica@gmail.com', '$2y$10$aLVRxTXj8KYcUOpceYC1OurHSyWgYfZRinU255syv3o1hgk3faW0W', '', '', '2021-10-13 07:39:03'),
(32, 'Makey', 'Juit', 'Caba', 'Rio Chico', '09987656472', 'Mulawin', 'Grade 10', '245035049_618100065860639_5683929958113792759_n.png', '105373120226', 'makey@gmail.com', '$2y$10$aqg1RA8LXDp.qZdnDxxvI.ogF8Uuh/i4FGrG3rjx4MKGYKtbpp3Gq', '', '', '2021-10-13 07:40:21'),
(33, 'Ace', 'Mabagos', 'Delacruz', 'Rio Chico', '09876543211', 'Gas-A', 'Grade 11', '245035049_618100065860639_5683929958113792759_n.png', '105373050049', 'ace@gmail.com', '$2y$10$l4yPAduKwZ01A3gfFQQvb.N2o5O56ULdgtZIp7/Zp/lL4YQP4sFDa', '', '', '2021-10-13 07:42:31'),
(34, 'Maria ', 'Cruz', 'Santiago', 'Rio Chico', '09071551225', 'Gas-B', 'Grade 11', '245035049_618100065860639_5683929958113792759_n.png', '105366050167', 'maria@gmail.com', '$2y$10$cGFdyPmcmVXIncNF32nI3Ods7fFiQEOOc/WOAAsWIj2OLD4r1eFWy', '', '', '2021-10-13 07:43:36'),
(35, 'Nichole', 'Francine', 'Dalangin', 'Rio Chico', '09118374854', 'Humms-A', 'Grade 11', '245035049_618100065860639_5683929958113792759_n.png', '105356840012', 'nichole@gmail.com', '$2y$10$4RmArK9yPc/RVh7XBQ6KMuvR1I0N3Zmaheh2GfqC7roVpwd6YGSJy', '', '', '2021-10-13 07:44:56'),
(36, 'Aubrey', 'Mateo', 'Maducdoc', 'Rio Chico', '09071551225', 'Humms-B', 'Grade 11', '245035049_618100065860639_5683929958113792759_n.png', '105373419217', 'aubrey@gmail.com', '$2y$10$hTwa89kwQCBBBLcG6KhYpu5qOK/ymCm80WrbboF8w.niwMVz4rSBm', '', '', '2021-10-13 07:46:21'),
(37, 'Anne', 'Low', 'Santos', 'Rio Chico', '09071551225', 'Tvl-A', 'Grade 11', '245035049_618100065860639_5683929958113792759_n.png', '105366123956', 'anne@gmail.com', '$2y$10$oJq.Yeqe.Q1/ccykTo5MRORSQ2LQ2UhRVzxufgFeYxqAGDYBaPBZq', '', '', '2021-10-13 07:47:24'),
(38, 'Ellise', 'Pascual', 'Bansil', 'Rio Chico', '09118374854', 'Tvl-B', 'Grade 12', '245035049_618100065860639_5683929958113792759_n.png', '105316111621', 'ellise@gmail.com', '$2y$10$lClIc7HtQfe./KCylKwZdO6CdhwaGb1c5AOQABN2qmwDfWGgG58nu', '', '', '2021-10-13 07:48:42'),
(39, 'Charice', 'Bulacan', 'Bansil', 'Rio Chico', '09118374854', 'Humms-B', 'Grade 12', '245035049_618100065860639_5683929958113792759_n.png', '105327121722', 'charice@gmail.com', '$2y$10$74mBTeIr/yD9gKuCjEkrCO75E8jBBVKtmbVLYpQne/.OBCvtQ5Jz6', '', '', '2021-10-13 07:49:49'),
(40, 'Rain', 'Poro', 'Galang', 'Rio Chico', '09071551225', 'Gas-B', 'Grade 12', '245035049_618100065860639_5683929958113792759_n.png', '105338131823', 'rain@gmail.com', '$2y$10$IDn4L383C42nukokhpEVkOtXyNuthjZmArvjvbizCs8D3D2Ni/oXy', '', '', '2021-10-13 07:51:51'),
(41, 'Nikko', 'Nuiza', 'Pajarillaga', 'Rio Chico', '09118374854', 'Gas-A', 'Grade 12', '245035049_618100065860639_5683929958113792759_n.png', '105349141924', 'nikko@gmail.com', '$2y$10$Fd43PvVMkfrehecbSyIQkOu6DgwWE187hR5bbErVKaS.IehGPLAAG', '', '', '2021-10-13 07:53:09'),
(42, 'Mark', 'Joson', 'Bautista', 'Rio Chico', '09071551225', 'Humms-A', 'Grade 12', '245035049_618100065860639_5683929958113792759_n.png', '105351015205', 'mark@gmail.com', '$2y$10$bO88j.HL9ZAIMAFwcTFY9uMttJ20XUbHFWcIF4m8aIu3yIsQSFN3e', '', '', '2021-10-13 07:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admindocuments`
--

CREATE TABLE `tbl_admindocuments` (
  `adoc_id` int(11) NOT NULL,
  `adoc_title` varchar(100) NOT NULL,
  `adoc_file` varchar(100) NOT NULL,
  `adoc_description` varchar(100) NOT NULL,
  `adoc_path` varchar(100) NOT NULL,
  `adoc_filetype` varchar(100) NOT NULL,
  `adoc_filesize` varchar(100) NOT NULL,
  `adoc_schoolyear` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctype`
--

CREATE TABLE `tbl_doctype` (
  `doc_id` int(11) NOT NULL,
  `doc_type` varchar(100) NOT NULL,
  `doc_owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctype`
--

INSERT INTO `tbl_doctype` (`doc_id`, `doc_type`, `doc_owner`) VALUES
(13, 'Class Record', 'Teacher'),
(14, 'Project', 'Student'),
(15, 'Quiz', 'Student'),
(16, 'Lesson', 'Teacher'),
(17, 'Credential', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scanfile`
--

CREATE TABLE `tbl_scanfile` (
  `scanFile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `Path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_scanfile`
--

INSERT INTO `tbl_scanfile` (`scanFile_id`, `user_id`, `title`, `description`, `Path`, `created_at`) VALUES
(8, 35, '', '', '../../storage/scannedfiles/2251-21120820123174997.jpg', '2021-12-08 20:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `std_id` int(11) NOT NULL,
  `std_lrn` varchar(100) NOT NULL,
  `std_lname` varchar(100) NOT NULL,
  `std_fname` varchar(100) NOT NULL,
  `std_mname` varchar(100) NOT NULL,
  `std_gender` varchar(100) NOT NULL,
  `year_section` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`std_id`, `std_lrn`, `std_lname`, `std_fname`, `std_mname`, `std_gender`, `year_section`, `school_year`) VALUES
(11, 'GT18-12345', 'Mabagos', 'John David', 'Elipane', 'Male', '10 - SP-ICT-LARRYPAGE', '2020-2021'),
(12, 'GT18-0016', 'Dela Cruz', 'Aaron', 'Diaz', 'Male', '10 - SP-ICT-LARRYPAGE', '2020-2021'),
(15, 'GT18-00128', 'Santiago', 'Mary Nina', 'Fajardo', 'Female', '10 - SP-ICT-LARRYPAGE', '2020-2021'),
(17, 'GT18-00165', 'Gutierrez', 'Hannah Grace', 'Dela Cruz', 'Female', '10 - SP-ICT-LARRYPAGE', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentdocuments`
--

CREATE TABLE `tbl_studentdocuments` (
  `sdoc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_lrn` varchar(100) NOT NULL,
  `sdoc_title` varchar(100) NOT NULL,
  `sdoc_file` varchar(100) NOT NULL,
  `sdoc_description` varchar(100) NOT NULL,
  `sdoc_path` varchar(100) NOT NULL,
  `sdoc_tag` varchar(100) NOT NULL,
  `sdoc_classification` varchar(100) NOT NULL,
  `sdoc_filetype` varchar(100) NOT NULL,
  `sdoc_filesize` varchar(100) NOT NULL,
  `sdoc_yearsection` varchar(100) NOT NULL,
  `sdoc_schoolyear` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentdocuments`
--

INSERT INTO `tbl_studentdocuments` (`sdoc_id`, `user_id`, `student_lrn`, `sdoc_title`, `sdoc_file`, `sdoc_description`, `sdoc_path`, `sdoc_tag`, `sdoc_classification`, `sdoc_filetype`, `sdoc_filesize`, `sdoc_yearsection`, `sdoc_schoolyear`, `created_at`) VALUES
(3, 14, 'GT18-00165', 'Activity Paper', '', 'Abhfrgvb ', '../storage/163889201551429.txt', 'Activity', 'Form 138', 'txt', '59', '12 - MINECRAFT', '2021-2022', '2021-12-07 23:46:55'),
(4, 35, 'GT18-12345', 'Code', '', 'Blah Blah Blah Blah ', '../storage/163867946365257.zip', 'File', 'Form 138', 'zip', '5505963', '11 - GAS A', '2021-2022', '2021-12-05 12:44:23'),
(6, 35, 'GT18-00165', 'Profile', '', 'Fire Profile ', '../storage/163867963349427.jpg', 'Image', 'Form 138', 'jpg', '193102', '11 - GAS A', '2021-2022', '2021-12-05 12:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacherdocuments`
--

CREATE TABLE `tbl_teacherdocuments` (
  `tdoc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tdoc_title` varchar(100) NOT NULL,
  `tdoc_file` varchar(100) NOT NULL,
  `tdoc_description` varchar(100) NOT NULL,
  `tdoc_path` varchar(100) NOT NULL,
  `tdoc_tag` varchar(100) NOT NULL,
  `tdoc_classification` varchar(100) NOT NULL,
  `tdoc_filetype` varchar(100) NOT NULL,
  `tdoc_filesize` varchar(100) NOT NULL,
  `tdoc_yearsection` varchar(100) NOT NULL,
  `tdoc_schoolyear` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_lname` varchar(100) NOT NULL,
  `u_fname` varchar(100) NOT NULL,
  `u_mname` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` text NOT NULL,
  `u_address` varchar(100) NOT NULL,
  `u_contact` varchar(100) NOT NULL,
  `u_photo` varchar(100) NOT NULL,
  `u_role` varchar(100) NOT NULL,
  `u_gender` varchar(100) NOT NULL,
  `u_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `year_section` varchar(100) NOT NULL DEFAULT '0 - NONE',
  `school_year` varchar(100) NOT NULL DEFAULT '0000-0000',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_lname`, `u_fname`, `u_mname`, `u_email`, `u_password`, `u_address`, `u_contact`, `u_photo`, `u_role`, `u_gender`, `u_status`, `year_section`, `school_year`, `created_at`) VALUES
(13, '', 'Administrator', '', 'admin@gmail.com', '$2y$10$ZjioDXpCXdReUfIQlNG3yuNIRxyCoPZIu9F/zXXANw4TeYGwBUzYe', 'Barangay Rio Chico GTNE', '09071551225', 'Hannah.jpg', 'ADMIN', 'Female', 'Active', '', '', '2021-12-08 22:15:59'),
(47, 'Quijano', 'Fatima', 'Enriquez', 'fatima@gmail.com', '$2y$10$z3TJD/SWCfnNXHq1BkiD4.rtodcLwR6bk0vQU8ylwgHPYfVqIRR8W', 'Barangay Rio Chico', '09071551225', 'teach-19.jpg', 'TEACHER', 'Female', 'Active', '10 - SP-ICT-LARRYPAGE', '2020-2021', '2021-12-09 08:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearsection`
--

CREATE TABLE `tbl_yearsection` (
  `ys_id` int(11) NOT NULL,
  `ys_yearsection` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_yearsection`
--

INSERT INTO `tbl_yearsection` (`ys_id`, `ys_yearsection`) VALUES
(36, '10 - SP-ICT-LARRYPAGE'),
(22, '10 - YAKAL'),
(17, '11 - GAS A'),
(18, '11 - GAS B'),
(15, '11 - HUMMS A'),
(16, '11 - HUMMS B'),
(13, '11 - TVL A'),
(14, '11 - TVL B'),
(11, '12 - GAS A'),
(12, '12 - GAS B'),
(9, '12 - HUMMS A'),
(10, '12 - HUMMS B'),
(7, '12 - TVL A'),
(8, '12 - TVL B'),
(33, '7 - CANVA'),
(32, '7 - SP-ICT-CANVA'),
(30, '8 - SANTAN'),
(28, '8 - SP-ICT-ZOOM'),
(26, '9 - BANABA'),
(24, '9 - SP-ICT-MINECRAFT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `fname`, `mname`, `lname`, `name`, `contact`, `address`, `email`, `password`, `image`, `role`, `section`, `subject`, `year`, `datetime`) VALUES
(22, 0, 'Emma Esther', 'Bianzon', 'Bautista', '', '09090988543', 'Sampaguita', 'emma@gmail.com', '$2y$10$ToFisu2ifAYkP65GHLOZoedQ0riyKZRdW79IQxyG5qB.10llmluBG', 'teach-0.jpg', 'TEACHER', 'SP-ICT-Canva', 'English', 'Grade 7', '2021-10-13 09:01:57'),
(23, 0, 'Marites', 'Guyacao', 'Bote', '', '09118374854', 'Pob. East', 'marites@gmail.com', '$2y$10$1h6XdZIk00Sch.9FZw2kJuGaLWL2HGZpWWEee.eZJHq7O4SVBQmKu', 'teach-1.jpg', 'TEACHER', 'Bayabas', 'Mathematics', 'Grade 7', '2021-10-13 09:06:05'),
(24, 0, 'Maricel', 'Hidalgo', 'Caballero', '', '09071551225', 'Concepcion', 'maricel@gmail.com', '$2y$10$2vMmlefAfk0pXS3Xnw497ufUKl04sD/PV15mvI6/iZZvUWjDnJHK2', 'teach-2.jpg', 'TEACHER', 'Banaba', 'T.L.E', 'Grade 9', '2021-10-13 09:06:59'),
(25, 0, 'Vannie Rose', 'Sinuto', 'Gonzales', '', '09071551225', 'Rio Chico', 'vannie@gmail.com', '$2y$10$e2wxmY2Ed62glHefaMlWWekV/oP3APOgQJInBbhvJp.gCTzJ2jBRi', 'teach-3.jpg', 'TEACHER', '', '', '', '2021-10-13 08:03:55'),
(26, 0, 'Alma', 'German', 'Par', '', '09118374854', 'Rio Chico', 'alma@gmail.com', '$2y$10$oFnEyBRSxJNAlNn/yyl8he4kN125VLcIqkYjsXwXLgfGT.wkg2xZe', 'teach-4.jpg', 'TEACHER', '', '', '', '2021-10-13 08:04:37'),
(27, 0, 'Maria Teressa', 'Mabagos', 'Termulo', '', '09071551225', 'Rio Chico', 'mteressa@gmail.com', '$2y$10$H9xcPULXnuAAMWL/5ghQleEP4cxv0dKc0jo2qkwNwJfln9Gs6A6l.', 'teach-5.jpg', 'TEACHER', '', '', '', '2021-10-13 08:05:35'),
(28, 0, 'Sharee Rome', 'Abesamis', 'Miranda', '', '09118374854', 'Rio Chico', 'sharee@gmail.com', '$2y$10$lWMSWJmjZjCjTxnST3PXBuJJYNp46XCPYAIE1FeOGi8sy.d1Rywd.', 'teach-6.jpg', 'TEACHER', '', '', '', '2021-10-13 08:06:18'),
(29, 0, 'Maricris', 'Saldivar', 'Masilang', '', '09118374854', 'Concepcion', 'maricirs@gmail.com', '$2y$10$ygI6Yj0jXDDXT4qnFVB4CeLYJSikMTEb0fMXWiMzw7LkuEhCf1l92', 'teach-7.jpg', 'TEACHER', '', '', '', '2021-10-13 08:07:06'),
(30, 0, 'Maureen', 'Bote', 'Torres', '', '09071551225', 'Nazareth', 'maureen@gmail.com', '$2y$10$3eP1iKkR/px0vcw4.96bHe4vNk7scMQV8t69Ve3vkj5LZx6E9WoYy', 'teach-8.jpg', 'TEACHER', '', '', '', '2021-10-13 08:07:57'),
(31, 0, 'Efren', 'Pascual', 'Libunao', '', '09118374854', 'Nazareth', 'efren@gmail.com', '$2y$10$iBicISHRKH7XmtXRyNV12OSsyxzXA7yxlGcmqU26XyuahOPxmk.j6', 'teach-9.jpg', 'TEACHER', '', '', '', '2021-10-13 08:09:19'),
(32, 0, 'Polynel', 'Pajarillaga', 'Bautista', '', '09118374854', 'Sampaguita', 'polynel@gmail.com', '$2y$10$KQ/6/QU6doHHoUeMzTZ/1ehcsYVy8cgP8MIbc.1jXnHNq8sXB78KG', 'teach-10.jpg', 'TEACHER', '', '', '', '2021-10-13 08:10:30'),
(33, 0, 'Mina', 'Santos', 'Bulawit', '', '09071551225', 'Concepcion', 'mina@gmail.com', '$2y$10$P3x6ZmpzgOQ8v56kcOujju4fPiNersVzOgVLk/yI7seGHrVh8PWbO', 'teach-11.jpg', 'TEACHER', '', '', '', '2021-10-13 08:11:22'),
(34, 0, 'Maxima', 'Arellano', 'Gonzales', '', '09071551225', 'Rio Chico', 'maxima@gmail.com', '$2y$10$t2PG4VM3pUTCuikn32ZFkevBRBhgGDKUpPZkuu5wYS2FIZXmYdAoS', 'teach-12.jpg', 'TEACHER', '', '', '', '2021-10-13 08:12:23'),
(35, 0, 'Girly', 'Manzon', 'Oltiveros', '', '09118374854', 'Rio Chico', 'girly@gmail.com', '$2y$10$8RrWC6Z8ZjJ8q08pMNRvDOovRvk1RMmTt8rmuEg619jCZrsh.iJzK', 'teach-13.jpg', 'TEACHER', '', '', '', '2021-10-13 08:13:12'),
(36, 0, 'Revelyn', 'Bote', 'Soriano', '', '09071551225', 'Poblacio Central', 'revelyn@gmail.com', '$2y$10$vCc89/HBcaOhli5BpaI9ouuuLcKPfKby4wG9IOZ9XqL0iPe2UYr4m', 'teach-15.jpg', 'TEACHER', '', '', '', '2021-10-13 08:14:36'),
(37, 0, 'Abegail', 'Bautista', 'Puno', '', '09118374854', 'Sampaguita', 'abegail@gmail.com', '$2y$10$w3pty9H44IQj8LRYwsEtMuKV5eph3SMH7zmUTI4GRtOiBUYLief9a', 'teach-14.jpg', 'TEACHER', '', '', '', '2021-10-13 08:15:34'),
(38, 0, 'Winnie', 'Paloma', 'Aglipay', '', '09071551225', 'Bago', 'winnie@gmail.com', '$2y$10$LIGSYM8JRCldvuR1sMyl3ey27Vl0fUcny.mpzfnmZ10EwwJNXLhXq', 'teach-16.jpg', 'TEACHER', '', '', '', '2021-10-13 08:16:46'),
(39, 0, 'Glecie', 'Aberin', 'Ferrer', '', '09071551225', 'Pob. West', 'glecie@gmail.com', '$2y$10$Yu6YJ7ZNH0bHvzXphTasWecdGgrlp7IgOZrLtLzXimr4HVSiGwbhG', 'teach-17.jpg', 'TEACHER', '', '', '', '2021-10-13 08:17:53'),
(40, 0, 'Donna May', 'Zuniga', 'Padolina', '', '09071551225', 'Pob. Central', 'donna@gmail.com', '$2y$10$wsO61v77WQnBF8P.0.wib.0S2ggwqpkBss1w.kmr5GUaYJUjIbIIu', 'teach-18.jpg', 'TEACHER', '', '', '', '2021-10-13 08:19:25'),
(41, 0, 'Fatima', 'Enriquez', 'Quijano', '', '09071551225', 'Rio Chico', 'fatima@gmail.com', '$2y$10$hoIT02d7jml9xpX51AHrkeP/IB68bR4XhliXpRbC4VuXI5TwfLomS', 'teach-19.jpg', 'TEACHER', '', '', '', '2021-10-13 08:20:49'),
(42, 0, 'Randolph', 'Mateo', 'Abesamis', '', '09071551225', 'Penaranda', 'randolph@gmail.com', '$2y$10$v/inHPvpruamGG1yiNiCK.IIiyTlANvuvH5OjwTMIrdiF.jFcnScy', 'teach-21.jpg', 'TEACHER', '', '', '', '2021-10-13 08:21:42'),
(43, 0, 'Rowena', 'Carlos', 'Alarcon', '', '09071551225', 'Concepcio', 'rowena@gmail.com', '$2y$10$JcQnyIdSUkCE4zABybfr7.1HqJBneQB1GCxU/BEmFjUZlo7cmdZae', 'teach-22.jpg', 'TEACHER', '', '', '', '2021-10-13 08:22:29'),
(44, 0, 'Kevin', 'Padolina', 'Dalangin', '', '09071551225', 'Concepcion', 'kevin@gmail.com', '$2y$10$4jVnK2mhV7ExTnnWVzmla.slFMLWHitRHLrMppfSPTGLGc7j0Nf6O', 'teach-23.jpg', 'TEACHER', '', '', '', '2021-10-13 08:23:12'),
(45, 0, 'Esmeraldo', 'Bote', 'Dizon', '', '09071551225', 'Concepcion', 'esme@gmail.com', '$2y$10$KBIOIaNAUkcTYZtwe6Edh.r.AXq.t5Jv3Vmj1JQ54TZs9jNdV28cG', 'teach-24.jpg', 'TEACHER', '', '', '', '2021-10-13 08:24:02'),
(46, 0, 'Cornelia', 'Diaz', 'Pelayo', '', '09071551225', 'Sibog', 'cornelia@gmail.com', '$2y$10$0JvSZ5p8kciLDTlHAKoBP.GT6WFzFhs9PpftASavHScp0TJ39JMoe', 'teach-25.jpg', 'TEACHER', '', '', '', '2021-10-13 08:24:43'),
(47, 0, 'Sheiryl', 'Bulacan', 'Tiongson', '', '09118374854', 'Concepcion', 'Shieryl@gmail.com', '$2y$10$n3FLviQrg.ZXi.Jl4/zF/eyuFgIvynF9rC03J5giZcIoNv9bulLQO', 'teach-26.jpg', 'TEACHER', '', '', '', '2021-10-13 08:25:35'),
(48, 0, 'Anne Pearl', 'Arellano', 'Daganta', '', '09071551225', 'Rio Chico', 'annepearl@gmail.com', '$2y$10$uUTqP9S8x43pMQH1e/Trou13U/cNzw943HyJf.szSkCRbJbf91pnW', 'teach-27.jpg', 'TEACHER', '', '', '', '2021-10-13 08:26:28'),
(49, 0, 'Edena', 'Quijano', 'Delo Santos', '', '09118374854', 'Concepcion', 'edena@gmail.com', '$2y$10$sW.PpRrQKjlce/B8Cw.8K.Ou/CYF4cQPoiTRCSmM9zJEw07em2HHu', 'teach-28.jpg', 'TEACHER', '', '', '', '2021-10-13 08:27:06'),
(50, 0, 'Sedrick', 'Reyes', 'Fulgencio', '', '09118374854', 'Penaranda', 'Sedrick@gmail.com', '$2y$10$.NjK4LRfs7rr5ve7TtwbAOoyPx87DZgEYv4dQym4pz0rsPU3qwJKy', 'teach-29.jpg', 'TEACHER', '', '', '', '2021-10-13 08:27:48'),
(51, 0, 'Jaime', 'Reyes', 'Bernardo', '', '09118374854', 'Rio Chico', 'jaime@gmail.com', '$2y$10$X59kDI7z9a6VFrimD7L4vuu6Vx/qOMBeLZgVrA.i0O07b7PmtmPFy', 'teach-30.jpg', 'TEACHER', 'SP-ICT-Canva', 'Mathematics', 'Grade 7', '2021-10-13 09:57:57'),
(52, 0, 'Aaron', 'Diaz', 'Delacruz', '', '09510988352', 'Rio Chico', 'ad8123978@gmail.com', '$2y$10$DVOp485SxsnZT8uouPuzUOqaiOT/mrW9YdrvTiMCXFgf9GtqEVuOa', 'download.png', 'ADMIN', '', '', '', '2021-10-13 08:34:18'),
(53, 0, 'Hannah Grace', 'Dealacruz', 'Gutierrez', '', '09071551225', 'Padolina', 'gutierrezhannah70@gmail.com', '$2y$10$0/eE3UKLOBMo7fzgploKJu2bMWmzVZkSIrwlOfoRCp9SfgYREn3cK', 'download.png', 'ADMIN', '', '', '', '2021-10-13 08:35:21'),
(54, 0, 'Mary Nina', 'Fajardo', 'Santiago', '', '09071551225', 'San Pedro', 'Mary@gmail.com', '$2y$10$fufF51dbiEzKYJQK/1XgQ.be1Txr8cekd4Bx6aHZPnJSDz3mIjHEO', 'download.png', 'ADMIN', '', '', '', '2021-10-13 08:36:51'),
(55, 0, 'John David', 'Elipane', 'Mabagos', '', '09453941252', 'Rio Chico', 'g.i.jd0850@gmail.com', '$2y$10$rBfW1LaQ2OV16gzSU.VsoOlJylkVNstLHvhCVKqH5YZZX5ii67bpa', 'download.png', 'ADMIN', '', '', '', '2021-10-13 08:38:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `request_message`
--
ALTER TABLE `request_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lrn` (`lrn`);

--
-- Indexes for table `tbl_admindocuments`
--
ALTER TABLE `tbl_admindocuments`
  ADD PRIMARY KEY (`adoc_id`);

--
-- Indexes for table `tbl_doctype`
--
ALTER TABLE `tbl_doctype`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `doc_type` (`doc_type`);

--
-- Indexes for table `tbl_scanfile`
--
ALTER TABLE `tbl_scanfile`
  ADD PRIMARY KEY (`scanFile_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `tbl_studentdocuments`
--
ALTER TABLE `tbl_studentdocuments`
  ADD PRIMARY KEY (`sdoc_id`);

--
-- Indexes for table `tbl_teacherdocuments`
--
ALTER TABLE `tbl_teacherdocuments`
  ADD PRIMARY KEY (`tdoc_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_yearsection`
--
ALTER TABLE `tbl_yearsection`
  ADD PRIMARY KEY (`ys_id`),
  ADD UNIQUE KEY `ys_yearsection` (`ys_yearsection`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_message`
--
ALTER TABLE `request_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_admindocuments`
--
ALTER TABLE `tbl_admindocuments`
  MODIFY `adoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_doctype`
--
ALTER TABLE `tbl_doctype`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_scanfile`
--
ALTER TABLE `tbl_scanfile`
  MODIFY `scanFile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_studentdocuments`
--
ALTER TABLE `tbl_studentdocuments`
  MODIFY `sdoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_teacherdocuments`
--
ALTER TABLE `tbl_teacherdocuments`
  MODIFY `tdoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_yearsection`
--
ALTER TABLE `tbl_yearsection`
  MODIFY `ys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
