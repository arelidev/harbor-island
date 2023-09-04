<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Theme setup.
 */
function tailpress_setup(): void {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', "hibc" ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts(): void {
	$theme = wp_get_theme();

	wp_enqueue_style( "hibc", tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( "hibc", tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );

	wp_localize_script( "hibc", "hibc",
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => wp_create_nonce( 'tailpress-nonce' )
		)
	);
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ): string {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(), get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ): array|string {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string $classes String of classes.
 * @param mixed $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ): array|string {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

// Include shortcode widgets
require_once( get_template_directory() . '/functions/shortcode-content-block-images.php' );
require_once( get_template_directory() . '/functions/shortcode-content-block-split.php' );
require_once( get_template_directory() . '/functions/shortcode-floorplans.php' );
require_once( get_template_directory() . '/functions/shortcode-gallery.php' );
require_once( get_template_directory() . '/functions/shortcode-hero.php' );
require_once( get_template_directory() . '/functions/shortcode-location-categories.php' );
require_once( get_template_directory() . '/functions/shortcode-overview.php' );

/**
 * Zip all documents and trigger download
 * @return void
 */
#[NoReturn] function ct_download_documents(): void {
	if ( isset( $_POST['event_postid'] ) ) :
		$eventID      = $_POST['event_postid'];
		$files_to_zip = array();

		$building   = get_field( "building", $eventID );
		$unit       = get_field( "unit", $eventID );
		$floorplan  = get_field( "2d_3d_floorplan_pdf", $eventID );
		$ffe_link   = get_field( "ffe_pdf", $eventID );
		$view_image = get_field( "view_image", $eventID );

		if ( ! empty( $view_image ) ) :
			$files_to_zip[] = wp_get_attachment_image_url( $view_image, "full" );
		endif;

		if ( ! empty( $floorplan ) ) :
			$files_to_zip[] = $floorplan;
		endif;

		if ( ! empty( $ffe_link ) ) :
			$files_to_zip[] = $ffe_link;
		endif;

		$zip                  = new ZipArchive();
		$destination          = wp_upload_dir();
		$destination_path     = $destination['basedir'];
		$DelFilePath          = acf_slugify( "{$building}_$unit" ) . ".zip";
		$zip_destination_path = $destination_path . "/" . $DelFilePath;

		if ( file_exists( $zip_destination_path ) ) :
			unlink( $zip_destination_path );
		endif;

		if ( ! $zip->open( $zip_destination_path, ZIPARCHIVE::CREATE ) ) :
			die ( "Could not open archive" );
		endif;

		if ( $files_to_zip ) :
			foreach ( $files_to_zip as $row ):
				$explode        = explode( 'uploads', $row );
				$explodes       = end( $explode );
				$index_files    = array( $destination_path, $explodes );
				$index_file     = implode( "", $index_files );
				$new_index_file = basename( $index_file );
				$zip->addFile( $index_file, $new_index_file );
			endforeach;
		endif;

		$zip->close();

		if ( file_exists( $zip_destination_path ) ) :
			$zip_destination_paths = explode( 'wp-content', $zip_destination_path );
			echo get_site_url() . "/wp-content" . end( $zip_destination_paths );
		endif;
	endif;

	die();
}

add_action( 'wp_ajax_ct_download_documents', 'ct_download_documents' );
add_action( 'wp_ajax_nopriv_ct_download_documents', 'ct_download_documents' );

/**
 * Get left side menu
 *
 * TODO: replace with native menu manger
 *
 * @return array[]
 */
function get_menu_left(): array {
	return [
		[ "title" => "Home", "href" => home_url() ],
		[ "title" => "Residences", "href" => get_permalink( 117 ) ],
		[ "title" => "Location", "href" => get_permalink( 63 ) ],
	];
}

/**
 * Get right side menu
 *
 * TODO: replace with native menu manager
 *
 * @return array[]
 */
function get_menu_right(): array {
	return [
		[ "title" => "Amenities", "href" => get_permalink( 82 ) ],
		[ "title" => "Management", "href" => get_permalink( 92 ) ],
		[ "title" => "Join the Club", "href" => get_permalink( 106 ) ],
	];
}