<form id="form-skrd">
  {{csrf_field()}}
  <div class="row">
    <div class="col-xs-12 col-sm-2 center">
      <img src="{{asset('img/LOGO KABUPATEN TANGERANG.png')}}" style="height:100px;">
    </div>
    <div class="col-xs-12 col-sm-8 center">
      <h2>
        <small>PEMERINTAH KABUPATEN TANGERANG</small><br>
        DINAS KOMUNIKASI DAN INFORMATIKA
      </h2>
    </div>
    <div class="col-xs-12 col-sm-2"></div>
  </div>
  <hr class="hr col-xs-12-sm-12">
  <div class="row">
    <div class="col-xs-12 col-sm-12 center">
      <h2>
        SURAT KETETATAPAN RETRIBUSI DAERAH<br>
        <small>PENGENDALIAN MENARA TELEKOMUNIKASI</small>
      </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
    <div class="col-xs-12 col-sm-10">
      <h6>
        Dasar :
        <ol start="1">
          <li>Peraturan Daerah Kabupaten Tangerang Nomor 4 Tahun 2011 Tentang Retribusi Jasa Umum;</li>
          <li>Peraturan Bupati Tangerang Nomor 53 Tahun 2012 Tentang Petunjuk Pelaksana Pemungutan Retribusi Pengendalian Menara Telekomunkasi;</li>
        </ol>
      </h6>
    </div>
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
    <div class="col-xs-12 col-sm-10">
      <h5>
        SKRD NOMOR  :  {{$d['nomor_skrd']}}<br>
        NOMOR REKENING  :  {{$rekening[0]->no_rekening}}</h5>
    </div>
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
    <div class="col-xs-12 col-sm-10">
      <table class="table table-bordered">
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
          @foreach ($site as $k => $v)
          @php
              if(isset($s[$k]))
              {
                $st=$s[$k];
                $retr=0;
                if(isset($b[$st->type_power]))
                {
                  $by=$b[$st->type_power]->distribusi_biaya;
                  $retr=(date('n') / 12) * $by;
                }
          @endphp
              <tr>
                <td class="center">{{$no}}</td>
                <td class="center" style="width:150px;">{{$rekening[0]->kode_rekening}}</td>
                <td class="left">{{$rekening[0]->nama_rekening}} {{$vendor->nama_vendor}}, {{$st->alamat}}, {{getBulan(1)}} s/d {{getBulan(date('n'))}} {{$d['tahun']}} (Rincian Terlampir)</td>
                <td class="center" style="text-align:right;width:250px">{{number_format($retr,0,',','.')}}</td>
              </tr>
              <input type="hidden" name="site[{{$k}}]" value="{{$k}}">
              <input type="hidden" name="retribusi[{{$k}}]" value="{{$retr}}">
              <input type="hidden" name="uraian[{{$k}}]" value="{{$rekening[0]->nama_rekening}} {{$vendor->nama_vendor}}, {{$st->alamat}}, {{getBulan(1)}} s/d {{getBulan(date('n'))}} {{$d['tahun']}}">
          @php
                $tot+=$retr;
              }
            $no++;
          @endphp
          @endforeach
        </tbody>
        <thead>
          <tr>
            <th colspan="3" class="right" style="text-align:right">Jumlah (Rp)</th>
            <th class="center" style="text-align:right">{{number_format($tot,0,',','.')}}</th>
          </tr>
        </thead>
      </table>
      <div>TERBILANG : <span id="terbilang">{{ucwords(Terbilang($tot))}} Rupiah</span></div>
    </div>
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8">&nbsp;</div>
    <div class="col-xs-12 col-sm-3 center">
      {{strtoupper($pejabat[0]->jabatan)}}
      <br>
      <br>
      <br>
      <br>
      <u>{{$pejabat[0]->nama}}</u><br>
      {{$pejabat[0]->pangkat}}<br>
      {{$pejabat[0]->nip}}
    </div>
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-1">&nbsp;</div>
    <div class="col-xs-12 col-sm-11">
      <h6>
        Tembusan :
        <ul>
          <li>Lembar Asli : Untuk Penyetor</li>
          <li>Lembar 1 : Untuk Bank</li>
          <li>Lembar 2 : Untuk Dispenda Kabupaten Tangerang</li>
          <li>Lembar 3 : Untuk Diskominfo</li>
        </ul>
      </h6>
    </div>
  </div>
  <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
  <input type="hidden" name="nomor_skrd" value="{{$d['nomor_skrd']}}">
  <input type="hidden" name="kode_rekening" value="{{$rekening[0]->kode_rekening}}">
  <input type="hidden" name="penandatangan" value="{{$pejabat[0]->nama}}">
  <input type="hidden" name="tahun" value="{{$d['tahun']}}">
</form>
