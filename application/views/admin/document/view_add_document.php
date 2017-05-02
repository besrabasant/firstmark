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

      <!-- BEGIN ADD DOCUMENT FORM -->
      <div class="row">							
        <div class="col-md-12">
          <div class="card card-underline">
            <div class="card-head">
                <?php if ( $this -> session -> userdata('referer') == 'student' ): ?>
                   <ul class="nav nav-tabs pull-right tabs-warning ">
                     <li <?= ($active_tab == 'student') ? 'class="active"' : '' ?> ><a>Student Information</a></li>
                     <li <?= ($active_tab == 'parent') ? 'class="active"' : '' ?> ><a>Parents Information</a></li>
                     <li <?= ($active_tab == 'document') ? 'class="active"' : '' ?> ><a>Documents</a></li>
                   </ul>
                   <header class="text-primary text-xxl">Add New Student</header>
                <?php endif; ?>
              <?php if ( $this -> session -> userdata('referer') == 'teacher' ): ?>
                   <ul class="nav nav-tabs pull-right tabs-warning ">
                     <li <?= ($active_tab == 'teacher') ? 'class="active"' : '' ?> ><a>Teacher Information</a></li>
                     <li <?= ($active_tab == 'document') ? 'class="active"' : '' ?> ><a>Documents</a></li>
                   </ul>
                   <header class="text-primary text-xxl">Add New Teacher</header>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('documents/add', array( 'class' => 'form' )); ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <input name="reg_no" type="text" class="form-control" readonly="" id="reg_no" value="<?= $this -> session -> userdata('reg_id') ?>">
                    <?php if ( $this -> session -> userdata('referer') == 'student' ): ?>
                         <label for="reg_no">Student's Registration Id</label>
                      <?php endif ?>
                    <?php if ( $this -> session -> userdata('referer') == 'teacher' ): ?>
                         <label for="reg_no">Teacher's Registration Id</label>
                      <?php endif ?>

                  </div>
                </div>
                <div class=" col-md-offset-6 col-md-3">
                  <br>
                  <a id="add-document-btn" class="pull-right btn ink-reaction btn-raised btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    Add Document
                  </a>
                </div>
              </div>
              <table id="documents" class="table table-bordered no-margin">
                <thead>
                  <tr>
                    <th>Document Preview</th>
                    <th>Document Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button name="submit" type="submit" class=" pull-right col-sm-3  btn btn-lg ink-reaction btn-raised btn-primary">
                  <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                  Save Information
                </button>
              </div>
            </div>
          </div><!--end .card -->
          <?php echo form_close(); ?>
        </div><!--end .col -->
      </div><!--end .row -->
      <!-- END ADD DOCUMENT FORM -->

    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->