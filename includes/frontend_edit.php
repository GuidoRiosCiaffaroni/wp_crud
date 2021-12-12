<?php

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
global $user_id;            // ID del usuario
global $status_user;        // Perfil del usuario 
global $user_dirname;
global $upload_dir;
global $dir_file;           // Nombre de archivo a subir
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








    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_aspirante', 'aspirante_nonce');


        datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';


/* ***************************************************************************************************************************************************** */
// 
// $nint = sanitize_text_field($_POST['nint']);
//
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-group">
                <label for="floatingInput" class="form-label"> N° int </label> 
                    <div class=\'input-group\'>
                        <input id="nint" name="nint" type="text" class="form-control" placeholder="xx-xx-xx-xx-xx" >
                            <span class="input-group-addon"> 
                                <span class="glyphicon glyphicon-pencil">
                            </span> 
                        </span> 
                    </div>
                    
                    <div id="nint" class="form-text">We\'ll never share your email with anyone else.</div>

                </div>
            </div>
        </div>
';
/* ***************************************************************************************************************************************************** */


/* ***************************************************************************************************************************************************** */
//
//
//
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-group">
                <label for="floatingInput" class="form-label"> Fecha </label> 
                    <!-- <div class=\'input-group date\' id=\'datetimepicker7\'> -->
                    <div class=\'input-group date\' id=\'datetimepicker7\'>  
                        <input name="date" id="date" type=\'text\' class="form-control" placeholder="12/07/2021 12:00 AM"> 
                            <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-calendar">
                            </span> 
                        </span> 
                    </div>

                    <div id="nint" class="form-text">We\'ll never share your email with anyone else.</div>

                </div>
            </div>
        </div>
';


/* ***************************************************************************************************************************************************** */


/* ***************************************************************************************************************************************************** */
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-group">
                <label for="floatingInput" class="form-label"> Archivo  </label> 
                    <div class=\'input-group\' id="customFile"> 
                        <input type="file" class="form-control" id="customFile" name="customFile"> 
                            <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-open-file">
                            </span> 
                        </span> 
                    </div>

                    <div id="nint" class="form-text">We\'ll never share your email with anyone else.</div>
                     
                </div>
            </div>
        </div>
';

/* ***************************************************************************************************************************************************** */



/* ***************************************************************************************************************************************************** */

    echo '         <div class="form-input">';
    echo '              <input type="submit" value="Enviar">';
    echo '          </div>';
    echo '      </form>';

/* ***************************************************************************************************************************************************** */

        datetimepicker_footer(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';





















}
?>

