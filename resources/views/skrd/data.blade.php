<div class="table-header">
	Data SKRD Menara Telekomunikasi Dinas Komunikasi dan Informatika Kabupaten Tangerang.
</div>
<table id="datasite" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">No</th>
			<th class="center">No SKRD</th>
			<th class="center">Tahun</th>
			<th class="center">No. Rekening</th>
			<th class="center">Kode Rekening</th>
			<th class="center">Vendor</th>
			<th class="center">Lokasi Menara</th>
			<th class="center">Biaya Retribusi</th>
			<th style="width:100px;"></th>
		</tr>
	</thead>
  <tbody>
    @php
      $no=1;
      $total=0;
    @endphp
    @foreach ($kd as $k => $v)
    @php
      $ven=App\Vendor::findOrFail($v->vendor_id);
      $site=App\Site::findOrFail($v->site_id);
    @endphp
      <tr>
        <td class="center">{{$no}}</td>
        <td class="center">{{$v->no_skrd}}</td>
        <td class="center">{{$v->tahun}}</td>
        <td class="center">{{$v->no_rekening}}</td>
        <td class="center">{{$v->kode_rekening}}</td>
        <td class="center">{{$ven->nama_vendor}}</td>
        <td class="center">{{$site->alamat}}</td>
        <td class="" style="text-align:right">{{number_format($v->retribusi,0,',','.')}}</td>
        <td class="center">
          {{-- <button class="btn btn-primary btn-xs" type="button" onclick="edit('{{$v->id}}')"><i class="fa fa-edit"></i></button> --}}
          <button class="btn btn-danger btn-xs" type="button" onclick="hapus('{{$v->id}}')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
      @php
        $total+=$v->retribusi;
        $no++;
      @endphp
    @endforeach
  </tbody>
  <thead>
		<tr>
			<th class="" style="text-align:right" colspan="7">T o t a l</th>
			<th class="" style="text-align:right">{{number_format($total,0,',','.')}}</th>
			<th style="width:100px;"></th>
		</tr>
	</thead>
</table>
<style type="text/css">
	.table-bordered>thead>tr>th,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td,
	.table-bordered>tfoot>tr>td {
		font-size: 13px;
	}
</style>
