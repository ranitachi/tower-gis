<form class="form-horizontal" id="validation-form" method="get">
	<div class="form-group">

		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Vendor</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nama_vendor" id="nama_vendor" class="col-xs-12 col-sm-5" value="{{$id!=-1 ? $d->nama_vendor : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Pimpinan</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nama_pimpinan" id="nama_pimpinan" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->nama_pimpinan : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nomor Telepon</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="telp" id="telp" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->telp : ''}}" />
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Alamat</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="alamat" id="alamat" class="col-xs-12 col-sm-6" value="{{$id!=-1 ? $d->alamat : ''}}"/>
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
						nama_vendor: {
							required: true,
						}
					},

					messages: {
						nama_vendor:  "Nama Vendor Masih Kosong"
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
									var id='{{$id}}';
									// if(id=='-1')
										var urll=APP_URL+'/vendor/simpan/{{$id}}';
									// else
									// 	var urll=APP_URL+'/vendor/update/{{$id}}';
									$.ajax({
										url : urll,
										type : 'POST',
										data : $('#validation-form').serialize(),
										success : function(a){
											datavendor();
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
	#operator_chosen,#imb_tahun_chosen
	{
		width:200px !important;
	}
</style>
