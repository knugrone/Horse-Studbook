<?php
/*
Plugin Name: Horse Studbook
Plugin URI:  https://developer.fjordhorse.com.au/Studbook
Description: Studbook for horse breeding organizations
Version:     20160911
Author:      knugrone
Author URI:  https://developer.fjordhorse.com.au/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
*/

$Hstb_minimalRequiredPhpVersion = '5.0';

if ( ! defined( 'HORSE_STUDBOOK_PATH' ) ) {
	define( 'HORSE_STUDBOOK_PATH', dirname( __FILE__ ) );
}

/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function Hstb_noticePhpVersionWrong() {
    global $Hstb_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
      __('Error: plugin "Horse Studbook" requires a newer version of PHP to be running.',  'studbook').
            '<br/>' . __('Minimal version of PHP required: ', 'Horse-Studbook') . '<strong>' . $Hstb_minimalRequiredPhpVersion . '</strong>' .
            '<br/>' . __('Your server\'s PHP version: ', 'Horse-Studbook') . '<strong>' . phpversion() . '</strong>' .
         '</div>';
}


function Hstb_PhpVersionCheck() {
    global $Hstb_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), $Hstb_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'Hstb_noticePhpVersionWrong');
        return false;
    }
    return true;
}


/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function Hstb_i18n_init() {
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('Horse-Studbook', false, $pluginDir . '/languages/');
}


//////////////////////////////////
// Run initialization
/////////////////////////////////

// Initialize i18n
add_action('plugins_loadedi','Hstb_i18n_init');

// Run the version check.
// If it is successful, continue with initialization for this plugin
if (Hstb_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    include_once(HORSE_STUDBOOK_PATH .'/includes/Horse-Studbook_init.php');
    Hstb_init(__FILE__);
}
register_activation_hook(__FILE__, Hstb_init);
