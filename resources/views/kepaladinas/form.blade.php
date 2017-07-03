<form class="form-horizontal" id="validation-form" method="get">
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Foto</label>

		<div class="col-xs-12 col-sm-9">
				<img src="{{$id!=-1 ? $d->foto : URL::to('/').'/img/student1.png'}}" alt="" id="gambar_site" style="border:1px solid #ddd;padding:3px;width:200px;height:200px;cursor:pointer" onclick="BrowseServer( 'Image:/', 'foto' );"/>
				<br>
				<small><i>Click Dalam Kotak Untuk Memilih Foto</i></small>
				<input type="hidden" id="foto" name="foto" readonly="readonly" class="col-xs-12 col-sm-12" value="{{$id!=-1 ? $d->foto : URL::to('/').'/img/student1.png'}}"/>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->nama : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">NIP</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nip" id="nip" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->nip : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Jabatan</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="jabatan" id="jabatan" class="col-xs-12 col-sm-7" value="{{$id!=-1 ? $d->jabatan : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Pangkat</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="pangkat" id="pangkat" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->pangkat : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Golongan</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="golongan" id="golongan" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->golongan : ''}}"/>
			</div>
		</div>
	</div>
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
						nama: {
							required: true,
						},
						nip: {
							required: true,
						},
						jabatan: {
							required: true,
						}
					},

					messages: {
						nama:  "Nama belum Diisi",
						jabatan:  "Jabatan belum Diisi",
						nip: "NIP belum Diisi"
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
										url : APP_URL+'/kepaladinas-simpan/{{$id}}',
										type : 'POST',
										data : $('#validation-form').serialize(),
										success : function(a){
                      datasite();
                      formm(-1);
                      pesan(a);
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
