<?php

define('PHOTOS_DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE . '` (
  `id` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('FULLTEXT_TABLE_SCHEMA', 'CREATE TABLE `' . FULLTEXT_TABLE . '` (
  `text` text,
  `id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('FULLTEXT_INDEX_SCHEMA', 'CREATE FULLTEXT INDEX text_index ON ' . FULLTEXT_TABLE . ' (text);');

define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8mb4');

?>
