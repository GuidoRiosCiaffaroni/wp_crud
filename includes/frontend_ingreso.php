<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShotCondeInsert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 



function Kfp_Insert_form() 
{

    global $wpdb; // Este objeto global permite acceder a la base de datos de WP
    global $sistname;
    global $wpbc_db_version;
    global $nint;

    if (get_current_user_id() != NULL) 
    {
        //echo 'Usuario validado ';
        $tabla_crud = $wpdb->prefix . $sistname;
        echo "<p class='exito'><b>Usuario validado</b>. Puede ingresar los datos.<p>"; 
    }

    $tabla_crud = $wpdb->prefix . $sistname; 


    $nint   = sanitize_text_field($_POST['nint']);
 



        /* Inicio subir archivo */
        $upload = wp_upload_bits(
            $_FILES['wp_custom_attachment']['name'], 
            null, 
            @file_get_contents($_FILES['wp_custom_attachment']['tmp_name'])
        );

        $current_user = wp_get_current_user();
        $upload_dir   = wp_upload_dir();
 
        if ( isset( $current_user->user_login ) && ! empty( $upload_dir['basedir'] ) ) {
            $user_dirname = $upload_dir['basedir'].'/'.date('Y').'/'.date('m').'/'.date('d').'/';
            if ( ! file_exists( $user_dirname ) ) {
                wp_mkdir_p( $user_dirname );
            }
        }


        // verifica la existencia de la variable antes de renonbrar el archivo 
        if ( isset($upload) != TRUE   ) 
        {
            rename($upload['file'] , $user_dirname.time().'_'.$_FILES['wp_custom_attachment']['name']);  
            $file = date('Y').'/'.date('m').'/'.date('d').'/'.time().'_'.$_FILES['wp_custom_attachment']['name']; 
        }
   

    

       

      $wpdb->insert(
            $tabla_aspirantes,
            array(

                'nint'                  => $nint,

            )
        );



















    


    // Esta función de PHP activa el almacenamiento en búfer de salida (output buffer)
    // Cuando termine el formulario lo imprime con la función ob_get_clean
    ob_start();
    ?>


    <?php
    echo ' get_current_user_id() - > ' .get_current_user_id() .  '</br></br>';
    if ( (get_current_user_id() != NULL) OR (get_current_user_id() != 0) ) 
    {
        echo "Usuario activo </br>";
        echo "archivo : " . $upload_dir . "</br>";
        echo "archivo : " . get_current_user_id()  . "</br>";


        /*Funcion de front_insert_from*/
        wpbc_insert_form(); // Formualario de ingreso 



    }
    else
    {
        echo "Usuario inactivo ";
    }



    ?>



    


    <?php
     
    // Devuelve el contenido del buffer de salida
    return ob_get_clean();
}
/*Fin funcion para crear shotcode en la pagina de inicio */



?>