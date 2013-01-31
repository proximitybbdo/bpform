<div id="projects">
  <div class="content">
    <h2><?php echo(ucfirst($client)); ?></h2>

    <p>This is an overview of all the projects that exists for <strong><?php echo($client); ?></strong>.</p>

    <table class="projects-list common-table zebra-striped">
      <tr>
        <td>Project name</td>
        <td>Last modification date</td>
      </tr>
    <?php foreach($project_folders as $project) { ?>
      <tr>
        <td><a href="<?php echo($base_path_dir); ?><?php echo $project->folder_name; ?>"><?php echo $project->folder_name; ?></a></td>
        <td><em><?php echo $project->mod_date; ?></em></td>
      </tr>
    <?php } ?>
    </table>
  </div>
</div>
