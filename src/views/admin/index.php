<?php
session_start();
require 'src/views/partials/head.php';
require 'src/views/partials/navbar.php';


if ($_SESSION['logged_in'] && $_SESSION['admin']) {
    echo '<h1 class="display-5 mb-3">Manage pages </h1>';

    if (isset($_POST['new'])) {
        $title = trim($_POST['title']);
        $contents = trim($_POST['contents']);
        if ($title && $contents) {
            $page = new Page();
            $page->setTitle($title);
            $page->setContents($contents);
            $entityManager->persist($page);
            $entityManager->flush();
            Header('Location: admin');
            echo '<h3 class="display-6 mt-4 text-success">Page ' . $title . ' added successfully</h3>';
        } else {
            echo '<h3 class="display-6 mt-4 text-danger">
        Please enter both values
        </h3>';
        }
    }
    if(isset($_POST['edit'])) {
            $new_title = $_POST['title'];
            $old_title = $_POST['old_title'];
            $contents = $_POST['contents'];
            $page = $entityManager->find('Page', $_POST['id']);
            if($new_title !== $old_title) {
                Helper::delete_view($views_dir, $old_title);
            }
            $page->setTitle($new_title);
            $page->setContents($contents);
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
    $pages = $entityManager->getRepository('Page')->findAll();

    if ($pages) {
        echo '<tbody>';

        foreach ($pages as $page) {
            $title = $page->getTitle();
            $id = $page->getId();
            if ($title === 'home') {
                echo '<tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </td>
        <td></td>
         <td> <a class="btn btn-success" href="edit">Edit </a> </td>
        </tr>';
            } else {
                echo ' <tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </th>
         <td> <button class="btn btn-danger">Delete </button> </td>
         <td><form action="edit" method="POST">
         <input type="hidden" name="id" value="'.$id.'">
         <button type="submit" class="btn btn-success">Edit</a>
         </form></td>
        </tr>';
            }

            echo '<form> </form>';
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
