<?php
use App\Services\Page;
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
							<h1>Create post</h1>
							<form action="/create/post" method="post" enctype="multipart/form-data">
								<label for="form-title">Post title</label>
								<input id="form-title" type="text" placeholder="Post title" name="title"><br>
								<label for="form-description">Post description</label>
								<textarea id="form-description" placeholder="Post description" name="description"></textarea><br>
								<label for="form-content">Post content</label>
								<textarea id="form-content" placeholder="Post content" name="content"></textarea><br>
								<label for="form-image">Post image</label>
								<input id="form-image" type="file" name="images"><br><br>
								<input type="submit" value="Create">
							</form>
						</article>
					</div>

			</div>

		<!-- Scripts -->
            <?php Page::part('script'); ?>

	</body>
</html>