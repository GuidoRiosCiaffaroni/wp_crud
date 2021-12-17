<?php
/******************************************************************************************/
// Archivo : frontend_insert.php
// Funcion : Kfp_Insert_form() 'funcion para el ingreso de datos'
// Objetos : $wpdb->insert

/******************************************************************************************/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Insert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 

/*Inicio funcion para crear shortcode en la pagina de inicio */
function Kfp_Insert_form() 
{

    /*Variables globales*/
    global $wpdb;                   // datos del sistema
    global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
    global $sist_name_file;         // Nombre de la tabla de General del sistema 
    global $sist_name_departament;  // Nombre de la tabla de Depart 
    global $tabla_crud;             // nombre de la tabla de sistema
    global $user_id;                // ID del usuario
    global $status_user;            // Perfil del usuario 
    global $user_dirname;
    global $upload_dir;
    global $dir_file;               // Nombre de archivo a subir
    global $global_data;            // Almacenamiento de datos Globales
    global $file_name;  
    global $wp_session;             // Inicio sesion variables
    global $global_data;

    $tabla_crud = $wpdb->prefix . $sist_name_file; // objeto base de datos

    echo '-------------------------------------------------------------------------->'.$tabla_crud.'</br>';
    /*Incio almacena informacion de formulario BLADE*/
    $user_id        = sanitize_text_field($_POST['user_id']);   // obtiene el id del usuario 
    $key_id         = wp_generate_password( 12, false );        // genera una key para un registro
    $nint           = sanitize_text_field($_POST['nint']);      // Obtiene un dato desde el formulario 
    $date           = sanitize_text_field($_POST['date']);      // Obtiene una fecha desde el formualario
    $customFile     = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name'])); // almacena array de archivos 
    $status_id      = '1'; // Obtiene el estatus del registro activo = 1 / desactivado = 0

    /* ** carga de informacion en variables globales ** */
    $form_key_id = $key_id ;
    $form_nint = $nint;
    $form_date = $date;

    /*Fin almacena informacion de formulario BLADE*/

    /* Inicio Validacion de infomacion para crear y almacenar archivos*/
    if (get_current_user_id() != NULL ) 
    {

        $current_user = wp_get_current_user(); // Obtiene la ide del usuario actual 
        $upload_dir   = wp_upload_dir();

        if ( isset( $current_user->user_login ) && ! empty( $upload_dir['basedir'] ) ) 
        {
            $user_dirname = $upload_dir['basedir'].'/'.date('Y').'/'.date('m').'/'.date('d').'/'; // Ruta de directorios donde se almacenara archivos

            if ( ! file_exists( $user_dirname ) ) 
            {
                wp_mkdir_p( $user_dirname ); // Crear directorios para almacenar archivos 
            }

            if ($_FILES['customFile']['name'] != NULL)
            {
                $date_time = date('Y')."_".date('m')."_".date('d')."_".date("h_i_s_a",time())."_";  // almacena una variable con la fecha formateada
                $dir_file_linux = '/'.date('Y').'/'.date('m').'/'.date('d').'/';                    // ruta de directorio para linux
                $dir_file_win = '\\'.date('Y').'\\'.date('m').'\\'.date('d').'\\';                  // ruta de directorio para windows
                $dir_file = $date_time.$_FILES['customFile']['name'];                               // almacena una variable con el nombre del docuemto 
                $file_name = $user_dirname.$date_time.''.$_FILES['customFile']['name'];             //alamacena una variable con el nombre del documetno y su fecha 
                rename($customFile['file'] , $file_name);                                           // mueve archivos a carpeta creada 
            }
        }
    }
    /* Fin Validacion de infomacion para crear y almacenar archivos*/

    $global_data = array(
                'user_id'           => $user_id,
                'key_id'            => $key_id,
                'nint'              => $nint,
                'date'              => $date,
                'dir_file_linux'    => $dir_file_linux,
                'dir_file_win'      => $dir_file_win,
                'dir_file'          => $dir_file,
                'status_id'         => $status_id,
            );

    $wpdb->insert($tabla_crud,$global_data);


    echo "---------------------------->".$global_data."</br>";


    form_insert(); // Formulario Blade 


}
?>