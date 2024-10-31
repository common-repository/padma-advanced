<?php

/**
 *
 * Freemius start
 *
 * @link https://www.padmaunlimited.com
 * @since 1.0.0
 *
 * @package Padma Advanced
 * @subpackage Padma Advanced/admin
 */

if ( !function_exists( 'padma_advanced_fs' ) ) {
    /**
     * Create a helper function for easy SDK access.
     *
     * @return $padma_advanced_fs
     */
    function padma_advanced_fs()
    {
        global  $padma_advanced_fs ;
        
        if ( !isset( $padma_advanced_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $padma_advanced_fs = fs_dynamic_init( array(
                'id'             => '6000',
                'slug'           => 'padma-advanced',
                'type'           => 'plugin',
                'public_key'     => 'pk_9a02d186951e1b14dbdca97e1a78c',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                'days'               => 30,
                'is_require_payment' => false,
            ),
                'menu'           => array(
                'slug'       => 'padma-advanced',
                'first-path' => 'admin.php?page=padma-advanced',
                'parent'     => array(
                'slug' => 'options-general.php',
            ),
            ),
                'is_live'        => true,
            ) );
        }
        
        return $padma_advanced_fs;
    }
    
    // Init Freemius.
    padma_advanced_fs();
    // Signal that SDK was initiated.
    do_action( 'padma_advanced_fs_loaded' );
}
