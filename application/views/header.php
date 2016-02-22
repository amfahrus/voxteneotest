<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vox Teneo Asia - CodeIgniter Developer Test">
	<meta name="keywords" content="CodeIgniter"> 
    <meta name="author" content="Asep Muhammad Fahrus">
    <meta content="7" name="revisit-after"/>
    <meta content="en" name="language"/>
    <meta content="id" name="geo.country"/>
    <meta content="Indonesia" name="geo.placename"/>
    <meta content="all-language" http-equiv="Content-Language"/>
    <meta content="global" name="Distribution"/>
    <meta content="global" name="target"/>
    <meta content="Indonesia" name="geo.country"/>
    <meta content="all" name="robots"/>
    <meta content="all" name="googlebot"/>
    <meta content="all" name="msnbot"/>
    <meta content="all" name="Googlebot-Image"/>
    <meta content="all" name="Slurp"/>
    <meta content="all" name="ZyBorg"/>
    <meta content="all" name="Scooter"/>
    <meta content="all" name="spiders"/>
    <meta name="webcrawlers" content="all" />
    <meta content="true" name="MSSmartTagsPreventParsing"/>
    <meta content="general" name="rating"/>

    <title>
		Vox Teneo Asia - CodeIgniter Developer Test
    </title>

    <link href="<?php echo base_url(); ?>assets/frontend/css/animate.css" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/frontend/twbs/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/twbs/css/base.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/twbs/plugins/datepicker/css/datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/twbs/plugins/wysihtml5/src/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/twbs/plugins/bootstrapselect/bootstrap-select.min.css" />
    
	<!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/frontend/twbs/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/twbs/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/wysihtml5/src/bootstrap3-wysihtml5.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/bootstrapselect/bootstrap-select.js"></script>
    <script>
	$(document).ready(function(){
		var root = '<?php echo base_url(); ?>';
		$('#myModal').on('hidden.bs.modal', function() {
			$(this).removeData('bs.modal');
		});
		
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true
		});
	});
	</script>
	
  </head>
  <body>

    <div class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-asterisk"></span> <?php echo $this->config->item("web_title");?></a>
        </div>
        <div class="collapse navbar-collapse">
		  
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->