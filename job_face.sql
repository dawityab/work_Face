-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 09:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_face`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `cover_letter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `title`, `gender`, `first_name`, `last_name`, `email`, `country`, `cv`, `attachments`, `cover_letter`) VALUES
(3, '--', 'Male', 'Afnin', 'Dawit', 'Afnin@gmail.com', 'Not EU but parment work permit', 'Test-1-6466e9ad54ba7.pdf', 'Test-1-6466e9ad5539f.pdf', 'Test-1-6466e9ad5594a.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221112231601', '2023-04-11 02:41:39', 77),
('DoctrineMigrations\\Version20221114135520', '2023-04-11 02:41:39', 45),
('DoctrineMigrations\\Version20221119181309', '2023-04-11 02:41:39', 15),
('DoctrineMigrations\\Version20221125105351', '2023-04-11 02:41:39', 12),
('DoctrineMigrations\\Version20221127104048', '2023-04-11 02:41:39', 8),
('DoctrineMigrations\\Version20221128002712', '2023-04-11 02:41:39', 9);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_catagory` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_isactive` tinyint(1) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `job_posted_date` datetime NOT NULL,
  `job_iamge` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_name`, `job_catagory`, `job_description`, `job_isactive`, `job_salary`, `job_posted_date`, `job_iamge`, `job_location`, `company_name`) VALUES
(1, 'Fullstack Web Developer', 'Computin and ICT', 'Im Auftrag unseres Kunden suchen wir einen erfahrenen Fullstack Developer (m/w/d) mit fundierten Kenntnissen in Java und JavaScript für die Entwicklung von Atlassian Connect Erweiterungen und Atlassian AddOns. Unser Kunde ist ein österreichisches Unterneh', 1, 4500, '2023-03-30 08:00:00', 'Screenshot-15-6434b1431af8e.png', 'Wien', 'HollausGmbH'),
(2, 'Front-End Web Developer', 'Computin and ICT', 'Use your skills to move the world forward.  Master’s degree in computer science, information technology, media design or similar. Several years of experience implementing web frontends. Excellent skills in HTML5, CSS3, JavaScript/ES6 and TypeScript. Exper', 1, 3500, '2023-03-31 09:00:00', 'Screenshot-2-6434b19712361.png', 'Salzburg', 'GT IT'),
(3, 'Teacher', 'Education and Training', 'Freude am Arbeiten als Teil eines Teams Bereitschaft anzupacken, wenn es viel zu tun gibt Verständliches Erklären mathematischer Sachverhalte Spaß am Arbeiten mit Zahlen und großen Datenmengen Verhandlungssicheres Deutsch zwecks mündlicher und schriftlich', 1, 3000, '2023-04-01 10:00:00', '2022-07-01-6434b1cf9e8d7.png', 'Salzburg', 'Bright School'),
(4, 'Teacher', 'Education and Training', 'Lead a team of scrum masters who work inside their assigned SCRUM teams to drive delivery and continuous improvements Provide agile coaching, training, and mentoring to SCRUM Masters, development teams, managers, and executives on agile principles, practi', 1, 3000, '2023-04-02 09:00:00', 'Screenshot-24-6434b20ee5d72.png', 'Salzburg', 'Bright School'),
(5, 'Hair stylist', 'Animator,Design and Art', 'Good hair styles', 1, 2800, '2023-04-04 11:00:00', 'Screenshot-18-6434b246479b3.png', 'Wien', 'DY'),
(8, 'Food controller', 'Food Service', 'Good managing the food', 1, 2800, '2023-05-01 09:00:00', 'image1-6459784725e45.jpg', 'Wien', 'Testing World AG');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `user_name`) VALUES
(2, 'Admin@admin.com', '[\"ROLE_ADMIN\"]', '$2y$13$tph3kBd24AAOv5ciTmx8Ae5C9gj9Vv50wFvj2iDSlK2R3DaCooEdy', 'Admin'),
(3, 'Soli@gmail.com', '[]', '$2y$13$offrRwM3RQ.1b57QUix31.yuIkDOml3msOXC.KoxhrhlWZJrJegpy', 'Soli'),
(4, 'danieal@gm.co', '[]', '$2y$13$4oXzS63siz/AZn5TipLHlOaBhDoNWUtcLhc0Qm0jjkyR0IOVWOwbe', 'Dan'),
(5, 'Afnin@gm.co', '[]', '$2y$13$1eMtanY5/KZbbzHCRcfZReQgePMfYDMwOt6GOzNM8RhDN0LFC05ya', 'Afi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
