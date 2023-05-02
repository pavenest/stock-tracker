<?php

namespace Pavenest\Swatch_Suite\System;

use Pavenest\Swatch_Suite\Db\Migrator;
use Pavenest\Swatch_Suite\Db\Seeder;

class Installer
{
    public static function activate()
    {
        Migrator::install();
        Seeder::seed();
    }

    public static function deactivate()
    {

    }
}
