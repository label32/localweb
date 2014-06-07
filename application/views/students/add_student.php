<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class="">Add a new student</h1>
    <div class="btns pull-right">
      <a href="../"><button class="btn btn-default">Back</button></a>
    </div>
  </div>
  <form class="form-horizontal" role="form">

  <div class="form-group">
    <label for="inputname" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputname" placeholder="Name">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Prof</label>
    <div class="col-sm-10">
     <select data-placeholder="Alege prof...." class="chosen-select form-control" multiple>
        <option value=""></option>

        <?php foreach ($profi as $prof) { 
          echo '<option value="p1">'.$prof.'</option>';
        } ?>
        
      </select>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>
</div>


