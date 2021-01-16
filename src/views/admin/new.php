<?php
session_start();
require 'src/views/partials/head.php';
require 'src/views/partials/navbar.php';

if($_SESSION['logged_in'] && $_SESSION['admin']) {
    echo '<h1 class="display-5 mb-3 text-center">New Page</h1>
<div class="row">
    <div class="col-6 offset-3">
        <form action="admin" method="POST" novalidate class="validated-form">
        <input type="hidden" name="new" value="y">
            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" type="text" id="title" name="title" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="contents">Contents</label>
                <textarea class="form-control" id="contents" name="contents" required style="height: 200px"></textarea>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Add Page</button>
            </div>

        </form>
        </div>
</div>';
}
require 'src/views/partials/footer.php';
