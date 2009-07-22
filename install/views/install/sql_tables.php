<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
SET NAMES 'utf8';

<?php if ($drop_table): ?>
-- Drop Tables
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>clients`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>contacts`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>invoices`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>invoices_items`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>invoices_reminders`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>items`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>reminders`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>roles`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>roles_users`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>sessions`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>users`;
DROP TABLE IF EXISTS `<?php echo $table_prefix ?>user_tokens`;
<?php endif ?>


-- Create  Tables if they don't already exist
-- Clients Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>clients` (
  `id` int(11) NOT NULL auto_increment,
  `company` varchar(65) default NULL,
  `address` varchar(255) default NULL,
  `address1` varchar(255) default NULL,
  `city` varchar(155) default NULL,
  `country_code` varchar(45) default NULL,
  `postcode` varchar(45) default NULL,
  `phone` varchar(45) default NULL,
  `fax` varchar(45) default NULL,
  `url` varchar(200) default NULL,
  `currency_id` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Contacts Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>contacts` (
  `id` int(11) NOT NULL auto_increment,
  `client_id` int(11) NOT NULL,
  `first` varchar(45) default NULL,
  `last` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `telephone` varchar(45) default NULL,
  `mobile` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Invoice Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>invoices` (
  `id` int(11) NOT NULL auto_increment,
  `client_id` int(11) default NULL,
  `invoice_no` varchar(25) default NULL,
  `date` date default NULL,
  `due_in` varchar(26) default NULL,
  `notes` text,
  `total_price` float(6,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Invoice Items Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>invoices_items` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_id` int(11) default NULL,
  `item_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Invoice Reminder Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>invoices_reminders` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_id` int(11) default NULL,
  `message` text,
  `date_sent` date default NULL,
  `contacts_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Items Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>items` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  `description` text,
  `unit_price` float(6,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Roles Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>roles` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `<?php echo $table_prefix ?>roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- Users Roles Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Session Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>sessions` (
  `session_id` varchar(127) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Users Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `email` varchar(127) NOT NULL,
  `username` varchar(32) NOT NULL default '',
  `password` char(50) NOT NULL,
  `logins` int(10) unsigned NOT NULL default '0',
  `last_login` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- Users Token Table
CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>user_tokens` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `<?php echo $table_prefix ?>roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

ALTER TABLE `<?php echo $table_prefix ?>user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;