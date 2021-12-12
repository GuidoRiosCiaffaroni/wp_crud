<?php
/******************************************************************************************/
// Archivo : frontend_edit.php
// Funcion : Kfp_Edit_form() 'Edita los datos'
// Objetos : $wpdb->get_results($query)

/******************************************************************************************/


/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Edit_form', 'Kfp_Edit_form');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */

function Kfp_Edit_form() 
{

  /*Variables globales*/

global $wpdb;         // datos del sistema
global $wpbc_db_version;  // Version del base de datos - utilizado para las actualizaciones
global $sistname;     // nombre de la tabla de sistema
global $user_id;      // ID del usuario
global $status_user;    // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;     // Nombre de archivo a subir
global $file_name;  


$tabla_crud = $wpdb->prefix . $sistname; // objeto base de datos

$id      = sanitize_text_field($_GET['id']);
$key_id  = sanitize_text_field($_GET['key_id']);

$query = 'SELECT * FROM '.$tabla_crud.' WHERE id = '.$id;
$registros = $wpdb->get_results($query);

// nombre de los campos de la tabla
foreach ($registros as $registros) 
{
    $id = $registros->id;
    $user_id = $registros->user_id; 
    $key_id = $registros->key_id; 
    $nint = $registros->nint;
    $date = $registros->date;
    $dir_file_linux = $registros->dir_file_linux;
    $dir_file_win = $registros->dir_file_win;
    $dir_file = $registros->dir_file;
    $status_id = $registros->status_id;
    $create_at = $registros->create_at;  
}

$wpdb->insert(
  $tabla_crud,
    array(
      'user_id'         => $user_id,
      'key_id'          => $key_id,
      'nint'            => $nint,
      'date'            => $date,
      'dir_file_linux'  => $dir_file_linux,
      'dir_file_win'    => $dir_file_win,
      'dir_file'        => $dir_file,
      'status_id'       => 0,
    )
);

$wpdb->update( $tabla_crud, 
  // Datos que se remplazarán
  array( 
    'status_id' => '0'
  ),
  // Cuando el ID del campo es igual al número $key_id
  array( 'key_id' => $key_id )
);


//$query = 'SELECT * FROM '.$tabla_crud.' WHERE id = '.$id;
//$registros = $wpdb->get_results($query);


//SELECT MAX(id) AS id FROM wordpress.wp_crud where wordpress.wp_crud.key_id='4cJqU79Em8ZQ'
$query2 = 'SELECT MAX(id) AS id FROM '.$tabla_crud.' where key_id=''

$registros2 = $wpdb->get_results($query2);
foreach ($registros2 as $registros2)
{
    $id2 = $registros2->id;
    
}
echo '----------------->>>>'. $id2 . '</br>'; 
echo 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

/*
select top 1 *
  from tabla
 where nombre_ruta = 'valor_ruta'
 order by fecha desc
*/

}
?>

