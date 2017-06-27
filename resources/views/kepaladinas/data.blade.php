<div class="table-header">
	Berikut adalah seluruh data Kepala Dinas.
</div>
<table id="datasite" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">No</th>
			<th  style="width:120px;">Foto</th>
			<th class="center">Nama</th>
			<th class="center">NIP</th>
			<th class="center">Pangkat</th>
			<th class="center">Golongan</th>
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
        <td class="center"><img src="{{($v->foto=='' ? URL::to('/').'/img/student1.png' : $v->foto )}}" style="width:120px;"></td>
        <td class="left">{{$v->nama}}</td>
        <td class="center">{{$v->nip}}</td>
        <td class="center">{{$v->pangkat}}</td>
        <td class="center">{{$v->golongan}}</td>
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
