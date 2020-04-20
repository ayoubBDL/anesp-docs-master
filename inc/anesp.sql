-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2020 at 09:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anesp`
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='Files data base';

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `date`, `url`, `preview_url`) VALUES
(1, 'Recrutement Presentation', '2020-04-03', './media/recrutement_presentation.pdf', 'https://drive.google.com/file/d/10qVaPRbdJ3RrSdg-JZ_EmO_-z1OSYser/preview'),
(2, 'ANESP internships', '2020-04-03', './media/anesp_internships.pdf', 'https://drive.google.com/file/d/19gW3MwHT-Xz_vFoG0GmQCFS6EcyWN2Xc/preview'),
(3, 'Job Description', '2020-04-03', './media/job_description.pdf', 'https://drive.google.com/file/d/1Xwk2lPP4fl3knKERDxUYWduRJz5S2b0h/preview'),
(4, 'Standars And Practices', '2020-04-03', './media/standars_and_practices.pdf', 'https://drive.google.com/file/d/1Bx2IEbeDGpWFQiFC5iS7Tb9aRg2NUWks/preview'),
(5, 'Acronyms Tongue', '2020-04-03', './media/acronyms_tongue.pdf', 'https://drive.google.com/file/d/1rR_KXwdgD3mFaB9ZbWStsomIxUpgAM81/preview'),
(6, 'Anesp Business Presentation', '2020-04-16', './media/anesp_business_presentation.pdf', 'https://drive.google.com/file/d/1ZcZLSfm32bz9kENpaWO1AyAr2_rn--M7/preview');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `password`, `email`) VALUES
(1, 'ayoub', 'bdl', 'ayoub', 'ayoub', 'aboudallaa@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
