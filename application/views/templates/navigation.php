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
        <a href="<?php echo base_url('dashboard'); ?>" <?php echo ($this -> session -> flashdata('curr_menu_item') == 'dashboard') ? 'class="active"' : ''; ?>>
          <div class="gui-icon"><i class="md md-home"></i></div>
          <span class="title">Dashboard</span>
        </a>
      </li><!--end /menu-li -->
      <!-- END DASHBOARD -->
      <?php if ( is_curr_user_role('admin') ): ?>
           <!-- BEGIN STUDENT -->
           <li class="gui-folder">
             <a <?php echo ($this -> session -> flashdata('curr_menu_item') == 'student') ? 'class="active"' : ''; ?>>
               <div class="gui-icon"><i class="md md-person"></i></div>
               <span class="title">Student</span>
             </a>
             <!--start submenu -->
             <ul>
               <li><a href="<?php echo base_url('student/add'); ?>" ><span class="title">Add New Student</span></a></li>
               <li><a href="<?php echo base_url('student/view'); ?>" ><span class="title">View All Students</span></a></li>
             </ul><!--end /submenu -->
           </li><!--end /menu-li -->
           <!-- END STUDENT -->

           <!-- BEGIN TEACHER -->
           <li class="gui-folder">
             <a <?php echo ($this -> session -> flashdata('curr_menu_item') == 'teacher') ? 'class="active"' : ''; ?>>
               <div class="gui-icon"><i class="md md-group"></i></div>
               <span class="title">Teacher</span>
             </a>
             <!--start submenu -->
             <ul>
               <li><a href="<?php echo base_url('teacher/add'); ?>"><span class="title">Add Teacher</span></a></li>
               <li><a href="<?php echo base_url('teacher/view'); ?>" ><span class="title">View All Teachers</span></a></li> 
             </ul><!--end /submenu -->
           </li><!--end /menu-li -->
           <!-- END TEACHER -->

           <!-- BEGIN SCHOOL -->
           <li class="gui-folder">
             <a <?php echo ($this -> session -> flashdata('curr_menu_item') == 'school') ? 'class="active"' : ''; ?>>
               <div class="gui-icon"><i class="md md-account-balance"></i></div>
               <span class="title">School</span>
             </a>
             <!--start submenu -->
             <ul>
               <li><a href="<?php echo base_url('class'); ?>" ><span class="title">Manage Classes</span></a></li>
               <li><a href="<?php echo base_url('section');?>" ><span class="title">Manage Section</span></a></li>
             </ul><!--end /submenu -->
           </li><!--end /menu-li -->
           <!-- END SCHOOL -->
           
           <!-- BEGIN ACADEMICS -->
           <li class="gui-folder">
             <a <?php echo ($this -> session -> flashdata('curr_menu_item') == 'academics') ? 'class="active"' : ''; ?>>
               <div class="gui-icon"><i class="md md-school"></i></div>
               <span class="title">Academics</span>
             </a>
             <!--start submenu -->
             <ul>
               <li><a href='<?php echo base_url('subject');?>' ><span class="title">Manage Subjects</span></a></li>
               <li><a href='<?php echo base_url('subject');?>' ><span class="title">Manage Subjects</span></a></li>
             </ul><!--end /submenu -->
           </li><!--end /menu-li -->
           <!-- END ACADEMICS -->

        <?php endif; ?>


      <!-- BEGIN SETTINGS -->
      <li>
        <a href="<?php echo base_url('settings');?>" >
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