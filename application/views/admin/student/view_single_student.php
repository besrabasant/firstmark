<div id="content">
  <section class="style-default-bright" style="min-height: 800px;">
    <div class="section-header ">
      <div class="tools pull-right">
        <a href="<?= base_url('student'); ?>" class="btn btn-raised btn-primary"><i class="md md-arrow-back"></i> View All Students</a>
      </div>
      <h1 class="text-primary ">View Student</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-12 card-underline">

          <div class="card-body">
            <div class="margin-bottom-xl">
              <a style="margin: 0 10px;" class="pull-right btn btn-floating-action btn-danger" role="button" href="<?= base_url('student/delete/'.explode('/', $student -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="Delete">                      
                <i class="fa fa-trash-o"></i>
              </a>
              <a style="margin: 0 10px;" class="pull-right btn btn-floating-action btn-warning" role="button" href="<?= base_url('student/edit/'.explode('/', $student -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="Edit">                      
                <i class="fa fa-pencil"></i>
              </a>
              <div class="pull-left width-4 clearfix hidden-xs">
                <img alt="" src="<?= base_url('uploads/student/photo/'.$student -> image_name); ?>" class="img-circle size-3 border-gray border-xl">
              </div><br>
              <h2 class="text-light text-xxl no-margin"><?= $student -> first_name . ' ' . $student -> middle_name . ' ' . $student -> last_name ?></h2>
              <h3 class="text-warning no-margin"> <?= $student -> reg_id; ?></h3>
            </div><!--end .margin-bottom-xxl -->
            <div class="card-head">
              <ul data-toggle="tabs" class="nav nav-tabs pull-right">
                <li class="active"><a href="#student">Student Information</a></li>
                <li><a href="#parent">Parent Information</a></li>
                <li><a href="#documents">Documents</a></li>
              </ul>
            </div>
            <!--end card head-->
            <div class="tab-content">

              <div id="student" class="tab-pane active">
                <br>
                <dl class="dl-horizontal dl-icon col-md-2">
                    <?php
                      switch ( $student -> gender ) {
                         case '0': $gender = "Male";
                            $icon = "fa-mars";
                            break;
                         case '1': $gender = "Female";
                            $icon = "fa-venus";
                            break;
                         case '2': $gender = "ransgender";
                            $icon = "fa-transgender";
                            break;
                      }
                    ?>
                  <dt><span class="fa fa-fw <?= $icon; ?> fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Gender</span><br>
                    <span class="text-lg"><?= $gender ?></span>
                  </dd>
                </dl><!--end .dl-horizontal -->
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-birthday-cake fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Date Of Birth</span><br>
                    <span class="text-lg"><?= $student -> d_o_b; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-university fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Birth Place</span><br>
                    <span class="text-lg"><?php echo ($student -> birth_place) ? $student -> birth_place : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-medkit fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Blood Group</span><br>
                    <span class="text-lg"><?= $student -> blood_group ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Religion</span><br>
                    <span class="text-lg"><?php echo ($student -> religion) ? $student -> religion : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Nationality</span><br>
                    <span class="text-lg"><?php echo ($student -> nationality) ? $student -> nationality : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info-circle fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Class</span><br>
                    <span class="text-lg"><?php
                          foreach ( $class_list as $class ) {
                             if ( $student -> class_id === $class -> class_id ) {
                                echo $class -> class_name;
                             }
                          }
                        ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info-circle fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Section</span><br>
                    <span class="text-lg"><?php
                          foreach ( $section_list as $section ) {
                             if ( $student -> section_id === $section -> section_id ) {
                                echo $section -> section_name;
                             }
                          }
                        ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info-circle fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Roll No.</span><br>
                    <span class="text-lg"><?= $student -> roll_no; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info-circle fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Transport ID</span><br>
                    <span class="text-lg"><?php echo ($student -> transport_id ) ? $student -> transport_id : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-info-circle fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Dormitory ID</span><br>
                    <span class="text-lg"><?php echo ($student -> dormitory_id ) ? $student -> dormitory_id : 'N/A'; ?></span>
                  </dd>
                </dl>
                <div class="col-md-12">
                  <h3 class="text-primary">Contact details:</h3>
                </div>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Phone No.</span><br>
                    <span class="text-lg"><?= $student -> phone; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Alternate Phone No.</span><br>
                    <span class="text-lg"><?php echo ($student -> alt_phone ) ? $student -> alt_phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-envelope fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Email Address</span><br>
                    <span class="text-lg"><?= $student -> email; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Address</span><br>
                    <span class="text-lg"><?= $student -> address; ?></span>
                  </dd>
                </dl>
              </div>
              <!--end tab pane-->  
              <div id="parent" class="tab-pane">
                <br>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-male fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Father's Name</span><br>
                    <span class="text-lg"><?= $parent -> father_name; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-female fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Mother's Name</span><br>
                    <span class="text-lg"><?php echo ($parent -> mother_name ) ? $parent -> mother_name : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-street-view fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Gaurdian's Name</span><br>
                    <span class="text-lg"><?php echo ($parent -> gaurdian_name ) ? $parent -> gaurdian_name : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Gaurdian's Relationship</span><br>
                    <span class="text-lg"><?php echo ($parent -> gaurdian_rel ) ? $parent -> gaurdian_rel : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Father's Occupation</span><br>
                    <span class="text-lg"><?php echo ($parent -> father_occp ) ? $parent -> father_occp : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Mother's Occupation</span><br>
                    <span class="text-lg"><?php echo ($parent -> mother_occp ) ? $parent -> mother_occp : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Gaurdian's Occupation</span><br>
                    <span class="text-lg"><?php echo ($parent -> gaurdian_occp ) ? $parent -> gaurdian_occp : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Father's Date of Birth</span><br>
                    <span class="text-lg"><?php echo ($parent -> father_d_o_b ) ? $parent -> father_d_o_b : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-3">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Mother's Date of Birth</span><br>
                    <span class="text-lg"><?php echo ($parent -> mother_d_o_b ) ? $parent -> mother_d_o_b : 'N/A'; ?></span>
                  </dd>
                </dl>
                <div class="col-md-12">
                  <h3 class="text-primary">Contact details:</h3>
                </div>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Phone No.</span><br>
                    <span class="text-lg"><?php echo ($parent -> phone ) ? $parent -> phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Alternate Phone No.</span><br>
                    <span class="text-lg"><?php echo ($parent -> alt_phone ) ? $parent -> alt_phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Office Phone No. 1</span><br>
                    <span class="text-lg"><?php echo ($parent -> ofc1_phone ) ? $parent -> ofc1_phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Office Phone No. 2</span><br>
                    <span class="text-lg"><?php echo ($parent -> ofc2_phone ) ? $parent -> ofc2_phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-envelope fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Email Address</span><br>
                    <span class="text-lg"><?php echo ($parent -> email ) ? $parent -> email : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-envelope fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Alternate Email Address</span><br>
                    <span class="text-lg"><?php echo ($parent -> alt_email ) ? $parent -> alt_email : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Address</span><br>
                    <span class="text-lg"><?php echo ($parent -> address ) ? $parent -> address : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Alternate Address</span><br>
                    <span class="text-lg"><?php echo ($parent -> alt_address ) ? $parent -> alt_address : 'N/A'; ?></span>
                  </dd>
                </dl>

              </div>
              <!--end tab pane-->
              <div id="documents" class="tab-pane">
                <br>
                <?php foreach ( $documents as $document ): ?>
                     <dl class="dl-horizontal dl-icon col-md-4">
                       <dt><span class="fa fa-fw fa-file-text fa-lg opacity-50"></span></dt>
                       <dd>
                         <span class=" text-lg opacity-50"><?= $document -> document_name ?></span><br>
                         <span><img class="width-7 border-gray border-xl" src="<?= base_url('uploads/student/documents/'.$document -> file_name); ?>"></span>
                       </dd>
                     </dl>

                  <?php endforeach; ?>
              </div>
              <!--end tab pane-->
            </div>
            <!--end tab content-->
          </div>
          <!--end card body-->
        </div>
        <!--end col-md-12-->
      </div>
      <!--end row-->
    </div>
  </section>
</div>