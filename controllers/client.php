<?php

function client() {
  $requested_dir = "clients/" . params('client');

  if(is_dir($requested_dir)) { // Client exists
    $cp = new ClientRunner($requested_dir);
    $project_folders = $cp->run();

    set('project_folders', $project_folders);
    
    return html('client.html.php', 'layout.html.php');
  } else 
    header('Location: ' . BASE_PATH);
}

