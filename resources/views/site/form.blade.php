<form class="form-horizontal" id="validation-form" method="get">
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Gambar</label>

		<div class="col-xs-12 col-sm-9">
				<img src="{{$id!=-1 ? $d->gambar : URL::to('/').'/img/16717-200.png'}}" alt="" id="gambar_site" style="border:1px solid #ddd;padding:3px;width:200px;height:200px;cursor:pointer" onclick="BrowseServer( 'Image:/', 'gambar' );"/>
				<br>
				<small><i>Click Dalam Kotak Untuk Memilih Gambar</i></small>
				<input type="hidden" id="gambar" name="gambar" readonly="readonly" class="col-xs-12 col-sm-12" value="{{$id!=-1 ? $d->gambar : ''}}"/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Site ID</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="site_id" id="site_id" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->site_id : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Site Name</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="site_name" id="site_name" class="col-xs-12 col-sm-6" value="{{$id!=-1 ? $d->site_name : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Operator</label>
		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<select name="operator[]" multiple="" class="chosen-select form-control" id="operator" data-placeholder="Pilih Data Operator">
				<option value="">&nbsp;</option>
				@foreach($operator as $k => $v)
					@if($id!=-1)
					<?php
						$op=explode(',', $d->operator_id);
						$op_name=explode(',', $d->operator_name);
					?>
							@if(in_array($v->id,$op))
								<option value="{{$v->id}}-{{$v->nama_operator}}" selected="selected">{{$v->nama_operator}}</option>
							@else
								<option value="{{$v->id}}-{{$v->nama_operator}}">{{$v->nama_operator}}</option>
							@endif

					@else
						<option value="{{$v->id}}-{{$v->nama_operator}}">{{$v->nama_operator}}</option>
					@endif
				@endforeach
			</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Vendor</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<select name="vendor_id" multiple="" class="chosen-select form-control" id="vendor_id" data-placeholder="Pilih Data Vendor">
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
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Alamat</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="alamat" id="alamat" class="col-xs-12 col-sm-12" value="{{$id!=-1 ? $d->alamat : ''}}" />
			</div>
		</div>
	</div>

	<div class="hr hr-dotted"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Koordinat Latitude</label>

		<div class="col-xs-12 col-sm-9">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="ace-icon glyphicon glyphicon-map-marker"></i>
				</span>
				<input type="text" id="lat_koord" name="lat_koord" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->lat_koord : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Koordinat Longitude</label>

		<div class="col-xs-12 col-sm-9">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="ace-icon glyphicon glyphicon-map-marker"></i>
				</span>
				<input type="text" id="long_koord" name="long_koord" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->long_koord : ''}}"/>
			</div>
		</div>
	</div>

	<div class="space-2"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Kode Lokasi</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="lokasi_kode" name="lokasi_kode" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->lokasi_kode : ''}}"/>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Pengguna Menara</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="pengguna_menara" name="pengguna_menara" class="col-xs-12 col-sm-8" value="{{$id!=-1 ? $d->pengguna_menara : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Luas Tanah</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="luas_tanah" name="luas_tanah" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->luas_tanah : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Nilai NJOP/m</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="njop_m" name="njop_m" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->njop_m : ''}}"/>
			</div>
		</div>
	</div>

	<div class="hr hr-dotted"></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Tinggi Menara</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="tinggi_menara_1" name="tinggi_menara_1" class="col-xs-12 col-sm-8" value="{{$id!=-1 ? $d->tinggi_menara_1 : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Type Tower</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="type_power" name="type_power" class="col-xs-12 col-sm-8" value="{{$id!=-1 ? $d->type_power : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Nomor IMB</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="imb_no" name="imb_no" class="col-xs-12 col-sm-3" value="{{$id!=-1 ? $d->imb_no : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Tanggal</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" id="tanggal" name="tanggal" class="col-xs-12 col-sm-3" value="{{$id!=-1 ? $d->tanggal : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Tahun</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<select name="imb_tahun" class="chosen-select form-control" id="imb_tahun" data-placeholder="tahun">
					@for($i=(date('Y')-20);$i<=date('Y');$i++)
						@if($i==date('Y'))
							<option selected="selected" value="{{$i}}">{{$i}}</option>
						@else
							<option value="{{$i}}">{{$i}}</option>
						@endif
					@endfor
				</select>
				<!-- <input type="text" id="imb_no" name="imb_no" class="col-xs-12 col-sm-3" /> -->
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Keterangan</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
			<textarea class="col-sm-5 col-xs-12" name="keterangan" id="keterangan">{{$id!=-1 ? $d->keterangan : ''}}</textarea>
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
</form>
<script type="text/javascript">
	$(document).ready(function(){
			$('.chosen-select').chosen({allow_single_deselect:true});

			$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						njop_m: {
							required: true,
						},
						luas_tanah: {
							required: true,
						},

						long_koord: {
							required: true
						},
						lat_koord: {
							required: true,
						},
						alamat: {
							required: true,
						},
						site_id: {
							required: true
						},
						operator: {
							required: true
						},
						vendor_id: {
							required: true
						}
					},

					messages: {
						njop_m:  "Nilai NJOP belum Diisi",
						luas_tanah: "Luas Tanah Masih Kosong",

						long_koord: "Koordinat Longitude Masih Kosong",
						lat_koord: "Koordinat Latitude Masih Kosong",
						alamat: "Alamat Masih Kosong",
						site_id: "Site ID Masih Koosong",
						vendor_id: "Vendor ID Masih Koosong",
						operator: "Operator Belum Dipilih"
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
				        	bootbox.confirm({
								message: "<h2>Yakin ingin Menyimpan Data Ini ?</h2>",
								buttons: {
								  confirm: {
									 label: "OK",
									 className: "btn-primary btn-sm",
								  },
								  cancel: {
									 label: "Cancel",
									 className: "btn-sm",
								  }
								},
								callback: function(result) {
									$.ajax({
										url : APP_URL+'/site/simpan/{{$id}}',
										type : 'POST',
										data : $('#validation-form').serialize(),
										success : function(a){
											// alert(a);
											datasite();
											$('#form').load(APP_URL+'/site_form/-1');
											$('.nav-tabs a[href="#home4"]').tab('show');
										}
									})
								}
							  });

					},
					invalidHandler: function (form) {
					}
				});
	});
</script>
<style type="text/css">
	#operator_chosen,#vendor_id_chosen
	{
		width:300px !important;
	}
	#imb_tahun_chosen
	{
		width:100px !important;
	}
</style>
