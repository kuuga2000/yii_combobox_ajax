<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>BELAJAR YII</title>
		<meta name="author" content="Sharive Kuuga" />
		<!-- Date: 2014-06-15 -->
		<link rel="stylesheet" type="text/css" href="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this -> baseUrl(); ?>/css/form.css" />
		<style>
			.table-bordered {
				width: 100% !important;
			}
			body {
				padding: 30px 30px;
			}
		</style>

	</head>
	<body>
		<?php echo $content; ?>
		<!-- Modal -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						&nbsp;
					</div>
					<div class="modal-body">
						<div class="view-x"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->
		<?php Yii::app() -> clientScript -> registerCoreScript('jquery'); ?>
		<?php Yii::app() -> clientScript -> registerCoreScript('jquery.ui'); ?>
		<script src="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo $this -> baseUrl(); ?>/themes/front/bootstrap/js/myJs.js"></script>
	</body>
</html>
