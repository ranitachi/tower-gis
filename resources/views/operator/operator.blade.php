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
                    <a data-toggle="tab" href="#home4">Data Operator</a>
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
// jQuery(function($){
  $(document).ready(function(){
    datavendor();
  });
  function datavendor()
    {
      $('#home4').load(APP_URL+'/operator_data',function(){
        var oTable1 = $('#dataoperator').dataTable({
          "ajax": APP_URL+'/json_operator/-1/1',
          "columns": [
                      { "data": "no" },
                      { "data": "logo" },
                      { "data": "nama_operator" },
                      { "data": "alamat" },
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

      $('#form').load(APP_URL+'/operator_form/-1');
    }

    function edit(id)
    {
      $('#form').load(APP_URL+'/operator_form/'+id);
      $('.nav-tabs a[href="#form"]').tab('show');
    }
    function hapus(id)
    {
      bootbox.confirm({
         message: "<h2>Yakin ingin Menghapus Data Operator Ini ?</h2>",
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
               url : APP_URL+'/operator_hapus/'+id,
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
