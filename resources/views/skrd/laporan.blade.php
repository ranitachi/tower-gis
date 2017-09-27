<div class="table-header">
	Laporan Summary SKRD Tahunan Menara Telekomunikasi Dinas Komunikasi dan Informatika Kabupaten Tangerang.
</div>
<div class="row">
  <div class="col-lg-7 col-md-7" style="text-align:right">&nbsp;</div>
  <div class="col-lg-5 col-md-5" style="text-align:right">
    <button class="btn btn-xs btn-primary" type="submit" id="cetak" style="float:right"><i class="fa fa-print"></i> Cetak</button>
    <select id="tahun" class="" style="float:right;margin-right:10px;" >
      <option value="-1" selected="selected">-Semua-</option>
    @php
      for($i=(date('Y')-4);$i<=date('Y');$i++)
      {
          echo '<option value="'.$i.'">'.$i.'</option>';
      }
    @endphp
    </select>
  </div>
</div>
<div id="data"></div>

<script>
jQuery(function($){
    $('select#tahun').change(function(){
      var thn=$(this).val();
      $('#data').load(APP_URL+'/skrd-laporan-data/'+thn);
    });

    $('#cetak').click(function(){
      // var th=$('select#tahun').val();
      // alert(th)
      window.open(
        APP_URL+'/skrd-laporan-cetak/<?=$tahun?>',
        '_blank'
      );
    });
});
</script>
