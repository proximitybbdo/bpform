<div id="projects">
  <div class="content">
    <h2>Client Name</h2>

    <p>This is an overview of all the projects that exists for this client.</p>

    <ul class="projects-list">
      <li><label>Project Name</label> <em>Last Modification Date</em></li>
      <? foreach($project_folders as $project) { ?>
      <li><a href="<? echo $project->folder_name; ?>"><? echo $project->folder_name; ?></a> <em><? echo $project->mod_date; ?></em></li>
      <? } ?>
    <ul>
  </div>
</div>
