<?php
use App\Services\Page;
use \App\Utils\RouteConsts;
use App\Controllers\PostsController;
use App\Models\User;

$posts = PostsController::getPosts();
?>

<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
    <?php Page::part('head'); ?>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
                <?php Page::part('header');?>
                <!-- Main -->
					<div id="main">
						<!-- Post -->
                            <?php foreach ($posts as $post) : ?>
                                <article class="post">
                                    <header>
                                        <div class="title">
                                            <h2><a href="post.php"><?= $post["title"] ?></a></h2>
                                        </div>
                                        <div class="meta">
                                            <time class="published" datetime="2015-11-01">November 1, 2015</time>
                                            <span class="name"><?php print_r($post["user"]["name"]) ?></span>
                                        </div>
                                    </header>
                                    <a href="<?= RouteConsts::POSTS_ROUTE . "/". $post["id"] ?>" class="image featured">
                                        <?php if(file_exists($post["cover_path"])): ?>
                                            <img src="<?="/" .$post["cover_path"] ?>" alt="" />
                                        <?php else: ?>
                                            <img src="/views/images/pic01.jpg" alt="" />
                                        <?php  endif; ?>
                                    </a>
                                    <p><?= $post["description"] ?></p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="<?= RouteConsts::POSTS_ROUTE . "/". $post["id"] ?>" class="button large">Continue Reading</a></li>
                                        </ul>
                                    </footer>
                                </article>
                            <?php endforeach; ?>
                        <!-- Post -->
					</div>
			</div>
		<!-- Scripts -->
            <?php Page::part('script'); ?>
	</body>
</html>