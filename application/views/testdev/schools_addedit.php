<script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/validator/jquery.numeric.js"></script>
<script>
	$(document).ready(function(){
		
		$('.maximum-students-allowed').numeric();
		$('.address').wysihtml5();
	});
</script>
<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
	
<form class="form-horizontal" role="form" accept-charset="utf-8" method="post" action="<?php echo $act; ?>">
	<input type="hidden" name="school_id" class="form-control" value="<?php echo $id; ?>">			  
<div class="panel panel-default">

	  <div class="panel-heading">
        <h4><span class="glyphicon glyphicon-th-large"></span> School Form</h4>
      </div>
      <div class="panel-body">

		  <div class="form-group">
			<label class="col-sm-2 control-label">School Name <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" value="<?php echo !empty($schools['name']) ? $schools['name'] : ''; ?>">
			  <?php echo form_error('name','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">School Address <span class="important">*</span></label>
			<div class="col-sm-10">
				<textarea class="form-control address" rows="3" name="address" ><?php echo !empty($schools['address']) ? $schools['address'] : ''; ?></textarea>
			   <?php echo form_error('address','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">Maximum Students Allowed <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="maximum_students_allowed" class="form-control maximum-students-allowed" value="<?php echo !empty($schools['maximum_students_allowed']) ? $schools['maximum_students_allowed'] : ''; ?>">
			  <?php echo form_error('maximum_students_allowed','<div class="alert alert-danger">', '</div>'); ?>
			</div>
		  </div>
		
		  <div class="form-group">
			<label class="col-sm-2 control-label">Courses Yearly Fee <span class="important">*</span></label>
			<div class="col-sm-10">
				<input type="text" name="courses_yearly_fee" class="form-control" value="<?php echo !empty($schools['courses_yearly_fee']) ? $schools['courses_yearly_fee'] : ''; ?>">
			  <?php echo form_error('courses_yearly_fee','<div class="alert alert-danger">', '</div>'); ?>
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