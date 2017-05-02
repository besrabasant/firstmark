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
              <header class="text-primary text-xxl">Edit Student : <span class="text-warning"><?= $student -> reg_id; ?></span> </header>
            </div>
            <div class="card-body floating-label">
                <?php echo form_open('parent/update', array( 'class' => 'form' )); ?>
              <input name="reg_no" type="hidden"  id="reg_no" value="<?= $student -> reg_id; ?>">
              <input name="parent_id" type="hidden"  id="reg_no" value="<?= $parent -> parent_id; ?>">
              <input name="hidden_action" type="hidden" value="">
              <!--//////// PARENTS DETAILS START  /////////-->
              <div class="row tabs-left style-default">
                <ul data-toggle="tabs" class="nav nav-tabs tabs-info">
                  <li ><a href="#existing"><h4 class="text-bold">Select Exiting Parents</h4></a></li>
                  <li class="active"><a href="#new"><h4 class="text-bold">Edit Parent Details</h4></a></li>
                  <li><a href="<?php echo base_url('parent/create'); ?>"><h4 class="text-bold">Create New Parents</h4></a></li>
                </ul>
                <div class="tab-content style-default-bright">
                    <?php //////////ALREADY EXISTING PARENTS///////////////  ?>
                  <div id="existing" class="tab-pane ">
                    <div class="col-md-12" style="padding-left: 20px;">
                      <div class="row">
                        <div class="col-md-2">
                          <header><h3 class='text-primary'>Search By:</h3></header>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <select name="search_param" id="search_param" class="form-control select2-list">
                              <option value=""></option>
                              <option value="student" <?php echo set_select('search_param', 'student'); ?> >Student ID</option>
                              <option value="email" <?php echo set_select('search_param', 'email'); ?> >Parent's Email</option>
                              <option value="phone" <?php echo set_select('search_param', 'phone'); ?> >Parent's Phone No.</option>
                            </select>
                            <label for="search_param">Search Options</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <input name="search_value" type="text" class="form-control " id="search_value" value="<?php echo set_value('search_value'); ?>">
                            <label for="search_value">Search Value</label>
                          </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 15px;">
                          <a id="search-parents-submit" role="button" class="width-4 btn ink-reaction btn-raised btn-primary v-middle" >
                            <span class="pull-left"><i class="fa fa-search"></i></span>
                            Search
                          </a>
                        </div>
                      </div>
                      <!--end row-->
                      <div class="row">
                        <div class="col-md-12">
                          <header><h3 class='text-primary'>Search Results:</h3></header>
                        </div>
                        <div class="col-md-12" style="min-height: 100px;">
                          <table id="parent-search-results" class="table table-striped table-condensed no-margin">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Student Id</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Phone No.</th>
                                <th>Email Id</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php //////////ALREADY EXISTING PARENTS///////////////  ?>
                  <?php /////// CREATE NEW PARENTS /////////// ?>
                  <div id="new" class="tab-pane active">
                    <div class="col-md-12">
                      <!--start row-->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="father_name" type="text" class="form-control" id="father_name" value="<?php echo $parent -> father_name; ?>">
                            <?php echo form_error('father_name'); ?>
                            <label for="father_name">Father's Name <span class="text-danger">*</span></label>
                          </div>
                          <div class="form-group">
                            <input name="father_occp" type="text" class="form-control" id="father_occp" value="<?php echo $parent -> father_occp; ?>">
                            <label for="father_occp">Father's Occupation</label>
                          </div>
                          <div class="form-group control-width-normal">
                            <div class="input-group date" id="date-of-birth">
                              <div class="input-group-content">
                                <input name="father_d_o_b" class="form-control date-picker" type="text"  value="<?php echo $parent -> father_d_o_b; ?>" >
                                <label for="father_d_o_b">Date of Birth( Father )</label>
                              </div>
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="mother_name" type="text" class="form-control" id="mother_name" value="<?php echo $parent -> mother_name; ?>">
                            <label for="mother_name">Mother's Name</label>
                          </div>
                          <div class="form-group">
                            <input name="mother_occp" type="text" class="form-control" id="mother_occp" value="<?php echo $parent -> mother_occp; ?>">
                            <label for="mother_occp">Mother's Occupation</label>
                          </div>
                          <div class="form-group control-width-normal">
                            <div class="input-group date" id="date-of-birth">
                              <div class="input-group-content">
                                <input name="mother_d_o_b" class="form-control date-picker" type="text"  value="<?php echo $parent -> mother_d_o_b; ?>" >
                                <label for="mother_d_o_b">Date of Birth( Mother )</label>
                              </div>
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="gaurdian_name" type="text" class="form-control" id="gaurdian_name" value="<?php echo $parent -> gaurdian_name; ?>">
                            <label for="gaurdian_name">Gaurdian's Name</label>
                          </div>
                          <div class="form-group">
                            <input name="gaurdian_rel" type="text" class="form-control" id="gaurdian_occp" value="<?php echo $parent -> gaurdian_occp; ?>">
                            <label for="gaurdian_rel">Gaurdian's Relationship</label>
                          </div>
                          <div class="form-group">
                            <input name="gaurdian_occp" type="text" class="form-control" id="gaurdian_occp" value="<?php echo $parent -> gaurdian_occp; ?>">
                            <label for="gaurdian_occp">Gaurdian's Occupation</label>
                          </div>
                        </div>
                      </div><br><br>
                      <!--end row-->
                      <div class="row">
                        <div class="col-md-12">
                          <header class="text-primary text-lg text-bold">Contact Details :</header>
                        </div>
                      </div>
                      <!--end row-->

                      <div class="row" id="parent-contact-details">
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="phone" id="phone" class="form-control" type="text" maxlength="10" value="<?php echo $parent -> phone; ?>">
                            <?php echo form_error('phone'); ?>
                            <label for="phone">Phone Number <span class="text-danger">*</span></label>
                          </div>
                          <div class="form-group">
                            <input name="alt_email" id="alt_email" class="form-control" type="text"  value="<?php echo $parent -> alt_email; ?>">
                            <label for="alt_email">Alternate Email</label>
                          </div>
                          <div class="form-group">
                            <input name="ofc1_phone" id="ofc1_phone" class="form-control" type="text" maxlength="10"  value="<?php echo $parent -> ofc1_phone; ?>" >
                            <label for="ofc1_phone">Office Phone Number 1</label>
                          </div>
                          <div class="form-group">
                            <input name="ofc2_phone" id="ofc2_phone" class="form-control" type="text" maxlength="10"  value="<?php echo $parent -> ofc2_phone; ?>" >
                            <label for="ofc2_phone">Office Phone Number 2</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="email" id="email" class="form-control" type="text"  value="<?php echo $parent -> email; ?>" >
                            <?php echo form_error('email'); ?>
                            <label for="email">Email <span class="text-danger">*</span></label>
                          </div>


                          <div class="form-group">
                            <textarea name="address" id="address" class="form-control" rows="5" style="resize: none;" ><?php echo $parent -> address; ?></textarea>
                            <?php echo form_error('address'); ?>
                            <label for="address">Address <span class="text-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <input name="alt_phone" id="alt_phone" class="form-control" type="text" maxlength="10"  value="<?php echo $parent -> alt_phone; ?>" >
                            <label for="alt_phone">Alternate Phone Number</label>
                          </div>

                          <div class="form-group">
                            <textarea name="alt_address" id="alt_address" class="form-control" rows="5" style="resize: none;" ><?php echo $parent -> alt_address; ?></textarea>
                            <label for="alt_address">Alternate Address</label>
                          </div>
                        </div>
                      </div>
                      <!--end row-->

                    </div>
                  </div>
                  <?php //////////////CREATE NEW PARENT END//////////////  ?>

                </div>
              </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <a id="action" style=" margin: 0 10px;" role="button" class="pull-right col-sm-3  btn btn-lg ink-reaction btn-raised btn-default" data-action="editDocuments">
                  <span class="pull-right"><i class="fa fa-pencil"></i></span>
                  Edit Documents
                </a>
                <button id="form-submit" name="submit" type="submit" class="pull-right col-sm-2 btn btn-lg ink-reaction btn-raised btn-info">
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