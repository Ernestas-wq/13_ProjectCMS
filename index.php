<?php declare (strict_types = 1) ?>
<?php
include_once 'bootstrap.php';
require 'src/helpers/Helper.php';

function startsWith(string $string,string $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}


$pages = $entityManager->getRepository('Page')->findAll();
$request = $_SERVER['REQUEST_URI'];
$redirect_to = Helper::get_path($request);


if (startsWith($redirect_to, 'page')) {
    require __DIR__ . '/src/views/index.php';
    return;
}
elseif($redirect_to === 'login' || $redirect_to === 'logout'
|| $redirect_to === '' || $redirect_to === '/' || $redirect_to === 'home') {
    require __DIR__ . '/src/views/login.php';
    return;
}
elseif($redirect_to === 'admin') {
    require __DIR__ . '/src/views/admin/index.php';
    return;
}
elseif ($redirect_to === "new") {
    require __DIR__ . '/src/views/admin/new.php';
    return;
} elseif ($redirect_to === "edit") {
    require __DIR__ . '/src/views/admin/edit.php';
    return;
}
else {
    require __DIR__ . '/src/views/404.php';
    return;
}



