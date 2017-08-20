<?php $__env->startSection('content'); ?>
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo e(URL::to('/')); ?>">Home</a>
              </li>
              <li class="active">Site Tower</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
          </div>

          <div class="page-content">
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
            		<div class="row">
	                	<div class="col-sm-12">
							<div class="tabbable">
								<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
									<li class="active">
										<a data-toggle="tab" href="#home4">Data Site Tower</a>
									</li>
									<li>
										<a data-toggle="tab" href="#form">Form</a>
									</li>
									<li>
										<a data-toggle="tab" href="#import">Import Excel</a>
									</li>
								</ul>

								<div class="tab-content">
									<div id="home4" class="tab-pane in active"></div>
									<div id="form" class="tab-pane"></div>
									<div id="import" class="tab-pane"></div>
								</div>
							</div>
						</div>
					</div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<?php $__env->stopSection(); ?>

<style type="text/css">
  #vendor_chosen,#operator_chosen,#site_chosen
  {
    width:100% !important;
  }
</style>
<?php $__env->startSection('jqueryscript'); ?>
<script type="text/javascript">
// jQuery(function($){
	$(document).ready(function(){
		datasite();
		$('div#import').load(APP_URL+'/site-import',function(){

			var whitelist_mime = ["application/csv"];
			$('#id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
				});
		});
	});
	function edit(id)
    {
      $('#form').load(APP_URL+'/site_form/'+id);
      $('.nav-tabs a[href="#form"]').tab('show');
    }
    function datasite()
		{
			$('#home4').load(APP_URL+'/site_data',function(){
				var oTable1 = $('#datasite').dataTable({
					"ajax": APP_URL+'/json_site/-1/1',
					"columns": [
	                    { "data": "no" },
	                    { "data": "site_id" },
	                    { "data": "operator_name" },
	                    { "data": "vendor" },
	                    { "data": "alamat" },
	                    { "data": "koordinat" },
	                    { "data": "button" }
	                ],
					"iDisplayLength": 15
						
								//,
								//"sScrollY": "200px",
								//"bPaginate": false,
						
								//"sScrollX": "100%",
								//"sScrollXInner": "120%",
								//"bScrollCollapse": true,
								//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
								//you may want to wrap the table inside a "div.dataTables_borderWrap" element
						
				});		
			});

			$('#form').load(APP_URL+'/site_form/-1');
		}

	function hapus(id)
	{
		bootbox.confirm({
			message: "<h2>Yakin ingin Menghapus Data Site Ini ?</h2>",
			buttons: {
				confirm: {
					label: "OK",
					className: "btn-primary btn-sm",
				},
				cancel: {
					label: "Cancel",
					className: "btn-sm",
				}
			},
			callback: function(result) {
				var urll=APP_URL+'/site-hapus/'+id;
				$.ajax({
					url : urll,
					success : function(a){
						pesan(a);
						datasite();
						$('.nav-tabs a[href="#home4"]').tab('show');
					}
				})
			}
		});
	}
// });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>