<?php defined("SYSPATH") or die("No direct script access.") ?>
<div id="content" class="login-page">
	<div class="container_16">
		<style type="text/css">
			#tests table th,
			#tests table td { padding: 0.2em 0.4em; text-align: left; vertical-align: top; }
			#tests table td.pass { color: #191; }
			#tests table td.fail { color: #911; }
			#tests #results { color: #fff; }
			#tests #results p { padding: 0.8em 0.4em; }
			#tests #results p.pass { background: #191; }
			#tests #results p.fail { background: #911; }
		</style>
		
		<ul id="nav" class="grid_4 push_2">
			<li id="nav-1" class="active"><em></em><span>System Check</span></li>
			<li id="nav-2"><em></em><span>Database Setup</span></li>
			<li id="nav-3"><em></em><span>Save Config</span></li>
			<li id="nav-4"><em></em><span>Complete</span></li>
		</ul>
		<div id="main-block" class="grid_10 push_1">
			<h1><span>System Check</span></h1>
			<p class="intro">Checking to see if server have all the requirements to install app</p>
			<table cellspacing="0">
				<tr>
					<th>PHP Version</th>
					<?php if ($php_version): ?>
					<td class="pass"><?php echo PHP_VERSION ?></td>
					<?php else: ?>
					<td class="fail">Kohana requires PHP 5.2 or newer, this version is <?php echo PHP_VERSION ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>System Directory</th>
					<?php if ($system_directory): ?>
					<td class="pass"><?php echo SYSPATH ?></td>
					<?php else: ?>
					<td class="fail">The configured <code>system</code> directory does not exist or does not contain required files.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Application Directory</th>
					<?php if ($application_directory): ?>
					<td class="pass"><?php echo APPPATH ?></td>
					<?php else: ?>
					<td class="fail">The configured <code>application</code> directory does not exist or does not contain required files.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Modules Directory</th>
					<?php if ($modules_directory): ?>
					<td class="pass"><?php echo MODPATH ?></td>
					<?php else: ?>
					<td class="fail">The configured <code>modules</code> directory does not exist or does not contain required files.</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th>Config Directory</th>
					<?php if ($config_writable): ?>
					<td class="pass"><?php echo str_replace('\\', '/', realpath(DOCROOT.'application/config')).'/' ?> is writable</td>
					<?php else: ?>
					<td class="fail">The directory <code><?php echo str_replace('\\', '/', realpath(DOCROOT.'application/config')).'/' ?></code> does not exist or is not writable.</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th>Cache Directory</th>
					<?php if ($cache_writable): ?>
					<td class="pass"><?php echo str_replace('\\', '/', realpath(DOCROOT.'application/cache')).'/' ?> is writable</td>
					<?php else: ?>
					<td class="fail">The <code><?php echo str_replace('\\', '/', realpath(DOCROOT.'application/cache')).'/' ?></code> directory is not writable.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>PCRE UTF-8</th>
					<?php if ( ! $pcre_utf8): ?>
					<td class="fail"><a href="http://php.net/pcre">PCRE</a> has not been compiled with UTF-8 support.</td>
					<?php elseif ( ! $pcre_unicode ): ?>
					<td class="fail"><a href="http://php.net/pcre">PCRE</a> has not been compiled with Unicode property support.</td>
					<?php else: ?>
					<td class="pass">Pass</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th>Reflection Enabled</th>
					<?php if ($reflection_enabled): ?>
					<td class="pass">Pass</td>
					<?php else: ?>
					<td class="fail">PHP <a href="http://www.php.net/reflection">reflection</a> is either not loaded or not compiled in.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Filters Enabled</th>
					<?php if ($filters_enabled): ?>
					<td class="pass">Pass</td>
					<?php else: ?>
					<td class="fail">The <a href="http://www.php.net/filter">filter</a> extension is either not loaded or not compiled in.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Iconv Extension Loaded</th>
					<?php if ($iconv_loaded): ?>
					<td class="pass">Pass</td>
					<?php else: ?>
					<td class="fail">The <a href="http://php.net/iconv">iconv</a> extension is not loaded.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Mbstring Not Overloaded</th>
					<?php if ($mbstring): ?>
					<td class="pass">Pass</td>
					<?php else: ?>
					<td class="fail">The <a href="http://php.net/mbstring">mbstring</a> extension is overloading PHP's native string functions.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>URI Determination</th>
					<?php if ($uri_determination): ?>
					<td class="pass">Pass</td>
					<?php else: ?>
					<td class="fail">Neither <code>$_SERVER['REQUEST_URI']</code> or <code>$_SERVER['PHP_SELF']</code> is available.</td>
					<?php endif ?>
				</tr>
			
			</table>
		</div>
	</div>
</div>