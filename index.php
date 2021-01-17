<?php declare (strict_types = 1) ?>
<?php
include_once 'bootstrap.php';
require 'src/helpers/Helper.php';
require 'src/models/Page.php';
$sep = DIRECTORY_SEPARATOR;
$views_dir = getcwd() . $sep . 'src' . $sep  . 'views' . $sep;
$boilerplate = file_get_contents('src/views/partials/boilerplate.txt', true);

$pages = $entityManager->getRepository('Page')->findAll();
foreach($pages as $page) {
    $title = $page->getTitle();
    $file = fopen("src/views/" . $title . ".php", "w") or die ("Unable to open file");
    fwrite($file, $boilerplate);
    fclose($file);
}


$request = $_SERVER['REQUEST_URI'];
$views = [];

$redirect_to = Helper::get_path($request);


$track_matches = 0;
$scan_views = scandir(__DIR__ . "/src/views");
// print_r($redirect_to);
// Getting neccessary views
for($i = 0 ; $i < count($scan_views); $i++) {
    if(is_file(__DIR__ . '/src/views/' . $scan_views[$i])) {
        $view = Helper::remove_file_ext($scan_views[$i]);
        if($view !== '404' && $view !== 'index'){
            array_push($views, $view);
        }
    }
}
// Routing
if($redirect_to === "login" || $redirect_to === "logout" || $redirect_to === ""){
    require __DIR__ . '/src/views/index.php';
    return;
}
elseif($redirect_to === "admin") {
    require __DIR__ . '/src/views/admin/index.php';
}
elseif($redirect_to === "new") {
    require __DIR__ . '/src/views/admin/new.php';
}
elseif($redirect_to === "edit") {
    require __DIR__ . '/src/views/admin/edit.php';
}
else {
    for($i = 0; $i < count($views); $i++) {
        if($redirect_to === $views[$i]) {
            $track_matches += 1;
            require __DIR__ . '/src/views/'.$views[$i].'.php';
            return;
        }
    }
    // By default 404
    if ($track_matches === 0) {
    require __DIR__ . '/src/views/404.php';
}

}



