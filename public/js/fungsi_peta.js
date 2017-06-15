			function peta_awal(){
			    // definisikan koordinat awal untuk peta
			       // peta option, berupa setting bagaimana peta itu akan muncul
			      // menuliskan koordinat peta dan memunculkannya ke halaman web


						// var coordsDiv = document.getElementById('coords');
						var awal = new google.maps.LatLng(-6.2110876,106.2720427);
						var petaoption = {zoom: 11,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP};
						peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);
						peta.setTilt(45);
						var infoContent=new Array();
						infoWindow = new google.maps.InfoWindow(), marker, i;
						peta.addListener('mousemove', function(event) {
									var text =
											'lat: ' + event.latLng.lat().toFixed(5) + ', ' +
											'lang: ' + event.latLng.lng().toFixed(5)+'';
										 $('div#coords').html(text);
								});
			}
			//-6.4443696
			//106.0720427

			function allsite()
			{
				  var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);

				var infoWindow = new google.maps.InfoWindow(), marker, i;

				// var coordsDiv = document.getElementById('coords');
				map.addListener('mousemove', function(event) {
		          var text =
		              'lat: ' + event.latLng.lat().toFixed(5) + ', ' +
		              'lang: ' + event.latLng.lng().toFixed(5)+'';
		             $('div#coords').html(text);
		        });
				$.ajax({
					url : APP_URL+'/json_site/-1/-1',
					dataType : 'JSON',
					success:function(a){
						// alert(a[145].lat_koord+'-'+a[145].long_koord);
				    	if(a.length!=0)
				    	{
							for( i = 0; i < a.length; i++ )
					    	{
						    	infoContent[i]='<div class="info_content"><img src="'+APP_URL+'/images/gallery/image-2.jpg" style="float:left;width:100px;margin:0 15px 5px 0">' +
				        							'<h4>'+a[i].site_id+'</h4>' +
				        							'<p>Operator : '+a[i].operator_name+'<br>'+a[i].alamat+'</p></div>';
								  infoContentByID[a[i].id]='<div class="info_content"><img src="'+APP_URL+'/images/gallery/image-2.jpg" style="float:left;width:100px;margin:0 15px 5px 0">' +
										        							'<h4>'+a[i].site_id+'</h4>' +
										        							'<p>Operator : '+a[i].operator_name+'<br>'+a[i].alamat+'</p></div>';

						        var position = new google.maps.LatLng(a[i].lat_koord, a[i].long_koord);
						        bounds.extend(position);
						        marker = new google.maps.Marker({
						            position: position,
						            map: map,
						            title: a[i].operator_name,
						            draggable : true,
						            animation: google.maps.Animation.DROP,
												label: {
									        text: a[i].initial,
													fontSize: "9px",
									        color: 'white'
									      },
												icon : APP_URL+a[i].icon,
												type:a[i].vendor_id
												// shadow:'http://maps.gstatic.com/mapfiles/shadow50.png'
						            // scale:0.7
						        });
										markers[a[i].vendor_id].push(marker);
										dsite_id[a[i].id].push(marker);
										tanda.push(marker);
						        // Allow each marker to have an info window
						        google.maps.event.addListener(marker, 'click', (function(marker, i) {
						            return function() {
						                infoWindow.setContent(infoContent[i]);
						                infoWindow.open(map, marker);
						            }
						        })(marker, i));
						        google.maps.event.addListener(marker, 'dragend', function(event){
										// document.getElementById('latitude').value = this.getPosition().lat();
										//document.getElementById('longitude').value = this.getPosition().lng();
										alert(this.getPosition().lat());
								});
						        // Automatically center the map fitting all markers on the screen
						        map.fitBounds(bounds);
						    }

						    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
						    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
						        this.setZoom(11);
						        google.maps.event.removeListener(boundsListener);
						    });


				    	}
				    	else
				    	{
				    		peta_awal();
				   //  		$('div#opr').load(APP_URL+'/dataoperator/-1/combo',function(){
							// 	$('#operator').chosen();
							// });
				    	}
			    	}
				});


				var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
					        this.setZoom(11);
					        google.maps.event.removeListener(boundsListener);
					    });
			}
			function showMarker(map)
			{
				for (var i = 0; i < tanda.length; i++) {
          tanda[i].setMap(map);
        }
			}
			function setpetavendor(param)
			{
					var d=param.split('__');
					var id=d[0];
					showMarker();
					// alert(markers[id].length);
					if(markers[id].length!=0)
					{
					  for (var i = 0; i < markers[id].length; i++)
						{
							var marker = markers[id][i];
							marker.setAnimation(google.maps.Animation.DROP);
							marker.setMap(map);
						}
							$('div#opr').load(APP_URL+'/vendor_site_operator/'+id+'/combo',function(){
								$('#operator').chosen();
							});
							$('div#tower').load(APP_URL+'/vendor_by_operator/'+id+'/-1/combo',function(){
								$('#site').chosen();
							});
					  }
					  else
					  {
						  	peta_awal();
						  	$('div#opr').load(APP_URL+'/dataoperator/-1/combo',function(){
									$('#operator').chosen();
								});
								$('div#tower').load(APP_URL+'/vendor_by_operator/-1/-1/combo',function(){
									$('#site').chosen();
								});
					  }
			}

			function setsite(vendor_id,param)
			{
				var d=param.split('__');
				var id=d[0];
				var operator_name=d[1];

				if(markers[vendor_id].length!=0)
				{
					if(id=='')
					{
						for (var i = 0; i < markers[vendor_id].length; i++)
						{
							// alert(markers[vendor_id][i].id);
							var marker = markers[vendor_id][i];
							marker.setAnimation(google.maps.Animation.DROP);
							marker.setMap(map);
							map.setZoom(11);
						}
						infoWindow.close();
						map.setCenter();
						$('div#tower').load(APP_URL+'/vendor_by_operator/'+vendor_id+'/-1/combo',function(){
							$('#site').chosen();
						});
					}
					else
					{

						for (var i = 0; i < markers[vendor_id].length; i++)
						{
							// alert(markers[vendor_id][i].id);
							var marker = markers[vendor_id][i];
							marker.setAnimation(google.maps.Animation.DROP);
							marker.setMap(map);
							map.setZoom(11);
						}
						// infoWindow.close();
						map.setCenter();
							$('div#tower').load(APP_URL+'/vendor_by_operator/'+vendor_id+'/'+id+'/combo',function(){
								$('#site').chosen();
							});
					}
					}
					else
					{
							peta_awal();
							$('div#opr').load(APP_URL+'/dataoperator/-1/combo',function(){
								$('#operator').chosen();
							});
							$('div#tower').load(APP_URL+'/vendor_by_operator/-1/-1/combo',function(){
								$('#site').chosen();
							});
					}
			}

			function setpeta(vendor_id,param)
			{
				var d=param.split('__');
				var id=d[0];
				var site_id=d[1];
				var operator_name=d[2];
				var lat_koord=d[3];
				var long_koord=d[4];
				showMarker();
				infoWindow = new google.maps.InfoWindow({
          content: infoContentByID[id]
        });
				if(dsite_id[id].length!=0)
				{
					if(id!='')
					{
						for (var i = 0; i < dsite_id[id].length; i++)
						{
							// alert(markers[vendor_id][i].id);
							var marker = dsite_id[id][i];
							marker.setAnimation(google.maps.Animation.DROP);
							marker.setMap(map);
							map.setZoom(18);
							map.setCenter(marker.getPosition());
							infoWindow.open(map,marker);
						}
					}

				}
			}
function pesan(ps)
{
	bootbox.alert('<h2>'+ps+'</h2>');
}
