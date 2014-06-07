<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class=""><?= $page_name ?></h1>
    <div class="btns pull-right">
      <a href="student/add"><button class="btn btn-primary">Add Student</button></a>
      <a href="http://bit.ly/1tTwDeL"><button class="btn btn-primary">Fuck Student</button></a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Nume</th>
          <th>Email</th>
          <th>Varsta</th>
        </tr>
      </thead>
      <tbody>

      <?php foreach ($studenti as $student) { ?>
        
        <tr>
          <td><?= $student['id'] ?></td>
          <td><?= $student['nume'] ?></td>
          <td><?= $student['email'] ?></td>
          <td><?= $student['varsta'] ?></td>
          <td><a href="student/edit/<?= $student['id'] ?>"><button class="btn btn-primary">Edit</button></a></td>
        </tr>

      <?php } ?>

        

      </tbody>
    </table>
  </div>
</div>
      