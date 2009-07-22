<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

INSERT INTO `<?php echo $table_prefix ?>contacts` (`id`, `client_id`, `first`, `last`, `email`, `telephone`, `mobile`, `password`) VALUES
(1, 1, 'John', 'Smith', 'j.smith@grandacme.com', '0202020', '0970977', 'anything'),
(2, 1, 'James', 'Bond', 'j.bond@acme.com', '0202020', '07771122771', 'anything'),
(3, 1, 'James', 'Blake', 'j.blake@grandacme.com', '02089930999', '07855599441', 'nothing'),
(4, 1, 'Ace', 'Black', 'a.black@greatacmegrand.com', '02079892343', '07508223291', 'limewhale'),
(5, 1, 'James', 'Good', 'a.good@acmeleft.com', '0902938490384', '077728394849', NULL),
(6, 2, 'Bro', 'Travis', 'b.travis@blueplanet.com', '02058493728', '07789878909', NULL),
(7, 3, 'Bro', 'Travis', 'b.travis@blueplanet.com', '02058493728', '07789878909', NULL),
(8, 2, 'Harry', 'Good', 'h.good@acmeright.com', '0923938490384', '079828394849', NULL),
(9, 2, 'Jack', 'Roberts', 'j.roberts@littleacme.com', '02039409480', '07987682392', NULL),
(10, 3, 'Jack', 'Roberts', 'j.roberts@littleacme.com', '02039409480', '07987682392', NULL),
(11, 3, 'Jack', 'Roberts', 'j.roberts@littleacme.com', '02039409480', '07987682392', NULL),
(12, 3, 'Jack', 'Roberts', 'j.roberts@littleacme.com', '02039409480', '07987682392', NULL),
(13, 2, 'Jack', 'Roberts', 'j.roberts@littleacme.com', '02039409480', '07987682392', NULL),
(14, 2, 'Johnny', 'Lewis', 'j.lewis@littleacme.com', '02039098928', '07798998989', NULL),
(15, 3, 'Dave', 'Good', 'd.good@acmeright.com', '02039409482', '07987682332', NULL),
(16, 2, 'David', 'Allen', 'd.allen@acmeplus.com', '02039409483', '07987682232', NULL),
(17, 2, 'Dave', 'Allen', 'd.allen@acmeplus.com', '02039409480', '07798998989', NULL);

INSERT INTO `<?php echo $table_prefix ?>items` (`id`, `name`, `description`, `unit_price`) VALUES
(1, 'Hosting', 'Hosting for Website.\r\n\r\nPackage: Go Small', 25.00),
(2, 'Website', 'Website', 350.00);

INSERT INTO `<?php echo $table_prefix ?>roles_users` (`user_id`, `role_id`) VALUES
(1, 1);

INSERT INTO `<?php echo $table_prefix ?>users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'admin@demo.com', 'admin', 'b8db28255085bc9e66005a4795b58e6ab00552cb173a1838d3', 2, 1248252485);