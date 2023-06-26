<?php

namespace Pavenest\Stock_Tracker\Db;


class StocksMigrator
{

    /**
     * Migrate the table.
     *
     * @return void
     */
    public static function migrate()
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . 'pvst_stocks';
        $indexPrefix = $wpdb->prefix . 'pvst_comp_';

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
		    `id` BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`name` VARCHAR(200) NOT NULL ,
			`code` VARCHAR(50) NOT NULL ,
			
			`category` VARCHAR(2) NOT NULL ,
			`sector` VARCHAR(50) NOT NULL ,
			`listing_year` VARCHAR(4) NOT NULL ,
			
			
			
            INDEX `{$indexPrefix}_code_idx` (`code` ASC),
            INDEX `{$indexPrefix}_status_idx` (`sector` ASC)
            ) $charsetCollate;";

            dbDelta($sql);
        }
    }
}


