<?php

function form_insert()
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

 
    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_aspirante', 'aspirante_nonce');


        datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';


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
//
//
    echo '         <div class="form-input">';
    echo '              <input type="submit" value="Enviar">';
    echo '          </div>';
    echo '      </form>';

/* ************************************************************************************* */

        datetimepicker_footer(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';

}

function form_edit()
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
 
    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_aspirante', 'aspirante_nonce');

        datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';

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
                        <input id="nint" name="nint" type="text" class="form-control" placeholder="'.$nint.'" >
                            <span class="input-group-addon"> 
                                <span class="glyphicon glyphicon-pencil">
                            </span> 
                        </span> 
                    </div>
                    
                    <div id="nint" class="form-text">La informacion ingresada es '.$form_nint.'</div>

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
                        <input name="date" id="date" type=\'text\' class="form-control" placeholder="'.$form_date.'"> 
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
//
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