<!-- Tells wordpress the page template name -->
<?php /* Template Name: Productpagina */ ?>

<!-- Get Head file -->
<?php get_template_part('template-parts/header/header') ?>

<!-- Get main Navbar -->
<?php get_template_part('template-parts/navbar/navbarmain') ?>

<!-- Pagina content -->
<div class="banner__green"> 
    <div class="container">
        <div class="flex-container banner__green__content">
            <div class="banner__green__text"><br></div>
        </div>
    </div>
</div>

<div class="container containerpadding">
    <?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
    ?>

        <?php while ( have_posts() ) : the_post();

            global $product;
            $id=$product->id;

            $current_product = wc_get_product($id);

            $limit = 3;
            $exclude_ids = array();

            $related_products = wc_get_related_products($id, $limit, $exclude_ids);

            $first_img = wp_get_attachment_image_src( get_post_thumbnail_id($current_product->get_id()), 'single-post-thumbnail' );
            $attachment_ids = $current_product->get_gallery_attachment_ids();
            $img_urls = array();

            foreach($attachment_ids as $attachment_id){
                $img_urls[] = wp_get_attachment_url( $attachment_id);
            }
            
            //dynamically display amount of pictures properly
            $count = count($img_urls);

            if($count >= 3){
                $rows=4;
            }
            elseif ($count==2){
                $rows=6;
            }
            elseif ($count==1){
                $rows=12;
            }
            else{
                $rows=0;
            }

            ?>
                <div class="row">
                    <div class="col-12 col-lg-6 d-flex p-0 mb-3 pl-3 pl-lg-0 order-2 order-lg-1">
                        <div class="<?php if($rows==0){echo 'col-12';} else {echo 'col-8';} ?> pl-0 pr-1 pr-lg-0">
                            <div> 
                                <img id="product__image1" class="product__image1" src="<?php echo $first_img[0] ?>">
                            </div>
                        </div>
                        <div class="<?php if($rows==0){echo 'd-none';} else {echo 'col-4';} ?> flex-column pl-0 pl-lg-2 pr-3">
                            <div class="<?php if($count<1){echo 'd-none';}?>">
                                <img id="product__image2" class="product__image2" src="<?php echo $img_urls[0] ?>">
                            </div>
                            <div class="<?php if($count<2){echo 'd-none';}?>">
                                <img id="product__image3" class="product__image3" src="<?php echo $img_urls[1] ?>">
                            </div>
                            <div class="<?php if($count<3){echo 'd-none';}?>">
                                <img id="product__image4" class="product__image4 p-0" src="<?php echo $img_urls[2] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-4 mb-lg-0 order-1 order-lg-2">
                        <h1 class="mt-3 mt-lg-0"><?php echo $current_product->get_title(); ?></h1>
                        <p class="singleproduct__price">€<?php echo $current_product->get_price(); ?></p>

                        <?php 
                        $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
                        echo $short_description; 
                        ?>

                        <div class="text-center justify-content-center d-block d-sm-flex">
                            <div class="product__quantity d-block">
                                <form id="product__quantity" method="get">
                                    <span class="input-number-decrement">–</span>
                                    <input class="input-number" name="quantity" type="text" value="1" min="0" max="10">
                                    <span class="input-number-increment">+</span>
                                </form>
                            </div>

                            <?php $quantity_value = $_GET['input-number']; ?>
                            <button form='product__quantity' type="submit" name="add-to-cart" class="CTA_button btn-cart ml-0 ml-sm-3 mt-2 mt-sm-0" value="<?php echo $current_product->get_id();?>">IN WINKELMAND</button>
                        </div>

                    </div>
                </div>
                <div class="row mt-4 px-3 px-lg-0">
                    <div>
                        <?php echo $current_product->get_description(); ?>
                    </div>
                </div>

                <div class="row col-12 mt-5">

                <?php
                if(!empty($related_products)){
                ?>
                    <div class="row px-3 px-lg-0 mb-4">
                        <h2>Gerelateerde producten</h2>
                    </div>
                    <div class="row d-flex flex-wrap justify-content-center">
                    <?php

                    foreach($related_products as $related_product){

                        $currentrelatedproduct = wc_get_product($related_product);
                        $image_related = wp_get_attachment_image_src( get_post_thumbnail_id($currentrelatedproduct->get_id()), 'single-post-thumbnail' );
                        $price = get_post_meta($currentrelatedproduct->get_ID(), '_regular_price', true);
                        ?>

                        <div class="shopcontent__container col-12 col-md-4 px-3 pl-lg-0 mb-0">                   
                            <a href="<?php echo $currentrelatedproduct->get_permalink(); ?>">
                                <img class="shopcontent__image" src="<?php echo $image_related[0] ?>">
                                <div class="shopcontent__information">
                                    <p class="shopcontent__name"><?php echo $currentrelatedproduct->get_name(); ?></p>
                                    <p class="shopcontent__tag">Zaden</p>
                                    <p class="shopcontent__price"><?php echo wc_price($price); ?></p>
                                </div>
                            </a>
                        </div>       
                    <?php
                    }
                }
                    ?>
                    </div>                 
                </div>

		<?php endwhile; // end of the loop. ?>
    
</div>

<!-- Get Footer file -->
<?php get_template_part('template-parts/footer/footer') ?>