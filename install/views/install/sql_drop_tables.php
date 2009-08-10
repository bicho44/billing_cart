<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
SET NAMES 'utf8';

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