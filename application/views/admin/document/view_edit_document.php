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
                   <header class="text-primary text-xxl">Edit Student : <span class="text-warning"><?= $user -> reg_id; ?></header>
                <?php endif; ?>
              <?php if ( $this -> session -> userdata('referer') == 'teacher' ): ?>
                   <ul class="nav nav-tabs pull-right tabs-warning ">
                     <li <?= ($active_tab == 'teacher') ? 'class="active"' : '' ?> ><a>Teacher Information</a></li>
                     <li <?= ($active_tab == 'document') ? 'class="active"' : '' ?> ><a>Documents</a></li>
                   </ul>
                   <header class="text-primary text-xxl">Edit Teacher : <span class="text-warning"><?= $user -> reg_id; ?></header>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('documents/update', array( 'class' => 'form' )); ?>
              <input type="hidden" name="reg_no" value="<?= $user -> reg_id; ?>">
              <input name="hidden_action" type="hidden" value="">
              <div class="row margin-bottom-xxl">
                <div class=" col-md-offset-9 col-md-3">
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
                    <?php foreach ( $documents as $document ) { ?>
                       <tr class="fade in" >
                         <td><img class="width-4" src="<?php echo base_url('uploads/'.$this->session->userdata('referer').'/documents/'.$document->file_name);?>">
                           <input name="document_id[]" type="hidden" value="<?php echo $document->document_id;?>" style="display:none">
                         </td>
                         <td><br><div class="form-group">
                             <input name="prev_document_name[]" type = "text" class = "form-control" value="<?php echo $document->document_name;?>" >
                             <label for = "prev_document_name[]" > Enter Document Name </label>
                           </div>
                         </td >
                         <td class="text-center"><a role="button" href="<?php echo base_url('documents/delete/'.$document->document_id);?>" style="display: inline-block;" class=" pull-right btn ink-reaction btn-raised btn-danger v-top">
                             Delete
                           </a>
                         </td>
                       </tr>

                    <?php } ?>
                </tbody>
              </table>

            </div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <a id="action" style=" margin: 0 10px;" role="button" class="pull-right col-sm-3  btn btn-lg ink-reaction btn-raised btn-default" data-action="viewTeacher">
                  <span class="pull-right"><i class="fa fa-save"></i></span>
                  Update Information
                </a>
                <button id="form-submit" name="submit" type="submit" class=" pull-right col-sm-3  btn btn-lg ink-reaction btn-raised btn-info">
                  <span class="pull-right"><i class="fa fa-save"></i></span>
                  Save Documents
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