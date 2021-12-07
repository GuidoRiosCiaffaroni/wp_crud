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



// Instalacion del Sistema Base de datos
require_once plugin_dir_path( __FILE__ ) . 'includes/install.php';
// Formuario de acceso en frontend
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend_insert.php';
// Funciones para grafica de Fecha y Hora 
require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';





/*Funciones requeridas para administrar y gestionar */

// Funciones requeridas para gestionar archivos
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
// Funciones requeridas para gestionar la base de datos
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');





/*Variables globales*/

global $wpdb;

global $wpbc_db_version;
$wpbc_db_version = '1.1.0'; 

global $sistname;
$sistname = 'crud'; 


/* Instalacion de Base de datos */
wpdb_install();
register_activation_hook(__FILE__, 'wpdb_install');

/**/

/*Inicio crear shortcode en la pagina de inicio */
add_shortcode('kfp_ShotCondeInsert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 


?>
