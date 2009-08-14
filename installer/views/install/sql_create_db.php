<?php defined("SYSPATH") or die("No direct access allowed.") ?>
DROP DATABASE `<?php echo $database; ?>`;
CREATE DATABASE `<?php echo $database; ?>` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;