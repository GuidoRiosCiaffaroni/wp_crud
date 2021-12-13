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
$id             = sanitize_text_field($_GET['id']);
$key_id         = sanitize_text_field($_GET['key_id']);
$nint           = sanitize_text_field($_POST['edit_nint']);
$date           = sanitize_text_field($_POST['edit_date']);
$customFile     = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name'])); // almacena array de archivos 
$status_id      = '1';




form_edit();




}

?>

