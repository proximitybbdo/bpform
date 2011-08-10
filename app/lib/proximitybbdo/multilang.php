<?php
# ============================================================================ #
/**
 * Proximity Multilang lib
 * 
 * v0.01
 * @package proximitybbdo
 */
# ============================================================================ #

// Singleton
class Multilang
{
  private static $instance = null;

  private $lang = ''; 
  private $langs = array();
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
      self::$instance = new Multilang();

    return self::$instance;
  }

  // Parse the language files and set the default lang
  public function init() {
    if($this->inited == FALSE)
      $this->inited = TRUE;
    else
      return;
    
    // Set default lang
    $this->lang = key(ProximityApp::$settings['multilang']['languages']);

    // Parse languages
    foreach(ProximityApp::$settings['multilang']['languages'] as $lang => $file)
      $this->langs[$lang] = spyc_load_file(dirname(__FILE__) . '/../../../assets/data/' . $file . '.yaml');
  }

  // Destroy the language array and any other variables
  public function destroy() {
    /* unset($this->lang); */
    return TRUE;
  }

  // Change the default language multilang translates against
  // @param string $lang the new language
  public function setLang($lang) {
    $this->lang = $lang;
  }

  // Return the current language
  // @return string
  public function getLang() {
    return $this->lang;
  }

  // Main function of this class, gets the responding string for a given
  // key, in the current language. Change the language by using lang()
  //
  // @param string $key the key of the translated string
  //
  // @return string
  public function _t($key) {
    return $this->langs[$this->lang][$key];
  }

  // Support for the main function of this class, works similar to the
  // _t() function above, but with an additional language parameter
  //
  // @param string $key the key of the translated string
  // @param string $lang the language to retrieve the key for
  //
  // @return string
  public function _l($key, $lang) {
    return $this->langs[$lang][$key];
  }

  // Get all languages formatted for multi-select regular expression ``nl|fr|en|...``
  public function langs_as_regexp() {
    $lang_names = array();

    foreach ($this->langs as $key => $value) {
      array_push($lang_names, $key);
    }
    
    return "/" . implode('|', $lang_names) . "/";
  }

  // Get count of languages available
  //
  // @return int
  public function get_lang_count() {
    return count($this->langs);
  }
}

// Helper _t function defined outside of the multilang class
// for easy of use
function _t($key) {
  echo(Multilang::getInstance()->_t($key));
}

// Helper _l function, similar to the _t above, but you can
// pass a language
function _l($key, $lang) {
  echo(Multilang::getInstance()->_l($key, $lang));
}
