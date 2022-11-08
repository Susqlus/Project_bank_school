DROP DATABASE bank;
CREATE DATABASE bank;

USE bank;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Paź 2022, 17:30
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `stan` int(11) NOT NULL,
  `debet` int(11) NOT NULL,
  `kwota_debetu` int(11) NOT NULL,
  `zabl_srodki` int(11) NOT NULL,
  `nr_konta` text NOT NULL,
  `blokada` int(11) NOT NULL,
  `data_blok` date DEFAULT NULL,
  `id_obr` int(11) NOT NULL,
  `nr_lokaty` text NOT NULL,
  `stan_lokaty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logowanie`
--

INSERT INTO `logowanie` (`id`, `login`, `pass`, `imie`, `nazwisko`, `stan`, `debet`, `kwota_debetu`, `zabl_srodki`, `nr_konta`, `blokada`, `data_blok`, `id_obr`, `nr_lokaty`, `stan_lokaty`) VALUES
(1, 'Test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Konto', 'Testowe', 5141654, 0, 0, 0, '45520125545548556599662356', 0, NULL, 5, '45520125545548555969662356', 450555),
(2, 'Test2', '109f4b3c50d7b0df729d299bc6f8e9ef9066971f', 'Konto Testowe 2', 'Testowe', 357026, 0, 0, 0, '45520125545546966599662356', 0, NULL, 3, '45695125545548556599662356', 605222);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `id` int(11) NOT NULL,
  `kwota` int(11) NOT NULL,
  `data` date NOT NULL,
  `typ` int(11) NOT NULL,
  `id_usera` int(11) NOT NULL,
  `tytul_przelewu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `transakcje`
--

INSERT INTO `transakcje` (`id`, `kwota`, `data`, `typ`, `id_usera`, `tytul_przelewu`) VALUES
(1, 6554, '2022-10-04', 1, 1, 'rachunek'),
(2, 365, '2022-10-04', 1, 2, 'prąd'),
(3, 622, '2022-10-03', 1, 1, 'gaz'),
(4, 4450, '2022-10-04', 1, 2, 'lokata'),
(5, 4410, '2022-10-10', 1, 2, 'zakupy'),
(6, 41, '2022-10-11', 1, 2, 'motor'),
(7, 154, '2022-10-17', 1, 1, 'leki'),
(8, 332, '2022-10-16', 1, 1, 'lekarz'),
(9, 145, '2022-10-03', 1, 2, 'ogrzewanie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zabezpieczenia`
--

CREATE TABLE `zabezpieczenia` (
  `id` int(11) NOT NULL,
  `obraz_zabezpieczajacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zabezpieczenia`
--

INSERT INTO `zabezpieczenia` (`id`, `obraz_zabezpieczajacy`) VALUES
(1, 'z1.jpg'),
(2, 'z2.jpg'),
(3, 'z3.jpg'),
(4, 'z4.jpg'),
(5, 'z5.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obr` (`id_obr`);

--
-- Indeksy dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usera` (`id_usera`);

--
-- Indeksy dla tabeli `zabezpieczenia`
--
ALTER TABLE `zabezpieczenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `zabezpieczenia`
--
ALTER TABLE `zabezpieczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD CONSTRAINT `logowanie_ibfk_1` FOREIGN KEY (`id_obr`) REFERENCES `zabezpieczenia` (`id`);

--
-- Ograniczenia dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `transakcje_ibfk_1` FOREIGN KEY (`id_usera`) REFERENCES `logowanie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
