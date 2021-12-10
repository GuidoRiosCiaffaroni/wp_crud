<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Delete_form', 'Kfp_Delete_form');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */

function Kfp_Delete_form() 
{

    /*Variables Globales*/
    global $wpdb;
    global $wpbc_db_version;
    global $sistname;
    global $user_id;
    global $status_user;
    global $user_dirname;
    global $upload_dir;
    global $dir_file;
    global $file_name;  

    $informacion1    = sanitize_text_field($_GET['variable1']);
    $informacion2    = sanitize_text_field($_GET['variable2']);


echo 'esto es un texto ---->' . $informacion1 . '</br>' ;
echo 'esto es un texto ---->' . $informacion2 . '</br>' ;

// header("Location: http://localhost/wordpress/insert/");

}

?>