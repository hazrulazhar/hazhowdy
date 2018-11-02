<?php

/**
 * Plugin Name:       Howdy to Assalamualaikum Converter
 * Plugin URI:        https://github.com/abanghazrul/hazhowdy
 * Description:       This plugin changes the Howdy in the admin bar to Assalamualaikum.
 * Version:           1.0.0
 * Author:            Hazrul Azhar Bin Jamari
 * Author URI:        https://www.hazrulazhar.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       haz-howdy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HAZ_HOWDY_VERSION', '1.0.0' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
 if (!class_exists('Haz_Howdy')) {
   class Haz_Howdy {

     function __construct() {
       add_filter( 'admin_bar_menu', array($this,'change_howdy'), 25 );
     }

     function change_howdy( $wp_admin_bar ) {
        $my_account = $wp_admin_bar->get_node( 'my-account' );
        $new_title   = str_replace( 'Howdy', 'Assalamualaikum', $my_account->title );
        $wp_admin_bar->add_node( array(
            'id'    => 'my-account',
            'title' => $new_title,
        ));
     }
   }

   $hazHowdy = new Haz_Howdy();

 }

?>
