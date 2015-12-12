<!-- BEGIN CONTENT-->
<div id="content">
  <section class="style-default-bright">
      <?php
        ///ALERT BOX FOR STATUS MESSAGES///

        if ( $this -> session -> flashdata('status') != NULL ):
           ?> 
         <br>
         <div class="alert alert-<?= $this -> session -> flashdata('status') ?> fade in" role="alert">
           <a href="#" class=" pull-right btn ink-reaction btn-icon-toggle btn-primary-dark close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>
           <strong><?php echo $this -> session -> flashdata('msg'); ?></strong>
         </div>
         <?php
      endif;
    ?>
    <div class="section-header">
      <h2 class="text-primary">View All Students</h2>
    </div>
    <div class="section-body">
      <table id="table-students" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Registration No.</th>
            <th>Gender</th>
            <th>Ph. No.</th>
            <th>Class</th>
            <th>Photo</th>
            <th>Status</th>
            <th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ( $student_list as $index => $student ): ?>
               <tr data-Index="<?php echo $student -> student_id; ?>">
                 <td><?php echo $student -> first_name . " " . $student -> middle_name . " " . $student -> last_name; ?></td>
                 <td><?= $student -> reg_id; ?></td>
                 <td><?php
            switch ( $student -> gender ) {
               case 0: echo "Male";
                  break;
               case 1: echo "Female";
                  break;
               case 2: echo "Transgender";
                  break;
            }
                 ?></td>
                 <td><?= $student -> phone ?></td>
                 <td><?php
                foreach ( $class_list as $class ) {
                   echo ($class -> class_id === $student -> class_id) ? $class -> class_name : '';
                }
                ?></td>
                 <td><img class="height-1 width-1" src="<?php echo base_url('uploads/student/photo/' . $student -> image_name); ?>" alt=""></td>
                 <td><?php echo ($student -> status) ? "Active" : "Not active"; ?></td>
                 <td class="text-right">
                   <a class="btn btn-icon-toggle" role="button" href="<?= base_url('student/edit/'.explode('/', $student -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="Edit">                      
                     <i class="fa fa-pencil"></i>
                   </a>
                   <a class="btn btn-icon-toggle" role="button" href="<?= base_url('student/view/'.explode('/', $student -> reg_id)[3]); ?>" rel="tooltip"  data-original-title="View">
                     <i class="fa fa-eye"></i>
                   </a>
                   <a class="btn btn-icon-toggle" href="<?= base_url('student/delete/'.explode('/', $student -> reg_id)[3]); ?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                 </td>
               </tr>
  <?php endforeach; ?>
        </tbody>
      </table>
    </div><!--end .section-body -->
  </section>
</div><!--end #content-->
<!-- END CONTENT -->