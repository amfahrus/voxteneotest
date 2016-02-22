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

		
		<div class="panel panel-default">
			  <div class="panel-heading">
                   <p><h4 class="head-text"><b>Schools </h4></p>
              </div>
			  <div class="panel-body">
				<table class="table table-striped table-bordered table-hover table-responsive" id="tbl_server" border="0" cellpadding="0" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th width="30%">Name</th>
							<th width="30%">Address</th>
							<th width="15%">Maximum Students Allowed</th>
							<th width="15%">Courses Yearly Fee</th>
							<th width="10%">Tools</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Maximum Students Allowed</th>
							<th>Courses Yearly Fee</th>
							<th>Tools</th>
						</tr>
					</tfoot>
				</table>
			  </div>
	      </div>
	      
		 
    </div>
        

</div><!-- /.container -->
