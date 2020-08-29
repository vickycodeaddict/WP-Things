<?php

/*
  Plugin Name: Demo Plugin Name
  Plugin URI: #
  Description: Demo of create table on plugin activation.
  Version: 1.0
  Author: Vicky P
  Author URI: #
 */

class WP_Demo_Plugin_With_Table {

    private $vars;

    public function __construct() {
        // Construct and Hooks
    }

    public function activate() {
        global $wpdb;
        $table_name = $wpdb->prefix . "plugin_table_name";

        $sql = "CREATE TABLE `" . $table_name . "` ( ";
        $sql .= "  `id` int(11)  NOT NULL auto_increment, ";
        $sql .= "  `user_id`  int(11) NOT NULL, ";
        $sql .= "  `note_subject`  varchar(255) DEFAULT ''  NOT NULL, ";
        $sql .= "  `note_content`  text DEFAULT ''  NOT NULL, ";
        $sql .= "  `insert_time` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL, ";
        $sql .= "  PRIMARY KEY (`id`) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    public function deactivate() {
        return true;
    }

}

register_activation_hook(__FILE__, array('WP_Demo_Plugin_With_Table', 'activate'));
register_deactivation_hook(__FILE__, array('WP_Demo_Plugin_With_Table', 'deactivate'));

$obj = new WP_Demo_Plugin_With_Table();
