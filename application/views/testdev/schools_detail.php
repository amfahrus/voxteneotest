<style type="text/css">
            @import "<?php echo base_url(); ?>assets/frontend/twbs/plugins/datatables/dataTables.bootstrap.css";
         
    #container {
        padding-top: 60px !important;
        width: 960px !important;
    }
    #dt_example .big {
        font-size: 1.3em;
        line-height: 1.45em;
        color: #111;
        margin-left: -10px;
        margin-right: -10px;
        font-weight: normal;
    }
    #dt_example {
        font: 95%/1.45em "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
        color: #111;
    }
    div.dataTables_wrapper, table {
        font: 13px/1.45em "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;
    }
    #dt_example h1 {
        font-size: 16px !important;
        color: #111;
    }
    #footer {
        line-height: 1.45em;
    }
    div.examples {
        padding-top: 1em !important;
    }
    div.examples ul {
        padding-top: 1em !important;
        padding-left: 1em !important;
        color: #111;
    }
</style>
<script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/datatables/media/js/jquery.dataTables.js" charset="utf-8" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>assets/frontend/twbs/plugins/datatables/dataTables.bootstrap.js" charset="utf-8" type="text/javascript" ></script>
<script>
$(document).ready(function() {
 
     initDataTables('<?php echo $listener;?>');
     
} );
function initDataTables(source){
   	$('#tbl_server').dataTable
			({
			  "sDom": "<'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
			  "oLanguage": {
							"sProcessing": "Processing..."
							},
			  'bProcessing'    : true,
			  'bServerSide'    : true,
			  'sAjaxSource'    : source,
			  "bStateSave": false,
			  "bAutoWidth": false,
			  "bRetrieve": true, 
			  "bDestroy": true, 
			  'fnServerData': function(sSource, aoData, fnCallback)
			  {
			  //alert(aaData);
				$.ajax
				({
				  'dataType': 'json',
				  'type'    : 'POST',
				  'url'     : sSource,
				  'data'    : aoData,
				  'success' : fnCallback
				});
			  }
			});
}
</script>

<div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
		  
		
            
        <div class="col-md-12">
		  
		  <?php if(count($schools)){
		  ?>
		  <div class="panel panel-default">
			  <div class="panel-heading">
                   <p><h4 class="head-text"><b><?php echo $schools['name']; ?></b><span class="pull-right"><a class="btn btn-primary" href="<?php echo base_url().'school/edit/0'; ?>"><span class="glyphicon glyphicon-plus"></span> Add</a><a class="btn btn-primary" href="<?php echo base_url().'school/edit/'.$schools['school_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a></span></h4></p>
              </div>
			  <div class="panel-body">
		  <table class="table table-hover">
		  <tbody>
		  <tr>
			<td><b>School Name</b></td>
			<td><?php echo $schools['name']; ?></td>
		  </tr>
		  <tr>
			<td><b>School Address</b></td>
			<td><?php echo $schools['address']; ?></td>
		  </tr>
		  <tr>
			<td><b>Maximum Students Allowed</b></td>
			<td><?php echo $schools['maximum_students_allowed']; ?></td>
		  </tr>
		  <tr>
			<td><b>Courses Yearly Fee</b></td>
			<td><?php echo $schools['courses_yearly_fee']; ?></td>
		  </tr>
		  <?php } ?>	
		  </tbody>
		  </table>
		  </div>
		  </div>
		  
		<div class="panel panel-default">
			  <div class="panel-heading">
                   <p><h4 class="head-text"><b>Students </h4></p>
              </div>
			  <div class="panel-body">
				<table class="table table-striped table-bordered table-hover table-responsive" id="tbl_server" border="0" cellpadding="0" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="30%">First Name</th>
							<th width="30%">Last Name</th>
							<th width="30%">Birth Date</th>
							<th width="10%">Tools</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Birth Date</th>
							<th>Tools</th>
						</tr>
					</tfoot>
				</table>
			  </div>
	      </div>

        </div>

        </div>
       
    </div>
        

</div><!-- /.container -->
