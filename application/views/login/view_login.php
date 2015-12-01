<!DOCTYPE html>
<html lang="en">
	<head>
    <title><?php echo $title; ?></title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
    <link href='<?php echo base_url() ?>/assets/css/roboto.css' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/theme-default/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/theme-default/materialadmin.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/theme-default/font-awesome.min.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/theme-default/material-design-iconic-font.min.css" />
		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/libs/utils/html5shiv.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/libs/utils/respond.min.js"></script>
		<![endif]-->
		<style>
      section.section-account .img-backdrop, section.section-account .spacer {
         height: 100px;
      }
      
      .card-body {
        background-color: rgba(255,255,255,0.18);
        padding-bottom: 20px;
      }
      
		.form-group .form-control ~ label::after,
		.form-group .form-control ~ .form-control-line::after {
			background-color: #fff;
		}
    
    .form-group label {
      color:#fff !important;
    }
    
    .form-control {
      color:#fff;
    }
		
    .text-danger,
    .help-block{
      color:#FF003F;
    }
    
    #forgotpassword {
      margin-top: 20px;
      color: #CB8100;
      text-align: center;
      font-style: italic;
    }
    
    .glyphicon {
      color:#fff !important;
    }
    
		</style>
		
	</head>
	<body class="menubar-hoverable header-fixed " style="background-image: url('./assets/img/bg-login.jpg')">

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="img-backdrop" ></div>
			<div class="spacer"></div>
			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-offset-2 col-sm-8">
							<br/>
              <h3 class="text-xxl text-center text-bold text-default-bright"><?php echo $header; ?></h3>
              <br/>
              <?php echo form_open('login', array('class'=>'form floating-label','accept-charset'=>'utf-8')); ?>
								<div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user fa-lg"></span>
                    </span>
                  <div class="input-group-content">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                  <?php echo form_error('username'); ?>
                  <?php echo form_label('Username or E-mail','username'); ?>
                  </div>
								</div>
								<div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-lock fa-lg"></span>
                    </span>
                  <div class="input-group-content">
                  <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
                   <?php echo form_error('password'); ?>
									<?php echo form_label('Password','password'); ?>
                  </div>
								</div>
								<br/>
								<div class="row">
                  <div class="col-xs-6 text-danger" style="height:20px;">
                    <?php if(isset($error)){ ?>
                            <?php echo $error; ?>
                    <?php } ?></div>
									<div class="col-xs-6 text-right">
                    <?php echo form_button(array('class'=>'col-xs-offset-4 col-xs-8 btn btn-info btn-raised','type'=>'submit','value'=>'true'),'Login'); ?>
									</div><!--end .col -->
								</div><!--end .row -->
                <?php echo form_close(); ?>
                
                <div id="forgotpassword" class="text-warning">Forgot Password? Please contact your School Admin.</div>
						</div><!--end .col -->
            
							</div><!--end .row -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

				<!-- BEGIN JAVASCRIPT -->
				<script src="<?php echo base_url() ?>/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/libs/bootstrap/bootstrap.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/libs/spin.js/spin.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/libs/autosize/jquery.autosize.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/App.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppNavigation.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppOffcanvas.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppCard.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppForm.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppNavSearch.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/source/AppVendor.js"></script>
				<script src="<?php echo base_url() ?>/assets/js/core/demo/Demo.js"></script>
				<!-- END JAVASCRIPT -->

			</body>
		</html>
