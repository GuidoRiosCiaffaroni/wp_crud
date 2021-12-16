<?php
/**
* Plugin Name: WP CRUD
* Description: Ejemplo Basico 
* Version:     1.3
* Plugin URI: https://guidorios.cl/wp-basic-crud-plugin-wordpress/
* Author:      Guido Rios Ciaffaroni
* Author URI:  https://guidorios.cl/
* License:     GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpbc
* Domain Path: /languages
*/

/******************************************************************************************/
// Archivo : wp-crud
// Funcion : 

/******************************************************************************************/

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

/*Importa funciones de instalacion*/
require_once plugin_dir_path( __FILE__ ) . 'includes/variable.php';
// Instalacion del Sistema Base de datos
require_once plugin_dir_path( __FILE__ ) . 'includes/install.php';
// Formuario de acceso en frontend
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend_insert.php';
// Formuario de acceso en frontend
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend_update.php';
// Formuario de acceso en frontend
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend_delete.php';
// Formuario de acceso en frontend
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend_edit.php';
// Funciones para grafica de Fecha y Hora 
require_once plugin_dir_path( __FILE__ ) . 'includes/content/datetimepicker.php';
// Funciones de seguridad 
require_once plugin_dir_path( __FILE__ ) . 'includes/security/secure.php';
// Funciones para la generacion de Blade 
require_once plugin_dir_path( __FILE__ ) . 'includes/layout/blade.php';

/*Funciones requeridas para administrar y gestionar */

// Funciones requeridas para gestionar archivos
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
// Funciones requeridas para gestionar la base de datos
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

/*Variables globales*/
global $wpdb;                   // datos del sistema
global $wpbc_db_version;        // Version del base de datos - utilizado para las actualizaciones
global $sist_name_file;         // Nombre de la tabla de General del sistema 
global $sist_name_departament; // Nombre de la tabla de Depart 
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

$wpbc_db_version = '1.1.0'; 

/*Nombre base de datos*/
$sist_name_file = 'crud_file';
$sist_name_departament = 'crud_departament'; 

$user_id = get_current_user_id();

/* Instalacion de Base de datos */
wpdb_install();
register_activation_hook(__FILE__, 'wpdb_install');

/*Inicio crear shortcode en la pagina de inicio */
//add_shortcode('kfp_ShotCondeInsert_form', 'Kfp_Insert_form');
/*Fin crear shortcode enla pagina de inicio*/ 




?>
