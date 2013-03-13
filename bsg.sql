-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2010 at 09:43 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `iddocs` int(11) NOT NULL AUTO_INCREMENT,
  `idorgs` int(11) NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`iddocs`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `docs`
--


-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE IF NOT EXISTS `orgs` (
  `idorgs` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `parent_idorgs` int(11) DEFAULT NULL,
  `membership` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `approved_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `approved_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idorgs`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`idorgs`, `name`, `slug`, `category`, `desc`, `parent_idorgs`, `membership`, `twitter`, `url`, `facebook`, `image`, `approved`, `active`, `created_by`, `approved_by`, `created_at`, `approved_at`, `updated_at`) VALUES
(1, 'Bowdoin Student Government', 'bsg', 1, 'The Bowdoin Student Government stands on campus as the democratically-elected, autonomous representative of the Student Body and receives its authority from those whom it serves. It seeks to be a partner to the faculty and administration in the leadership of the College, while being a relentless advocate for student needs and desires. Above all, it strives to refine the College''s most important goal', 0, 'open', 'bsgupdates', 'http://bsg.bowdoin.edu/', '', NULL, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2010-01-11 11:00:04'),
(2, 'Student Activities Funding Committee', 'safc', 1, 'They give people money.', 1, 'closed', '', 'http://bsg.bowdoin.edu/bsg/safc.php', '', NULL, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2010-03-16 22:43:19'),
(3, 'Student Organizations Oversight Committee', 'sooc', 1, 'They organize clubs and stuff.', 1, 'closed', NULL, 'http://bsg.bowdoin.edu/bsg/sooc.php', '', NULL, 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'Executive Committee', 'ec', 1, 'The leadership guys doing leadership stuff!', 1, 'closed', '', 'http://bsg.bowdoin.edu/bsg/members.php', '', NULL, NULL, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'The Bowdoin Orient', 'orient', 12, 'The oldest continuously published college weekly!', 0, 'approval', 'bowdoinorient', 'http://orient.bowdoin.edu/', 'bowdoinorient', NULL, NULL, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2010-01-11 08:45:48'),
(6, 'Bowdoin Students Online', 'bso', 12, 'The umbrella organization for Bowdoin''s online student services.', 0, 'open', '', '', '', NULL, NULL, 0, 1, 0, '2010-01-11 07:56:02', '0000-00-00 00:00:00', '2010-01-11 08:46:02'),
(7, 'The Meddiebempsters', 'meddies', 4, 'We rock!', 0, 'approval', '', 'http://www.meddies.com/', '', NULL, 0, 0, 5, 0, '2010-01-11 08:03:48', '0000-00-00 00:00:00', '2010-01-11 08:46:11'),
(8, 'Photography Club', 'photo', 5, 'We take cool photos!', 0, 'open', '', 'http://www.flickr.com/photos/holla', '', NULL, 0, 0, 3, 0, '2010-01-11 08:53:49', '0000-00-00 00:00:00', '2010-01-11 09:18:22'),
(9, 'Facilities Committee', 'Facilities', 1, 'Woot!', 1, 'open', '', '', '', NULL, 0, 0, 1, 0, '2010-03-17 22:14:54', '0000-00-00 00:00:00', NULL),
(10, 'curia', 'curia', 12, 'A place to love and hate Bowdoin.', 0, 'open', '', 'http://www.bcuria.com/', '', NULL, 0, 0, 1, 0, '2010-03-23 22:15:13', '0000-00-00 00:00:00', NULL),
(11, 'The Awesome Club', 'TAC', 11, 'Toph just couldn''t think of another club.', 0, 'open', 'themime', 'http://www.starwars.com', 'cocacola', NULL, 0, 0, 1, 0, '2010-03-23 23:20:11', '0000-00-00 00:00:00', NULL),
(12, 'The Awesomer Club', 'TACO', 11, 'Toph just couldn''t think of another club.', 0, 'open', 'themime', 'http://www.starwars.com', 'cocacola', NULL, 0, 0, 1, 0, '2010-03-23 23:21:03', '0000-00-00 00:00:00', '2010-03-27 05:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `orgs_categories`
--

CREATE TABLE IF NOT EXISTS `orgs_categories` (
  `idorgs_categories` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idorgs_categories`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orgs_categories`
--

INSERT INTO `orgs_categories` (`idorgs_categories`, `name`, `desc`) VALUES
(1, 'Student Governance', 'Organizations pertaining to student governance.'),
(2, 'Class Councils', 'The organizational bodies in charge of class unity and such.'),
(3, 'Social House', 'Like frats, but not.'),
(4, 'A cappella', 'Bowdoin a cappella groups.'),
(5, 'Arts, Theater, and Dance', 'ergergtr'),
(6, 'Business & Vocational', 'ergreger'),
(7, 'Club Sports', 'woerigerg'),
(8, 'Community Service', 'ergoijehrg'),
(9, 'Cultural', 'ergerge'),
(10, 'Outdoors', 'ergerger'),
(11, 'Politics & Activism', 'regiernhg'),
(12, 'Publications & Communications', 'ergiherg'),
(13, 'Recreation', 'ergnertg'),
(14, 'Religion', 'erhewryhtr'),
(15, 'Support & Spirit', 'rfederther'),
(16, 'Other', 'Organizations that do not fit in any other specified group.');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `idpositions` int(11) NOT NULL AUTO_INCREMENT,
  `idpositions_types` int(11) DEFAULT NULL,
  `idorgs` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`idpositions`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`idpositions`, `idpositions_types`, `idorgs`, `idusers`, `term`, `active`, `created_at`, `created_by`) VALUES
(1, 1, 8, 3, NULL, 1, '0000-00-00 00:00:00', 0),
(2, 2, 6, 3, NULL, 1, '0000-00-00 00:00:00', 0),
(3, 2, 6, 1, NULL, 1, '0000-00-00 00:00:00', 0),
(4, 2, 8, 1, NULL, 1, '0000-00-00 00:00:00', 0),
(5, 2, 7, 5, NULL, 1, '2010-01-11 10:45:01', 0),
(6, 2, 1, 0, NULL, 1, '2010-01-18 03:43:17', 0),
(7, 2, 5, 1, NULL, 1, '2010-03-17 04:24:39', 0),
(8, 2, 1, 1, NULL, 1, '2010-03-17 04:24:50', 0),
(9, 1, 9, 1, NULL, 0, '0000-00-00 00:00:00', 0),
(10, 1, 10, 1, NULL, 0, '0000-00-00 00:00:00', 0),
(11, NULL, 11, 1, NULL, 1, '2010-03-23 23:20:12', 0),
(12, 1, 12, 1, NULL, 0, '2010-03-23 23:21:03', 0),
(13, 2, 7, 1, NULL, 1, '2010-03-24 07:25:39', 0),
(14, 1, 12, 3, NULL, 0, '2010-03-24 07:25:58', 0),
(15, 2, 12, 5, NULL, 0, '2010-03-24 07:26:12', 0),
(16, 2, 12, 4, NULL, 0, '2010-03-24 07:26:25', 0),
(17, 1, 12, 3, NULL, 0, '2010-03-27 07:06:06', 0),
(18, 2, 12, 3, NULL, 1, '2010-03-27 08:08:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions_types`
--

CREATE TABLE IF NOT EXISTS `positions_types` (
  `idpositions_types` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idorgs_categories` int(11) DEFAULT NULL,
  `idorgs` int(11) DEFAULT NULL,
  `desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `selection` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `selector` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eligibility` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privileges` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idpositions_types`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `positions_types`
--

INSERT INTO `positions_types` (`idpositions_types`, `name`, `slug`, `idorgs_categories`, `idorgs`, `desc`, `selection`, `selector`, `eligibility`, `privileges`) VALUES
(1, 'Administrator', 'admin', NULL, NULL, 'Administrator of this group''s BSO account.', 'appointed', 'admin', 'open', 'full'),
(2, 'Member', 'member', NULL, NULL, 'Member of this group.', 'open', 'self', 'open', 'read'),
(3, 'President', 'pres', NULL, 1, 'The BSG president does stuff.', 'election', 'students', 'open', 'semi'),
(4, 'Class President', 'class_pres', 2, NULL, 'The chief executive of a class.', 'election', 'class', 'class', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classyear` int(11) DEFAULT NULL,
  `major` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `alias`, `status`, `fullname`, `nickname`, `classyear`, `major`, `bio`, `image`, `twitter`, `facebook`, `url`) VALUES
(1, 'ctucker', 'admin', 'Christopher Tucker', 'Toph', 2012, 'Undecided', 'I love existence! <b>Woohoo!!!</b> Also, I think this whole web site thing is really shaping up quite nicely. And now you can kind of login!', NULL, 'tophtucker', 'tophtucker', 'http://www.tophtucker.com/'),
(2, 'wtucker', 'member', 'William Tucker', 'Willy', 2013, 'Videogames', 'I''m Toph''s brother.', NULL, '', 'willytucker', ''),
(3, 'awolf', 'member', 'Aaron Wolf', 'Aaron', 2012, 'Physics', 'I was Toph''s roommate last year.', NULL, '', '', ''),
(4, 'rshaw3', 'member', 'Robert Shaw', 'Bobby', 2012, 'Chemistry', 'I''m one of Toph''s current roommates!', NULL, '', 'bobby.shaw', ''),
(5, 'cli', 'member', 'Chris Li', 'Chris', 2011, 'Music', 'Worst. Proctor. Ever.', NULL, '', 'clibird', ''),
(6, 'asprauten', 'member', 'Anitra Sprauten', 'Anitra', 2012, 'French', 'I''m a Facebook unperson.', NULL, '', '', '');
