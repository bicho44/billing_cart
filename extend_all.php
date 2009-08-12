<?php
// Libraries
class Controller extends Controller_Core
{
	public $uri;
	public $input;
	public $db;
}
class Input extends Input_Core
{
	public function post();
	public function get();
	public function cookie();
	public function server();
}

class Archive extends Archive_Core {}
class Cache extends Cache_Core {}
class Calendar extends Calendar_Core {}
class Database extends Database_Core {}
class Encrypt extends Model_Core {}
class FTP extends FTP_Core {}
class Image extends Image_Core {}
class Model extends Model_Core {}
class ORM extends ORM_Core {}
class Pagination extends Pagination_Core {}
class Payment extends Payment_Core {}
class Profiler extends Profiler_Core {}
class Router extends Router_Core {}
class Session extends Session_Core {}
class URI extends URI_Core {}
class Validation extends Validation_Core {}
class View extends View_Core {}
class Auth extends Auth_Core {}


// Helpers

class arr extends arr_Core {}
class cookie extends cookie_Core {}
class date extends date_Core {}
class download extends download_Core {}
class email extends email_Core {}
class expires extends expires_Core {}
class feed extends feed_Core {}
class file extends file_Core {}
class form extends form_Core {}
class html extends html_Core {}
class inflector extends inflector_Core {}
class num extends num_Core {}
class security extends security_Core {}
class text extends text_Core {}
class url extends url_Core {}
class valid extends valid_Core {}
class folder extends folder_Core {}

// My Libraries
class authentic extends Authentic_Core {}
class cart extends Cart_Core {}
class request extends request_Core {}
class api extends api_Core {}
class filemanager extends filemanager_Core {}