-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Cze 2020, 19:33
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `spedycja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa`) VALUES
(1, 'poniżej 3,5 t'),
(2, 'chłodnia do 25 t'),
(3, 'gabaryty'),
(4, 'przewóz osób');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kierowcy`
--

CREATE TABLE `kierowcy` (
  `id_kierowcy` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kierowcy`
--

INSERT INTO `kierowcy` (`id_kierowcy`, `imie`, `nazwisko`) VALUES
(1, 'Marcin', 'Opolski'),
(2, 'Stanisław', 'Janicki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenia`
--

CREATE TABLE `zlecenia` (
  `id_zlecenia` int(11) NOT NULL,
  `adres` varchar(120) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `opis` text NOT NULL,
  `kierowca_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `realizacja` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zlecenia`
--

INSERT INTO `zlecenia` (`id_zlecenia`, `adres`, `kategoria_id`, `opis`, `kierowca_id`, `data`, `realizacja`) VALUES
(1, 'Hetmańska 16, 15-727 Białystok ', 1, 'Cztery palety - ziemia ogrodowa\r\nDostarczyć do Auchan', 1, '2020-01-07', 1),
(2, 'Malborska 51, 03-286 Warszawa', 2, 'Dostawa owoców - restauracja IKEA', 1, '2020-02-06', 1),
(3, 'Adam-Opel-Straße 100, 99817 Eisenach, Niemcy', 3, 'Transport ponad-gabarytowy o szerokości do 7m', 1, '2020-05-16', 1),
(8, 'Veiverių g. 132, Kaunas 46337, Litwa', 1, 'Transport kontenerów na lotnisko', 2, '2020-06-06', 1),
(11, 'Elewatorska 13, 19-203 Grajewo', 1, 'Transport kontenerów i palet', 2, '2020-06-06', 1),
(12, 'Veiverių g. 132, Kaunas 46337, Litwa', 1, 'Transport kontenerów na lotnisko', 1, '2020-06-06', 0),
(13, 'Elewatorska 13, 19-203 Grajewo', 4, 'Transport pracowników na budowę, spółdzielnia Mlekpol', 2, '2020-06-06', 0),
(14, 'Adam-Opel-Straße 100, 99817 Eisenach, Niemcy', 3, 'Transport ponad-gabarytowy o szerokości do 5m, 36 ton', 1, '2020-06-06', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indeksy dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  ADD PRIMARY KEY (`id_kierowcy`);

--
-- Indeksy dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD PRIMARY KEY (`id_zlecenia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  MODIFY `id_kierowcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `id_zlecenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
