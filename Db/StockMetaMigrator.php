<?php

namespace Pavenest\Stock_Tracker\Db;


class StockMetaMigrator
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
        $table = $wpdb->prefix . 'pvst_company';
        $indexPrefix = $wpdb->prefix . 'pvst_comp_';

        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
            $sql = "CREATE TABLE $table (
		    `id` BIGINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`parent` BIGINT UNSIGNED NOT NULL DEFAULT 0,
			`title` VARCHAR(200) NOT NULL ,
			`code` VARCHAR(50) NOT NULL ,
			`status` VARCHAR(20) NOT NULL ,
			`type` VARCHAR(20) NOT NULL ,
			`scope` VARCHAR(20) NOT NULL DEFAULT 'all' ,
			`amount_type` VARCHAR(20) NOT NULL ,
			`amount` double NOT NULL ,
			`settings` LONGTEXT NOT NULL ,
			`max_uses` BIGINT UNSIGNED NOT NULL ,
			`use_count` BIGINT UNSIGNED NOT NULL ,
			`max_per_customer` INT NOT NULL ,
			`max_charge_amount` double NOT NULL ,
			`min_charge_amount` double NOT NULL ,
			`start_date` TIMESTAMP NULL ,
			`end_date` TIMESTAMP NULL ,
			`created_at` TIMESTAMP NULL ,
			`updated_at` TIMESTAMP NULL ,
			
            INDEX `{$indexPrefix}_code_idx` (`code` ASC),
            INDEX `{$indexPrefix}_status_idx` (`status` ASC)
            ) $charsetCollate;";

            dbDelta($sql);
        }
    }
}


