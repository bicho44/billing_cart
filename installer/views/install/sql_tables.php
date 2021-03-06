<?php defined("SYSPATH") or die("No direct access allowed.") ?>
SET NAMES 'utf8';

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

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>contacts` (
  `id` int(11) NOT NULL auto_increment,
  `client_id` int(11) NOT NULL,
  `first` varchar(45) default NULL,
  `last` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `phone` varchar(45) default NULL,
  `mobile` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>invoices_items` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_id` int(11) default NULL,
  `item_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>invoices_reminders` (
  `id` int(11) NOT NULL auto_increment,
  `invoice_id` int(11) default NULL,
  `message` text,
  `date_sent` date default NULL,
  `contacts_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>items` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  `description` text,
  `unit_price` float(6,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `<?php echo $table_prefix ?>roles_users` (`user_id`, `role_id`) VALUES (1, 1);

CREATE TABLE IF NOT EXISTS `<?php echo $table_prefix ?>sessions` (
  `session_id` varchar(127) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

INSERT INTO `<?php echo $table_prefix ?>users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES (1, 'admin@demo.com', 'admin', 'b8db28255085bc9e66005a4795b58e6ab00552cb173a1838d3', 0, '');

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