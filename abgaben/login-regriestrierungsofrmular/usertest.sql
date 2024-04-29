-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Apr 2024 um 13:38
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `pinktonic`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usertest`
--

CREATE TABLE `usertest` (
  `id` int(11) NOT NULL,
  `nutzername` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `usertest`
--

INSERT INTO `usertest` (`id`, `nutzername`, `password`) VALUES
(13, 'Nuttzer', '$2y$10$EBXXHZI2O/DWnMALf.m5r.lJu.nlCJl5GR2/t7Qhq//u6qvgtAkDG'),
(14, 'Nuttzer123', '$2y$10$uj6DvnWvSrjObmoVIBcv0.xcIiOge1MgfJbOjBWAgZiHgzcETQ2I.'),
(15, 'cierul Figus', '$2y$10$6F9d1AN8s1Szbpr2GWEiOOJYm5B6BgaK92WHAeELKaf3zLy0G1fzu');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `usertest`
--
ALTER TABLE `usertest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nutzername`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `usertest`
--
ALTER TABLE `usertest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
