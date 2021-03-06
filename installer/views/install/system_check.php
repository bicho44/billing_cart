<?php defined("SYSPATH") or die("No direct script access.") ?>
<div id="content" class="login-page">
	<div class="container_16">
		
		<ul id="nav" class="grid_4 push_1">
			<li id="nav-1" class="active"><em></em><span><?php echo __('System Check'); ?></span></li>
			<li id="nav-2"><em></em><span><?php echo __('Database Setup'); ?></span></li>
			<li id="nav-3"><em></em><span><?php echo __('Save Config'); ?></span></li>
			<li id="nav-4"><em></em><span><?php echo __('Complete'); ?></span></li>
		</ul>
		<div id="main-block" class="grid_10">
			<h1><span><?php echo __('System Check'); ?></span></h1>
			<p class="intro"><?php echo __('Checking to see if server have all the requirements to install app'); ?></p>
			
			<!-- Error Message -->
			<?php if ( ! empty($error)): ?>
            <div class="error"><p><?php echo $error ?>.</p></div>
        	<?php endif; ?>
			<!-- / - Error Message -->
			
			<table cellspacing="0">
				<tr>
					<th><?php echo __('PHP Version'); ?></th>
					<?php if ($php_version): ?>
					<td class="pass"><?php echo PHP_VERSION ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('%bc requires PHP 5.2 or newer, this version is', array('%bc' => Kohana::config('bc.bc'))); ?> <?php echo PHP_VERSION ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th><?php echo __('System Directory'); ?></th>
					<?php if ($system_directory): ?>
					<td class="pass"><?php echo SYSPATH ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The configured system directory does not exist or does not contain required files'); ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th><?php echo __('Application Directory'); ?></th>
					<?php if ($application_directory): ?>
					<td class="pass"><?php echo str_replace('\\', '/', realpath(DOCROOT.'application')).'/' ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The configured application directory does not exist or does not contain required files'); ?>.</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th><?php echo __('Config Directory'); ?></th>
					<?php if ($config_writable): ?>
					<td class="pass"><?php echo __('%config_dir is writable', array('%config_dir' => $config_dir)); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The directory %config_dir does not exist or is not writable', array('%config_dir' => $config_dir)); ?>.</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th><?php echo __('Cache Directory'); ?></th>
					<?php if ($cache_writable): ?>
					<td class="pass"><?php echo __('%cache_dir is writable', array('%cache_dir' => $cache_dir)); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The directory %cache_dir does not exist or is not writable', array('%cache_dir' => $cache_dir)); ?>.</td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th><?php echo __('Modules Directory'); ?></th>
					<?php if ($modules_directory): ?>
					<td class="pass"><?php echo MODPATH ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The configured modules directory does not exist or does not contain required files'); ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>PCRE UTF-8</th>
					<?php if ( ! $pcre_utf8): $php_pcre = '<a href="http://php.net/pcre">PCRE</a>' ?>
					<td class="fail"><?php echo __('%php_pcre has not been compiled with UTF-8 support', array('%php_pcre' => $php_pcre)); ?>.</td>
					<?php elseif ( ! $pcre_unicode ): ?>
					<td class="fail"><?php echo __('%php_pcre has not been compiled with Unicode property support', array('%php_pcre' => $php_pcre)); ?>.</td>
					<?php else: ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php endif ?>
				</tr>
				
				<tr>
					<th>Reflection Enabled</th>
					<?php if ($reflection_enabled): ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('PHP %reflection is either not loaded or not compiled in', array('%reflection' => '<a href="http://www.php.net/reflection">reflection</a>')) ?>.</td>
				<?php endif ?>
				</tr>
			
				<tr>
					<th>Filters Enabled</th>
					<?php if ($filters_enabled): ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The %filter extension is either not loaded or not compiled in', array('%filter' => '<a href="http://www.php.net/filter">filter</a>')) ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Iconv Extension Loaded</th>
					<?php if ($iconv_loaded): ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The %iconv extension is not loaded', array('%iconv' => '<a href="http://php.net/iconv">iconv</a>')); ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>Mbstring Not Overloaded</th>
					<?php if ($mbstring): ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('The %mbstring extension is overloading PHP\'s native string functions', array('%mbstring' => '<a href="http://php.net/mbstring">mbstring</a>')) ?>.</td>
					<?php endif ?>
				</tr>
			
				<tr>
					<th>URI Determination</th>
					<?php if ($uri_determination): ?>
					<td class="pass"><?php echo __('Pass'); ?></td>
					<?php else: ?>
					<td class="fail"><?php echo __('Neither %request_uri or %php_self is available', array('%request_uri' => '<code>$_SERVER[\'REQUEST_URI\']</code>', '%php_self' => '<code>$_SERVER[\'PHP_SELF\']</code>')) ?>.</td>
					<?php endif ?>
				</tr>
			
			</table>
			
			<!-- Success Message -->
			<?php if (!empty($success)): ?>
            <div class="success">
            	<p><?php echo $success ?>.</p>
            	<div id="next">
            		<a href="<?php echo url::site('install/database_setup'); ?>" class="button"><?php echo __('Next'); ?></a>
            	</div>
        	</div>
        	<?php endif; ?>
			<!-- / - Success Message -->
		</div>
	</div>
</div>