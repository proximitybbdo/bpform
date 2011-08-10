<?php

function client() {
  $requested_dir = "clients/" . params('client');

  if(is_dir($requested_dir)) { // Client exists
    $cp = new ClientProjects($requested_dir);
    $project_folders = $cp->run();

    set('project_folders', $project_folders);
    
    return html('client.html.php', 'layout.html.php');
  } else 
    echo "Client does not exists or you don't have the permission to view the clients project overview.";  
}

