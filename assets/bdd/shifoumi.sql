-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Mai 2018 à 16:23
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Contenu de la table `bets`
--

INSERT INTO `bets` (`idBet`, `amount`, `dateBet`, `isWon`, `idUser`) VALUES
(1, 200, '2018-04-19 11:51:31', 1, 1),
(2, 100, '2018-04-19 11:51:31', 0, 1),
(3, 250, '2018-05-03 10:55:41', 1, 1),
(4, 50, '2018-05-03 10:55:57', 1, 1),
(5, 300, '2018-05-03 10:56:20', 2, 1),
(6, 300, '2018-05-03 10:56:28', 2, 1),
(7, 400, '2018-05-03 10:56:39', 2, 1),
(8, 400, '2018-05-03 10:56:46', 0, 1),
(9, 800, '2018-05-03 10:57:01', 2, 1),
(10, 800, '2018-05-03 10:57:09', 0, 1),
(11, 1000, '2018-05-03 10:57:32', 1, 1),
(12, 50, '2018-05-03 10:57:38', 2, 1),
(13, 50, '2018-05-03 10:57:43', 1, 1),
(14, 50, '2018-05-03 10:57:49', 0, 1),
(15, 50, '2018-05-03 10:57:50', 1, 1),
(16, 50, '2018-05-03 10:57:57', 0, 1),
(17, 50, '2018-05-03 10:58:02', 0, 1),
(18, 50, '2018-05-03 10:58:07', 1, 1),
(19, 50, '2018-05-03 10:58:13', 1, 1),
(20, 1000, '2018-05-03 10:58:23', 2, 1),
(21, 1000, '2018-05-03 10:58:32', 0, 1),
(22, 1000, '2018-05-03 10:58:43', 1, 1),
(23, 50, '2018-05-03 10:59:27', 1, 5),
(24, 50, '2018-05-03 10:59:33', 2, 5),
(25, 50, '2018-05-03 11:32:01', 2, 1),
(26, 50, '2018-05-03 11:32:21', 1, 1),
(27, 150, '2018-05-03 11:32:29', 1, 1),
(28, 200, '2018-05-03 11:32:56', 0, 1),
(29, 500, '2018-05-03 11:33:07', 2, 1),
(30, 250, '2018-05-03 11:33:15', 2, 1),
(31, 150, '2018-05-03 11:39:42', 1, 1),
(32, 100, '2018-05-03 11:39:51', 1, 1),
(33, 50, '2018-05-03 12:02:06', 2, 1),
(34, 50, '2018-05-03 12:02:40', 1, 1),
(35, 50, '2018-05-03 12:03:04', 1, 1),
(36, 50, '2018-05-03 12:03:17', 0, 1),
(37, 50, '2018-05-03 12:04:07', 1, 1),
(38, 50, '2018-05-03 12:04:42', 0, 1),
(39, 50, '2018-05-03 12:05:05', 0, 1),
(40, 50, '2018-05-03 12:06:01', 0, 1),
(41, 50, '2018-05-03 12:06:37', 2, 1),
(42, 50, '2018-05-03 12:09:43', 1, 1),
(43, 50, '2018-05-03 12:09:48', 2, 1),
(44, 50, '2018-05-03 12:36:59', 1, 1),
(45, 50, '2018-05-03 12:37:14', 1, 1),
(46, 50, '2018-05-03 12:54:06', 1, 1),
(47, 50, '2018-05-03 12:56:22', 2, 1),
(48, 50, '2018-05-03 12:57:35', 0, 1),
(49, 50, '2018-05-03 12:57:53', 2, 1),
(50, 50, '2018-05-03 12:58:09', 0, 1),
(51, 50, '2018-05-03 12:58:13', 2, 1),
(52, 50, '2018-05-03 12:58:28', 1, 1),
(53, 50, '2018-05-03 12:58:40', 1, 1),
(54, 50, '2018-05-03 13:06:15', 0, 1),
(55, 50, '2018-05-03 13:11:32', 2, 1),
(56, 50, '2018-05-03 13:11:41', 0, 1),
(57, 50, '2018-05-03 13:11:50', 2, 1),
(58, 50, '2018-05-03 13:12:03', 2, 1),
(59, 50, '2018-05-03 13:12:14', 2, 1),
(60, 50, '2018-05-03 13:12:38', 2, 1),
(61, 50, '2018-05-03 13:13:09', 0, 1),
(62, 50, '2018-05-03 13:13:17', 0, 1),
(63, 50, '2018-05-03 13:13:40', 0, 1),
(64, 50, '2018-05-03 13:13:58', 0, 1),
(65, 50, '2018-05-03 13:15:06', 1, 1),
(66, 50, '2018-05-03 13:15:24', 1, 1),
(67, 150, '2018-05-03 13:20:20', 1, 1),
(68, 50, '2018-05-03 13:24:18', 1, 1),
(69, 50, '2018-05-03 13:24:58', 0, 1),
(70, 50, '2018-05-03 13:29:35', 1, 1),
(71, 50, '2018-05-03 13:31:21', 2, 1),
(72, 50, '2018-05-03 13:31:51', 2, 1),
(73, 50, '2018-05-03 13:32:39', 2, 1),
(74, 50, '2018-05-03 13:33:23', 0, 1),
(75, 50, '2018-05-03 13:52:08', 0, 1),
(76, 50, '2018-05-03 14:07:43', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `username`, `email`, `password`, `avatar`, `balance`) VALUES
(1, 'Crisz', 'cristiano.prrmn@eduge.ch', 'Super', NULL, 6050),
(2, 'kiady_a', 'kiady@gmail.com', 'Super', NULL, 6000),
(3, 'Simcir', 'simon@gmail.com', 'Super', NULL, 500),
(4, 'Lil_Thib', 'thibaut@gmail.com', 'Super', NULL, 500),
(5, 'FionDiLatte', 'pighini@gmail.com', 'Super', NULL, 550),
(7, 'Safio', 'safio@yopmail.com', 'Super', NULL, 500),
(8, 'Jorevan', 'jorge@yopmail.com', 'Super', NULL, 500),
(9, 'Gregory', 'gregory@yopmail.com', 'Super', NULL, 500),
(10, 'Loic', 'loic@yopmail.com', 'Super', NULL, 500),
(11, 'Billy', 'billy@yopmail.com', 'Super', NULL, 500),
(12, 'anneTrrr', 'anne@yopmail.com', 'Super', NULL, 2500);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
