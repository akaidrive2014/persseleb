<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		
	<!-- bootstrap framework -->
	<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- google webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'>
		
	<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/css/login.css" rel="stylesheet">
	<!--custom yii-->
	<link rel="stylesheet" href="<?php echo $this->baseUrl();?>/css/form.css">
	<link href="<?php echo $this->baseTheme();?>/admin/tisa/assets/icons/ionicons/css/ionicons.min.css" rel="stylesheet" media="screen">
	<!-- jQuery -->
	<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/js/jquery.min.js"></script>
</head>
<body>
	
	<?php echo $content;?>
	
	<!-- bootstrap js plugins -->
	<script src="<?php echo $this->baseTheme();?>/admin/tisa/assets/bootstrap/js/bootstrap.min.js"></script>
	<script>
		$(function() {
			// switch forms
			$('.open_forgot_form').click(function(e) {
				e.preventDefault();
				$('#login_form').removeClass().addClass('animated fadeOutDown');
				setTimeout(function() {
					$(".error").removeClass('error');
					$(".errorMessage").empty();
					$("input[type=text],input[type=password]").val("");
					$('#login_form').removeClass().hide();
					$('#forgot_form').show().addClass('animated fadeInUp');
				}, 700);
			})
			$('.open_login_form').click(function(e) {
				e.preventDefault();
				$(".error").removeClass('error');
				$(".errorMessage").empty();
				$("input[type=text],input[type=password]").val("");
				$('#forgot_form').removeClass().addClass('animated fadeOutDown');
				setTimeout(function() {
					$('#forgot_form').removeClass().hide();
					$('#login_form').show().addClass('animated fadeInUp');
				}, 700);
			})
		})
	</script>
</body>
</html>