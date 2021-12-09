<?php
function wpdb_install()
{
    // Variables Globales 
    global $wpdb;
    global $sistname;
    global $wpbc_db_version;

    $table_name = $wpdb->prefix . $sistname; 

    // QUERY 
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id VARCHAR (100) NOT NULL,
        key_id VARCHAR (100) NOT NULL,
        nint VARCHAR (100) NOT NULL,
        date VARCHAR (100) NOT NULL, 
        dir_file_linux VARCHAR (100) NOT NULL,
        dir_file_win VARCHAR (100) NOT NULL,
        dir_file VARCHAR (100) NOT NULL, 
        status_id VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY  (id)
    );";

    // Ejecucion de la QUERY
    dbDelta($sql); 

}

?>