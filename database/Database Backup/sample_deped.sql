-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_deped`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacfilestbl`
--

CREATE TABLE `bacfilestbl` (
  `bacfile_id` int(11) NOT NULL,
  `bacfile_type` varchar(50) NOT NULL,
  `bacfile_title` varchar(200) NOT NULL,
  `bacfile_link` longtext NOT NULL,
  `bacfile_date` datetime NOT NULL DEFAULT current_timestamp(),
  `bacfile_procurementYear` year(4) DEFAULT NULL,
  `bacfile_procurementType` varchar(50) DEFAULT NULL,
  `bacfile_publishDate` date DEFAULT NULL,
  `bacfile_closingDate` date DEFAULT NULL,
  `bacfile_awardedTo` varchar(200) DEFAULT NULL,
  `bacfile_referenceNum` varchar(20) DEFAULT NULL,
  `bacfile_procurementMode` varchar(50) DEFAULT NULL,
  `bacfile_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `bacfilesvw`
-- (See below for the actual view)
--
CREATE TABLE `bacfilesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`date` datetime
,`procurement_year` year(4)
,`procurement_type` varchar(50)
,`publish_date` date
,`closing_date` date
,`awarded_to` varchar(200)
,`reference_number` varchar(20)
,`procurement_mode` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `carouselvw`
-- (See below for the actual view)
--
CREATE TABLE `carouselvw` (
`id` int(11)
,`name` longtext
,`title` varchar(100)
,`description` varchar(200)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dailyvisitorsvw`
-- (See below for the actual view)
--
CREATE TABLE `dailyvisitorsvw` (
`ip address` text
,`date` date
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `dailyvisitstbl`
--

CREATE TABLE `dailyvisitstbl` (
  `daily_visitors_id` int(11) NOT NULL,
  `daily_visitors_ip_address` text NOT NULL,
  `daily_visitors_date` date NOT NULL DEFAULT current_timestamp(),
  `daily_visitors_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departmentstbl`
--

CREATE TABLE `departmentstbl` (
  `department_id` varchar(20) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_contact` varchar(30) NOT NULL,
  `department_email` varchar(50) NOT NULL,
  `department_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmentsvw`
-- (See below for the actual view)
--
CREATE TABLE `departmentsvw` (
`id` varchar(20)
,`name` varchar(100)
,`contact` varchar(30)
,`email` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `downloadablefilesvw`
-- (See below for the actual view)
--
CREATE TABLE `downloadablefilesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`date` datetime
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `elemschoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `elemschoolsvw` (
`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `filestbl`
--

CREATE TABLE `filestbl` (
  `file_id` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_title` varchar(200) NOT NULL,
  `file_link` longtext NOT NULL,
  `file_date` datetime NOT NULL DEFAULT current_timestamp(),
  `file_department` varchar(20) DEFAULT NULL,
  `file_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `filesvw`
-- (See below for the actual view)
--
CREATE TABLE `filesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`department` varchar(20)
,`date` datetime
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `highschoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `highschoolsvw` (
`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `imagestbl`
--

CREATE TABLE `imagestbl` (
  `image_id` int(11) NOT NULL,
  `image_name` longtext NOT NULL,
  `image_title` varchar(100) NOT NULL,
  `image_description` varchar(200) NOT NULL,
  `image_type` varchar(20) NOT NULL,
  `image_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issuancescategorytbl`
--

CREATE TABLE `issuancescategorytbl` (
  `issuances_type` varchar(50) NOT NULL,
  `issuances_type_name` varchar(50) NOT NULL,
  `issuances_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `issuancescategoryvw`
-- (See below for the actual view)
--
CREATE TABLE `issuancescategoryvw` (
`type` varchar(50)
,`name` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `issuancestbl`
--

CREATE TABLE `issuancestbl` (
  `issuances_id` int(11) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `issuances_title` varchar(200) NOT NULL,
  `issuances_link` longtext NOT NULL,
  `issuances_number` varchar(20) NOT NULL,
  `issuances_date` date NOT NULL,
  `issuances_type` varchar(50) NOT NULL,
  `issuances_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `issuancesvw`
-- (See below for the actual view)
--
CREATE TABLE `issuancesvw` (
`id` int(11)
,`tracking_number` varchar(50)
,`title` varchar(200)
,`link` longtext
,`number` varchar(20)
,`date` date
,`type` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jhsschoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `jhsschoolsvw` (
`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `materialfilesvw`
-- (See below for the actual view)
--
CREATE TABLE `materialfilesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`department` varchar(20)
,`date` datetime
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `officestbl`
--

CREATE TABLE `officestbl` (
  `offices_id` int(11) NOT NULL,
  `department_id` varchar(20) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_picture` longtext NOT NULL,
  `employee_office` varchar(100) NOT NULL,
  `employee_position` varchar(200) NOT NULL,
  `employee_post` varchar(50) NOT NULL,
  `employee_type` varchar(100) NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `employee_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `officesvw`
-- (See below for the actual view)
--
CREATE TABLE `officesvw` (
`id` int(11)
,`department` varchar(100)
,`name` varchar(50)
,`picture` longtext
,`office` varchar(100)
,`position` varchar(200)
,`post` varchar(50)
,`type` varchar(100)
,`email` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `procurementfilesvw`
-- (See below for the actual view)
--
CREATE TABLE `procurementfilesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`date` datetime
,`pyear` year(4)
,`ptype` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `schoolstbl`
--

CREATE TABLE `schoolstbl` (
  `schooltbl_id` int(11) NOT NULL,
  `school_id` varchar(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` varchar(200) NOT NULL,
  `school_principal` varchar(50) NOT NULL,
  `school_contact` varchar(30) NOT NULL,
  `school_link` longtext NOT NULL,
  `school_email` varchar(50) NOT NULL,
  `school_district` varchar(5) NOT NULL,
  `school_type` varchar(20) NOT NULL,
  `school_shsAvailability` varchar(11) NOT NULL,
  `school_spedAvailablity` varchar(11) NOT NULL,
  `school_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `schoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `schoolsvw` (
`school_id` int(11)
,`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`shs_availability` varchar(11)
,`sped_availability` varchar(11)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `servicestbl`
--

CREATE TABLE `servicestbl` (
  `services_id` int(11) NOT NULL,
  `services_title` varchar(100) NOT NULL,
  `services_description` longtext NOT NULL,
  `services_link` longtext NOT NULL,
  `services_icon` text NOT NULL,
  `services_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicestbl`
--

INSERT INTO `servicestbl` (`services_id`, `services_title`, `services_description`, `services_link`, `services_icon`, `services_status`) VALUES
(1, 'SEND US YOUR FEEDBACK', 'Online Feedback Form', 'https://docs.google.com/forms/d/e/1FAIpQLScp81_6TY8Bbgj6AShy33Vc0NLpvRaEc6YHFfpDC8qov4oPPw/viewform?fbclid=IwAR26DFy2TFXLzGvAa_csNJRnaZZhgcdPRiA15L7-YVHkfdEj0Xd6Kj-ijXI', 'mdi mdi-book-open-variant', 'active'),
(2, 'DEPED MANILA E-LIBRARY', 'Deped Manila E-Library', 'https://sites.google.com/depedmanila.net/depedmanila-e-library?fbclid=IwAR1Xl7lOouFN-_pZjzG2LGJoRivq0PlJW85SWpX9OCDF9u5t7n8iy_CVBa4', 'mdi mdi-book-open-page-variant', 'active'),
(3, 'RESET DEPED EMAIL', 'Request to reset your DepEd Email', 'https://forms.gle/hmdzvWR5g29WQiEx8', 'mdi mdi-google', 'active'),
(4, 'CLIENT SATISFACTORY SURVEY', 'Client Satisfactory Survey', 'https://docs.google.com/forms/d/e/1FAIpQLScBxijSldifsao8d8tlnbThfIokvNtKJWpRO1upKcwc4xpFRw/viewform?fbclid=IwAR3l1de7NsOIe_exJbmFe8AVZop6NqfX4fwUFKENnbuk-gnLW9V7HByQmWw', 'mdi mdi-gmail', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `servicesvw`
-- (See below for the actual view)
--
CREATE TABLE `servicesvw` (
`id` int(11)
,`title` varchar(100)
,`description` longtext
,`link` longtext
,`status` varchar(11)
,`icon` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `shsschoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `shsschoolsvw` (
`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `socialmediatbl`
--

CREATE TABLE `socialmediatbl` (
  `socialMedia_id` int(11) NOT NULL,
  `socialMedia_type` varchar(50) NOT NULL,
  `socialMedia_link` longtext NOT NULL,
  `socialMedia_title` longtext NOT NULL,
  `socialMedia_post` longtext NOT NULL,
  `socialMedia_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmediatbl`
--

INSERT INTO `socialmediatbl` (`socialMedia_id`, `socialMedia_type`, `socialMedia_link`, `socialMedia_title`, `socialMedia_post`, `socialMedia_status`) VALUES
(1, 'youtube', 'https://www.youtube.com/@depedmanilaYT/featured', '2023 MANILA RESEARCH CONGRESS', 'https://www.youtube.com/embed/rt0Uss9GLlc', 'active'),
(2, 'facebook', 'https://www.facebook.com/DepEdManilaOfficial/', 'VACANCIES FOR VARIOUS NON-TEACHING POSITIONS IN THE DIVISION OF CITY SCHOOLS, MANILA. ', 'https://www.facebook.com/DepEdManilaOfficial/posts/pfbid0fv8PXCo42Ee7MoyUjVno7qMRMSowogKc3TJRvFfRctxqc9Y9nhFwTzJqxAJFh59Nl', 'active'),
(3, 'facebook', 'https://www.facebook.com/DepEdManilaOfficial/', 'Vacancy for Registrar I position in the Division of Manila', 'https://www.facebook.com/DepEdManilaOfficial/posts/pfbid02PLCqk7q5MLdbDC6A956C5TsVtf9gvbvvSNthpE5rE9SRxvmbPoR8AGY4cD8jepBgl', 'active'),
(4, 'facebook', 'https://www.facebook.com/DepEdManilaOfficial/', 'OPENING OF APPLICATION FOR HEAD TEACHER III AND VI POSITIONS IN THE DIVISION OF CITY SCHOOLS MANILA.', 'https://www.facebook.com/DepEdManilaOfficial/posts/pfbid07PdgPZ9FCouMvpxGFiwM4h3ULTHHfz4dKDMugp2nMeAFbKDJnPMt2he23uvqXkz5l', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `socialmediavw`
-- (See below for the actual view)
--
CREATE TABLE `socialmediavw` (
`id` int(11)
,`type` varchar(50)
,`link` longtext
,`title` longtext
,`post` longtext
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `spedschoolsvw`
-- (See below for the actual view)
--
CREATE TABLE `spedschoolsvw` (
`id` varchar(11)
,`name` varchar(100)
,`address` varchar(200)
,`principal` varchar(50)
,`contact` varchar(30)
,`link` longtext
,`email` varchar(50)
,`district` varchar(5)
,`type` varchar(20)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `timelogtbl`
--

CREATE TABLE `timelogtbl` (
  `time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_action` longtext NOT NULL,
  `log_date` date NOT NULL,
  `log_time` time NOT NULL,
  `log_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timelogtbl`
--

INSERT INTO `timelogtbl` (`time_id`, `user_id`, `log_action`, `log_date`, `log_time`, `log_status`) VALUES
(3, 4, 'ict kev Logged Out', '2024-03-30', '14:27:50', 'active'),
(4, 3, 'ict jon Logged In', '2024-03-30', '14:27:56', 'active'),
(5, 3, 'ict jon Logged Out', '2024-03-30', '14:28:05', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `timelogvw`
-- (See below for the actual view)
--
CREATE TABLE `timelogvw` (
`id` int(11)
,`user_id` int(11)
,`username` varchar(50)
,`action` longtext
,`date` date
,`time` time
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `transparencyfilesvw`
-- (See below for the actual view)
--
CREATE TABLE `transparencyfilesvw` (
`id` int(11)
,`type` varchar(50)
,`title` varchar(200)
,`link` longtext
,`date` datetime
,`publish_date` date
,`closing_date` date
,`awarded_to` varchar(200)
,`reference_number` varchar(20)
,`procurement_mode` varchar(50)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` longtext NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_profile` longtext NOT NULL,
  `user_status` varchar(11) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`user_id`, `user_username`, `user_email`, `user_password`, `user_type`, `user_profile`, `user_status`) VALUES
(1, 'ict michael', 'michaelangelo.serban@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'superadmin', '', 'active'),
(2, 'ict marlon', 'marlon.cotanda@deped.gov.ph@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'superadmin', '', 'active'),
(3, 'ict jon', 'jon.raguini@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'superadmin', '', 'active'),
(4, 'ict kev', 'kevin.flogen@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'admin', '', 'active'),
(5, 'ict aj', 'albertjames.macaraeg@deped.gov.ph@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'superadmin', '', 'active'),
(10, 'ict trainee', 'trainee@deped.gov.ph', '$argon2id$v=19$m=65536,t=4,p=1$THZUYk5mT2d3Q08vSk9xdA$8sgkkUr1jJJepcJazBt+6QC0HGW1aymT8YWV+P83XR0', 'trainee', '', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `usersvw`
-- (See below for the actual view)
--
CREATE TABLE `usersvw` (
`id` int(11)
,`username` varchar(50)
,`email` varchar(50)
,`type` varchar(20)
,`password` longtext
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `bacfilesvw`
--
DROP TABLE IF EXISTS `bacfilesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bacfilesvw`  AS SELECT `bacfilestbl`.`bacfile_id` AS `id`, `bacfilestbl`.`bacfile_type` AS `type`, `bacfilestbl`.`bacfile_title` AS `title`, `bacfilestbl`.`bacfile_link` AS `link`, `bacfilestbl`.`bacfile_date` AS `date`, `bacfilestbl`.`bacfile_procurementYear` AS `procurement_year`, `bacfilestbl`.`bacfile_procurementType` AS `procurement_type`, `bacfilestbl`.`bacfile_publishDate` AS `publish_date`, `bacfilestbl`.`bacfile_closingDate` AS `closing_date`, `bacfilestbl`.`bacfile_awardedTo` AS `awarded_to`, `bacfilestbl`.`bacfile_referenceNum` AS `reference_number`, `bacfilestbl`.`bacfile_procurementMode` AS `procurement_mode`, `bacfilestbl`.`bacfile_status` AS `status` FROM `bacfilestbl` WHERE `bacfilestbl`.`bacfile_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `carouselvw`
--
DROP TABLE IF EXISTS `carouselvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `carouselvw`  AS SELECT `imagestbl`.`image_id` AS `id`, `imagestbl`.`image_name` AS `name`, `imagestbl`.`image_title` AS `title`, `imagestbl`.`image_description` AS `description`, `imagestbl`.`image_type` AS `type`, `imagestbl`.`image_status` AS `status` FROM `imagestbl` WHERE `imagestbl`.`image_type` = 'carousel' AND `imagestbl`.`image_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `dailyvisitorsvw`
--
DROP TABLE IF EXISTS `dailyvisitorsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dailyvisitorsvw`  AS SELECT `dailyvisitstbl`.`daily_visitors_ip_address` AS `ip address`, `dailyvisitstbl`.`daily_visitors_date` AS `date`, `dailyvisitstbl`.`daily_visitors_status` AS `status` FROM `dailyvisitstbl` WHERE `dailyvisitstbl`.`daily_visitors_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `departmentsvw`
--
DROP TABLE IF EXISTS `departmentsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentsvw`  AS SELECT `departmentstbl`.`department_id` AS `id`, `departmentstbl`.`department_name` AS `name`, `departmentstbl`.`department_contact` AS `contact`, `departmentstbl`.`department_email` AS `email`, `departmentstbl`.`department_status` AS `status` FROM `departmentstbl` WHERE `departmentstbl`.`department_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `downloadablefilesvw`
--
DROP TABLE IF EXISTS `downloadablefilesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `downloadablefilesvw`  AS SELECT `filestbl`.`file_id` AS `id`, `filestbl`.`file_type` AS `type`, `filestbl`.`file_title` AS `title`, `filestbl`.`file_link` AS `link`, `filestbl`.`file_date` AS `date`, `filestbl`.`file_status` AS `status` FROM `filestbl` WHERE `filestbl`.`file_type` = 'downloadable' AND `filestbl`.`file_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `elemschoolsvw`
--
DROP TABLE IF EXISTS `elemschoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elemschoolsvw`  AS SELECT `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_type` = 'Elementary' AND `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `filesvw`
--
DROP TABLE IF EXISTS `filesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `filesvw`  AS SELECT `filestbl`.`file_id` AS `id`, `filestbl`.`file_type` AS `type`, `filestbl`.`file_title` AS `title`, `filestbl`.`file_link` AS `link`, `filestbl`.`file_department` AS `department`, `filestbl`.`file_date` AS `date`, `filestbl`.`file_status` AS `status` FROM `filestbl` WHERE `filestbl`.`file_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `highschoolsvw`
--
DROP TABLE IF EXISTS `highschoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `highschoolsvw`  AS SELECT `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_type` = 'HighSchool' AND `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `issuancescategoryvw`
--
DROP TABLE IF EXISTS `issuancescategoryvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `issuancescategoryvw`  AS SELECT `issuancescategorytbl`.`issuances_type` AS `type`, `issuancescategorytbl`.`issuances_type_name` AS `name`, `issuancescategorytbl`.`issuances_status` AS `status` FROM `issuancescategorytbl` WHERE `issuancescategorytbl`.`issuances_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `issuancesvw`
--
DROP TABLE IF EXISTS `issuancesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `issuancesvw`  AS SELECT `issuancestbl`.`issuances_id` AS `id`, `issuancestbl`.`tracking_number` AS `tracking_number`, `issuancestbl`.`issuances_title` AS `title`, `issuancestbl`.`issuances_link` AS `link`, `issuancestbl`.`issuances_number` AS `number`, `issuancestbl`.`issuances_date` AS `date`, `issuancestbl`.`issuances_type` AS `type`, `issuancestbl`.`issuances_status` AS `status` FROM `issuancestbl` WHERE `issuancestbl`.`issuances_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `jhsschoolsvw`
--
DROP TABLE IF EXISTS `jhsschoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jhsschoolsvw`  AS SELECT `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_type` = 'HighSchool' AND `schoolstbl`.`school_shsAvailability` = 'no' AND `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `materialfilesvw`
--
DROP TABLE IF EXISTS `materialfilesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `materialfilesvw`  AS SELECT `filestbl`.`file_id` AS `id`, `filestbl`.`file_type` AS `type`, `filestbl`.`file_title` AS `title`, `filestbl`.`file_link` AS `link`, `filestbl`.`file_department` AS `department`, `filestbl`.`file_date` AS `date`, `filestbl`.`file_status` AS `status` FROM `filestbl` WHERE `filestbl`.`file_type` = 'material' AND `filestbl`.`file_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `officesvw`
--
DROP TABLE IF EXISTS `officesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `officesvw`  AS SELECT `officestbl`.`offices_id` AS `id`, `departmentstbl`.`department_name` AS `department`, `officestbl`.`employee_name` AS `name`, `officestbl`.`employee_picture` AS `picture`, `officestbl`.`employee_office` AS `office`, `officestbl`.`employee_position` AS `position`, `officestbl`.`employee_post` AS `post`, `officestbl`.`employee_type` AS `type`, `officestbl`.`employee_email` AS `email`, `officestbl`.`employee_status` AS `status` FROM (`officestbl` join `departmentstbl` on(`officestbl`.`department_id` = `departmentstbl`.`department_id`)) WHERE `officestbl`.`employee_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `procurementfilesvw`
--
DROP TABLE IF EXISTS `procurementfilesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `procurementfilesvw`  AS SELECT `bacfilestbl`.`bacfile_id` AS `id`, `bacfilestbl`.`bacfile_type` AS `type`, `bacfilestbl`.`bacfile_title` AS `title`, `bacfilestbl`.`bacfile_link` AS `link`, `bacfilestbl`.`bacfile_date` AS `date`, `bacfilestbl`.`bacfile_procurementYear` AS `pyear`, `bacfilestbl`.`bacfile_procurementType` AS `ptype`, `bacfilestbl`.`bacfile_status` AS `status` FROM `bacfilestbl` WHERE `bacfilestbl`.`bacfile_type` = 'procurement' AND `bacfilestbl`.`bacfile_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `schoolsvw`
--
DROP TABLE IF EXISTS `schoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `schoolsvw`  AS SELECT `schoolstbl`.`schooltbl_id` AS `school_id`, `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_shsAvailability` AS `shs_availability`, `schoolstbl`.`school_spedAvailablity` AS `sped_availability`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `servicesvw`
--
DROP TABLE IF EXISTS `servicesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `servicesvw`  AS SELECT `servicestbl`.`services_id` AS `id`, `servicestbl`.`services_title` AS `title`, `servicestbl`.`services_description` AS `description`, `servicestbl`.`services_link` AS `link`, `servicestbl`.`services_status` AS `status`, `servicestbl`.`services_icon` AS `icon` FROM `servicestbl` WHERE `servicestbl`.`services_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `shsschoolsvw`
--
DROP TABLE IF EXISTS `shsschoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shsschoolsvw`  AS SELECT `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_type` = 'HighSchool' AND `schoolstbl`.`school_shsAvailability` = 'yes' AND `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `socialmediavw`
--
DROP TABLE IF EXISTS `socialmediavw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `socialmediavw`  AS SELECT `socialmediatbl`.`socialMedia_id` AS `id`, `socialmediatbl`.`socialMedia_type` AS `type`, `socialmediatbl`.`socialMedia_link` AS `link`, `socialmediatbl`.`socialMedia_title` AS `title`, `socialmediatbl`.`socialMedia_post` AS `post`, `socialmediatbl`.`socialMedia_status` AS `status` FROM `socialmediatbl` WHERE `socialmediatbl`.`socialMedia_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `spedschoolsvw`
--
DROP TABLE IF EXISTS `spedschoolsvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `spedschoolsvw`  AS SELECT `schoolstbl`.`school_id` AS `id`, `schoolstbl`.`school_name` AS `name`, `schoolstbl`.`school_address` AS `address`, `schoolstbl`.`school_principal` AS `principal`, `schoolstbl`.`school_contact` AS `contact`, `schoolstbl`.`school_link` AS `link`, `schoolstbl`.`school_email` AS `email`, `schoolstbl`.`school_district` AS `district`, `schoolstbl`.`school_type` AS `type`, `schoolstbl`.`school_status` AS `status` FROM `schoolstbl` WHERE `schoolstbl`.`school_spedAvailablity` = 'yes' AND `schoolstbl`.`school_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `timelogvw`
--
DROP TABLE IF EXISTS `timelogvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `timelogvw`  AS SELECT `timelogtbl`.`time_id` AS `id`, `userstbl`.`user_id` AS `user_id`, `userstbl`.`user_username` AS `username`, `timelogtbl`.`log_action` AS `action`, `timelogtbl`.`log_date` AS `date`, `timelogtbl`.`log_time` AS `time`, `timelogtbl`.`log_status` AS `status` FROM (`timelogtbl` join `userstbl` on(`timelogtbl`.`user_id` = `userstbl`.`user_id`)) WHERE `timelogtbl`.`log_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `transparencyfilesvw`
--
DROP TABLE IF EXISTS `transparencyfilesvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transparencyfilesvw`  AS SELECT `bacfilestbl`.`bacfile_id` AS `id`, `bacfilestbl`.`bacfile_type` AS `type`, `bacfilestbl`.`bacfile_title` AS `title`, `bacfilestbl`.`bacfile_link` AS `link`, `bacfilestbl`.`bacfile_date` AS `date`, `bacfilestbl`.`bacfile_publishDate` AS `publish_date`, `bacfilestbl`.`bacfile_closingDate` AS `closing_date`, `bacfilestbl`.`bacfile_awardedTo` AS `awarded_to`, `bacfilestbl`.`bacfile_referenceNum` AS `reference_number`, `bacfilestbl`.`bacfile_procurementMode` AS `procurement_mode`, `bacfilestbl`.`bacfile_status` AS `status` FROM `bacfilestbl` WHERE `bacfilestbl`.`bacfile_type` = 'transparency' AND `bacfilestbl`.`bacfile_status` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `usersvw`
--
DROP TABLE IF EXISTS `usersvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usersvw`  AS SELECT `userstbl`.`user_id` AS `id`, `userstbl`.`user_username` AS `username`, `userstbl`.`user_email` AS `email`, `userstbl`.`user_type` AS `type`, `userstbl`.`user_password` AS `password`, `userstbl`.`user_status` AS `status` FROM `userstbl` WHERE `userstbl`.`user_status` = 'active' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacfilestbl`
--
ALTER TABLE `bacfilestbl`
  ADD PRIMARY KEY (`bacfile_id`);

--
-- Indexes for table `dailyvisitstbl`
--
ALTER TABLE `dailyvisitstbl`
  ADD PRIMARY KEY (`daily_visitors_id`);

--
-- Indexes for table `departmentstbl`
--
ALTER TABLE `departmentstbl`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `filestbl`
--
ALTER TABLE `filestbl`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `imagestbl`
--
ALTER TABLE `imagestbl`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `issuancescategorytbl`
--
ALTER TABLE `issuancescategorytbl`
  ADD PRIMARY KEY (`issuances_type`);

--
-- Indexes for table `issuancestbl`
--
ALTER TABLE `issuancestbl`
  ADD PRIMARY KEY (`issuances_id`),
  ADD KEY `issuestbl_issuances_typeFK` (`issuances_type`);

--
-- Indexes for table `officestbl`
--
ALTER TABLE `officestbl`
  ADD PRIMARY KEY (`offices_id`),
  ADD KEY `officestbl_department_idFK` (`department_id`);

--
-- Indexes for table `schoolstbl`
--
ALTER TABLE `schoolstbl`
  ADD PRIMARY KEY (`schooltbl_id`);

--
-- Indexes for table `servicestbl`
--
ALTER TABLE `servicestbl`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `socialmediatbl`
--
ALTER TABLE `socialmediatbl`
  ADD PRIMARY KEY (`socialMedia_id`);

--
-- Indexes for table `timelogtbl`
--
ALTER TABLE `timelogtbl`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `timelogtbl_user_idFK` (`user_id`);

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacfilestbl`
--
ALTER TABLE `bacfilestbl`
  MODIFY `bacfile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyvisitstbl`
--
ALTER TABLE `dailyvisitstbl`
  MODIFY `daily_visitors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filestbl`
--
ALTER TABLE `filestbl`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagestbl`
--
ALTER TABLE `imagestbl`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuancestbl`
--
ALTER TABLE `issuancestbl`
  MODIFY `issuances_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officestbl`
--
ALTER TABLE `officestbl`
  MODIFY `offices_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolstbl`
--
ALTER TABLE `schoolstbl`
  MODIFY `schooltbl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicestbl`
--
ALTER TABLE `servicestbl`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socialmediatbl`
--
ALTER TABLE `socialmediatbl`
  MODIFY `socialMedia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timelogtbl`
--
ALTER TABLE `timelogtbl`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issuancestbl`
--
ALTER TABLE `issuancestbl`
  ADD CONSTRAINT `issuestbl_issuances_typeFK` FOREIGN KEY (`issuances_type`) REFERENCES `issuancescategorytbl` (`issuances_type`);

--
-- Constraints for table `officestbl`
--
ALTER TABLE `officestbl`
  ADD CONSTRAINT `officestbl_department_idFK` FOREIGN KEY (`department_id`) REFERENCES `departmentstbl` (`department_id`);

--
-- Constraints for table `timelogtbl`
--
ALTER TABLE `timelogtbl`
  ADD CONSTRAINT `timelogtbl_user_idFK` FOREIGN KEY (`user_id`) REFERENCES `userstbl` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
