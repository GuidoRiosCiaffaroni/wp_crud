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

    $tabla_crud = $wpdb->prefix . $sistname; 

    $user_id        = sanitize_text_field($_POST['user_id']);
    $key_id         = wp_generate_password( 12, false );
    $nint           = sanitize_text_field($_POST['nint']);
    $date           = sanitize_text_field($_POST['date']);
    $customFile     = wp_upload_bits( $_FILES['customFile']['name'], null, @file_get_contents($_FILES['customFile']['tmp_name']));
    $status_id      = '1';

    if (get_current_user_id() != NULL ) 
    {

        $current_user = wp_get_current_user();
        $upload_dir   = wp_upload_dir();

        if ( isset( $current_user->user_login ) && ! empty( $upload_dir['basedir'] ) ) 
        {
            $user_dirname = $upload_dir['basedir'].'/'.date('Y').'/'.date('m').'/'.date('d').'/';
            if ( ! file_exists( $user_dirname ) ) 
            {
                wp_mkdir_p( $user_dirname );
            }

            if ($_FILES['customFile']['name'] != NULL)
            {
                //$date_time = date('Y')."_".date('m')."_".date('d')."_".date("H_i_s_a")."_"; 
                $date_time = date('Y')."_".date('m')."_".date('d')."_".date("Y-m-d-h_i_s_a",time())."_";
                $dir_file = '/'.date('Y').'/'.date('m').'/'.date('d').'/'.$date_time.'_'.$_FILES['customFile']['name'];
                rename($customFile['file'] , $user_dirname.$date_time.'_'.$_FILES['customFile']['name']); 
            }
        }
    }


   $wpdb->insert(
            $tabla_crud,
            array(
                'user_id' => $user_id,
                'key_id' => $key_id,
                'nint'  => $nint,
                'date'  => $date,
                'dir_file'  => $dir_file,
                'status_id' => $status_id,
            )
        );





fomulario();




}
?>