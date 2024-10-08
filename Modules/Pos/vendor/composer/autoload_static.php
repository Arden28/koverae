<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc91c9401dff5f6e9782678bfd41873b2
{
    public static $files = array (
        '81244c866a6be71aefb7f4996f0512e3' => __DIR__ . '/../..' . '/Helpers/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Pos\\Database\\Seeders\\' => 29,
            'Modules\\Pos\\Database\\Factories\\' => 31,
            'Modules\\Pos\\App\\' => 16,
            'Modules\\Pos\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Pos\\Database\\Seeders\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database/seeders',
        ),
        'Modules\\Pos\\Database\\Factories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/database/factories',
        ),
        'Modules\\Pos\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Modules\\Pos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc91c9401dff5f6e9782678bfd41873b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc91c9401dff5f6e9782678bfd41873b2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc91c9401dff5f6e9782678bfd41873b2::$classMap;

        }, null, ClassLoader::class);
    }
}
