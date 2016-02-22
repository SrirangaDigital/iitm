<?php

define('JOURNAL_DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE . '` (
  `journal` varchar(20) DEFAULT NULL,
  `volume` varchar(3) DEFAULT NULL,
  `issue` varchar(10) DEFAULT NULL,
  `month` varchar(6) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `hassup` tinyint(1) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `feature` varchar(200) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `abstract` text,
  `keywords` varchar(400) DEFAULT NULL,
  `authors` text,
  `dates` mediumtext,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('FORTHCOMING_TABLE_SCHEMA', 'CREATE TABLE `' . FORTHCOMING_TABLE . '` (
  `journal` varchar(20) DEFAULT NULL,
  `volume` varchar(3) DEFAULT NULL,
  `issue` varchar(10) DEFAULT NULL,
  `month` varchar(6) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `hassup` tinyint(1) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `feature` varchar(200) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `abstract` text,
  `keywords` varchar(400) DEFAULT NULL,
  `authors` text,
  `dates` mediumtext,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('FULLTEXT_TABLE_SCHEMA', 'CREATE TABLE `' . FULLTEXT_TABLE . '` (
  `text` text,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('FULLTEXT_INDEX_SCHEMA', 'CREATE FULLTEXT INDEX text_index ON ' . FULLTEXT_TABLE . ' (text);');

define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8mb4');

define('FELLOW_TABLE_SCHEMA', 'CREATE TABLE `' . FELLOW_TABLE . '` (
  `name` varchar(400) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `sal` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `birth` DATE DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `honours` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `telephone_office` varchar(50) DEFAULT NULL,
  `telephone_residence` varchar(50) DEFAULT NULL,
  `telephone_mobile` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `specialization` varchar(500) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `yearelected` varchar(100) DEFAULT NULL,
  `councilservice` varchar(200) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `death` DATE DEFAULT NULL,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('ASSOCIATE_TABLE_SCHEMA', 'CREATE TABLE `' . ASSOCIATE_TABLE . '` (
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `birth` DATE DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `honours` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `telephone_office` varchar(50) DEFAULT NULL,
  `telephone_residence` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id` varchar(50) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

?>
