<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc723efc50ae63e4c172b34058e154fce
{
    public static $files = array (
        'fc73bab8d04e21bcdda37ca319c63800' => __DIR__ . '/..' . '/mikecao/flight/flight/autoload.php',
        '5b7d984aab5ae919d3362ad9588977eb' => __DIR__ . '/..' . '/mikecao/flight/flight/Flight.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitc723efc50ae63e4c172b34058e154fce::$classMap;

        }, null, ClassLoader::class);
    }
}
