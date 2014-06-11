<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class="">Professors</h1>
    <div class="btns pull-right">
      <a href="add/professor"><button class="btn btn-primary">Add New</button></a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($profs as $prof) { ?>

        <tr>
          <td><?= $prof->Id ?></td>
          <td><?= $prof->Name ?></td>
          <td><?= $prof->Email ?></td>
          <td>
            <a href="prof/edit/<?= $prof->Id ?>">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></button>
            </a>
            <a href="prof/delete/<?= $prof->Id ?>" onclick="return confirm('Are you sure you want to delete <?= $prof->Name ?>?')">
              <button class="btn btn-danger"><i class=" glyphicon glyphicon-remove"></i></button>
            </a>
          </td>
        </tr>

      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
      