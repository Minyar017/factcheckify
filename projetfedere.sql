-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 01, 2024 at 07:13 PM
-- Server version: 4.1.9
-- PHP Version: 4.3.10
-- 
-- Database: `projetfedere`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `first_name` varchar(50) NOT NULL default '',
  `last_name` varchar(50) NOT NULL default '',
  `gender` enum('Feminin','Masculin') NOT NULL default 'Feminin',
  `age` int(11) default NULL,
  `email` varchar(100) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `profile_picture` varchar(255) default NULL,
  `diploma` varchar(255) NOT NULL default '',
  `category` varchar(50) default NULL,
  `bio` text,
  `terms_and_conditions` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'John', 'Doe', 'Masculin', 25, 'johndoe@example.com', 'password123', 'profile_picture.png', 'diploma.pdf', 'Technologies', 'Développeur passionné de technologie.', 1);
INSERT INTO `users` VALUES (2, '0', 'ammar', '', 20, 'miniar553@gmail.com', 'lm12lm12', NULL, '3dtd.xml', '', 'azerty', 1);
INSERT INTO `users` VALUES (3, 'azeer', 'ammar', '', 14, 'douamaayouf23@gmail.com', 'pm12pm12', NULL, '3dtdxml.png', '2', 'uyuyuy', 1);
