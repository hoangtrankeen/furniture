<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">Royal</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">Chandler</a></h5>
			<h5 class="position">Administrator</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
					<div class="control-item"><a href="#"><i class="fa fa-sign-out"></i> Log out</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">

			<ul class="menu js__accordion">
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-table"></i><span>Catalog</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('product.index')}}">Product</a></li>
						<li><a href="{{route('category.index')}}">Category</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<ul class="menu js__accordion">
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-table"></i><span>Blog</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('post.index')}}">Post</a></li>
						<li><a href="{{route('topic.index')}}">Category</a></li>
						<li><a href="{{route('tag.index')}}">Tag</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<ul class="menu js__accordion">
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-table"></i><span>Attribute</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('attribute.index')}}">Attribute Product</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<ul class="menu js__accordion">
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-table"></i><span>Sale</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('order.index')}}">Order</a></li>
						<li><a href="">Shipping</a></li>
						<li><a href="">Invoice</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>

		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>