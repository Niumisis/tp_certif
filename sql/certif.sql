delimiter $$

CREATE TABLE `tp_historique` (
  `histo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `histo_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `histo_id_user` int(10) unsigned NOT NULL,
  `histo_id_reponse` int(10) unsigned NOT NULL,
  `histo_id_questions` int(10) unsigned NOT NULL,
  PRIMARY KEY (`histo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `tp_liste_questions` (
  `lst_ques_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lst_ques_nb` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `lst_ques_ids_ques` varchar(100) NOT NULL,
  `lst_ques_id_user` int(10) unsigned NOT NULL,
  `lst_ques_temps` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`lst_ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `tp_questions` (
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
  PRIMARY KEY (`id_questions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liste des questions'$$

delimiter $$

CREATE TABLE `tp_reponses` (
  `rep_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rep_user_id` int(10) unsigned DEFAULT NULL,
  `rep_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rep_id_lst_quest` int(10) unsigned NOT NULL,
  `rep_id_quest` int(10) unsigned NOT NULL,
  `rep_reponse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `tp_tags` (
  `tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tags_label` varchar(50) NOT NULL,
  PRIMARY KEY (`tags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `tp_tags_questions` (
  `tq_tags_id` int(10) unsigned NOT NULL,
  `tq_quest_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tq_tags_id`,`tq_quest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liaison des tags aux questions'$$

delimiter $$

CREATE TABLE `tp_utilisateurs` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `user_admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login_UNIQUE` (`user_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

