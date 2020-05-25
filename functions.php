<?php

//Featured Image Support
add_theme_support( 'post-thumbnails' );

//Theme Support WooCommerce
add_theme_support( 'woocommerce' );

//Theme support custom search form
add_theme_support( 'html5', array( 'search-form' ) );

//WooCommerce start
//Customize WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="woocommerce">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}
//Woocommerce end

//enqueue scripts
function load_javascript() {
    wp_enqueue_script('jquery');

    wp_register_script('bootstrapjs', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrapjs');

    wp_register_script('main_js', get_template_directory_uri(). '/assets/js/script.js', array(), false, true);
    wp_enqueue_script('main_js');   
    }
add_action( 'wp_enqueue_scripts', 'load_javascript');  

/*
    <!-- Fix these links! -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- Bootstrap bundle, Note: no JQuery not included -->
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/assets/js/bootstrap.bundle.min.js"></script>

    <?php wp_footer(); ?>

    <!-- JS File -->
    <script src="<?php echo get_bloginfo( 'template_directory' );?>/assets/js/script.js"></script>
*/

//enqueue styles
function load_css() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('google_fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400|Roboto&display=swap', array(), false, 'all');
    wp_enqueue_style('google_fonts'); 

    wp_register_style('fonts_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css', array(), false, 'all');
    wp_enqueue_style('fonts_awesome');   

    wp_register_style('main_stylesheet', get_template_directory_uri() . '/assets/css/styles.css', array(), false, 'all');
    wp_enqueue_style('main_stylesheet');    
}
add_action( 'wp_enqueue_scripts', 'load_css' ); 

/*
        <!-- Bootstrap CSS File -->
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/assets/css/bootstrap.min.css">
        <!-- Main CSS File -->
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/assets/css/styles.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Roboto&display=swap" rel="stylesheet">

        <!-- FontsAwesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
*/

//Function to get all categories with exceptions
function the_category_filter($thelist,$separator=' ') {
    if(!defined('WP_ADMIN')) {
        //list the category names to exclude
        $exclude = array('cat-slug1','cat-slug2');
        if(is_category('2')) {
        array_push($exclude,'cat-slug3','cat-slug4'); }
        if(is_category('3')) {
        array_push($exclude,'cat-slug5'); }
        $cats = explode($separator,$thelist);
        $newlist = array();
        foreach($cats as $cat) {
            $catname = trim(strip_tags($cat));
            if(!in_array($catname,$exclude))
                $newlist[] = $cat;
        }
        return implode($separator,$newlist);
    } else
        return $thelist;
}

//Change redirect of the "back to shopping" button in woocommerce
add_filter( 'woocommerce_continue_shopping_redirect', 'bbloomer_change_continue_shopping' );
 
function bbloomer_change_continue_shopping() {
   return 'https://www.heturbanhuis.nl/winkel';
}

?>




