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
							Dashboard
							<small>
								<i class="ace-icon fa fa-angle-double-right"></i>
								Administrator
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
        <div class="col-sm-12 infobox-container">
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-map-marker"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">{{count($site)}}</span>
							<div class="infobox-content">Site Tower</div>
						</div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-building"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">{{count($vendor)}}</span>
							<div class="infobox-content">Vendor</div>
						</div>
					</div>

					<div class="infobox infobox-pink">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-user"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">{{$operator}}</span>
							<div class="infobox-content">Operator</div>
						</div>
					</div>

					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-file-text"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">{{count($imbexp)}}</span>
							<div class="infobox-content">IMB Kadaluarsa</div>
						</div>
					</div>

					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-users"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">{{$user}}</span>
							<div class="infobox-content">Akun Pengguna</div>
						</div>
					</div>
				</div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <div class="widget-box transparent">
  					<div class="widget-header widget-header-flat">
  						<h4 class="widget-title lighter">
  							<i class="ace-icon fa fa-map-marker green"></i>
  							Presentase Jumlah Site Tower Per Vendor
  						</h4>
  						<div class="widget-toolbar">
  							<a href="#" data-action="collapse">
  								<i class="ace-icon fa fa-chevron-up"></i>
  							</a>
  						</div>
  					</div>
  					<div class="widget-body">
  						<div class="widget-main no-padding">
                <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
  						</div><!-- /.widget-main -->
  					</div><!-- /.widget-body -->
  				</div><!-- /.widget-box -->
        </div>

        <div class="col-sm-6">
  				<div class="widget-box transparent">
  					<div class="widget-header widget-header-flat">
  						<h4 class="widget-title lighter">
  							<i class="ace-icon fa fa-file-text red"></i>
  							IMB Site Tower Kadaluarsa
  						</h4>
  						<div class="widget-toolbar">
  							<a href="#" data-action="collapse">
  								<i class="ace-icon fa fa-chevron-up"></i>
  							</a>
  						</div>
  					</div>
  					<div class="widget-body">
  						<div class="widget-main no-padding">
  							<table class="table table-bordered table-striped">
  								<thead class="thin-border-bottom">
  									<tr>
  										<th>
  											<i class="ace-icon fa fa-caret-right blue"></i>Site Tower
  										</th>
  										<th>
  											<i class="ace-icon fa fa-caret-right blue"></i>Vendor
  										</th>
  										<th class="hidden-480">
  											<i class="ace-icon fa fa-caret-right blue"></i>Tanggal Kadaluarsa
  										</th>
  										<th class="hidden-480">
  											<i class="ace-icon fa fa-caret-right blue"></i>Keterangan
  										</th>
  									</tr>
  								</thead>
  								<tbody>
                    @php
                      $limit = 1;
                    @endphp
                    @foreach ($imbexp as $key)
                      <tr>
                        <td>{{$key['site_tower']}}</td>
                        <td>{{$key['vendor']}}</td>
                        @php
                          $date = explode(" ", $key['tanggal_kadaluarsa']);
                          $expdate = explode("-", $date[0]);
                        @endphp
                        <td class="hidden-480">{{$expdate[2]}}-{{$expdate[1]}}-{{$expdate[0]}}</td>
                        <td class="hidden-480">
                          <span class="label label-danger arrowed-right arrowed-in">{{$key['status']}}</span>
                        </td>
                      </tr>
                      @php
                        if ($limit>=6) {
                          break;
                        }
                        $limit++;
                      @endphp
                    @endforeach
  								</tbody>
  							</table>
                <a href="#" class="btn btn-xs btn-success pull-right">Lihat Selengkapnya</a>
  						</div><!-- /.widget-main -->
  					</div><!-- /.widget-body -->
  				</div><!-- /.widget-box -->
  			</div>
      </div>

    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

@endsection

@section('jqueryscript')
  <script src="{{asset('highchart/highcharts.js')}}"></script>
  <script src="{{asset('highchart/modules/exporting.js')}}"></script>
  <script type="text/javascript">
    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
      return {
          radialGradient: {
              cx: 0.5,
              cy: 0.3,
              r: 0.7
          },
          stops: [
              [0, color],
              [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
          ]
      };
    });

    // Build the chart
    Highcharts.chart('container', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: ''
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  style: {
                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  },
                  connectorColor: 'silver'
              }
          }
      },
      series: [{
          name: 'Site Tower',
          data: @php echo $chart; @endphp
      }]
    });
  </script>
@endsection
