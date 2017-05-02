<!-- BEGIN CONTENT-->
<div id="content">
  <section class="style-default-bright">
    <div class="section-header ">
      <div class="tools pull-right">
        <a href="<?= base_url('teacher'); ?>" class="btn btn-raised btn-primary"><i class="md md-arrow-back"></i> View All Teachers</a>
      </div>
      <h1 class="text-primary ">View Teacher</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-12 card-underline">
          <div class="card-body">
            <div class="margin-bottom-xl">
              <a style="margin: 0 10px;" class="pull-right btn btn-floating-action btn-danger" role="button" href="<?= base_url('teacher/delete/' . explode('/', $teacher -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="Delete">                      
                <i class="fa fa-trash-o"></i>
              </a>
              <a style="margin: 0 10px;" class="pull-right btn btn-floating-action btn-warning" role="button" href="<?= base_url('teacher/edit/' . explode('/', $teacher -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="Edit">                      
                <i class="fa fa-pencil"></i>
              </a>
              <div class="pull-left width-4 clearfix hidden-xs">
                <img alt="" src="<?= base_url('uploads/teacher/photo/' . $teacher -> image_name); ?>" class="img-circle border-gray border-xl size-3">
              </div><br>
              <h2 class="text-light text-xxl no-margin"><?= $teacher -> first_name . ' ' . $teacher -> middle_name . ' ' . $teacher -> last_name ?></h2>
              <h3 class="text-warning no-margin"> <?= $teacher -> reg_id; ?></h3>
            </div><!--end .margin-bottom-xxl -->
            <div class="card-head">
              <ul data-toggle="tabs" class="nav nav-tabs pull-right">
                <li class="active"><a href="#teacher">Teacher Information</a></li>
                <li><a href="#documents">Documents</a></li>
              </ul>
            </div>
            <!--end card head-->
            <div class="tab-content">

              <div id="teacher" class="tab-pane active">
                <br>
                <dl class="dl-horizontal dl-icon col-md-2">
                    <?php
                      switch ( $teacher -> gender ) {
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
                    <span class="text-lg"><?= $teacher -> d_o_b; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-university fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Birth Place</span><br>
                    <span class="text-lg"><?php echo ($teacher -> birth_place) ? $teacher -> birth_place : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-medkit fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Blood Group</span><br>
                    <span class="text-lg"><?= $teacher -> blood_group ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Religion</span><br>
                    <span class="text-lg"><?php echo ($teacher -> religion) ? $teacher -> religion : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-bookmark fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Nationality</span><br>
                    <span class="text-lg"><?php echo ($teacher -> nationality) ? $teacher -> nationality : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Department</span><br>
                    <span class="text-lg"><?php
                          switch ( $teacher -> department_id ) {
                             case '1': echo "Department 1";
                                break;
                             case '2': echo "Department 2";
                                break;
                             case '3': echo "Department 3";
                                break;
                             case '4': echo "Department 4";
                                break;
                          }
                        ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Position</span><br>
                    <span class="text-lg"><?php echo $teacher -> position; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-male fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Father's Name</span><br>
                    <span class="text-lg"><?= $teacher -> father_name; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-female fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Mother's Name</span><br>
                    <span class="text-lg"><?php echo ($teacher -> mother_name ) ? $teacher -> mother_name : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Marital status</span><br>
                    <span class="text-lg"><?php echo ($teacher -> marital_status ) ? ucfirst($teacher -> marital_status) : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Spouse Name</span><br>
                    <span class="text-lg"><?php echo ($teacher -> spouse_name ) ? $teacher -> spouse_name : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-child fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Children Count</span><br>
                    <span class="text-lg"><?php echo $teacher -> children_count; ?></span>
                  </dd>
                </dl>
                <div class="col-md-12">
                  <h3 class="text-primary">Contact details:</h3>
                </div>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Phone No.</span><br>
                    <span class="text-lg"><?= $teacher -> phone; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-phone fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Alternate Phone No.</span><br>
                    <span class="text-lg"><?php echo ($teacher -> alt_phone ) ? $teacher -> alt_phone : 'N/A'; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-envelope fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Email Address</span><br>
                    <span class="text-lg"><?= $teacher -> email; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Address</span><br>
                    <span class="text-lg"><?= $teacher -> address; ?></span>
                  </dd>
                </dl>
                <div class="col-md-12">
                  <h3 class="text-primary">Experience Details:</h3>
                </div>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Qualification</span><br>
                    <span class="text-lg"><?= $teacher -> qualification; ?></span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-2">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Experience</span><br>
                    <span class="text-lg"><?= $teacher -> experience; ?> Years</span>
                  </dd>
                </dl>
                <dl class="dl-horizontal dl-icon col-md-4">
                  <dt><span class="fa fa-fw fa-info fa-lg opacity-50"></span></dt>
                  <dd>
                    <span class="opacity-50">Experience Details</span><br>
                    <span class="text-lg"><?= $teacher -> experience_details; ?></span>
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
                         <span><img class="width-7 border-gray border-xl" src="<?= base_url('uploads/teacher/documents/' . $document -> file_name); ?>"></span>
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


