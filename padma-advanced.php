<?php
/**
 * Padma Advanced
 *
 * @package           Padma Advanced
 * @author            Padma Unlimited
 * @link              https://www.padmaunlimited.com
 *
 * @wordpress-plugin
 * Plugin Name: Padma Advanced
 * Plugin URI: https://padmaunlimited.com/
 * Description: Expand the possibilities and simplify the design and development processes of WordPress + Padma Theme based websites.
 * Version: 0.0.17
 * Requires at least: 5.2
 * Requires PHP: 7.0
 * Author: Padma Unlimited
 * Author URI: https://www.padmaunlimited.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: padma-advanced
 * Domain Path: /languages
 * WC requires at least: 3.0.0
 * WC requires at least: 3.0.0
 * WC tested up to: 4.9.1
  */

namespace Padma_Advanced;

/**
 * If this file is called directly, abort.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Version.
 */
define( 'PADMA_ADVANCED_VERSION', '0.0.17' );


/**
 * Define plugin constants.
 */
define( 'PADMA_ADVANCED_DIR', plugin_dir_path( __FILE__ ) );
define( 'PADMA_ADVANCED_URL', plugin_dir_url( __FILE__ ) );


/**
 * Freemius start
 */
require_once PADMA_ADVANCED_DIR . 'load-freemius.php';


/**
 * Plugin activation
 */

register_activation_hook(
	__FILE__,
	function () {
		require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-activator.php';
		Padma_Advanced_Activator::activate();
	}
);

/**
 * Plugin deactivation.
 */
register_deactivation_hook(
	__FILE__,
	function () {
		require_once PADMA_ADVANCED_DIR . 'includes/class-padma-advanced-deactivator.php';
		Padma_Advanced_Deactivator::deactivate();
	}
);

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require PADMA_ADVANCED_DIR . 'includes/class-padma-advanced.php';


/**
 * Begins execution.
 *
 * @since    1.0.0
 */
add_action(
	'after_setup_theme',
	function () {
		global $padma_advanced;
		if ( ! isset( $padma_advanced ) ) {
			$padma_advanced = new Padma_Advanced();
			$padma_advanced->run();
		}
	});
