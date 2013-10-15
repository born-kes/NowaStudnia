-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 15 Paź 2013, 18:59
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `bornkesws`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `body`
--

CREATE TABLE IF NOT EXISTS `body` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budynki` int(11) NOT NULL,
  `jednstki` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `jednostki`
--

CREATE TABLE IF NOT EXISTS `jednostki` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `de` varchar(20) CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `skrot` char(50) DEFAULT NULL,
  `budynek` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `jednostki`
--

INSERT INTO `jednostki` (`id`, `name`, `de`, `skrot`, `budynek`) VALUES
(1, 'Pikinier', 'spear', 'pik', 2),
(2, 'Miecznik', 'sword', 'mie', 2),
(3, 'Topror', 'axe', 'axe', 2),
(4, 'Zwiadowca', 'spy', 'zw', 3),
(5, 'Lekki Kawalerzysta', 'light', 'lk', 3),
(6, 'Ciezki Kawalerzysta', 'heavy', 'ck', 3),
(7, 'Taran', 'ram', 'tar', 4),
(8, 'Katapolty', 'catapult', 'kat', 4),
(10, 'Szlachcic', 'snob', 'sz', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `de` varchar(20) NOT NULL,
  `pl` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `location`
--

INSERT INTO `location` (`id`, `de`, `pl`) VALUES
(1, 'main', 'Ratusz'),
(2, 'barracks', 'Koszary'),
(3, 'stable', 'Stajnie'),
(4, 'garage', 'Warsztat'),
(5, 'snob', 'Pa?ac'),
(6, 'smith', 'Ku?nia'),
(7, 'place', 'Plac'),
(8, 'wood', 'Tartak'),
(9, 'stone', 'Cegielnia'),
(10, 'iron', 'Huta ?elaza'),
(11, 'farm', 'Zagroda'),
(12, 'storage', 'Spichlerz'),
(13, 'wall', 'Mur'),
(14, 'spear', 'Pikinier'),
(15, 'sword', 'Miecznik'),
(16, 'axe', 'Topror'),
(17, 'spy', 'Zwiadowca'),
(18, 'light', 'Lekki Kawalerzysta'),
(19, 'heavy', 'Ciezki Kawalerzysta'),
(20, 'ram', 'Taran'),
(21, 'catapult', 'Katapolty'),
(22, 'snob', 'Szlachcic'),
(23, 'Rozbuduj', 'deska'),
(24, 'wyburz', 'zniszcz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `strony`
--

CREATE TABLE IF NOT EXISTS `strony` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf16 COLLATE utf16_polish_ci NOT NULL,
  `logo` text CHARACTER SET utf16 COLLATE utf16_polish_ci,
  `str` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `strony`
--

INSERT INTO `strony` (`id`, `name`, `logo`, `str`) VALUES
(1, 'Ratusz', 'main3.png', 'W ratuszu można rozbudowywać budynki lub budować nowe. Im większy stopień rozbudowania, tym szybciej są budowane budynki. Po wybudowaniu ratusza do piętnastego poziomu możesz burzyć inne budynki.'),
(2, 'Koszary', 'barracks2.png', 'W koszarach możesz rekrutować piechotę. Im większy stopień rozbudowania, tym szybciej przebiega rekrutacja.'),
(3, 'Stajnia', 'stable2.png', 'W stajni możesz rekrutować jeźdźców. Im większy stopień rozbudowania stajni, tym szybciej przebiega rekrutacja.'),
(4, 'Warsztat', 'garage1.png', 'W warsztacie możesz produkować broń oblężniczą. Im większy stopień rozbudowania, tym szybciej są produkowane wojska.'),
(5, 'Rynek', 'market2.png', 'Tutaj możesz handlować z innymi graczami lub przesyłać surowce.'),
(6, 'Plac', 'place1.png', 'Na placu stoją wszystkie wojska. Tutaj możesz wydawać rozkazy i przesuwać wojska. '),
(7, 'Raporty', NULL, 'Tu możesz konwertować raporty by wrzucić je czytelnie na forum.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
