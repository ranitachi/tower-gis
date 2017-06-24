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

    <script>
      window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 5000);

      window.setTimeout(function() {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 5000);

      window.setTimeout(function() {
        $(".alert-info").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 5000);
    </script>

    <div class="page-content">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
						<h1>
							IMB
							<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								Data IMB Kadaluarsa
							</small>
						</h1>
					</div>

          @if (Session::has('success'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-block alert-success">
                  <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                  </button>
                  <p>
                    <strong style="font-size:20px;">
                      <i class="ace-icon fa fa-check"></i>
                      Berhasil..
                    </strong>
                    <br>
                    {{ Session::get('success') }}
                  </p>
                </div>
              </div>
            </div>
          @endif
        </div><!-- /.col -->
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
          </div>
          <div class="table-header">
            Seluruh site tower yang memiliki IMB kadaluarsa.
          </div>
          <div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Site ID</th>
                  <th>Vendor</th>
                  <th>Alamat</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($data as $key)
                  @if (!is_null($key->days) && $key->days>1095)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$key->site_id}}</td>
                      <td>{{$key->nama_vendor}}</td>
                      <td>{{$key->alamat}}</td>
                      @php
                        $expdate = new \Carbon\Carbon($key->tanggal);
                        $expdate->addYears(3);
                        $expl = explode(" ", $expdate);
                        $date = explode("-", $expl[0]);
                      @endphp
                      <td>{{$date[2]}}-{{$date[1]}}-{{$date[0]}}</td>
                      @php
                        $now = \Carbon\Carbon::now();
                        $days = $now->diffInDays($expdate);
                        $status = null;
                        if ($days>365) {
                          $status = "telah kadaluarsa lebih dari ".$now->diffInYears($expdate)." tahun";
                        } else if ($days>31) {
                          $status = "telah kadaluarsa lebih dari ".$now->diffInMonths($expdate)." bulan";
                        } else {
                          $status = "telah kadaluarsa dalam $days hari";
                        }
                      @endphp
                      <td><span class="label label-danger arrowed-right arrowed-in">{{$status}}</span></td>
                      <td>
                        <div class="hidden-sm hidden-xs btn-group">
                          <button class="btn btn-xs btn-info edit" data-value="{{$key->id}}">
                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    @php
                      $no++;
                    @endphp
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

@endsection

@section('jqueryscript')
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $(function(){
      $('#dynamic-table').dataTable();
    });
  </script>
@endsection
