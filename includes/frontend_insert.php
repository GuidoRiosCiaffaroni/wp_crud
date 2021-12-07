<?php

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShortCode_Insert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 



function Kfp_Insert_form() 
{


    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
        wp_nonce_field('graba_aspirante', 'aspirante_nonce');


		datetimepicker_header(); // require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';


/* ***************************************************************************************************************************************************** */
echo '
        <div class="container d-flex justify-content-center">
            <div class=\'col-md-5\'>
                <div class="form-floating mb-3">
                    <div>
                    <p>
                        <label for="floatingInput">' . _e('N° INT:', 'wpbc') . '</label>' .'
                        </br>    
                        <input id="nint" name="nint" type="text" class="form-control" placeholder="xx-xx-xx-xx-xx" >
                    </p>
                    </div>
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
                    <div class=\'input-group date\' id=\'datetimepicker7\'> 
                        <input type=\'text\' class="form-control" /> 
                            <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-calendar">
                            </span> 
                        </span> 
                    </div>
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