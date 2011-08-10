<?php

dispatch('/', 'index');

dispatch('/client', 'index');
dispatch('/client/:client', 'client');

dispatch('/client/:client/:project', 'project');
dispatch('/client/:client/:project/:banner', 'project');
// dispatch('/client/:client/:project/:banner/:lang', 'project');

dispatch('/**', 'index_catchall');

// Function is called before every route is sent to his handler.
function before($route) {
  // Found in ``helpers.php``
  before_defaults();
  
   
}
