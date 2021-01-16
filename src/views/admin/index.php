<?php
session_start();
require 'src/views/partials/head.php';
require 'src/views/partials/navbar.php';
// require 'src/models/Page.php';


echo '<h1 class="display-5 mb-3">Manage pages </h1>';

echo '<table class="table table-bordered table-hover">
<thead class="thead-dark">
<tr>
        <th scope="col">Title</th>
        <th scope="col">Delete</th>
        <th scope="col">Edit</th>

     </tr>';
$pages = $entityManager->getRepository('Page')->findAll();



if($pages) {
    echo '<tbody>';

    foreach ($pages as $page) {
        $title = $page->getTitle();

        if($title === 'home') {
            echo '<tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </td>
        <td></td>
         <td> <button class="btn btn-success">Edit </button> </td>
        </tr>';
        }
        else {
            echo ' <tr>
        <th scope="row"><p style="font-size: 22px"> ' . $title . '</p> </th>
         <td> <button class="btn btn-danger">Delete </button> </td>
         <td> <button class="btn btn-success">Edit </button> </td>
        </tr>';
        }




}

echo '</tbody>';


}




echo '</thead></table>';

require 'src/views/partials/footer.php';
