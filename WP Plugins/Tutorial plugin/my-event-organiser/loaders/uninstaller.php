<?php

function uninstall_tables() {
     global $wpdb;
     $table_name = $wpdb->prefix . 'meo_event';
     $table_name1 = $wpdb->prefix . 'meo_event_category';
     $table_name2 = $wpdb->prefix . 'meo_event_type';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $sql1 = "DROP TABLE IF EXISTS $table_name1";
     $sql2 = "DROP TABLE IF EXISTS $table_name2";
     $wpdb->query($sql);
     $wpdb->query($sql1);
     $wpdb->query($sql2);
}   


?>