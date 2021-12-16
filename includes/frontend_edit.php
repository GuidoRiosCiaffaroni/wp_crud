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



/*Inicio datos Obtenidos desde blade*/
$id                  = sanitize_text_field($_POST['edit_id']);
$edit_key_id         = sanitize_text_field($_POST['edit_key_id']);
$confir_insert       = sanitize_text_field($_POST['confir_insert']); // confirma que los datos sean obtenidos desdes el blade y no desde otro lugar

$edit_nint           = sanitize_text_field($_POST['edit_nint']);  
$edit_date           = sanitize_text_field($_POST['edit_date']);
$edit_customFile     = wp_upload_bits( $_FILES['edit_customFile']['name'], null, @file_get_contents($_FILES['edit_customFile']['tmp_name'])); // almacena array de archivos   
/*Fin datos obtenidos desde el blade*/



if ($confir_insert == 1) // confirma que los datos sean obtenidos desde el blade 
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


/* Inicio subir archivo */

        $upload_dir   = wp_upload_dir();

        if ( ! empty( $upload_dir['basedir'] ) ) 
        {
            $user_dirname = $upload_dir['basedir'].'/'.date('Y').'/'.date('m').'/'.date('d').'/'; // Ruta de directorios donde se almacenara archivos

            if ( ! file_exists( $user_dirname ) ) 
            {
                wp_mkdir_p( $user_dirname ); // Crear directorios para almacenar archivos 
            }

            if ($_FILES['edit_customFile']['name'] != NULL)
            {
                $date_time = date('Y')."_".date('m')."_".date('d')."_".date("h_i_s_a",time())."_";
                $dir_file_linux = '/'.date('Y').'/'.date('m').'/'.date('d').'/'; // ruta de directorio para linux
                $dir_file_win = '\\'.date('Y').'\\'.date('m').'\\'.date('d').'\\'; // ruta de directorio para windows
                $dir_file = $date_time.$_FILES['edit_customFile']['name'];
                $file_name = $user_dirname.$date_time.''.$_FILES['edit_customFile']['name'];
                rename($edit_customFile['file'] , $file_name); // mueve archivos a carpeta creada 
            }
        }
  /*Fin subir archivo*/

/*
echo '=============================================================================================</br>'; 
echo '=>' .$upload_dir. '</br>'; 
echo '=>' .$upload_dir['basedir']. '</br>'; 
echo '=>' .$user_dirname. '</br>'; 
echo '=>' .$_FILES['edit_customFile']['name']. '</br>'; 
echo '=>' .$dir_file_linux. '</br>'; 
echo '=>' .$dir_file_win. '</br>'; 
echo '=>' .$dir_file. '</br>'; 
echo '=>' .$file_name . '</br>'; 
*/

/* Fin subir archivo */

  /* Inicio cambia datos en registro duplicado los documentos de la base de datos */
  $wpdb->update( $tabla_crud, 
    array( 
      'nint' => $edit_nint,
      'date' => $edit_date,
      'dir_file' => $dir_file,
      'status_id' => '1'
    ),
    array( 
      'id' => $last_id
    )
  );
  /* Fin cambia datos en registro duplicado los documentos de la base de datos */



}


form_edit();
//add_action('init', 'form_edit');


}

?>

