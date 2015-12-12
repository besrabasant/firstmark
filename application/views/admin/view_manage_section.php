<!-- BEGIN CONTENT-->
<div id="content">
    <section>
        <div class="section-body">
            <?php
            ///ALERT BOX FOR STATUS MESSAGES///

            if ($this->session->flashdata('status') != NULL):
                ?> 
                <div class="alert alert-<?= $this->session->flashdata('status') ?> alert-callout fade in" role="alert">
                    <a href="#" class=" pull-right btn ink-reaction btn-icon-toggle btn-primary-dark close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>
                    <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                </div>
                <?php
            endif;
            ?>


            <div class="row">	
                <!-- BEGIN ADD SECTION FORM -->
                <div class="col-md-4">
                    <?php echo form_open('section', array('class' => 'form')); ?>
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Add new Section</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="section_name" type="text" class="form-control" id="section_name" value="<?php echo set_value('section_name'); ?>">
                                        <?php echo form_error('section_name'); ?>
                                        <label for="section_name">Section Name</label>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button name="addsection_submit" type="submit" class="pull-right col-sm-4 btn ink-reaction btn-raised btn-lg btn-primary">
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
                            <header>List of Sections</header>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed no-margin">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section Name</th>
                                        <th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($section_list)): ?>
                                        <tr>
                                            <td colspan="4"><div class="text-center text-xl text-default-light opacity-50">No <span class="text-bold">SECTIONS</span> found in the record!!!</div></td>
                                        </tr>
                                    <?php else:
                                        foreach ($section_list as $index => $section):
                                            ?>
                                            <tr data-Index="<?php echo $section->section_id; ?>">
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo $section->section_name; ?></td>
                                                <td class="text-right">
                                                    <a class="btn btn-icon-toggle" role="button" data-target="#editSectionModal" rel="tooltip" data-toggle="modal" data-backdrop="true" data-original-title="Edit">                      
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a role="button" href="<?php echo base_url('section/delete') . '/' . $section->section_id; ?>" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
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
<div style="display: none;" class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-bold text-primary" id="formModalLabel">Edit Section</h4>
            </div>
<?php echo form_open('section/update', array('class' => 'form-horizontal', 'role' => 'form')); ?>
            <div class="modal-body">
                <input name="section_id" id="section_id" type="hidden">
                <div class="form-group">
                        <label for="section_name" class="control-label col-sm-5">Section Name</label>
                    <div class="col-sm-5">
                        <input name="section_name" id="section_name" class="form-control" type="text"><div class="form-control-line"></div>
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
