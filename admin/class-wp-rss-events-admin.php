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
			'supports'              => array( 'title', 'editor','thumbnail' ),
			'taxonomies'            => array( ),
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
	/**
	 *  Options Page Menu
	 *
	 * @since    1.0.0
	 */
	public function admin_menu(){
		add_submenu_page(
			'edit.php?post_type=events',
			__( 'Event Importer', 'wp-rss-events' ),
			__( 'Event Importer', 'wp-rss-events' ),
			'manage_options',
			'event-importer',
			array($this,'page_importer')
		);
		
	}
	
	/**
	 * Option page 
	 *
	 * @since    1.0.0
	 */

	public function  page_importer(){
		require_once 'partials/wp-rss-events-admin-display.php';
	}


	public function getItem($item,$tag){
		return $item->get_item_tags('http://base.google.com/ns/1.0', $tag)[0]['data'];
	}	

	/**
	 * Events importer
	 *
	 * @since    1.0.0
	 */
   
	public function importer(){

		/**
		 * Delete all posts before import
		 */

		$allposts= get_posts( array('post_type'=>'events','numberposts'=>-1) );
		foreach ($allposts as $eachpost) {
			wp_delete_post( $eachpost->ID, true);
		}


		$uri = 'https://www.demeerse.nl/agenda/?feed=adwords_xml_events';
		$rss = fetch_feed($uri);

		$feed = array();
		$limit = 10;
		
		
		foreach ($rss ->get_items(0,$limit) as $key => $item){
			$item = array ( 
				'title' => $this->getItem($item,'title'),
				'description' =>  $this->getItem($item,'description'),
				'link' =>  $this->getItem($item,'link'),
				'image_link' => $this->getItem($item,'image_link'),
				'custom_label_1' =>  $this->getItem($item,'title'),

			);
			array_push($feed, $item);
		}
	
		for($x=0;$x<$limit;$x++) {
			$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
			$link = $feed[$x]['link'];
			$image_link = $feed[$x]['image_link'];
			$description = $feed[$x]['description'];
			$custom_label_1 = $feed[$x]['custom_label_1'];

			$post_information = array(
				'post_title' =>$title,
				'post_content' => $description,
				'post_type' => 'events',
				'post_status' => 'publish',
				'post_date' => date('Y-m-d H:i:s'),
				'meta_input' => array(
					'link' =>  $link,
					'custom_label_1' => $custom_label_1 ,
				),
			);
			$post_id  =  wp_insert_post( $post_information ); 
			$this->attach_thumbnail($post_id , $image_link );	
	
		}

	}

	/**
	 * Import and attach thumbnails
	 *
	 * @since    1.0.0
	 */

	function attach_thumbnail($post_id,$image_url){

		$image_name       =basename($image_url);
		$upload_dir       = wp_upload_dir(); // Set upload folder
		$image_data       = file_get_contents($image_url,0, stream_context_create(["http"=>["timeout"=>1]])); // Get image data
	
		$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
		$filename         = basename( $unique_file_name ); // Create image file name
		// Check folder permission and define file location
		if( wp_mkdir_p( $upload_dir['path'] ) ) {
			$file = $upload_dir['path'] . '/' . $filename;
		} else {
			$file = $upload_dir['basedir'] . '/' . $filename;
		}
		
		// Create the image  file on the server
		file_put_contents( $file, $image_data );
		
		// Check image file type
		$wp_filetype = wp_check_filetype( $filename, null );
		
		// Set attachment data
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		
		// Create the attachment
		$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
		
		// Include image.php
		
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		// Assign metadata to attachment
		wp_update_attachment_metadata( $attach_id, $attach_data );
		
		// And finally assign featured image to post
		set_post_thumbnail( $post_id, $attach_id );

	}

	
	/**
	 * Add "Custom" template to page attirbute template section.
	 */
	function brand_add_template_to_select( $post_templates, $wp_theme, $post, $post_type ) {

		$post_templates['template-events.php'] = __('Events Template');

		return $post_templates;
	}

}
