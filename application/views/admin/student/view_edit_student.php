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
                <li <?= ($active_tab == 'student') ? 'class="active"' : '' ?> ><a>Student Information</a></li>
                <li <?= ($active_tab == 'parent') ? 'class="active"' : '' ?> ><a>Parents Information</a></li>
                <li <?= ($active_tab == 'document') ? 'class="active"' : '' ?> ><a>Documents</a></li>
              </ul>
              <header class="text-primary text-xxl">Edit Student : <span class="text-warning"><?=$student->reg_id;?></span> </header>
            </div>
            <div class="card-body floating-label">
                <?php echo form_open_multipart('student/update', array( 'class' => 'form' )); ?>
              <input name="student_id" type="hidden" value="<?=$student->student_id;?>">
              <input name="hidden_action" type="hidden" value="">
              <div class="row">
                <div class="col-md-6">
                  <header class="text-primary text-lg text-bold">Personal Details :</header>
                </div>
              </div>
              <!--//////// STUDENT DETAILS START  /////////-->
              <div class="row">
                <!--first column start-->
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo $student->first_name; ?>">
                    <?php echo form_error('first_name'); ?>
                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                  </div>                          
                  <div class="form-group control-width-normal">
                    <div class="input-group date" id="date-of-birth">
                      <div class="input-group-content">
                        <input name="d_o_b" class="form-control date-picker" type="text"  value="<?= $student->d_o_b; ?>" >
                        <?php echo form_error('d_o_b'); ?>
                        <label for="d_o_b">Date of Birth <span class="text-danger">*</span></label>
                      </div>
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <select name="gender" class="form-control select2-list">
                      <option value=""></option>
                      <option value="0" <?php if($student->gender==0){ echo set_select('gender', '0',TRUE); } ?> >MALE</option>
                      <option value="1" <?php if($student->gender==1){ echo set_select('gender', '1',TRUE); } ?> >FEMALE</option>
                      <option value="2" <?php if($student->gender==2){ echo set_select('gender', '2',TRUE); } ?> >TRANSGENDER</option>
                    </select>
                    <?php echo form_error('gender'); ?>
                    <label for="gender">Gender <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <select name="class_id" class="form-control select2-list">
                      <option value=""></option>
                        <?php foreach ( $class_list as $class ): ?>
                           <option value="<?= $class -> class_id ?>"  <?php if($student->class_id==$class->class_id){ echo set_select('class_id', $class -> class_id,TRUE);} ?> ><?= $class -> class_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('class_id'); ?>
                    <label for="class_id">Class <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-group">
                    <select name="transport_id" class="form-control select2-list">
                      <option value=""></option>
                      <option value="A" <?php if($student->transport_id=='A'){ echo set_select('transport_id', 'A',TRUE);} ?> >A</option>
                      <option value="B" <?php if($student->transport_id=='B'){ echo set_select('transport_id', 'B',TRUE);} ?> >B</option>
                      <option value="C" <?php if($student->transport_id=='C'){ echo set_select('transport_id', 'C',TRUE);} ?> >C</option>
                      <option value="D" <?php if($student->transport_id=='D'){ echo set_select('transport_id', 'D',TRUE);} ?> >D</option>
                    </select>
                    <label for="transport_id">Transport ID</label>
                  </div>                          
                </div>
                <!--first column end-->

                <!--second column start-->
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="middle_name" type="text" class="form-control" id="middle_name" value="<?php echo $student->middle_name; ?>">
                    <label for="middle_name">Middle Name</label>
                  </div>
                  <div class="form-group">
                    <input name="birth_place" type="text" class="form-control" id="birth_place" value="<?php echo $student->birth_place; ?>">
                    <label for="birth_place">Birth Place </label>
                  </div>
                  <div class="form-group">
                    <input name="religion" type="text" class="form-control" id="religion" value="<?php echo $student->religion; ?>">
                    <label for="religion">Religion</label>
                  </div>

                  <div class="form-group">
                    <select name="section_id" class="form-control select2-list">
                      <option value=""></option>
                      <?php foreach ( $section_list as $section ): ?>
                           <option value="<?= $section -> section_id ?>"  <?php if($student->section_id==$section->section_id){ echo set_select('section_id', $section -> section_id,TRUE);} ?> ><?= $section -> section_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('section_id'); ?>
                    <label for="section_id">Section ID <span class="text-danger">*</span></label>
                  </div>

                  <div class="form-group">
                    <select name="dormitory_id" class="form-control select2-list">
                      <option value=""></option>
                      <option value="A" <?php if($student->dormitory_id=='A'){ echo set_select('dormitory_id', 'A', TRUE);} ?> >A</option>
                      <option value="B" <?php if($student->dormitory_id=='B'){ echo set_select('dormitory_id', 'B', TRUE);} ?> >B</option>
                      <option value="C" <?php if($student->dormitory_id=='C'){ echo set_select('dormitory_id', 'C', TRUE);} ?> >C</option>
                      <option value="D" <?php if($student->dormitory_id=='D'){ echo set_select('dormitory_id', 'D', TRUE);} ?> >D</option>
                    </select>
                    <label for="dormitory_id">Dormitory ID</label>
                  </div>


                </div>
                <!--second column end-->
                <!--third column start-->
                <div class='col-md-3'>
                  <div class="form-group">
                    <input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo $student->last_name; ?>">
                    <?php echo form_error('last_name'); ?>
                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                  </div>

                  <div class="form-group">
                    <select name="blood_group" class="form-control select2-list">
                      <option value=""></option>
                      <option value="O+"  <?php if($student->blood_group=='O+'){ echo set_select('blood_group', 'O+', TRUE); } ?> >O+</option>
                      <option value="O-"  <?php if($student->blood_group=='O-'){ echo set_select('blood_group', 'O-', TRUE); } ?> >O-</option>
                      <option value="A+"  <?php if($student->blood_group=='A+'){ echo set_select('blood_group', 'A+', TRUE); } ?>>A+</option>
                      <option value="A-"  <?php if($student->blood_group=='A-'){ echo set_select('blood_group', 'A-', TRUE); } ?> >A-</option>
                      <option value="B+"  <?php if($student->blood_group=='B+'){ echo set_select('blood_group', 'B+', TRUE); } ?> >B+</option>
                      <option value="B-"  <?php if($student->blood_group=='B-'){ echo set_select('blood_group', 'B-', TRUE); } ?> >B-</option>
                      <option value="AB+" <?php if($student->blood_group=='AB+'){ echo set_select('blood_group', 'AB+', TRUE);} ?> >AB+</option>
                      <option value="AB-" <?php if($student->blood_group=='AB-'){ echo set_select('blood_group', 'AB-', TRUE);} ?> >AB-</option>
                    </select>
                    <?php echo form_error('blood_group'); ?>
                    <label for="blood_group">Blood Group <span class="text-danger">*</span></label>    
                  </div>

                  <div class="form-group">
                    <input name="nationality" type="text" class="form-control" id="nationality" value="<?php $student->nationality; ?>">
                    <label for="nationality">Nationality</label>
                  </div>

                  <div class="form-group">
                    <input name="roll_no" type="text" class="form-control" id="roll_no" value="<?php echo $student->roll_no; ?>">
                    <?php echo form_error('roll_no'); ?>
                    <label for="roll_no">Roll No. <span class="text-danger">*</span></label>
                  </div>



                </div>
                <!--third column end-->
                <!--fourth column start-->
                <div class="col-md-3">
                  <div class="card width-7 center-block" >
                    <div class="card-head card-head-sm text-center">
                      <header class='text-primary text-xxl'>STUDENT'S IMAGE</header>
                    </div><!--end .card-head -->
                    <div class="card-body height-6 style-default-light">
                      <img id="add-image-preview" src="<?=base_url('uploads/student/photo/'.$student->image_name);?>" class="center-block width-5 height-5 border-gray border-dashed " >
                      <div id="add-image-field" class="center-block border-gray border-dashed width-5 height-5 " style="display:none;" >
                        <div class="text-center text-default-light width-5 height-5 v-middle">IMAGE PREVIEW</div>
                      </div> 
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                      <div class="card-actionbar-row">
                        <a id="remove-image-btn" class=" center-block btn btn-raised btn-danger ink-reaction"  href="javascript:void(0);">Remove Image</a>
                        <a id="add-image-btn" class=" center-block btn btn-raised btn-primary ink-reaction" style="display: none;" href="javascript:void(0);">Add Image</a>
                      </div>
                    </div>
                    <input name="image_name" id="add-image" type="file" class="form-control" style=" margin-top: -37px; visibility: hidden;">
                    <input name="prev_image_name" type="hidden" value="<?=$student->image_name;?>">
                  </div><?php echo form_error('image_name'); ?>
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
                    <input name="phone" id="phone" class="form-control" type="text" maxlength="10" value="<?php echo $student->phone; ?>">
                    <?php echo form_error('phone'); ?>
                    <label for="phone">Phone Number <span class="text-danger">*</span></label>
                  </div>
                  
                  <div class="form-group">
                    <input name="alt_phone" id="alt_phone" class="form-control" type="text" maxlength="10" value="<?php echo $student->alt_phone; ?>">
                    <label for="alt_phone">Alternate Phone Number</label>
                  </div>
                  
                  <div class="form-group">
                    <input name="email" id="email" class="form-control" type="text"  value="<?php echo $student->email; ?>" >
                    <?php echo form_error('email'); ?>
                    <label for="email">Email <span class="text-danger">*</span></label>
                  </div>

                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <textarea name="address" id="address" class="form-control" rows="5" style="resize: none;"><?php echo $student->address; ?></textarea>
                    <?php echo form_error('address'); ?>
                    <label for="address">Address <span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>


            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <a id="action" style=" margin: 0 10px;" role="button" class="pull-right col-sm-3  btn btn-lg ink-reaction btn-raised btn-default" data-action="editParent">
                  <span class="pull-right"><i class="fa fa-pencil"></i></span>
                  Edit Parent Details
                </a>
                <button id="form-submit" name="submit" type="submit" class="pull-right col-sm-2  btn btn-lg ink-reaction btn-raised btn-info">
                  <span class="pull-right"><i class="fa fa-save"></i></span>
                  Save
                </button>
              </div>
            </div>
          </div><!--end .card -->
          <?php echo form_close(); ?>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END ADD STUDENT FORM -->

    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->