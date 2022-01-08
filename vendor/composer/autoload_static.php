<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdccac26668f1065ff7c9873f1abe8f83
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'home\\' => 5,
        ),
        'c' => 
        array (
            'controllers\\' => 12,
        ),
        'a' => 
        array (
            'admin\\' => 6,
        ),
        'N' => 
        array (
            'NoahBuscher\\Macaw\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'home\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers/home',
        ),
        'controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers/admin',
        ),
        'NoahBuscher\\Macaw\\' => 
        array (
            0 => __DIR__ . '/..' . '/noahbuscher/macaw',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdccac26668f1065ff7c9873f1abe8f83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdccac26668f1065ff7c9873f1abe8f83::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdccac26668f1065ff7c9873f1abe8f83::$classMap;

        }, null, ClassLoader::class);
    }
}