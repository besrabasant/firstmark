<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS EDIT STUDENT INFORMATION -->
				<div id="editStudentInformation" class="offcanvas-pane width-21" >
          <?php echo form_open_multipart('student/update',array('class' => 'form')); ?>
					<div class="offcanvas-head">
						<header class="text-primary text-bold">Edit Student Information</header>
						<div class="offcanvas-tools">
              <a class="btn btn-icon-toggle btn-primary pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body">
            
            <input type="hidden" name="student_id" id="student_id">
            
            <div class="row">
              <div class=" col-md-4">
                <div class="form-group">
                  <input name="first_name" type="text" class="form-control" id="first_name" value="">
                  <label for="first_name">First Name</label>
                </div>
                <div class="form-group">
                  <input name="last_name" type="text" class="form-control" id="last_name" value="">
                  <label for="last_name">Last Name</label>
                </div>
                <div class="form-group control-width-medium">
                  <div class="input-group date" id="date-of-birth">
                    <div class="input-group-content">
                      <input name="d_o_b" class="form-control" type="text"  id="d_o_b">
                      <label for="d_o_b">Date of Birth</label>
                    </div>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <?php //JAVASCRIPT CODE TO ONLY ACCEPT NUMBERS BY THE INPUT. onkeydown() ?>
                  <input name="phone" id="phone" class="form-control" type="text" maxlength="10" onkeydown="return ( event.ctrlKey || event.altKey 
                  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                  || (95<event.keyCode && event.keyCode<106)
                  || (event.keyCode==8) || (event.keyCode==9) 
                  || (event.keyCode>34 && event.keyCode<40) 
                  || (event.keyCode==46) )">
                  <label for="phone">Phone Number</label>
                </div>
                <div class="form-group">
                  <input name="email" id="email" class="form-control" type="text" >
                  <label for="email">Email</label>
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="middle_name" type="text" class="form-control" id="middle_name" value="">
                  <label for="middle_name">Middle Name</label>
                </div>
                <span class="text-lg opacity-50">Gender :</span>
                  <div class="form-group width-8">
                    <div class="col-sm-12">
                      <label class="radio-inline radio-styled radio-primary">
                        <input type="radio" name='gender' value="0" ><span>Male</span>
                      </label>
                      <label class="radio-inline radio-styled radio-primary">
                        <input type="radio" name='gender' value="1" ><span>Female</span>
                      </label>
                      <label class="radio-inline radio-styled radio-primary">
                        <input type="radio" name='gender' value="2" ><span>Transgender</span>
                      </label>
                    </div>
                  </div>
                <br>
                <div class="form-group">
                      <textarea name="address" id="address" class="form-control" rows="5" style="resize: none;"></textarea>
                      <label for="address">Address</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card width-6 center-block" >
                  <div class="card-head card-head-sm style-primary ">
                    <header>STUDENT IMAGE</header>
                    <div class="tools">
                      <a id="remove-image-btn" rel="tooltip" data-original-title="Remove" data-placement="bottom" class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
                    </div>
                  </div><!--end .card-head -->
                  <div class="card-body height-7">
                    
                    <button id="add-image-btn" class="center-block btn ink-reaction btn-flat btn btn-primary" style="vertical-align: middle;display:none;" type="button">Click here to Add Image</button>
                    <img id="add-image-preview" src="" class="center-block width-4 border-gray">
                    <div id="add-image-field" class="text-center"></div>
                  </div><!--end .card-body -->
                  <input name="image_name" id="add-image" type="file" style=" margin-top: -37px; visibility: hidden;">
                  <input name="prev_image_name" id="prev_image_name" type="hidden">
                  </div>
                
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input name="father_name" type="text" class="form-control" id="father_name">
                  <label for="father_name">Father's Name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="mother_name" type="text" class="form-control" id="mother_name">
                  <label for="mother_name">Mother's Name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="religion" type="text" class="form-control" id="religion">
                  <label for="religion">Religion</label>
                </div>
              </div>
            </div>
            
            <div class="row">
                        
              <div class="col-md-2">
                <div class="form-group">
                    <select id="blood_group" name="blood_group" class="form-control select2-list">
                      <option value=""></option>
                      <option value="O+" >O+</option>
                      <option value="O-" >O-</option>
                      <option value="A+" >A+</option>
                      <option value="A-" >A-</option>
                      <option value="B+" >B+</option>
                      <option value="B-" >B-</option>
                      <option value="AB+" >AB+</option>
                      <option value="AB-" >AB-</option>
                    </select>
                    <label for="blood_group">Blood Group</label>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <select id="class" name="class_id" class="form-control select2-list">
                      <option value=""></option>
                      <?php foreach($class_list as $class): ?>
                      <option value="<?=$class->class_id?>"  ><?=$class->class_name?></option>
                      <?php endforeach; ?>
                    </select>
                  <label for="class_id">Class</label>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <select id="section_id" name="section_id" class="form-control select2-list">
                      <option value=""></option>
                      <option value="A" >A</option>
                      <option value="B" >B</option>
                      <option value="C" >C</option>
                      <option value="D" >D</option>
                    </select>
                    <label for="section_id">Section</label>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <select id="transport_id" name="transport_id" class="form-control select2-list">
                     <option value=""></option>
                      <option value="A" >A</option>
                      <option value="B" >B</option>
                      <option value="C" >C</option>
                      <option value="D" >D</option>
                    </select>
                    <label for="transport_id">Transport ID</label>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <select id="dormitory_id" name="dormitory_id" class="form-control select2-list">
                      <option value=""></option>
                      <option value="A" >A</option>
                      <option value="B" >B</option>
                      <option value="C" >C</option>
                      <option value="D" >D</option>
                    </select>
                    <label for="dormitory_id">Dormitory ID</label>
                  </div>
              </div>

            </div><!-- row end -->
            <div class="row">
              <div class="col-md-11">
                <button name="submit" type="submit" class="pull-right col-sm-2 btn ink-reaction btn-raised btn btn-primary">
                  Save</button>
              </div>
            </div>
					</div><!--end .offcanvas-body -->
          <?php echo form_close();  ?>
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS EDIT STUDENT INFORMATION -->

				<!-- BEGIN OFFCANVAS VIEW STUDENT INFORMATION -->
				<div id="viewStudentInformation" class="offcanvas-pane width-20">
					<div class="offcanvas-head style-default-bright">
						<header class="text-primary text-bold">View Student Information</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-primary pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body">
            <div class="row">
             <div class="col-sm-offset-1 col-sm-11">
              <table class="table table-condensed table-no-border">
                <tbody>
                  <tr>
                    <td><div class="text-primary text-lg">First Name : </div></td>
                    <td><div class="text-lg" id="first_name"></div></td>
                    <td colspan="2" rowspan="4" ><img class="width-3 border-gray border-xl" id="image_name" src=""></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Last Name : </div></td>
                    <td><div class="text-lg" id="last_name"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Middle Name : </div></td>
                    <td><div class="text-lg" id="middle_name"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Gender : </div></td>
                    <td><div class="text-lg" id="gender"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Phone Number : </div></td>
                    <td><div class="text-lg" id="phone"></div></td>
                    <td><div class="text-primary text-lg">Email : </div></td>
                    <td><div class="text-lg" id="email"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Address : </div></td>
                    <td><div class="text-lg width-4" id="address"></div></td>
                    <td><div class="text-primary text-lg">Religion : </div></td>
                    <td><div class="text-lg" id="religion"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Date of Birth : </div></td>
                    <td><div class="text-lg" id="d_o_b"></div></td>
                    <td><div class="text-primary text-lg">Blood<br> Group : </div></td>
                    <td><div class="text-lg" id="blood_group"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Class : </div></td>
                    <td><div class="text-lg" id="class"></div></td>
                    <td><div class="text-primary text-lg">Section : </div></td>
                    <td><div class="text-lg" id="section_id"></div></td>
                  </tr>
                  <tr>
                    <td><div class="text-primary text-lg">Transport : </div></td>
                    <td><div class="text-lg" id="transport_id"></div></td>
                    <td><div class="text-primary text-lg">Dormitory : </div></td>
                    <td><div class="text-lg" id="dormitory_id"></div></td>
                  </tr>
                </tbody>
              </table>
             </div>
              
            </div>
					</div><!--end .offcanvas-body -->
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS VIEW STUDENT INFORMATION -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->