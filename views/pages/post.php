<?php
use App\Services\Page;
use App\Controllers\PostsController;

$query = $_GET['q'] ?? '';
$params = explode('/', $query);

$post = new PostsController();
$post = PostsController::getPost($params[1]);

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
								<header>
									<div class="title">
										<h2><a href="#"><?= $post["title"] ?></a></h2>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">November 1, 2015</time>
										<span class="name">Jane Doe</span>
									</div>
								</header>
								<span class="image featured">
                                    <?php if(file_exists($post["cover_path"])): ?>
                                        <img src="<?= '/' .$post["cover_path"] ?>" alt="" />
                                    <?php else: ?>
                                        <img src="/views/images/pic01.jpg" alt="" />
                                    <?php  endif; ?>
                                </span>
                                <p><?= $post["description"] ?> </p>
                                <p><?= $post["content"] ?></p>
							</article>
					</div>

			</div>

		<!-- Scripts -->
            <?php Page::part('script'); ?>

	</body>
</html>