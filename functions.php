<?php
	
	/* thumbnails */
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	
	
	
	// sidebars
if ( function_exists('register_sidebar') ) {
		
		register_sidebar(array(
		'name' => 'sidebar-aktualnosci',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
		));
		
		/*register_sidebar(array(
		'name' => 'sidebar 2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
		));*/
		
}
	
	//pagination
	function wp_corenavi() {
		global $wp_query, $wp_rewrite;
		$pages = '';
		$max = $wp_query->max_num_pages;
		if (!$current = get_query_var('paged')) $current = 1;
		$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$a['total'] = $max;
		$a['current'] = $current;
		
		$total = 0;
		$a['mid_size'] = 2;
		$a['end_size'] = 1;
		$a['prev_text'] = '<';
		$a['next_text'] = '>';
		
		if ($max > 1) echo '<div class="navigation">';
		if ($total == 1 && $max > 1) $pages = '<span class="pages">Strona ' . $current . ' z ' . $max . '</span>'."\r\n";
		echo $pages . paginate_links($a);
		if ($max > 1) echo '</div>';
	}
	
	
	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
	}
	
	//for translations
	add_action( 'after_setup_theme', 'setup' );
	function setup() {
		load_theme_textdomain('your_theme', get_template_directory());
	}	
	
	//bootstrap menu
	require get_template_directory() . '/bootstrap-navwalker.php';
	
	//for acf pagination
	add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
	function custom_disable_redirect_canonical( $redirect_url ) {
		if ( is_paged() && is_singular() ) $redirect_url = false;
		return $redirect_url;
	}
	
	
/**
 * ACF Options Page
 */

if ( function_exists( 'acf_add_options_page' ) ) {

  $parent = acf_add_options_page( array(
    'page_title' => 'Opcje motywu',
    'menu_title' => 'Opcje motywu',
    'redirect'   => 'Opcje motywu'
  ) );

  acf_add_options_sub_page( array(
    'page_title' => 'Ustawienia ogólne motywu',
    'menu_title' => __('Ustawienia ogólne motywu', 'text-domain'),
    'menu_slug'  => "acf-options",
    'parent'     => $parent['menu_slug']
  ) );
  
  $languages = array( 'en', 'pl' );

  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Options (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Options (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "options-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
    ) );
  }

}

/* */

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/* */

function excerpt($limit) {
    return wp_trim_words(get_the_content(), $limit);
}

/**/

/* add_action('pre_get_posts', 'archive_6_per');

function archive_6_per( $query ){
	if(!is_admin() && $query->is_post_type_archive()):
		$query->set('posts_per_page', 999);
		$query->set( 'order', 'ASC' );
		return;
	endif;
} */

//add_action('after_setup_theme', 'remove_admin_bar');
 
//function remove_admin_bar() {
//if (/*!current_user_can('administrator') && !is_admin()*/ true) {
//  show_admin_bar(false);
//}
//}

/**/

pll_register_string('Wyszukaj', 'Wyszukaj');
pll_register_string('Dowiedz się więcej', 'Dowiedz się więcej');
pll_register_string('Rekrutacja <br> 2018', 'Rekrutacja <br> 2018');
pll_register_string('INSTYTUT', 'INSTYTUT');
pll_register_string('INFORMATYKI', 'INFORMATYKI');
pll_register_string('Wyniki wyszukiwania', 'Wyniki wyszukiwania');
pll_register_string('Nie znaleziono', 'Nie znaleziono');
pll_register_string('Menu', 'Menu');
pll_register_string('Nawigacja', 'Nawigacja');
pll_register_string('Wydziały', 'Wydziały');
pll_register_string('Panel boczny', 'Panel boczny');
pll_register_string('Kontrast', 'Kontrast');

/**/
add_action('wp_enqueue_scripts', 'cssmenumaker_scripts_styles' );
function cssmenumaker_scripts_styles() {  
   wp_enqueue_script('cssmenu-scripts', get_template_directory_uri() . '/cssmenu/script.js');
}

/**/

function register_my_menus() {
  register_nav_menus(
    array(
	  'menu-main-header' => __( 'Main Menu Header' ),
      'sidebar-menu-news' => __( 'Sidebar Menu News' ),
	  'sidebar-menu-instytut' => __( 'Sidebar Menu Instytut' ),
      'sidebar-menu-nauka' => __( 'Sidebar Menu Nauka' ),
	  'sidebar-menu-kandydat' => __( 'Sidebar Menu Kandydat' ),
      'sidebar-menu-student' => __( 'Sidebar Menu Student' ),
	  'sidebar-menu-pracownicy' => __( 'Sidebar Menu Pracownicy' ),	 
	  'sidebar-menu-onlyen' => __( 'Sidebar only Eng' ),	 
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

/**/

class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';        
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

/**/

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

function filter_plugin_updates( $value ) {
	unset( $value->response['advanced-custom-fields-pro/acf.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

  
?>