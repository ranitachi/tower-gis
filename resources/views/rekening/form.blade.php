<form class="form-horizontal" id="validation-form" method="get">

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">No Rekening</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="no_rekening" id="no_rekening" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->no_rekening : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Kode Rekening</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="kode_rekening" id="kode_rekening" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->kode_rekening : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Rekening</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nama_rekening" id="nama_rekening" class="col-xs-12 col-sm-7" value="{{$id!=-1 ? $d->nama_rekening : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nama Bank</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nama_bank" id="nama_bank" class="col-xs-12 col-sm-7" value="{{$id!=-1 ? $d->nama_bank : ''}}"/>
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
						no_rekening: {
							required: true,
						},
						kode_rekening: {
							required: true,
						}
					},

					messages: {
						no_rekening:  "Nomor Rekening Diisi",
						kode_rekening:  "Kode Rekening belum Diisi"
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
										url : APP_URL+'/rekening-simpan/{{$id}}',
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
