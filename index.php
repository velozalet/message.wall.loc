<?php
require "main_config.php";
require "login_with_facebook.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Wall of Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="assets/css/font-awesome.css" rel="stylesheet"> <!-- подключ.css-файл font-awesome со шрифт.иконками-->
	<link href="assets/css/style.css" rel="stylesheet" media="screen">

	<script src="assets/js/jquery-2.2.3.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/main.js" type="text/javascript"></script>
  </head>

<body>

<!-- CONTAINER-FLUID -->
<div class='container-fluid'>

	<header>
		<div id="block_info_user">
			<div id="user_data" data-id="<?=$_COOKIE["user_id_in_fb"];?>">
				<?php if( !isset($_COOKIE["user_name_in_fb"]) || empty($_COOKIE["user_name_in_fb"]) ):  //if User is not login in,- redirect to logination page ?>
					<span class="hello_guest">
						<a href="http://<?=$_SERVER['HTTP_HOST'];?>/login_with_facebook.php" class="text-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="Залогиниться" title="Залогиниться">
							Hello, Guest
						</a>
					</span>
				<?php else:  //if User login in,- show his Name & his Avatar ?>
					<span class="user_true">
						Hello,<a href="<?=$_COOKIE["user_link_in_fb"];?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Go to you account Facebook" title="Go to you account Facebook" target="_blank">
								<strong><i><?=$_COOKIE["user_name_in_fb"];?></i></strong>
							  </a>
					</span>
					<span>
						<img src="<?=$_COOKIE["user_avatar_in_fb"];?>" alt="url avatar user" target="_blank">
					</span>
				<?php endif; ?>

				<?php if( isset($_COOKIE["user_name_in_fb"]) ): ?>
					<div id="login_out_button_in_fb">
						<fb:login-button autologoutlink="true" scope="public_profile,email" onlogin="checkLoginState();"> <!--autologoutlink="true"-->
						</fb:login-button>
					</div>
				<?php endif; ?>
			</div>
		</div>
<br>

		<h3 class="text-center">Wall of Message <i class="fa fa-book fa-lg"></i></h3>
	</header>

</div>

<br>
<!--__/CONTAINER -->
<div class='container'>
	<div id="down"> Down &#8681 </div>   <!-- lift button "Down" -->

	<section id="create_post_or_need_login">

		<?php if( !isset($_COOKIE["user_name_in_fb"]) || empty($_COOKIE["user_name_in_fb"])  ):  //if User is not login in,- redirect to logination page ?>
		<div class="section_1">
			<a href="http://<?=$_SERVER['HTTP_HOST'];?>/login_with_facebook.php" class="text-danger" data-toggle="tooltip" data-placement="bottom" data-original-title="Залогиниться" title="Залогиниться">
				Для добавления и комментирования сообщений выполните "Вход"
			</a>
		</div>
		<?php else:  //if User login in,- show button with right create post ?>
			<div class="section_1">
				<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_create_post">
					<em class='fa fa-lg fa-paperclip'></em> Create post
				</button>
			</div>
		<?php endif; ?>

	</section>
<br>
	<section id="main_content">
		<?php require_once "views/tmp_view_allposts.php"; ?>
	</section>

</div>
<!--__/CONTAINER -->


<?php require_once "views/modal_window_create_post.php"; ?> <!--include modal window with form to send post in "Guest Book"-->


<div class="buttonchic-glav " id="up"> Up &#8679 </div> <!-- lift button "Up" -->
  </body>
</html>