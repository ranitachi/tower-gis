@extends('front.layout.master')
@section('content')
<div class="main-content">
        <div class="main-content-inner">
          <div class="page-content" style="padding: 0px !important;">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-align-justify bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box" style="min-height:450px;">
                <div class="pull-left width-100">
                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Vendor/Perusahaan</label>
                      <div class="col-sm-12">
                        <div class="">
                          <select name="vendor" id="vendor" onchange="setpetavendor(this.value)">
                          <option value="">-Pilih Vendor-</option>
                          @foreach($vendor as $k => $v)
                            <option value="{{$v->id}}__{{$v->nama_vendor}}">{{$v->nama_vendor}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Operator</label>
                      <div class="col-sm-12">
                        <div class="" id="opr">
                          <select name="operator" id="operator" onchange="setsite(this.value)">
                             <option value="">-Pilih Operator-</option>
                              @foreach($operator as $k => $v)
                                <option value="{{$v->id}}__{{$v->nama_operator}}">{{$v->nama_operator}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="ace-settings-item">
                    <!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" /> -->
                     <div class="row">
                      <label class="lbl col-xs-12" for="ace-settings-navbar">Site</label>
                      <div class="col-sm-12">
                        <div class="" id="tower">
                          <select name="site" id="site" onchange="setpeta(this.value)">
                             <option value="">-Pilih Site-</option>
                              @foreach($site as $k => $v)
                                <option value="{{$v->id}}__{{$v->site_id}}__{{$v->operator_name}}__{{$v->lat_koord}}__{{$v->long_koord}}">{{$v->site_id}}-{{$v->operator_name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                </div><!-- /.pull-left -->


              </div><!-- /.ace-settings-box -->
            </div>



            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div id="map_wrapper">

                  <div id="map_canvas" class="mapping"></div>
                  <div id="legend" class=""></div>
                  <div id="coords" class=""></div>
              </div>


                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
@endsection

<style type="text/css">
  .ace-settings-box .ace-settings-item {
    max-height: 50px !important;margin-bottom: 35px !important;
  }
  #vendor_chosen,#operator_chosen,#site_chosen
  {
    width:100% !important;
  }
  #coords
  {
    background-color: black;
    color: white;
    float:left;
    font-size: 10px;
    font-family: verdana;
    /*font-style: italic;*/
    padding: 5px;
    height:25px;
    position:fixed;
    bottom:55;
    width: 200px;
    text-align: left;
  }
  #legend
  {
    background-color: black;
    opacity:0.8;
    color: white;
    float:left;
    font-size: 10px;
    font-family: verdana;
    /*font-style: italic;*/
    padding: 5px;
    height:180px;
    position:fixed;
    /*margin-top:-25;*/
    bottom:80px;
    width: 200px;
    text-align: left;
  }
</style>
