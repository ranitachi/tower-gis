<table id="dataoperator" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="left">Variabel</th>
			<th>Indeks</th>
			<th>Biaya Yang Didistribusikan</th>
			<th>Distribusi Biaya</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($biaya as $k => $v)
			<tr>
				<td class="center">{{$v->variabel}}</td>
				<td class="center">{{$v->indeks}}</td>
				<td style="text-align:right">{{number_format($v->biaya,0,',','.')}}</td>
				<td style="text-align:right">{{number_format($v->distribusi_biaya,0,',','.')}}</td>
				<td class="center">
						<button class="btn btn-xs btn-primary" type="button" onclick="edit('{{$v->id}}')"><i class="fa fa-edit"></i></button>
						<button class="btn btn-xs btn-danger" type="button" onclick="hapus('{{$v->id}}')"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
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
