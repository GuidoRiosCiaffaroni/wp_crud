<?php


function wpbc_insert_form()
{
    global $nint;
    global $dir_archivo_externo;

/* ***************************************************************************************************************************************************** */
    // Archivos externos para bootstrap
    echo '
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
';  
/* ***************************************************************************************************************************************************** */
 


/* ***************************************************************************************************************************************************** */
    //Inicio del formulario
    echo '<form action="'. get_the_permalink() .'" method="post" id="form_aspirante" class="cuestionario" enctype="multipart/form-data">';
    wp_nonce_field('graba_aspirante', 'aspirante_nonce');

                
/* ***************************************************************************************************************************************************** */
 

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




/* ***************************************************************************************************************************************************** */
echo '
        <script type=\'text/javascript\' src=\'https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js\'></script>
        <script type=\'text/javascript\' src=\'\'></script>
        <script type=\'text/javascript\' src=\'\'></script>
        <script type=\'text/Javascript\'>
        $(document).ready(function() 
        {
            $(function() 
            {
                $(\'#datetimepicker6\').datetimepicker();
                $(\'#datetimepicker7\').datetimepicker(
                {
                    useCurrent: false //Important! See issue #1075
                });
                $("#datetimepicker6").on("dp.change", function(e) 
                {
                    $(\'#datetimepicker7\').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker7").on("dp.change", function(e) 
                {
                    $(\'#datetimepicker6\').data("DateTimePicker").maxDate(e.date);
                });
            });
        });
        </script>

';
/* ***************************************************************************************************************************************************** */


}

?>