<?php
/**
 * Plugin Name: Custom Container Widget
 * Description: Adds a custom container widget with controls to Elementor.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * Text Domain: custom-container
 */

// Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
use Elementor\Controls_Manager;
class CustomContainerWidget {

    public function __construct() {
        add_action( 'elementor/element/container/section_layout/after_section_end', [ $this, 'register_controls' ] );
    }

    public function register_controls( $element ) {
        $element->start_controls_section(
            'eael_wrapper_link_section',
            [
                'label' => __( '<i class="eaicon-logo"></i> Custom Control', 'essential-addons-for-elementor-lite' ),
                'tab'   => Controls_Manager::TAB_ADVANCED
            ]
        );

        	$element->add_control(
			'custom_control',
			[
				'label' => esc_html__( 'Custom Control', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);

       

      

        $element->end_controls_section();
    }

    // Function to potentially modify the container on the frontend (optional)
    public function before_render( $element ) {
        // Your logic to modify the container based on control values
    }
}

new CustomContainerWidget();