<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit803716dbba4035d0a5fa558defdeb9ec
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'N' => 
        array (
            'Neha\\CarbonNeutral\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Neha\\CarbonNeutral\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit803716dbba4035d0a5fa558defdeb9ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit803716dbba4035d0a5fa558defdeb9ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit803716dbba4035d0a5fa558defdeb9ec::$classMap;

        }, null, ClassLoader::class);
    }
}