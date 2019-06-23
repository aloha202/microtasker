<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo $sf_user->getGuardUser()->getProfile()->getImageThumbnail(); ?>" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p style='font-size: 90%'><?php echo $sf_user->getGuardUser(); ?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<?php /*
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..."/>
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
		 * 
		 */ ?>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="treeview">
				<a href="/">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span> 
				</a>
			</li>
			<li>
				<a href="<?php echo url_for('preset/listMy'); ?>">
					<i class="fa fa-wrench"></i> <span>Заготовки</span> 
				</a>
			</li>
			<li>
				<a href="<?php echo url_for('thread/listMy'); ?>">
					<i class="fa fa-wrench"></i> <span>Ветки</span> 
				</a>
			</li>			
			<li>
				<a href="<?php echo url_for('backlog/index'); ?>">
					<i class="fa fa-wrench"></i> <span>Backlog</span> 
				</a>
			</li>					
			<li>
				<a href="<?php echo url_for('report/index'); ?>">
					<i class="fa fa-thumbs-o-up"></i> <span>Отчеты</span> 
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>