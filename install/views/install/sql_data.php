<?php defined('SYSPATH') OR die('No direct access allowed.') ?>
INSERT INTO `<?php echo $table_prefix ?>clients` (`id`, `company`, `address`, `address1`, `city`, `country_code`, `postcode`, `phone`, `fax`, `url`, `currency_id`) VALUES
(1, 'Good Company', '239 Year', 'Li Lo', 'Lojes', '0', 'L23 7JH', '02089032342', '01238765287', 'www.goodcompany.com', '0'),
(2, 'Acme Company', '2 Grand Central', 'Central Park', 'New York', '0', 'N23 7JH', '02089032342', '01238765287', 'www.acmecompany.com', '0'),
(3, 'Acme New', '243 New Street', 'Brokwell', 'Lonjodn', NULL, 'N12 4HA', '02080904008', '02090803054', 'http://www.acmenew.com', NULL),
(4, 'Grand Too Good', '267 Forth Street', 'Uptown Vegas', 'So ha', NULL, 'EN1 8JH', '01920928319', '09283928792', 'http://www.grandtoogood.com', NULL),
(5, 'Little Acme', '2 Grand Central', 'Brokwell', 'Londin', NULL, 'ex1 3jt', '02080904008', '02090803054', 'http://www.littleacme.com', NULL),
(6, 'MyPhone', '32 Holl Road', '', 'Skaie', NULL, 'SK1 7UY', '02089032342', '', '', NULL);

INSERT INTO `<?php echo $table_prefix ?>contacts` (`id`, `client_id`, `first`, `last`, `email`, `phone`, `mobile`, `password`) VALUES
(1, 1, 'Jack', 'Black', 'j.black@goodcompany.com', '02039409482', '07798998989', NULL),
(2, 5, 'Johnny', 'Lewis', 'j.lewis@littleacme.com', '02039098928', '07987682392', NULL),
(3, 3, 'David', 'Allen', 'd.allen@acmeplus.com', '02039409480', '07987682254', NULL),
(4, 0, 'John', 'Thomas', 'j.thomas@client.com', '09090909090', '00293849382', NULL),
(5, 0, 'John', 'Thomas', 'j.thomas@client.com', '09090909090', '00293849382', NULL),
(6, 0, 'John', 'Thomas', 'j.thomas@client.com', '01920928319', '00293849382', NULL),
(7, 2, 'Dave', 'Roberts', 'd.roberts@acme.com', '01920928319', '', NULL),
(8, 6, 'David', 'Hass', 'd.hass@myphone.com', '02089032345', '07909890987', NULL);

INSERT INTO `<?php echo $table_prefix ?>items` (`id`, `name`, `description`, `unit_price`) VALUES
(1, 'Hosting', 'Hosting for Website. Package: Go Small', 25.00),
(2, 'Website', 'Website', 350.00);