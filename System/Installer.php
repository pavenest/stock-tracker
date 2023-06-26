<?php

namespace Pavenest\Stock_Tracker\System;

use Pavenest\Stock_Tracker\Db\Migrator;
use Pavenest\Stock_Tracker\Db\Seeder;

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
