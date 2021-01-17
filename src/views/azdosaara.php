<?php
session_start();
require 'partials/head.php';
require 'partials/navbar.php';
$title = Helper::get_filename_from_path(__FILE__);
$page = $entityManager->getRepository('Page')->findBy(['title' => $title]);

$contents = $page[0]->getContents();

if ($_SESSION['logged_in']) {
    echo '<h1 class="display-2 text-center">' . $title . '</h1>';
    echo '<div class="container">' . $contents . '</div>';
} else {
    echo '<h3 class="display-6 mt-4 text-secondary text-center">
        Please log in to view the page
        </h3>';
}
require 'partials/footer.php';
