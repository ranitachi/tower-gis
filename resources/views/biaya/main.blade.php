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
                <a href="#">Home</a>
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
        										<a data-toggle="tab" href="#home4">Tabel Retribusi Menara</a>
        									</li>
        									<li>
        										<a data-toggle="tab" href="#form">Form</a>
        									</li>
                          <li  class="pull-right">
        										<a data-toggle="tab" href="#formnilai">Form Nilai Retribusi</a>
        									</li>
                          <li class="pull-right">
        										<a data-toggle="tab" href="#nilai">Tabel Nilai Retirbusi</a>
        									</li>
        								</ul>

        								<div class="tab-content">
        									<div id="home4" class="tab-pane in active"></div>
        									<div id="form" class="tab-pane"></div>
        									<div id="nilai" class="tab-pane in"></div>
        									<div id="formnilai" class="tab-pane"></div>
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
// jQuery(function($){
	$(document).ready(function(){
		datavendor();
	});
	 function datavendor()
		{
			$('#home4').load(APP_URL+'/biayadata');
      $('#nilai').load(APP_URL+'/nilaidata');
			$('#form').load(APP_URL+'/biayaform/-1');
			$('#formnilai').load(APP_URL+'/nilaiform/-1');
		}

		function edit(id)
		{
			$('#form').load(APP_URL+'/biayaform/'+id);
			$('.nav-tabs a[href="#form"]').tab('show');
		}
		function editnilai(id)
		{
			$('#formnilai').load(APP_URL+'/nilaiform/'+id);
			$('.nav-tabs a[href="#formnilai"]').tab('show');
		}
    function distribusibiaya()
    {
      var i=$('#indeks').val();
      var b=$('#biaya').val();
      var indeks=parseFloat(i.replace(/[,.]/g,'.'));
      var biaya=parseFloat(b.replace(/[,.]/g,''));
      var dist=indeks * biaya;
      // alert(indeks+'--'+biaya);
      $('#distribusi_biaya').val(dist);
    }
    function hapus(id)
    {
      bootbox.confirm({
         message: "<h2>Yakin ingin Menghapus Data Biaya Retribusi Ini ?</h2>",
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

             $.ajax({
               url : APP_URL+'/biaya_hapus/'+id,
               success : function(a){
                 bootbox.alert({
                   message : '<h3>'+a+'</h3>',
                   callback:function(){
                     datavendor();
                     $('.nav-tabs a[href="#home4"]').tab('show');
                   }
                 })
             }
           })
         }
       }
      });
    }
// });
</script>
@endsection
