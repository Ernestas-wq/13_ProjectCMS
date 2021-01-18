<?php declare (strict_types = 1) ?>
<?php
class Helper {

    public static function get_path(string $request) {
    $x = explode('/', $request);
    return $x[count($x) - 1];
    }




}