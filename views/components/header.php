<?php
    use App\Middleware\Authenticate;
    use \App\Utils\RouteConsts;
?>
<header id="header">
    <h1><a href="<?= RouteConsts::INDEX_ROUTE ?>">Blog</a></h1>
    <nav class="links">
        <ul>
            <?php if(Authenticate::isAuth()) : ?>
                <li><a href="<?= RouteConsts::CREATE_POST_ROUTE ?>">Create post</a></li>
                <li><a href="/auth/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="<?= RouteConsts::LOGIN_ROUTE ?>">Login</a></li>
                <li><a href="<?= RouteConsts::REGISTRATION_ROUTE ?>">Registration</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>