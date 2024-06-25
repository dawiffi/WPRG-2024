-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 25, 2024 at 03:55 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gry_info`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE `artykuly` (
  `id_artykulu` int(11) NOT NULL,
  `tytul_artykulu` varchar(255) NOT NULL,
  `tresc_artykulu` text NOT NULL,
  `kategoria_artykulu` varchar(20) NOT NULL,
  `autor_artykulu` varchar(100) NOT NULL,
  `data_publikacji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `artykuly`
--

INSERT INTO `artykuly` (`id_artykulu`, `tytul_artykulu`, `tresc_artykulu`, `kategoria_artykulu`, `autor_artykulu`, `data_publikacji`) VALUES
(1, 'Pierwszy artykuł', 'Treść pierwszego artykułu', 'FPS', 'Jan Kowalski', '2024-06-01'),
(2, 'Drugi artykuł', 'Treść drugiego artykułu', 'FPS', 'Anna Nowak', '2024-06-02'),
(3, 'Trzeci artykuł', 'Treść trzeciego artykułu', 'RPG', 'Paweł Wiśniewski', '2024-06-03'),
(4, 'Czwarty artykuł', 'Treść czwartego artykułu', 'Battle Royale', 'Maria Lewandowska', '2024-06-04'),
(5, 'Piąty artykuł', 'Treść piątego artykułu', 'RPG', 'Krzysztof Zieliński', '2024-06-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id_autora` int(11) NOT NULL,
  `imie_autora` varchar(100) NOT NULL,
  `nazwisko_autora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `autorzy`
--

INSERT INTO `autorzy` (`id_autora`, `imie_autora`, `nazwisko_autora`) VALUES
(1, 'Jan', 'Kowalski'),
(2, 'Anna', 'Nowak'),
(3, 'Paweł', 'Wiśniewski'),
(4, 'Maria', 'Lewandowska'),
(5, 'Krzysztof', 'Zieliński');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id_komentarza` int(11) NOT NULL,
  `id_artykulu` int(11) NOT NULL,
  `nick_komentatora` varchar(50) NOT NULL,
  `tresc_komentarza` text NOT NULL,
  `data_dodania` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `komentarze`
--

INSERT INTO `komentarze` (`id_komentarza`, `id_artykulu`, `nick_komentatora`, `tresc_komentarza`, `data_dodania`) VALUES
(1, 1, 'komentator1', 'Świetny artykuł!', '2024-06-06'),
(2, 2, 'komentator2', 'Bardzo ciekawy temat.', '2024-06-07'),
(3, 3, 'komentator3', 'Zgadzam się z autorem.', '2024-06-08'),
(4, 4, 'komentator4', 'Bardzo dobrze napisane.', '2024-06-09'),
(5, 5, 'komentator5', 'Czekam na więcej!', '2024-06-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login_uzytkownika` varchar(50) NOT NULL,
  `haslo_uzytkownika` varchar(255) NOT NULL,
  `typ_konta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login_uzytkownika`, `haslo_uzytkownika`, `typ_konta`) VALUES
(1, 'admin', 'admin123', 'administrator'),
(2, 'autor1', 'password1', 'autor'),
(3, 'autor2', 'password2', 'autor'),
(4, 'user1', 'userpass1', 'użytkownik'),
(5, 'user2', 'userpass2', 'użytkownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id_wiadomosci` int(11) NOT NULL,
  `imie` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `wiadomosc` varchar(1024) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `wiadomosci`
--

INSERT INTO `wiadomosci` (`id_wiadomosci`, `imie`, `email`, `wiadomosc`, `data`) VALUES
(5, 'Dawid', 'dawid.frontczak11@gmail.com', 'hej moze dodajcie kategorie platformowki elo', '2024-06-25 15:50:22');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id_artykulu`);

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id_komentarza`),
  ADD KEY `id_artykulu` (`id_artykulu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id_wiadomosci`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id_artykulu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id_komentarza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`id_artykulu`) REFERENCES `artykuly` (`id_artykulu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
