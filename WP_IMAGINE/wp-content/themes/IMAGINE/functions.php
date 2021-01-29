<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		$custom_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );
		$context['custom_logo_url'] = $custom_logo_url;
		return $context;
	}

	public function theme_supports() {
		add_theme_support( 'custom-logo' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}



	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}



function theme_styles() {
	// wp_enqueue_style( 'slick', get_template_directory_uri() . '/slick/slick.css' );
	// wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/slick/slick-theme.css' );
	// wp_enqueue_style( 'swiper', get_template_directory_uri() . '/swiper/css/swiper.min.css' );
	// wp_enqueue_style( 'DataTables', get_template_directory_uri() . '/DataTables/datatables.min.css' );
	// wp_enqueue_style( 'DataTables','https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/cr-1.5.2/r-2.2.5/datatables.min.css' );
	// wp_enqueue_style( 'DataTablesResp','https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.css' );
	// wp_enqueue_style( 'DataTablesResp','https://cdn.datatables.net/colreorder/1.5.2/css/colReorder.dataTables.min.css' );
	// wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );

	
	// AKHOLUB_WP
	// wp_enqueue_style( 'my-theme-ie7', get_stylesheet_directory_uri() . "/css/bootstrap_ie8.css", array( 'AKHOLUB_WP' ) );
	// wp_style_add_data( 'my-theme-ie7', 'conditional', 'IE' );
	// wp_enqueue_style( 'googlefont', 'https://fonts.googleapis.com/css?family=Work+Sans:400,500,600' );
	// wp_enqueue_style( 'owlstyle', get_template_directory_uri() . '/owlcarousel/owl.carousel.css' );
	// wp_enqueue_style( 'owlstyle-default', get_template_directory_uri() . '/owlcarousel/owl.theme.default.min.css' );
	if ( ! is_admin() ) { 
		wp_enqueue_style( 'style_admin', get_template_directory_uri() . '/style.css' );

	} else  wp_enqueue_style( 'style', get_template_directory_uri() . '/style_admin.css' );
} 
add_action( 'init', 'theme_styles' );
show_admin_bar( false ); 


function theme_scripts()
{
    // wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array( 'jquery' ), false, true  );
    // wp_enqueue_script( 'jquery-migrate', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), false, true  );
    // wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), false, true  );
    // wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ), false, true  );
    // wp_enqueue_script( 'swiper', get_template_directory_uri() . '/swiper/js/swiper.js' , array( 'jquery' ), true, false  );
    // wp_enqueue_script( 'DataTables', get_template_directory_uri() . '/DataTables/datatables.js' , array( 'jquery' ), true, false  );
    // wp_enqueue_script( 'jQueryaaaa', 'https://code.jquery.com/jquery-3.5.1.js' , array( 'jquery' ), true, false  );
    // wp_enqueue_script( 'DataTablesjs', 'https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/cr-1.5.2/r-2.2.5/datatables.min.js' , array( 'jquery' ), true, false  );
    // wp_enqueue_script( 'DataTablesRespjs', 'https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js' , array( 'jquery' ), false, true  );
    // wp_enqueue_script( 'DataTablesReorder', 'https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js' , array( 'jquery' ), false, true  );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// function do_translate ($cs, $en){
// 	echo __('[:cs]'.$cs.'[:en]'.$en);
// }


// function acf_custom_select_qtrans_fx( $field ) { 
// 	global $q_config; 
// 	$field = qtranxf_use($q_config['language'], $field, false, false); 
// 	return $field;	 
// }
// add_filter('acf/load_field/name=nickname','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=client','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=location','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=zeme','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=typologie','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=typ','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=rok','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=dosud','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=status','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=uz_plocha','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=velikost','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=naklady','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=profese','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=autori','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=spoluautori_','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=odbspoluprace','acf_custom_select_qtrans_fx');
// add_filter('acf/load_field/name=plans','acf_custom_select_qtrans_fx');


// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// function special_nav_class ($classes, $item) {
//   if (in_array('current-menu-item', $classes) ){
//     $classes[] = 'active ';
//   }
//   return $classes;
// }



// Zrušení automatické korekce vloženého kontentu
// remove_filter('the_content', 'wpautop');

// add_filter('the_content', 'remove_empty_p', 20, 1);
// function remove_empty_p($content){
//     $content = force_balance_tags($content);
//     return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
// }


new StarterSite();
