<?php

dispatch('/', 'index');

dispatch('/clicktag/:clicktag', 'clicktag');

dispatch('/:client', 'client');

dispatch('/:client/:project', 'project');
dispatch('/:client/:project/:banner', 'project');


// dispatch('/**', 'index_catchall');

// Function is called before every route is sent to his handler.
function before($route) {
  // Found in ``helpers.php``
  before_defaults();
}
