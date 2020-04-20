-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 03, 2020 at 06:00 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `url` text NOT NULL,
  `preview_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Files data base';

--
-- Dumping data for table `files`
--

$sql = "INSERT INTO  `files` (`id`, `title`, `date`, `url`,`preview_url`) VALUES
(1, 'Recrutement Presentation', '2020-04-03', './media/recrutement_presentation.pdf','https://drive.google.com/file/d/10qVaPRbdJ3RrSdg-JZ_EmO_-z1OSYser/preview'),
(2, 'ANESP internships', '2020-04-03', './media/anesp_internships.pdf','https://drive.google.com/file/d/19gW3MwHT-Xz_vFoG0GmQCFS6EcyWN2Xc/preview'),
(3, 'Job Description', '2020-04-03', './media/job_description.pdf','https://drive.google.com/file/d/1Xwk2lPP4fl3knKERDxUYWduRJz5S2b0h/preview'),
(4, 'Standars And Practices', '2020-04-03', './media/standars_and_practices.pdf','https://drive.google.com/file/d/1Bx2IEbeDGpWFQiFC5iS7Tb9aRg2NUWks/preview'),
(5, 'Acronyms Tongue', '2020-04-03', './media/acronyms_tongue.pdf','https://drive.google.com/file/d/1rR_KXwdgD3mFaB9ZbWStsomIxUpgAM81/preview'),
(6, 'Anesp Business Presentation', '2020-04-16', './media/anesp_business_presentation.pdf','https://drive.google.com/file/d/1ZcZLSfm32bz9kENpaWO1AyAr2_rn--M7/preview');";


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
