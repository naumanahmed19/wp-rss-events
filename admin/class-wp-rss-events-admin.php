<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nauman.dev
 * @since      1.0.0
 *
 * @package    Wp_Rss_Events
 * @subpackage Wp_Rss_Events/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Rss_Events
 * @subpackage Wp_Rss_Events/admin
 * @author     Nauman Ahmad <contact@nauman.dev>
 */
class Wp_Rss_Events_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Rss_Events_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Rss_Events_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-rss-events-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Rss_Events_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Rss_Events_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Localize the script with new data
		


		wp_enqueue_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-rss-events-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name, 'frontend_ajax_object', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}

	/**
	 * Register Events Post Type
	 *
	 * @since    1.0.0
	 */
	public function register_events_post_type() {

		$labels = array(
			'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Events', 'text_domain' ),
			'name_admin_bar'        => __( 'Event', 'text_domain' ),
			'archives'              => __( 'Item Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Event', 'text_domain' ),
			'description'           => __( 'Event Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'events', $args );

		
	}
	public function admin_menu(){
		add_submenu_page(
			'edit.php?post_type=events',
			__( 'Event Importer', 'wp-rss-events' ),
			__( 'Event Importer', 'wp-rss-events' ),
			'manage_options',
			'event-importer',
			array($this,'page_importer'),
		);
		
	}

	public function  page_importer(){
		require_once 'partials/wp-rss-events-admin-display.php';
	}


	

	public function toDate($d){
		return date('l F d, Y', strtotime($d));
	}
   
	public function importer(){

			$uri = 'https://www.demeerse.nl/agenda/?feed=adwords_xml_events';
		   $rss = new DOMDocument();
		   $rss->load( $uri);
		   $feed = array();
		   foreach ($rss->getElementsByTagName('item') as $node) {
			   $item = array ( 
				   'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				   'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				   'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				   'image_link' => $node->getElementsByTagName('image_link')->item(0)->nodeValue,
				   'availability' => $node->getElementsByTagName('availability')->item(0)->nodeValue,
				   'availability_date' => $node->getElementsByTagName('availability_date')->item(0)->nodeValue,
				   'expiration_date' => $node->getElementsByTagName('expiration_date')->item(0)->nodeValue,
				   'price' => $node->getElementsByTagName('price')->item(0)->nodeValue,
				   'custom_label_0' => $node->getElementsByTagName('custom_label_0')->item(0)->nodeValue,
				   'custom_label_1' => $node->getElementsByTagName('custom_label_1')->item(0)->nodeValue,
				   'custom_label_2' => $node->getElementsByTagName('custom_label_2')->item(0)->nodeValue,
				   'custom_label_3' => $node->getElementsByTagName('custom_label_3')->item(0)->nodeValue,
				   );
			   array_push($feed, $item);
		   }
		   $limit = 5;
	   
	   
		   for($x=0;$x<$limit;$x++) {
			   $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
			   $link = $feed[$x]['link'];
			   $image_link = $feed[$x]['image_link'];
			   $description = $feed[$x]['desc'];
			   $availability = $feed[$x]['availability'];
			   $availability_date = $feed[$x]['availability_date'];
			   $expiration_date =  $this->toDate($feed[$x]['expiration_date']);
			   $price = $feed[$x]['price'];
			   $custom_label_0 = $feed[$x]['custom_label_0'];
			   $custom_label_2 =  $this->toDate($feed[$x]['custom_label_2']);
			   $custom_label_1 =   $this->toDate($feed[$x]['custom_label_1']);
			   $custom_label_3 = $feed[$x]['custom_label_3'];
	   
			   $post_information = array(
				   'post_title' =>$title,
				   'post_content' => $description,
				   'post_type' => 'events',
				   'post_status' => 'publish',
				   'post_date' => date('Y-m-d H:i:s')
			   );
	   
			   wp_insert_post( $post_information );    
		
		   }

	}



}
