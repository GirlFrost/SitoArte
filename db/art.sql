-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 25, 2021 alle 21:29
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `email`, `username`, `password`) VALUES
(1, 'Alice', 'Bianchi', 'F', 'alicebianchi@gmail.com', 'alicebianchi', '3efd7d4d39cd9e2d24b9e945d8876076'),
(2, 'capa', 'razza', 'M', 'caparezza@capa.com', 'caparezza', '0ea2ec13244c67258731748373a250d8'),
(3, 'Admin', 'Admin', 'F', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Chiara', 'Rossi', 'F', 'annarossi@gmail.comm', 'annarossi', '36d62008045731bcda6b2c3c159dcde6'),
(7, 'Girolamo', 'Gallo', 'M', 'GirolamoGallo@gmail.com', 'Identradmus', '02fed749af8e06358ef2eead1da8d2b6'),
(8, 'Gino', 'Cosino', 'M', 'ginocosino@coso.uk', 'GinoCosino', '5d838bf8aa5cfa6535005341235aeec6');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
