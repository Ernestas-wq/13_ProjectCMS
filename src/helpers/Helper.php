<?php declare (strict_types = 1) ?>
<?php
class Helper {
    public static function get_path_one_level_up(string $path) {
        $c = explode(DIRECTORY_SEPARATOR, $path);
         $x = array_splice($c, 0, count($c) - 1);
        return implode(DIRECTORY_SEPARATOR, $x);

    }
    public static function remove_file_ext(string $file) {
        $c = explode('.', $file);
        return $c[0];
    }
    public static function get_path(string $request) {
    $x = explode('/', $request);
    return $x[count($x) - 1];
    }
    public static function get_filename_from_path(string $path) {
        $x = explode(DIRECTORY_SEPARATOR, $path);
        return explode('.', $x[count($x) - 1])[0];

    }


}