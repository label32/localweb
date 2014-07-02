<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="page-header">
    
    <h1 class="">Add a new class</h1>
    <div class="btns pull-right">
      <a href="../"><button class="btn btn-default">Back</button></a>
    </div>
  </div>
  <form class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputClassroom" class="col-sm-2 control-label">Classroom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputClassroom" placeholder="Classroom" name="classroom">
    </div>
  </div>

  <div class="form-group">
    <label for="inputClassroom" class="col-sm-2 control-label">Days</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" id="inputClassroom" placeholder="Classroom" name="classroom"> -->
      <label class="checkbox-inline">
        <input type="checkbox" id="daysCheckbox1" name="days[]" value="1"> Monday
      </label>
      <label class="checkbox-inline">
        <input type="checkbox" id="daysCheckbox2" name="days[]" value="2"> Tuesday
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox" id="daysCheckbox3" name="days[]" value="3"> Wednesday
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox" id="daysCheckbox4" name="days[]" value="4"> Thursday
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox" id="daysCheckbox5" name="days[]" value="5"> Friday
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox" id="daysCheckbox6" name="days[]" value="6"> Saturday
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox" id="daysCheckbox7" name="days[]" value="7"> Sunday
      </label>
    </div>
  </div>

  <!-- Time picker... -->

  <div class="form-group">
    <label for="inputClassroom" class="col-sm-2 control-label">Start time</label>
    <div class="col-sm-10">
      <div class="input-append bootstrap-timepicker">
      <input id="timepicker1" type="text" class="input-small form-control" name="start_time">
      <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>
    </div>
    </div>
  </div>

  <div class="form-group">
    <label for="inputClassroom" class="col-sm-2 control-label">End time</label>
    <div class="col-sm-10">
      <div class="input-append bootstrap-timepicker">
      <input id="timepicker2" type="text" class="input-small form-control" name="end_time">
      <span class="add-on"><i class="glyphicon glyphicon-time"></i></span>
    </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputColor" class="col-sm-2 control-label">Color</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputColor" placeholder="Color" name="color">
	  <div id="colorBox" ></div>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Professor</label>
    <div class="col-sm-10">
     <select data-placeholder="Assign a professor..." class="chosen-select form-control" name="prof">
        <option value=""></option>

        <?php foreach ($profs as $prof) { 
          echo '<option value="'.$prof->Id.'">'.$prof->Name.'</option>';
        } ?>
        
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Students</label>
    <div class="col-sm-10">
     <select data-placeholder="Add students..." class="chosen-select form-control" multiple name="students[]">
        <option value=""></option>

        <?php foreach ($students as $student) { 
          echo '<option value="'.$student->Id.'">'.$student->Name.'</option>';
        } ?>
        
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="textareaDetails" class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
      <textarea rows="12" class="form-control" id="textareaDetails" placeholder="Details" name="details"></textarea>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
</div>