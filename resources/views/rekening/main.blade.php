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
              <li class="active">Dashboard</li>
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
										<a data-toggle="tab" href="#home4">Data Rekening</a>
									</li>
									<li>
										<a data-toggle="tab" href="#form">Form</a>
									</li>
								</ul>

								<div class="tab-content">
									<div id="home4" class="tab-pane in active"></div>
									<div id="form" class="tab-pane"></div>
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

@section('jqueryscript')

<script type="text/javascript">
  	$(document).ready(function(){
  		datasite();
      formm(-1);
    });
  	function edit(id)
    {
      formm(id);
      $('.nav-tabs a[href="#form"]').tab('show');
    }

    function datasite()
  	{
  		$('#home4').load(APP_URL+'/rekening-data');
  	}

    function formm(id)
    {
      $('#form').load(APP_URL+'/rekening-form/'+id);
    }

  	function hapus(id)
  	{
  		bootbox.confirm({
  			message: "<h2>Yakin ingin Menghapus Data Ini ?</h2>",
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

    				var urll=APP_URL+'/rekening-hapus/'+id;
    				$.ajax({
    					url : urll,
    					success : function(a){
    						pesan(a);
    						datasite();
                formm(-1);
    						$('.nav-tabs a[href="#home4"]').tab('show');
    					}
            })
          }
  			}
  		});
  	}
  </script>
@endsection
