-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 09 Janvier 2013 à 17:01
-- Version du serveur: 5.1.49-3
-- Version de PHP: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tp`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_historique`
--

DROP TABLE IF EXISTS `tp_historique`;
CREATE TABLE IF NOT EXISTS `tp_historique` (
  `histo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `histo_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `histo_id_user` int(10) unsigned NOT NULL,
  `histo_id_reponse` int(10) unsigned NOT NULL,
  `histo_id_questions` int(10) unsigned NOT NULL,
  PRIMARY KEY (`histo_id`),
  KEY `histo_id_user` (`histo_id_user`),
  KEY `histo_id_reponse` (`histo_id_reponse`),
  KEY `histo_id_questions` (`histo_id_questions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tp_liste_questions`
--

DROP TABLE IF EXISTS `tp_liste_questions`;
CREATE TABLE IF NOT EXISTS `tp_liste_questions` (
  `lst_ques_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lst_ques_id_ques` int(10) unsigned NOT NULL,
  `lst_ques_id_questionnaire` int(10) unsigned NOT NULL,
  PRIMARY KEY (`lst_ques_id`),
  KEY `lst_ques_id_questionnaire` (`lst_ques_id_questionnaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tp_liste_questions`
--

INSERT INTO `tp_liste_questions` (`lst_ques_id`, `lst_ques_id_ques`, `lst_ques_id_questionnaire`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(5, 4, 1),
(6, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tp_questionnaire`
--

DROP TABLE IF EXISTS `tp_questionnaire`;
CREATE TABLE IF NOT EXISTS `tp_questionnaire` (
  `questionnaire_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_nb` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `questionnaire_temps` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `questionnaire_intitule` varchar(100) NOT NULL,
  `questionnaire_id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`questionnaire_id`),
  KEY `questionnaire_id_user` (`questionnaire_id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tp_questionnaire`
--

INSERT INTO `tp_questionnaire` (`questionnaire_id`, `questionnaire_nb`, `questionnaire_temps`, `questionnaire_intitule`, `questionnaire_id_user`) VALUES
(1, 3, 30, 'Un premier questionnaire de dev', 1),
(2, 6, 30, 'Un deuxieme quèestionnaire pour faire une liste', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tp_questions`
--

DROP TABLE IF EXISTS `tp_questions`;
CREATE TABLE IF NOT EXISTS `tp_questions` (
  `id_questions` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_questions` tinyint(3) unsigned NOT NULL,
  `date_questions` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intitule_questions` text NOT NULL,
  `proposition_questions_1` varchar(250) DEFAULT NULL,
  `proposition_questions_2` varchar(250) DEFAULT NULL,
  `proposition_questions_3` varchar(250) DEFAULT NULL,
  `proposition_questions_4` varchar(250) DEFAULT NULL,
  `reponses_questions` varchar(100) NOT NULL COMMENT 'id reponse, ou reponse libre',
  `image_url_questions` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_questions`),
  KEY `fk_qestions` (`id_questions`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Liste des questions' AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tp_questions`
--

INSERT INTO `tp_questions` (`id_questions`, `type_questions`, `date_questions`, `intitule_questions`, `proposition_questions_1`, `proposition_questions_2`, `proposition_questions_3`, `proposition_questions_4`, `reponses_questions`, `image_url_questions`) VALUES
(1, 0, '2012-12-14 08:47:24', 'ma premiere question', 'question 1', 'question 2', 'question 3', 'question 4', '1', NULL),
(2, 1, '2012-12-14 08:47:24', 'ma deuxieme reponse', 'reponse 1', 'reponse 2', 'reponse 3', 'reponse 4', '2', NULL),
(3, 2, '2012-12-14 08:49:37', 'la prochaine est un champ libre', NULL, NULL, NULL, NULL, 'reponse3', NULL),
(4, 0, '2013-01-09 09:15:40', '2 radio', 'r1', 'r2', NULL, NULL, '1', NULL),
(5, 2, '2013-01-09 09:19:10', 'form 1', NULL, NULL, NULL, NULL, 'reponse5', 'http://certif.formation.dev/apple-touch-icon-114x114-precomposed.png'),
(6, 0, '2013-01-09 15:15:08', 'la question qui debug !', 'peu importe', 'c pour debug', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tp_reponses`
--

DROP TABLE IF EXISTS `tp_reponses`;
CREATE TABLE IF NOT EXISTS `tp_reponses` (
  `rep_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rep_user_id` int(10) unsigned DEFAULT NULL,
  `rep_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rep_id_lst_quest` int(10) unsigned NOT NULL,
  `rep_id_quest` int(10) unsigned NOT NULL,
  `rep_reponse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rep_id`),
  KEY `fk_user` (`rep_user_id`),
  KEY `rep_user_id` (`rep_user_id`),
  KEY `rep_id_quest` (`rep_id_quest`),
  KEY `rep_id_lst_quest` (`rep_id_lst_quest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tp_tags`
--

DROP TABLE IF EXISTS `tp_tags`;
CREATE TABLE IF NOT EXISTS `tp_tags` (
  `tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tags_label` varchar(50) NOT NULL,
  PRIMARY KEY (`tags_id`),
  KEY `fk_tag_questions` (`tags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tp_tags_questions`
--

DROP TABLE IF EXISTS `tp_tags_questions`;
CREATE TABLE IF NOT EXISTS `tp_tags_questions` (
  `tq_tags_id` int(10) unsigned NOT NULL,
  `tq_quest_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tq_quest_id`),
  KEY `fk_tags` (`tq_tags_id`),
  KEY `fk_questions` (`tq_tags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liaison des tags aux questions';

-- --------------------------------------------------------

--
-- Structure de la table `tp_utilisateurs`
--

DROP TABLE IF EXISTS `tp_utilisateurs`;
CREATE TABLE IF NOT EXISTS `tp_utilisateurs` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_pwd` varchar(32) NOT NULL,
  `user_admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login_UNIQUE` (`user_login`),
  KEY `fk_reponses` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `tp_utilisateurs`
--

INSERT INTO `tp_utilisateurs` (`user_id`, `user_login`, `user_pwd`, `user_admin`) VALUES
(1, 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 1),
(2, 'user', '4a7d1ed414474e4033ac29ccb8653d9b', NULL),
(33, 'azerty', 'YPfF8Ea3gW', NULL),
(35, 'azertyd', '6t8omnXE', NULL),
(37, 'azertydv', '9c7cO8o63', NULL),
(39, 'ffff', '34o4nG62@L', NULL),
(40, 'alfred', 'zEDmRdID0', NULL),
(50, 'alfredd', 'i7tcde51', NULL),
(52, 'alfreddg', '86Nu0z0q4', NULL),
(53, 'azza', 'F8AuV11d', NULL),
(54, 'azzzz', 'O9X2ZY94', NULL),
(55, 'oiuy', '5hN7mADV1', NULL),
(56, 'yooo', 'WzoFX2y05X', NULL),
(57, '123', 'ul2kMkNF', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tp_historique`
--
ALTER TABLE `tp_historique`
  ADD CONSTRAINT `tp_historique_ibfk_2` FOREIGN KEY (`histo_id_user`) REFERENCES `tp_utilisateurs` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_historique_ibfk_3` FOREIGN KEY (`histo_id_reponse`) REFERENCES `tp_reponses` (`rep_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_historique_ibfk_4` FOREIGN KEY (`histo_id_questions`) REFERENCES `tp_questions` (`id_questions`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_liste_questions`
--
ALTER TABLE `tp_liste_questions`
  ADD CONSTRAINT `tp_liste_questions_ibfk_1` FOREIGN KEY (`lst_ques_id_questionnaire`) REFERENCES `tp_questionnaire` (`questionnaire_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_questionnaire`
--
ALTER TABLE `tp_questionnaire`
  ADD CONSTRAINT `tp_questionnaire_ibfk_1` FOREIGN KEY (`questionnaire_id_user`) REFERENCES `tp_utilisateurs` (`user_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_reponses`
--
ALTER TABLE `tp_reponses`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`rep_user_id`) REFERENCES `tp_utilisateurs` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tp_reponses_ibfk_1` FOREIGN KEY (`rep_id_quest`) REFERENCES `tp_questions` (`id_questions`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tp_tags_questions`
--
ALTER TABLE `tp_tags_questions`
  ADD CONSTRAINT `fk_questions` FOREIGN KEY (`tq_quest_id`) REFERENCES `tp_questions` (`id_questions`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tags` FOREIGN KEY (`tq_tags_id`) REFERENCES `tp_tags` (`tags_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
