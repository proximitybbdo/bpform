<?php

// This default helper sets some interesting default values.
// ``base_path`` can be used to generate a url that points to the root of the site.
// ``lang`` will give your the language based on an optional language url (eg. /nl-BE/...)
function before_defaults() {
  set('base_path', BASE_PATH);
  set('base_path_dir', BASE_PATH_DIR);

  // Set lang if first controller is a language
  $url_parts = url_parts();
  
  if(preg_match(Multilang::getInstance()->langs_as_regexp(), $url_parts[0]))
    Multilang::getInstance()->setLang($url_parts[0]);

  set('lang', Multilang::getInstance()->getLang());
}

// Splits the url into parts.
function url_parts() {
  $parts = explode("/", request_uri());
  
  array_shift($parts); // remove first empty element (blame the explode)
  return $parts;
}

// Returns the name (based on the URL) of the part you request (based on the ``$id``).
function page($id = 0) {
  $parts = url_parts();

  // if first part is a lang (we match it with the lang array from MultiLang)
  if(count($parts) > 0 && preg_match(Multilang::getInstance()->langs_as_regexp(), $parts[0]))
    array_shift($parts);

  // if the given index is found in the url
  if(count($parts) > 0 && $id < count($parts))
    return $parts[$id];

  return '';
}

// Returns **active** when the ``$page_name`` argument combined with the given ``$id`` resembles the page.
function get_active($page_name, $id = 0) {
  if(page($id) == $page_name)
    return 'active';
  
  return '';
}
