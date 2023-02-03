
<div class="page-sidebar-wrapper">	
	<!-- BEGIN SIDEBAR -->	
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->	
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->	
	<div class="page-sidebar navbar-collapse collapse">		
		<!-- BEGIN SIDEBAR MENU -->		
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->		
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->		
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->		
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->		
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->		
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->		
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">			
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->			
			<li class="sidebar-toggler-wrapper hide">				
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->				
				<div class="sidebar-toggler">					
					<span></span>					
				</div>				
				<!-- END SIDEBAR TOGGLER BUTTON -->				
			</li>			
			
			<li class="nav-item <?=($this->uri->segment(2)=='')?'active open':''?>">				
				<a href="<?php echo base_url();?>admin" class="nav-link nav-toggle">					
					<i class="icon-home"></i>					
					<span class="title">Dashboard</span>					
					<span class="selected"></span>					
				</a>				
			</li>			
			<li class="nav-item <?=($this->uri->segment(2)=='manage_admin')?'active open':''?>">			
				<a href="javascript:void(0);" class="nav-link nav-toggle">	
					<i class="icon-layers"></i>				
					<span class="title">Admin Management</span>			
					<span class="arrow"></span>			
				</a>			
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='add' && $this->uri->segment(2)=='manage_admin')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/manage_admin/add" class="nav-link ">
							<span class="title">Add Admin</span>	
						</a>
					</li>		
					<li class="nav-item <?=($this->uri->segment(2)=='manage_admin' && $this->uri->segment(3)=='')?'active open':''?>">					
						<a href="<?php echo base_url() ?>admin/manage_admin" class="nav-link ">
							<span class="title">Manage Admin</span>					
						</a>				
					</li>			
				</ul>	
			</li>	
			<li class="nav-item <?=($this->uri->segment(2)=='manage_user')?'active open':''?>">			
				<a href="javascript:void(0);" class="nav-link nav-toggle">	
					<i class="icon-layers"></i>				
					<span class="title">User Management</span>			
					<span class="arrow"></span>			
				</a>			
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='seller' && $this->uri->segment(2)=='manage_user')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/manage_user/seller" class="nav-link ">
							<span class="title">Sellers</span>	
						</a>
					</li>		
					<li class="nav-item <?=($this->uri->segment(3)=='buyer' && $this->uri->segment(2)=='manage_user')?'active open':''?>">					
						<a href="<?php echo base_url() ?>admin/manage_user/buyer" class="nav-link ">
							<span class="title">Buyers</span>					
						</a>				
					</li>			
				</ul>	
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='buyer')?'active open':''?>">				
				<a href="javascript:void(0);" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Buyer Management</span>			
					<span class="arrow"></span>				
				</a>	
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='applications' && $this->uri->segment(2)=='buyer')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/applications" class="nav-link ">
							<span class="title">Buyer Applications</span>	
						</a>
					</li>
					<li class="nav-item <?=($this->uri->segment(3)=='notapprovedapplications' && $this->uri->segment(2)=='buyer')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/notapprovedapplications" class="nav-link ">
							<span class="title">Not Approved Applications</span>	
						</a>
					</li>				
				</ul>
			</li>
			<li class="nav-item <?=($this->uri->segment(2)=='listing')?'active open':''?>">				
				<a href="<?php echo base_url() ?>admin/listing" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Property Management</span>					
					<span class="selected"></span>			
				</a>				
			</li>
			<!-- <li class="nav-item <?=($this->uri->segment(2)=='reporting')?'active open':''?>">				
				<a href="javascript:void(0);" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Reporting</span>			
					<span class="arrow"></span>
				</a>	
				<ul class="sub-menu">		
					<li class="nav-item <?=($this->uri->segment(3)=='draft_properties' && $this->uri->segment(2)=='reporting')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/applications" class="nav-link ">
							<span class="title">Draft Properties</span>	
						</a>
					</li>				
					<li class="nav-item <?=($this->uri->segment(3)=='publish_properties' && $this->uri->segment(2)=='reporting')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/applications" class="nav-link ">
							<span class="title">Published Properties</span>	
						</a>
					</li>
					<li class="nav-item <?=($this->uri->segment(3)=='waitingforapproval_properties' && $this->uri->segment(2)=='reporting')?'active open':''?>">
						<a href="<?php echo base_url() ?>admin/buyer/applications" class="nav-link ">
							<span class="title">Properties Waiting for Approval</span>	
						</a>
					</li>
				</ul>
			</li> -->
			<li class="nav-item <?=($this->uri->segment(2)=='reporting')?'active open':''?>">				
				<a href="<?php echo base_url() ?>admin/reporting" class="nav-link nav-toggle">					
					<i class="icon-layers"></i>					
					<span class="title">Reporting</span>					
					<span class="selected"></span>			
				</a>				
			</li>
		</ul>	
		<!-- END SIDEBAR MENU -->	
		<!-- END SIDEBAR MENU -->	
	</div>
	<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->