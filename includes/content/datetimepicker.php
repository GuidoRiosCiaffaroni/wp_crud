<?php
function datetimepicker_header()
{
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

}

function datetimepicker_footer()
{
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
  

}



?>