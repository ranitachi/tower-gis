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
							Manage User
							<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								Kelola Data Akun Login
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
          @endif

            <div class="col-xs-12 col-sm-4">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Form Input User</h4>
									<div class="widget-toolbar">
										<a href="#" data-action="collapse">
											<i class="ace-icon fa fa-chevron-up"></i>
										</a>
										<a href="#" data-action="close">
											<i class="ace-icon fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="widget-body" style="overflow:hidden;">
									<div class="widget-main">
                    <form action="{{route('user.store')}}" method="post" id="form">
                      {{csrf_field()}}
  										<div>
  											<label for="form-field-8">Nama</label>
  											<input type="text" name="name" value="" class="form-control" required id="name">
  										</div>
                      <br>
  										<div>
  											<label for="form-field-8">Email</label>
  											<input type="text" name="email" value="" class="form-control" required id="email">
  										</div>
                      <br>
                      <div class="check-password">
                        <label for="form-field-8">Ganti Password</label>&nbsp;&nbsp;
                        <input type="checkbox" name="check[]" value="ganti" id="check">
                      </div>
                      <hr class="hr-password">
                      <div class="password-field">
                        <div>
                          <label for="form-field-8">Password</label>
                          <input type="password" name="password" value="" class="form-control pass-control" required>
                          <span class="help-block password" style="color:#f89406;">Silahkan input ulang data password.</span>
                        </div>
                        <br>
                        <div>
                          <label for="form-field-8">Konfirmasi Password</label>
                          <input type="password" name="kpassword" value="" class="form-control pass-control" required>
                          <span class="help-block password" style="color:#f89406;">Silahkan input ulang data konfirmasi password.</span>
                        </div>
                      </div>
  										<hr>
                      <div class="form-action pull-right" style="margin-bottom:15px;">
                        <input type="button" class="btn btn-danger batal" value="Batal" id="btn-batal">
                        <input type="submit" class="btn btn-primary send" value="Simpan">
                      </div>
                    </form>
									</div>
								</div>
							</div>
						</div>
            <div class="col-xs-12 col-sm-8">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data User</h4>
									<div class="widget-toolbar">
										<a href="#" data-action="collapse">
											<i class="ace-icon fa fa-chevron-up"></i>
										</a>
										<a href="#" data-action="close">
											<i class="ace-icon fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="widget-body" style="overflow:hidden;">
                  <div class="table-header">
										Berikut adalah seluruh data users yang telah terdaftar dalam database.
									</div>
                  <table id="simple-table" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													#
												</th>
												<th>Nama</th>
												<th>Email</th>
												<th>Tanggal Terdaftar</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>

										<tbody>
                      @php
                        if (isset($_GET['page'])) {
                          $no = $_GET['page'] * 10 - 9;
                        } else {
                          $no=1;
                        }
                      @endphp
                      @foreach ($datauser as $key)
                        <tr>
                          <td class="center">{{$no}}</td>
                          <td>{{$key->name}}</td>
                          <td>{{$key->email}}</td>
                          @php
                            $date = explode(" ", $key->created_at);
                            $tanggal = explode("-", $date[0]);
                          @endphp
                          <td>{{$tanggal[2]}}-{{$tanggal[1]}}-{{$tanggal[0]}}</td>
                          <td>
                            @if ($key->flag_status==1)
                              <span class="label label-sm label-success">Aktif</span>
                            @else
                              <span class="label label-sm label-danger">Tidak Aktif</span>
                            @endif
                          </td>
                          <td>
                            <div class="hidden-sm hidden-xs btn-group">
                              <button class="btn btn-xs btn-info edit" data-value="{{$key->id}}">
                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                              </button>
                              <button class="btn btn-xs btn-danger bootbox-confirm" data-value="{{$key->id}}">
                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                              </button>
                              <button class="btn btn-xs btn-warning bootbox-changeflag" data-value="{{$key->id}}">
                                <i class="ace-icon fa fa-flag bigger-120"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        @php
                          $no++;
                        @endphp
                      @endforeach
										</tbody>
									</table>
                  <div class="pull-right">
                    {{ $datauser->links() }}
                  </div>
								</div>
							</div>
						</div>
          </div>
        </div><!-- /.col -->
      </div>
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

@endsection

@section('jqueryscript')
  <script type="text/javascript">
    $(function(){
      $('.password').hide();
      $('.check-password').hide();
      $('#btn-batal').hide();
      $('.hr-password').hide();

      $('#check').click(function(){
        if (this.checked) {
          $('.password-field').show();
          $('.hr-password').show();
          $('.pass-control').attr('required', true);
        } else {
          $('.password-field').hide();
          $('.hr-password').hide();
          $('.pass-control').removeAttr('required');
        }
      });

      $('.edit').click(function(){
        var id = $(this).data("value");
        $('#form').attr('action', "{{url('/')}}/user/update/"+id)
        $('.password-field').hide();
        $('.check-password').show();
        $.ajax({
          url: "{{url('/')}}/user/bind/"+id,
          success: function(data){
            var name = data.name;
            var email = data.email;
            var password = data.password;

            $('#name').attr('value', name);
            $('#email').attr('value', email);
            $('.password').show();
            $('.send').attr('class', 'btn btn-warning send');
            $('.send').attr('value', 'Simpan Perubahan');
            $('.pass-control').removeAttr('required');
            $('#btn-batal').show();
          }
        });
      });

      $('#btn-batal').click(function(){
        $('#form').attr('action', "{{url('/')}}/user")
        $('#name').attr('value', "");
        $('#email').attr('value', "");
        $('.check-password').hide();
        $('.password').hide();
        $('.send').attr('class', 'btn btn-primary send');
        $('.send').attr('value', 'Simpan');
        $('.hr-password').hide();
        $('.password-field').show();
        $(this).hide();
      });

      $(".bootbox-confirm").on("click", function() {
        var id = $(this).data("value");
        bootbox.confirm("<h4>Apakah anda yakin untuk menghapus akun ini?</h4>", function(result) {
          if(result) {
            window.location.replace("{{url('/')}}/user/destroy/"+id);
          }
        });
      });

      $(".bootbox-changeflag").on("click", function() {
        var id = $(this).data("value");
        bootbox.confirm("<h4>Apakah anda yakin untuk mengubah status akun ini?</h4>", function(result) {
          if(result) {
            window.location.replace("{{url('/')}}/user/status/"+id);
          }
        });
      });
    });
  </script>
@endsection
