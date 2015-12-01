<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="#">
              <span class="text-lg text-bold text-primary ">MAIN&nbsp;MENU</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
              <a href="<?php echo base_url('dashboard');?>" <?php echo ($this->session->flashdata('curr_menu_item')=='dashboard')? 'class="active"':''; ?>>
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN STUDENT -->
						<li class="gui-folder">
							<a <?php echo ($this->session->flashdata('curr_menu_item')=='student')? 'class="active"':''; ?>>
								<div class="gui-icon"><i class="md md-person"></i></div>
								<span class="title">Student</span>
							</a>
							<!--start submenu -->
							<ul>
                <li><a href="<?php echo base_url('student/add'); ?>" ><span class="title">Add Student</span></a></li>
                <li><a href="" ><span class="title">Add bulk Students</span></a></li>
								<li><a href="<?php echo base_url('student/view'); ?>" ><span class="title">View Students</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END STUDENT -->
            
            <!-- BEGIN PARENT -->
						<li class="gui-folder">
							<a <?php echo ($this->session->flashdata('curr_menu_item')=='parent')? 'class="active"':''; ?>>
								<div class="gui-icon"><i class="md md-people-outline"></i></div>
								<span class="title">Parents</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="" ><span class="title">Add Parents</span></a></li>
                <li><a href="" ><span class="title">Add bulk Parents</span></a></li>
								<li><a href="" ><span class="title">View Parents</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END PARENT -->

						<!-- BEGIN TEACHER -->
            <li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-group"></i></div>
								<span class="title">Teacher</span>
              </a>
                <!--start submenu -->
              <ul>
                  <li><a href="" ><span class="title">Add Teacher</span></a></li>
                  <li><a href="" ><span class="title">Add bulk Teachers</span></a></li>
                  <li><a href="" ><span class="title">View Teachers</span></a></li>
              </ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END TEACHER -->
            
            <!-- BEGIN SCHOOL -->
            <li class="gui-folder">
							<a <?php echo ($this->session->flashdata('curr_menu_item')=='school')? 'class="active"':''; ?>>
								<div class="gui-icon"><i class="md md-school"></i></div>
								<span class="title">School</span>
              </a>
                <!--start submenu -->
              <ul>
                  <li><a href="<?php echo base_url('school/manage_class'); ?>" ><span class="title">Manage Classes</span></a></li>
                  <li><a href="" ><span class="title">Add New Section</span></a></li>
                  <li><a href="" ><span class="title">Add New Dormitory</span></a></li>
              </ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END SCHOOL -->
            
            
            <!-- BEGIN SETTINGS -->
						<li>
							<a href="" >
								<div class="gui-icon"><i class="md md-settings"></i></div>
								<span class="title">Settings</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END SETTINGS -->

						

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->
          <div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2015</span> <strong>Firstmark School</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->