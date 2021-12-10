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


    $tabla_crud = $wpdb->prefix . $sistname; // objeto base de datos


    $id      = sanitize_text_field($_GET['id']);
    $key_id  = sanitize_text_field($_GET['key_id']);


    $query = 'SELECT * FROM wp_crud WHERE id = '.$id;
    $registros = $wpdb->get_results($query);


    // nombre de los campos de la tabla
    foreach ($registros as $registros) 
    {
        $result .= 
            '
            <tr>
                <th>'.$registros->id.'</th>
                <th>'.$registros->user_id.'</th> 
                <th>'.$registros->key_id.'</th> 
                <th>'.$registros->nint.'</th>
                <th>'.$registros->date.'</th>
                <th>'.$registros->dir_file_linux.'</th>
                <th>'.$registros->dir_file_win.'</th>
                <th>'.$registros->dir_file.'</th>
                <th>'.$registros->status_id.'</th>
                <th>'.$registros->create_at.'</th>                 
            </tr>
            ';
            $key_id = $registros->key_id; 
/*
            $id = $registros->id;
            $user_id = $registros->user_id; 
            $key_id = $registros->key_id; 
            $nint = $registros->nint;
            $date = $registros->date;
            $dir_file_linux = $registros->dir_file_linux;
            $registros->dir_file_win;
            $registros->dir_file;
            $registros->status_id;
            $registros->create_at;  

*/

        }

        $template = '<table class="table-data">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th> 
                        <th></th> 
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      {data}
                    </table>';

        return $content.str_replace('{data}', $result, $template);        



        // $query = 'SELECT * FROM wp_crud WHERE id = '.$id;
        //$query = 'UPDATE wp_crud SET status_id = 0 WHERE ( key_id = '.$registros->key_id.')';



        $wpdb->update( 'wp_crud', 
            // Datos que se remplazarán
            array( 
                'status_id' => '0'
            ),
            // Cuando el ID del campo es igual al número 1
            array( 'key_id' => $key_id )
        );


// header("Location: http://localhost/wordpress/insert/");

}

?>