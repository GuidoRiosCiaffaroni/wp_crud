<?php
/**
* Plugin Name: WP CRUD
* Description: Ejemplo Basico 
* Version:     1.1
* Plugin URI: https://guidorios.cl/wp-basic-crud-plugin-wordpress/
* Author:      Guido Rios Ciaffaroni
* Author URI:  https://guidorios.cl/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpbc
* Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );


/*Importa funciones de instalacion*/
// Instalacion del sistema
require_once plugin_dir_path( __FILE__ ) . 'includes/install.php';


/*Funciones requeridas para subir archivos */
/* https://wordpress.stackexchange.com/questions/251236/upload-images-to-custom-database-table-in-admin-backend */
 require_once(ABSPATH . "wp-admin" . '/includes/image.php');
 require_once(ABSPATH . "wp-admin" . '/includes/file.php');
 require_once(ABSPATH . "wp-admin" . '/includes/media.php');



global $wpbc_db_version;
$wpbc_db_version = '1.1.0'; 

global $sistname;
$sistname = 'crud'; 













?>
