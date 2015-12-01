<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-body">
              
              <!-- BEGIN ADD STUDENT FORM -->
						<div class="row">							
							<div class="col-md-12">
								<?php echo form_open_multipart('student/add',array('class' => 'form')); ?>
									<div class="card">
										<div class="card-head style-primary">
											<header>Add a Student</header>
										</div>
										<div class="card-body floating-label">
                      <?php
                        // ECHOING FORM SUBMIT RESULT MESSAGE.
                      echo $this->session->flashdata('msg');
                      ?>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
                            <input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo set_value('first_name'); ?>">
                            <?php echo form_error('first_name'); ?>
														<label for="first_name">First Name</label>
													</div>
												</div>
                        <div class="col-md-4">
													<div class="form-group">
														<input name="middle_name" type="text" class="form-control" id="middle_name" value="<?php echo set_value('middle_name'); ?>">
														<label for="middle_name">Middle Name</label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo set_value('last_name'); ?>">
														<?php echo form_error('last_name'); ?>
                            <label for="last_name">Last Name</label>
													</div>
												</div>
											</div>
                      
                      <div class="row">
                        
                          <div class="col-md-4">
                            <span class="text-lg opacity-50">Gender :</span>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <label class="radio-inline radio-styled radio-primary">
                                  <input type="radio" name='gender' value="0" <?php echo set_radio('gender', '0', TRUE); ?> ><span>Male</span>
                                </label>
                                <label class="radio-inline radio-styled radio-primary">
                                  <input type="radio" name='gender' value="1" <?php echo set_radio('gender', '1'); ?> ><span>Female</span>
                                </label>
                                <label class="radio-inline radio-styled radio-primary">
                                  <input type="radio" name='gender' value="2" <?php echo set_radio('gender', '2'); ?> ><span>Transgender</span>
                                </label>
                              </div><!--end .col -->
                            </div>
                             <div class="form-group control-width-normal">
                              <div class="input-group date" id="date-of-birth">
                                <div class="input-group-content">
                                  <input name="d_o_b" class="form-control" type="text"  value="<?php echo set_value('d_o_b'); ?>" >
                                  <?php echo form_error('d_o_b'); ?>
                                  <label for="d_o_b">Date of Birth</label>
                                </div>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                            
                          </div><!--end .col-md-4 -->
                          
                          
                          <div class="col-md-4">
                           
                            <div class="form-group">
                              <?php //JAVASCRIPT CODE TO ONLY ACCEPT NUMBERS BY THE INPUT. onkeydown() ?>
                              <input name="phone" id="phone" class="form-control" type="text" maxlength="10" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )"  value="<?php echo set_value('phone'); ?>">
                              
                              <?php echo form_error('phone'); ?>
                              <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-group">
                              <input name="email" id="email" class="form-control" type="text"  value="<?php echo set_value('email'); ?>" >
                              <?php echo form_error('email'); ?>
                              <label for="email">Email</label>
                            </div>
                         </div>
                          
                        <div class="col-md-4">
                          <div class="form-group">
                              <textarea name="address" id="address" class="form-control" rows="3" style="resize: none;"><?php echo set_value('address'); ?></textarea>
                              <?php echo form_error('address'); ?>
                              <label for="address">Address</label>
                          </div>
                          </div>
                      </div><!--end-row-->
                      
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
														<input name="father_name" type="text" class="form-control" id="father_name" value="<?php echo set_value('father_name'); ?>">
                            <?php echo form_error('father_name'); ?>
														<label for="father_name">Father's Name</label>
													</div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
														<input name="mother_name" type="text" class="form-control" id="mother_name" value="<?php echo set_value('mother_name'); ?>">
														<?php echo form_error('mother_name'); ?>
                            <label for="mother_name">Mother's Name</label>
													</div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
														<input name="religion" type="text" class="form-control" id="religion" value="<?php echo set_value('religion'); ?>">
														<?php echo form_error('religion'); ?>
                            <label for="religion">Religion</label>
													</div>
                        </div>
                      </div>
                      
                      
                      <div class="row">
                        
                        <div class="col-md-2">
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
                              <label for="blood_group">Blood Group</label>
                              
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <select name="class_id" class="form-control select2-list">
                                <option value=""></option>
                                <?php foreach($class_list as $class): ?>
                                <option value="<?=$class->class_id?>"  <?php echo set_select('class_id',$class->class_id); ?> ><?=$class->class_name?></option>
                                <?php endforeach; ?>
                              </select>
                            <?php echo form_error('class_id'); ?>
                              <label for="class_id">Class</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <select name="section_id" class="form-control select2-list">
                                <option value=""></option>
                                <option value="A" <?php echo set_select('section_id', 'A'); ?> >A</option>
                                <option value="B" <?php echo set_select('section_id', 'B'); ?> >B</option>
                                <option value="C" <?php echo set_select('section_id', 'C'); ?> >C</option>
                                <option value="D" <?php echo set_select('section_id', 'D'); ?> >D</option>
                              </select>
                            <?php echo form_error('section_id'); ?>
                              <label for="section_id">Section</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <select name="transport_id" class="form-control select2-list">
                               <option value=""></option>
                                <option value="A" <?php echo set_select('transport_id', 'A'); ?> >A</option>
                                <option value="B" <?php echo set_select('transport_id', 'B'); ?> >B</option>
                                <option value="C" <?php echo set_select('transport_id', 'C'); ?> >C</option>
                                <option value="D" <?php echo set_select('transport_id', 'D'); ?> >D</option>
                              </select>
                            <?php echo form_error('transport_id'); ?>
                              <label for="transport_id">Transport ID</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <select name="dormitory_id" class="form-control select2-list">
                                <option value=""></option>
                                <option value="A" <?php echo set_select('dormitory_id', 'A'); ?> >A</option>
                                <option value="B" <?php echo set_select('dormitory_id', 'B'); ?> >B</option>
                                <option value="C" <?php echo set_select('dormitory_id', 'C'); ?> >C</option>
                                <option value="D" <?php echo set_select('dormitory_id', 'D'); ?> >D</option>
                              </select>
                            <?php echo form_error('transport_id'); ?>
                              <label for="dormitory_id">Dormitory ID</label>
                            </div>
                        </div>
                        
                      </div><!-- row end -->
                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-btn">
                              <button id="add-image-btn" class="btn ink-reaction btn-raised btn-small btn-primary" type="button">Add Image</button>
                            </div>
                            <div class="input-group-content">
                              <input id="add-image-field" class="form-control" type="text" >
                              <?php echo form_error('image_name'); ?>
                            </div>
                            <div class="input-group-btn">
                              <button id="remove-image-btn" class="btn ink-reaction btn-icon-toggle btn-primary" style="display:none;" type="button"><i class="fa fa-remove"></i></button>
                            </div>
                          </div>
                          <input name="image_name" id="add-image" type="file" class="form-control" style=" margin-top: -37px; visibility: hidden;">  
                        </div>
                      </div>
                    </div>
                      
											
										</div><!--end .card-body -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
                        <button name="submit" type="submit" class="pull-right col-sm-2 btn ink-reaction btn-raised btn-lg btn-primary">
                          <span class="pull-left"><i class="fa fa-user-plus"></i></span>
                          Add
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