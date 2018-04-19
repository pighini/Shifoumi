-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Avril 2018 à 14:48
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `shifoumi`
--
CREATE DATABASE IF NOT EXISTS `shifoumi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shifoumi`;

-- --------------------------------------------------------

--
-- Structure de la table `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
  `idBet` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `dateBet` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isWon` tinyint(1) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `bets`
--

INSERT INTO `bets` (`idBet`, `amount`, `dateBet`, `isWon`, `idUser`) VALUES
(1, 200, '2018-04-19 11:51:31', 1, 1),
(2, 100, '2018-04-19 11:51:31', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` char(40) DEFAULT NULL,
  `avatar` blob,
  `balance` bigint(20) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `avatar`, `balance`) VALUES
(1, 'Crisz', 'cristiano.prrmn@eduge.ch', 'Super', NULL, 5550),
(2, 'kiady_a', 'kiady@gmail.com', 'Super', NULL, 6000),
(3, 'Simcir', 'simon@gmail.com', 'Super', NULL, 500),
(4, 'Lil_Thib', 'thibaut@gmail.com', 'Super', NULL, 500),
(5, 'FionDiLatte', 'pighini@gmail.com', 'Super', NULL, 500);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
