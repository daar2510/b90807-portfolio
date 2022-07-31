<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * David Rotating Image Widget.
 * 
 * Widget that adds rotation animation to an image.
 * 
 * @since 1.0.0
 */
 class Rotating_Image_Widget extends \Elementor\Widget_Base {

  /**
   * Get widget name.
   * 
   * Retrieve Rotating Image widget name.
   * 
   * @since 1.0.0
   * @access public
   * @return string Widget name.
   */
  public function get_name() {
    return 'rotating-image';
 }

 /**
  * Get widget title.
  * 
  * Retrieve Rotating Image widget title.
  * 
  * @since 1.0.0
  * @access public
  * @return string Widget title.
  */
  public function get_title() {
    return esc_html__( 'Rotating Image', 'david-widgets' );
  }

  /**
   * Get widget icon.
   * 
   * Retrieve Rotating Image widget icon.
   * 
   * @since 1.0.0
   * @access public
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'eicon-sync';
  }

  /**
   * Get custom help URL.
   * 
   * Retrieve a URL where the user can find more information about the widget.
   * 
   * @since 1.0.0
   * @access public
   * @return string Widget help URL.
   */
  public function get_custom_help_url() {
    return 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
  }

  /**
   * Get widget categories.
   * 
   * Retrieve the list of categories the Rotating Image widget belongs to.
   * 
   * @since 1.0.0
   * @access public
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'david-widgets' ];
  }

  /**
   * Get widget keywords.
   * 
   * Retrieve the list of keywords the Rotating Image widget belongs to.
   * 
   * @since 1.0.0
   * @access public
   * @return array Widget keywords.
   */
  public function get_keywords() {
    return [ 'rotating', 'image', 'animation' ];
  }

  public function get_style_depends() {
		return [ 'david-widget-style' ];
	}

  /**
   * Register Rotating Image widget controls.
   * 
   * Adds different input fields to allow the user to change and customize the widget settings.
   * 
   * @since 1.0.0
   * @access protected
   */
  protected function _register_controls() {
    $this->start_controls_section(
      'section_rotating_image',
      [
        'label' => __( 'Rotating Image', 'david-widgets' ),
      ]
    );
    $this->add_control(
      'image',
      [
        'label' => __( 'Image', 'david-widgets' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );
    $this->add_control(
      'speed',
      [
        'label' => __( 'Speed', 'david-widgets' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'default' => [
          'size' => 15,
          'unit' => 's',
        ],
        'range' => [
          's' => [
            'min' => 0.1,
            'max' => 30,
            'step' => 0.1,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .david-widgets-rotating-image' => 'animation-duration: {{SIZE}}{{UNIT}};',
        ],
      ]
    );
    $this->add_control(
      'direction',
      [
        'label' => __( 'Direction', 'david-widgets' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'clockwise',
        'options' => [
          'normal' => __( 'Clockwise', 'david-widgets' ),
          'reverse' => __( 'Counter-clockwise', 'david-widgets' ),
        ],
        'selectors' => [
          '{{WRAPPER}} .david-widgets-rotating-image' => 'animation-direction: {{VALUE}};',
        ],
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render Rotating Image widget output on the frontend.
   * 
   * Written in PHP and used to generate the final HTML.
   * 
   * @since 1.0.0
   * @access protected
   */
  protected function render() {

    $settings = $this->get_settings_for_display();
    $image = $settings['image'];
    $image_url = $image['url'];

    ?>
    <div class="david-widgets-rotating-image">
      <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
    </div>
    <?php

  }
}
