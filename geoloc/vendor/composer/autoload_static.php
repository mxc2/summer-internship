<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2a712212437c58ee35190a62db4b716
{
    public static $files = array (
        'cf97c57bfe0f23854afd2f3818abb7a0' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/create_uploaded_file.php',
        '9bf37a3d0dad93e29cb4e1b1bfab04e9' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/marshal_headers_from_sapi.php',
        'ce70dccb4bcc2efc6e94d2ee526e6972' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/marshal_method_from_sapi.php',
        'f86420df471f14d568bfcb71e271b523' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/marshal_protocol_version_from_sapi.php',
        'b87481e008a3700344428ae089e7f9e5' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/marshal_uri_from_sapi.php',
        '0b0974a5566a1077e4f2e111341112c1' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/normalize_server.php',
        '1ca3bc274755662169f9629d5412a1da' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/normalize_uploaded_files.php',
        '40360c0b9b437e69bcbb7f1349ce029e' => __DIR__ . '/..' . '/zendframework/zend-diactoros/src/functions/parse_cookie_header.php',
        'a16312f9300fed4a097923eacb0ba814' => __DIR__ . '/..' . '/igorw/get-in/src/get_in.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Diactoros\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'O' => 
        array (
            'OpenCage\\Geocoder\\' => 18,
        ),
        'I' => 
        array (
            'Ivory\\HttpAdapter\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Diactoros\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-diactoros/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'OpenCage\\Geocoder\\' => 
        array (
            0 => __DIR__ . '/..' . '/opencage/geocode/src',
        ),
        'Ivory\\HttpAdapter\\' => 
        array (
            0 => __DIR__ . '/..' . '/egeloen/http-adapter/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'G' => 
        array (
            'Geocoder' => 
            array (
                0 => __DIR__ . '/..' . '/willdurand/geocoder/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2a712212437c58ee35190a62db4b716::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2a712212437c58ee35190a62db4b716::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb2a712212437c58ee35190a62db4b716::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb2a712212437c58ee35190a62db4b716::$classMap;

        }, null, ClassLoader::class);
    }
}
