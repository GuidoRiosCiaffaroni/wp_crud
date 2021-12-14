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
global $wpdb;               // datos del sistema
global $wpbc_db_version;    // Version del base de datos - utilizado para las actualizaciones
global $sistname;           // nombre de la tabla de sistema
global $tabla_crud;           // nombre de la tabla de sistema
global $user_id;            // ID del usuario
global $status_user;        // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;           // Nombre de archivo a subir
global $global_data;        // Almacenamiento de datos Globales
global $file_name;  
global $wp_session;         // Inicio sesion variables
global $global_data;



/*datos Obtenidos desde blade*/

$id                  = sanitize_text_field($_POST['edit_id']);
$edit_key_id         = sanitize_text_field($_POST['edit_key_id']);
$confir_insert       = sanitize_text_field($_POST['confir_insert']);

$edit_nint           = sanitize_text_field($_POST['edit_nint']);  
$edit_date           = sanitize_text_field($_POST['edit_date']);   

if ($confir_insert == 1)
{
  $tabla_crud = $wpdb->prefix . $sistname; // objeto base de datos

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

  /*Inicio  Crea Duplicado de datos desactivados */
  $global_data = array(
    'user_id'           => $user_id,
    'key_id'            => $key_id,
    'nint'              => $nint,
    'date'              => $date,
    'dir_file_linux'    => $dir_file_linux,
    'dir_file_win'      => $dir_file_win,
    'dir_file'          => $dir_file,
    'status_id'         => '0',
    );

  $wpdb->insert($tabla_crud,$global_data); 
  /*Fin Crea Duplicado de datos desactivados*/

  /* Inicio desactiva los documentos de la base de datos */
  $wpdb->update( $tabla_crud, 
    array( 
      'status_id' => '0'
    ),
    array( 
      'key_id' => $key_id 
    )
  );
  /* Fin desactiva los documentos de la base de datos */

  /* Inicio se obtienen el ultimo registro correspondiente a la key */
  $query = "SELECT MAX(id) AS id FROM ".$tabla_crud." where wp_crud.key_id='".$key_id."'";
  $last = $wpdb->get_results($query);
  foreach ($last as $last) 
  {
    $last_id = $last->id;
  }
/* Fin se obtienen el ultimo registro correspondiente a la key */


  /* Inicio desactiva los documentos de la base de datos */
  $wpdb->update( $tabla_crud, 
    array( 
      'nint' => $edit_nint,
      'date' => $edit_date,
      'status_id' => '1'
    ),
    array( 
      'id' => $last_id
    )
  );
  /* Fin desactiva los documentos de la base de datos */


}




form_edit();
//add_action('init', 'form_edit');



}

?>

