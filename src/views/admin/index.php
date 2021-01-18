<?php
session_start();
require 'src/views/partials/head.php';
require 'src/views/partials/navbar.php';
require 'src/views/partials/delete_modal.php';
if ($_SESSION['logged_in'] && $_SESSION['admin']) {
    echo '<h1 class="display-5 mb-3">Manage pages </h1>';
    // Create
    if (isset($_POST['new'])) {
        // Not allowing empty values
        $title = trim($_POST['title']);
        $contents = trim($_POST['contents']);

        if ($title && $contents) {
            $page = new Page();
            $page->setTitle($title);
            $page->setContents($contents);
            $entityManager->persist($page);
            $entityManager->flush();
            Header('Location: admin');
        } else {
            echo '<h3 class="display-6 mt-4 text-danger">
        Please enter both values
        </h3>';
        }
    }
    // Update
    if (isset($_POST['edit'])) {
        $title = trim($_POST['title']);
        $contents = trim($_POST['contents']);
            if($title && $contents) {
             $page = $entityManager->find('Page', $_POST['id']);
            $page->setTitle($title);
            $page->setContents($contents);
            $entityManager->flush();
            Header('Location: admin');
            }
             else {
            echo '<h3 class="display-6 mt-4 text-danger">
        Please enter both values
        </h3>';
        }

    }

    if (isset($_POST['request_delete'])) {
        display_delete_modal($_POST['title'], $_POST['id']);
    }
    // Delete
    if (isset($_POST['confirm_delete'])) {
        $page = $entityManager->find('Page', $_POST['id']);
        $entityManager->remove($page);
        $entityManager->flush();
        Header('Location: admin');

    }

    echo '<table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Title</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>
         </tr>';

    // Representing pages
    if ($pages) {
        echo '<tbody>';

        foreach ($pages as $page) {
            $title = $page->getTitle();
            $id = $page->getId();
            if ($title === 'home') {
                echo '<tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </td>
        <td></td>
         <td><form action="edit" method="POST">
         <input type="hidden" name="id" value="' . $id . '">
         <button type="submit" class="btn btn-success">Edit</a>
         </form></td>
        </tr>';
            } else {
                echo ' <tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </th>
         <td><form action="admin" method="POST">
         <input type="hidden" name="id" value="' . $id . '">
         <input type="hidden" name="title" value=' . $title . '>
         <input type="hidden" name="request_delete" value="y">
         <button type="submit" class="btn btn-danger">Delete</button>
         </form></td>
         <td><form action="edit" method="POST">
         <input type="hidden" name="id" value="' . $id . '">
         <button type="submit" class="btn btn-success">Edit</a>
         </form></td>
        </tr>';
            }
        }
        echo '</tbody>';
    }
    echo '</thead></table>';

    echo '<a class="btn btn-info" href="new">Add Page</a>';
} else {
    '<h3 class="display-6 mt-4 text-secondary text-center">
        Not logged in or unauthorized user
        </h3>';
}

require 'src/views/partials/footer.php';
