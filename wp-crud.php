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


/*Funciones requeridas para gestionar archivos */
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

/*Funciones requeridas para gestionar la base de datos */
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


/*Variables globales*/
global $wpbc_db_version;
$wpbc_db_version = '1.1.0'; 

global $sistname;
$sistname = 'crud'; 




    global $wpdb;
    global $wpbc_db_version;

    $table_name = $wpdb->prefix . $sistname; 
 
    $sql = "CREATE TABLE " . $table_name . " (
        id int(11) NOT NULL AUTO_INCREMENT,
        nint VARCHAR (50) NOT NULL, 
        dir_archivo_externo VARCHAR (100) NOT NULL,
        create_at datetime NOT NULL DEFAULT NOW(),
        PRIMARY KEY  (id)
    );";

    dbDelta($sql);











?>
