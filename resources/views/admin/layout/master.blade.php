<!DOCTYPE html>
<html>
  @include('admin.include.head')
  
<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>


			  @include('admin.include.header')
		</div>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			  @include('admin.include.sidebar')
			  @yield('content')
			  @include('admin.include.footer')

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<meta name="_token" content="{!! csrf_token() !!}" />
		<script src="{{asset('js/jquery.2.1.1.min.js')}}"></script>	
	  	<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/jquery-ui.custom.min.js')}}"></script>
		<script src="{{asset('js/jquery.ui.touch-punch.min.js')}}"></script>
		<script src="{{asset('js/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('js/jquery.dataTables.bootstrap.min.js')}}"></script>
		<script src="{{asset('js/dataTables.tableTools.min.js')}}"></script>
		<script src="{{asset('js/dataTables.colVis.min.js')}}"></script>
		<script src="{{asset('js/jquery.validate.min.js')}}"></script>
		<script src="{{asset('js/additional-methods.min.js')}}"></script>
		<script src="{{asset('js/bootbox.min.js')}}"></script>
		<script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
		<script src="{{asset('js/select2.min.js')}}"></script>
		<script src="{{asset('js/jquery.knob.min.js')}}"></script>
		<script src="{{asset('js/jquery.autosize.min.js')}}"></script>
		<script src="{{asset('js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
		<!-- ace scripts -->
		<script src="{{asset('js/ace-elements.min.js')}}"></script>
		<script src="{{asset('js/ace.min.js')}}"></script>
		<script src="{{asset('js/fungsi_peta.js')}}"></script>
	  	<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
		@yield('jqueryscript')



		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
				
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>

		
			<script type="text/javascript">
				var APP_URL = {!! json_encode(url('/')) !!}
				// alert(APP_URL);
			</script>
<style type="text/css">
	#map_wrapper {
    	height: 650px;
	}

	#map_canvas {
	    width: 100%;
	    height: 100%;
	}
</style>