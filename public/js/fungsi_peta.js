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
						var infoWindow = new google.maps.InfoWindow(), marker, i;
						peta.addListener('mousemove', function(event) {
									var text =
											'lat: ' + event.latLng.lat().toFixed(5) + ', ' +
											'lang: ' + event.latLng.lng().toFixed(5)+'';
										 $('div#coords').html(text);
								});
			}
			//-6.4443696
			//106.0720427
			function addmarker(vendor_id)
			{

			}
			function initialize() {

			    var map;
			    var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };

			    // Display a map on the page
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);

			    // Multiple Markers
			    var markers = [
			        ['HCPT,Smartfren ', -6.0487,106.5600],
			        ['Smartfren', -6.2164,106.4190]
			    ];

			    // Info Window Content
			    var infoWindowContent = [
			        ['<div class="info_content">' +
			        '<h3>HCPT,Smartfren</h3>' +
			        '<p>Jl. Kp. Sukadiri Rt.02/01 Kec.Sukadiri</p></div>'],
			        ['<div class="info_content">' +
			        '<h3>Smartfren</h3>' +
			        '<p>Gembong Masjid Rt.02/01 Kec.Balaraja</p></div>']
			    ];

			    // Display multiple markers on a map
			    var infoWindow = new google.maps.InfoWindow(), marker, i;

			    // Loop through our array of markers & place each one on the map
			    for( i = 0; i < markers.length; i++ ) {
			        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
			        bounds.extend(position);
			        marker = new google.maps.Marker({
			            position: position,
			            map: map,
			            title: markers[i][0],
			            draggable : true
			        });

			        // Allow each marker to have an info window
			        google.maps.event.addListener(marker, 'click', (function(marker, i) {
			            return function() {
			                infoWindow.setContent(infoWindowContent[i][0]);
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

			function allsite()
			{
				  var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);
				var infoContent=new Array();
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
				  for (var i = 0; i < markers[id].length; i++)
					{
						var marker = markers[id][i];
						marker.setAnimation(google.maps.Animation.DROP);
						marker.setMap(map);
						// alert(marker.site_id);
						// if (!marker.getVisible()) {
		        //     marker.setVisible(true);
		        // } else {
		        //     marker.setVisible(false);
		        // }
					}
				//
				// $.ajax({
				// 	url : APP_URL+'/vendor_site/'+id+'/json',
				// 	dataType : 'JSON',
				// 	success:function(a){
				//
				//     	if(a.length!=0)
				//     	{
				// 			for( i = 0; i < a.length; i++ )
				// 	    	{
				// 		    	var infoContent='<div class="info_content">' +
				//         							'<h4>'+a[i].site_id+'</h4>' +
				//         							'<p>Operator : '+a[i].operator_name+'<br>'+a[i].alamat+'</p></div>';
				//
				// 		        var position = new google.maps.LatLng(a[i].lat_koord, a[i].long_koord);
				// 		        bounds.extend(position);
				// 		        marker = new google.maps.Marker({
				// 		            position: position,
				// 		            map: map,
				// 		            title: a[i].operator_name,
				// 		            animation: google.maps.Animation.DROP,
				//
				// 		        });
				//
				// 		        // Allow each marker to have an info window
				// 		        google.maps.event.addListener(marker, 'click', (function(marker, i) {
				// 		            return function() {
				// 		                infoWindow.setContent(infoContent);
				// 		                infoWindow.open(map, marker);
				// 		            }
				// 		        })(marker, i));
				// 		        // Automatically center the map fitting all markers on the screen
				// 		        map.fitBounds(bounds);
				// 		    }
				//
				// 		    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
				// 		    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
				// 		        this.setZoom(11);
				// 		        google.maps.event.removeListener(boundsListener);
				// 		    });
				//
				// 			$('div#opr').load(APP_URL+'/vendor_site_operator/'+id+'/combo',function(){
				// 				$('#operator').chosen();
				// 			});
				//     	}
				//     	else
				//     	{
				//     		peta_awal();
				//     		$('div#opr').load(APP_URL+'/dataoperator/-1/combo',function(){
				// 				$('#operator').chosen();
				// 			});
				//     	}
			  //   	}
				// });
				//
				// // $.ajax({
				// // 	url : APP_URL+'/vendor_site_operator/'+id+'/combo',
				// // 	// dataType : 'JSON',
				// // 	success:function(a){
				//
				// // 		$('div#opr').html(a);
				// // 	}
				// // });
				// var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
				// 	        this.setZoom(11);
				// 	        google.maps.event.removeListener(boundsListener);
				// 	    });
			}


function pesan(ps)
{
	bootbox.alert('<h2>'+ps+'</h2>');
}
