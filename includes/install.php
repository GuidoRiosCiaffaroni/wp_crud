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
        nint VARCHAR (50) NOT NULL, 
        dir_archivo_externo VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY  (id)
    );";

    // Ejecucion de la QUERY
    dbDelta($sql); 

}

?>