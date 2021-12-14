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

/* **** Variables globales **** */
global $wpdb;               // datos del sistema
global $wp_session;         // Inicio sesion variables
global $wpbc_db_version;    // Version del base de datos - utilizado para las actualizaciones
global $sistname;           // nombre de la tabla de sistema
global $user_id;            // ID del usuario
global $status_user;        // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;           // Nombre de archivo a subir
global $file_name;  

/* **** Variables globales de formulario **** */ 
global $form_key_id;
global $form_nint;
global $form_date;

$tabla_crud = $wpdb->prefix . $sistname; // objeto base de datos
$id                  = sanitize_text_field($_GET['id']);
$edit_key_id         = sanitize_text_field($_GET['key_id']);
$edit_nint           = sanitize_text_field($_POST['edit_nint']);
$edit_date           = sanitize_text_field($_POST['edit_date']);
$customFile          = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name'])); // almacena array de archivos 
$status_id           = '1';
$confir_insert       = sanitize_text_field($_POST['confir_insert']);


$args = array(
  'id'     => 'category',
  '$edit_key_id'      => 'name',
  'edit_nint'   => 0,
  'edit_date'   => 0,
  'customFile' => 1,
  'status_idi'     => 'Categories'
);



echo "id --->".$id."</br>";
echo "key_id --->".$edit_key_id."</br>";

if ($confir_insert == 1)
{
echo "confir_insert --->".$confir_insert."</br>";


  $query = 'SELECT * FROM '.$tabla_crud.' WHERE id = '.$id;
  echo "query --->".$query."</br>";
  $registros = $wpdb->get_results($query);

  // nombre de los campos de la tabla
  /* Inicio copia los datos para mantener el mas antiguo*/
  foreach ($registros as $registros) 
  {
    /*
    $id = $registros->id;
    $user_id = $registros->user_id; 
    $key_id = $registros->key_id; 
    $nint = $registros->nint;
    $date = $registros->date;
    $dir_file_linux = $registros->dir_file_linux;
    $dir_file_win = $registros->dir_file_win;
    $dir_file = $registros->dir_file;
    $status_id = $registros->status_id;
    */

    /*
    $wp_session['id'] = $registros->id;
    $wp_session['user_id'] = $registros->user_id;
    $wp_session['key_id'] = $registros->key_id;
    $wp_session['nint'] = $registros->nint;
    $wp_session['date'] = $registros->date;
    $wp_session['dir_file_linux'] = $registros->dir_file_linux;
    $wp_session['dir_file_win'] = $registros->dir_file_win;
    $wp_session['dir_file'] = $registros->dir_file;
    $wp_session['status_id'] = $registros->status_id;
    */
  }

/*
$tabla_crud = $wpdb->prefix . $sistname; // objeto base de datos
$id                  = sanitize_text_field($_GET['id']);
$edit_key_id         = sanitize_text_field($_GET['key_id']);
$edit_nint           = sanitize_text_field($_POST['edit_nint']);
$edit_date           = sanitize_text_field($_POST['edit_date']);
$customFile          = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name'])); // almacena array de archivos 
$status_id           = '1';
$confir_insert       = sanitize_text_field($_POST['confir_insert']);
*/




/*
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
*/

  /* Fin Copia los datos para mantener el mas antiguo*/

  /* Inicio desactiva los documentos de la base de datos */
    $wpdb->update( $tabla_crud, 
      // Datos que se remplazarán
      array( 
        'status_id' => '0'
      ),
      // Cuando el ID del campo es igual al número $key_id
      array( 'key_id' => $key_id )
    );
  /* Fin desactiva los documentos de la base de datos */



    //$query = "SELECT MAX(id) AS id FROM ".$tabla_crud." where wp_crud.key_id='".$key_id."'";
//
    $query = "SELECT MAX(id) AS id FROM ".$tabla_crud." where wp_crud.key_id='".$key_id."'";
    $last = $wpdb->get_results($query);
    foreach ($last as $last) {
    echo '========> '. $query . '</br>';
    echo '========> '. $last->id . '</br>';
    }
//


}

form_edit();
//add_action('init', 'form_edit');



}

?>

