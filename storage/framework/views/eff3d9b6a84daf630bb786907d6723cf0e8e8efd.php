<form class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data" action="<?php echo e(URL::to('format-excel')); ?>">
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Import File Excel</label>

		<div class="col-xs-12 col-sm-4">
			<div class="clearfix">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<input type="file" name="import" id="id-input-file-2" class="col-xs-5 col-sm-5" value=""/>
				<i><a href="<?php echo e(URL::to('format-excel')); ?>">Contoh Format Excel</a></i>
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