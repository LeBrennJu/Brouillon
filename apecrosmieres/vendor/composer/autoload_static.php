<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc8e5f90ac599a05a96002c8a69c5e32e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Migration\\' => 10,
        ),
        'F' => 
        array (
            'FrontAdmin\\' => 11,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Migration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Migration',
        ),
        'FrontAdmin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/front_admin',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/front_admin/Controller',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc8e5f90ac599a05a96002c8a69c5e32e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc8e5f90ac599a05a96002c8a69c5e32e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc8e5f90ac599a05a96002c8a69c5e32e::$classMap;

        }, null, ClassLoader::class);
    }
}
