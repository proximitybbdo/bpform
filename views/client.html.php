<div id="projects">
  <div class="content">
    <h2>Client Name</h2>

    <p>This is an overview of all the projects that exists for this client.</p>

    <ul class="projects-list">
      <li><label>Project Name</label> <em>Last Modification Date</em></li>
      <?php foreach($project_folders as $project) { ?>
      <li><a href="<?php echo($base_path_dir); ?><?php echo $project->folder_name; ?>"><?php echo $project->folder_name; ?></a> <em><?php echo $project->mod_date; ?></em></li>
      <?php } ?>
    <ul>
  </div>
</div>
