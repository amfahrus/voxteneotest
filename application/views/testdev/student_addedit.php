<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
	
<form class="form-horizontal" role="form" accept-charset="utf-8" method="post" action="<?php echo $act; ?>">
	<input type="hidden" name="student_id" class="form-control" value="<?php echo $id; ?>">			  
<div class="panel panel-default">

	  <div class="panel-heading">
        <h4><span class="glyphicon glyphicon-th-large"></span> Student Form</h4>
      </div>
      <div class="panel-body">

		  <div class="form-group">
			<label class="col-sm-2 control-label">First Name <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="first_name" class="form-control" value="<?php echo !empty($student['first_name']) ? $student['first_name'] : ''; ?>">
			  <?php echo form_error('first_name','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">Last Name <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="last_name" class="form-control" value="<?php echo !empty($student['last_name']) ? $student['last_name'] : ''; ?>">
			  <?php echo form_error('last_name','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">Birth Date <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="birthdate" class="form-control datepicker" value="<?php echo !empty($student['birthdate']) ? $student['birthdate'] : ''; ?>">
			  <?php echo form_error('birthdate','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">Picture <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="file" name="picture">
			</div>
		  </div>
		  
      </div>
</div>
 
<div class="panel panel-default">
      <div class="panel-body">
		  
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <input type="submit" class="btn btn-danger" value="Submit">
			  <a href="<?php echo base_url().'schools'; ?>" class="btn btn-warning">Cancel</a>
			</div>
		  </div>
		  
      </div>
</div>
	</form>
  

	</div>
</div><!-- /.container -->