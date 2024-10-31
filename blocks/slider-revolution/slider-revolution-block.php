<?php
/**
 * Block class
 *
 * @package Padma_Advanced
 */

namespace Padma_Advanced;


class PadmaSliderRevolution extends \PadmaBlockAPI {

    public $id;
    public $name;
    public $options_class;
    public $categories;


    public function __construct(){

    	$this->id 				= 'slider-revolution';    
	    $this->name 			= 'Slider Revolution';
	    $this->options_class 	= 'Padma_Advanced\PadmaSliderRevolutionOptions';
	    $this->categories 	 = array( 'content', 'slider', 'media');
		$this->description   = 'Padma Revolution Slider Compatibility Block.';

    }
    
    public function init() {

		if(!class_exists('RevSlider'))
			return false;

	}
			
	function setup_elements() {

	}

	function content($block) {
				
		$alias = parent::get_setting($block, 'alias', '');		
		echo do_shortcode('[rev_slider alias="'.$alias.'"][/rev_slider]');
		
	}

	public static function dynamic_css($block_id, $block = false) {
		$css = '#block-' . $block['id'] . ' rs-fullwidth-wrap { position: inherit; }';
		$css .= '#block-' . $block['id'] . ' rs-module-wrap { position: inherit; }';
		return $css;
	}
	
}