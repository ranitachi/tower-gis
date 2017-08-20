<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">


		<div style="padding:20px;" class="body">

      <table border="0" style="width:100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center">
            <h3 style="">DATA LAPORAN SUMMARY TAHUNAN<br>Tahun {{$tahun}}</h3>
					</td>
				</tr>
			</table>
      <center>
        <table style="border-bottom: 0px !important;border-right: 0px !important;width:50%;margin-top:20px;" class="tabel" cellpadding="2" cellspacing="0">
          <tr>
            <th class="center">No</th>
      			<th class="center">Tahun</th>
      			<th class="center">Jumlah</th>
          </tr>
          @php
            $no=1;$total=0;
          @endphp
          @foreach ($d as $k => $v)
            <tr>
              <td class="center" style="text-align:center;">{{$no}}</td>
              <td class="center" style="text-align:center;">{{$v->tahun}}</td>
              <td style="text-align:right;">{{number_format($v->total,2,',','.')}}</td>
              {{-- <td></td> --}}
            </tr>
            @php
              $total+=$v->total;
              $no++;
            @endphp
          @endforeach
          <tr>
      			<th class="center" colspan="2"></th>
      			<th style="text-align:right">{{number_format($total,2,',','.')}}</th>
      			{{-- <th style="width:100px;"></th> --}}
      		</tr>
        </table>
    </center>
    </div>
  </body>
</html>
<pre>
@php
  // print_r($d);
@endphp
</pre>
<style type="text/css" media="print">
  @page {
  	size: A4;
  }
  @media print
  {
    html, body {
      width: 210mm;
      height: 297mm;
      page-break-before: always;
    }
  /* ... the rest of the rules ... */
  }
</style>
<style type="text/css">
*
{
	line-height: 20px;
	font-size : 105%;
}
.tabel th,
.tabel td
{

	vertical-align: top;
	padding:3px;
  border:1px solid #bbb;
}
.tabel th
{
	background: #ddd;
	vertical-align: middle !important;
}

h1,h2,h3,h4,h5,h6
{
	padding: 1px !important;
	margin: 1px !important;
}
div
{
	font-size: 12px !important;
	padding-top:0px;
	padding-bottom:0px;
	margin-top:-1px !important;
	margin-bottom:0px;
}
ol li
{
	margin-top:3px !important;
	margin-bottom:0px !important;
}
div.b128{
	border-left: 1px black solid;
	height: 40px !important;
}

</style>
