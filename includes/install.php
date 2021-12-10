<?php
function wpdb_install()
{
/*Variables globales*/
global $wpdb;
global $wpbc_db_version;
global $sistname;
global $user_id;
global $status_user;
global $user_dirname;
global $upload_dir;
global $dir_file;
global $file_name;  

    $table_name = $wpdb->prefix . $sistname; 

    // QUERY 
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id VARCHAR (100) NOT NULL,
        key_id VARCHAR (100) NOT NULL,
        nint VARCHAR (100) NOT NULL, -- codigo de depatamento 
        nint_second VARCHAR (100) NOT NULL, -- numero de folio propio
        nint_third VARCHAR (100) NOT NULL, -- numero de folio 
        descipction VARCHAR (100) NOT NULL, -- descipction
        doc_type int(11) NOT NULL, -- tipo de documento
        date VARCHAR (100) NOT NULL, -- fecha
        
        dir_file_linux VARCHAR (100) NOT NULL,
        dir_file_win VARCHAR (100) NOT NULL,
        dir_file VARCHAR (100) NOT NULL,
        depart_id int(11) NOT NULL, -- Crear tabla 
        status_id VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY  (id),

    );";

    // Ejecucion de la QUERY
    dbDelta($sql); 

}

?>