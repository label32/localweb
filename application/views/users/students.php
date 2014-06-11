<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class=""><?= $page_name ?></h1>
    <div class="btns pull-right">
      <a href="/add/student"><button class="btn btn-primary">Add New</button></a>
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

      <?php foreach ($students as $student) { ?>

        <tr>
          <td><?= $student->Id ?></td>
          <td><?= $student->Name ?></td>
          <td><?= $student->Email ?></td>
          <td>
            <a href="students/edit/<?= $student->Id ?>">
              <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></button>
            </a>
            <a href="students/delete/<?= $student->Id ?>" onclick="return confirm('Are you sure you want to delete <?= $student->Name ?>?')">
              <button class="btn btn-danger"><i class=" glyphicon glyphicon-remove"></i></button>
            </a>
          </td>
        </tr>

      <?php } ?>

      </tbody>
    </table>
  </div>
</div>
      