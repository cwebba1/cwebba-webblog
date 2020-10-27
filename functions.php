<?php
// functions.php 100916
// functions.php 100216
// functions.php 092716
// functions.php 091816
// functions.php 091616


/** Add theme-supported features. */
add_action( 'after_setup_theme', 'cwebba_setup');

/* Function for adding theme support. */
function cwebba_setup() {

    /* Add theme support HERE */
    load_theme_textdomain( 'cwebba', get_template_directory() . '/languages' );

    /* Registers theme support for a given feature. */
    add_theme_support( 'post-formats' );
    /* Registers theme support for using an image for the header. */
    add_theme_support( "custom-header", $args );
    /* Registers theme support for using an image for background images or solid background colors. */
    add_theme_support( "custom-background", $args );
    /* Registers theme support for Automatic Feed Links for post and comment in the head. */
    add_theme_support( 'automatic-feed-links' );

// Add Title Function
add_theme_support( 'title-tag' );

if ( ! isset( $content_width ) ) {
    $content_width = 1600;
};

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

    // Registers theme support for Featured images to custom Posts, Pages and Backgrounds
    add_theme_support( 'post-thumbnails' );
    // Add image sizes
    add_image_size('small-thumbnail', 180, 120, true); //If hard cropping is wanted, add 3rd argument = true
    add_image_size('banner-image', 920, 210); // Default is No hard cropping

    // Add Post Format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));

// Create an action hook to target the right rail image
function insert_rt_rail_image() {
echo '<figure><img src="/wp-content/themes/cwebba/assets/images/navpics/rt_rail_ocean-boy.jpg" /></figure>';
    }

add_action('rt_rail_image', 'insert_rt_rail_image');



// CUSTOM NAVPICS
function theme_add_navpics() {
$args = array(
    'flex-width'    => true,
    'width'                  => 278,
    'flex-height'    => true,
    'height'                 => 36,
    'default-image' => get_template_directory_uri() . '/assets/images/navpics/danger_plane.jpg',
    'random-default'         => true,
    'uploads'       => true,
);
add_theme_support( 'custom-navpics', $args );
}

// SEAN DUFFY RANDOM HEROPICS
function get_hero_image_src(){
    global $wpdb;
    $wpdb->show_errors();

        /*
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'post_title',
                'value' => 'hero%',
                'compare' => 'IN',
            )
        )
        */

    $args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'posts_per_page' => - 1,
        
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image ) {
        if(preg_match('/hero-/', $image->post_title) == 1) {
            $images[] = wp_get_attachment_url( $image->ID );
        }
    }
    $index = rand(0, count($images)-1);
    return $images[$index];
}

}/* END OF THEME SETUP */



// CUSTOM HEROPICS – This is not in use
/*
function theme_add_heropics() {
$args = array(
    'flex-width'    => true,
    'width'                  => 1056,
    'flex-height'    => true,
    'height'                 => 180,
    'default-image' => get_template_directory_uri() . '/assets/images/heropics/tent_town_528x90x2.jpg',
    'random-default'         => true,
    'uploads'       => true,
);
add_theme_support( 'custom-heropics', $args );
}
*/

/**
 * Registers an editor stylesheet for the theme.
 */
function cwebba_theme_add_editor_styles() {
    add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'cwebba_theme_add_editor_styles' );


///load styles
function load_fonts() {
    wp_register_style('et-googleFonts', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Ubuntu:400,200,300,600');
    wp_enqueue_style( 'et-googleFonts');
}

wp_register_style('icon-font', get_template_directory_uri().'/assets/css/cwebba-b.css');
wp_enqueue_style('icon-font', get_template_directory_uri().'/assets/css/cwebba-b.css');
add_action('wp_print_styles', 'load_fonts');


/** Enqueue all scripts and styles.
*   https://developer.wordpress.org/reference/functions/wp_enqueue_script/#Notes
*/

function cwebba_scripts() {
  wp_enqueue_style( 'app/css/style.css', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
    // USE THIS FOR OTHER SCRIPTS    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'cwebba_scripts' );



/**
 * Provides a standard format for the page title depending on the view. This is
 * filtered so that plugins can provide alternative title formats.
 *
 * @param       string    $title    Default title text for current view.
 * @param       string    $sep      Optional separator.
 * @return      string              The filtered title.
 * @package     cwebba
 * @subpackage  includes
 * @version     1.0.0
 * @since       1.0.0
 */
function cwebba_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    } // end if

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    } // end if

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
        $title = sprintf( __( 'Page %s', 'cwebba' ), max( $paged, $page ) ) . " $sep $title";
    } // end if

    return $title;

} // end cwebba_wp_title

add_filter( 'wp_title', 'cwebba_wp_title', 10, 2 );


// NEW SIDEBAR WIDGET
function cwebba_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Wide Sidnav', 'cwebba' ),
        'id' => 'sidebar-widget-01',
        'description' => __( 'The main sidebar appears on the left on each page', 'cwebba' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

add_action( 'widgets_init', 'cwebba_widgets_init' );
}

// Exclude categories from posts
function exclude_category_posts( $query ) {
if( $query->is_main_query() && $query->is_home() ) {
$query->set( 'cat', '-1,-6,-9' );
    }
}

add_action( 'pre_get_posts', 'exclude_category_posts' );

// Exclude  categories from sidebar Post Archive
function get_archives_exclude_category() {
    global $wp_query;
    $temp_query = $wp_query; query_posts("showposts=6&cat=-1, -6");
    while (have_posts()) { the_post(); ?>
        <li><div><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to &ldquo;<?php the_title(); ?>&rdquo;"><?php the_title(); ?></a></div></li>
        <?php }
        return $wp_query = $temp_query;
    }

// Show 5 Posts Function
function five_posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 5 );
    }
}
add_action( 'pre_get_posts', 'five_posts_on_homepage' );


// Navigation Menus
function register_my_menus() {
	register_nav_menus(
		array(
			'page-menu' => __( 'Primary Page Menu','cwebba' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );

// Extend excerpt link to post
function wpdocs_excerpt_more( $more ) {
    return ' <div><a href="'.get_the_permalink().'" rel="nofollow">Read More</a></div>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to other than (default) 55 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 70;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


//Numeric Pagination
function cwebba_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>. . .</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li. . .</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

};

//Peter Wilson: Including WordPress’s comment-reply.js (the right way)
function theme_queue_js(){
if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'theme_queue_js');

// No Comments on Pages:
function noPgComments($open,$post_id) {
  if (get_post_type($post_id) == 'page') {
    $open = false;
  }
  return $open;
}

add_filter( 'comments_open', 'noPgComments', 10, 2 );


// SHORT CODES
include(WP_CONTENT_DIR . '/cwebba_shortcodes.php');

add_shortcode( 'some_random_code_sc', 'some_random_code' );

add_shortcode('custom-button', 'adding_custom_button');

add_shortcode('2columns', 'twocolumn_function');

add_shortcode('3columns', 'threecolumn_function');

add_shortcode('closediv', 'closediv_function');



?>