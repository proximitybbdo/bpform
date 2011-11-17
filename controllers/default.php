<?php

function index() {
  return html('index.html.php', 'layout.html.php');
}

function index_catchall() {
  return html('index.html.php', 'layout.html.php');
}

function clicktag() {
  set('clicktag', params('clicktag'));
  return html('clicktag.html.php', 'layout.html.php');
}

?>
