<!DOCTYPE html>
<html>
  <?php echo $__env->make('front.include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="no-skin">
		<div id="navbar" class="navbar">
			  <?php echo $__env->make('front.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			  <?php echo $__env->yieldContent('content'); ?>

		</div><!-- /.main-container -->
			<?php echo $__env->make('front.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo e(asset('js/jquery.2.1.1.min.js')); ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo e(asset('js/jquery.1.11.1.min.js')); ?>"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
</script>
<![endif]-->
		<script type="text/javascript">
		</script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/ace-elements.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/ace.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/fungsi_peta.js')); ?>"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			$('#vendor,#operator,#site').chosen();
			 var $sidebar = $('.sidebar').eq(0);
			 if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
				 var done = false;
				 $window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;
			
			
					if (scroll > 16) {			
						if(!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (17-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 $(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 });
			
			
			});
		</script>
		<script type="text/javascript">
			jQuery(function($) {
			    // Asynchronously Load the map API 
			    var script = document.createElement('script');
			    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyAYzgG72G3M3HVGRdzkvtvO5c4N7lmIuiY&callback=allsite";
			    document.body.appendChild(script);
			});

			</script>
			<script type="text/javascript">
				var APP_URL = <?php echo json_encode(url('/')); ?>

				// alert(APP_URL);
			</script>
	</body>
</html>
<style type="text/css">
	#map_wrapper {
    	height: 700px;
	}

	#map_canvas {
	    width: 100%;
	    height: 100%;
	}
	
	.navbar
	{
		/*min-height: 80px !important;*/
	}
</style>