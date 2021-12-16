<?php
/*Inicio crear shortcode seguimiento de variable */
add_shortcode('ShortCode_global_variable', 'global_variable');
/*Fin  crear shortcode seguimiento de variable */ 

function global_variable() 
{
/*
echo '=============================================================================================</br>'; 
echo '=>' .$upload_dir. '</br>'; 
echo '=>' .$upload_dir['basedir']. '</br>'; 
echo '=>' .$user_dirname. '</br>'; 
echo '=>' .$_FILES['edit_customFile']['name']. '</br>'; 
echo '=>' .$dir_file_linux. '</br>'; 
echo '=>' .$dir_file_win. '</br>'; 
echo '=>' .$dir_file. '</br>'; 
echo '=>' .$file_name . '</br>'; 
*/




/*
echo '$ user_id =>'.$user_id.'</br>';
$path_uploads = wp_get_upload_dir();
$path_plugins = plugins_url();

echo $path_uploads.'</br>';
echo '$ path_uploads'.$path_uploads.'</br>'; 
echo $path_uploads['path'].'</br>';
echo $path_uploads['url'].'</br>';
echo $path_uploads['subdir'].'</br>';
echo $path_uploads['baseurl'].'</br>';
echo $path_uploads['error'].'</br>';
echo 'get_site_url() =>'.get_site_url().'</br>';
*/

}

?>