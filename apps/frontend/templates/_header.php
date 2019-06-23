      
<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo url_for('@homepage'); ?>" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>M</b>T</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Micro</b>Tasker</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<?php if($sf_user->isAuthenticated()): ?>
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
		</a>
		<?php endif; ?>
		
		<?php if($sf_user->isAuthenticated()): ?>
		<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				<!-- Tasks: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo $sf_user->getGuardUser()->getProfile()->getImageThumbnail(); ?>" class="user-image" alt="User Image"/>
						<span class="hidden-xs"><?php echo $sf_user->getGuardUser(); ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo $sf_user->getGuardUser()->getProfile()->getImageThumbnail(); ?>" class="img-circle" alt="User Image" />
							<p>
								<?php echo $sf_user->getGuardUser(); ?>
								<small>Member since <?php echo project_date($sf_user->getGuardUser()->getCreatedAt()); ?></small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="col-xs-4 text-center">
								<a href="<?php echo url_for('profile/index'); ?>"><?php echo __('Профиль'); ?></a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="<?php echo url_for('profile/avatar'); ?>"><?php echo __('Фото'); ?></a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="<?php echo url_for('profile/password'); ?>"><?php echo __('Пароль'); ?></a>
							</div>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo url_for('profile/index'); ?>" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo url_for('auth/signout'); ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
            </ul>
		</div>
		<?php endif; ?>
	</nav>
</header>
