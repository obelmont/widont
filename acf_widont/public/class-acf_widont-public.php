<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://oliverbelmont.com
 * @since      1.0.0
 *
 * @package    Acf_widont
 * @subpackage Acf_widont/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Acf_widont
 * @subpackage Acf_widont/public
 * @author     Oliver <obelmont@oliverbelmont.com>
 */
class Acf_widont_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->acf_widont_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_widont_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_widont_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/acf_widont-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_widont_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_widont_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/acf_widont-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Determine ACF textbox filter.
	 *
	 * @since    1.0.0
	 */
    public function acf_widont_textfield() {
        if(empty($this->acf_widont_options['textfield'])){
        	remove_filter('acf/load_value/type=text', array($this, 'acf_widont_load'));
        }
    }

	/**
	 * Determine ACF textarea filter.
	 *
	 * @since    1.0.0
	 */
    public function acf_widont_textarea() {
        if(empty($this->acf_widont_options['textarea'])){
        	remove_filter('acf/load_value/type=textarea', array($this, 'acf_widont_load'));
        }
    }

	/**
	 * Determine ACF wysiwyg filter.
	 *
	 * @since    1.0.0
	 */
    public function acf_widont_wysiwyg() {
        if(empty($this->acf_widont_options['wysisyg'])){
			remove_filter('acf/load_value/type=wysiwyg', array($this, 'acf_widont_load'));
        }
    }

	/**
	 * ACF value loader.
	 *
	 * @since    1.0.0
	 */
	public function acf_widont_load( $value, $post_id, $field )
	{
	    // run widont on value
	    switch ($field['type']) {
	    	case 'textarea' || 'text':
	    			$value = $this->acf_widont_simple($value);
	    		break;
	    	case 'wysiwyg':
	    			$value = $this->acf_widont_complex($value);
	    		break;
	    	default:
	    		//If default just use simple
	    		$this->acf_widont_simple($value);
	    		break;
	    }
	    return $value;
	}

	/**
	 * Simple widont function.
	 *
	 * @since    1.0.0
	 */
    public function acf_widont_simple($str = '') {
    	//Check if accessed at admin panel
    	if ( ! is_admin() ) {
			$str = rtrim($str);
			$space = strrpos($str, ' ');
			if ($space !== false){
				$str = substr($str, 0, $space).'&nbsp;'.substr($str, $space + 1);
			}
		}
		return $str;
    }

	/**
	 * Complex widont function.
	 *
	 * @since    1.0.0
	 */
    private function acf_widont_complex($text) {
    	//Check if accessed at admin panel
    	if ( ! is_admin() ) {
	    	//Blanket replace
	    	$text = preg_replace( '|([^\s])\s+([^\s]+)\s*$|', '$1&nbsp;$2', $text);
    	}
    	return $text;
    }

}
