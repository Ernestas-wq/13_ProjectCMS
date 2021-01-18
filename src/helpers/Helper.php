<?php declare (strict_types = 1) ?>
<?php
class Helper
{

    public static function getPath(string $request)
    {
        $x = explode('/', $request);
        return $x[count($x) - 1];
    }

    public static function startsWith(string $string, string $startString)
    {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

}
