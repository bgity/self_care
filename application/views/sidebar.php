<div class="page-sidebar navbar-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
	<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
	<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
	<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" ng-class="{'page-sidebar-menu-closed': settings.layout.pageSidebarClosed}">
		<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
		<li class="sidebar-search-wrapper">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
			<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
			<form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
				<a href="javascript:;" class="remove">
				<i class="icon-close"></i>
				</a>
				<div class="input-group">
					<!--<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>-->
				</div>
			</form>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>
		<li class="start" ng-class="{active:uiRouterState.current.name == 'dietplan' || uiRouterState.current.name == 'dietPlanList' || uiRouterState.current.name == 'dietChart'}">
			<a href="#/dietplan">
			<i class="icon-home"></i>
			<span class="title">Diet Plan</span>
			</a>
		</li>
		<li ng-class="{active:uiRouterState.current.name == 'createDiet'}">
			<a href="#/createDiet">
			<i class="icon-settings"></i>
			<span class="title">Create Plans</span>
			</a>
		</li>
		<li>
			<a href="javascript:;">
			<i class="icon-wrench"></i>
			<span class="title">Masters</span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="#/heightWeight">
						<i class="icon-puzzle"></i> Height Weight Master
					</a>
				</li>
				<li>
					<a href="#/foodMaster">
						<i class="icon-drawer"></i> Food Master
					</a>
				</li>
				<li>
					<a href="#/foodItemMaster">
						<i class="icon-layers"></i> Food Item Master
					</a>
				</li>
				<!--<li>
					<a href="#/uomMaster">
						<i class="icon-refresh"></i> UOM Master
					</a>
				</li>-->
				<li>
					<a href="#/bodyWeightMaster">
						<i class="icon-cursor-move"></i> Body Weight Master
					</a>
				</li>
				<!--<li>
					<a href="#/frameSizeMaster">
						<i class="icon-vector"></i> Frame Size Master
					</a>
				</li>-->
				<li>
					<a href="#/foodPrefMaster">
						<i class="icon-note"></i> Food Pref Master
					</a>
				</li>
				<li>
					<a href="#/intakeMaster">
						<i class="icon-crop"></i> Intake Master
					</a>
				</li>
				<li>
					<a href="#/diseaseRecom">
						<i class="icon-feed"></i> Disease Recomm.
					</a>
				</li>
				<li>
					<a href="#/exerciseMaster">
						<i class="icon-vector"></i> Exercise Master
					</a>
				</li>
			</ul>
		</li>
		
	</ul>
	
	<!-- END SIDEBAR MENU -->
</div>	