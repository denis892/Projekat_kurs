-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 15, 2024 at 12:10 PM
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
-- Database: `online_kurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `tip_korisnika` enum('polaznik','predavač','administrator') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `lozinka`, `tip_korisnika`) VALUES
(3, 'Denis', 'Gajic', 'denisgajic02@gmail.com', '$2y$10$5f5J.vRpiLf42286DU4Y7..VCN7nDjiRDOhQPqnkYX4PTlgD3OFbO', 'polaznik'),
(11, 'Petra', 'Markovic', 'aas@gmail.com', '34567', 'predavač'),
(12, 'Lena', 'Gajic', 'aas77@gmail.com', '3456789', 'predavač'),
(13, 'Laza ', 'Maric\r\n', '1234@gmail.com', '$2y$10$U2D1TAabJWNM7LKaP.TBt.DWNFbg.8eJsaUPzkhNhUs7SWTara3Uy', 'polaznik');

-- --------------------------------------------------------

--
-- Table structure for table `kursevi`
--

CREATE TABLE `kursevi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `predavac_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursevi`
--

INSERT INTO `kursevi` (`id`, `naziv`, `opis`, `predavac_id`) VALUES
(2, 'Standardni kurs', 'Standardni kurs engleskog jezika je namenjen svima koji žele razviti sve jezičke veštine – govor, čitanje, pisanje i slušanje na engleskom jeziku. Većinu vremena provešćemo na razvijanju komunikacije. Cilj je da naučite da razgovarate i koristite engleski jezik slobodno, sigurno i ispravno.', 3),
(3, 'Mini grupa', 'Ovaj vid nastave se najčešće odlučuju članovi porodice ili bračni partneri, ponekad i kolege sa posla koji ne mogu ili ne žele da se prilagođavaju radu u grupi', 11),
(4, 'Individualna nastava', 'Individualni časovi engleskog jezika su ono na šta se odlučuje veliki broj polaznika.Tempo rada i sam rad prilagođavaju se Vama i Vašoj brzini savladavanja gradiva.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `kursevi_predavaci`
--

CREATE TABLE `kursevi_predavaci` (
  `predavac_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lekcije`
--

CREATE TABLE `lekcije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `sadrzaj` text DEFAULT NULL,
  `kurs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lekcije`
--

INSERT INTO `lekcije` (`id`, `naziv`, `sadrzaj`, `kurs_id`) VALUES
(2, 'Osnove engleskog jezika', 'U ovoj lekciji naučićemo osnovne fraze, gramatička pravila i vokabular engleskog jezika.', 3),
(3, 'Vokabular za svakodnevnu komunikaciju', 'U ovoj lekciji ćemo se fokusirati na vokabular koji je neophodan za svakodnevnu komunikaciju na engleskom jeziku.', 3),
(4, 'Gramatika', 'U ovoj lekciji ćemo proučiti osnovne gramatičke koncepte engleskog jezika, uključujući vreme, glagole i rečenice.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `materijali`
--

CREATE TABLE `materijali` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `putanja` varchar(255) DEFAULT NULL,
  `kurs_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materijali`
--

INSERT INTO `materijali` (`id`, `naziv`, `opis`, `putanja`, `kurs_id`) VALUES
(1, 'Gramatika engleskog jezika', 'Materijal koji pokriva osnove gramatike engleskog jezika.', 'sql/gramatika-engleskog-jezika.pdf', 3),
(2, 'Početnik', 'Primeri i vežbe za početnike u učenju engleskog jezika.', 'sql/pocetnik.pdf', 3),
(3, 'Vokabular', 'Liste reči i izraza za proširivanje vokabulara na engleskom jeziku.', 'sql/vokabular.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `predavaci`
--

CREATE TABLE `predavaci` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `obrazovanje` text DEFAULT NULL,
  `kurs_naziv` varchar(255) DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `predavaci`
--

INSERT INTO `predavaci` (`id`, `ime`, `prezime`, `slika`, `obrazovanje`, `kurs_naziv`, `opis`) VALUES
(12, 'Lena', 'Gajic', 'lena.jpg', 'Fililoski fakultet', 'Individualna nastava', 'Lena je strastvena i posvećena predavačica engleskog jezika sa višegodišnjim iskustvom u nastavi. Njen pristup je interaktivan i dinamičan, fokusiran na razvoj jezičkih veština i samopouzdanja kod studenata.\r\n\r\n'),
(13, 'Petra', 'Markovic', 'petra.jpg', 'Fakultet politickih nauka', 'Mini grupa', 'Petar je iskusan predavač engleskog jezika sa širokim spektrom znanja i veština. Njegov pristup uključuje kreativne metode učenja, podstičući studente da se izraze slobodno i da razviju svoj jezički potencijal.');

-- --------------------------------------------------------

--
-- Table structure for table `prijave`
--

CREATE TABLE `prijave` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) DEFAULT NULL,
  `kurs_id` int(11) DEFAULT NULL,
  `datum_prijave` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kursevi`
--
ALTER TABLE `kursevi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `predavac_id` (`predavac_id`);

--
-- Indexes for table `kursevi_predavaci`
--
ALTER TABLE `kursevi_predavaci`
  ADD PRIMARY KEY (`predavac_id`,`kurs_id`),
  ADD KEY `kursevi_predavaci_ibfk_2` (`kurs_id`);

--
-- Indexes for table `lekcije`
--
ALTER TABLE `lekcije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kurs_id` (`kurs_id`);

--
-- Indexes for table `materijali`
--
ALTER TABLE `materijali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kurs_id` (`kurs_id`);

--
-- Indexes for table `predavaci`
--
ALTER TABLE `predavaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prijave`
--
ALTER TABLE `prijave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `kurs_id` (`kurs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kursevi`
--
ALTER TABLE `kursevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lekcije`
--
ALTER TABLE `lekcije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materijali`
--
ALTER TABLE `materijali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `predavaci`
--
ALTER TABLE `predavaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prijave`
--
ALTER TABLE `prijave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kursevi`
--
ALTER TABLE `kursevi`
  ADD CONSTRAINT `kursevi_ibfk_1` FOREIGN KEY (`predavac_id`) REFERENCES `korisnici` (`id`);

--
-- Constraints for table `kursevi_predavaci`
--
ALTER TABLE `kursevi_predavaci`
  ADD CONSTRAINT `kursevi_predavaci_ibfk_1` FOREIGN KEY (`predavac_id`) REFERENCES `predavaci` (`id`),
  ADD CONSTRAINT `kursevi_predavaci_ibfk_2` FOREIGN KEY (`kurs_id`) REFERENCES `kursevi` (`id`);

--
-- Constraints for table `lekcije`
--
ALTER TABLE `lekcije`
  ADD CONSTRAINT `lekcije_ibfk_1` FOREIGN KEY (`kurs_id`) REFERENCES `kursevi` (`id`);

--
-- Constraints for table `materijali`
--
ALTER TABLE `materijali`
  ADD CONSTRAINT `materijali_ibfk_1` FOREIGN KEY (`kurs_id`) REFERENCES `kursevi` (`id`);

--
-- Constraints for table `prijave`
--
ALTER TABLE `prijave`
  ADD CONSTRAINT `prijave_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`),
  ADD CONSTRAINT `prijave_ibfk_2` FOREIGN KEY (`kurs_id`) REFERENCES `kursevi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
