<?php


/**
 * chandenhomes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chandenhomes
 */

if ( ! function_exists( 'chandenhomes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chandenhomes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chandenhomes, use a find and replace
		 * to change 'chandenhomes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chandenhomes', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'chandenhomes' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'chandenhomes_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'chandenhomes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chandenhomes_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'chandenhomes_content_width', 640 );
}
add_action( 'after_setup_theme', 'chandenhomes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chandenhomes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'chandenhomes' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'chandenhomes' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'chandenhomes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chandenhomes_scripts() {

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'chandenhomes-fancybox-mousewheel-js', get_template_directory_uri() . '/fancybox/lib/jquery.mousewheel.pack.js', array( 'jquery' ), '20170802', true );

  wp_enqueue_style( 'chandenhomes-fancybox-css', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css' );

	wp_enqueue_script( 'chandenhomes-custom-js', get_template_directory_uri() . '/js/all.min.js', array('jquery'), '20151215', true );

	wp_enqueue_style( 'chandenhomes-bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_style( 'chandenhomes-style', get_template_directory_uri() . '/style.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chandenhomes_scripts' );


// *** Remove unecessary menu items for all but Administrators ***
function chandenhomes_remove_comments_menu_item() {
   $user = wp_get_current_user();
   if ( ! $user->has_cap( 'manage_options' ) ) {
       remove_menu_page( 'edit-comments.php' );
       remove_menu_page( 'tools.php' );
       remove_menu_page( 'profile.php' );
   }
}
add_action( 'admin_menu', 'chandenhomes_remove_comments_menu_item' );


// *** login logo ***
function chandenhomes_login_logo() {  ?>
    <style type="text/css">
        .login h1 a {
            background-image: url("/wp-content/themes/chandenhomes/images/login-logo.png");
            padding-bottom: 0;
            width: 307px;
            height: 106px;
            background-size: 265px;
            background-position: center bottom;
        }
    </style>
<?php }
add_action( 'login_head', 'chandenhomes_login_logo' ); //custom login function


// *** Register Custom Post Types
add_action( 'init', 'create_custom_post_type' );
function create_custom_post_type() {
  register_post_type( 'front_slider',
    array(
      'labels' => array(
        'name' => __( 'Front Slider' ),
        'singular_name' => __( 'Front Slider' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-format-image',
	  'supports'    => array('title', 'editor', 'custom-fields'),
    )
  );
}

// *** Register Custom Post Types
add_action( 'init', 'create_custom_post_type2' );
function create_custom_post_type2() {
  register_post_type( 'property',
    array(
      'labels' => array(
        'name' => __( 'Property' ),
        'singular_name' => __( 'Property' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-admin-home',
	  'supports'    => array('title', 'editor', 'custom-fields'),
    )
  );
}


// *** Register Custom Post Types
add_action( 'init', 'create_custom_post_type3' );
function create_custom_post_type3() {
  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-testimonial',
	  'supports'    => array('title', 'editor', 'custom-fields'),
    )
  );
}


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_image_size( 'property-thumbnail', 419, 284, true );
add_image_size( 'gallery-thumbnail', 219, 147, true );
add_image_size( 'single', 960, 583, true );

class GF_Field_HTML_Printable extends GF_Field_HTML {

	public $type = 'HTML2';
	public $displayOnly = false;

	public function get_form_editor_field_title() {
		return "HTML_Entry";
	}
			
	public function get_value_entry_detail( $value, $currency = '', $use_text = false, $format = 'html', $media = 'screen' ) {
		return strip_tags($value, '<p>');
	}
	public function get_value_merge_tag( $value, $input_id, $entry, $form, $modifier, $raw_value, $url_encode, $esc_html, $format, $nl2br) {
		return strip_tags($value, '<p>');
	}

/* 	public function get_field_content( $value, $force_frontend_label, $form ) {
		$form_id             = $form['id'];
		$admin_buttons       = $this->get_admin_buttons();
		$is_entry_detail     = $this->is_entry_detail();
		$is_form_editor      = $this->is_form_editor();
		$is_admin            = $is_entry_detail || $is_form_editor;
		$field_label         = $this->get_field_label( $force_frontend_label, $value );
		$field_id            = $is_admin || $form_id == 0 ? "input_{$this->id}" : 'input_' . $form_id . "_{$this->id}";
		$admin_hidden_markup = ( $this->visibility == 'hidden' ) ? $this->get_hidden_admin_markup() : '';
		$field_content       = ! $is_admin ? '{FIELD}' : $field_content = sprintf( "%s%s<label class='gfield_label' for='%s'>%s</label>{FIELD}", $admin_buttons, $admin_hidden_markup, $field_id, esc_html( $field_label ) );

		return $field_content;
	} */

public function get_field_content( $value, $force_frontend_label, $form ) {
	$form_id = (int) rgar( $form, 'id' );

	$field_label = $this->get_field_label( $force_frontend_label, $value );
	if ( ! in_array( $this->inputType, array( 'calculation', 'singleproduct' ), true ) ) {
			// Calculation and Single Product field add a screen reader text to the label so do not escape it.
			$field_label = esc_html( $field_label );
	}

	$validation_message_id = 'validation_message_' . $form_id . '_' . $this->id;
	$validation_message = ( $this->failed_validation && ! empty( $this->validation_message ) ) ? sprintf( "<div id='%s' class='gfield_description validation_message gfield_validation_message'>%s</div>", $validation_message_id, $this->validation_message ) : '';

	$is_form_editor  = $this->is_form_editor();
	$is_entry_detail = $this->is_entry_detail();
	$is_admin        = $is_form_editor || $is_entry_detail;

	$required_div = $this->isRequired ? '<span class="gfield_required">' . $this->get_required_indicator() . '</span>' : '';

	$admin_buttons = $this->get_admin_buttons();

	$target_input_id = $this->get_first_input_id( $form );

	$label_tag = $this->get_field_label_tag( $form );

	$for_attribute = empty( $target_input_id ) || $label_tag === 'legend' ? '' : "for='{$target_input_id}'";

	$admin_hidden_markup = ( $this->visibility == 'hidden' ) ? $this->get_hidden_admin_markup() : '';

	$description = $this->get_description( $this->description, 'gfield_description' );

	if ( $this->is_description_above( $form ) ) {
			$clear         = $is_admin ? "<div class='gf_clear'></div>" : '';
			$field_content = sprintf( "%s%s<$label_tag class='%s' $for_attribute >%s%s</$label_tag>%s{FIELD}%s$clear", $admin_buttons, $admin_hidden_markup, esc_attr( $this->get_field_label_class() ), $field_label, $required_div, $description, $validation_message );
	} else {
			$field_content = sprintf( "%s%s<$label_tag class='%s' $for_attribute >%s%s</$label_tag>{FIELD}%s%s", $admin_buttons, $admin_hidden_markup, esc_attr( $this->get_field_label_class() ), $field_label, $required_div, $description, $validation_message );
	}

	return $field_content;
}

}
GF_Fields::register(new GF_Field_HTML_Printable());
