<?php
    use App\Middleware\Authenticate;
?>
<header id="header">
    <h1><a href="index.php">Blog</a></h1>
    <nav class="links">
        <ul>
            <?php if(Authenticate::isAuth()) : ?>
                <li><a href="create-post.php">Create post</a></li>
                <li><a href="/auth/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Registration</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>