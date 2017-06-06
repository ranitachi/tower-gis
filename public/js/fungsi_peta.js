			function peta_awal(){
			    // definisikan koordinat awal untuk peta
			        var awal = new google.maps.LatLng(-6.8639254,107.2597868); 
			       // peta option, berupa setting bagaimana peta itu akan muncul
			       var petaoption = {zoom: 8,center: awal,mapTypeId: google.maps.MapTypeId.ROADMAP}; 
			      // menuliskan koordinat peta dan memunculkannya ke halaman web
			      peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);

			      peta.setTilt(45);
			}
			//-6.4443696
			//106.0720427
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

			function setpeta(param)
			{
				var d=param.split('__');
				var id=d[0];
				var x=d[3];
				var y=d[4];
				// alert(APP_URL);
				// alert(d[2]+d[3]);
				// mengambil koordinat dari database
				var infoWindow = new google.maps.InfoWindow();
				var lokasibaru = new google.maps.LatLng(x, y);
				var petaoption = {
					zoom: 16,
					center: lokasibaru,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				
				peta = new google.maps.Map(document.getElementById("map_canvas"),petaoption);
				 
				 // ngasih fungsi marker buat generate koordinat latitude & longitude
				tanda = new google.maps.Marker({
					position: lokasibaru,
					draggable : true,
					map: peta
				});

				$.ajax({
					url : APP_URL+'/json_site/'+id,
					dataType : 'JSON',
					success:function(a){
						google.maps.event.addListener(tanda, 'click', (function(tanda) {
				            return function() {
				            	var infoContent='<div class="info_content">' +
			        							'<h4>'+a.site_id+'</h4>' +
			        							'<p>Operator : '+a.operator_name+'<br>'+a.alamat+'</p></div>';
				                infoWindow.setContent(infoContent);
				                infoWindow.open(peta, tanda);
				                // alert('a');
				            }
				        })(tanda));
					}
				});
				
				// ketika markernya didrag, koordinatnya langsung di selipin di textfield
				google.maps.event.addListener(tanda, 'dragend', function(event){
						// document.getElementById('latitude').value = this.getPosition().lat();
						// document.getElementById('longitude').value = this.getPosition().lng();
				});
			}
			function allsite()
			{
				var map;
			    var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);
				var infoContent=new Array();
				var infoWindow = new google.maps.InfoWindow(), marker, i;
				$.ajax({
					url : APP_URL+'/json_site/-1/-1',
					dataType : 'JSON',
					success:function(a){

				    	if(a.length!=0)
				    	{
							for( i = 0; i < a.length; i++ ) 
					    	{
						    	infoContent[i]='<div class="info_content">' +
				        							'<h4>'+a[i].site_id+'</h4>' +
				        							'<p>Operator : '+a[i].operator_name+'<br>'+a[i].alamat+'</p></div>';

						        var position = new google.maps.LatLng(a[i].lat_koord, a[i].long_koord);
						        bounds.extend(position);
						        marker = new google.maps.Marker({
						            position: position,
						            map: map,
						            title: a[i].operator_name,
						            draggable : true,
						            icon : APP_URL+'/img/pin-tower-small.png',
						            // scale:0.7
						        });
						        
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
			function setpetavendor(param)
			{
				var d=param.split('__');
				var id=d[0];
				var map;
			    var bounds = new google.maps.LatLngBounds();
			    var mapOptions = {
			        mapTypeId: 'roadmap'
			    };
			                    
			    // Display a map on the page
			    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
			    map.setTilt(45);
				
				var infoWindow = new google.maps.InfoWindow(), marker, i;

				$.ajax({
					url : APP_URL+'/vendor_site/'+id+'/json',
					dataType : 'JSON',
					success:function(a){

				    	if(a.length!=0)
				    	{
							for( i = 0; i < a.length; i++ ) 
					    	{
						    	var infoContent='<div class="info_content">' +
				        							'<h4>'+a[i].site_id+'</h4>' +
				        							'<p>Operator : '+a[i].operator_name+'<br>'+a[i].alamat+'</p></div>';

						        var position = new google.maps.LatLng(a[i].lat_koord, a[i].long_koord);
						        bounds.extend(position);
						        marker = new google.maps.Marker({
						            position: position,
						            map: map,
						            title: a[i].operator_name,
						            draggable : true
						        });
						        
						        // Allow each marker to have an info window    
						        google.maps.event.addListener(marker, 'click', (function(marker, i) {
						            return function() {
						                infoWindow.setContent(infoContent);
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
							
							$('div#opr').load(APP_URL+'/vendor_site_operator/'+id+'/combo',function(){
								$('#operator').chosen();
							});
				    	}
				    	else
				    	{
				    		peta_awal();
				    		$('div#opr').load(APP_URL+'/dataoperator/-1/combo',function(){
								$('#operator').chosen();
							});
				    	}
			    	}
				});

				// $.ajax({
				// 	url : APP_URL+'/vendor_site_operator/'+id+'/combo',
				// 	// dataType : 'JSON',
				// 	success:function(a){

				// 		$('div#opr').html(a);
				// 	}
				// });
				var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
					        this.setZoom(11);
					        google.maps.event.removeListener(boundsListener);
					    });
			}