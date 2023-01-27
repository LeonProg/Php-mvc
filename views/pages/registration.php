<?php

use App\Services\Page;
use App\Services\Session;

?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
    <?php Page::part('head'); ?>
	<body class="single is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
                <?php Page::part('header');?>
				<!-- Main -->
					<div id="main">
						<!-- Post -->
						<article class="post">
							<h1>Registration</h1>
							<form action="/auth/registration" method="post">
								<label for="form-name">Your name</label>
								<input id="form-name" type="text" placeholder="Your name" name="name"><br>
								<label for="form-email">Your email</label>
								<input id="form-email" type="text" placeholder="Your email" name="email"> <span><?php Session::get("errors", "email"); ?></span><br>
								<label for="form-password">Your password</label>
								<input id="form-password" type="text" placeholder="Your password" name="password"><span><?php Session::get("errors", "password"); ?></span><br>
                                <label for="form-password-confirmed">Your password confirmed</label>
                                <input id="form-password-confirmed" type="text" placeholder="Your password confirmed" name="password_confirmed"><span><?php Session::get("errors", "password_confirmed"); ?><br>
								<input type="submit" value="Registration">
							</form>
						</article>
					</div>

			</div>
		<!-- Scripts -->
            <?php Page::part('script'); ?>
	</body>
</html>