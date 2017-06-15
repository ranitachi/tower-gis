<form class="form-horizontal" id="validation-form" method="get">
	<div class="form-group">

		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Kategori</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">

				<select name="zona" id="zona" class="chosen-select form-control" data-placeholder="Zona">
          <option value=""></option>
					@if ($id!=-1)
						@if ($d->zona=='Zona 1')
							<option value="Zona 1" selected="selected">Zona 1</option>
							<option value="Zona 2">Zona 2</option>
							<option value="Zona 3">Zona 3</option>
						@elseif ($d->zona=='Zona 2')
							<option value="Zona 1">Zona 1</option>
							<option value="Zona 2" selected="selected">Zona 2</option>
							<option value="Zona 3">Zona 3</option>
						@elseif ($d->zona=='Zona 3')
							<option value="Zona 1">Zona 1</option>
							<option value="Zona 2">Zona 2</option>
							<option value="Zona 3" selected="selected">Zona 3</option>
						@endif
					@else
						<option value="Zona 1">Zona 1</option>
						<option value="Zona 2">Zona 2</option>
						<option value="Zona 3">Zona 3</option>
					@endif
        </select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Variabel</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="variabel" id="variabel" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->variabel : ''}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Indeks</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="indeks" onkeyup="distribusibiaya()" id="indeks" class="col-xs-12 col-sm-2" value="{{$id!=-1 ? $d->indeks : 0}}" />
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Biaya</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" onkeyup="distribusibiaya()" name="biaya" id="biaya" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->biaya : 0}}"/>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Distribusi Biaya</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" readonly="readonly" name="distribusi_biaya" id="distribusi_biaya" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->distribusi_biaya : ''}}"/>
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
						zona: {
							required: true,
						},
						variabel: {
							required: true,
						},
						indeks: {
							required: true,
						},
						biaya: {
							required: true,
						}
					},

					messages: {
						zona:  "Zona Belum Dipilih",
						variabel:  "Nama Variabel Masih Kosong",
						indeks:  "Indeks Belum Diisi",
						biaya:  "Biaya Masih Kosong",
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
										var urll=APP_URL+'/biaya/simpan/{{$id}}';
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
	#zona_chosen
	{
		width:200px !important;
	}
</style>
