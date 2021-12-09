<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Insert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 



function Kfp_Insert_form() 
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

    /*Incio almacena informacion de formulario BLADE*/
    $user_id        = sanitize_text_field($_POST['user_id']);
    $key_id         = wp_generate_password( 12, false );
    $nint           = sanitize_text_field($_POST['nint']);
    $date           = sanitize_text_field($_POST['date']);
    $customFile     = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name'])); // almacena array de archivos 
    $status_id      = '1';
    /*Fin almacena informacion de formulario BLADE*/

    /* Inicio Validacion de infomacion para crear y almacenar archivos*/
    if (get_current_user_id() != NULL ) 
    {

        $current_user = wp_get_current_user();
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
                //$date_time = date('Y')."_".date('m')."_".date('d')."_".date("H_i_s_a")."_"; 
                //$date_time = date('Y')."_".date('m')."_".date('d')."_".date("Y-m-d-h_i_s_a",time())."_";
                $date_time = date('Y')."_".date('m')."_".date('d')."_".date("h_i_s_a",time())."_";
                $dir_file_linux = '/'.date('Y').'/'.date('m').'/'.date('d').'/'; // ruta de directorio para linux
                $dir_file_win = '\\'.date('Y').'\\'.date('m').'\\'.date('d').'\\'; // ruta de directorio para windows
                $dir_file = $date_time.$_FILES['customFile']['name'];
                $file_name = $user_dirname.$date_time.'_'.$_FILES['customFile']['name'];
                rename($customFile['file'] , $file_name); // mueve archivos a carpeta creada 
            }
        }
    }
    /* Fin Validacion de infomacion para crear y almacenar archivos*/




   $wpdb->insert(
            $tabla_crud,
            array(
                'user_id' => $user_id,
                'key_id' => $key_id,
                'nint'  => $nint,
                'date'  => $date,
                'dir_file_linux'  => $dir_file_linux,
                'dir_file_win'  => $dir_file_win,
                'dir_file'  => $dir_file,
                'status_id' => $status_id,
            )
        );





        echo "role                      ----> " . $roles[0]                             . "</br>";
        echo "sistname                  ----> " . $sistname                             . "</br>";
        echo "tabla_crud                ----> " . $tabla_crud                           . "</br>";
        echo "user_id                   ----> " . $user_id                              . "</br>";
        echo "key_id                    ----> " . $key_id                               . "</br>";  
        echo "nint                      ----> " . $nint                                 . "</br>";
        echo "date                      ----> " . $date                                 . "</br>";
        echo "customFile                ----> " . $customFile                           . "</br>";
        echo "current_user              ----> " . sanitize_text_field($current_user)    . "</br>";
        echo "upload_dir                ----> " . $upload_dir                           . "</br>";
        echo "current_user->user_login  ----> " . $current_user->user_login             . "</br>";
        echo "upload_dir['basedir']     ----> " . $upload_dir['basedir']                . "</br>";
        echo "user_dirname              ----> " . $user_dirname                         . "</br>";
        echo "dir_file                  ----> " . $dir_file                         . "</br>";



fomulario(); // Formulario Blade 




}
?>