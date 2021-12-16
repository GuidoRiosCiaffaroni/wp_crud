<?php
/* ************************************************************************************* */
/* Formulario para insertar datos                                                        */
/* ************************************************************************************* */

function form_insert()
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

 
    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_insert', 'insert_nonce');


        datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';


/* ************************************************************************************* */
// $nint = sanitize_text_field($_POST['nint']);

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
/* ************************************************************************************* */

/* ************************************************************************************* */
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
/* ************************************************************************************* */


/* ************************************************************************************* */
//
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
/* ************************************************************************************* */



/* ************************************************************************************* */
//
    echo '         <div class="form-input">';
    echo '              <input type="submit" value="Enviar">';
    echo '          </div>';
    echo '      </form>';

/* ************************************************************************************* */

        datetimepicker_footer(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';

}


/* ************************************************************************************* */
/* Formulario para editar datos                                                          */
/* ************************************************************************************* */
function form_edit()
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
$id      = sanitize_text_field($_GET['id']); // Datos obtenidos desde frontend_update.php id
$key_id  = sanitize_text_field($_GET['key_id']); // Datos obtenidos desde frontend_update.php key_id

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

    echo '<form action="'. get_the_permalink() .'" method="post" id="form_insert" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_insert', 'insert_nonce');


        datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';


/* ************************************************************************************* */
// Registro de datos 
// Datos obtenidos desde el // Datos obtenidos desde frontend_update.php id
//

echo '
    <input id="confir_insert" name="edit_id" type="hidden"  value="'.$id.'" >
    <input id="confir_insert" name="edit_key_id" type="hidden"  value="'.$key_id.'" >
    <input id="confir_insert" name="confir_insert" type="hidden"  value="1" >
';
/* ************************************************************************************* */



/* ************************************************************************************* */
// 
// $nint = sanitize_text_field($_POST['nint']);
//
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-group">
                <label for="floatingInput" class="form-label"> N° int </label> 
                    <div class=\'input-group\'>
                        <input id="nint" name="edit_nint" type="text" class="form-control" value="'.$nint.'" >
                            <span class="input-group-addon"> 
                                <span class="glyphicon glyphicon-pencil">
                            </span> 
                        </span> 
                    </div>
                    
                    <div id="nint" class="form-text">El dato actualmente es : '.$nint.'</div>

                </div>
            </div>
        </div>
';
/* ************************************************************************************* */

/* ************************************************************************************* */
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
                        <input id="date" name="edit_date"  type=\'text\' class="form-control" value="'.$date.'"> 
                            <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-calendar">
                            </span> 
                        </span> 
                    </div>

                    <div id="nint" class="form-text">La fecha actual es '.$date.' </div>

                </div>
            </div>
        </div>
';
/* ************************************************************************************* */


/* ************************************************************************************* */
//
//
//
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-group">
                <label for="floatingInput" class="form-label"> Archivo  </label> 
                    <div class=\'input-group\' id="customFile"> 
                        <input type="file" class="form-control" id="edit_customFile" name="edit_customFile" value="'. $dir_file .'"> 
                            <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-open-file">
                            </span> 
                        </span> 
                    </div>

                    <div id="nint" class="form-text">El archivo actual es : '. $dir_file .'</div>
                     
                </div>
            </div>
        </div>
';
/* ************************************************************************************* */



/* ************************************************************************************* */
//
//
//
    echo '         <div class="form-input">';
    echo '              <input type="submit" value="Enviar">';
    echo '          </div>';
    echo '      </form>';

/* ************************************************************************************* */

        datetimepicker_footer(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';




}




?>