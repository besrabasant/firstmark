<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS EDIT STUDENT INFORMATION -->
				<div id="editStudentInformation" class="offcanvas-pane width-21" >
					<div class="offcanvas-head">
						<header class="text-primary">Edit Student Information</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body">
          <?php echo form_open_multipart('student/edit',array('class' => 'form')); ?>
            <div class="row">
              <div class=" col-md-4">
                <div class="form-group">
                  <input name="first_name" type="text" class="form-control" id="first_name" value="">
                  <label for="first_name">First Name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="middle_name" type="text" class="form-control" id="middle_name" value="">
                  <label for="middle_name">Middle Name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input name="last_name" type="text" class="form-control" id="last_name" value="">
                  <label for="last_name">Last Name</label>
                </div>
              </div>
            </div>
            <div class="row">
                        
                <div class="col-md-5">
                  <span class="text-lg opacity-50">Gender :</span>
                  <div class="form-group">
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
                    </div><!--end .col -->
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

                </div><!--end .col-md-4 -->
            </div>
          <?php echo form_close();  ?>
					</div><!--end .offcanvas-body -->
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