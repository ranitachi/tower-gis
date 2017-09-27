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
            <h2>PEMERINTAH KABUPATEN TANGERANG</h2>
            <h1 style="font-size:20px">DINAS KOMUNIKASI DAN INFORMATIKA</h1>
            <h3 style="">DATA SITE TOWER</h3>
					</td>
				</tr>
			</table>
      <table style="border-bottom: 0px !important;border-right: 0px !important;width:100%;margin-top:20px;" class="tabel" cellpadding="2" cellspacing="0">
        <tr>
          <th>No</th>
          @foreach ($data['kolom'] as $k => $v)
            <th>{{ucwords(str_replace('_',' ',$v))}}</th>
          @endforeach
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($data['pilihsite'] as $k => $v)
          <tr>
            <td style="text-align:center;">{{$no}}</td>
            @foreach ($data['kolom'] as $kk => $vvv)
              @php
                if($vvv=='site_id')
                  echo '<td style="text-align:center;">'.$d[$k]->site_id.'</td>';

                if($vvv=='operator')
                  echo '<td style="text-align:center;">'.$d[$k]->operator_name.'</td>';

                if($vvv=='vendor')
                  echo '<td style="text-align:center;">'.$vn[$d[$k]->vendor_id]->nama_vendor.'</td>';

                if($vvv=='alamat')
                  echo '<td style="text-align:left;">'.$d[$k]->alamat.'</td>';

                if($vvv=='koordinat')
                  echo '<td style="text-align:left;">'.$d[$k]->lat_koord.' : '.$d[$k]->long_koord.'</td>';

                if($vvv=='akurasi_data')
                  echo '<td style="text-align:center;">'.($d[$k]->akurat==1 ? 'Akurat' : 'Tidak Akurat').'</td>';

                if($vvv=='rekomendasi')
                  echo '<td style="text-align:center;">'.($d[$k]->rekomendasi==1 ? 'Rekomendasi' : 'Tidak Rekomendasi').'</td>';

              @endphp
            @endforeach

          </tr>
          @php
            $no++;
          @endphp
        @endforeach
      </table>
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
