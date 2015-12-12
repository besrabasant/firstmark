<!-- BEGIN CONTENT-->
<div id="content">
<section class="style-default-bright">
<?php

///ALERT BOX FOR STATUS MESSAGES///

if($this->session->flashdata('status')!=NULL):
?> 
<br>
<div class="alert alert-<?=$this->session->flashdata('status')?> fade in" role="alert">
<a href="#" class=" pull-right btn ink-reaction btn-icon-toggle btn-primary-dark close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>
<strong><?php echo $this->session->flashdata('msg'); ?></strong>
</div>
<?php
endif;
?>
<div class="section-header">
<h2 class="text-primary">View All Teacher</h2>
</div>
<div class="section-body">
<table id="table-students" class="table table-hover table-striped">
<thead>
<tr>
<th>Photo</th>
<th>Teacher Name</th>
<th>Registration No.</th>
<th>Gender</th>
<th>Ph. No.</th>
<th>Department</th>
<th>Position</th>
<th class="text-right">Actions&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>
</thead>
<tbody>
<?php foreach( $teacher_list as $index=>$teacher ): ?>
<tr data-Index="<?php echo $teacher->teacher_id; ?>">
<td><img class="height-1 width-1" src="<?php echo base_url('uploads/teacher/photo/'.$teacher->image_name);?>" alt=""></td>
<td><?php echo $teacher->first_name." ".$teacher->middle_name." ".$teacher->last_name; ?></td>
<td><?=$teacher->reg_id;?></td>
<td><?php switch($teacher->gender){
case 0: echo "Male"; break;
case 1: echo "Female"; break;
case 2: echo "Transgender"; break;
} ?></td>
<td><?=$teacher->phone?></td>
<td><?php switch($teacher->department_id){
case 1: echo "Department1"; break;
case 2: echo "Department2"; break;
case 3: echo "Department3"; break;
case 4: echo "Department4"; break;
} ?></td>

<td><?php echo ucfirst($teacher->position); ?></td>
<td class="text-right">
<a class="btn btn-icon-toggle" role="button" href="<?=base_url('teacher/edit/'.str_pad($teacher->teacher_id, 4, '0', STR_PAD_LEFT));?>" rel="tooltip"  data-original-title="Edit">                      
<i class="fa fa-pencil"></i>
</a>
<a class="btn btn-icon-toggle" role="button" href="<?=base_url('teacher/view/'.str_pad($teacher->teacher_id, 4, '0', STR_PAD_LEFT));?>" rel="tooltip"  data-original-title="View">
<i class="fa fa-eye"></i>
</a>
<a class="btn btn-icon-toggle" href="<?=base_url('teacher/delete/'.str_pad($teacher->teacher_id, 4, '0', STR_PAD_LEFT));?>" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div><!--end .section-body -->
</section>
</div><!--end #content-->
<!-- END CONTENT -->