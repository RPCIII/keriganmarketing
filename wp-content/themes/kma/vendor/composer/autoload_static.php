<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17cca1a0c829138921386bbb06a7a7e2
{
    public static $files = array (
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        'de85a44be454aa97188dad52ed888bed' => __DIR__ . '/..' . '/panique/laravel-sass/sass-compiler.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'K' => 
        array (
            'KeriganSolutions\\FacebookFeed\\' => 30,
            'KeriganSolutions\\CPT\\' => 21,
        ),
        'I' => 
        array (
            'Includes\\Modules\\' => 17,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'KeriganSolutions\\FacebookFeed\\' => 
        array (
            0 => __DIR__ . '/..' . '/kerigansolutions/facebookfeed/src',
        ),
        'KeriganSolutions\\CPT\\' => 
        array (
            0 => __DIR__ . '/..' . '/kerigansolutions/cpt/src',
        ),
        'Includes\\Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/modules',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
    );

    public static $classMap = array (
        'scss_formatter' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_formatter_compressed' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_formatter_crunched' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_formatter_nested' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_parser' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scss_server' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
        'scssc' => __DIR__ . '/..' . '/leafo/scssphp/scss.inc.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17cca1a0c829138921386bbb06a7a7e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17cca1a0c829138921386bbb06a7a7e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit17cca1a0c829138921386bbb06a7a7e2::$classMap;

        }, null, ClassLoader::class);
    }
}