<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Update_form', 'Kfp_Update_form');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */

function Kfp_Update_form() 
{

/*Variables globales*/

global $wpdb;             // datos del sistema
global $wpbc_db_version;  // Version del base de datos - utilizado para las actualizaciones
global $sistname;         // nombre de la tabla de sistema
global $user_id;          // ID del usuario
global $status_user;      // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;         // Nombre de archivo a subir
global $file_name;  


$query = 'SELECT * FROM wp_crud WHERE status_id = 1 ';
$registros = $wpdb->get_results($query);

$path_uploads = wp_get_upload_dir();

/*
echo $path_uploads['path'].'</br>';
echo $path_uploads['url'].'</br>';
echo $path_uploads['subdir'].'</br>';
echo $path_uploads['baseurl'].'</br>';
echo $path_uploads['error'].'</br>';
*/

$path_plugins = plugins_url();
echo $path_plugins;

        // nombre de los campos de la tabla
        foreach ($registros as $registros) {
            $result .= 
            '
            <tr>
              <th>'.$registros->nint.'</th>
              <th>'.$registros->date.'</th> 
              <th><a href="'.$path_uploads['baseurl'].$registros->dir_file_linux.$registros->dir_file.'">Descarga</a></th> 
              <th><a href="">Detalle</a></th> 
              <th><a href="http://localhost/wordpress/delete/?id='.$registros->id.'&key_id='.$registros->key_id.'">Borrar</a></th>
              <th><a href="http://localhost/wordpress/edit/?id='.$registros->id.'&key_id='.$registros->key_id.'">Actualizar</a></th>  
            </tr>
            ';
        }



        $template = '<table class="table-data">
                      <tr>
                        <th>nint </th>
                        <th>date </th> 
                        <th>dir_file </th> 
                        <th>detalle </th>
                        <th>Borrar </th>
                        <th>Actalizar </th>
                      </tr>
                      {data}
                    </table>';

        return $content.str_replace('{data}', $result, $template);




        echo '</br>';




  }
// Ejecutamos nuestro funcion en WordPress
//add_action('wp', 'leer_wpdb');
//https://mdbootstrap.com/docs/b4/jquery/tables/pagination/#docsTabsOverview
?>

