<?php

//Featured Image Support
add_theme_support( 'post-thumbnails' );

//Theme Support WooCommerce
add_theme_support( 'woocommerce' );

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

?>


