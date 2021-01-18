<?php
session_start();
require 'partials/head.php';
require 'partials/navbar.php';

if (isset($_GET['p'])) {
    $page = $entityManager->find('Page', $_GET['p']);

    if ($_SESSION['logged_in']) {
        if ($page) {
            echo '<h1 class="display-2 text-center">' . $page->getTitle() . '</h1>';
            echo '<div class="container">' . $page->getContents() . '</div>';
        } else {
            echo '<h1 class="display-4 text-danger">Sorry, page not found</h1>';
        }
    } else {
        echo '<h3 class="display-6 mt-4 text-secondary text-center">
       Please log in to view the page
        </h3>';
    }

}

require 'partials/footer.php';
