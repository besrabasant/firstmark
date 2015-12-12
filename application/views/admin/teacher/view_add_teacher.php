<!-- BEGIN CONTENT-->
<div id="content">
  <section>
    <div class="section-body">
        <?php
          ///ALERT BOX FOR STATUS MESSAGES///

          if ( $this -> session -> flashdata('status') != NULL ):
             ?> 
           <div class="alert alert-<?= $this -> session -> flashdata('status') ?> alert-callout fade in" role="alert">
             <a href="#" class=" pull-right btn ink-reaction btn-icon-toggle btn-primary-dark close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>
             <strong><?php echo $this -> session -> flashdata('msg'); ?></strong>
           </div>
           <?php
        endif;
      ?>


      <!-- BEGIN ADD STUDENT FORM -->
      <div class="row">							
        <div class="col-md-12">
          <div class="card card-underline">
            <div class="card-head">
              <ul class="nav nav-tabs pull-right tabs-warning ">
                <li <?= ($active_tab == 'teacher') ? 'class="active"' : '' ?> ><a>Teacher Information</a></li>
                <li <?= ($active_tab == 'document') ? 'class="active"' : '' ?> ><a>Documents</a></li>
              </ul>
              <header class="text-primary text-xxl">Add New Teacher</header>
            </div>
            <div class="card-body floating-label">
                <?php echo form_open_multipart('teacher/add', array( 'class' => 'form' )); ?>
              <div class="row">
                <div class="col-md-6">
                  <header class="text-primary text-lg text-bold">Personal Details :</header>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="reg_no" type="text" class="form-control" readonly="" id="reg_no" value="<?= $new_reg_no ?>">
                    <label for="reg_no"> New Teacher Id</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="entry_date" type="text" class="form-control date-picker" id="entry_date" value="<?php echo (set_value('entry_date') != NULL) ? set_value('entry_date') : date('d/m/Y'); ?>">
                    <label for="entry_date">Entry Date</label>
                  </div>
                </div>
              </div>
              <!--//////// TEACHER DETAILS START  /////////-->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo set_value('first_name'); ?>">
                    <?php echo form_error('first_name'); ?>
                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group control-width-normal">
                    <div class="input-group date" id="date-of-birth">
                      <div class="input-group-content">
                        <input name="d_o_b" class="form-control date-picker" type="text"  value="<?php echo set_value('d_o_b'); ?>" >
                        <?php echo form_error('d_o_b'); ?>
                        <label for="d_o_b">Date of Birth <span class="text-danger">*</span></label>
                      </div>
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <select name="gender" class="form-control select2-list">
                      <option value=""></option>
                      <option value="0" <?php echo set_select('gender', '0'); ?> >MALE</option>
                      <option value="1" <?php echo set_select('gender', '1'); ?> >FEMALE</option>
                      <option value="2" <?php echo set_select('gender', '2'); ?> >TRANSGENDER</option>
                    </select>
                    <?php echo form_error('gender'); ?>
                    <label for="gender">Gender <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <select name="teacher_depart_id" class="form-control select2-list">
                      <option value=""></option>
                      <option value="1"  <?php echo set_select('teacher_depart_id', '1'); ?>>Department1</option>
                      <option value="2" <?php echo set_select('teacher_depart_id', '2'); ?>>Department2</option>
                      <option value="3" <?php echo set_select('teacher_depart_id', '3'); ?>>Department3</option>
                      <option value="4" <?php echo set_select('teacher_depart_id', '4'); ?>>Department4</option>
                    </select>
                    <?php echo form_error('teacher_depart_id'); ?>
                    <label for="teacher_depart_id">Department <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="children_count" id="children_count" class="form-control" type="number" min="0" value="<?php echo set_value('children_count'); ?>" >
                    <label for="children_count">Children Count</label>
                  </div>
                  <div class="form-group">
                    <input name="spouse_name" id="spouse_name" class="form-control" type="text"  value="<?php echo set_value('spouse_name'); ?>" >
                    <label for="spouse_name">Spouse Name</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="middle_name" type="text" class="form-control" id="middle_name" value="<?php echo set_value('middle_name'); ?>">
                    <label for="middle_name">Middle Name</label>
                  </div>
                  <div class="form-group">
                    <input name="birth_place" type="text" class="form-control" id="birth_place" value="<?php echo set_value('birth_place'); ?>">
                    <label for="birth_place">Birth Place</label>
                  </div>
                  <div class="form-group">
                    <input name="religion" type="text" class="form-control" id="religion" value="<?php echo set_value('religion'); ?>">
                    <label for="religion">Religion</label>
                  </div>
                  <div class="form-group">
                    <select name="teacher_position" class="form-control select2-list">
                      <option value=""></option>
                      <option value="senior" <?php echo set_select('teacher_position', 'senior'); ?>>Senior</option>
                      <option value="junior" <?php echo set_select('teacher_position', 'junior'); ?>>Junior</option>
                    </select>
                    <?php echo form_error('teacher_position'); ?>
                    <label for="teacher_position">Position <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="father_name" id="father_name" class="form-control" type="text"  value="<?php echo set_value('father_name'); ?>" >
                    <?php echo form_error('father_name'); ?>
                    <label for="father_name">Father Name <span class="text-danger">*</span></label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo set_value('last_name'); ?>">
                    <?php echo form_error('last_name'); ?>
                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <select name="blood_group" class="form-control select2-list">
                      <option value=""></option>
                      <option value="O+" <?php echo set_select('blood_group', 'O+'); ?> >O+</option>
                      <option value="O-" <?php echo set_select('blood_group', 'O-'); ?> >O-</option>
                      <option value="A+" <?php echo set_select('blood_group', 'A+'); ?>>A+</option>
                      <option value="A-" <?php echo set_select('blood_group', 'A-'); ?> >A-</option>
                      <option value="B+" <?php echo set_select('blood_group', 'B+'); ?> >B+</option>
                      <option value="B-" <?php echo set_select('blood_group', 'B-'); ?> >B-</option>
                      <option value="AB+" <?php echo set_select('blood_group', 'AB+'); ?> >AB+</option>
                      <option value="AB-" <?php echo set_select('blood_group', 'AB-'); ?> >AB-</option>
                    </select>
                    <?php echo form_error('blood_group'); ?>
                    <label for="blood_group">Blood Group <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="nationality" id="nationality" class="form-control" type="text"  value="<?php echo set_value('nationality'); ?>" >
                    <?php echo form_error('nationality'); ?>
                    <label for="nationality">Nationality <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <select name="marital_status" class="form-control select2-list">
                      <option value=""></option>
                      <option value="single" <?php echo set_select('marital_status', 'single'); ?>>Single</option>
                      <option value="married" <?php echo set_select('marital_status', 'married'); ?>>Married</option>
                      <option value="divorced" <?php echo set_select('marital_status', 'divorced'); ?>>Divorced</option>
                    </select>
                    <?php echo form_error('marital_status'); ?>
                    <label for="marital_status">Marital Status <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="mother_name" id="mother_name" class="form-control" type="text"  value="<?php echo set_value('mother_name'); ?>" >
                    <?php echo form_error('mother_name'); ?>
                    <label for="mother_name">Mother Name <span class="text-danger">*</span></label>
                  </div>
                </div>
                <!--fourth column start-->
                <div class="col-md-3">
                  <div class="card width-7 center-block" >
                    <div class="card-head card-head-sm text-center">
                      <header class='text-primary text-xxl'>TEACHER'S IMAGE</header>
                    </div><!--end .card-head -->
                    <div class="card-body height-6 style-default-light">
                      <img id="add-image-preview" src="" class="center-block width-5 height-5 border-gray border-dashed " style="display:none;">
                      <div id="add-image-field" class="center-block border-gray border-dashed width-5 height-5 " >
                        <div class="text-center text-default-light width-5 height-5 v-middle">IMAGE PREVIEW</div>
                      </div> 
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                      <div class="card-actionbar-row">
                        <a id="remove-image-btn" class=" center-block btn btn-raised btn-danger ink-reaction" style="display: none;" href="javascript:void(0);">Remove Image</a>
                        <a id="add-image-btn" class=" center-block btn btn-raised btn-primary ink-reaction" href="javascript:void(0);">Add Image</a>
                      </div>
                    </div>
                    <input name="image_name" id="add-image" type="file" class="form-control" style=" margin-top: -37px; visibility: hidden;">  
                  </div><?php echo form_error('teacher_image_name'); ?>
                </div>
                <!--fourth column end-->
              </div>
              <!--row end-->
              <div class="row">
                <div class="col-md-12">
                  <header class="text-primary text-lg text-bold">Contact Details :</header>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input name="phone" id="phone" class="form-control" type="text" maxlength="10"  value="<?php echo set_value('phone'); ?>">
                    <?php echo form_error('phone'); ?>
                    <label for="phone">Phone Number <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="alt_phone" id="alt_phone" class="form-control" type="text" maxlength="10"  value="<?php echo set_value('alt_phone'); ?>">
                    <label for="alt_phone">Alternate Phone Number</label>
                  </div>
                  <div class="form-group">
                    <input name="email" id="email" class="form-control" type="text"  value="<?php echo set_value('email'); ?>" >
                    <?php echo form_error('email'); ?>
                    <label for="email">Email <span class="text-danger">*</span></label>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <textarea name="address" id="address" class="form-control" rows="5" style="resize: none;"><?php echo set_value('address'); ?></textarea>
                      <?php echo form_error('address'); ?>
                      <label for="address">Address <span class="text-danger">*</span></label>
                    </div>                
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <header class="text-primary text-lg text-bold">Professional Details :</header>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input name="qualification" id="qualification" class="form-control" type="text"  value="<?php echo set_value('qualification'); ?>" >
                    <?php echo form_error('qualification'); ?>
                    <label for="qualification">Qualification <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <input name="experience" id="experience" class="form-control" type="number" min="0" value="<?php echo set_value('experience'); ?>" >
                    <?php echo form_error('experience'); ?>
                    <label for="experience">Experience( in Years ) <span class="text-danger">*</span></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <textarea name="experience_details" id="experience_details" class="form-control" rows="5" ><?php echo set_value('experience_details'); ?></textarea>
                    <?php echo form_error('experience_details'); ?>
                    <label for="experience">Experience Details <span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>


            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button name="submit" type="submit" class="pull-right col-sm-3 btn btn-lg ink-reaction btn-raised btn-primary">
                  <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                  Upload Documents
                </button>
              </div>
            </div>
          </div>


          <?php echo form_close(); ?>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END ADD STUDENT FORM -->

    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->