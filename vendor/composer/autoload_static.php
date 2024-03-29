<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a63de00e9de5dd29011781910ea9b62
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'B' => 
        array (
            'Bergu\\Meuprojeto\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Bergu\\Meuprojeto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a63de00e9de5dd29011781910ea9b62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a63de00e9de5dd29011781910ea9b62::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a63de00e9de5dd29011781910ea9b62::$classMap;

        }, null, ClassLoader::class);
    }
}
