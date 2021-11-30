<!DOCTYPE html>
<html>
<head>
	<title>SPP | Cek Tagihan Siswa</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $this->config->item('app_name') ?> <?php echo isset($title) ? ' | ' . $title : null; ?></title>
	<link rel="icon" type="image/png" href="<?php echo media_url('img/logosmk12.png') ?>">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/frontend-style.css">
	<link rel="stylesheet" href="<?php echo media_url() ?>/css/load-font-googleapis.css">
	

	<script src="<?php echo media_url() ?>/js/jquery.min.js"></script>
	

</head>
<body>

	<nav class="navbar navbar-default fixed">
		<div class="navbar-header"> 
			<a class="navbar-brand" href=""> <b>PEMBAYARAN SPP</b>
			<img src="<?php echo upload_url('school/logo_smk.png') ?>" style="height: 40px; margin-top: -10px;" class="pull-left">
				
				
				 </a>
				<!-- <button type="button" class="btn btn-default navbar-btn pull-right">Sign in</button> -->
				
			</div>
                  
		</nav>


		<?php $this->load->view('frontend/home') ?>
		

		<script src="<?php echo media_url() ?>/js/bootstrap.min.js"></script>
	</body>
	</html>

