<!-- BEGIN CONTENT-->
			<div id="content">
				<section class="style-default-bright">
          <div class="section-header">
						<h2 class="text-primary">View Students List</h2>
					</div>
					<div class="section-body">
						<table id="table-students" class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Student Name</th>
									<th>Addmission date</th>
									<th>Gender</th>
									<th>Ph. No.</th>
                  <th>Class</th>
                  <th>Photo</th>
                  <th>Status</th>
                  <th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
								</tr>
							</thead>
              <tbody>
              <?php foreach( $student_list as $index=>$student ): ?>
								<tr data-Index="<?php echo $student->student_id; ?>">
                  <td><?php echo $student->first_name." ".$student->middle_name." ".$student->last_name; ?></td>
                  <td><?php $date = explode(" ",$student->addmission_date); echo $date[0]; ?></td>
                  <td><?php switch($student->gender){
                    case 0: echo "Male"; break;
                    case 1: echo "Female"; break;
                    case 2: echo "Transgender"; break;
                  } ?></td>
                  <td><?=$student->phone?></td>
                  <td><?=$student->class_id?></td>
                  <td><img class="height-1 width-1" src="<?php echo base_url('uploads/student/photo').'/'.$student->image_name;?>" alt=""></td>
                  <td><?php echo ($student->status)? "Active":"Not active"; ?></td>
									<td class="text-right">
                    <a class="btn btn-icon-toggle" role="button" href="#editStudentInformation" rel="tooltip" data-toggle="offcanvas" data-backdrop="true" data-original-title="Edit">                      
                          <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-icon-toggle" role="button" href="#viewStudentInformation" rel="tooltip" data-toggle="offcanvas" data-backdrop="true" data-original-title="View">
                      <i class="fa fa-eye"></i>
                    </a>
                    <button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
                <?php endforeach; ?>
							</tbody>
						</table>
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->