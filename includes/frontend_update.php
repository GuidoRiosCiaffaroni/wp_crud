<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Update_form', 'Kfp_Update_form');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */

function Kfp_Update_form() 
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



  $registros = $wpdb->get_results( "SELECT * FROM wp_crud" );


$path = wp_get_upload_dir();

echo $path['path'].'</br>';
echo $path['url'].'</br>';
echo $path['subdir'].'</br>';
echo $path['baseurl'].'</br>';
echo $path['error'].'</br>';




        // nombre de los campos de la tabla
        foreach ($registros as $registros) {
            $result .= 
            '
            <tr>
              <th>'.$registros->nint.'</th>
              <th>'.$registros->date.'</th> 
              <th><a href="'.$path['url'].'\\'.date('d').'\\'.$registros->dir_file.'">Descarga</a></th> 
              <th>'.$registros->create_at.'</th>
            </tr>
            ';
        }



        $template = '<table class="table-data">
                      <tr>
                        <th>nint </th>
                        <th>date </th> 
                        <th>dir_file </th> 
                        <th>create_at </th>
                      </tr>
                      {data}
                    </table>';

        return $content.str_replace('{data}', $result, $template);


  }
// Ejecutamos nuestro funcion en WordPress
//add_action('wp', 'leer_wpdb');

?>