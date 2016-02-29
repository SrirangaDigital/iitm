<?php

define('DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_L1_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L1 . '` (
  `albumID` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`albumID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('METADATA_TABLE_L2_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L2 . '` (
  `id` varchar(50) NOT NULL,
  `albumID` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8mb4');

?>
