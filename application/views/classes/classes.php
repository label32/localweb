<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class="">Classes</h1>
    <div class="btns pull-right">
      <a href="class/add"><button class="btn btn-primary">Add New</button></a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#Id</th>
          <th>Name</th>
          <th>Class professor</th>
          <th>Time</th>
          <th>Days</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($classes as $class) { ?>

        <tr>
          <td><?= $class['class']->Id ?></td>
          <td><?= $class['class']->Name ?></td>
          <td><?= $class['prof']->Name ?></td>
          <td><?= $class['class']->StartTime ?> - <?= $class['class']->EndTime ?></td>
          <td><?= $class['days'] ?></td>
          <td>
            <a href="class/edit/<?= $class['class']->Id ?>">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></button>
            </a>
            <a href="class/delete/<?= $class['class']->Id ?>" onclick="return confirm('Are you sure you want to delete <?= $class['class']->Name ?>?')">
              <button class="btn btn-danger"><i class=" glyphicon glyphicon-remove"></i></button>
            </a>
          </td>
        </tr>

      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
      