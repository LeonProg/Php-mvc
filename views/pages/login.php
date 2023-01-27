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

                <?php Page::part('header'); ?>
                <!-- Main -->
					<div id="main">
						<!-- Post -->
						<article class="post">
							<h1>Login</h1>
							<form action="/auth/login" method="post"
								<label for="form-email">Your email</label>
								<input id="form-email" type="text" placeholder="Your email" name="email"><br>
                                <span><?php Session::get("errors", "email"); ?> </span>
                                <label for="form-password">Your password</label>
								<input id="form-password" type="text" placeholder="Your password" name="password"><br>
								<input type="submit" value="Login">
							</form>
						</article>
					</div>

			</div>

		<!-- Scripts -->
            <?php Page::part('script'); ?>

	</body>
</html>