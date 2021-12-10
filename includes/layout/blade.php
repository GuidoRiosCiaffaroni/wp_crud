<?php
function fomulario()
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
 


/*
    user_role(); // infentifica el rol del usuario

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
*/


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