<form class="form-horizontal" id="validation-form" method="get">
  <div class="row" STYLE="padding:15px;">
    <div class="col-sm-12 center">
      <h1>
        SURAT KETETAPAN RETRIBUSI DAERAH<BR>
        <SMALL>PENGENDALIAN MENARA TELEKOMUNIKASI</SMALL>
      </h1>
    </div>
    <div class="hr hr-dotted col-sm-12"></div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <div class="row" style="padding:15px;">
              <label for="password" class="col-xs-12 col-sm-12">Vendor</label>
              <div class="col-xs-12 col-sm-12">
                  <select name="vendor_id" class="chosen-select form-control" onchange="getsite(this.value)" id="vendor_id" data-placeholder="Pilih Data Vendor">
                  <option value="">Pilih Data Vendor</option>
                  @foreach($vendor as $k => $v)
                    @if($id!=-1)
                      @if($v->id==$d->vendor_id)
                        <option value="{{$v->id}}" selected="selected">{{$v->nama_vendor}}</option>
                      @else
                        <option value="{{$v->id}}">{{$v->nama_vendor}}</option>
                      @endif

                    @else
                      <option value="{{$v->id}}">{{$v->nama_vendor}}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top:-30px;">
          <div class="row"  style="padding:15px;">
            <label class="col-xs-12 col-sm-12">Site</label>
            <div class="col-xs-12 col-sm-12" id="">
              <table id="site_data" class="table table-striped table-hover">
              	<thead>
              		<tr>
              			<th class="center">No</th>
              			<th style="width:150px">Site ID</th>
              			<th>Operator</th>
              			<th>Alamat</th>
              		</tr>
              	</thead>
                <tbody>
                  <tr>
                    <td colspan="4" class="center"><i>Data Site Tidak Tersedia</i></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6">
        <div class="form-group">
          <div class="row" style="padding:15px;">
            <label for="password" class="col-xs-12 col-sm-12">Nomor SKRD</label>

            <div class="col-xs-12 col-sm-12">
              <input type="text" id="nomor_skrd" name="nomor_skrd" class="col-xs-12 col-sm-4"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row" style="padding:15px;margin-top:-30px;">
            <label for="password" class="col-xs-12 col-sm-12">Tahun</label>

            <div class="col-xs-12 col-sm-12">
              <select name="tahun" class="chosen-select form-control" onchange="" id="tahun" data-placeholder="Tahun">
                <option value="">Tahun</option>
                @for($i=(date('Y')-5);$i<=date('Y');$i++)
                  @if($i==date('Y'))
                      <option value="{{$i}}" selected="selected">{{$i}}</option>
                  @else
                    <option value="{{$i}}">{{$i}}</option>
                  @endif
                @endfor
              </select>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top:-30px;">
          <div class="row" style="padding:15px;">
            <label for="password" class="col-xs-12 col-sm-12">Kode Rekening</label>

            <div class="col-xs-12 col-sm-12">
              <select name="kode_rekening" class="chosen-select form-control" onchange="getrekening(this.value)" id="kode_rekening" data-placeholder="Pilih Kode Rekening">
                <option value="">Pilih Kode Rekening</option>
                @foreach($rek as $k => $v)
                  @if($id!=-1)
                    @if($v->kode_rekening==$d->kode_rekening)
                      <option value="{{$v->kode_rekening}}" selected="selected">{{$v->no_rekening}} - {{$v->kode_rekening}}</option>
                    @else
                      <option value="{{$v->kode_rekening}}">{{$v->no_rekening}} - {{$v->kode_rekening}}</option>
                    @endif

                  @else
                    <option value="{{$v->kode_rekening}}">{{$v->no_rekening}} - {{$v->kode_rekening}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="form-group" style="margin-top:-30px;">
          <div class="row" style="padding:15px;">
            <label for="password" class="col-xs-12 col-sm-12">Pejabat Penanda Tangan</label>

            <div class="col-xs-12 col-sm-12">
              <select name="penandatangan" class="chosen-select form-control" onchange="" id="penandatangan" data-placeholder="Pilih Pejabat">
                <option value="">Pilih Pejabat</option>
                @foreach($pejabat as $k => $v)
                  @if($id!=-1)
                    @if($v->nama==$d->kepala_dinas)
                      <option value="{{$v->nama}}" selected="selected">{{$v->jabatan}} - {{$d->kepala_dinas}} [{{$v->nip}}]</option>
                    @else
                      <option value="{{$v->nama}}">{{$v->jabatan}} - {{$v->nama}} [{{$v->nip}}]</option>
                    @endif

                  @else
                    <option value="{{$v->nama}}">{{$v->jabatan}} - {{$v->nama}} [{{$v->nip}}]</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>

    </div>
    <hr />
  	<div class="wizard-actions">
  		<button class="btn btn-success btn-next" data-last="Finish">
  			Save
  			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
  		</button>
  	</div>

  </div>
</form>
<script>
$(document).ready(function(){
    $('.chosen-select').chosen({allow_single_deselect:true});
    $('#validation-form').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
          vendor_id: {
            required: true,
          },
          tahun: {
            required: true,
          },
          kode_rekening: {
            required: true
          },
          penandatangan: {
            required: true,
          }
        },

        messages: {
          vendor_id:  "Vendor Belum Di Pilih",
          tahun: "Tahun Belum Di Pilih",
          kode_rekening: "Kode Rekening Belum Di Pilih",
          penandatangan: "Nama Penanda Tangan Belum Di Pilih"
        },


        highlight: function (e) {
          $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
          $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
          $(e).remove();
        },

        errorPlacement: function (error, element) {
          if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
            var controls = element.closest('div[class*="col-"]');
            if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
            else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
          }
          else if(element.is('.select2')) {
            error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
          }
          else if(element.is('.chosen-select')) {
            error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
          }
          else error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
          // alert('OK');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              $.ajax({
                url : APP_URL+'/skrd-sum',
                type : 'POST',
                data : $('form#validation-form').serialize(),
                success : function(a)
                {
                  $('#modal-skrd').modal('show');
                  $('#body-info-skrd').html(a);

                  $('button#simpanskrd').click(function(){
                    $.ajax({
                      url : APP_URL+'/skrd-simpan',
                      type : 'POST',
                      data : $('form#form-skrd').serialize(),
                      success : function(aa)
                      {
                        window.open(
                          APP_URL+'/skrd-cetak/'+aa,
                          '_blank'
                        );
                        location.href=APP_URL+'/skrd';
                        // pesan(aa);
                      }
                    });
                  });

                }
              });
        },
        invalidHandler: function (form) {
        }
      });
  });

  function getsite(val)
  {
    // var tb=$('#site_data').dataTable();
    if(val!='')
    {

    // "ajax": APP_URL+'/json_site/-1/1',
      $('#site_data').dataTable({
        "destroy": true,
        "ajax": APP_URL+'/vendor_site/'+val+'/json',
        "columns": [
                    { "data": "pilih" },
                    { "data": "site_id" },
                    { "data": "operator_name" },
                    { "data": "al" }
                ],
        "iDisplayLength": 15
      });
    }

  }
</script>
<style>
#vendor_id_chosen,#kode_rekening_chosen
{
  width:300px !important;
}
#penandatangan_chosen
{
  width:100% !important;
}
#tahun_chosen
{
  width:100px !important;
}
#site_id_chosen
{
  width:600px !important;
}
#modal-skrd-lg {
  width: 90%;
  margin: auto;
}
</style>
<style type="text/css">
  .table-bordered>thead>tr>th,
  .table-bordered>tbody>tr>th,
  .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td,
  .table-bordered>tbody>tr>td,
  .table-bordered>tfoot>tr>td {
    font-size: 13px;
  }
  ul.pagination li a,.dataTables_info
  {
    font-size: 9px !important;
  }
</style>
