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


      <div class="row">	
        <!-- BEGIN ADD SECTION FORM -->
        <div class="col-md-4">
            <?php echo form_open('subject', array( 'class' => 'form' )); ?>
          <div class="card">
            <div class="card-head style-primary">
              <header>Add new Subject</header>
            </div>
            <div class="card-body floating-label">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="subject_name" type="text" class="form-control" id="subject_name" value="<?php echo set_value('subject_name'); ?>">
                    <?php echo form_error('subject_name'); ?>
                    <label for="subject_name">Subject Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="subject_code" type="text" class="form-control" id="subject_code" value="<?php echo set_value('subject_code'); ?>">
                    <?php echo form_error('subject_code'); ?>
                    <label for="subject_code">Subject Code</label>
                  </div>
                </div>
              </div>
            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button name="addsubject_submit" type="submit" class="pull-right col-sm-4 btn ink-reaction btn-raised btn-lg btn-primary">
                  <span class="pull-left"><i class="fa fa-plus"></i></span>
                  Add
                </button>
              </div>
            </div>
          </div><!--end .card -->
          <?php echo form_close(); ?>
        </div><!--end .col -->
        <!-- END ADD SECTION FORM -->

        <div class="col-md-8">
          <div class="card">
            <div class="card-head style-primary">
              <header>List of Subject</header>
            </div>
            <div class="card-body">
              <table class="table table-condensed no-margin">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if ( empty($subject_list) ): ?>
                       <tr>
                         <td colspan="4"><div class="text-center text-xl text-default-light opacity-50">No <span class="text-bold">SUBJECTS</span> found in the record!!!</div></td>
                       </tr>
                    <?php
                    else:
                       foreach ( $subject_list as $index => $subject ):
                          ?>
                          <tr data-Index="<?php echo $subject -> subject_id; ?>">
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo $subject -> subject_name; ?></td>
                            <td><?php echo $subject -> subject_code; ?></td>
                            <td class="text-right">
                              <a class="btn btn-icon-toggle" role="button" data-target="#editSubjectModal" rel="tooltip" data-toggle="modal" data-backdrop="true" data-original-title="Edit">                      
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a role="button" href="<?php echo base_url('subject/delete') . '/' . $subject -> subject_id; ?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
                          </tr>
                       <?php
                       endforeach;
                    endif;
                  ?>
                </tbody>
              </table>
            </div><!--end .card-body -->
          </div><!--end .card -->
        </div><!--end .col -->


      </div><!--end .row -->


    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->

<!-- MODALS START-->
<div style="display: none;" class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title text-bold text-primary" id="formModalLabel">Edit Subject</h4>
      </div>
<?php echo form_open('subject/update', array( 'class' => 'form-horizontal', 'role' => 'form' )); ?>
      <div class="modal-body">
        <input name="subject_id" id="subject_id" type="hidden">
        <div class="form-group">
          <label for="subject_name" class="control-label col-sm-4">Subject Name</label>
          <div class="col-sm-5">
            <input name="subject_name" id="subject_name" class="form-control" type="text"><div class="form-control-line"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="subject_code" class="control-label col-sm-4">Subject Code</label>
          <div class="col-sm-5">
            <input name="subject_code" id="subject_code" class="form-control" type="text"><div class="form-control-line"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
<?php echo form_close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- MODALS END-->
