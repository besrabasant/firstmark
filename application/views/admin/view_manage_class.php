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
        <!-- BEGIN ADD CLASS FORM -->
        <div class="col-md-4">
            <?php echo form_open('school', array( 'class' => 'form' )); ?>
          <div class="card">
            <div class="card-head style-primary">
              <header>Add new Class</header>
            </div>
            <div class="card-body floating-label">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="class_name" type="text" class="form-control" id="class_name" value="<?php echo set_value('class_name'); ?>">
                    <?php echo form_error('class_name'); ?>
                    <label for="class_name">Class Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="class_code" type="text" class="form-control" id="class_code" value="<?php echo set_value('class_code'); ?>">
                    <?php echo form_error('class_code'); ?>
                    <label for="class_code">Class Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input name="room_no" type="text" class="form-control" id="room-no" value="<?php echo set_value('room_no'); ?>">
                    <?php echo form_error('room_no'); ?>
                    <label for="room_no">Room No.</label>
                  </div>
                </div>
              </div>                      

            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button name="addclass_submit" type="submit" class="pull-right col-sm-4 btn ink-reaction btn-raised btn-lg btn-primary">
                  <span class="pull-left"><i class="fa fa-plus"></i></span>
                  Add
                </button>
              </div>
            </div>
          </div><!--end .card -->
          <?php echo form_close(); ?>
        </div><!--end .col -->
        <!-- END ADD CLASS FORM -->

        <div class="col-md-8">
          <div class="card">
            <div class="card-head style-primary">
              <header>List of Classes</header>
            </div>
            <div class="card-body">
              <table class="table table-condensed no-margin">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Class Code</th>
                    <th>Class Name</th>
                    <th>Room No.</th>
                    <th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if ( empty($class_list) ): ?>
                       <tr>
                         <td colspan="4"><div class="text-center text-xl text-default-light opacity-50">No <span class="text-bold">CLASSES</span> found in the record!!!</div></td>
                       </tr>
                    <?php else:
                       foreach ( $class_list as $index => $class ):
                          ?>
                          <tr data-index="<?php echo $class -> class_id; ?>">
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo $class -> class_code; ?></td>
                            <td><?php echo $class -> class_name; ?></td>
                            <td><?php echo $class -> room_no; ?></td>
                            <td class="text-right">
                              <a class="btn btn-icon-toggle" role="button" data-target="#editClassModal" rel="tooltip" data-toggle="modal" data-backdrop="true" data-original-title="Edit">                      
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a role="button" href="<?php echo base_url('class/delete') . '/' . $class -> class_id; ?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
                          </tr>
                       <?php endforeach;
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
<div style="display: none;" class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title text-bold text-primary" id="formModalLabel">Edit Class</h4>
      </div>
<?php echo form_open('class/update', array( 'class' => 'form-horizontal', 'role' => 'form' )); ?>
      <div class="modal-body">
        <input name="class_id" id="class_id" type="hidden">
        <div class="form-group">
          <label for="class_name" class="control-label col-sm-4">Class Name</label>
          <div class="col-sm-5">
            <input name="class_name" id="class_name" class="form-control" type="text"><div class="form-control-line"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="class_code" class="control-label col-sm-4">Class Code</label>
          <div class="col-sm-5">
            <input name="class_code" id="class_code" class="form-control" type="text"><div class="form-control-line"></div>
          </div>
        </div>
        <div class="form-group">
            <label for="room_no" class="control-label col-sm-4">Room No.</label>
          <div class="col-sm-5">
            <input name="room_no" id="room_no" class="form-control" type="text"><div class="form-control-line"></div>
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