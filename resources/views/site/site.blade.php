@extends('admin.layout.master')
@section('content')
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::to('admin')}}">Home</a>
              </li>
              <li class="active">Site Tower</li>
            </ul><!-- /.breadcrumb -->
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

@endsection

<style type="text/css">
  #vendor_chosen,#operator_chosen,#site_chosen
  {
    width:100% !important;
  }
</style>
@section('jqueryscript')
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYzgG72G3M3HVGRdzkvtvO5c4N7lmIuiY"></script>
<script type="text/javascript">
// jQuery(function($){
	$(document).ready(function(){
		datasite();
    $('#form').load(APP_URL+'/site_form/-1');
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
  function BrowseServer( startupPath, functionData )
	{
		var finder = new CKFinder();
		finder.basePath = "{{asset('ckfinder/')}}";
		finder.startupPath = startupPath;
		finder.selectActionFunction = SetFileField;
		finder.selectActionData = functionData;
		finder.removePlugins = 'basket';
		//finder.selectThumbnailActionFunction = ShowThumbnails;
		finder.popup();
	}

	function SetFileField( fileUrl, data )
	{
		document.getElementById( data["selectActionData"] ).value = fileUrl;
		var f=fileUrl.split('/');
		var x=f.length;
		var file = f[x-1];
		$('input#gambar').val(fileUrl);
    $('img#gambar_site').attr({'src':fileUrl});
	}
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
	                    { "data": "showmap" },
	                    { "data": "akurat" },
	                    { "data": "rekomendasi" },
	                    { "data": "pilih" },
	                    { "data": "button" }
	                ],
					"iDisplayLength": 15,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua Site"]]

								//,
								//"sScrollY": "200px",
								//"bPaginate": false,

								//"sScrollX": "100%",
								//"sScrollXInner": "120%",
								//"bScrollCollapse": true,
								//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
								//you may want to wrap the table inside a "div.dataTables_borderWrap" element

				});

        $('.multiselect').multiselect({
         enableFiltering: true,
         enableHTML: true,
         buttonClass: 'btn btn-white btn-primary',
         templates: {
          button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
          ul: '<ul class="multiselect-container dropdown-menu" style="width:300px !important;right:0px !important;left:unset !important;"></ul>',
          filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
          filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
          li: '<li><a tabindex="0"><label></label></a></li>',
              divider: '<li class="multiselect-item divider"></li>',
              liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
         }
        });
			});


		}
  function gantistatus(id,status,kolom)
  {
    $.ajax({
      url : APP_URL+'/site-akurat/'+id+'/'+status+'/'+kolom,
      success : function(a)
      {
        pesan(a);
      }
    });
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
        if(result)
        {

  				var urll=APP_URL+'/site-hapus/'+id;
  				$.ajax({
  					url : urll,
  					success : function(a){
  						pesan(a);
  						datasite();
              $('#form').load(APP_URL+'/site_form/-1');
  						$('.nav-tabs a[href="#home4"]').tab('show');
  					}
          })
        }
			}
		});
	}

  function showmap(lat,lng)
  {
    if(lat=='')
    {
      $('div#body-alert').html('<h2>Koordinat Masih Kosong</h2>');
      $('div#modal-alert').modal('show');
    }
    else
    {
      $('#body-info').load(APP_URL+'/showmap/'+lat+'/'+lng,function(){
        allsite();
      });
      $('#modal-info').modal('show');
    }
  }
  function showstreet(lat,lng)
  {
    if(lat=='')
    {
      $('div#body-alert').html('<h2>Koordinat Masih Kosong</h2>');
      $('div#modal-alert').modal('show');
    }
    else
    {
      $('#body-info').load(APP_URL+'/showmap/'+lat+'/'+lng,function(){
        allsitestreet();
      });
      $('#modal-info').modal('show');
    }
  }
// });
</script>
@endsection
