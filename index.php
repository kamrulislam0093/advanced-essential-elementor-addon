<?php 
/**
 * Plugin Name:  Advance Essential Elementor Addon
 * Plugin URI:  
 * Description:  This is Elementor Advanced Addon.
 * Version:  1.0   
 * Author:  Kamrul    
 * Author URI:  
 * License:  GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  s_themeey
 * Domain Path:  /languages
 */

define('ACF_DIR_PATH', plugin_dir_path(__FILE__));
define('ACF_DIR_URL', plugin_dir_url(__FILE__));
define('VERSION', 1.0);


// function wordcount_activation_hook(){}
// register_activation_hook( __FILE__, "wordcount_activation_hook" );

// function wordcount_deactivation_hook(){}
// register_deactivation_hook( __FILE__, "wordcount_deactivation_hook" );


require_once ACF_DIR_PATH . 'elementor/elementor-register.php';

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_style( 'custom_plugin', ACF_DIR_URL . 'style.css' );

},30);


function word_count_plugin_loaded(){
  load_plugin_textdomain( 's_themeey', false, dirname( __FILE__ ) . '/languages' );
}
add_action( 'plugin_loaded', 'word_count_plugin_loaded' );
