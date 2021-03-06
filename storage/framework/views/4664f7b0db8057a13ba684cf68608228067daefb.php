<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="<?php echo e(Request::path() =='admin'?'active':''); ?>">
						<a href="<?php echo e(URL::to('admin')); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo e(Request::path() =='site'?'active':''); ?>">
						<a href="<?php echo e(URL::to('site')); ?>">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Manage Site Tower
							</span>
						</a>
					</li>
					<li class="<?php echo e(Request::path() =='vendor'?'active':''); ?>">
						<a href="<?php echo e(URL::to('vendor')); ?>" >
							<i class="menu-icon fa fa-globe"></i>
							<span class="menu-text">
								Manage Vendor
							</span>
						</a>
					</li>
					<li class="<?php echo e(Request::path() =='operator'?'active':''); ?>">
						<a href="<?php echo e(URL::to('operator')); ?>" >
							<i class="menu-icon fa fa-inbox"></i>
							<span class="menu-text">
								Manage Operator
							</span>
						</a>
					</li>
					<li class="<?php echo e(Request::path() =='user'?'active':''); ?>">
						<a href="<?php echo e(URL::to('user')); ?>" >
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Manage User
							</span>
						</a>
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>