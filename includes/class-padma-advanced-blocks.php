<?php

/**
 * Free Blocks
 * 
 * @link       https://padmaunlimited.com
 * @since      1.0.0
 *
 * @package    Padma_Advanced
 * @subpackage Padma_Advanced/public
 * @author     Padma Team <support@padmaunlimited.com>
 */
namespace Padma_Advanced;

/**
 * Padma_Advanced_Blocks Class Doc Comment
 *
 * @category Class
 * @package  Padma Advanced
 * @author   Padma Dev Team
 */
class Padma_Advanced_Blocks
{
    /**
     * Padma Blocks
     *
     * @var array
     */
    protected  $blocks ;
    /**
     * Constructor
     */
    public function __construct()
    {
        /**
         *
         * Register elements as blocks (FREE)
         */
        $this->blocks['free'] = array();
        /**
         * Free Visual Elements Blocks
         */
        $padma_visual_elements_free = array(
            'accordion'     => 'PadmaVisualElementsBlockAccordion',
            'basic-heading' => 'PadmaVisualElementsBlockBasicHeading',
            'box'           => 'PadmaVisualElementsBlockBox',
            'button'        => 'PadmaVisualElementsBlockButton',
            'columns'       => 'PadmaVisualElementsBlockColumns',
            'dailymotion'   => 'PadmaVisualElementsBlockDailymotion',
            'divider'       => 'PadmaVisualElementsBlockDivider',
            'dummy-image'   => 'PadmaVisualElementsBlockDummyImage',
            'dummy-text'    => 'PadmaVisualElementsBlockDummyText',
            'gmap'          => 'PadmaVisualElementsBlockGmap',
            'heading'       => 'PadmaVisualElementsBlockHeading',
            'label'         => 'PadmaVisualElementsBlockLabel',
            'spacer'        => 'PadmaVisualElementsBlockSpacer',
            'spoiler'       => 'PadmaVisualElementsBlockSpoiler',
            'tabs'          => 'PadmaVisualElementsBlockTabs',
            'vimeo'         => 'PadmaVisualElementsBlockVimeo',
            'youtube'       => 'PadmaVisualElementsBlockYoutube',
            'quote'         => 'PadmaVisualElementsBlockQuote',
        );
        if ( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'padma-visual-elements/padma-visual-elements.php' ) ) {
            $this->blocks['free'] = array_merge( $this->blocks['free'], $padma_visual_elements_free );
        }
        /**
         *
         * Register elements as blocks (PRO)
         */
        $this->blocks['pro'] = array();
        /**
         * Pro Visual Elements Blocks
         */
        $padma_visual_elements_pro = array(
            'content-to-accordion' => 'PadmaVisualElementsBlockContentToAccordion',
            'content-to-cards'     => 'PadmaVisualElementsBlockContentToCards',
            'content-to-tabs'      => 'PadmaVisualElementsBlockContentToTabs',
            'fontawesome'          => 'PadmaVisualElementsFontAwesomeBlock',
            'lightbox'             => 'PadmaVisualElementsBlockLightbox',
            'mdi'                  => 'PadmaMDIBlock',
            'portfolio'            => 'PadmaVisualElementsBlockPortfolio',
            'portfolio-cards'      => 'PadmaVisualElementsBlockPortfolioCards',
            'post-data'            => 'PadmaVisualElementsBlockPostData',
        );
        if ( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'padma-visual-elements/padma-visual-elements.php' ) ) {
            $this->blocks['pro'] = array_merge( $this->blocks['pro'], $padma_visual_elements_pro );
        }
        /**
         * Padma Store PRO blocks
         */
        $padma_store_pro = array(
            'store-products'     => 'PadmaStoreBlockProducts',
            'store-account'      => 'PadmaStoreBlockAccount',
            'store-login-button' => 'PadmaStoreBlockLoginButton',
        );
        if ( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'padma-store/padma-store.php' ) ) {
            $this->blocks['pro'] = array_merge( $this->blocks['pro'], $padma_store_pro );
        }
        /**
         * Slider Revolution plugin
         */
        $slider_revolution = array(
            'slider-revolution' => 'PadmaSliderRevolution',
        );
        if ( function_exists( 'is_plugin_active' ) && !is_plugin_active( 'padma-slider-revolution/padma-slider-revolution.php' ) ) {
            $this->blocks['pro'] = array_merge( $this->blocks['pro'], $slider_revolution );
        }
    }
    
    /**
     * Register method
     *
     * @return void
     */
    public function register()
    {
        if ( !function_exists( 'padma_register_block' ) ) {
            return;
        }
        /*
         * Free Blocks
         */
        foreach ( $this->blocks['free'] as $block_name => $block_class ) {
            $block_type_url = PADMA_ADVANCED_URL . 'blocks/' . $block_name;
            $class_file = PADMA_ADVANCED_DIR . 'blocks/' . $block_name . '/' . $block_name . '-block.php';
            $options_file = PADMA_ADVANCED_DIR . 'blocks/' . $block_name . '/' . $block_name . '-options.php';
            $icons = array(
                'path' => __DIR__ . '/blocks/' . $block_name . '/',
                'url'  => $block_type_url . '/',
            );
            /**
             * Include options class file
             */
            if ( file_exists( $options_file ) ) {
                include $options_file;
            }
            $block_class_complete = __NAMESPACE__ . '\\' . $block_class;
            padma_register_block(
                $block_class_complete,
                $block_type_url,
                $class_file,
                $icons
            );
        }
        /**
         * Pro Blocks
         */
        if ( !class_exists( __NAMESPACE__ . '\\PadmaDummyBlockOptions' ) ) {
            include_once PADMA_ADVANCED_DIR . 'includes/class-dummy-block-options.php';
        }
        foreach ( $this->blocks['pro'] as $block_name => $block_class ) {
            $block_type_url = PADMA_ADVANCED_URL . 'blocks/' . $block_name;
            $class_file = PADMA_ADVANCED_DIR . 'blocks/' . $block_name . '/' . $block_name . '-block.php';
            $options_file = PADMA_ADVANCED_DIR . 'blocks/' . $block_name . '/' . $block_name . '-options.php';
            $icons = array(
                'path' => __DIR__ . '/blocks-pro/' . $block_name . '/',
                'url'  => $block_type_url . '/',
            );
            if ( file_exists( $options_file ) ) {
                include $options_file;
            }
            $block_class_complete = __NAMESPACE__ . '\\' . $block_class;
            padma_register_block(
                $block_class_complete,
                $block_type_url,
                $class_file,
                $icons
            );
        }
    }
    
    public function get_blocks()
    {
        return $this->blocks;
    }

}