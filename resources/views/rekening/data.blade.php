<div class="table-header">
	Data Kode Rekening
</div>
<table id="datasite" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">No</th>
			<th class="center">No. Rekening</th>
			<th class="center">Nama Bank</th>
			<th class="center">Kode Rekening</th>
			<th class="center">Nama Rekening</th>
			<th style="width:100px;"></th>
		</tr>
	</thead>
  <tbody>
    @php
      $no=1;
    @endphp
    @foreach ($kd as $k => $v)
      <tr>
        <td class="center">{{$no}}</td>
        <td class="center">{{$v->no_rekening}}</td>
        <td class="center">{{$v->nama_bank}}</td>
        <td class="center">{{$v->kode_rekening}}</td>
        <td class="center">{{$v->nama_rekening}}</td>
        <td class="center">
          <button class="btn btn-primary btn-xs" type="button" onclick="edit('{{$v->id}}')"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger btn-xs" type="button" onclick="hapus('{{$v->id}}')"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
      @php
        $no++;
      @endphp
    @endforeach
  </tbody>
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
