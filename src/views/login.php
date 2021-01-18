<?php
session_start();
require 'partials/head.php';
require 'partials/navbar.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login']) && !empty($_POST['username'] &&
    !empty($_POST['password']))) {
        $user = $entityManager->getRepository('User')->findBy(['username' => $_POST['username']]);
        if($user) {
            $username = $user[0]->getUsername();
            $password = $user[0]->getPassword();
            print_r(md5($_POST['password']) === $p);
            if($password === md5($_POST['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $user[0]->getIsAdmin();
            Header('Location: login');
            }
        }
        else {
            echo '<h3 class="display-6 mt-4 text-danger text-center">Invalid username or password</h3>';
        }

}

if ($redirect_to === "logout") {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['admin']);
    Header('Location: login');

}



if (!$_SESSION['logged_in']) {
    echo '<div class="container d-flex justify-content-center">
<form class="login mt-3 validated-form" action="login" id="login" method="POST">
        <input type="hidden" name="login" value="y">
        <div class="input-container">
            <input type="text" id="username" name="username" autocomplete="off" required>
            <label for="username" class="label-name">
                <span class="content-name">Enter your username</span>
            </label>
        </div>
        <div class="input-container mb-3">
            <input type="password" id="password" name="password" autocomplete="off" required>
            <label for="password" class="label-name">
                <span class="content-name">Enter your password </span>
            </label>
        </div>
        <button type="Submit" class="btn btn-dark">Login</button>
    </form>
</div>
';

} else {
    echo '<h3 class="display-6 mt-4 text-secondary text-center">
        Welcome, ' . $_SESSION['username'] . ', you have successfully logged in
        </h3>';
}

require 'partials/footer.php';
