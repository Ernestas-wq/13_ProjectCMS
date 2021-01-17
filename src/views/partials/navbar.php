<?php

echo '<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="home">Mini CMS</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">';

foreach ($views as $view) {
    echo '<li class="nav-item">
            <a  class="nav-link" href="' . $view . '"> ' . $view . ' </a>
            </li>';
}

if ($_SESSION['admin']) {
    echo '<li class="nav-item"><a class="nav-link" href="admin">Manage pages</a> </li>';
}

echo '</ul>';

if ($_SESSION['logged_in']) {
    echo '<div class=userUI>
        <span class="username">' . $_SESSION['username'] . '</span>
        <a class="nav-link" href="logout">Logout
        </a>
        </div>';

} else {
    echo '<div class=userUI>
        <a class="nav-link" href="login">Login
        </a>
        </div>';
}

echo '</div>
</nav>
<main class="container mt-5" style="position: relative;">';
