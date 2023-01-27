<?php
use App\Services\Page;
use App\Models\Post;
use \App\Utils\RouteConsts;

$posts = new Post();
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

                            <?php foreach ($posts->all() as $post) : ?>
                                <article class="post">
                                    <header>
                                        <div class="title">
                                            <h2><a href="post.php"><?= $post->title ?></a></h2>
                                        </div>
                                        <div class="meta">
                                            <time class="published" datetime="2015-11-01">November 1, 2015</time>
                                            <span class="name">Jane Doe</span>
                                        </div>
                                    </header>
                                    <a href="post.php" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                                    <p><?= $post->description ?></p>
                                    <footer>
                                        <ul class="actions">
                                            <li><a href="<?= RouteConsts::POSTS_ROUTE . "/". $post->id ?>" class="button large">Continue Reading</a></li>
                                        </ul>
                                        <ul class="stats">
                                            <li><a href="#" style="color: #a00">Remove</a></li>
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