-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 06, 2023 alle 20:00
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companyform`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tbbarcodescompanyform`
--

CREATE TABLE `tbbarcodescompanyform` (
  `customerName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timestampStart` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `barCodeLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbdatacompanyform`
--

CREATE TABLE `tbdatacompanyform` (
  `customerName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timestampStart` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `badgeNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbimagescompanyform`
--

CREATE TABLE `tbimagescompanyform` (
  `customerName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timestampStart` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `imagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `tbsignaturescompanyform`
--

CREATE TABLE `tbsignaturescompanyform` (
  `customerName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `timestampStart` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `signaturePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbbarcodescompanyform`
--
ALTER TABLE `tbbarcodescompanyform`
  ADD PRIMARY KEY (`customerName`,`timestampStart`);

--
-- Indici per le tabelle `tbdatacompanyform`
--
ALTER TABLE `tbdatacompanyform`
  ADD PRIMARY KEY (`customerName`,`timestampStart`);

--
-- Indici per le tabelle `tbimagescompanyform`
--
ALTER TABLE `tbimagescompanyform`
  ADD PRIMARY KEY (`customerName`,`timestampStart`);

--
-- Indici per le tabelle `tbsignaturescompanyform`
--
ALTER TABLE `tbsignaturescompanyform`
  ADD PRIMARY KEY (`customerName`,`timestampStart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
