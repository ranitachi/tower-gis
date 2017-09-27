<table id="datasite" class="table table-striped table-bordered table-hover" style="width:50%">
	<thead>
		<tr>
			<th class="center">No</th>
			<th class="center">Tahun</th>
			<th class="center">Jumlah</th>
			<th style="width:100px;"></th>
		</tr>
	</thead>
  <tbody>
  @php
    $no=1;$total=0;
  @endphp
  @foreach ($d as $k => $v)
    <tr>
      <td class="center">{{$no}}</td>
      <td class="center">{{$v->tahun}}</td>
      <td style="text-align:right;">{{number_format($v->total,2,',','.')}}</td>
      <td></td>
    </tr>
    @php
      $total+=$v->total;
      $no++;
    @endphp
  @endforeach
  </tbody>
  <thead>
		<tr>
			<th class="center" colspan="2"></th>
			<th style="text-align:right">{{number_format($total,2,',','.')}}</th>
			<th style="width:100px;"></th>
		</tr>
	</thead>
</table>
