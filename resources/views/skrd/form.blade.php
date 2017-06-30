<form class="form-horizontal" id="validation-form" method="get">
  <div class="row" STYLE="padding:10px;">
    <div class="col-sm-12 center">
      <h1>
        SURAT KETETAPAN RETRIBUSI DAERAH<BR>
        <SMALL>PENGENDALIAN MENARA TELEKOMUNIKASI</SMALL>
      </h1>
    </div>
    <div class="hr hr-dotted col-sm-12"></div>
    <div class="form-group">
  		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Vendor</label>

  		<div class="col-xs-12 col-sm-3">
  			<div class="clearfix">
  				<select name="vendor_id" class="chosen-select form-control" onchange="getsite(this.value)" id="vendor_id" data-placeholder="Pilih Data Vendor">
  				<option value="">&nbsp;</option>
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
    <div class="form-group">
  		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Site</label>

  		<div class="col-xs-12 col-sm-7">
  			<div class="clearfix" id="datasite">
  				<select name="site_id" class="chosen-select form-control" id="site_id" data-placeholder="Pilih Data Site">
  				<option value="">&nbsp;</option>
  			</select>
  			</div>
  		</div>
  	</div>
  </div>
</form>
<script>
$(document).ready(function(){
    $('.chosen-select').chosen({allow_single_deselect:true});
  });
  function getsite(val)
  {
    $('div#datasite').load(APP_URL+'/vendor_site/'+val+'/combo', function(){
      $('.chosen-select').chosen({allow_single_deselect:true});
    });
  }
</script>
<style>
#vendor_id_chosen
{
  width:300px !important;
}
#site_id_chosen
{
  width:600px !important;
}
</style>
