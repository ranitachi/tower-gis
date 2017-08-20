<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body onLoad="window.print()">

@foreach ($skrd as $k => $v)
		<div style="padding:20px;border:1px solid #111" class="body">
			<table border="0" style="width:100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:15%;text-align:center;vertical-align:top">
            <img src="{{asset('img/LOGO KABUPATEN TANGERANG.png')}}" style="height:80px;">
					</td>
					<td style="width:70%;vertical-align:top;text-align:center">
						<h2>PEMERINTAH KABUPATEN TANGERANG</h2>
            <h1 style="font-size:20px">DINAS KOMUNIKASI DAN INFORMATIKA</h1>
					</td>
					<td style="width:15%;vertical-align:top;text-align:center;">&nbsp;</td>
				</tr>
			</table>
			<hr>
      <table border="0" style="width:100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:100%;vertical-align:top;text-align:center">
            <h1 style="font-size:20px;">SURAT KETETAPAN RETRIBUSI DAERAH</h1>
            <h2>PENGENDALIAN MENARA TELEKOMUNIKASI</h2>
					</td>
				</tr>
			</table>
			<table style="border-bottom: 0px !important;border-right: 0px !important;width:100%;margin-top:20px;" class="tabel" cellpadding="2" cellspacing="0">
				<tr>
					<td style="text-align:left;width:100%">
            Dasar :
            <ol start="1">
              <li>Peraturan Daerah Kabupaten Tangerang Nomor 4 Tahun 2011 Tentang Retribusi Jasa Umum;</li>
              <li>Peraturan Bupati Tangerang Nomor 53 Tahun 2012 Tentang Petunjuk Pelaksana Pemungutan Retribusi Pengendalian Menara Telekomunkasi;</li>
            </ol>
          </td>
				</tr>
				<tr>
					<td>
            SKRD NOMOR  :  {{$v->no_skrd}}<br>
            NOMOR REKENING  :  {{$v->no_rekening}}</h5>
					</td>
				</tr>

			</table>
      <table class="tabel" border="1" cellpadding="2" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="center">No.</th><th class="center">Kode Rekening</th><th class="center">Uraian Objek Retrbusi</th><th class="center">Jumlah (Rp)</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no=1;
            $tot=0;
          @endphp

            @php

                  // $st=$s[$k];
                  $retr=$v->retribusi;

            @endphp
                <tr>
                  <td class="center" style="text-align:center">{{$no}}</td>
                  <td class="center" style="width:150px;text-align:center">{{$v->kode_rekening}}</td>
                  <td class="left">{{$v->uraian}} (Rincian Terlampir)</td>
                  <td class="center" style="text-align:right;width:250px">{{number_format($retr,0,',','.')}}</td>
                </tr>
            @php
                  $tot+=$retr;

              $no++;
            @endphp
          {{-- @endforeach --}}
        </tbody>
        <thead>
          <tr>
            <th colspan="3" class="right" style="text-align:right">Jumlah (Rp)</th>
            <th class="center" style="text-align:right">{{number_format($tot,0,',','.')}}</th>
          </tr>
        </thead>
      </table>
			<table border="0" style="width:100%;margin-bottom:20px" cellpadding="0" cellspacing="0">
				<tr>
					<th style="text-align:right">Terbilang : <span id="terbilang">{{ucwords(Terbilang($tot))}} Rupiah</span></th>
				</tr>
			</table>
			<table border="0" style="width:100%" cellpadding="0" cellspacing="0">
				<tr>

					<th style="text-align:center;width:70%">&nbsp;</th>
					<th style="text-align:center;width:30%">
            {{strtoupper($pejabat[0]->jabatan)}}
            <br>
            <br>
            <br>
            <br>
            <u>{{$pejabat[0]->nama}}</u><br>
            {{$pejabat[0]->pangkat}}<br>
            {{$pejabat[0]->nip}}
					</th>
				</tr>
			</table>
			<table border="0" style="width:100%" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            Tembusan :
            <ul>
              <li>Lembar Asli : Untuk Penyetor</li>
              <li>Lembar 1 : Untuk Bank</li>
              <li>Lembar 2 : Untuk Dispenda Kabupaten Tangerang</li>
              <li>Lembar 3 : Untuk Diskominfo</li>
            </ul>
          </td>
        </tr>
			</table>
		</div>
    <div class="pagebreak"> </div>
  @endforeach
	</body>
</html>
<style type="text/css" media="print">
  @page {
  	size: A4;
  }
  @media print
  {
    html, body {
      width: 210mm;
      height: 297mm;
      /*page-break-before: always;*/
      page-break-after: always;

    }
  /* ... the rest of the rules ... */
  }
  .pagebreak { page-break-before: always; }
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
