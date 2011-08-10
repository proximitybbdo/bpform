<?php
// =========================================================================== #
// 
// Session wrapper
// 
// v0.01
// @package proximitybbdo
//
// Session::getInstance()->init();
// Session::getInstance()->destroy();
//
// Session::getInstance()->name([$name]);
// Session::getInstance()->id();
// Session::getInstance()->set($key, $value);
// Session::getInstance()->get($key);
// Session::getInstance()->exists($key);
// 
// =========================================================================== #

class Session
{
  private static $instance = null;

  private $inited = false;

  private function __construct() {
    $this->lang = '';
  }

  public function __clone() {
    trigger_error( "Cannot clone instance of Singleton pattern ...", E_USER_ERROR );
  }
  public function __wakeup() {
    trigger_error('Cannot deserialize instance of Singleton pattern ...', E_USER_ERROR );
  }

  public static function getInstance() {
    if( self::$instance == null )
      self::$instance = new Session();

    return self::$instance;
  }

  public function init() {
    if($this->inited == FALSE)
      $this->inited = TRUE;
    else
      return;
    
    // Give default name
    session_name('proximitybbdo');
  }

  // Destroy the session object
  public function destroy() {
    session_unset();
    session_destroy();

    return TRUE;
  }

  public function name($name = '') {
    if(strlen($name) == 0)
      return session_name();
    else
      return session_name($name);
  }

  public function id() {
    return session_id();
  }

  public function set($key, $var) {
    $_SESSION[$key] = $var;
  }

  public function get($key) {
    return $_SESSION[$key];
  }

  public function exists($key) {
    return isset($_SESSION[$key]);
  }
}
