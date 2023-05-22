-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:16 AM
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
(4, '--', 'Male', 'Afnin', 'Dawit', 'Afnin@gmail.com', 'Not EU but parment work permit', 'Test-1-6466e9ad5594a-646acf5abe1c9.pdf', '001-fit-ausbildungsliste-642df5c0b7bcb-646acf5abeb7b.pdf', '001-fit-ausbildungsliste-642df5c0b7bcb-646acf5abf490.pdf');

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
(1, 'Fullstack Developer', 'Computin and ICT', 'Fundierte Kenntnisse in Java und HTTP-basierten Diensten Erfahrung mit Cross-Browser Entwicklung (HTML5, CSS3, JavaScript) Security-Awareness im Web-Bereich Breites Wissen in anderen Programmiersprachen und Technologien Erfahrung mit Versionskontrolle mit', 1, 3900, '2023-05-10 10:00:00', 'pic1-646955eee92c6.png', 'Wien', 'Manpower'),
(2, 'Angular & Web Developer', 'Computin and ICT', 'Planung und technische Realisierung von marktführenden state-of-the-art Lösungen mit Angular, Angular Material, und Javascript für das Gesundheitswesen Implementierung, Mitgestaltung und Customizing unserer innovativen Lösungen Betreuung und Erweiterung v', 1, 4500, '2023-05-11 09:00:00', 'pic2-6469570ae14ad.png', 'Wien', 'x-tention Informationstechnologie GmbH'),
(3, 'Python Developer', 'Computin and ICT', 'Mehrjährige, fundierte Erfahrung mit Python im Bereich der Webentwicklung Routine im Umgang mit Datenbanken wie MySQL, PostgreSQL, MSSQL oder Oracle Routinierter Umgang mit APIs (REST, GraphQL, SOAP) sowie weitreichende Erfahrung mit Django REST Framework', 1, 4500, '2023-05-13 12:00:00', 'pic3-646957b4b47c8.png', 'Wien', 'ANEXIA Internetdienstleistungs GmbH'),
(4, 'Office Manager', 'Administration and Management', 'Mitarbeiter*innen stehen bei uns an erster Stelle. Im Rahmen eines abgestimmten Entwicklungsplans ist es unser Ziel, Dich bestmöglich zu fördern und weiterzubringen- immer mit Blick auf Deine individuelle Situation. Start Up Mentalität im Großkonzern. Als', 1, 4590, '2023-05-14 11:00:00', 'pic4-646958c6c8266.png', 'Graz', 'Philip Morris Austria GmbH'),
(5, 'Category Manager:in Bier', 'Administration and Management', 'Steuerung der übertragenen Produktkategorien mit Umsatz- und Ergebnisverantwortung Gestaltung des Sortiments bei laufender Beobachtung und Optimierung der Category unter Berücksichtigung der Qualitätsanforderung unserer Kund:innen Markt- und Trendbeobacht', 1, 3000, '2023-05-15 00:00:00', 'pic5-64695bd8d54be.png', 'Graz', 'Billa AG'),
(6, 'Technical Project/Sales Manager Food Solutions', 'Administration and Management', 'Die selbständige Projektleitung im Bereich der funktionalen Food Solutions umfasst Rezepturerstellung oder die interne Entwicklungskoordinierung mit unserem Entwicklungsteam Die Angebotserstellung und Angebotslegung, sowie Nachverfolgung der jeweiligen Pr', 1, 3000, '2023-05-15 09:00:00', 'pic6-64695c77b172a.png', 'Salzburg', 'Brenntag Austria GmbH'),
(7, 'Mitarbeiter Import/Export', 'Finance and Accounting', 'Sie koordinieren die logistische Abwicklung sämtlicher Transporte im internationalen Bereich, von der Containerbeladung bis zum LKW-Transport in Zusammenarbeit mit den beauftragten Speditionen Sie überwachen die termingerechte Lieferung und koordinieren T', 1, 2400, '2023-05-16 12:00:00', 'pic7-64695d59183d5.png', 'Salzburg', 'Grausam Handels GmbH'),
(8, 'Kaufmännische Sachbearbeiter', 'Finance and Accounting', 'Sie übernehmen kaufmännische Aufgaben der Distributionslogistik unter Einhaltung der aktuellen Good Distribution Practice (GDP) gemäß der jährlichen GDP-Schulung und der lokalen Verfahren Sie entwickeln schnell Kenntnisse über unsere logistischen Lieferke', 1, 2000, '2023-05-17 13:00:00', 'pic8-64695e066e041.png', 'Wien', 'GE Healthcare Austria GmbH & Co OG'),
(9, 'LKW Lenker internationale Pharmatransporte', 'Transport and Logistic', 'Durchführung von internationalen Pharma- und Blutplasmatransporten mit Kühl-Hängerzug Überprüfung der Lieferscheine bei der Beladung Be- und Entladung der Ware mit Handhubwagen Ladungssicherung Scannen der Lieferscheine an der Entladestelle Kommunikation ', 1, 2100, '2023-05-18 12:00:00', 'pic9-64695f6b9bf32.png', 'Wien', 'Müller Transporte GmbH');

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
(6, 'Soli@gmail.com', '[]', '$2y$13$n5msmIH.U55z/s1cZJCTteC9zSPKCtgxAYBptKjMui6.vqbUM4nBO', 'Soli'),
(9, 'Afnin@gm.co', '[]', '$2y$13$HraCqO8LPSBFV.3C8080EuX3msW2lb1OVR4yRYpvcGkyGKXnJPwby', 'Afi');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
