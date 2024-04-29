-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Apr 2024 um 17:01
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
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TOKEN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `EMAIL`, `TOKEN`) VALUES
(1, 'Terry', '$2y$10$Sc8O5Xd/nqcOWScMQzrdPOmrPbDxFglYgKEgMVX7rrOOQvFdFvW8y', NULL, NULL),
(2, 'Josef', '$2y$10$ZSLpnkPGtXvbGF0L2bQaculKw1ID6mIkHp21cLhTGQgUaZVrNYj7.', NULL, NULL),
(3, 'Dambeldor', '$2y$10$6tx8VGx0BCE4r4u/fopP/ewjnMpLxPDI6iQBbUVJNFUXK8ZYMegS6', NULL, NULL),
(4, 'yua', '$2y$10$vJQOuiPf5C3AivJawdCs2.d54VKKse2sSVuFhw3Q5vWYg6Hg/LDIi', NULL, NULL),
(5, 'test', '$2y$10$RNCw6lKxy6oYvLQrpC80/u2exRNZwbjrf66cDRxyAxXWXWx8QJaEm', NULL, NULL),
(6, 'test1', '$2y$10$aFTbR6kS5SH9uEumvf7f/.kRVOoUHWazAng0ljCv4cjIrTBotKPEy', NULL, NULL),
(7, 'Res', '$2y$10$OxqFERGud3Qjp1nxpr/1vOkXrIfUFpRbuq1zTdN/fQv68PR2dMSp2', 'josefleite.00@hotmail.com', 'mkRdXScXbyq9cUGnFCVyQj4q5');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
