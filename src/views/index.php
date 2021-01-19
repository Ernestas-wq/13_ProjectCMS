<?php
session_start();
require 'partials/head.php';
require 'partials/navbar.php';

if (isset($_GET['p'])) {
    // Representation boilerplate
    $page = $entityManager->find('Page', $_GET['p']);

    if ($page) {
        echo '<h1 class="display-2 text-center">' . $page->getTitle() . '</h1>';
        echo '<div class="container">' . $page->getContents() . '</div>';
    } else {
        echo '<h1 class="display-4 text-danger">Sorry, page not found</h1>';
    }
} else {
    $home_page = $entityManager->find('Page', 1);
    echo '<h1 class="display-2 text-center">' . $home_page->getTitle() . '</h1>';
    echo '<div class="container">' . $home_page->getContents() . '</div>';

}

require 'partials/footer.php';
