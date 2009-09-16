<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'dashboard';

// Clients routing
$config['clients/new'] = 'clients/add';
$config['clients/new/([A-Za-z0-9\-]+)'] = 'clients/add/$1';

// Invoices routing
$config['invoices/new'] = 'invoices/add';

// Contacts routing
$config['contacts/new'] = 'contacts/add';
$config['contacts/new/([A-Za-z0-9\-]+)'] = 'contacts/add/$1';