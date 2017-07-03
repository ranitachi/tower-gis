<table id="datanilai" class="table table-striped table-bordered table-hover" style="width:60%">
	<thead>
		<tr>
			<th class="center">No</th>
			<th>Tahun</th>
			<th>Nilai Retribusi</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    @php
      $no=1;
    @endphp
		@foreach ($nilai as $k => $v)
			<tr>
				<td class="center">{{$no}}</td>
				<td class="center">{{$v->tahun}}</td>
				<td style="text-align:right">{{number_format($v->nilai,0,',','.')}}</td>
				<td class="center">
						<button class="btn btn-xs btn-primary" type="button" onclick="editnilai('{{$v->id}}')"><i class="fa fa-edit"></i></button>
						<button class="btn btn-xs btn-danger" type="button" onclick="hapusnilai('{{$v->id}}')"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
    @php
      $no++;
    @endphp
		@endforeach
	</tbody>
</table>
<hr />
<style type="text/css">
	.table-bordered>thead>tr>th,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td,
	.table-bordered>tfoot>tr>td {
		font-size: 13px;
	}
	.table-bordered>tbody>tr>td
	{
		padding:3px !important;
		vertical-align: middle !important;
	}
</style>
