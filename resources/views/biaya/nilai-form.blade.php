<form class="form-horizontal" id="validation-form2" method="get">
	<div class="form-group">

		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Tahun</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">

				<select name="tahun" id="tahun" class="chosen-select form-control" data-placeholder="Tahun">
          <option value=""></option>
          @for ($i=(date('Y')-5); $i <=date('Y') ; $i++)
            @if ($id!=-1)
              @if ($i==$d->tahun)
                <option value="{{$d->tahun}}" selected="selected">{{$d->tahun}}</option>
              @else
                <option value="{{$i}}">{{$i}}</option>
              @endif
            @else
              @if ($i==date('Y'))
                <option value="{{$i}}" selected="selected">{{$i}}</option>
              @else
                <option value="{{$i}}">{{$i}}</option>
              @endif
            @endif

          @endfor
        </select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Nilai Retribusi</label>

		<div class="col-xs-12 col-sm-9">
			<div class="clearfix">
				<input type="text" name="nilai" id="nilai" class="col-xs-12 col-sm-4" value="{{$id!=-1 ? $d->nilai : 0}}"/>
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
  <input type="hidden" name="status_tampil" value="1">
</form>
<script type="text/javascript">

	$(document).ready(function(){
			$('.chosen-select').chosen({allow_single_deselect:true});

			$('#validation-form2').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						tahun: {
							required: true,
						},
						nilai: {
							required: true,
						}
					},

					messages: {
						tahun:  "Tahun Belum Dipilih",
						nilai:  "Nilai Retribusi Masih Kosong"
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
										var urll=APP_URL+'/biaya/nilaisimpan/{{$id}}';
									// else
									// 	var urll=APP_URL+'/vendor/update/{{$id}}';
									$.ajax({
										url : urll,
										type : 'POST',
										data : $('#validation-form2').serialize(),
										success : function(a){
											datavendor();
											$('.nav-tabs a[href="#nilai"]').tab('show');
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
	#tahun_chosen
	{
		width:200px !important;
	}
</style>
