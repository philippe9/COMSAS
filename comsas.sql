-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 18 Novembre 2017 à 13:04
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `comsas`
--
CREATE DATABASE IF NOT EXISTS `comsas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `comsas`;
-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `corps` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `resume`, `corps`, `date`, `id_utilisateur`) VALUES
(1, 'Un test', 'sdfsdfsdf', 'dkjflsdjf lqjd flqj ljsdq dkjqmdk fqk', '2017-09-24 17:17:34', 1),
(2, 'test 2', 'nothing', '<p>dfsdfsdf zfqsd qdfqs d</p>', '2017-09-24 17:37:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `niveau` set('Licence 1','Licence 2','Licence 3','Master 1','Master 2','Doctorat 1','Doctorat 2','Doctorat 3') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `professeur` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `annee` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filleul`
--

CREATE TABLE `filleul` (
  `id_filleul` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `numero` varchar(9) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parrain` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `filleul`
--

INSERT INTO `filleul` (`id_filleul`, `nom`, `numero`, `parrain`) VALUES
(1, 'MATTON JEF', '783234824', NULL),
(2, 'NGUEMTCHUENG PHILIPPE', '8423947', NULL),
(3, 'STEPHANE FEDIM', '945937839', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_utilisateur` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `annee` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `raison` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `nom`, `annee`, `raison`, `role`, `logo`, `id_utilisateur`) VALUES
(1, 'Google', '2017/2018', 'Champ fichier manquant', 'Sponsor', 'https://pbs.twimg.com/profile_images/839721704163155970/LI_TRk1z_400x400.jpg', 1),
(2, 'Google', '2017/2018', 'Champ fichier manquant', 'Sponsor', 'https://pbs.twimg.com/profile_images/839721704163155970/LI_TRk1z_400x400.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `niveau` set('Licence 1','Licence 2','Licence 3','Master 1','Master 2','Doctorat 1','Doctorat 2','Doctorat 3') COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` int(11) NOT NULL,
  `id_profil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `username`, `email`, `password`, `token`, `type`, `id_profil`) VALUES
(1, 'jefcolbi', 'jefcolbi@hotmail.com', 'admincomsas', '', 0, NULL),
(2, 'fedim', 'fedim@comsas.com', '$2y$12$syflL.mj5kKkOcrhuRegAealIbpwet9uLLZfB7oNFNifqJo.gJ0CG', '831322', 1, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `un_art_titre` (`titre`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `filleul`
--
ALTER TABLE `filleul`
  ADD PRIMARY KEY (`id_filleul`),
  ADD KEY `parrain` (`parrain`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD UNIQUE KEY `un_user_projet` (`id_utilisateur`,`id_projet`),
  ADD KEY `fk_memb_proj` (`id_projet`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `un_username` (`username`),
  ADD UNIQUE KEY `un_email` (`email`),
  ADD KEY `id_profil` (`id_profil`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `filleul`
--
ALTER TABLE `filleul`
  MODIFY `id_filleul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_art_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_cour_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_eve_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `fk_memb_proj` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_memb_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `fk_part_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_proj_user` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_usr_profil` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
