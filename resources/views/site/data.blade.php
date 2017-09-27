<div class="table-header">
	Berikut adalah seluruh data Site yang telah terdaftar dalam database.
</div>
<form method="post" target="_blank" action="{{URL::to('site/cetak')}}" id="datacetak">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-lg-7 col-md-7" style="text-align:right">&nbsp;</div>
		<div class="col-lg-5 col-md-5" style="text-align:right">
			Pilih Kolom &nbsp;
			<select id="food" class="multiselect" multiple="" style="float:right;" name="kolom[]">
				<option value="site_id">Site ID</option>
				<option value="operator">Operator</option>
				<option value="vendor">Vendor</option>
				<option value="alamat">Alamat</option>
				<option value="koordinat">Koordinat</option>
				<option value="akurasi_data">Akurasi Data</option>
				<option value="rekomendasi">Rekomendasi Site</option>
			</select>
			<button class="btn btn-sm btn-primary" type="button" id="cetak"><i class="fa fa-print"></i> Cetak</button>
		</div>
	</div>
	<table id="datasite" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No</th>
				<th  style="width:120px;">Site ID</th>
				<th>Operator</th>
				<th>Vendor</th>
				<th>Alamat</th>
				<th style="width:120px;">Koordinat</th>
				<th style="width:100px;text-align:center">Show Map</th>
				<th style="text-align:center">Akurasi Data</th>
				<th style="text-align:center">Rekomendasi Site</th>
				<th style="text-align:center;width:90px;">Pilih <input type="checkbox" name="pilih" id="pilih"></th>
				<th style="width:100px;"></th>
			</tr>
		</thead>

	</table>
	<style type="text/css">
		.table-bordered>thead>tr>th,
		.table-bordered>tbody>tr>th,
		.table-bordered>tfoot>tr>th,
		.table-bordered>thead>tr>td,
		.table-bordered>tbody>tr>td,
		.table-bordered>tfoot>tr>td {
			font-size: 13px;
		}
	</style>
	<script>
	jQuery(function($){
		$('#pilih').click(function(event) {  //on click
			if(this.checked) { // check select status
				$('input#pilihsite').each(function() { //loop through each checkbox
					this.checked = true;  //select all checkboxes with class "checkbox1"
				});
			}else{
				$('input#pilihsite').each(function() { //loop through each checkbox
					this.checked = false; //deselect all checkboxes with class "checkbox1"
				});
			}
		});

		$('#cetak').click(function(){
			// $.ajaxSetup({
			// 				headers: {
			// 						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			// 				}
			// 		});
			var check = $('#datasite').find('input#pilihsite:checked').length;
			var klm = $('#food :selected').length;

			// alert(klm)
			if(check==0)
			{
				$('div#body-alert').html('<h2>Data Site Belum Dipilih</h2>');
	      $('div#modal-alert').modal('show');
			}
			else if(klm==0)
			{
				$('div#body-alert').html('<h2>Data Kolom Belum Dipilih</h2>');
	      $('div#modal-alert').modal('show');
			}
			else
				$('form#datacetak').submit();
					// window.open(APP_URL+'/site/cetaksite','_blank');

						// $.ajax({
						// 	url : APP_URL+'/site/cetak',
						// 	type : 'POST',
						// 	data : $('#datacetak').serialize(),
						// 	success : function(a){
						// window.open(APP_URL+'/site/cetaksite','_blank');
						// 	}
						// })


		});
	});
	</script>
</form>
